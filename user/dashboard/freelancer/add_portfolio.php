<?php
session_start();
require_once '../../../config/dbconfig.php';
require_once  '../../../functions/functions.php';
require_once  '../../../functions/functions.php';
//check if current user has session


$user_id = $_SESSION['id'];
$user_email = $_SESSION['email'];
$username = $_SESSION['first_name'];
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
       <?php include 'includes/freelancer_navbar.php'?>

      <div class="ps-dashboard ps-section--sidebar">
        <div class="container">
          <div class="ps-section__container">
            <div class="ps-section__content" >


           <div>


           </div>
                <?php
  echo '<div class="ps-form--post-a-job">';

                if(isset($_GET['response']) && isset($_GET['upload'])){
                    $response = $_GET['response'];
                    $uploaded = $_GET['upload'];

                    if($response == "success" && $uploaded== "success"){
                        echo '                
 <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Image was added succesfully to portfolio <a href="portfolio.php">click to view</a></strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
    </div>    
';
                    }else{
                        echo '                
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong> Something went wrong! Please add Image again</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
    </div> ';
                    }
                }

                echo '</div>';

                if(isset($_GET['response'])) {
                    $response = $_GET['response'];

                    if ($response == "success") {
                        include "forms/drop_image_form.php";

                    } else if ($response == "failed") {
                        include "../../../alerts/error.php";
                    }



                }else{
                    include "forms/add_portfolio_form.php";
                }


                ?>






            </div>





            
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