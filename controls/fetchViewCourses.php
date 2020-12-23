<?php 


include '../config.php';
if($_SERVER["REQUEST_METHOD"] == 'GET')
{
    session_start();
    $username=$_SESSION['user'];
    $type=$_SESSION['type'];
    if($type=='Lecturer'){
        echo "<h3 class='h3 bg-light'><br>".$username ."    Registered Courses</h3><br>";
        $rows = $database->fetchLecturerCourses($username);
    }
    else if($type=='Student'){
        echo "<h3 class='h3 bg-light'><br>".$username . "   Entrolled Courses</h3><br>";
        $rows = $database->fetchStudentCourses($username);
    }
    else{
        header("location:/"); 
    }
    echo "<table class='table'>
        <thead>
            <tr>
                <th>
                </th>
                <th>Course Id</th>
                <th>CourseName</th>
                <th>Durarion</th>
                <th>category</th>
                <th>fees</th>
                <th> </th>
            </tr>
        </thead>
        <tbody>";
        foreach ($rows as $value) {
            
           echo "<tr id='".$value['CourseId']."row'>
                   <td>
                      
                   </td>
                   <td>
                    ".$value['CourseId']."
                   </td>
                   <td>".$value['CourseName']."</td>
                   <td>".$value['Durarion']."</td>
                   <td>".$value['category']."</td>
                   <td>
                   ".$value['fees']."
                  </td>
                  <td>
                  <button class='btn btn-danger' ";
                  echo "onClick='".$id = ($type=='Lecturer') ? "removeCourse(".$value['CourseId'].")" : "removeEnroll(".$value['CourseId'].")";
                  echo "'>***</button>
                   </td>
               </tr>";
        }
        echo "</tbody></table>";
    
    }
    // if ($rows!=False) {
        
    // }
// }
?>