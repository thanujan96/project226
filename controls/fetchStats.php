<?php 


include '../config.php';
if($_SERVER["REQUEST_METHOD"] == 'GET')
{
   $numCourse = $database->getNumCourses();
   $numLecturer= $database->getNumLecturers();
   $numStudents= $database->getNumStudents();
   $numEntroll= $database->getNumEntrollments();
    echo "<div class='col-10   my-4  mx-2 col-md-2 h-50 align-self-start' >
            <div class='stat-info text-center align-items-center 'style='height:100%;'>
              <h1 class='h1'>Students</h1>
              <hr class='hr'>
              <h3 class=' '><span class=''>"."$numStudents"."</span></h3>
              <div class='display-5' ><i class='fa fa-users fa-3x' ></i></div>
              
            </div>
          </div>

        <div class='col-10    my-4 mx-2 col-md-2 h-50  align-self-end' >
          <div class='stat-info text-center align-items-center 'style='height:100%;'>
            <h1 class='h1'>Courses</h1>
            <hr class='hr'>
            <h3 class=' '><span class='display-1'>"."$numCourse"."</span></h3>
            <div class='display-5' ><i class='fa fa-book fa-3x' ></i></div>
            
          </div>
        </div>
        <div class='col-10   my-4 mx-2 col-md-2  h-50  align-self-start' >
          <div class='stat-info text-center align-items-center 'style='height:100%;'>
            <h1 class='h1'>Enrollments</h1>
            <hr class='hr'>
            <h3 class=' '><span class=''>"."$numEntroll"."</span></h3>
            <div class='display-5' ><i class='fa fa-check-square-o fa-3x' ></i></div>
            
          </div>
        </div>
        <div class='col-10  my-4  mx-2 col-md-2  h-50  align-self-end'>
            <div class='stat-info text-center align-items-center 'style='height:100%;'>
                  <h1 class='h1'>Lecturer</h1>
                  <hr class='hr'>
                  <h3 class=' '><span class=''>"."$numLecturer"."</span></h3>
                  <div class='display-5' ><i class='fa fa-user-o fa-3x' ></i></div>
                  
            </div>
        </div>";
}
else{
  header("location:/"); 
}
?>