<?php
session_start();
require_once '../../../config/dbconfig.php';
require_once  '../../../functions/functions.php';
//check if current user has session
if(!isset($_SESSION['email'])){
    redirect_to('../login');
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
            <li><a href="#">Portfolio</a></li>
            <li><a href="find_clients.php">Find Clients</a></li>


        </ul>
      </nav>
      <div class="ps-dashboard ps-section--sidebar">
        <div class="container">
          <div class="ps-section__container">
            <div class="ps-section__content">

                <form class="ps-form--post-a-job" action="" method="post">
                    <h3>Add Portfolio</h3>


                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" type="text" name="title" placeholder="e.g Ecommerce Website"/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="6" name="description" placeholder="Enter portfolio description here"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Link</label>
                        <input class="form-control" type="text" name="link" placeholder="e.g https://github.com/eco"/>
                    </div>

                    <div class="ps-form__submit">
                        <button type="submit" class="ps-btn ps-btn--gradient" >Add</button>

                    </div>
                </form>

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