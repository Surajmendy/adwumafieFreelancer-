<?php



$result = '';
if (isset($_POST['login-user'])) {
    //obtain user input and sanitize

    $email = checkValues($_POST['email']);
    $password = checkValues($_POST['password']);

    //Query exe
    $user_login_query = "SELECT * FROM users WHERE email='$email' ";
    $select_user_login_query = mysqli_query($con,$user_login_query);
    if( $select_user_login_query){
        $num_of_user = mysqli_num_rows($select_user_login_query);

        if($num_of_user == 1 ){
            //continue

            $row = mysqli_fetch_array($select_user_login_query);
            $db_user_id = $row['id'];
            $db_email = $row['email'];
            $db_user_password =$row['password'];
            $db_first_name = $row['first_name'];
            $db_last_name = $row['last_name'];
            $db_role = $row['role'];


            if(password_verify($password,$db_user_password)) {
                //continue to log user

                if( $email === $db_email  ){
                    //set session variables
                    $_SESSION['email']= $db_email;
                    $_SESSION['first_name'] = $db_first_name ;
                    $_SESSION['last_name'] = $db_last_name ;
                    $_SESSION['role'] = $db_role ;
                    $_SESSION['id']= $db_user_id;

                    //redirect user to dashboard
                    if($db_role == "client"){
                        echo "<script>window.location='../dashboard/client'</script>";
                        //redirect_to( "../dashboard/client" );
                    }elseif ($db_role == "freelancer"){
                       // redirect_to( "../dashboard/freelancer" );
                         echo "<script>window.location='../dashboard/freelancer'</script>";
                    }


                }

                else{
                    echo '                
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Email Address incorrect</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
    </div>    
';

                }

            }   else{
                echo '                
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Password incorrect</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
    </div>    
';


                "<script>window.location='index.php';</script>";
            }




        }  else{

            echo '                
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>No user found</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
    </div>    
';
        }
    }



}  // end of isset
?>
