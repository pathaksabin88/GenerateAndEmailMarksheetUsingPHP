<?php 
  include("functions.php");
  include("loginHeader.php");
  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Generate MarkSheet</title>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script> 	
    <style>
    </style>
</head>
<body role="document" background="img/backgroundimage6.jpg">
	<h3 class="text-center">Admin Login Panel</h3>
	<div class="container">
		<div class="col-xs-6 col-md-4 col-md-offset-4">
			<form role="form" style="background-color:lightpink;" action="processAdminLogin.php" method="POST">
				<?php
					if(isset($_SESSION['loginError'])&&count($_SESSION['loginError'])>0){
				?>
				<div class="form-group alert alert-danger">
						<ul><?php 
							foreach ($_SESSION['loginError'] as $error) {
								# code...
								echo "<li>$error</li>";
							}
						 ?></ul>
				</div>	
				<?php
				unset($_SESSION['loginError']);
					}
				?>
				<div class="form-group">
		    <br>
            <div style="text-align:center;font-size:20px;"><label for="inputUsername">Username</label>
            <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username" style="height:38px; width:300px; text-align:center; margin:auto;"></div>
            </div>
            <div class="form-group">
		    <br>
            <div style="text-align:center;font-size:20px;"><label for="inputPassword">Password</label></div>
            <div style="text-align:center"><input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" style="height:38px;width:300px;text-align:center; margin:auto;"></div>
            </div>
			<br>
            <div style="text-align:center"><input type="submit" value="Login" name="adminLogin" class="btn btn-primary" style="font-size:20px; height:40px; width:200px"></div>
			<br><br>
			</form>
		</div>
	</div>

<?php
include('footer.php');
?>