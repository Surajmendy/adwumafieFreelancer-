<?php  session_start();
require_once '../../../config/dbconfig.php';
require_once  '../../../functions/functions.php';

$user_id = $_SESSION['id'];
$user_email = $_SESSION['email'];
$username = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$role = $_SESSION['role'];

if(isset($_GET['user'])){
    $receiver_id = $_GET['user'];
}
//check if current user has session
if(!isset($_SESSION['email'])){
    echo "<script>window.location='../login/'</script>";
}else{
    //check if email is verified


}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/png" href="../../../vendors/img/favicon.png" />


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
            <?php include 'includes/sub_nav.php'; ?>
        </nav>
        <div class="ps-dashboard ps-section--sidebar">
            <div class="container">
                <div class="ps-section__container">
                    <div class="ps-section__content">











                        <form class="ps-form--settings" action="" method="post">
                            <figure>
                                <h3 class="ps-heading--2"><span class="ps-highlight"> Send Message</span></h3>

                                <?php require_once '../../../controllers/sendMessage.php'?>

                                <div class="row">


                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <input name="subject" id="subject" class="form-control" type="text" placeholder="" required>
                                            <input name="receiver"  type="hidden"  value="<?php echo $receiver_id; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <div class="form-group">
                                            <label>Message Body</label>
                                            <textarea name="message" id="message" class="form-control" rows="6"  placeholder="Enter message here..." required></textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="ps-form__submit">
                                    <button name="send-message" class="ps-btn ps-btn--white ps-btn--shadow ps-btn--sm" type="submit">Send</button>
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




<script src="../../../vendors/plugins/jquery-1.12.4.min.js"></script>
<script src="../../../vendors/plugins/owl-carousel/owl.carousel.min.js"></script>
<script src="../../../vendors/plugins/bootstrap4/js/bootstrap.min.js"></script>
<script src="../../../vendors/plugins/imagesloaded.pkgd.min.js"></script>
<script src="../../../vendors/plugins/masonry.pkgd.min.js"></script>
<script src="../../../vendors/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
<script src="../../../vendors/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../../../vendors/plugins/select2/dist/js/select2.full.min.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="../../../vendors/plugins/dataTables/jquery.dataTables.js"></script>
<script src="../../../vendors/plugins/dataTables/dataTables.bootstrap.js"></script>

<script src="../../../vendors/plugins/anime.min.js"></script>
<script src="../../../vendors/plugins/wow.min.js"></script>
<script src="../../../vendors/js/main.js"></script>


</body>

</html>
