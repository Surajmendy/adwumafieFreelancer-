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
                    <h3>Available Clients</h3>
                    <h4 class="ps-heading--2">connect with clients</h4>
                    <div class="row" id="list_user">

                        <?php
                        //get available clients

                        $clients_query = mysqli_query($con,"SELECT * FROM users WHERE role = 'client'");


                        if($clients_query) {
                            $num_clients = mysqli_num_rows($clients_query);
                            if ($num_clients > 0) {
                                while ($clients_query_row = mysqli_fetch_assoc($clients_query)) {
                                    $first_name = $clients_query_row['first_name'];
                                    $last_name = $clients_query_row['last_name'];
                                    $name = $first_name . " " . $last_name;
                                    $client_id = $clients_query_row['id'];

                                    ?>

                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12  ">
                                        <div class="ps-block--people">
                                            <div class="ps-block__thumbnail"><img src="../../../vendors/img/users/user.png"
                                                                                  alt=""></div>
                                            <div class="ps-block__content"><a class="ps-block__title"
                                                                              href="#"><?php echo $name; ?></a>
                                                <p></p>
                                                <p><strong></strong></p>
                                                <div class="ps-block__footer">

                                                    <a class="ps-btn ps-btn--sm " href="../chat.php?user=<?php echo $client_id ?>" id ="start_chat">Chat</a>


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


<script>


    function make_chat_dialog_box(to_user_id, to_user_name)
    {
        var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
        modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
        modal_content += '</div>';
        modal_content += '<div class="form-group">';
        modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control"></textarea>';
        modal_content += '</div><div class="form-group" align="right">';
        modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
        $('#user_model_details').html(modal_content);
    }

    $(document).on('click', '#start_chat', function(){
        var to_user_id = $(this).data('touserid');
        var to_user_name = $(this).data('tousername');
        make_chat_dialog_box(to_user_id, to_user_name);
        $("#user_dialog_"+to_user_id).dialog({
            autoOpen:false,
            width:400
        });
        $('#user_dialog_'+to_user_id).dialog('open');
    });

    });
</script>


</body>
</html>