<?php
include("functions.php");

//login checked here to prevent direct url hitting if user is not logged in

if(checkLogin()===false){ // check if user is logged in, if not redirect to login page
	redirect('adminLogin.php');
}
include("logoutHeader.php");
?>
<div style="text-align:center;">
		<h2 style="color:#443f3d;">
			<strong>
				Heartly Welcome to Our Application
			</strong>
		</h2>
		<p>
			You can go to various pages. 
		<p>
		<div>
			<li>Admin Page</li>
			<li>Student Page</li>
		</div>

		<hr/>
	</div>
<div class="container">
	
	<div class="row">
 		<div class="col-lg-6">
 			<h3>
 				Admin
 			</h3>
 			<a href="admin/addAdmin.php?action=aadd" class="btn btn-primary btn-lg">Add Admin</a>
 			<a href="admin/adminList.php" class="btn btn-success btn-lg">View Admin List</a>
 		</div>
 		<div class="col-lg-6">
 			<h3>
 				Student
 			</h3>
 			<a href="index.php" class="btn btn-primary btn-lg">Add Student</a>
 			<a href="student/studentList.php" class="btn btn-success btn-lg">View Student List</a>
 		</div>
	</div>
</div>
<?php
include("footer.php");
?>