<?php
require("../functions.php");

//login checked here to prevent direct url hitting if user is not logged in

if(!checkLogin()){ // check if user is logged in, if not redirect to login page
	redirect('../adminLogin.php');
}

if(isset($_GET['action'])&&$_GET['action']=='adelete'){
	if(isset($_GET['aid'])){
		$condition = ['aid'=>$_GET['aid']];
		if(delete(ADMIN_TABLE,$condition)){
			$_SESSION['message']="Admin Deleted Successfully";
			redirect("adminList.php");
		}
	}
	else{
		$_SESSION['error'][]="Error !!! ID not provided";
		redirect("adminList.php");
	}
}
?>