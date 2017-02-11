<?php
require("../functions.php"); //including functions.php will automatically start session also

if(!checkLogin()){ // check if user is logged in, if not redirect to login page
	redirect('../adminLogin.php');
}
include("../logoutHeader.php");// if logged in already load logoutHeader and do the rest
if(isset($_GET['action'])&&$_GET['action']=='aedit'){
	$aid = check($_GET['aid']); // if action is edit, when clicked from edit icon (see link formed)
	if(!isset($aid)||empty($aid)){
		redirect('adminList.php'); //if incase aid is not set or empty redirect to userlist.php
	}
	$condition=['aid'=>$aid]; // make condition to pass to listWhere() function
	$savedData = listWhere(ADMIN_TABLE,$condition);//save result set to $savedData
	$oldData = fetch_array($savedData); // get array from result set and pass it to $oldData, since only one record will be returned NO while loop
}
if(isset($_SESSION['oldData'])){ // this part is for retriving user entered data if any ERROR occurs while ADDING
	$oldData = $_SESSION['oldData']; 
	unset($_SESSION['oldData']); //session_unset();	
}

if(isset($oldData)){
	foreach($oldData as $key=>$value){
		$$key =$value;  // making each KEY a variable and assigning value to variable made($key returns string, extra $ makes it variable)

	}
}
?>
<div class="container">
	<div class="col-lg-6 col-lg-offset-3">
		<div class="row">
			<h2>Edit Info of ADMIN ID = <?php  echo $_GET['aid']; ?></h2>
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

		<form class="form-horizontal" action="admin/processAdminEdit.php?action=aedit" method="POST">
			<?php
			if(isset($_GET['action'])&&$_GET['action']=='aedit'){
				?>
				<input type="hidden" name="aid" value="<?php echo $aid; ?>">

				<?php

			}
			?>
			<div class="form-group">
				<label for="aname" class="col-sm-3 control-label">ADMIN Full Name *</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="aname" name="aname" placeholder="Full Name" value="<?php echo isset($aname)?$aname:''; ?>" required>
				</div>
			</div>
				<div class="form-group">
					<label for="username" class="col-sm-3 control-label">Username *</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo isset($username)?$username:''; ?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-3 control-label">Password *</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo isset($password)?$password:''; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="aemail" class="col-sm-3 control-label">Email *</label>
					<div class="col-sm-9">
						<input type="email" class="form-control" id="aemail" name="aemail" placeholder="Email" value="<?php echo isset($aemail)?$aemail:''; ?>" required>
					</div>
				</div>
				<div>
					<div class="col-sm-9 col-sm-offset-3">
						<div class="col-sm-6">
							<input type="submit" class="btn btn-primary form-control" id="updateAdmin" name="updateAdmin" value="Update">
						</div>
					</div>
				</div>

			</form>
</div><!--  container div end -->
<?php
include("../footer.php");
?>
