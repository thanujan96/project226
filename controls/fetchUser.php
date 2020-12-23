<?php 


include '../config.php';
if($_SERVER["REQUEST_METHOD"] == 'GET')
{
    session_start();
    if ($_SESSION['user']) {
        $username=$_SESSION['user'];
        $type=$_SESSION['type'];
        $rows = $database->getUser($username,$type);
    
    foreach ($rows as $value) {
            echo "
            <li class='list-group-item text-muted' contenteditable='false'>My detail</li>
            <li class='list-group-item text-end'><span class='d-flex text-start'><strong >Name</strong></span> ".$value['FirstName']." ".$value['LastName']."</li>
            <li class='list-group-item text-end'><span class='d-flex text-start'><strong >Occupation</strong></span> ".$type."</li>
            <li class='list-group-item text-end'><span class='d-flex text-start'><strong >Phone Number</strong></span> ".$value['PhoneNumber']."</li>
            <li class='list-group-item text-end'><span class='d-flex text-start'><strong >Email </strong></span>". $value['Email']."</li>
            <li class='list-group-item text-end'><span class='d-flex text-start'><strong >Address </strong></span> ". $value['Address']."\</li>
            <li class='list-group-item text-end'><span class='d-flex text-start'><strong >AboutMe </strong></span> ". $value['AboutMe']."\</li>
        
        ";
    }
    }
    else{
        header("location:/"); 
    }
    
    // if ($rows!=False) {
        
    // }
}
else{
    echo 0;
}
?>