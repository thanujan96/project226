
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>OnlineTution</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    
</head>
<body style="background-color: #eee;"> 
  
    <header id="">
    <nav class="navbar navbar-expand-lg sticky-top d-flex w-100">
      <div class="container-fluid">
        <a class="navbar-brand" href="/project226/">OnlineTution</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav nav nav-pills nav-fill me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/project226/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="/project226/aboutus">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="/project226/contactus">Contact Us</a>
            </li>
            <li class="nav-item">
            <?php
            session_start();
            if($_SESSION['user']){
                echo "<a class='nav-link' href='/project226/courses'>Courses</a>";
            }
            else{
              echo "";
            }
            ?>
              
            </li>
            <li class="nav-item">
            <?php
            session_start();
            if($_SESSION['user']){
                echo "<a class='nav-link' href='/project226/user'>User</a>";
            }
            else{
              echo "";
            }
            ?>
              
            </li>
            
          </ul>
          <form class="d-flex">
          <?php
            session_start();
            if($_SESSION['user']){
                echo "<input class='form-control me-2' type='search' placeholder='Search' aria-label='Search'>
                <button class='btn btn-outline-success' type='submit'>Search</button>";
            }
            else{
              echo "";
            }
            ?>
            
          </form>
        </div>
      </div>
    </nav>
    
    <div id="videoBg">
      <video  cover autoplay muted loop id="myVideo">
      <source src="Library.mp4"  type="video/mp4">
      </video>
    </div>
    <div class="jumbotron jumbotron-fluid  container-fluid ">
      <div class="row  d-flex w-100  align-items-center m-0 ">
        <div class="col-12 col-md-8 d-flex justify-content-center ">
            <div>
            <h1 class="display-4">Fluid jumbotron</h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
            </div>
        </div>
        <div class="col-12 col-md-4 d-flex justify-content-center justify-content-md-start ">
          <div class="button-group">
            <?php
            session_start();
            if($_SESSION['user']){
                echo "<button type='button' class='btn  btn-lg btn-primary m-2' onClick='logout()' id='logoutBtn'>
                Logout
              </button>";
            }
            else{
              echo "<button type='button' class='btn  btn-lg btn-primary m-2' data-bs-toggle='modal' data-bs-target='#loginBtn'>
              Login
            </button>";
            }
            
            ?>
            <button type="button" class="btn  btn-lg btn-success m-2" data-bs-toggle="modal" data-bs-target="#dropdownMenuButton">
              Register
            </button>
                <!-- Modal -->
                <div class="modal fade" id="dropdownMenuButton" tabindex="-1" aria-labelledby="dropdownMenuButton" aria-hidden="true">
                  <div class="modal-dialog modal-fullscreen ">
                    <div class="modal-content modalRegister">
                    <div class="modal-header">
                        <h5 class="modal-title b-0" style="opacity:0;color:black;";></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body d-flex justify-content-center align-items-center ">
                        <div class="row d-flex justify-content-center align-items-center" style="width:50vw;height:20vh;">
                            <div class="col-6 d-flex justify-content-center">
                              <button type="button" id="studentBtn" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#StudentRegsiter">
                                Student
                              </button>
                            </div>
                            <div class="col-6  d-flex justify-content-center">
                              <button type="button" id="lecturerBtn" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#LecturerRegsiter" >
                                Lecturer
                              </button>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="StudentRegsiter" tabindex="-1" aria-labelledby="StudentRegsiter" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content ">
                      <div class="modal-header">
                        <h5 class="modal-title" id="StudentRegsiterLabel">Registeration Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form id="studentForm" method="post" class="needs-validation"   novalidate>
                      <div class="modal-body">
                        
                          <div class="mb-3">
                            <label for="firstname" class="form-label">First name : </label>
                            <input type="text" class="form-control" id="sFirstName" placeholder="first name" aria-describedby="first name" required>
                          </div>
                          <div class="mb-3">
                            <label for="lastname" class="form-label">Last name : </label>
                            <input type="text" class="form-control" id="sLastName" placeholder="last name" aria-describedby="last name" required>
                          </div>
                          <div class="mb-3">
                            <label for="phone number" class="form-label">Phone number</label>
                            <input type="number" class="form-control" id="sPhoneNumber" placeholder="phone number" aria-describedby="phonehelp" required>
                          </div>
                          <div class="mb-3">
                            <label for="sEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="sEmail" placeholder="Email" aria-describedby="emailHelp" required>
                          </div>
                          <div class="mb-3">
                            <label for="sAddress" class="form-label">Address</label>
                            <input type="text-area" class="form-control" id="sAddress" placeholder="Email" aria-describedby="emailHelp" required>
                          </div>
                          <div class="mb-3">
                            <label for="sAbout" class="form-label">About me</label>
                            <input type="text-area" class="form-control" id="sAbout" placeholder="Email" aria-describedby="emailHelp" required>
                          </div>
                          <div class="mb-3">
                            <label for="username" class="form-label ">User name : </label>
                            <input type="text" class="form-control UserName" id="sUsername" placeholder="User name" aria-describedby="username" required>
                          </div>
                          <div class="mb-3">
                            <label for="sCreatePassword" class="form-label">Create Password :</label>
                            <input type="password" placeholder="password" class="form-control" id="sCreatePassword" required>
                          </div>
                          <div class="mb-3">
                            <label for="sConfirmPassword" class="form-label">Confirm Password:</label>
                            <input type="password" placeholder="re-enter password" class="form-control" id="sConfirmPassword" required>
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
                <!-- Modal -->
                <div class="modal fade" id="LecturerRegsiter" tabindex="-1" aria-labelledby="LecturerRegsiter" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="LecturerRegsiterLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form form id="lectureForm" method="post" class="needs-validation"   novalidate>
                      <div class="modal-body">
                        
                        <div class="mb-3">
                            <label for="lFirstName" class="form-label">First name : </label>
                            <input type="text" class="form-control" id="lFirstName" placeholder="first name" aria-describedby="first name" required>
                          </div>
                          <div class="mb-3">
                            <label for="lLastName" class="form-label">Last name : </label>
                            <input type="text" class="form-control" id="lLastName" placeholder="last name" aria-describedby="last name" required>
                          </div>
                          <div class="mb-3">
                            <label for="lPhoneNumber" class="form-label">Phone number</label>
                            <input type="number" class="form-control" id="lPhoneNumber" placeholder="phone number" aria-describedby="phonehelp" required>
                          </div>
                          <div class="mb-3">
                            <label for="lEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="lEmail" placeholder="Email" aria-describedby="emailHelp" required>
                          </div>
                          <div class="mb-3">
                            <label for="lAddress" class="form-label">Address</label>
                            <input type="text-area" class="form-control" id="lAddress" placeholder="Email" aria-describedby="emailHelp" required>
                          </div>
                          <div class="mb-3">
                            <label for="lAbout" class="form-label">About me</label>
                            <input type="text-area" class="form-control" id="lAbout" placeholder="Email" aria-describedby="emailHelp" required>
                          </div>
                          <div class="mb-3">
                            <label for="lusername" class="form-label ">User name : </label>
                            <input type="text" class="form-control UserName" id="lUsername" placeholder="User name" aria-describedby="username" required>
                          </div>
                          <div class="mb-3">
                            <label for="lCreatePassword" class="form-label">Create Password :</label>
                            <input type="password" placeholder="password" class="form-control" id="lCreatePassword" required>
                          </div>
                          <div class="mb-3">
                            <label for="lConfirmPassword" class="form-label">Confirm Password:</label>
                            <input type="password" placeholder="re-enter password" class="form-control" id="lConfirmPassword" required>
                          </div>
                          <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                            <label class="form-check-label" for="lformCheck">Agree to terms and conditions</label>
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
        </div>
      </div>
    </div>
    </header> 
    
    
  
    <div class="stats " id="stats">
      <div class="container-fluid ">
        <div class="row bg-light text-black justify-content-center" id="statRow">
          
        </div>
      </div>
    </div>
          <!--trending courses-->
          <div class="card-deck container">
            <div class="row row-content">
            <div class="h2">Trending Courses</div>
            <hr class="hr">
            <div class="col-12  col-sm-6 col-md-4 col-content">
                <div class="card card-body-down p-4 text-dark ">
                    <img class="card-img-top" src="./phot.jpg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Photgraphy</h5>
                      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      
                      
                      
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-content">
                <div class="card  card-body-down p-4  text-dark ">
                    <img class="card-img-top" src="./phot.jpg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Photgraphy</h5>
                      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      
                     
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-content">
                <div class="card  card-body-down p-4  text-dark ">
                    <img class="card-img-top" src="./phot.jpg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Photgraphy</h5>
                      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      
                       
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-content">
                <div class="card card-body-down p-4 text-dark ">
                    <img class="card-img-top" src="./phot.jpg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Photgraphy</h5>
                      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      
                       
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-content">
                <div class="card card-body-down p-4 text-dark ">
                    <img class="card-img-top" src="./phot.jpg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Photgraphy</h5>
                      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      
                       
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-content">
                <div class="card card-body-down p-4 text-dark ">
                    <img class="card-img-top" src="./phot.jpg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Photgraphy</h5>
                      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      
                       
                    </div>
                </div>
            </div>
            <div class="row d-flex m-0">
              <div class="col d-flex  justify-content-end m-0">
                <a class="btn btn-primary btn-lg" href="courses" role="button">view more courses</a>
              </div>
            </div>
            </div>
          </div>
          

          <section id="team" class="pb-5">
          <div class="container">
              <h5 class="section-title h1">OUR TEAM</h5>
              <div class="row">
                  <!-- Team member -->
                  <div class="col-xs-12 col-sm-6 col-md-4">
                      <div class="image-flip" >
                          <div class="mainflip flip-0">
                              <div class="frontside">
                                  <div class="card">
                                      <div class="card-body text-center">
                                          <p><img class=" img-fluid" src="./uploads/profile/thanujan.jpeg" alt="card image"></p>
                                          <h4 class="card-title">Sunlimetech</h4>
                                          <p class="card-text">This is basic card with image on top, title, description and button.</p>
                                          <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                      </div>
                                  </div>
                              </div>
                              <div class="backside">
                                  <div class="card">
                                      <div class="card-body text-center mt-4">
                                          <h4 class="card-title">Sunlimetech</h4>
                                          <p class="card-text">This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.</p>
                                          <ul class="list-inline">
                                              <li class="list-inline-item">
                                                  <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                      <i class="fa fa-facebook"></i>
                                                  </a>
                                              </li>
                                              <li class="list-inline-item">
                                                  <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                      <i class="fa fa-twitter"></i>
                                                  </a>
                                              </li>
                                              <li class="list-inline-item">
                                                  <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                      <i class="fa fa-skype"></i>
                                                  </a>
                                              </li>
                                              <li class="list-inline-item">
                                                  <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                      <i class="fa fa-google"></i>
                                                  </a>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- ./Team member -->
                  <!-- Team member -->
                  <div class="col-xs-12 col-sm-6 col-md-4">
                      <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                          <div class="mainflip">
                              <div class="frontside">
                                  <div class="card">
                                      <div class="card-body text-center">
                                          <p><img class=" img-fluid" src="./uploads/profile/arshard.jpeg" alt="card image"></p>
                                          <h4 class="card-title">Sunlimetech</h4>
                                          <p class="card-text">This is basic card with image on top, title, description and button.</p>
                                          <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                      </div>
                                  </div>
                              </div>
                              <div class="backside">
                                  <div class="card">
                                      <div class="card-body text-center mt-4">
                                          <h4 class="card-title">Sunlimetech</h4>
                                          <p class="card-text">This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.</p>
                                          <ul class="list-inline">
                                              <li class="list-inline-item">
                                                  <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                      <i class="fa fa-facebook"></i>
                                                  </a>
                                              </li>
                                              <li class="list-inline-item">
                                                  <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                      <i class="fa fa-twitter"></i>
                                                  </a>
                                              </li>
                                              <li class="list-inline-item">
                                                  <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                      <i class="fa fa-skype"></i>
                                                  </a>
                                              </li>
                                              <li class="list-inline-item">
                                                  <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                      <i class="fa fa-google"></i>
                                                  </a>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- ./Team member -->
                  <!-- Team member -->
                  <div class="col-xs-12 col-sm-6 col-md-4">
                      <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                          <div class="mainflip">
                              <div class="frontside">
                                  <div class="card">
                                      <div class="card-body text-center">
                                          <p><img class=" img-fluid" src="./uploads/profile/rilwan.jpeg" alt="card image"></p>
                                          <h4 class="card-title">Sunlimetech</h4>
                                          <p class="card-text">This is basic card with image on top, title, description and button.</p>
                                          <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                      </div>
                                  </div>
                              </div>
                              <div class="backside">
                                  <div class="card">
                                      <div class="card-body text-center mt-4">
                                          <h4 class="card-title">Sunlimetech</h4>
                                          <p class="card-text">This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.</p>
                                          <ul class="list-inline">
                                              <li class="list-inline-item">
                                                  <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                      <i class="fa fa-facebook"></i>
                                                  </a>
                                              </li>
                                              <li class="list-inline-item">
                                                  <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                      <i class="fa fa-twitter"></i>
                                                  </a>
                                              </li>
                                              <li class="list-inline-item">
                                                  <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                      <i class="fa fa-skype"></i>
                                                  </a>
                                              </li>
                                              <li class="list-inline-item">
                                                  <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                      <i class="fa fa-google"></i>
                                                  </a>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                

              </div>
          </div>
          </section>

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

