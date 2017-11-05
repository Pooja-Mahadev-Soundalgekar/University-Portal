<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Teacher's Portal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
      background-color: #1abc9c; /* Green */
      color: #ffffff;
  }
  .bg-2 { 
      background-color: #474e5d; /* Dark Blue */
      color: #ffffff;
  }
  .bg-3 { 
      background-color: #ffffff; /* White */
      color: #555555;
  }
  .bg-4 { 
      background-color: #2f2f2f; /* Black Gray */
      color: #fff;
  }
  .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
  }
  .navbar {
      padding-top: 15px;
      padding-bottom: 15px;
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 12px;
      letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
      color: #1abc9c !important;
  }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">NITK Teacher's Portal</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#who"><?php
    session_start();
	echo $_SESSION['username'];
  ?></h3></a></li>
        <li><a href="#what">Academic</a></li>
        <li><a href="#where">Mail</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div id="who" class="container-fluid bg-1 text-center">
  <h3 class="margin">Instructor- NITK</h3>
  <img src="teacher.png" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350">
  <h3><?php
    
	echo $_SESSION['username'] . ", you have successfully logged in!";
  ?></h3>
</div>

<!-- Second Container -->
<div id="what" class="container-fluid bg-2 text-center">
  <h3 class="margin">The courses handled: <?php
    	$con = mysqli_connect("localhost","root","","school");
	$check="SELECT * FROM course WHERE username='$_SESSION[username]'";
	$result4=mysqli_query($con,$check);
	if (mysqli_num_rows($result4) > 0) {
	     // output data of each row
	     while($row = mysqli_fetch_assoc($result4)) {
		  echo "<br>". $row['coursename']."(".$row['courseid'].")";
	     }
	} else {
	     echo "Nothing Yet!";
	}
	mysqli_close($con);
  ?> </h3>
  

<script src="js/Chart.js"></script>
<?php
	$con = mysqli_connect("localhost","root","","school");
	$check="SELECT * FROM course WHERE username='$_SESSION[username]'";
	$result=mysqli_query($con,$check);
	$_SESSION['course']=0;
	if (mysqli_num_rows($result) > 0) {
	     // output data of each row
	     while($row1 = mysqli_fetch_assoc($result)) {
		$_SESSION['course']=$_SESSION['course']+1; ?>
		<h3>Student scores in <?php echo $row1['coursename']."(".$row1['courseid'].")"; ?> </h3>
		<table class="table user-list">
		<thead>
			<tr>
			
				<th><span>Roll Number</span></th>
				<th><span>Course ID</span></th>
				<th><span>Midsem(15)</span></th>
				<th><span>Endsem(50)</span></th>
				<th><span>Project(25)</span></th>
				<th><span>Assignment(10)</span></th>
				<th><span>Total</span></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$check7="SELECT * FROM student WHERE courseid='$row1[courseid]'";
			$result7=mysqli_query($con,$check7);
			if (mysqli_num_rows($result7) > 0) {
			     // output data of each row
			     while($row7 = mysqli_fetch_assoc($result7)) {
				echo "<tr>";
				echo "<td>".$row7['studentid']."</td>";
				echo "<td>".$row7['courseid']."</td>";
				$midsem=$row7['msq1']+$row7['msq2']+$row7['msq3'];
				echo "<td>".$midsem."</td>";
				$endsem=$row7['esq1']+$row7['esq2']+$row7['esq3']+$row7['esq4']+$row7['esq5'];
				echo "<td>".$endsem."</td>";
				echo "<td>".$row7['project']."</td>";
				echo "<td>".$row7['assignment']."</td>";
				echo "<td>".($midsem+$endsem+$row7['assignment']+$row7['project'])."</td>";
				echo "</tr>";
			     }
			} 
			?>
		</tbody>
		</table>
		<canvas id="<?php echo 'myChart'.$_SESSION['course'] ; ?>" width="400" height="400"></canvas>
		
		<?php
		$cursor="SELECT * FROM student WHERE courseid='$row1[courseid]'";
		$result4=mysqli_query($con,$cursor);
		$roll=array();
		$tot=array();
		$cnt=array();
		$marks=array();
		
		while($row = mysqli_fetch_assoc($result4)) {
			array_push($roll,$row['studentid']);
			$midsem=$row['msq1']+$row['msq2']+$row['msq3'];
			$endsem=$row['esq1']+$row['esq2']+$row['esq3']+$row['esq4']+$row['esq5'];
			$x=$midsem+$endsem+$row['assignment']+$row['project'];
			array_push($tot,$x);
		}
	
		$totj = json_encode($tot);
		$rollj = json_encode($roll); ?>
		<script>
			var roll = JSON.parse('<?= $rollj; ?>');
			var tot = JSON.parse('<?= $totj; ?>');
			roll = <?php echo json_encode($roll) ?>;
			tot = <?php echo json_encode($tot) ?>;

			var ctx = document.getElementById("<?php echo 'myChart'.$_SESSION['course'] ; ?>");

			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: roll,
					datasets: [{
						label: 'Marks Scored',
						data: tot,
						backgroundColor: [ 
					
						],
						borderColor: [
					
						],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true
							}
						}]
					}
				}
			});


		</script><?php
		     }
		} 
	
	
?>




</div>

<!-- Third Container (Grid) -->
<div id="where" class="container-fluid bg-3 text-center">    
  <h3 class="margin">Queries? Mail to NITK Admin!</h3><br>
  <div class="row">
    <div class="col-sm-4">
      <p></p>
      <img src="t1.png" class="img-responsive margin" style="width: 290px;height:200px;" alt="Image">
    </div>
    
    <div class="col-sm-8"> 
       <form action="query.php" method="post">
	<div class="form-group ">
       <input type="text" class="form-control" placeholder="Username " name="username">
     </div>
     <div class="form-group log-status">
	<textarea id="comment" class="form-control"rows="5"  placeholder="Comment" name="comment"></textarea>
     </div>
       
       
       <button type="submit" class="log-btn" >Submit Query</button>    
       </form>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Made By <a href="www.nitk.ac.in">www.nitk.ac.in</a></p> 
</footer>

</body>
</html>

