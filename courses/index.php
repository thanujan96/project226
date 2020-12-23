<?php
      session_start();
      if(!$_SESSION['user']){
        header("location:../");
      }
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/jquery-file-upload/4.0.11/jquery.uploadfile.min.js.html">
    <link rel="stylesheet" href="../css/styles.css">
    <script src='main.js'></script>
    
</head>
<body> 
  <div>

</div>
    <header>
    <nav class="navbar navbar-expand-lg sticky-top d-flex w-100 bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="/project226/">OnlineTution</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav nav nav-pills nav-fill me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/project226/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="/project226/aboutus">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="/project226/contactus">Contact Us</a>
            </li>
            <li class="nav-item ">
            <a class='nav-link active' href='/project226/courses'>Courses</a>
            </li>
            <li class="nav-item">
            <a class='nav-link' href='/project226/user'>User</a>
            </li>
            
          </ul>
          <form class="d-flex">
            <input class='form-control me-2' type='search' placeholder='Search' aria-label='Search'>
            <button class='btn btn-outline-success' type='submit'>Search</button> 
     
          </form>
          <li class="nav-item">
              <button type='button' class='btn  btn-lg btn-primary m-2' onClick='logout()' id='logoutBtn'>
                Logout
              </button>
          </li>
          
        </div>
      </div>
    </nav>
    <nav aria-label="breadcrumb row-content " style="margin-top:10vh">
      <ol class="breadcrumb p-3 bg-light h5" style="background-color:#ccc7c6;">
        <li class="breadcrumb-item "><a href="/project226/">Home</a></li>
        <li class="breadcrumb-item active"><a>Courses</a></li>
      </ol>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col m-4">
        <button class="btn btn-primary"  id='addCourseBtn'  data-bs-toggle='modal' data-bs-target='#courseRegsiter' style="top:100px;right:50px;position:fixed;box-shadow:0px 5px 20px 15px rgba(50, 50, 50, 0.85);">
          <i class="fa fa-plus-square-o fa-5x" aria-hidden="true"></i>
        </button>
        </div>
      </div>
    </div>
    
    <div class="row">
    
    <?php
    //
      // if ($_SESSION['user'] && $_SESSION['type']=='Lecturer' ) {
      //   echo "<button type='button' class='btn btn-primary' >
      //   ADD COURSE
      // </button>";
      // }
    ?>

      <!-- Modal -->
      <div class="modal fade" id="courseRegsiter" tabindex="-1" aria-labelledby="courseRegsiter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content ">
            <div class="modal-header">
              <h5 class="modal-title" id="courseRegsiterLabel">Registeration Form</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="imageUploadForm" method="post" class="needs-validation"  enctype="multipart/form-data" novalidate>
                  Select image to upload:
                  <img  id="imguploaded" src="" alt=""width="50px" height="50px">
                  <input type="file" name="fileToUpload" id="fileToUpload" required>
                  <button type="submit" id="btn">upload</button>
              </form>
              <form id="courseRegisterForm" method="post" class="needs-validation"  novalidate>
            
                <div class="mb-3">
                  <label for="CourseName" class="form-label">Course name </label>
                  <input type="text" class="form-control" id="CourseName" name="CourseName" placeholder="course name" aria-describedby="first name" required>
                </div>
                <div class="mb-3">
                  <label for="Duration" class="form-label">Duration </label>
                  <input type="number" class="form-control" id="Duration"  name="Duration" placeholder="Duration(months)" aria-describedby="Duration" required>
                </div>
                <div class="mb-3">
                  <label for="category" class="form-label">Category</label>
                  <input type="text" class="form-control" id="category" name = "category" placeholder="category" aria-describedby="cattegory" required>
                </div>
                <div class="mb-3">
                  <label for="imageName" class="form-label">Course Image Name </label>
                  <input type="text" class="form-control" id="courseImage" placeholder="course Image Name" name="imageName" aria-describedby="first Image" disabled>
                </div>
                <div class="mb-3">
                  
                  
                </div>
                <div class="mb-3">
                  <label for="CourseDescribtion" class="form-label">Course Describtion</label>
                  <input type="text-area" class="form-control" id="CourseDescribtion" placeholder="Course Describtion" aria-describedby="CourseDescribtion" required>
                </div>
                
                <div class="mb-3">
                  <label for="fullCourseDescribtion" class="form-label">Full Course Describtion</label>
                  <input type="text-area" class="form-control" id="fullCourseDescribtion" placeholder="fullCourseDescribtion(1000wrds)" aria-describedby="fullCourseDescribtion" required>
                </div>

                <div class="mb-3">
                  <label for="fees" class="form-label">Course Fee</label>
                  <input type="text-area" class="form-control" id="fees" placeholder="Course Fee" aria-describedby="fees" required>
                </div>

                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                  <label class="form-check-label" for="sformCheck">Agree to terms and conditions</label>
                  <div class="invalid-tooltip">
                    You must agree before submitting.
                  </div>
                </div>
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      
    </div>
    <div class="container-fluid " id="courseMain"></div>
    

    
    </header>
   
    <footer class="page-footer font-small cyan darken-3 container-fluid p-3" id="footer">

