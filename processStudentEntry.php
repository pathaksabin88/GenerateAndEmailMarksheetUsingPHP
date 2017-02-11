<?php
    include("functions.php");
    if(isset($_SESSION['semail'])&&isset($_SESSION['sname'])&&isset($_SESSION['sroll'])&&isset($_SESSION['sem'])&&isset($_SESSION['term'])){
        $studentemail = $_SESSION['semail'];
        $studentname = $_SESSION['sname'];
        $studentroll = $_SESSION['sroll'];
        $semester = $_SESSION['sem'];
        $term = $_SESSION['term'];
    }
	if(isset($_POST['submitmarks'])){
		$toc = $_POST['toc'];
		$sad = $_POST['sad'];
		$dbms = $_POST['dbms'];
		$cg = $_POST['cg'];
		$cs = $_POST['cs'];
		$tw = $_POST['tw'];
		$query = "INSERT INTO marks values(\"$studentroll\",\"$studentname\",\"$studentemail\",\"$semester\",\"$term\",$toc,$sad,$dbms,$cg,$cs,$tw);";
		if(execute($query)){
			$_SESSION['sentry'] = "Marks of ".$studentname." of ".$term." successfully registered";
           redirect("index.php");
		};

	}
    if(isset($_POST['proceed'])){
        $studentroll = $_POST['sroll']; 
        $studentname = $_POST['sname']; 
        $studentemail = $_POST['semail'];
        $semester = $_POST['semester'];
        $term = $_POST['term']; 
        $_SESSION['sroll'] = $studentroll;
        $_SESSION['sname'] = $studentname;
        $_SESSION['sem'] = $semester;
        $_SESSION['term'] = $term;
        $_SESSION['semail'] = $studentemail;
        $condition = ['sroll'=>$studentroll, 'semester'=>$semester, 'term'=>$term];
        $result =listWhere(MARKS_TABLE,$condition); // we do have function listAll($tableName) to return all rows from given table in functions.php
        if(total_rows($result)>0){
            $_SESSION['studentExist'] = "Record of ".$studentname." of ".$semester." and ".$term." already exist";
            redirect("index.php");
        }


?>
<!DOCTYPE html> 
<html>
<head>
	<title>Generate MarkSheet</title>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script> 	
    <?php
       include("loginHeader.php");
     ?>
</head>
<body background="img/backgroundimage6.jpg">
	<h1 style="text-align:center;color:yellow;">
	<?php
    /*$studentroll = $_POST['sroll']; 
	$studentname = $_POST['sname'];	
    $studentemail = $_POST['semail'];
	$semester = $_POST['semester'];
	$term = $_POST['term']; 
	$_SESSION['sroll'] = $studentroll;
    $_SESSION['sname'] = $studentname;
	$_SESSION['sem'] = $semester;
	$_SESSION['term'] = $term;
    $_SESSION['semail'] = $studentemail;*/
	?>
    <?php 
       echo "Welcome, ".$_SESSION['sname'];
    ?></h1><hr>
	<div class="container">
		<div class="col-xs-6 col-md-4 col-md-offset-4">
			<h2>Fill Marks Out of 100</h2>
			<form role="form" style="background-color:lightyellow;" action="processStudentEntry.php" method="POST">
				<div class="form-group">
		        	<br>
		        	<div style="text-align:center;font-size:20px;"><label for="toc">Theory of Computation</label>
                	<input type="number" min="0" max="100" maxlength="2" class="form-control" name="toc" id="toc" placeholder="TOC" style="height:42px; width:300px; text-align:center; margin:auto;">
                	</div>
                	<br>
                	<div style="text-align:center;font-size:20px;">
                	<label for="sad">System Analysis and Design</label>
                	<input type="number" min="0" max="100" maxlength="2" class="form-control" name="sad" id="sad" placeholder="SAD" style="height:42px; width:300px; text-align:center; margin:auto;">
                	</div>
                	<br>
                	<br>
                	<div style="text-align:center;font-size:20px;">
                	<label for="dbms">Database Management System</label>
                	<input type="number" min="0" max="100" maxlength="2" class="form-control" name="dbms" id="dbms" placeholder="DBMS" style="height:42px; width:300px; text-align:center; margin:auto;">
                	</div>
                	<br>
                	<br>
                	<div style="text-align:center;font-size:20px;">
                	<label for="cg">Computer Graphics</label>
                	<input type="number" min="0" max="100" maxlength="2" class="form-control" name="cg" id="cg" placeholder="CG" style="height:42px; width:300px; text-align:center; margin:auto;">
                	</div>
                	<br>
                	<br>
                	<div style="text-align:center;font-size:20px;">
                	<label for="cs">Cognitive Science</label>
                	<input type="number" min="0" max="100" maxlength="2" class="form-control" name="cs" id="cs" placeholder="CS" style="height:42px; width:300px; text-align:center; margin:auto;">
                	</div>
                	<br>
                	<br>
                	<div style="text-align:center;font-size:20px;">
                	<label for="tw">Technical Writing</label>
                	<input type="number" min="0" max="100" maxlength="2" class="form-control" name="tw" id="tw" placeholder="TW" style="height:42px; width:300px; text-align:center; margin:auto;">
                	</div>
                	<br>
                	<div style="text-align:center;font-size:20px;">	                
		            <input type="submit" name="submitmarks" value="SUBMIT MARKS" class="btn btn-primary" style="font-size:20px; height:40px; width:200px">
		            </div>
		            <br><br>
		        </div>    	  
			</form>
		</div>
	</div>


</body>
<?php
   include("footer.php");
?>
</html>

<?php
   }else{
    redirect("index.php");
   }

?>