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
<link rel="shortcut icon" type="image/png" href="../../img/favicon.png"/>

 
<title>Login Page</title>
 
 
 
<link rel="stylesheet" type="text/css" media="all" href="../../vendors/plugins/bootstrap4/css/bootstrap.min.css" />

  
<link rel="stylesheet" type="text/css" media="all" href="../../vendors/plugins/font-awesome/css/font-awesome.min.css" />

          
<link rel="stylesheet" type="text/css" media="all" href="../../vendors/plugins/owl-carousel/assets/owl.carousel.css" /> 
  
<link rel="stylesheet" type="text/css" media="all" href="../../vendors/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css" /> 
<link rel="stylesheet" type="text/css" media="all" href="../../vendors/plugins/jquery-ui/jquery-ui.min.css" /> 
<link rel="stylesheet" type="text/css" media="all" href="../../vendors/plugins/select2/dist/css/select2.min.css" /> 

<link rel="stylesheet" type="text/css" media="all" href="../../vendors/fonts/athena/style.css" /> 
<link rel="stylesheet" type="text/css" media="all" href="../../vendors/css/style.css" />
        
        
    
    
</head>     

       


    
<body>


 <header class="header header--2 dark page" data-sticky="true">
      <div class="header__left">
      <a class="ps-logo" href="/"><img src="img/logo.png" alt=""></img></a>
      <a class="header__link" href="/"><i class="athena-archive"></i> Browse Jobs</a>
      </div>
      <div class="header__right">
        <ul class="menu">
          <li class="menu-item-has-children"><a th:href="@{/job/create}">Hire Freelancer</a><span class="sub-toggle"></span>
            
          </li>
        
        </ul>
        <div class="header__actions"><a class="ps-btn ps-btn--outline" th:href="@{/login}">Login</a><a class="ps-btn" th:href="@{/register}">Sign Up</a></div>
      </div>
    </header>
    <header class="header header--mobile" data-sticky="false">
      <div class="header__content">
        <div class="header__left"><a class="ps-toggle--sidebar" href="#navigation-mobile"><i class="fa fa-bars"></i></a></div>
        <div class="header__center"><a class="ps-logo" href="#"><img src="img/logo.png" alt=""></img></a></div>
        <div class="header__right">
          <div class="header__actions"><a class="ps-search-btn" href=""><i class="fa fa-search"></i></a></div>
        </div>
      </div>
    </header>
    <div class="ps-panel--sidebar" id="navigation-mobile">
      <div class="ps-panel__header">
        <h3>Menu</h3>
      </div>
      <div class="ps-panel__content">
        <ul class="menu--mobile">
           <li><a href="/">Freelancers</a></li>
         
        </ul>
      </div>
    </div>    


 <div class="ps-page--signin">
      <div class="container">
      
       
      
      
        <form class="ps-form--signin" action="" method="post">
          <div class="ps-form__header">
            <h3>Login</h3>



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
            </div><a href="">Forgot password</a>
          </div>
          <div class="ps-form__footer">
            <button name="login-user" class="ps-btn ps-btn--fullwidth ps-btn--gradient">Login</button>
            <p>Don't have an account?<a href="../../user/register"> Sign up now!</a></p>
          </div>
        </form>
      </div>
    </div>
      
  
    <footer class="ps-footer">
      <div class="container">
        <div class="ps-footer__top"><a class="ps-logo" href="/"><img src="" alt=""></img></a>
          <div class="ps-footer__numbers">
            <p><span><strong>2,342,233</strong> COMMUNITY MEMBERS</span><span><strong>15,342,216</strong> TOTAL JOBS POSTED</span></p>
          </div>
        </div>
        
        
        <div class="ps-footer__center">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 ">
                                <aside class="widget widget_footer">
                                    <h3 class="widget-title">MEET ADWUMAFIE</h3>
                                    <ul>
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Our Team</a></li>
                                        <li><a href="#">Our Services</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                    </ul>
                                </aside>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 ">
                                <aside class="widget widget_footer">
                                    <h3 class="widget-title">ADWUMAFIE SUPPORT</h3>
                                    <ul>
                                        <li><a href="#">How it works</a></li>
                                        <li><a href="#">Terms and Conditions</a></li>
                                        <li><a href="#">Help Center</a></li>
                                    </ul>
                                </aside>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 ">
                                <aside class="widget widget_footer">
                                    <h3 class="widget-title">RESOURCES</h3>
                                    <ul>
                                        <li><a href="#">Client Stories</a></li>
                                        <li><a href="#">Testimonies</a></li>
                                        <li><a href="#">Business Support</a></li>
                                        <li><a href="#">Customer Support</a></li>
                                    </ul>
                                </aside>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 ">
                                <aside class="widget widget_footer">
                                    <h3 class="widget-title">BROWSE</h3>
                                    <ul>
                                        <li><a href="#">Freelancers</a></li>
                                        <li><a href="#">Employers</a></li>
                                        <li><a href="#">Jobs</a></li>
                                        <li><a href="#">Skills</a></li>
                                    </ul>
                                </aside>
                            </div>
                            
                        </div>
                    </div>
        
        
        <div class="ps-footer__bottom">
          <figure>
            <ul class="ps-footer__nav">
              <li><a href="#"> Privacy Policy</a></li>
              <li><a href="#"> Terms and Conditions</a></li>
              <li><a href="#"> Help</a></li>
              <li><a href="#"> Adwumafie Licenses</a></li>
              <li><a href="#"> Partners</a></li>
            </ul>
            <p>&copy; 2020 <a href="#">Adwumafie</a> - All Rights Reserved. Made by <a href="#">Adwumafie</a></p>
          </figure>
          <figure>
          
            <ul class="ps-list--social">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </figure>
        </div>
      </div>
    </footer>
    
    
    
    <div id="back2top"><i class="pe-7s-angle-up"></i></div>
    <div class="ps-site-overlay"></div>
    <div id="loader-wrapper">
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
      <div class="ps-search__content">
        <form class="ps-form--primary-search" action="do_action" method="post">
          <input class="form-control" type="text" placeholder="Search for..."/>
          <button><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>
 

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