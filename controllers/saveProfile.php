<?php
if(isset($_POST['save-profile'])){
    //get message text and sanitize
    $phone_number = checkValues($_POST['number']);
    $address = checkValues($_POST['address']);
    $city = checkValues($_POST['city']);
    $country = checkValues($_POST['country']);
    $biography = checkValues($_POST['biography']);


    //save chat into db

    $check_passed_saved = mysqli_query($con,"SELECT * FROM profile WHERE user_id = '$user_id'");

        $num_past = mysqli_num_rows($check_passed_saved);
        if($num_past > 0){
            echo '                
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry Profile was already submitted</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
    </div>    
';
        }else{


            $save_profile_query = mysqli_query($con,"INSERT INTO profile(user_id,biography,phone_number,country,city,address)
                                     VALUES('$user_id','$biography','$phone_number','$country','$city','$address')");

            if($save_profile_query){
                echo '                
 <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Profile added successsfully</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
    </div>    
';

            }else{
                echo '                
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry Something went wrong</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
    </div>    
';

            }

        }




}