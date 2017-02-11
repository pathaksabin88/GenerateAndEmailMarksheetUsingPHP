<?php
require("../functions.php"); //including functions.php will automatically start session also

if(!checkLogin()){ // check if user is logged in, if not redirect to login page
	redirect('../adminLogin.php');
}
include("../logoutHeader.php");// if logged in already load logoutHeader and do the rest
if(isset($_GET['action'])&&$_GET['action']=='edit'){
	/*if(!isset($sroll)||empty($sroll)||!isset($semester)||empty($semester)||!isset($term)||empty($term)){
		redirect('studentList.php'); //if incase sroll is not set or empty redirect to studentLList.php
	}*/
	if(isset($_GET['sroll'])&&isset($_GET['semester'])&&isset($_GET['term'])){
	$sroll = $_GET['sroll']; // if action is edit, when clicked from edit icon (see link formed)
	$semester = $_GET['semester'];
	$term = $_GET['term'];
	$condition=['sroll'=>$sroll,'semester'=>$semester,'term'=>$term]; // make condition to pass to listWhere() function
	$savedData = listWhere(MARKS_TABLE,$condition);//save result set to $savedData
	$oldData = fetch_array($savedData);// get array from result set and pass it to $oldData, since only one record will be returned NO while loop
   }
}
/*if(isset($_SESSION['oldData'])){ // this part is for retriving user entered data if any ERROR occurs while ADDING
	$oldData = $_SESSION['oldData']; 
	unset($_SESSION['oldData']); //session_unset();	
}*/

if(isset($oldData)){
	foreach($oldData as $key=>$value){
		$$key =$value;  // making each KEY a variable and assigning value to variable made($key returns string, extra $ makes it variable)

	}
}
?>
<div class="container">
	<div class="col-lg-6 col-lg-offset-3">
		<h4 style="color:red;"><?php 
            if(isset($_SESSION['studentExist'])){
               	echo $_SESSION['studentExist'];
               	unset($_SESSION['studentExist']);
            }
		?></h4>
		<div class="row">
			<h2>Edit Marks of <?php  echo $sroll.", ".$term." of ".$semester; ?></h2>
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

		<form class="form-horizontal" action="student/processStudentForm.php?action=edit" method="POST">
			<?php
			if(isset($_GET['action'])&&$_GET['action']=='edit'){
				?>
				<input type="hidden" name="sroll" value="<?php echo $_GET['sroll']; ?>">
				<input type="hidden" name="semester" value="<?php echo $_GET['semester']; ?>">
				<input type="hidden" name="term" value="<?php echo $_GET['term']; ?>">
				<?php

			}
			?>
			<!-- <div class="form-group">
				<label for="sroll" class="col-sm-3 control-label">Student Roll No *</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="sroll" name="sroll" placeholder="Student Roll Number" value="<?php echo isset($sroll)?$sroll:''; ?>">
				</div>
			</div> -->
			<div class="form-group">
				<label for="sname" class="col-sm-3 control-label">Student Full Name *</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="sname" name="sname" placeholder="Full Name" value="<?php echo isset($sname)?$sname:''; ?>">
				</div>
			</div>
				<div class="form-group">
					<label for="semail" class="col-sm-3 control-label">Email *</label>
					<div class="col-sm-9">
						<input type="email" class="form-control" id="semail" name="semail" placeholder="Email" value="<?php echo isset($semail)?$semail:''; ?>">
					</div>
				</div>
				<!-- <div class="form-group">
					<label for="semester" class="col-sm-3 control-label">Semester *</label>
					<div class="col-sm-9">
						<select name="semester" id="semester">
	                		<option value="Sem IV">Sem IV</option>
	                	</select>
					</div>
				</div>
				<div class="form-group">
					<label for="term" class="col-sm-3 control-label">Term *</label>
					<div class="col-sm-9">
						<select name="term" id="term">
	                    	<option value="Mid-term">Mid-Term</option>
	                		<option value="Final-term">Final-Term</option>
	                	</select>
					</div>
				</div> -->
				<div class="form-group">
					<label for="toc" class="col-sm-3 control-label">TOC Marks</label>
					<div class="col-sm-9">
						<input type="number" min="0" max="100" class="form-control" id="toc" name="toc" placeholder="TOC" value="<?php echo isset($toc)?$toc:''; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="sad" class="col-sm-3 control-label">SAD Marks</label>
					<div class="col-sm-9">
						<input type="number" min="0" max="100" class="form-control" id="sad" name="sad" placeholder="SAD" value="<?php echo isset($sad)?$sad:''; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="dbms" class="col-sm-3 control-label">DBMS Marks</label>
					<div class="col-sm-9">
						<input type="number" min="0" max="100" class="form-control" id="dbms" name="dbms" placeholder="DBMS" value="<?php echo isset($dbms)?$dbms:''; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="cg" class="col-sm-3 control-label">CG Marks</label>
					<div class="col-sm-9">
						<input type="number" min="0" max="100" class="form-control" id="cg" name="cg" placeholder="CG" value="<?php echo isset($cg)?$cg:''; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="cs" class="col-sm-3 control-label">CS Marks</label>
					<div class="col-sm-9">
						<input type="number" min="0" max="100" class="form-control" id="cs" name="cs" placeholder="CS" value="<?php echo isset($cs)?$cs:''; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="tw" class="col-sm-3 control-label">TW Marks</label>
					<div class="col-sm-9">
						<input type="number" min="0" max="100" class="form-control" id="tw" name="tw" placeholder="TW" value="<?php echo isset($tw)?$tw:''; ?>">
					</div>
				</div>
				<div>
					<div class="col-sm-9 col-sm-offset-3">
						<div class="col-sm-6">
							<input type="submit" class="btn btn-primary form-control" id="updateStudent" name="updateStudent" value="Update">
						</div>
					</div>
				</div>
				<br><br><br>

			</form>
</div><!--  container div end -->
<?php
include("../footer.php");
?>
