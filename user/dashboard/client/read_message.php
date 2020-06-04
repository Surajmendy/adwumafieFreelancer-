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
    <link href="../../../vendors/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" media="all" href="../../../vendors/fonts/athena/style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../vendors/css/style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../vendors/css/style2.css" />
</head>

<body>


<?php include 'includes/dash_menu.html' ?>



<div class="ps-page" id="dashboard">
    <nav class="ps-navigation--dashboard">
        <?php include 'includes/sub_nav.php'?>
    </nav>
    <div class="ps-dashboard ps-section--sidebar">
        <div class="container">
            <div class="ps-section__container">
                <div class="ps-section__content">

                    <?php
                    //check if message is for required usser

                    if(isset($_GET['sender_id']) && isset($_GET['message_id'])){

                        $sender_id = trim($_GET['sender_id']);
                        $message_id = trim($_GET['message_id']);



                        //check message table if userid is same as current user id
                        $message_query = mysqli_query($con,"SELECT * FROM message WHERE id = '$message_id'");
                        if($message_query){
                            $message_row = mysqli_fetch_array($message_query);
                            $receiver_id = $message_row['receiver_id'];
                            if($receiver_id == $user_id){
                                //proceed to load message

                                    $message = $message_row['text'];
                                    $time = $message_row['created'];

                                    $subject = $message_row['subject'];
                                   // $message_id = $message_row['id'];
                                    //fetch sender email
                                    $get_sender_email = mysqli_query($con,"SELECT * FROM users WHERE id = '$sender_id'");
                                    if($get_sender_email){
                                        $row = mysqli_fetch_array($get_sender_email);
                                        $sender_email = $row['email'];
                                        $sender_name = $row['first_name'];

                                    }


                                    ?>
                                <div class="card mb-100" id="read-message-box">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6 col-sm-12 mb-50">
                                                <h5 class="card-title ps-heading--2 mb-20 text-capitalize"><span class="ps-highlight">Message box</span></h5>
                                                <p></p>


                                                <ul class="list-group">
                                                    <li class="list-group-item"><?php echo $message ; ?></li>

                                                </ul>

                                            </div>
                                            <div class="col-xl-6 col-sm-12 mb-50">

                                                <ul class="list-group">
                                                    <li class="list-group-item">Subject: <?php echo $subject; ?></li>
                                                    <li class="list-group-item">From: <?php echo $sender_email; ?></li>
                                                    <li class="list-group-item">Received: <?php echo timeAgo($time); ?></li>


                                                </ul>
                                            </div>




                                        </div>
                                    </div>
                                </div>


                    <?php


                            }else{
                                echo '                
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>You dont have permission to read this messsage</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
    </div>    
';
                            }
                        }//eof message_query if
else{
    echo 'no qury';
}

                    }
                    ?>






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

<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>


</body>

</html>
