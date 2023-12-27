<?php
  session_start();

 if(isset($_POST["ok"])){

 include("connection.php");

 $query = "select * from admin_details where admin_username='".$_POST['admin_username']."' and admin_password='".$_POST['admin_password']."'";

 $result = mysqli_query($con,$query);

 $count = mysqli_num_rows($result);

 if($count>0){

    $_SESSION['user']=$_POST['admin_username'];

    if(!empty($_POST['remember'])){

      setcookie("admin_username",$_POST['admin_username'],time()+(10 * 365 * 24 * 60 * 60));

      setcookie("admin_password",$_POST['admin_password'],time()+(10 * 365 * 24 * 60 * 60));
    }else{
      
      if(isset($_COOKIE['admin_username'])){
        setcookie("admin_username","");
      }
      if(isset($_COOKIE['admin_password'])){
        setcookie("admin_password","");
    }
 }
    echo "<script> window.location='admin_panel.php';</script>";
    }
 else{
  echo "<script> alert('Something Went Wrong');</script>";
 }
}
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>
            Sojitra pvt.Ltm
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body style="background-color: white;">
   <div class="hero_area">
    <!-- header section starts -->
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="admin_panel.php">
          <span>
                Sojitra pvt.Ltm

          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item">
              <a class="nav-link" href="addproduct.php">
                Add Product
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Viewproduct.php">
                View Product
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="changepassword_admin.php">
                Change Password
            </a>
            </li>
          </ul>
         <div class="user_option">
            <a class="nav-item" href="adminlogin.php">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Admin Login
              </span>
            </a>
            <a href="">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            </a>
           <a>
              <i class="fa fa-search" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-user" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->
 <!-- contact section -->
<center>
  <section class="contact_section layout_padding">
    <div class="container px-0">
        <h2 class="">
        </h2>
    </div>
        <div class="col-md-6 col-lg-5 px-0">
          <form action="#" method="post">
            <h2><center>Admin Login</center></h2>
            <br>
            <div>
              <input type="text" name="admin_username" size="50"
                value="<?php 
                    if(isset($_COOKIE['admin_username'])){
                        echo $_COOKIE["admin_username"];
                    }
                  ?>">
            <div>
             <input type="text" name="admin_password" size="50"
                value="<?php 
                    if(isset($_COOKIE['admin_password'])){
                        echo $_COOKIE["admin_password"];
                    }
                  ?>">
            </div>
            <div>
              <input type="checkbox" name="remember" value="<?php if(isset($_COOKIE['admin_username'])) { ?> checked <?php } ?>">
            </div>
             <div>
              <input type="submit" name="ok" value="Login" />
            </div>

            <a href="changepassword_admin.php"><label style="color:red;">Forgot Password!</label></a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="admin_regi.php"><label style="color: red;">New User! Register Now</label></a>

          </form>
        </div>
      </div>
    </div>
  </section>
  </center>

  <!-- end contact section -->

  <!-- info section -->

  <section class="info_section  layout_padding2-top">
    <div class="social_container">
      <div class="social_box">
        <a href="">
          <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-youtube" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div class="info_container ">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h6>
              ABOUT US
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_form ">
              <h5>
                Admin panel
              </h5>
              <a href="adminlogin.php">
                  <button>
                    Admin Login
                  </button>
                </a>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              NEED HELP
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              CONTACT US
            </h6>
            <div class="info_link-box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span> Gb road 123 london Uk </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>+01 12345678901</span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span> demo@gmail.com</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- footer section -->
    <footer class=" footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="index.php">SOJITRA PVT.LTM</a>
        </p>
      </div>
    </footer>
    <!-- footer section -->

  </section>

  <!-- end info section -->


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>

</body>

</html>