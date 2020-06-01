<?php
session_start();
require_once '../../../config/dbconfig.php';
require_once  '../../../functions/functions.php';
//check if current user has session


$user_id = $_SESSION['id'];
$user_email = $_SESSION['email'];
if(!isset($_SESSION['email'])){
    echo "<script>window.location='../login/'</script>";
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
    <link rel="stylesheet" type="text/css" media="all" href="../../../vendors/css/dropzone.css" />

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


                <?php
                   if(isset($_POST['submit'])){
                       $description = checkValues($_POST['description']);
                       $title = checkValues( $_POST['title']);
                       $link = checkValues($_POST['link']);


                       // Insert form data in the database
                       $insert = mysqli_query($con,"INSERT INTO portfolio (title,description,link,user_id) VALUES ('".$title."','".$description."','".$link."','".$user_id."')");

                       if($insert){
                           echo '                
 <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Portfolio was added Successfully</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
    </div>    
';
                       }
                   }

                ?>


                <form class="ps-form--post-a-job"  action="" method="post" >
                    <h3>Add Portfolio</h3>


                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" type="text" name="title" id="title" placeholder="e.g Ecommerce Website"/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="6" name="description" id="description" placeholder="Enter portfolio description here"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Link</label>
                        <input class="form-control" type="text" name="link" id="link" placeholder="e.g https://github.com/eco"/>
                    </div>

                    <!--div class="form-group">
                        <label>Image</label>
                        <input class="form-control" type="file" name="file"  id="file" />
                    </div-->

                    <div class="ps-form__submit">
                        <button type="submit" name="submit" class="ps-btn ps-btn--gradient submitBtn" >Add</button>

                    </div>
                </form>



            </div>





            
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
<script src="../../../vendors/plugins/dropzone.min.js"></script>
<script src="../../../vendors/js/main.js"></script>

<script>

    $(document).ready(function(e){
        // Submit form data via Ajax
        $("#fupForm").on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'submitPortfolio.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                    $('.submitBtn').attr("disabled","disabled");
                    $('#fupForm').css("opacity",".5");
                },
                success: function(response){ console.log(response);
                    $('.statusMsg').html('');
                    if(response.status == 1){
                        $('#fupForm')[0].reset();
                        $('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>');
                    }else{
                        $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                    }
                    $('#fupForm').css("opacity","");
                    $(".submitBtn").removeAttr("disabled");
                }
            });
        });
    });

    // File type validation
    $("#file").change(function() {
        var file = this.files[0];
        var fileType = file.type;
        var match = ['image/jpeg', 'image/png', 'image/jpg'];
        if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]))){
            alert('Sorry, only JPG, JPEG, & PNG files are allowed to upload.');
            $("#file").val('');
            return false;
        }
    });


</script>


</body>
</html>