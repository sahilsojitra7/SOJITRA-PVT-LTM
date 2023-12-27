<?php
    include('connection.php');

    $id = $_REQUEST['id'];

    $q = "delete from product_details where id='$id'";

    $r = mysqli_query($con,$q);

    if ($r) {
        echo "<script>alert('Data Deleted Successfully')</script>";
        echo "<script>window.location='edit_product.php';</script>";
        // code...
    }else{
        echo "<script>alert('Something Went Wrong')</script>";      
    }
?>