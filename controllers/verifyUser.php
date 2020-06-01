<?php
if(isset($_POST['activate_user'])){
    //get activate code and sanitize

    $activation_code = checkValues($_POST['activation_code']);
    $user = checkValues($_POST['user']);


    // compare entere code with code in db

    $activation_code_query = mysqli_query($con,"SELECT * FROM users WHERE email = '$user' ");
    if($activation_code_query){
       $num_of_user = mysqli_num_rows($activation_code_query);
        if($num_of_user> 0 ){
            //user exist so go ahead and activate account
            $user_row = mysqli_fetch_array($activation_code_query);
            $db_activation_code =  $user_row['activation_code'];
            $role = $user_row['role'];
            $role = trim($role);

            if(trim($db_activation_code)=== $activation_code ){
                //activate user account
                $activate_user_query = mysqli_query($con,"UPDATE users SET is_verified = 1 WHERE email ='$user' ");

                //redirect user to dashboard
                if($role == "client"){
                  //  redirect_to( "../dashboard/client" );

                    echo "<script>window.location='../dashboard/client'</script>";

                }elseif ($role == "freelancer"){
                  //  redirect_to( "../dashboard/freelancer" );
                    echo "<script>window.location='../dashboard/freelancer'</script>";
                }


            }else{
                echo '                
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry activation code is incorrect</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
    </div>    
';
            }

        }else{
            //no user
            echo '                
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry no account with this Email address found</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
    </div>    
';
        }
    }



}