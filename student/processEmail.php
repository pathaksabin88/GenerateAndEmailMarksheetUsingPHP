<?php
require_once('../libs/phpmailer/class.phpmailer.php');
require_once("../libs/phpmailer/class.smtp.php");
require '../libs/phpmailer/PHPMailerAutoload.php';
require '../libs/PHPWord/vendor/autoload.php';
include("../functions.php");


if(isset($_POST['psubmit'])){
   if(isset($_GET['sroll'])&&isset($_GET['semester'])&&isset($_GET['term'])){
       $condition = ['sroll'=>$_GET['sroll'],'semester'=>$_GET['semester'],'term'=>$_GET['term']];
       $result =listWhere(MARKS_TABLE,$condition); // we do have function listAll($tableName) to return all rows from given table in functions.php
				if(total_rows($result)>0){ //total_rows() function in functions.php
					while ($row = fetch_array($result)) { 
						$sroll = $row['sroll'];
						$sname = $row['sname'];
						$semail = $row['semail'];
						$semester = $row['semester'];
						$term = $row['term'];
						$toc = $row['toc'];
						$sad = $row['sad'];
						$dbms = $row['dbms'];
						$cg = $row['cg'];
						$cs = $row['cs'];
						$tw = $row['tw'];
					}
				}
			}
		}
		$senderpassword = $_POST['epassword'];
        $docname = $sroll."_".$sname."_".$semester."_".$term."_marksheet.docx";
        $senderemail = $_SESSION['loggedInEmail'];
        $sendername = $_SESSION['loggedInName'];
        $mailer = new PHPMailer();
	    $mailer->IsSMTP();
	    $mailer->SMTPSecure = 'tls';
	    $mailer->Host = 'smtp.gmail.com';
		$mailer->SMPTDebug = 2;
		$mailer->Port = 587;
		$mailer->Username = $senderemail;
		$mailer->Password = $senderpassword;
		$mailer->SMTPAuth = true;
		$mailer->From = $senderemail;
		$mailer->FromName = $sendername;
		$mailer->Subject = "Marksheet - $term - $semester";
		$mailer->Body= "Hello $sname,

	Your Marksheet of $term of $semester is attached below. Please find the attachment.

Regards,
ADMIN";
		$mailer->AddAddress($semail,$sname);
        $mailer->addAttachment('../result/'.$docname);


		//send the mail
		if($mailer->Send()){
		    $_SESSION['message'] = "Mail sent successfully to ".$semail;
		    redirect("studentList.php");
		}else{
		    $_SESSION['error'][] = "Error sending in mail to ".$semail;
		    redirect("studentList.php");
		}

?>