<!-- Modal -->
<div class="modal fade" id="loginBtn" tabindex="-1" aria-labelledby="loginBtn" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="loginBtnLabel">Registeration Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="post" class="needs-validation" id="loginForm"  novalidate>
        <div class="modal-body" id="loginBtnBody">
          <div class="mb-3 position-relative">
            <label for="username" class="form-label">User Name : </label>
            <input type="text" class="form-control userValid" id="username" name="username" placeholder="user name"  aria-describedby="emailHelp" required>
            </div>
          <div class="mb-3 position-relative">
            <label for="password" class="form-label">Password : </label>
            <input type="password" class="form-control" id="password" name="password" placeholder="password" aria-describedby="emailHelp" required>
          </div>
          
          <div class="mb-3 form-check position-relative">
            <input type="checkbox" class="form-check-input" id="exampleCheck1"required>
            <label class="form-check-label" for="exampleCheck1">Agree to terms and conditions</label>
            <div class="invalid-tooltip">
              You must agree before submitting.
            </div>
          </div>
          
          <div class="mb-3 position-relative" >
            <div id="loginFeedback"></div>
            <div class="invalid-tooltip mb-3">Please enter valid password!</div>
          </div>

          <button type="button" class="btn btn-outline-primary btn-sm m-2" data-bs-toggle="modal" data-bs-target="#forgotModal">
              Are you forgot password?
          </button>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit"  class="btn btn-primary"  data-backdrop="static"  data-keyboard="false" name="signingIn">Submit</button>
          </div>
          </div>
        </form>
      
      
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="forgotModal" tabindex="-1" aria-labelledby="forgotModal" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen ">
    <div class="modal-content modalRegister">
    <div class="modal-header">
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex justify-content-center align-items-center ">
        <div class="col-12 col-md-4" id="forgotView">
        <form id="forgotForm" method="post" class="needs-validation"   novalidate>
        <div class="modal-body">
          <div class="mb-3">
            <label for="fUsername" class="form-label">User name : </label>
            <input type="text" class="form-control userValid" id="fUsername" placeholder="User name" aria-describedby="username" required>
          </div>
          <div class="mb-3">
            <label for="fEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="fEmail" placeholder="Email" aria-describedby="emailHelp" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="submitForgot">Submit</button>
          </div>
        </form>
        </div>
        
      </div>
    </div>
  </div>
