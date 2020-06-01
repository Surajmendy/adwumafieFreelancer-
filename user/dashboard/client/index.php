<?php session_start();
require_once '../../../config/dbconfig.php';
require_once  '../../../functions/functions.php';
//check if current user has session
if(!isset($_SESSION['email'])){
    echo "<script>window.location='../../login/'</script>";
}else{
    //check if email is verified


}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
   
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/png" href="../../img/favicon.png" />


    <title> dashboard</title>



    <link rel="stylesheet" type="text/css" media="all" href="../../../vendors/plugins/bootstrap4/css/bootstrap.min.css" />


    <link rel="stylesheet" type="text/css" media="all" href="../../../vendors/plugins/font-awesome/css/font-awesome.min.css" />


    <link rel="stylesheet" type="text/css" media="all" href="../../../vendors/plugins/owl-carousel/assets/owl.carousel.css" />

    <link rel="stylesheet" type="text/css" media="all" href="../../../vendors/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../vendors/plugins/jquery-ui/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../vendors/plugins/select2/dist/css/select2.min.css" />

    <link rel="stylesheet" type="text/css" media="all" href="../../../vendors/fonts/athena/style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../vendors/css/style.css" />

</head>

<body>


    <?php include '../../../template_parts/dash_menu.html' ?>



    <div class="ps-page" id="dashboard">
        <nav class="ps-navigation--dashboard">
            <ul>
                <li class="active"><a href="#">Dashboard</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Inbox</a></li>

                <li><a href="#">Feedback</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="find_freelancers.php">Find Freelancers</a></li>

            </ul>
        </nav>
        <div class="ps-dashboard ps-section--sidebar">
            <div class="container">
                <div class="ps-section__container">
                    <div class="ps-section__content">



                    </div>



                    <?php include '../../../template_parts/sidebar.html' ?>



                </div>
            </div>
        </div>
    </div>



    <?php include '../../../template_parts/footer.html' ?>



    <script src="../../../vendors/plugins/jquery-1.12.4.min.js"></script>
    <script src="../../../vendors/plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="../../../vendors/plugins/bootstrap4/js/bootstrap.min.js"></script>
    <script src="../../../vendors/plugins/imagesloaded.pkgd.min.js"></script>
    <script src="../../../vendors/plugins/masonry.pkgd.min.js"></script>
    <script src="../../../vendors/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script src="../../../vendors/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="../../../vendors/plugins/select2/dist/js/select2.full.min.js"></script>

    <script src="../../../vendors/plugins/anime.min.js"></script>
    <script src="../../../vendors/plugins/wow.min.js"></script>
    <script src="../../../vendors/js/main.js"></script>

</body>

</html>
