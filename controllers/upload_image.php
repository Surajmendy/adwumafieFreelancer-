<?php
session_start();
 include '../functions/functions.php';

include '../config/dbconfig.php';
$user_id = $_SESSION['id'];

if(isset($_FILES['portfolio_image'])){
    //global $trainee_photo_link;
    $image_link = UploadProfilePhoto($_FILES['portfolio_image']);

    if($image_link){
        echo 'passed';
    }else{
        echo 'not';
    }
    //update photo
    $insert_photo_query = mysqli_query($con,"UPDATE portfolio SET image='$image_link' WHERE user_id='$user_id' AND image = '0'");
     if($insert_photo_query){
         echo "<script>window.location='../user/dashboard/freelancer/add_portfolio.php?response=success&&upload=success'</script>";
        // header('Location:../user/dashboard/freelancer/add_portfolio.php?response=success&&upload=success');
     }else{
         echo "<script>window.location='../user/dashboard/freelancer/add_portfolio.php?response=success&&upload=failed'</script>";
        // header('Location:../user/dashboard/freelancer/add_portfolio.php?response=success&&upload=failed');
     }



}else{

    echo 'no images';
}

