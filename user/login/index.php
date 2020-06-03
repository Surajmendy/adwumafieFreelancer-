<?php
session_start();

require_once '../../config/dbconfig.php';
require_once '../../functions/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
   
    <meta charset="utf-8"/>

<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" type="image/png" href="../../vendors/img/favicon.png"/>

 
<title>Login Page</title>
 
 
 
<link rel="stylesheet" type="text/css" media="all" href="../../vendors/plugins/bootstrap4/css/bootstrap.min.css" />

  
<link rel="stylesheet" type="text/css" media="all" href="../../vendors/plugins/font-awesome/css/font-awesome.min.css" />

          
<link rel="stylesheet" type="text/css" media="all" href="../../vendors/plugins/owl-carousel/assets/owl.carousel.css" /> 
  
<link rel="stylesheet" type="text/css" media="all" href="../../vendors/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css" /> 
<link rel="stylesheet" type="text/css" media="all" href="../../vendors/plugins/jquery-ui/jquery-ui.min.css" /> 
<link rel="stylesheet" type="text/css" media="all" href="../../vendors/plugins/select2/dist/css/select2.min.css" /> 

<link rel="stylesheet" type="text/css" media="all" href="../../vendors/fonts/athena/style.css" /> 
<link rel="stylesheet" type="text/css" media="all" href="../../vendors/css/style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../vendors/css/style2.css" />
        
        
    
    
</head>     

       


    
<body>


<?php  include '../header_footer/header_nav.php'?>


 <div class="ps-page--signin">
      <div class="container" id="sign-card">
      
       
      
      
        <form class="ps-form--signin" action="" method="post">
          <div class="ps-form__header">
            <h3>Sign In</h3>



              <?php require_once '../../controllers/loginUser.php'?>



          </div>
          <div class="ps-form__content">
            <div class="form-group">           
              <input class="form-control" type="text" name="email" value="" placeholder="Email" required="required"/>
            </div>
            <div class="form-group">
              <input class="form-control" type="password" name="password" value="" placeholder="Password" required="required"/>
            </div>
          </div>
          <div class="ps-form__actions">
            <div class="ps-checkbox ps-checkbox--circle">
              <input class="form-control" type="checkbox" id="newsletter" name="newsletters"/>
              <label for="newsletter">Remember me</label>
            </div><a href="">Forgot password?</a>
          </div>
          <div class="ps-form__footer">
            <button name="login-user" class="ps-btn ps-btn--fullwidth ps-btn--gradient">Login</button>
            <p>Not a member yet?<a href="../../user/register"> Sign up now!</a></p>
          </div>
        </form>
      </div>
    </div>


<?php  include '../header_footer/footer.php'?>

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
 
    
     


</body>
</html>