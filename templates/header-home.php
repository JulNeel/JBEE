<header class="banner" role="banner">
  <div id="header_wrap" class="d-flex flex-column justify-content-between container-fluid ">
      <nav id="nav-preheader" class=" row navbar navbar-toggleable-md bg-white " role="navigation">


          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse-content2" aria-controls="collapse-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
          </button>
          

          <div class="collapse navbar-collapse justify-content-end" id="collapse-content2" > 
            <?php
            if (has_nav_menu('secondary_navigation')) :
              wp_nav_menu([
                'theme_location' => 'secondary_navigation',
                'container' => false,
                'menu_class' => 'navbar-nav mt-2 mt-lg-0',
                'walker'=> new bs4Navwalker()
                
                ]);
            endif;
            ?>
            <?php $fb_account = esc_attr(get_theme_mod( 'contact_fb','' )); ?>
            <?php $screen_name = esc_attr(get_theme_mod( 'contact_tw','' )); ?>
              <?php if($fb_account){ ?>
              <a class="mx-2 my-0 nav-link" href="https://www.facebook.com/<?php  echo $fb_account; ?>" aria-label="Facebook" target="_blank">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a><?php } ?>

              <?php if($screen_name){ ?>
              
              <a class=" mx-2 my-0 nav-link" href="https://www.twitter.com/<?php echo $screen_name; ?>" aria-label="Twitter" target="_blank">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <?php } ?>
          </div>
       
      </nav>
   
      <div id="main-logo" class="row d-flex justify-content-center my-1">
        <?php if ( function_exists( 'the_custom_logo' ) ) { ?>
        <div class="custom-logo  p-1 p-sm-2 p-md-3">
            <?php the_custom_logo();} ?>
        </div>

      </div><?php ?>

    <div class="row  d-flex">
      <div class="container">
        <div class="row">
          <div id="edito" class="faded-bg p-1 p-sm-2 p-md-3 hidden-sm-down" >


          <?php 
          // Load a customizer setting into a variable
          $edito = esc_attr(get_theme_mod('edito_text'));

          // Is there any text in our edito?
          if( !empty($edito) )
          {
              // Once we verify the variable isn't empty, run nl2br
              $edito = nl2br($edito); ?>

          <span> <?php  echo  $edito ?></span>
          <?php

          }
          ?>
          </div>
        </div> 
      </div>          
    </div>



  
      <nav id="nav-header" class="navbar navbar-toggleable-md row d-flex shadow" id="nav-header">
       
          <div class="navbar-header hidden-md-down mr-2">

          <?php 
          if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();}
          ?>
  
          </div> 

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse-content" aria-controls="collapse-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
          </button>
          

          <div class="collapse navbar-collapse d-lg-flex align-items-center" id="collapse-content" > 
            <?php
            if (has_nav_menu('primary_navigation')) :
              wp_nav_menu([
                'theme_location' => 'primary_navigation',
                'container' => false,
                'menu_class' => 'navbar-nav mr-auto mt-2 mt-lg-0 center',
                
                'walker'=> new mono_walker()

                ]);
            endif;
            ?>
              <?php if($fb_account){ ?>
              <a class="btn btn-fb mx-2 my-0" href="https://www.facebook.com/<?php  echo $fb_account; ?>" aria-label="Facebook" target="_blank">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a><?php } ?>

          </div>
       
      </nav>





    </div> <?php /** end header_wrap **/ ?>
</header>