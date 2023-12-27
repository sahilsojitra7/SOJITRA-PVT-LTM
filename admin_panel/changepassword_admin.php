<?php
  session_start();
  if($_SESSION['user'])
  {
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
  <!-- profile toggle css -->
    <link rel="stylesheet" type="text/css" href="css/user_style.css"> -->
</head>

<body style="background-color:white;">
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

            <div class="action">
              <div class="profile" onclick="menuToggle();">
                <img src="images/profile.jpg" >
              </div>
              <div class="menu">
                <h3>Sahil Sojitra<br><span>Website designer</span></h3>
                <ul>
                  <li><img src="images/user.png" height="20px" width="20px"><a href="">Profile</a></li>
                  <li><img src="images/edit.png" height="20px" width="20px"><a href="">Edit</a></li>
                  <li><img src="images/inbox.png" height="20px" width="20px"><a href="">inbox</a></li>
                  <li><img src="images/settings.png" height="20px" width="20px"><a href="">Setting</a></li>
                  <li><img src="images/help.png" height="20px" width="20px"><a href="">Help</a></li>
                  <li><img src="images/sign-out.png" height="20px" width="20px" ><a href="logout_admin.php">Log Out</a></li>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </nav>
    </header>
    <br><br><br><br>
    <!-- end header section -->

     <?php
                

                    if(isset($_POST['ok'])){

                      include("connection.php");

                      $username=$_SESSION['user'];

                      $cpassword=$_POST['cpass'];

                      $npassword=$_POST['newpass'];

                      $conpassword=$_POST['confirmpass'];

                      $currentpass="";


                      $q = "select admin_password from admin_details where admin_username='$username'";

                      $r = mysqli_query($con,$q);

                      while($row = mysqli_fetch_array($r)){

                        $currentpass=$row['admin_password'];
                      }
                        if($currentpass==$cpassword){

                          if($npassword==$conpassword){

                            $query ="update admin_details set admin_password='$conpassword' where admin_username='$username'";

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
</body>

</html>
<?php
}
else{
  echo "<script>window.location='adminlogin.php'</script>";
}
?>
<script>
    function menuToggle(){

      const Togglemenu = document.querySelector('.menu');
       Togglemenu.classList.toggle('active')
    }
</script>