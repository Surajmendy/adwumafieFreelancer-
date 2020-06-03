<?php
session_start();
require_once '../../../config/dbconfig.php';
require_once '../../../functions/functions.php';
require_once '../../../functions/functions.php';
//check if current user has session


$user_id = $_SESSION['id'];
$user_email = $_SESSION['email'];
$username = $_SESSION['first_name'];
$lastname = $_SESSION['last_name'];
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
    <link rel="shortcut icon" type="image/png" href="../../img/favicon.png"/>


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


<?php include '../../../template_parts/dash_menu.html' ?>



<div class="ps-page" id="dashboard">
    <?php include 'freelancer_navbar.php' ?>

    <div class="ps-dashboard ps-section--sidebar">
        <div class="container">
            <div class="ps-section__container">
                <div class="ps-section__content" >



                    <form class="ps-form--settings" action="" method="post">
                        <figure>
                            <h3 class="ps-heading--2"><span class="ps-highlight"> Edit Profile</span></h3>

                            <?php require_once '../../../controllers/saveProfile.php'?>

                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input class="form-control" type="text" placeholder="<?php echo $username; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" type="text" placeholder="<?php echo $lastname; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="text" placeholder="<?php echo $user_email; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input name="number" class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input  name="address" class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group">
                                        <label>City/Povince</label>
                                        <input name="city" class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input name="country" class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group">
                                        <label>Biograpphy</label>
                                        <textarea name="biography" class="form-control" rows="6" name="description" id="description" placeholder="Enter portfolio description here"></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="ps-form__submit">
                                <button name="save-profile" class="ps-btn ps-btn--white ps-btn--shadow ps-btn--sm" type="submit">Save</button>
                                <button class="ps-btn ps-btn--gradient ps-btn--sm" type="reset">Reset</button>
                            </div>
                        </figure>


                    </form>


                </div>

                <?php include '../../../template_parts/sidebar.php' ?>





            </div>
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