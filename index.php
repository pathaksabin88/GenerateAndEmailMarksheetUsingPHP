<!DOCTYPE html>
<html>
<head>
	<title>Generate MarkSheet</title>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script> 	
<?php
 include("functions.php");
 if(isset($_SESSION['loggedInUser'])){
 	include("LoggedInHeader.php");
 }else{
 	include("loginHeader.php");
 }
 
 
?>
</head>
<body background="img/backgroundimage6.jpg">
	<h1 style="text-align:center;color:yellow;">Welcome To MarkSheet Generator</h1><hr>
	<div class="container">
		<div class="col-xs-6 col-md-4 col-md-offset-4">
			<h4 style="color:green;"><?php 
               if(isset($_SESSION['sentry'])){
               	 echo $_SESSION['sentry'];
               	 unset($_SESSION['sentry']);
               }
			?></h4>
			<h4 style="color:red;"><?php 
               if(isset($_SESSION['studentExist'])){
               	 echo $_SESSION['studentExist'];
               	 unset($_SESSION['studentExist']);
               }
			?></h4>
			<div style="text-align:center;font-size:40px;">
			<h2>Fill This To Proceed</h2>
		    </div>
			<div style="text-align:center;font-size:20px;">
			<form role="form" style="background-color:lightgrey;" action="processStudentEntry.php" method="POST">
				<div class="form-group">
		        	<br>
		        	<div style="text-align:center;font-size:20px;">
                	<input type="text" class="form-control" name="sroll" id="inputText" placeholder="Roll Number" style="height:42px; width:300px; text-align:center; margin:auto;" required>
                	</div>
                	<br><br>
                	<div style="text-align:center;font-size:20px;">
                	<input type="text" class="form-control" name="sname" id="inputText" placeholder="Student Name" style="height:42px; width:300px; text-align:center; margin:auto;" required>
                	</div>
                	<br><br>
                	<div style="text-align:center;font-size:20px;">
                	<input type="email" class="form-control" name="semail" id="inputText" placeholder="Student Email" style="height:42px; width:300px; text-align:center; margin:auto;" required>
                	</div>
                	<br><br>
                	<div style="text-align:center;font-size:20px;">
	                <select name="semester" style="text-align:center;height:42px; width:300px;">
	                <option value="Sem IV">Sem IV</option>
	                </select>
	                </div>
	                <br><br>
	                <div style="text-align:center;font-size:20px;">
	                <select name="term" style="text-align:center;height:42px; width:300px;">
	                <option value="Mid-term">Mid-Term</option>
	                <option value="Final-term">Final-Term</option>
	                </select>
	                </div>
	                <hr>
	                <div style="text-align:center;font-size:20px;">
		            <input type="submit" value="Proceed" name="proceed" class="btn btn-primary" style="font-size:20px; height:40px; width:200px">
		            </div>
		            <br><br>
		            </div>
		        </div>    	  
			</form>
		</div>
	</div>


</body>
<?php 
include("footer.php");
?>
</html>