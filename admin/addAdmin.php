<?php
require("../functions.php"); //including functions.php will automatically start session also

if(!checkLogin()){ // check if user is logged in, if not redirect to login page
	redirect('../adminLogin.php');
}
include("../logoutHeader.php");// if logged in already load header and do the rest
if(isset($_GET['action'])&&$_GET['action']=='aadd'){
	
?>
<div class="container">
	<div class="col-lg-6 col-lg-offset-3">
		<h4 style="color:red;"><?php 
            if(isset($_SESSION['adminExist'])){
               	echo $_SESSION['adminExist'];
               	unset($_SESSION['adminExist']);
            }
		?></h4>
		<h4 style="color:red;"><?php 
            if(isset($_SESSION['adminUsernameExist'])){
               	echo $_SESSION['adminUsernameExist'];
               	unset($_SESSION['adminUsernameExist']);
            }
		?></h4>
		<div class="row">
			<h2>Fill This To Proceed</h2>
		</div>
		<hr/>

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

		<form class="form-horizontal" action="admin/processAdminAdd.php?action=aadd" method="POST">
			<div class="form-group">
				<label for="aid" class="col-sm-3 control-label">ADMIN ID *</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="aid" name="aid" placeholder="ADMIN ID" required>
				</div>
			</div>
			<div class="form-group">
				<label for="aname" class="col-sm-3 control-label">ADMIN Full Name *</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="aname" name="aname" placeholder="Full Name" required>
				</div>
			</div>
				<div class="form-group">
					<label for="username" class="col-sm-3 control-label">Username *</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-3 control-label">Password *</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="password" name="password" placeholder="Password" required>
					</div>
				</div>
				<div class="form-group">
					<label for="aemail" class="col-sm-3 control-label">Email *</label>
					<div class="col-sm-9">
						<input type="email" class="form-control" id="aemail" name="aemail" placeholder="Email" required>
					</div>
				</div>
				<div>
					<div class="col-sm-9 col-sm-offset-3">
						<div class="col-sm-6">
							<input type="submit" class="btn btn-primary form-control" id="addAdmin" name="addAdmin" value="ADD">
						</div>
					</div>
				</div>

			</form>
</div><!--  container div end -->
<?php
}else{
	redirect('adminHome.php');
}
include("../footer.php");
?>
