<?php

include '../config.php';

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
//require 'vendor/autoload.php';
if($_SERVER["REQUEST_METHOD"] == 'POST')
{

    $email=$_POST['email'];
    $username=$_POST['username'];
    

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(false);
        $rand= rand(1000,10000);

        session_start();
        $_SESSION['code']=$rand;
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = $mymail;                     // SMTP username
            $mail->Password   = $mypassword;                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->SMTPSecure='ssl';
            //Recipients
            $mail->setFrom($mymail);
            $mail->addAddress($email);     // Add a recipient
        
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'password reset code';
            $mail->Body    = "mr. "."$username"." <br><hr>your code is <b>".$rand."</b>";
            $mail->AltBody = 'OnileTution';
            $mail->SMTPDebug = false; 
            $mail->send();
            
            echo "<form>
            <div class='mb-3'><label for='Entercode' class='form-label'>Enter Code : </label>
                <input type='text' class='form-control userValid' id='Entercode' placeholder='code' aria-describedby='Entercode' required>
                
            </div>
            <div class='mb-3'>
                
                <button type='submit' onClick='verifyCode(event)' class='btn btn-primary'>Submit</button>
            </div> 
            <form>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
}
?>