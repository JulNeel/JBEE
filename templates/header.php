<header class="banner " role="banner">
<?php $data_image_src= get_header_image();  ?>
  <div id="header_wrap" class="d-flex flex-column justify-content-between container-fluid" data-parallax="scroll" data-image-src="<?php echo $data_image_src ?>"   data-speed="0.3">
     
   
      <div id="main-logo" class="row d-flex justify-content-center my-auto ">
        <?php if ( function_exists( 'the_custom_logo' ) ) { ?>
        <div class="custom-logo  p-1 p-sm-2 p-md-3 wow flipInX " data-wow-duration="0.7s" data-wow-delay="0.6s">
            <?php the_custom_logo();} ?>
        </div>

      </div>

  
      <nav id="nav-header" class="navbar navbar-toggleable-md row d-flex " id="nav-header">

          <div class="navbar-header hidden-md-down mr-2">
          <?php
          $logo_mini = esc_attr(get_theme_mod( 'logo_mini','' ));
          if($logo_mini):
          $home_url = home_url();
           ?>
          <a class="custom-logo-link" href="<?php echo esc_url( $home_url ); ?>">
            <img src="<?php echo $logo_mini; ?>">
          </a>
          <?php endif ?>
          </div> 

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse-content" aria-controls="collapse-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
          </button>
          

          <div id="collapse-content" class="collapse navbar-collapse d-lg-flex p-2" >
            <ul class="navbar-nav nav ml-auto mr-3 mt-2 mt-lg-0 flex-wrap">
            
              <?php
              if (is_home()){ ?> 
                <li class="nav-itemmenu-item">
                  <a class="nav-link wow flipInY py-1 px-2" data-wow-duration="0.7s" data-wow-delay="0.9s" href="#header_wrap">
                    <?php _e('Home','sage'); ?>
                  </a>
                </li>
              <?php
                if (has_nav_menu('header_home_navigation')){
                  wp_nav_menu([
                    'theme_location' => 'header_home_navigation',
                    'container' => false,
                    'items_wrap' => '%3$s',
                    'walker'=> new mono_walker()
                    ]);
                }
              }
              else { ?>
                <li class="nav-itemmenu-item">
                  <a class="nav-link wow flipInY py-1 px-2" data-wow-duration="0.7s" data-wow-delay="0.9s" href="<?php echo esc_url( $home_url ); ?>">
                    <?php _e('Home','sage'); ?>
                  </a>
                </li>

              <?php } 

              if (has_nav_menu('header_navigation')){
                wp_nav_menu([
                  'theme_location' => 'header_navigation',
                  'container' => false,
                  'items_wrap' => '%3$s',
                  'walker'=> new mono_walker()
                  ]);
              }
              ?>

            </ul>
            <div id="social-box" class="navbar-text">
              <?php $fb_account = esc_attr(get_theme_mod( 'contact_fb','' )); ?>
              <?php $tw_account = esc_attr(get_theme_mod( 'contact_tw','' )); ?>
              <?php $li_account = esc_attr(get_theme_mod( 'contact_li','' )); ?>
              <?php $git_account = esc_attr(get_theme_mod( 'contact_git','' )); ?>
                <?php if($fb_account){ ?>
                <a class="btn btn-outline-primary" href="https://www.facebook.com/<?php  echo $fb_account; ?>" aria-label="Facebook" target="_blank">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a><?php } ?>

                <?php if($tw_account){ ?>
                <a class=" btn btn-outline-primary" href="https://www.twitter.com/<?php echo $tw_account; ?>" aria-label="Twitter" target="_blank">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <?php } ?>

                 <?php if($li_account){ ?>
                <a class=" btn btn-outline-primary" href="https://www.linkedin.com/in/<?php echo $li_account; ?>" aria-label="Linkedin" target="_blank">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <?php } ?>

                 <?php if($git_account){ ?>
                <a class=" btn btn-outline-primary" href="https://github.com/<?php echo $git_account; ?>" aria-label="github" target="_blank">
                  <i class="fa fa-github" aria-hidden="true"></i>
                </a>
                <?php } ?>
              </div>


          </div>
       
      </nav>



    </div> <?php /** end header_wrap **/ ?>
</header>