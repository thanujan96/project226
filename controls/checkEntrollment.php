<?php 


include '../config.php';
session_start();
if(@$_SESSION['user'])
{
    if($_SERVER["REQUEST_METHOD"] == 'GET')
    {

        $courseId = $_GET['CourseId'];
        $username = $_SESSION['user'];
        
        $L = $database->checkEntrollment($courseId,$username);
        echo $L;
    }
    else{
        echo 0;
    }
}
else {
    header("location:../");
}

?>