<?php 

class Database{
    public $server = "localhost";
	public $username = "root";
	public $password = "";
	public $dbname = "Tution";
    public $DB;
    
    function __construct(){
        $this->DB = new mysqli($this->server,$this->username,$this->password,$this->dbname);
        if($this->DB->connect_error)
        {
          die("db connection failed!");
        }
    }

    private function makeInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
    }
    public function info(){
        return $this->DB->server_info;
    }

    public function isUserValid($username,$password)
	{

        $username= $this->makeInput($username);
        $password= $this->makeInput($password);

		$isUserExist_check = "select * from User where UserName='$username' and password='$password'";
        $isUserExist_run = $this->DB->query($isUserExist_check);
        $isUserExist_num =$isUserExist_run->num_rows;
		if($isUserExist_num==1){
            $row = $isUserExist_run->fetch_assoc();
            return $row["Type"];
		}
		return False;
    }
    public function userCheck($username)
	{
        $username= $this->makeInput($username);
		$userCheck_check = "select * from User where UserName='$username'";
        $userCheck_run = $this->DB->query($userCheck_check);
        
        $userCheck_num =$userCheck_run->num_rows;
		if($userCheck_num=='1'){
            return 1;
		}
		return 0;
    }
    public function addUser($username,$password,$type){
        $username= $this->makeInput($username);
        $password= $this->makeInput($password);
        $type= $this->makeInput($type);
		$addUser_query = "INSERT INTO User (`UserName`, `Password`, `Type`) VALUES ('$username','$password','$type')";
        $addUser_run = $this->DB->query($addUser_query);
		return $addUser_run;
    }
    public function addUserInfo($type, $username, $password,$firsName, $lastName, $email, $address,  $phoneNum,  $aboutMe){
        $result=$this->addUser($username,$password,$type);
        if($result==1){
            switch($type){
                case "Student":
                    $addUserInfo_query = "INSERT INTO Student ( `FirstName`, `LastName`, `Address`, `Email`, `PhoneNumber`, `UserName`, `AboutMe`) VALUES ( '$firsName', '$lastName', '$address', '$email', '$phoneNum', '$username', '$aboutMe') ";
                    break;
                case "Lecturer":
                    $addUserInfo_query="INSERT INTO Lecturer ( `FirstName`, `LastName`, `Email`, `Address`, `PhoneNumber`, `UserName`, `AboutMe`) VALUES ( '$firsName', '$lastName', '$email', '$address',  '$phoneNum', '$username', '$aboutMe')";
                    break;
            }
            $addUserInfo_run = $this->DB->query($addUserInfo_query);
            return $addUserInfo_run;
    }
    return False;
    }
    public function addCourse($type,$username, $CourseName, $CourseDescribtion, $Durarion, $imageName,$category,$fees,$fullCourseDescribtion){
        if($type=='Lecturer'){
            $addCourse_query = "INSERT INTO Courses( `CourseName`, `CourseDescribtion`, `Durarion`, `imageName`, `UserName`, `category`, `fees`, `fullCourseDescribtion`) VALUES ( '$CourseName', '$CourseDescribtion', '$Durarion', '$imageName','$username','$category','$fees','$fullCourseDescribtion')";
            $addCourse_run = $this->DB->query($addCourse_query);
            return $addCourse_run;
        }
        else {
            return False;
        }
    }

    public function getCategory(){
        $getCourse_query = "SELECT DISTINCT category FROM Courses";
       
        $getCourse_run =  $this->DB->query($getCourse_query);
        $getCourse_rows =  $getCourse_run->fetch_all(MYSQLI_ASSOC);
        return $getCourse_rows;
        // $getCourse_num = $getCourse_run->num_rows;
        // if($getCourse_num>=1){
        //     echo "hi";
        //     return $getCourse_rows;
        // }
        // return False;
        
    }
    public function getCourses($category){
        $fetchCourses_query = "SELECT DISTINCT * FROM Courses where Courses.category='$category'";
        $fetchCourses_run =  $this->DB->query($fetchCourses_query);
        $fetchCourses_rows =  $fetchCourses_run->fetch_all(MYSQLI_ASSOC);
        return $fetchCourses_rows;
    }
    public function getCourse($ID){
        $getCource_query = "SELECT DISTINCT * FROM Courses LEFT JOIN  Lecturer  ON Lecturer.UserName=Courses.UserName WHERE CourseId=$ID";
        $getCource_run =  $this->DB->query($getCource_query);
        $getCource_rows =  $getCource_run->fetch_all(MYSQLI_ASSOC);
        return $getCource_rows;
    }

    public function addPayment($amount,$username,$courseId){
        if($this->checkPayment($username,$courseId)){
            return "already paid!";
        }
        else{
        $date = date('Y-m-d H:i:s');
        $addPayment_query= "INSERT INTO `Payment`(`Amount`, `Date`, `UserName`, `Paid`,`CourseId`) VALUES ('$amount','$date','$username','1','$courseId')";
        
        $addPayment_run = $this->DB->query($addPayment_query);
        return $addPayment_run; 
        }       
    }

    public function checkPayment($username,$courseId){
        $checkPayment_query= "SELECT * FROM Payment WHERE UserName='$username' AND CourseId='$courseId'";
        $checkPayment_run = $this->DB->query($checkPayment_query);
        return ($checkPayment_run->num_rows==1);        
    }

    public function checkEntrollment($courseId,$username){
        $checkEntrollment_query = "SELECT * FROM `Enrollment`,`Payment` WHERE `Enrollment`.PaymentId=Payment.PaymentId AND Enrollment.CourseId='$courseId' and Enrollment.UserName='$username' and Payment.Paid=1 ";
        $checkEntrollment_run =  $this->DB->query($checkEntrollment_query);
        $checkEntrollment_rows =  $checkEntrollment_run->fetch_all();
        $checkEntrollment_num = $checkEntrollment_run->num_rows;
        if($checkEntrollment_num==1){return 1;}
        else {return 0;}
    }

    public function addEntrollment($courseId,$username){
        $payement_query="SELECT `PaymentId` FROM `Payment` WHERE Payment.UserName='$username' AND Payment.CourseId='$courseId' AND Payment.Paid='1'";
        $payement_run =  $this->DB->query($payement_query);
        $payement_rows =  $payement_run->fetch_all(); 
        $payement_num = $payement_run->num_rows;
        if($payement_num==1){
            $addEntrollment_query = "INSERT INTO `Enrollment`(`PaymentId`, `UserName`, `CourseId`) VALUES ('".$payement_rows[0][0]."','$username','$courseId')";
            $addEntrollment_run =  $this->DB->query($addEntrollment_query);
            //echo "hello......strval()','$username','$courseId'";
            //echo $addEntrollment_run;
            if($addEntrollment_run==1){echo 1;}
            else {echo 0;}
        }
        else{
            echo "Failed!";
        }
        
    }

    public function getCourseFee($Id){
        $getCourseFee_query = "SELECT `fees` FROM `Courses` WHERE `CourseId`='$Id'";
        $getCourseFee_run =  $this->DB->query($getCourseFee_query);
        $getCourseFee_rows =  $getCourseFee_run->fetch_all();
        $getCourseFee_num = $getCourseFee_run->num_rows;
        if($getCourseFee_num==1){return $getCourseFee_rows[0][0];}
        else {echo 'Fail';}
    }

    public function fetchLecturerCourses($username){
        $fetchLecturerCourses = "SELECT * FROM Courses where Courses.UserName='$username'";
        $fetchLecturerCourses_run =  $this->DB->query($fetchLecturerCourses);
        $fetchLecturerCourses_rows =  $fetchLecturerCourses_run->fetch_all(MYSQLI_ASSOC);
        return $fetchLecturerCourses_rows;
    }

    public function fetchStudentCourses($username){
        $fetchStudentCourses_query = "SELECT * FROM Enrollment LEFT JOIN Courses ON Courses.CourseId=Enrollment.CourseId WHERE Enrollment.UserName='$username'";
        $fetchStudentCourses_run =  $this->DB->query($fetchStudentCourses_query);
        $fetchStudentCourses_rows =  $fetchStudentCourses_run->fetch_all(MYSQLI_ASSOC);
        return $fetchStudentCourses_rows;
    }
    public function removeEntrollment($username,$CourseId){
        $removeEntrollment_query = "DELETE FROM `Payment` WHERE UserName='$username' AND CourseId='$CourseId'";
        $removeEntrollment_run =  $this->DB->query($removeEntrollment_query);
        return $removeEntrollment_run;
    }

    public function removeCourses($username,$CourseId){
        $removeCourses_query = "DELETE FROM `Courses` WHERE UserName='$username' AND CourseId='$CourseId'";
        $removeCourses_run =  $this->DB->query($removeCourses_query);
        return $removeCourses_run;
    }
    public function getNumEntrollments(){
        $getNumEntrollments_query = "SELECT * FROM `Enrollment`";
        $getNumEntrollments_run =  $this->DB->query($getNumEntrollments_query);
        return $getNumEntrollments_run->num_rows;
    }
    public function getNumLecturers(){
        $getNumLecturers_query = "SELECT * FROM `Lecturer`";
        $getNumLecturers_run =  $this->DB->query($getNumLecturers_query);
        return $getNumLecturers_run->num_rows;
    }
    public function getNumCourses(){
        $getNumCourses_query = "SELECT * FROM `Courses`";
        $getNumCourses_run =  $this->DB->query($getNumCourses_query);
        return $getNumCourses_run->num_rows;
    }
    public function getNumStudents(){
        $getNumStudents_query = "SELECT * FROM `Student`";
        $getNumStudents_run =  $this->DB->query($getNumStudents_query);
        return $getNumStudents_run->num_rows;
    }
    public function getUser($username,$type){
        if($type=='Lecturer'){
            $getUser_query = "SELECT * FROM `Lecturer` WHERE UserName='$username'";
            $getUser_run =  $this->DB->query($getUser_query);
            $getUser_rows =  $getUser_run->fetch_all(MYSQLI_ASSOC);
            $getUser_row_num=$getUser_run->num_rows;
            if($getUser_row_num==1){
                return $getUser_rows;
            }
            else{
                return "error in numberOfRows";
            }
        }
        else if($type=='Student'){
            $getUser_query = "SELECT * FROM `Student` WHERE UserName='$username'";
            $getUser_run =  $this->DB->query($getUser_query);
            $getUser_row_num=$getUser_run->num_rows;
            $getUser_rows =  $getUser_run->fetch_all(MYSQLI_ASSOC);
            if($getUser_row_num==1){
                return $getUser_rows;
            }
            else{
                return "error in numberOfRows";
            }
        }
        else
            return "error type";
    }

    public function changePassword($username,$password){
        $changePassword_query = "UPDATE `User` SET Password='$password' WHERE UserName='$username'";
        $changePassword_run =  $this->DB->query($changePassword_query);
        return $changePassword_run;
    }


}
// echo "hllo";

 $database = new Database();
 $mymail;                    
 $mypassword; 

?>
