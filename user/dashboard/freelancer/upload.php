<?php

session_start();
//include('../../../classes/DbOperations.php');
//$db = new DbOperations();
//$db->connect();

$upload_dir = 'portfolio_images/';
if(!empty($_FILES)){


    require_once '../../../config/dbconfig.php';
    //file path config


    $file_name = basename($_FILES['file']['name']);
    $upload_file_path = $upload_dir.$file_name;



    if(move_uploaded_file($_FILES['file']['tmp_name'],$upload_file_path)){

        $save_to_db = mysqli_query($con,"INSERT INTO portfolio_image(user_id,image)VALUES('$user_id',' $upload_file_path')");



        if( $save_to_db){
            //header('Location:../user/dashboard/freelancer/add_portfolio.php?response=success');
        }else{
            //header('Location:../user/dashboard/freelancer/add_portfolio.php?response=error');
        }


    }

}
