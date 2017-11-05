<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Portal</title>
  
  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <div class="login-form">
  <form action="home.php" method="post">
     <h1>Login- NITK Portal</h1>
	 <img src="nitklogo.png" style="width: 290px;height:200px;">
     <div class="form-group ">
       <input type="text" class="form-control" placeholder="Username " name="username">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" class="form-control" placeholder="Password" name="password">
       <i class="fa fa-lock"></i>
     </div>
     <button type="submit" class="log-btn" >Log in</button>    
       </form>
   </div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
