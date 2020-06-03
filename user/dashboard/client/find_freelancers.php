<?php  session_start();
require_once '../../../config/dbconfig.php';
require_once  '../../../functions/functions.php';
//check if current user has session
$user_id = $_SESSION['id'];
$user_email = $_SESSION['email'];
$username = $_SESSION['first_name'];
if(!isset($_SESSION['email'])){
    echo "<script>window.location='../../../login/'</script>";
}else{
    //check if email is verified


}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
   
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

</head>

<body>


<?php include 'includes/dash_menu.html' ?>


  
   <div class="ps-page" id="dashboard">
       <?php include 'includes/sub_nav.php'?>
      <div class="ps-dashboard ps-section--sidebar">
        <div class="container">
          <div class="ps-section__container">
            <div class="ps-section__content">

                <div class="ps-connection-manage">
                    <h3>Available Freelancers</h3>
                    <h4 class="ps-heading--2">Chat Freelancers</h4>
                    <div style=" padding-bottom: 30px;"  class="row" >

                        <?php
                        //get available freelancers

                        $clients_query = mysqli_query($con,"SELECT * FROM users WHERE role = 'freelancer'");


                        if($clients_query) {
                            $num_clients = mysqli_num_rows($clients_query);
                            if ($num_clients > 0) {
                                while ($clients_query_row = mysqli_fetch_assoc($clients_query)) {
                                    $first_name = $clients_query_row['first_name'];
                                    $last_name = $clients_query_row['last_name'];
                                    $name = $first_name . " " . $last_name;
                                    $client_id = $clients_query_row['id'];

                                    ?>



                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12  " id="listed_user">
                                        <div class="ps-block--people">
                                            <div class="ps-block__thumbnail"><img src="../../../vendors/img/users/user.png"
                                                                                  alt=""></div>
                                            <div class="ps-block__content"><a class="ps-block__title"
                                                                              href="#"><?php echo $name; ?></a>
                                                <p></p>
                                                <p><strong> <br/>
                                                        <br/></strong></p>
                                                <div class="ps-block__footer">

                                                    <a class="ps-btn ps-btn--sm" href="../chat.php?user=<?php echo $client_id ?>">Chat</a>


                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                <?php }
                            } else {
                                echo "no client found";
                            }

                        } else{

                            echo "no query";
                        }
                        ?>


                    </div>
                    <br>
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