<?php 


include '../config.php';
session_start();
if($_SESSION['user']){
    if($_SERVER["REQUEST_METHOD"] == 'GET')
    {
        $rows = $database->getCategory();
        foreach ($rows as $value) {
            $courseRows=$database->getCourses($value['category']);
            echo "<div class='row row-content'>
            <h1 class='h2 text-success text-bold '>"
                .$value['category'].
            "</h1> <hr class='hr'>";
            foreach ($courseRows as $row) {
                echo "
            <div class='col-12 col-sm-4 col-md-2 card-row'>
                <div class='card card-body-down text-white bg-dark' id='".strval($row['CourseId'])."card'>
                    <h5 class='card-title'>".$row['CourseName']."</h5>
                    <img class='card-img-top img-thumbnail' src='../uploads/".$row['imageName']."' alt='".$row['imageName']."';>
                    <div class='card-body bg-dark'>
                    
                    <p class='card-text'>".$row['CourseDescribtion']."</p>
                    <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>
                    </div>
                    <div class='moreBtn d-flex  justify-content-center' >
                        <a class='btn btn-outline-light d-flexw w-100' href='course?courseId=".strval($row['CourseId'])."' role='button' id='".strval($row['CourseId'])."btn'>
                        <i class='fa fa-angle-double-right' aria-hidden='true'></i>
                        Entroll
                        </a>
                    </div>
                </div>
            </div>
            ";
            }
            echo "</div>";
        }
    }
}
else{
    header("location:/"); 
}
?>