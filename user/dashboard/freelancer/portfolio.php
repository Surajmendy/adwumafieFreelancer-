<?php
session_start();
require_once '../../../config/dbconfig.php';
require_once  '../../../functions/functions.php';
//check if current user has session
$user_id = $_SESSION['id'];
$user_email = $_SESSION['email'];
$username = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$role = $_SESSION['role'];

//$base_url  = 'http://localhost/adwumafieWeb';
$base_url  = 'https://adwumafie.knowghnews.com';
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

</head>

<body>


<?php include 'includes/dash_menu.html' ?>



<div class="ps-page" id="dashboard">
    <nav class="ps-navigation--dashboard">
        <?php include 'includes/freelancer_navbar.php'?>
    </nav>
    <div class="ps-dashboard ps-section--sidebar">
        <div class="container">
            <div class="ps-section__container">
                <div class="ps-section__content">

                    <div class="ps-connection-manage">
                        <h3>Portfolio </h3>

                        <div class="row" id="list_user">

                            <?php
                            //get available clients

                            $portfolio_query = mysqli_query($con,"SELECT * FROM portfolio WHERE user_id = '$user_id'");



                            if($portfolio_query) {
                                $num_portfolio = mysqli_num_rows($portfolio_query);
                                if ($num_portfolio > 0) {
                                    while ($portfolio_query_row = mysqli_fetch_assoc($portfolio_query)) {
                                        $title = $portfolio_query_row['title'];
                                        $description = $portfolio_query_row['description'];
                                        $link = $portfolio_query_row['link'];
                                        $portfolio_id = $portfolio_query_row['id'];
                                        $portfolio_image = $portfolio_query_row['image'];
                                        $portfolio_image_url = substr($portfolio_image,2);
                                      // echo $portfolio_image_url;
                                        $url = $base_url.$portfolio_image_url;

                                        ?>

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 ">
                                            <div class="ps-block--service-3">
                                                <div class="ps-block__thumbnail"><img src="<?php echo $url; ?>" alt=""></div>
                                                <div class="ps-block__content"><a href="#"><?php echo $title; ?></a>
                                                    <p><?php echo $description; ?></p>
                                                </div>
                                            </div>
                                        </div>




                                    <?php }
                                } else {
                                      ?>

                                    <div class="text-center">

                                        <h4 style="">You have not added anything to your portfolio yet
                                        </h4>

                                        <a style="margin: auto" href="add_portfolio.php"> <button class="btn-primary ps-btn">Add</button> </a>

                                    </div>


                                    <?php
                                }

                            } else{

                                echo "no query";
                            }
                            ?>


                        </div>





                    </div>

                </div>





                <?php include '../../../template_parts/sidebar.php' ?>



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