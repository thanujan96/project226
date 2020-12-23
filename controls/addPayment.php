<?php 
include '../config.php';
session_start();
if(!$_SESSION['user'])
{
	header("location:/");
}
if($_SERVER["REQUEST_METHOD"] == 'POST')
{

    $username = $_SESSION['user'];
    $CourseId=$_POST['CourseId'];
    $amount=$database->getCourseFee($CourseId);
    $L = $database->addPayment($amount,$username,$CourseId);
    if($L==1){
        echo $database -> addEntrollment($CourseId,$username);
    }
    else{
        echo $L;
    }
}
?>