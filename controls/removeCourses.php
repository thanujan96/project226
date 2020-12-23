<?php 


include '../config.php';
if($_SERVER["REQUEST_METHOD"] == 'POST')
{
 session_start();
 $username = $_SESSION['user'];
 $CourseId = $_POST['CourseId'];
  if($username!="") 
  { 
    $flag = $database->removeCourses($username,$CourseId);
    if ($flag==1){
        echo 1;
    }
    else{
        echo 0;
    }
  }
}
?>