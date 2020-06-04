<?php  session_start();
require_once '../../config/dbconfig.php';
require_once  '../../functions/functions.php';

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
    <link rel="shortcut icon" type="image/png" href="../../vendors/img/favicon.png" />


    <title> dashboard</title>



    <link rel="stylesheet" type="text/css" media="all" href="../../vendors/plugins/bootstrap4/css/bootstrap.min.css" />


    <link rel="stylesheet" type="text/css" media="all" href="../../vendors/plugins/font-awesome/css/font-awesome.min.css" />


    <link rel="stylesheet" type="text/css" media="all" href="../../vendors/plugins/owl-carousel/assets/owl.carousel.css" />

    <link rel="stylesheet" type="text/css" media="all" href="../../vendors/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../vendors/plugins/jquery-ui/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../vendors/plugins/select2/dist/css/select2.min.css" />

    <link rel="stylesheet" type="text/css" media="all" href="../../vendors/fonts/athena/style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../vendors/css/style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../vendors/css/style2.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

<body>


<?php include 'freelancer/includes/dash_menu.html' ?>



    <div class="ps-page" id="dashboard">
        <nav class="ps-navigation--dashboard">
            <ul>

                <li><a href="">Dashboard</a></li>
                <!--li><a href="#">Projects</a></li-->
                <!--li class="active"><a href="#">Inbox</a></li-->

                <!--li><a href="#">Feedback</a></li-->
                <li><a href="#">Profile</a></li>


            </ul>
        </nav>
        <div class="ps-dashboard ps-section--sidebar">
            <div class="container">
                <div class="ps-section__container">
                    <div class="ps-section__content">





                        <div align="right">
                            <?php
                            $chat_query = mysqli_query($con,"SELECT * FROM message WHERE sender_id = '$user_id' AND receiver_id = '$receiver_id' ");
                            if($chat_query){
                                while($chat_row = mysqli_fetch_assoc($chat_query)){
                                    $message = $chat_row['text'];
                                    $time = $chat_row['created'];

                                    echo $message;

                                   // echo $time;
                                    echo '<br>';
                                }
                            }
                          ?>
                        </div>
                        <div align="left">
                            <?php
                        $chat_query = mysqli_query($con,"SELECT * FROM message WHERE sender_id = '$receiver_id' AND receiver_id = '$user_id' ");
                        if($chat_query){
                            while($chat_row = mysqli_fetch_assoc($chat_query)){
                                $message = $chat_row['text'];
                                $time = $chat_row['created'];

                                echo $message;

                                // echo $time;
                                echo '<br>';
                            }
                        }
                        ?>

                        </div>

                        <?php require_once '../../controllers/sendMessage.php'?>

                        <form action="" method="post">
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" rows="3" name="message" placeholder="Enter your message here..."></textarea>
                                <input type="hidden" name="receiver" value="<?php  echo $receiver_id; ?>">
                            </div>

                            <div class="ps-form__submit">
                                <button type="submit" name="send-message" class="ps-btn ps-btn--gradient">Send</button>
                                <button type="reset" class="ps-btn ps-btn--gradient">Clear</button>
                            </div>
                        </form>


                    </div>





                    <div class="table-responsive-lg">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>



                    <?php include '../../template_parts/sidebar.php' ?>



                </div>
            </div>
        </div>
    </div>



    <?php include '../../template_parts/footer.html' ?>



    <script src="../../vendors/plugins/jquery-1.12.4.min.js"></script>
    <script src="../../vendors/plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="../../vendors/plugins/bootstrap4/js/bootstrap.min.js"></script>
    <script src="../../vendors/plugins/imagesloaded.pkgd.min.js"></script>
    <script src="../../vendors/plugins/masonry.pkgd.min.js"></script>
    <script src="../../vendors/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script src="../../vendors/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="../../vendors/plugins/select2/dist/js/select2.full.min.js"></script>

    <script src="../../vendors/plugins/anime.min.js"></script>
    <script src="../../vendors/plugins/wow.min.js"></script>
    <script src="../../vendors/js/main.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


</body>

</html>
