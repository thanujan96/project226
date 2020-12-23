<?php 


if($_SERVER["REQUEST_METHOD"] == 'POST')
{
   session_start();
   if($_SESSION['code'] ){
    $value = $_POST['code'];
    $code=$_SESSION['code'];
    if($value == $code) 
    { 
      echo"<div class='mb-3'>
      <label for='usernameC' class='form-label'>User name :</label>
      <input type='text' placeholder='user name' class='form-control' id='usernameC' required>
    </div>
    <div class='mb-3'>
      <label for='passwordC' class='form-label'>Enter new password :</label>
      <input type='password' placeholder='Password' class='form-control' id='passwordC' required>
    </div>
    <div class='mb-3'>
        <button type='submit' onClick='changePassword(event)' class='btn btn-primary'>Change password</button>
    </div>
    " ;
    }
    else{
        echo "<script>alert('wrong code!');window.location.href='/project226/';</script> ";
    }
   }
 
  else{
    echo "<script>alert('time out!');window.location.href='/project226/';</script> ";
  }
}
?>