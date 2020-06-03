<?php

session_start();
include('../classes/DbOperations.php');
$db = new DbOperations();
$db->connect();

$upload_dir = '../portfolio_images';
if(!empty($_FILES)){



    //file path config


    $file_name = basename($_FILES['file']['name']);
    $upload_file_path = $upload_dir.$file_name;



    if(move_uploaded_file($_FILES['file']['tmp_name'],$upload_file_path)){


        $insert_image =  $db->insert(
            'portfolio_image',
            array(
                'user_id'=>1,
                'image'=> $upload_file_path

            )
        );


        if( $insert_image){
            header('Location:../user/dashboard/freelancer/add_portfolio.php?response=success');
        }else{
            header('Location:../user/dashboard/freelancer/add_portfolio.php?response=error');
        }


    }

}
