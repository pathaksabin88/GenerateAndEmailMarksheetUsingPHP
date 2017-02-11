<?php
require("../functions.php");

//login checked here to prevent direct url hitting if user is not logged in
if(!checkLogin()){ // check if user is logged in, if not redirect to login page
	redirect('../adminLogin.php');
}

if(isset($_POST['updateStudent'])){

	foreach($_POST as $key=>$value){

		$$key = check($value);
	}

    $condition = ['sroll'=>$sroll, 'semester'=>$semester, 'term'=>$term];
    $result =listWhere(MARKS_TABLE,$condition); // we do have function listAll($tableName) to return all rows from given table in functions.php
    if(total_rows($result)>0){
    	$_SESSION['oldData']=$_POST;
    }

    if(empty($sroll)){
		$_SESSION['error'][]="Roll Number of student is Mandatory";
	}
	if(empty($sname)){
		$_SESSION['error'][]="Name of Student is Mandatory";
	}
	if(empty($semail)){
		$_SESSION['error'][]="Email of student is Mandatory";
	}
	if(empty($semester)){
		$_SESSION['error'][]="Semester is Mandatory";
	}
	if(empty($term)){
		$_SESSION['error'][]="Term is Mandatory";
	}
	
	//validation ends
	if(empty($_SESSION['error'])){ 
		$tableName = MARKS_TABLE;
		$data = ['sroll'=>$sroll,
		'sname'=>$sname,
		'semail'=>$semail,
		'semester'=>$semester,
		'term'=>$term,
		'toc'=>$toc,
		'sad'=>$sad,
		'dbms'=>$dbms,
		'cg'=>$cg,
		'cs'=>$cs,
		'tw'=>$tw
		];
		if(isset($_GET['action'])&&$_GET['action']=='edit'){
			$condition=['sroll'=>$sroll,'semester'=>$semester,'term'=>$term];
			if(update($data,$condition,$tableName)){
				$_SESSION['message']= 'Student updated successfully'; 
				unset($_SESSION['oldData']); 
				redirect('studentList.php');
			} 
		}
	}
	else{
		$_SESSION['oldData']=$_POST;
		redirect('editStudent.php');
	}
}

?>