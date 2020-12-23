<?php 


include '../config.php';
session_start();
if(@$_SESSION['user']){
    if($_SERVER["REQUEST_METHOD"] == 'GET')
    {
        $id = $_GET['courseId'];
        $rows = $database->getCourse(intval($id));
       if($rows!=false){
        foreach ($rows as $row) {
        
            echo "<div class='row row-content'>
        <div class='col-12'>
            <h2 class='h1 font-monospace bg-light'>".$row['CourseName']."</h2>
        
        <div class='col-8 d-flex justify-content-center row-content'>
                <img src='../../uploads/".$row['imageName']."' class='img-fluid d-flex w-50 h-50 ' alt='' srcset=''>
        </div>
        </div>
        <div class='row row-content'>
            <div class='col-12'>
            <h3 class='h2 font-monospace bg-light'>Describtion</h3>
            </div>
            
            <div class='text-wrap text-break fw-bold col-12 order-md-1 '>
            ".$row['CourseDescribtion']."
            </div>
            <div class='col-12 d-flex justify-content-center align-items-center m-0 p-0'>
            <button id='paybtn".$id."' onClick='pay()' class='btn btn-primary btn-lg button'>pay ".$row['fees']." Rs.</button>
            
            
            </div>
        </div>
            
        <div class='row row-content'>
            <div class='col-12'>
            <h3 class='h2 font-monospace bg-light'>Skils that you have to develop list</h3>
            </div>
            <div class='text-wrap text-break fw-bold col-12 order-md-1 '>
                
            </div>
        </div>
        <div class='row row-content'>
            <div class='col-12'>
                <h3 class='h2 font-monospace bg-light'>".$row['FirstName']." ".$row['LastName']."</h3>
            </div>
            <div class='text-wrap text-break fw-bold col-12 '>
            ".$row['Aboutme']."
            </div>
            <div class='col-12 d-flex justify-content-end'>
            <div class='col-12 card' style='width: 18rem;'>
    
                <div class='card-body'>
                    <h5 class='card-title'> CONTACT DETAILS</h5>
                    <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <ul class='list-group list-group-flush'>
                    <li class='list-group-item'>".$row['PhoneNumber']."</li>
                    <li class='list-group-item'>".$row['Email']."</li>
                    <li class='list-group-item'>".$row['Address']."</li>
                </ul>
                </div>
            </div>
        </div>
    </div>";
    return;
        }
    }
    }
    else{
        echo 0;
    }
}
else{
    header("location:/"); 
}

    
?>