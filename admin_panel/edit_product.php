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
    <link rel="stylesheet" type="text/css" href="css/user_style.css">
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
    <!-- end header section -->

    <!-- edit section -->

            <?php

                if(isset($_POST['ok'])){

                  include("connection.php");

                         $t=$_FILES["photo"]["name"];
                    if (file_exists("upload/".$_FILES["photo"]["name"])){ 
                          $rand_name = md5(time());
                          $rand_name=rand(0,999999999);
                          $pic=$rand_name;
                          $pic="upload/".$rand_name.$_FILES["photo"]["name"];
                          move_uploaded_file($_FILES['photo']['tmp_name'],$pic);
                    }else{
                        $pic="upload/".$_FILES["photo"]["name"];   
                        move_uploaded_file($_FILES['photo']['tmp_name'],$pic);
                        }

                  $id = $_REQUEST['id'];

                  $q ="update product_details set category='".$_POST['category']."',product_name='".$_POST['product_name']."',price='".$_POST['price']."',quantity='".$_POST['quantity']."',photo='$pic' where id='$id'";

                  $r = mysqli_query($con,$q);

                  if($r)
                  {
                    echo"<script>alert('record updated sccesfully')</script>";
                  }
                }
              ?> 
<!-- end update section -->
    <center>
  <section class="contact_section layout_padding">
    <div class="container px-0">
        <h2 class="">
        </h2>
    </div>
        <div class="col-md-6 col-lg-5 px-0">
                        <h3 style="color: red;">Update Product</h3>

          <form action="#" method="post" enctype="multipart/form-data">
            <table align="center" border="1" cellpadding="8" cellspacing="10">


              <?php

                 $id = $_REQUEST['id'];

                  include("connection.php");

                  $q ="select * from product_details where id='$id'";

                  $r = mysqli_query($con,$q);

                  while($row=mysqli_fetch_array($r))
                  {
                ?>
                <tr>
                <td align="left" valign="top">
                <font size="+1" color="red" >Category</font>
                </td>
                <td>
                  <label>Choose Category:</label>
                  <select name="category" value="<?php echo $row['category'];?>"/>
                    <option value="Mobile" id="mobile">Mobile</option>
                    <option value="Laptop" id="laptop">Laptop</option>
                  </select>
                </td>
                </td>
            </tr>  

              <tr>
                <td align="left" valign="top">
                <font size="+1" color="red" >Product Name</font>
                </td>
                <td>
                <input type="text" name="product_name" placeholder="Product name" size="50" value="<?php echo $row['product_name'];?>"/>
                </td>
                </td>
            </tr>  

             <tr>
                <td align="left" valign="top">
                <font size="+1" color="red" >Price</font>
                </td>
                <td>
                <input type="number" name="price" placeholder="Price" size="50" value="<?php echo $row['price'];?>"/>
                </td>
                </td>
            </tr>

            <tr>
                <td align="left" valign="top">
                <font size="+1" color="red" >Quantity</font>
                </td>
                <td>
                <input type="number" name="quantity" placeholder="Quantity" size="50" value="<?php echo $row['quantity'];?>"/>
                </td>
                </td>
            </tr>  

            <!-- <tr>
                <td align="left" valign="top">
                <font size="+1" color="red" >Status</font>
                </td>
                <td>
                  <label for="status">Choose status:</label>
                  <select> name="status" id="status">
                    <option value="added" id="y">In Stock</option>
                    <option value="pending" id="n">Out Of Stock</option>
                  </select>
                </td>
                </td>
            </tr>   -->

            <tr>
                <td align="left" valign="top">
                <font size="+1" color="red" >Photo</font>
                </td>
                <td>
                  <label for="img">Select from here..</label>
                <input type="file" name="photo"  accept="image/*"/>
                </td>
                </td>
            </tr>  
           <!--  <tr>
                <td align="left" valign="top">
                <font size="+1" color="red"  >Description</font>
                </td>
                <td>
                  <textarea name="product_discri" id="product_discri" rows="3" cols="20">write Discription Here....</textarea>
                </td>
                </td>
            </tr>   -->
            </table>
            <br>
            <tr>
              <td >
                <input type="Submit" name="ok" value="Update Product" style="background-color:red;" />
              </td>
            </tr>
          </form>
        </div>
      </div>
    </div>
  </section>
  </center>
  <?php
}
  ?>

  <!-- end add product section -->
    
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