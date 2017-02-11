<?php
require("../functions.php");

//login checked here to prevent direct url hitting if user is not logged in

if(!checkLogin()){ // check if user is logged in, if not redirect to login page
	redirect('../adminLogin.php');
}
include("../logoutHeader.php");

if(isset($_GET['action'])&&$_GET['action']=='email'){
	if(isset($_GET['sroll'])&&isset($_GET['semester'])&&isset($_GET['term'])){
		$sroll= $_GET['sroll'];
		$semester= $_GET['semester'];
		$term= $_GET['term'];
?>
<div class="container">
	<?php
	if(isset($_SESSION['error'])){
		?>
		<div class="alert alert-danger">
			<?php
			foreach($_SESSION['error'] as $error){
				echo $error."<br>";
			}
			unset($_SESSION['error']);
			?>
		</div>
		<?php
	}
	?>

	<?php
	if(isset($_SESSION['message'])){
		?>
		<div class="alert alert-success">
			<?php echo $_SESSION['message'];?>
		</div>
		<?php
		unset($_SESSION['message']);
	}
	?>
    <div class="col-xs-6 col-md-4 col-md-offset-4">
    	<div style="text-align:center;font-size:40px;">
			<h2>Enter your Email Account Password</h2>
		</div>
		<form role="form" style="background-color:lightpink;" action="student/processEmail.php?action=email&sroll=<?php echo $sroll; ?>&semester=<?php echo $semester; ?>&term=<?php echo $term; ?>" method="POST">
			<div class="form-group">
		        <br>
		        <div style="text-align:center;font-size:20px;">
                	<input type="password" class="form-control" name="epassword" id="epassword" placeholder="Email PASSWORD" style="height:42px; width:300px; text-align:center; margin:auto;">
                </div>
                <br>
	            <hr>
	            <div style="text-align:center;font-size:20px;">
		            <input type="submit" value="Continue" name="psubmit" class="btn btn-primary" style="font-size:20px; height:40px; width:200px">
		        </div>
		        <br><br>
		    </div>    	  
		</form>
	</div>
</div>
<?php
  }
}else{
	redirect("studentList.php");
}
include("../footer.php");
?>