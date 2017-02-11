<?php
require("../functions.php");

//login checked here to prevent direct url hitting if user is not logged in
if(!checkLogin()){ // check if user is logged in, if not redirect to login page
	redirect('../adminLogin.php');
}

if(isset($_POST['addAdmin'])){
    

	foreach($_POST as $key=>$value){

		$$key = check($value);
	}

	if(empty($aid)){
		$_SESSION['error'][]="ID of Admin is Mandatory";
	}	
	if(empty($aname)){
		$_SESSION['error'][]="Name of Admin is Mandatory";
	}
	if(empty($aemail)){
		$_SESSION['error'][]="Email of Admin is Mandatory";
	}
	if(empty($username)){
		$_SESSION['error'][]="Username is Mandatory";
	}
	if(empty($password)){
		$_SESSION['error'][]="Password is Mandatory";
	}
	
	//validation ends
	if(empty($_SESSION['error'])){


		$condition = ['aid'=>$aid];
    	$result =listWhere(ADMIN_TABLE,$condition); // we do have function listAll($tableName) to return all rows from given table in functions.php
    	if(total_rows($result)>0){
        	$_SESSION['adminExist'] = "ADMIN of ID = ".$aid." already exist";
        	redirect("addAdmin.php?action=aadd");
    	}
    	$condition = ['username'=>$username];
    	$result =listWhere(ADMIN_TABLE,$condition); // we do have function listAll($tableName) to return all rows from given table in functions.php
    	if(total_rows($result)>0){
        	$_SESSION['adminUsernameExist'] = "ADMIN of Username = ".$username." already exist. Try next One.";
        	redirect("addAdmin.php?action=aadd");
    	}
		$query = "INSERT INTO admins values($aid,\"$aname\",\"$username\",\"$password\",\"$aemail\");";
		if(execute($query)){
			$_SESSION['message']= 'New ADMIN Successfully Created';
           redirect("adminList.php");
	     }
    }
 }

?>