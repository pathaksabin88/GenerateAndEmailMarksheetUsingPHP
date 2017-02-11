<?php
require_once('../libs/phpmailer/class.phpmailer.php');
require_once("../libs/phpmailer/class.smtp.php");
require '../libs/phpmailer/PHPMailerAutoload.php';
require '../libs/PHPWord/vendor/autoload.php';
include("../functions.php");

if((isset($_GET['action']))&&($_GET['action']='generate')){
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
		$total = $toc + $sad + $dbms + $cg + $cs + $tw;
		$percent = ($total/6);
        $docname = $sroll."_".$sname."_".$semester."_".$term."_marksheet.docx";
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../resource/marksheet.docx');
		$templateProcessor->setValue('sroll', $sroll);
		$templateProcessor->setValue('sname', $sname);
		$templateProcessor->setValue('semester', $semester);
		$templateProcessor->setValue('term', $term);
		$templateProcessor->setValue('toc', $toc);
		$templateProcessor->setValue('sad', $sad);
		$templateProcessor->setValue('dbms', $dbms);
		$templateProcessor->setValue('cg', $cg);
		$templateProcessor->setValue('cs', $cs);
		$templateProcessor->setValue('tw', $tw);
		$templateProcessor->setValue('total', $total);
		$templateProcessor->setValue('percent', $percent);
		$templateProcessor->saveAs('../result/'.$docname);
		$_SESSION['message'] = "Marksheet of ".$sname." successfully created ";
		redirect("studentList.php");
		/*if($templateProcessor->saveAs('../result/'.$docname)){
			$_SESSION['message'] = "Marksheet of ".$sname." successfully created ";
			redirect("studentList.php");
		}else{
			$_SESSION['error'][] = "Error in creating Marksheet of ".$sname." ";
			redirect("studentList.php");
		}*/
		


?>