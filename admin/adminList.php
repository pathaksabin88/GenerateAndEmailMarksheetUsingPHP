<?php
require("../functions.php"); //including functions.php will automatically start session also

if(!checkLogin()){ // check if user is logged in, if not redirect to login page
	redirect('../adminLogin.php');
}
include("../logoutHeader.php");
?>
<div class="container">
	<div class="row">
			<a href="adminHome.php" class="btn btn-warning">Back  <span class="glyphicon glyphicon-hand-left"></span></a>
			<a href="admin/addAdmin.php?action=aadd" class="btn btn-primary">Add Admin</a>
	</div>
	<br>
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
	<div class="table-responsive">
		<table class="table table-stripped">
			<thead>
				<tr>
					<th>Admin ID</th>
					<th>Full Name</th>
					<th>Username</th>
					<!-- <th>Password</th> -->
					<th>Email</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

			<?php
		$result =listAll(ADMIN_TABLE); // we do have function listAll($tableName) to return all rows from given table in functions.php
		if(total_rows($result)>0){ //total_rows() function in functions.php
			while ($row = fetch_array($result)) { // fetch_array() function in function.php
				?>
				<tr>
					<td><?php echo $row['aid'] ?></td>
					<td><?php echo $row['aname'] ?></td>
					<td><?php echo $row['username'] ?></td>
					<!-- <td><?php /*echo $row['password']*/ ?></td> -->
					<td><?php echo $row['aemail'] ?></td>
					<td><!-- <a href="admin/editAdmin.php?action=aedit&aid=<?php /*echo $row['aid']*/?>" class="btn btn-primary">Edit</a> -->
						<a href="admin/deleteAdmin.php?action=adelete&aid=<?php echo $row['aid']?>" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
					</td>
				</tr>
				<?php
				# code...
			}


		}
		?>
</tbody>
</table>
</div>
</div>
<?php
include("../footer.php");
?>