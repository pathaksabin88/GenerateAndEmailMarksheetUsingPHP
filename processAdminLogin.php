<?php
require("functions.php"); //mandatory functions.php as login calls functions defined there
if(isset($_POST['adminLogin'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(!empty($username)&&!empty($password)){
			// make condition array to pass to listWhere() function
		$condition= [
		'username'=>$username,
		'password'=>$password
		];
		$result = listWhere(ADMIN_TABLE, $condition);
		if(total_rows($result)==1){ //if total row count equals 1 create loggedInUser session which will be checked in other pages
			$loggedInUser = fetch_array($result);
			$_SESSION['loggedInUser']=$loggedInUser['username'];
			 //get username of logged in user and save it in session variable
			$_SESSION['loggedInId'] = $loggedInUser['aid'];
			$_SESSION['loggedInEmail'] = $loggedInUser['aemail'];
			$_SESSION['loggedInName'] = $loggedInUser['aname'];
			redirect('adminHome.php');
		}
		else{
			$_SESSION['loginError'][]="Invalid Username or Password";
		}
	}
	elseif (empty($password)) {
		$_SESSION['loginError'][]="Please enter your Password";
	}
	elseif (empty($username)){
		
		$_SESSION['loginError'][]="Please enter your Username";
	}
redirect('adminLogin.php');
}
?>