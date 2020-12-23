<?php

if($_SERVER["REQUEST_METHOD"] == 'GET')
{
  session_start();
  session_destroy();
  echo 1; 
}
else{
  echo 0;
}
  
?>