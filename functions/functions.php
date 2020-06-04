<?php
// This file is the place to store all basic functions

/*
function redirect_to( $location = NULL ) {
    if ($location != NULL) {
        header("Location: {$location}");
        exit;
   }
}*/

/*
function redirect_to($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}*/



function checkValues($value)
{
    // Use this function on all those values where you want to check for both sql injection and cross site scripting
    //Trim the value
    $value = trim($value);

    // Stripslashes
    if (get_magic_quotes_gpc()) {
        $value = stripslashes($value);
    }

    // Convert all &lt;, &gt; etc. to normal html and then strip these
    $value = strtr($value,array_flip(get_html_translation_table(HTML_ENTITIES)));

    // Strip HTML Tags
    $value = strip_tags($value);

    // Quote the value
    $value = addslashes($value);
    return $value;

}


function UploadProfilePhoto($file){



    $supporttedformats = array('.jpg','.jpeg','.png','.JPG','.JPEG','.PNG');

    //$filename = $_FILES["file"]["name"];




    $target_dir = "../user/dashboard/freelancer/portfolio_images/";
    $target_file = $target_dir.basename($_FILES["portfolio_image"]["name"]);


    $file_basename = substr($target_file, 0, strripos($target_file, '.')); // get file extention
    $file_ext = substr($target_file, strripos($target_file, '.')); // get file name
    $filesize = $_FILES["portfolio_image"]["size"];

    if(is_array($file)){

        //continue


        if(in_array($file_ext,$supporttedformats)){

            // rename file

            $newfilename = $file_basename.$file_ext;
            echo $newfilename;

            //continue to upload file
            if(file_exists($target_file)){

                echo '<div class="alert alert-danger" role="alert">
  Sorry! File already exist.
</div>' ;

            }else{
                move_uploaded_file($file['tmp_name'],$target_file);

                $file_link =  $target_file;

                return  $file_link;
            }


        }else{

            $error_statement =  '<div class="alert alert-danger" role="alert">
  Sorry! File format not supported
</div>' ;

            return  $error_statement;
        }


    } else{
        $error_statement = '<div class="alert alert-danger" role="alert">
  No file was uploaded
</div>' ;


        return  $error_statement;


    }


}


//elapsed time

function timeAgo($date) {
    $timestamp = strtotime($date);

    $strTime = array("second", "minute", "hour", "day", "month", "year");
    $length = array("60","60","24","30","12","10");

    $currentTime = time();
    if($currentTime >= $timestamp) {
        $diff     = time()- $timestamp;
        for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
            $diff = $diff / $length[$i];
        }

        $diff = round($diff);
        return $diff . " " . $strTime[$i] . "(s) ago ";
    }
}
