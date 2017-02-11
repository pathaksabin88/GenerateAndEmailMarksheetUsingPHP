<!DOCTYPE html>
<html>
<head>
	<title>Generate your marksheet</title>
  <base href="http://localhost/Marksheet/adminHome.php" />
<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>   
<style>
/* Sticky footer styles
-------------------------------------------------- */
html {
  position: relative;
  min-height: 100%;
}
body {
  /* Margin bottom by footer height */
  margin-bottom: 40px;
}
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 40px;
  /*background-color: #f5f5f5;*/
  background-color: #2fc2ef;
}

.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active >   
 a:hover, .navbar-default .navbar-nav > .active > a:focus {
color: white; /*BACKGROUND color for active*/
background-color: #030033;
}

  .navbar-default {
    background-color: #51ef63;
/*    background-color: #282828;
*/    border-color: #030033;
}

  .dropdown-menu > li > a:hover,
   .dropdown-menu > li > a:focus {
    color: #262626;
   text-decoration: none;
  background-color: #66CCFF;  /*change color of links in drop down here*/
   }

 .nav > li > a:hover,
 .nav > li > a:focus {
    text-decoration: none;
    background-color: silver; /*Change rollover cell color here*/
  }


  .navbar-default .navbar-nav > li > a {
   color: white; /*Change active text color here*/
    }

</style>
</head>
<body role="document">
 <!-- Fixed navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand brand-name" href="adminHome.php" style="color:white;">
            	<strong>
               G M
              </strong>
            </a>
            </div>
            <div class="navbar-collapse navbar-left collapse">
            <ul class="nav navbar-nav ">
              <li><a href="index.php">Add Student Entry</a></li> 
              <li><a href="admin/editAdmin.php?action=aedit&aid=<?php echo $_SESSION['loggedInId'] ?>">Edit Your Profile</a></li> 
              <li><a href="" data-toggle="modal" data-target="#myModal">Help</a></li>                      
            </ul>
          </div>
          <div class="navbar-collapse navbar-right collapse">
            <ul class="nav navbar-nav ">
              <li><a href="adminHome.php">Home</a></li> <!-- li class="active" to highlight active link -->
              <li><a href="admin/adminList.php">Admins</a></li>
              <li><a href="student/studentList.php">Students</a></li>
              <li><a href="adminLogout.php" onclick="return confirm('Are you sure to logout?');">Log Out  <span class="glyphicon glyphicon-log-out"></span></a></li>
             
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>

<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#00FF00;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">HELP</h4>
        </div>
        <div class="modal-body" style="font-size:20px;">
          <li>No login  required to enter marks</li>
          <li>Login to go to Student panel and Admin panel</li>
          <li>View, Edit, Delete and Generate Marksheet in student panel</li>
          <li>Add and delete Admin in Admin panel. (Note: Admin can edit his/her own profile only)</li>
          <li>Generated marsheets are stored in result folder</li>
          <li>Once a marksheet is generated, it can be emailed to the particular student using admin credentials</li>
          <li>Please make sure to logout once done</li>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>