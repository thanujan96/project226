<?php

include '../config.php';
if($_SERVER["REQUEST_METHOD"] == 'POST')
{

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phoneNumber =$_POST['phoneNumber'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $type=$_POST['type']; 
    $about=$_POST['about']; 
    
  if($username!="" || $password!="") 
  { 
    $L=$database->addUserInfo($type, $username, $password,$firstname, $lastname, $email, $address,  $phoneNumber, $about);
    echo $L;
  }
  echo False;
}
else{
  echo 0;
}
?>