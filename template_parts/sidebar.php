 <div class="ps-section__sidebar">
              <aside class="widget widget_profile widget_progress">
                <div class="ps-block--user">
                  <div class="ps-block__thumbnail"><img src="../../../vendors/img/users/user.png" alt=""/></div>
                  <div class="ps-block__content">
                    <p><strong>Wellcome back</strong></p>
                    <?php if($role=="client") { ?>
                        <h4> <?php echo $username; ?> </h4><a href="profile.php">View your profile<i class="fa fa-caret-right"></i></a>

                        <?php
                    }else{
                        ?>
                        <h4> <?php echo $username; ?> </h4><a href="profile.php">View your profile<i class="fa fa-caret-right"></i></a>
                      <?php
                    }
                     ?>
                  </div>
                </div>

                <!--div class="ps-progress"><span>65%</span>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width:65%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div-->
              </aside>
            </div>