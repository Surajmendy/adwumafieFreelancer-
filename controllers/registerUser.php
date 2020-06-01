<?php
if(isset($_POST['register_user'])){
    //get form data
    $first_name = checkValues($_POST['first_name']);
    $last_name = checkValues($_POST['last_name']);
    $email = checkValues($_POST['email']);
    $password = checkValues($_POST['password']);
    $role = checkValues($_POST['role']);
    $activation_code = uniqid(rand(2332,30000));
    $activation_code = (int) $activation_code ;

    $hash_password = password_hash($password,PASSWORD_DEFAULT);

    //check if user already exist
    $check_past_register = mysqli_query($con,"SELECT * FROM users WHERE email = '$email' ");

    $num_of_past = mysqli_num_rows($check_past_register);
    if($num_of_past > 0){


        echo '                
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Email already exist</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
    </div>    
';

    }else{
        //proceed to register user
        //perform query
        $save_to_db_query = mysqli_query($con,"INSERT INTO users(first_name,last_name,email,password,role,activation_code)VALUES('$first_name','$last_name','$email','$hash_password','$role','$activation_code')");
        $user_id = mysqli_insert_id($con);
        if($save_to_db_query){
          //send activation code to email
            $host = $_SERVER['SERVER_NAME'];


            $headers = "From: Adwumafie@".$host."\r\n";
            $headers .= "Content-type: text/html\r\n";

            $at = "@";

            $email_title = "Account Verification on Adwumafie";
            //$email_title_customer = "Email Verification";
            $body_email =  '
            
             
            <div class="card-head">
                               
                            </div>
                            <div class="gaps-1x"></div><!-- .gaps -->
                            <table class="email-wraper">
                               <tbody><tr>
                                   <td class="pdt-4x pdb-4x">
                                        <table class="email-header">
                                            <tbody>
                                                <tr>
                                                    <td class="text-center pdb-2-5x">
                                                        <a href="#"><img class="email-logo" src="https://adwumafie.knowghnews.com/vendors/img/logo.png" alt="logo"></a>
                                                      
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="email-body">
                                            <tbody>
                                                <tr>
                                                    <td class="pd-3x pdb-1-5x">
                                                        <h2 class="email-heading">Confirm Your E-Mail Address</h2>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pdl-3x pdr-3x pdb-2x">
                                                      
                                                        <p class="mgb-1x"> You are receiving this email because you have registered on our site.</p>
                                                        <p class="mgb-1x">Use the code below to activate your  account.</p>
                                                         
                                                         <h1> '.$activation_code.'</h1>
                                                       
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td class="pd-3x pdt-2x pdb-3x">
                                                        <p>If you did not make this request, please contact us or ignore this message.</p>
                                                        <p class="email-note">This is an automatically generated email please do not reply to this email. If you face any issues, please contact us at  support@adwumafie.com</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                   </td>
                               </tr>
                            </tbody></table>';





            mail($email,$email_title,$body_email,$headers);

            echo "<script>window.location='../register/?page=verifyuser';</script>";

        }
    }

}