<!-- Footer -->
		<div class="container-fluid ">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>OnlineTution</h5>
					<div class="text-white text-justify text-bold">descriptasdfffffffffffffffffffffffion
            asddddddddddddddddddddddddddddddddddddddddd
          </div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>AboutUs</a></li>
            <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>ContactUs</a></li>
            <?php
            session_start();
            if($_SESSION['user']){
                echo "<li><a href='https://www.fiverr.com/share/qb8D02'><i class='fa fa-angle-double-right'></i>Courses</a></li>";
                echo "<li><a href='https://www.fiverr.com/share/qb8D02'><i class='fa fa-angle-double-right'></i>User</a></li>";
            }
            else{
              
            }
            
            ?>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
          <h5 class="text-center">Get Started</h5>
          <div class="text-white">Get access to view full Courses.......</div>
					<div class="text-white d-flex justify-content-center">
            <button type="button" class="btn  btn-lg btn-success m-2" data-bs-toggle="modal" data-bs-target="#dropdownMenuButton">
              Register
            </button>
          </div>
          <div class="text-white">Contact Details.......</div>
					<div class="text-white d-flex justify-content-center">
            
          </div>
          </div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-google-plus"></i></a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
				<hr>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p><u><a href="https://www.nationaltransaction.com/">National Transaction Corporation</a></u> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
					<p class="h6">© All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Sunlimetech</a></p>
				</div>
				<hr>
			</div>	
		</div>
</footer>
    <script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">
      function logout(){
        $.ajax({
            url: '../controls/logout.php',
            type: 'GET',
            success:function(result){
              if(result==1){
                window.location.href="/project226/";
              }
                
            },
            error:function (e){console.log("error",e.statusText);}
            });
      }
    </script>
    <script >
    $(function(){
      $('.card-body-down').hover(function(){
        $(this).find('.btn').slideDown(250);
       },function(){
        $(this).find('.btn').slideUp(250); //.fadeOut(205)
       });
     })

  </script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
    function load() {
        $.ajax({ //create an ajax request to load_page.php
            type: "GET",
            url: "../controls/fetchCourses.php",
            dataType: "html", //expect html to be returned                
            success: function (response) {
                $("#courseMain").html(response);
                //setTimeout(load, 1000)
            }
        });
    }
    load(); 
  });
  </script>
  <!-- <script type="text/javascript">
  function upload(e){
    e.preventDefault();
    var formData = new FormData();
    formData.append('file', $('#fileToUpload')[0].files[0]);
    console.log(formData);
    $.ajax({
          url : 'upload.php',
          type : 'file',
          data : formData,
          processData: false,  // tell jQuery not to process the data
          contentType: false,  // tell jQuery not to set contentType
          success : function(data) {
              console.log(data);
              alert(data);
          }
    });
  };
  $(document).ready(function (e) {
    $('#imageUploadForm').on('submit',(function(e) {
        e.preventDefault();
        
    }));

    
});

    // $("#ImageBrowse").on("change", function() {
    //     $("#").submit();
    // });
    
  //   load(); //if you don't want the click
  //  // $("#display").click(load); //if you want to start the display on click
  // });
  </script> -->
  <script  type="text/javascript">
    $(document).ready(function (event) {
     $('#courseRegisterForm').on('submit',function(event){
    event.preventDefault();
    var CourseName = $('#CourseName').val();
    var Duration = $('#Duration').val();
    var category = $('#category').val();
    var imageName = $('#courseImage').val();
    var CourseDescribtion =$('#CourseDescribtion').val();
    var fees =$('#fees').val();
    var fullCourseDescribtion =$('#fullCourseDescribtion').val();

    $.ajax({                                                    
          url: '../controls/addCourse.php',
          type: 'post',
          data: jQuery.param({CourseName:CourseName ,Duration:Duration ,category:category ,imageName:imageName ,CourseDescribtion:CourseDescribtion,fees:fees,fullCourseDescribtion:fullCourseDescribtion}),
          success: function(response){
            console.log(response);
            if(response==1){
              location.reload(); 
            }
          },
          error:function(error){console.log(error.statustext);}
        });
  });
 });
  </script>
  <script>
 $(document).ready(function (event) {
$('#imageUploadForm').on('submit',function upload(event){
  event.preventDefault();
  var fd = new FormData();
  var files = $('#fileToUpload')[0].files;
  
  // Check file selected or not
  if(files.length > 0 ){
      fd.append('file',files[0]);

      $.ajax({
        url: '../controls/upload.php',
        type: 'post',
        data: fd,
        contentType: false,
        processData: false,
        success: function(response){
          console.log();
          
          //console.log($_FILES['file']['name']);
            if(response != 0){
              console.log("hi",response.substring(1));
                 $("#imguploaded").attr("src",response.substring(1)); 
                $("img").show(); 
                $('#courseImage').val(response.substring(13));
            }else{
              alert('file not uploaded');
            }
        },
      });
  }else{
      alert("Please select a file.");
  }
});
});
 

  </script>


<script type="text/javascript">
$(document).ajaxStart(function(){
      console.log("ajax call start");
  $(this).html("<div class='spinner-border ' role='status'> <span class='sr-only'>Loading...</span></div>");});

</script>
  <!-- <script>
    $(document).ready(function (event) {
       function entroll(event){
          event.preventDefault();
              $.ajax({
                url: 'Course.php',
                type: 'get',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                  console.log();
                  
                  //console.log($_FILES['file']['name']);
                    if(response != 0){
                        $("#imguploaded").attr("src",response.substring(5)); 
                        $("img").show(); 
                        $('#courseImage').val(response.substring(13));
                    }else{
                      alert('file not uploaded');
                    }
                },
              });
          
        }});
  </script> -->
    
</body>
</html>