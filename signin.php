<?php
  session_start();
  if(isset($_POST["ok"])){

  include("connection.php");

  $query = "select * from user_details where username='".$_POST['username']."' and password='".$_POST['password']."'";

  $result = mysqli_query($con,$query);

  $count= mysqli_num_rows($result);

  if($count>0){
    $_SESSION['user']=$_POST['username'];

    if(!empty($_POST["remember"])){

        setcookie("user_login",$_POST["username"],time()+(10 * 365 * 24 * 60 * 60));

        setcookie("user_password",$_POST["password"],time()+(10 * 365 * 24 * 60 * 60));}

    else{

        if(isset($_COOKIE['user_login'])){
          setcookie("user_login","");
        }
        if(isset($_COOKIE['user_password'])){
          setcookie("user_password","");
        } 
      }
    echo "<script>window.location='index.php'</script>";}

    else{
    echo "<script>alert('Invalid Username or password!')</script>";
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

<body>
  <div class="hero_area">
    <!-- header section starts -->
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.php">
          <span>
                    Sojitra pvt.Ltm
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shop.php">
                Shop
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="why.php">
                Why Us
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="testimonial.php">
                Testimonial
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
          </ul>
          <div class="user_option">
            <a class="nav-link" href="signin.php">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Login
              </span>
            </a>
            <a href="index.php">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            </a>
            <form class="form-inline" method="post">
              <button class="btn nav_search-btn" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
          </div>
        </div>
      </nav>
    </header>
 
 <!-- sign in start -->
<center>
  <section class="contact_section layout_padding">
    <div class="container px-0">
        <h2 class="" style="color:gold;">SIGN IN
        </h2>
    </div>
        <div class="col-md-6 col-lg-5 px-0">
          <form action="#" method="post">
            <table align="center" border="1" cellpadding="12" cellspacing="10">
            <tr>
               <td align="center" valign="top">
                <font size="+1" color="white" style="color:red;">UserName</font>
                </td>
                <td>
                <input type="text" name="username" style="color: red;"
                size="50"
                value="<?php 
                    if(isset($_COOKIE['user_login'])){
                        echo $_COOKIE["user_login"];
                    }
                  ?>">
                </td>
              </tr>

              <tr>
               <td align="center" valign="top">
                <font size="+1" color="White" style="color:red;">Password</font>
                </td>
                <td>
                <input type="Password" name="password" size="50" style="color:red;"
                  value="<?php
                    if(isset($_COOKIE['user_password'])){
                      echo $_COOKIE['user_password'];
                    }
                  ?>">
                </td>
              </tr>
              <tr>
            </table>
            <br>
            <td align="center" valign="top">
                <font size="+1" color="white" >remember Me!</font>
                </td>
                <td>
                <input type="checkbox" name="remember" 
                value="<?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?> "/>
                </td>
              </tr> 
              <input type="submit" name="ok" value="Log In" style="background-color: red;"/>
                <a href="changepassword.php"><label style="color:white;">Forgot Password!</label></a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="signup.php"><label style="color: white;">New User! Register Now</label></a>

          </form>
        </div>
      </div>
    </div>
  </section>
  </center>


 <!-- sign in off -->

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
                Newsletter
              </h5>
              <form action="#" method="post">
                <input type="email" placeholder="Enter your email">
                <button>
                  Subscribe
                </button>
              </form>
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