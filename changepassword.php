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
            <a class="nav-item" href="signin.php">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Login
              </span>
            </a>
            <a href="">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            </a>
            <a>
              <i class="fa fa-search" aria-hidden="true"></i>
            </a>


            
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->
    <br><br><br><br><br><br>

    <!-- start change password -->

                  <?php
                    session_start();

                    if(isset($_POST['ok'])){

                      include("connection.php");

                      $username=$_SESSION['user'];

                      $cpassword=$_POST['cpass'];

                      $npassword=$_POST['newpass'];

                      $conpassword=$_POST['confirmpass'];

                      $currentpass="";


                      $q = "select password from user_details where username='$username'";

                      $r = mysqli_query($con,$q);

                      while($row = mysqli_fetch_array($r)){

                        $currentpass=$row['password'];
                      }
                        if($currentpass==$cpassword){

                          if($npassword==$conpassword){

                            $query ="update user_details set password='$conpassword' where username='$username'";

                            $result =mysqli_query($con,$query);

                            if($result){
                                echo"<script>alert('password changed sccesfully')</script>";
                            }else{
                                echo"<script>alert('password is not changed ')</script>";
                            }
                          }
                          else
                          {
                             echo"<script>alert('new password and confirm password is not same')</script>";

                          }
                        }
                        else
                        {
                            echo"<script>alert('Current password is not Same')</script>";
                        }
                    }
                  ?>
                  <center>
                    <form method="post">
                      <table border="1" align="center" cellspacing="10" cellpadding="10">
                        <tr>
                          <td align="center" colspan="2" bgcolor="black" style="color: white;">
                            Change Password
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <font align="center"> ENTER CURRENT PASSWORD</font>
                          </td>
                          <td>
                            <input type="Password" name="cpass">
                          </td>
                        </tr>

                        <tr>
                          <td>
                            <font align="center"> ENTER NEW PASSWORD</font>
                          </td>
                          <td>
                            <input type="Password" name="newpass">
                          </td>
                        </tr>

                        <tr>
                          <td>
                            <font align="center"> CONFIRM NEW PASSWORD</font>
                          </td>
                          <td>
                            <input type="Password" name="confirmpass">
                          </td>
                        </tr> 

                        <tr>                    
                          <td align="center">
                            <input type="reset" name="rst" value="RESET">
                          </td>
                          <td align="center">
                            <input type="Submit" name="ok" value="CHANGE PASSWORD">
                          </td>
                        </tr>
                      </table>
                    </form>
                  </center>



<br><br><br><br><br><br><br><br>
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
              <form action="#">
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
          <a href="index.php">Sojitra pvt.Ltm</a>
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