<?php 
include '../config.php';

if($_SERVER["REQUEST_METHOD"] == 'POST')
{
   
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $L = $database->changePassword($username,$password);
    echo $L;
}
?>