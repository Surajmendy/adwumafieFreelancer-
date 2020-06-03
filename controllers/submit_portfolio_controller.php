<?php
session_start();
include('../classes/DbOperations.php');
$db = new DbOperations();
$db->connect();


$insert_portfolio =  $db->insert(
    'portfolio',
    array(
        'title'=>$db->escapeString( (isset($_POST['title'])) ? $_POST['title'] : '' ),
        'description'=>$db->escapeString( (isset($_POST['description'])) ? $_POST['description'] : '' ),
        'link'=>$db->escapeString( (isset($_POST['link'])) ? $_POST['link'] : '0' ),
        'user_id'=>$db->escapeString( (isset($_POST['user_id'])) ? $_POST['user_id'] : '' )


    )
);

if($insert_portfolio){
    header('Location:../user/dashboard/freelancer/add_portfolio.php?response=success');
}else{

    header('Location:../user/dashboard/freelancer/add_portfolio.php?response=failed');
}