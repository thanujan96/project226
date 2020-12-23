<?php

include '../config.php';
session_start();

if(@$_SESSION['user']){
  if(@$_SESSION['type']){
    if($_SERVER["REQUEST_METHOD"] == 'POST'  )
    {
        
        $CourseName = $_POST['CourseName'];
        $CourseDescribtion = $_POST['CourseDescribtion'];
        $Durarion = $_POST['Duration'];
        $imageName = $_POST['imageName'];
        $username=$_SESSION['user'];
        $type=$_SESSION['type'];
        $category=$_POST['category'];
        $fees=$_POST['fees'];
        $fullCourseDescribtion=$_POST['fullCourseDescribtion'];
        $L=$database->addCourse($type,$username, $CourseName, $CourseDescribtion, $Durarion, $imageName,$category,$fees,$fullCourseDescribtion);
        echo $L;
      }
      else{
        echo 0;
      }
  }
  
  else {
      echo "<script>alert('Login as a lecturer to add course')</script>";
  }
}
else{
  header("location:/");
}


?>