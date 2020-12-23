<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/jquery-file-upload/4.0.11/jquery.uploadfile.min.js.html">
    <link rel="stylesheet" href="../css/styles.css">
    <script src='main.js'></script>
</head>
<body>

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
              <a class="nav-link active " aria-current="page" href="/project226/aboutus">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="/project226/contactus">Contact Us</a>
            </li>
            <li class="nav-item ">
            <a class='nav-link' href='/project226/courses'>Courses</a>
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
   
    </header>
    <div class="aboutus" id="aboutusMain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 m-0 p-0 container" style="position: relative;">
                    <img src="../uploads/profile/about_us.jpg" class="img-fluid d-flex w-100 m-0" alt="" srcset="">
                    <div class="overlay  d-flex align-items-center justify-content-center" style="position:absolute;">
                    <figure class="bg-light">
                    <blockquote class="blockquote  m-4">
                        <p class="h4">Our Online Tuition System is a major part of  Online Tuition Centre. We will provide database of whole data wanted  including Students , Lectures, Courses, and etc.
Our mission is  supporting  the  administration to keep each and every record in very easy manner.</p>
                    </blockquote>
                    <figcaption class="blockquote-footer m-4 h5">
                        OnlineTution <cite title="Source Title">This is WHO WE ARE!!!</cite>
                    </figcaption>
                    </figure>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
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

</body>
</html>