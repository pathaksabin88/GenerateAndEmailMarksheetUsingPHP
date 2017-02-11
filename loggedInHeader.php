<!DOCTYPE html>
<html>
<head>
	<title>Generate your marksheet</title>
  <base href="http://localhost/Marksheet/" />
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
  background-color: #f5f5f5;
}
.navbar-default {
    /*background-color: #51ef63;*/
    background-color: #000000;
    border-color: #030033;
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
            <a class="navbar-brand brand-name" href="#" style="color:white;">
            	<strong>
               G M
              </strong>
            </a>
            </div>
            <div class="navbar-collapse navbar-left collapse">
                  <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Help</button>
            </div>
          <div class="navbar-collapse navbar-right collapse">
            <ul class="nav navbar-nav ">
                <button type="button" class="btn btn-info btn-lg" onclick="window.location.href='adminHome.php'">Already Logged In</button>
              <!-- <li><a href="adminHome.php">Already Logged IN  <span class="glyphicon glyphicon-log-in"></span></a></li> -->
             
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