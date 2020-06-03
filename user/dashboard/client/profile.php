<?php
session_start();
require_once '../../../config/dbconfig.php';
require_once '../../../functions/functions.php';
require_once '../../../functions/functions.php';
//check if current user has session


$user_id = $_SESSION['id'];
$user_email = $_SESSION['email'];
$username = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$role = $_SESSION['role'];

if(!isset($_SESSION['email'])){
    echo "<script>window.location='../../login/'</script>";
}else{
    //check if email is verified


}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/png" href="../../../vendors/img/favicon.png"/>


    <title> dashboard</title>



    <link rel="stylesheet" type="text/css" media="all" href="../../../vendors/plugins/bootstrap4/css/bootstrap.min.css" />


    <link rel="stylesheet" type="text/css" media="all" href="../../../vendors/plugins/font-awesome/css/font-awesome.min.css" />


    <link rel="stylesheet" type="text/css" media="all" href="../../../vendors/plugins/owl-carousel/assets/owl.carousel.css" />

    <link rel="stylesheet" type="text/css" media="all" href="../../../vendors/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../vendors/plugins/jquery-ui/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../vendors/plugins/select2/dist/css/select2.min.css" />

    <link rel="stylesheet" type="text/css" media="all" href="../../../vendors/fonts/athena/style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../vendors/css/style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../vendors/css/style2.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../vendors/css/dropzone.css" />

</head>

<body>


<?php include 'includes/dash_menu.html' ?>


<div class="ps-page" id="dashboard">
    <?php include 'includes/sub_nav.php'?>





    <div class="section ps-section pt-50">
        <div class="container">
            <div class="jumbotron mb-50">
                <div class="text-center mb-30"><img src="../../../vendors/img/users/user.png"  width="100px" height="100px" alt=""></div>
                <h3 class="ps-heading--2 text-center"> <span class="ps-highlight"></span></h3>
            </div>




            <?php
            $profile_query = mysqli_query($con,"SELECT * FROM profile WHERE user_id = '$user_id'");
            if($profile_query){
                //continue to fetch data
                $num_profile = mysqli_num_rows($profile_query);
                if($num_profile > 0){
                    //user has a profile

                    $user_info = mysqli_fetch_array($profile_query);
                    $bio = $user_info['biography'];
                    $phone = $user_info['phone_number'];
                    $country = $user_info['country'];
                    $city = $user_info['city'];
                    $address = $user_info['address'];
                    ?>


                    <div class="card mb-100">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6 col-sm-12 mb-50">
                                    <h5 class="card-title ps-heading--2 mb-20 text-capitalize"><span class="ps-highlight">Biography</span></h5>
                                    <p></p>


                                    <ul class="list-group">
                                        <li class="list-group-item"><?php echo $bio; ?></li>

                                    </ul>

                                </div>
                                <div class="col-xl-6 col-sm-12 mb-50">
                                    <h5 class="card-title ps-heading--2 mb-20 text-capitalize"><span class="ps-highlight">Personal Details</span></h5>
                                    <ul class="list-group">
                                        <li class="list-group-item">Address: <?php echo $address; ?></li>
                                        <li class="list-group-item">City: <?php echo $city; ?></li>
                                        <li class="list-group-item">Country: <?php echo $country; ?></li>
                                        <li class="list-group-item">Phone Number: <?php echo $phone; ?></li>

                                    </ul>
                                </div>
                                <div class="col-xl-6 col-sm-12 mb-50">
                                    <h5 class="card-title ps-heading--2 mb-20 text-capitalize"><span class="ps-highlight">Account Information</span></h5>
                                    <ul class="list-group">
                                        <li class="list-group-item">First Name: <?php echo $username; ?></li>
                                        <li class="list-group-item">Last Name: <?php echo $last_name; ?></li>
                                        <li class="list-group-item">Email Address: <?php echo $user_email; ?></li>
                                        <li class="list-group-item">Role: <?php echo $role; ?></li>

                                    </ul>
                                </div>



                            </div>
                        </div>
                    </div>

                    <?php



                }else{

                    ?>

                    <div class="text-center" style="margin: 50px">

                        <h4 style="">Your Profile seems to be empty click the button below to add more information
                        </h4>

                        <a style="margin: auto;
" href="edit_profile.php"> <button class="btn-primary ps-btn">Add</button> </a>

                    </div>

                    <?php
                    //let user creat
                }


            }else{
                echo 'no query';
            }
            ?>





            <footer></footer>
        </div>
    </div>

</div>



<?php include '../../../template_parts/footer.html' ?>



<!--script src="../../../vendors/plugins/jquery-1.12.4.min.js"></script-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="../../../vendors/plugins/owl-carousel/owl.carousel.min.js"></script>
<script src="../../../vendors/plugins/bootstrap4/js/bootstrap.min.js"></script>
<script src="../../../vendors/plugins/imagesloaded.pkgd.min.js"></script>
<script src="../../../vendors/plugins/masonry.pkgd.min.js"></script>
<script src="../../../vendors/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
<script src="../../../vendors/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../../../vendors/plugins/select2/dist/js/select2.full.min.js"></script>

<script src="../../../vendors/plugins/anime.min.js"></script>
<script src="../../../vendors/plugins/wow.min.js"></script>
<script src="../../../vendors/plugins/dropzone.min.js"></script>
<script src="../../../vendors/js/main.js"></script>


</body>
</html>