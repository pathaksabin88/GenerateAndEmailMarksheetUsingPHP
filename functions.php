<?php
//start session
session_start();
//include constants file
include("constants.php");
/*
function to connect to database
HOST, USER PASS, DBNAME defined in constants.php file.

*/
function dbConnect(){
	$con = mysqli_connect(HOST,USER,PASS,DBNAME)or die("Error connecting to database".mysqli_connect_error());
	return $con;
}
/*
function to executeute query,
will connect to database and run the given query
close the connection afterwards
@params
$sql : sql query to run
returns result set of the query
*/
function execute($sql)	{
	$con = dbConnect();
	  $result  =   mysqli_query($con,$sql) or die("Wrong Query".mysqli_error($con));
	  if($result)
	  {
	  	mysqli_close($con);
		return $result;  
	  }else{
	  	mysqli_close($con);
		return NULL;  
	  }

}
/*
	function redirect
	@params
	$url: Url where to redirect
*/
   function redirect($url)
   {
	if(headers_sent())
	{
	echo "<script>window.location.href='$url'</script>";
	exit;
	}else
	{ session_write_close();
	  header("Location:$url");
	  exit;
	}
   }

  /*
	function to check login
	@condition: 
	if logged in session variable $_SESSION['loggedInUser'] will be set else not logged in
   */
   

   function checkLogin(){
   	if(isset($_SESSION['loggedInUser'])&&!empty($_SESSION['loggedInUser'])){
   		$loggedInUser = $_SESSION['loggedInUser'];
   		echo "<script>console.log='Logged In User: $loggedInUser'</script>";
   		return true;
   	}
   	else{
   		return false;
   		
   	}
 }
 /*
function to return total numbers of rows of successful query
@params
$rs: result set of a successful query
return total number of rows in the resultset
 */
function total_rows($rs){
return mysqli_num_rows($rs);	
}
/*
function to return array of each row for successful query
@params
$rs: result set of a successful query
*/
function fetch_array($rs){
	return mysqli_fetch_array($rs);	
}
/*
function listWhere
list all rows matching the conditions
@params 
$tableName: name of table to list data from
$conditions : where condition in form of array
returns result set with query executeution
*/
function listWhere($tableName,$conditions){
	$query = 'SELECT * FROM '.$tableName;
	foreach($conditions as $k=>$v){
	    $whereConditions[]=  "`$k`='$v'";	
	}
	
	if(count($whereConditions)>0) {
	 $query .= " WHERE  ". implode(" AND ", $whereConditions); }
	  else{
		echo "Wrong Query ";
		exit;
	  }
	return execute($query);
}
/*
function listAll
@params 
$tableName: name of table to list data from
returns result set with query executeution
*/
function listAll($tableName){
	$query = 'SELECT * FROM '.$tableName;
	return execute($query);
}
/*
function to check and sanitize input fields
@params
$field: input value from form
*/
function sanitizeFields($field)
   {
	   $field  =  trim($field);
	   $field  =  strip_tags($field);
	   $field  =  stripslashes($field);
	   $field  =  mysqli_real_escape_string(dbConnect(),$field);
	   return $field;
   }
   /*
function to check and sanitize input fields
@params
$field: input value from form 
 if inuput is array sanitize each field
*/
function check($field)
   {
	 if(is_array($field)){
	 	foreach ($field as $a) {
	 		$sanitizedArray[]=sanitizeFields($a);
	 	}
	 	return $sanitizedArray;
	 }
	   return sanitizeFields($field);
   }
/*
Update record in database
@params
$data should be associative array with key (matching to db column Name)
$conditions: where conditons
$tableName for identifying the table to update record in
*/
function update($data,$conditions, $tableName)	{ // $data should be array and table name should be passed
    $query =  "UPDATE `$tableName` SET ";	
	foreach($data as $key=>$val){
		$updateArray[]="`$key`='$val'"; 
	}
	
	
	if(count($updateArray)>0) {
	 $query .= implode(" , ", $updateArray);
	  }
	  else{
		echo "Wrong Query";
		exit;
	  }
	  
	  foreach($conditions as $k=>$v){
	    $whereConditions[]=  "`$k`='$v'";	
	}
	
	if(count($whereConditions)>0) {
	 $query .= " WHERE  ". implode(" AND ", $whereConditions); }
	  else{
		echo "Wrong Query ";
		exit;
	  }

	  return execute($query);
	}
/*
Delete record in database
@params
$conditions: where conditons
$tableName for identifying the table to delete record from
*/
function delete($tableName,$conditions)	{ // $data should be array and table name should be passed
    $query =  "DELETE FROM `$tableName` ";	
	foreach($conditions as $k=>$v){
	    $whereConditions[]=  "`$k`='$v'";	
	}
	if(count($whereConditions)>0) {
	 $query .= " WHERE  ". implode(" AND ", $whereConditions); }
	  else{
		echo "Wrong Query ";
		exit;
	  }

	  return execute($query);
	}

	
?>