</div>





  
    
       
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script>
      $(document).ready(function () {
    function loadStat() {
        $.ajax({ //create an ajax request to load_page.php
            type: "GET",
            url: "controls/fetchStats.php",
            dataType: "html", //expect html to be returned                
            success: function (response) {
                $("#statRow").html(response);
                //setTimeout(load, 1000)
            }
        });
    }
    loadStat(); 
  });
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
      function verify(username,email){
        console.log(username,email);
        $.ajax({
            url: 'controls/sendMail.php',
            type: 'POST',
            data:jQuery.param({username:username,email:email}),
            success:function(result){
              console.log(result);
                $('#forgotView').html(result );
              
            },
            error:function (e){console.log("error",e.statusText);}
            });
      }
      function verifyCode(event){
        var code = $('#Entercode').val();
        event.preventDefault();
        $.ajax({
            url: 'controls/verifyCode.php',
            type: 'POST',
            data:jQuery.param({code:code}),
            success:function(result){
              console.log(result);
              $('#forgotView').html(result );
                
              
            },
            error:function (e){console.log("error",e.statusText);}
            });
      }
      function changePassword(event){
        
        event.preventDefault();
        var username = $('#usernameC').val();
        var password = $('#passwordC').val();
        $.ajax({
            url: 'controls/changePassword.php',
            type: 'POST',
            data:jQuery.param({username:username,password:password}),
            success:function(result){
              if(result==1){
                alert('successfully changed!')
                window.location.href="/project226/";
              }
              else{
                alert('could not change! try again!');
                window.location.href="/project226/";
              }
            },
            error:function (e){console.log("error",e.statusText);}
            });
      }
      function logout(){
        $.ajax({
            url: 'controls/logout.php',
            type: 'GET',
            success:function(result){
              if(result==1){
                window.location.href="index.php";
              }
                
            },
            error:function (e){console.log("error",e.statusText);}
            });
      }
      function login(username,password){  
        console.log(jQuery.param({username:username,password:password}));      
          $.ajax({
            url: 'controls/login.php',
            data: jQuery.param({username:username,password:password}),
            type: 'POST',
            success:function(result){
              console.log(result);
                if(result=='Lecturer'){
                  console.log("lecturer");
                  window.location.href ="courses";
                }
                else if(result=='Student'){
                  console.log("student");
                  window.location.href ="courses";
                }
                else if(result==0){
                $('#loginFeedback').addClass('is-invalid');
                }
            },
            error:function (e){console.log("error",e.statusText);}
            });
        }
      function Register(type ,firstname , lastname  , username  , password , phoneNumber , email , address   , about){
        //console.log('innpuy',type ,firstname , lastname  , username  , password , phoneNumber , email , address   , about);
        $.ajax({
          url: 'controls/register.php',
          data: jQuery.param({type:type,username:username,password:password,firstname:firstname,lastname:lastname,phoneNumber:phoneNumber,email:email,address:address,about:about}),
          type: 'POST',
          success:function(result){
            console.log('result is',result);
            if(result==1){
              login(username,password);
              console.log("ok");
            }
            else{
              console.log("problem");
            }
              
          },
          error:function (e){console.log(e.statusText);}
          });
      }

    
    </script>
    <!-- registration validation -->
    <script>
      // password confirmation
      var password = document.getElementById("sCreatePassword"), confirm_password = document.getElementById("sConfirmPassword");
      function validatePassword(){
        if(password.value != confirm_password.value) {
          confirm_password.setCustomValidity("Passwords Don't Match");
          $('#sConfirmPassword').removeClass("is-valid");
          $('#sConfirmPassword').addClass("is-invalid");
        } else {
          confirm_password.setCustomValidity('');
          $('#sConfirmPassword').removeClass("is-invalid");
          $('#sConfirmPassword').addClass("is-valid");
          $('#sCreatePassword').removeClass("is-invalid");
          $('#sCreatePassword').addClass("is-valid");
          
        }
      }
      password.onchange = validatePassword;
      confirm_password.onkeyup = validatePassword;
      // user exist check
      function userCheck(username){
      $.ajax({
            url: 'controls/userCheck.php',
            data: jQuery.param({username:username}),
            type: 'GET',
            success:function(result){
                if(result!=1){
                  $('.UserName').addClass('is-valid');
                  $('.UserName').removeClass('is-invalid');
                  
                }
                else{
                  $('.UserName').addClass('is-invalid');
                  $('.UserName').removeClass('is-valid');
                  
                }
            },
            error:function (e){console.log("error ",e.statusText);}
            });
        }
        $('.UserName').blur(function(){userCheck(this.value);});

        function userValidCheck(username){
          $.ajax({
            url: 'controls/userCheck.php',
            data: jQuery.param({username:username}),
            type: 'GET',
            success:function(result){
              console.log(result)
                if(result==1){
                  $('.userValid').addClass('is-valid');
                  $('.userValid').removeClass('is-invalid');
                  
                }
                else{
                  $('.userValid').addClass('is-invalid');
                  $('.userValid').removeClass('is-valid');
                  
                }
            },
            error:function (e){console.log("error ",e.statusText);}
            });
        }
        $('.userValid').blur(function(){userValidCheck(this.value);});
    </script>
  <!--validation-->
  <script type="text/javascript">
    
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function (form) {
          form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
              console.log("check");
              event.preventDefault();
              event.stopPropagation();
            }
            else{
              if(this.id=='loginForm'){
                event.preventDefault();
                var username = $('#username').val();
                var password = $('#password').val();
                login(username,password);
              }
              else if(this.id=='forgotForm'){
                
                event.preventDefault();
                $('#submitForgot').prop('disabled',true);
                var username = $('#fUsername').val();
                var email = $('#fEmail').val();
                verify(username,email);
              }
              else if(this.id=="studentForm")
              {
                var firstname = $('#sFirstName').val();
                var lastname = $('#sLastName').val();
                var username = $('#sUsername').val();
                var password = $('#sConfirmPassword').val();
                var phoneNumber =$('#sPhoneNumber').val();
                var email=$('#sEmail').val();
                var address=$('#sAddress').val();
                var about=$('#sAbout').val();
                event.preventDefault();
                Register("Student" ,firstname , lastname  , username  , password , phoneNumber , email , address   , about);
                
              }
              else if(this.id=="lectureForm")
              {
                var firstname = $('#lFirstName').val();
                var lastname = $('#lLastName').val();
                var username = $('#lUsername').val();
                var password = $('#lConfirmPassword').val();
                var phoneNumber =$('#lPhoneNumber').val();
                var email=$('#lEmail').val();
                var address=$('#lAddress').val();
                var about=$('#lAbout').val();
                event.preventDefault();
                Register("Lecturer" ,firstname , lastname  , username  , password , phoneNumber , email , address   , about);
              }
            }
            
            form.classList.add('was-validated');
            
          }, false)
        })
    })();
  </script>
  


    <!-- smooth scrolling -->
    <script src="./js/SmoothScroll.min.js"></script>
    <!-- //smooth scrolling -->
    <!-- stats -->
    <script type="text/javascript" src="./js/numscroller-1.0.js"></script>
        <!-- //stats -->
    <!-- moving-top scrolling -->
    <script type="text/javascript" src="./js/move-top.js"></script>
    <script type="text/javascript" src="./js/easing.js"></script>
    <script type="text/javascript">
      jQuery(document).ready(function($) {
        $(".scroll").click(function(event){		
          event.preventDefault();
          $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
    
        // var defaults = {
        // containerID: 'toTop', // fading element id
        // containerHoverID: 'toTopHover', // fading element hover id
        // scrollSpeed: 1200,
        // easingType: 'linear' 
        // };
      							
      $().UItoTop({ easingType: 'easeOutQuart' });
      });
    </script>
    
    
    <!-- <script type="text/javascript">
      $('#loginForm').submit(function (e) {
      e.preventDefault();
      var username = $('#username').val();
      var password = $('#password').val();
      
       if($('#loginForm').hasClass('was-validated')){
        
        
       }}
      );
    </script> -->
    <!-- <script type="text/javascript">
    $("#loginForm").submit(function e){      
        
      }
    </script> -->
    
    
    
</body>
</html>