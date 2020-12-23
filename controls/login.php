<?php 


include '../config.php';
session_start();
if(@$_SESSION['user'])
{
	header("location:courses");
}

if($_SERVER["REQUEST_METHOD"] == 'POST')
{

    $username = $_POST['username'];
    
    $password = $_POST['password']; 
    
  if($username!="" || $password!="") 
  { 
    $L = $database->isUserValid($username,$password);
    if($L=='Student' || $L=='Lecturer')
    { 
      $_SESSION['user']=$username;
      $_SESSION['type']=$L;
      echo $L;
    }
    else
    {
      echo 0;
    }
  }
}
else{
  echo 0;
}
?>