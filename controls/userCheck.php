<?php 


include '../config.php';
if($_SERVER["REQUEST_METHOD"] == 'GET')
{
    
 $username = $_GET['username'];
    
  if($username!="") 
  { 
    $flag = $database->userCheck($username);
    if ($flag==1){
        echo 1;
    }
    else{
        echo 0;
    }
  }
  else{
    echo "no usernaem";
  }
}
?>