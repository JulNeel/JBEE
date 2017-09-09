<div class="edito-inner row d-flex">


  <div class="col-12 col-sm-8 d-flex flex-column  wow slideInLeft" data-wow-delay="0" data-wow-duration="0.3s" data-wow-offset="200">
  	<h2 class="agenda h2 left"> <i class="fa fa-pencil mr-2" aria-hidden="true"></i>
      <?php 
      $edito_title = get_theme_mod('edito_title');
      $edito_title = isset($edito_title) ? $edito_title  : 'Edito';
      echo esc_attr($edito_title); ?>
    </h2>
    


      
    <div class="flex-row">
      <div class="edito-thumbnail center float-sm-left col-12 col-sm-3 p-0 mb-3 mr-0 mr-sm-3">
        <?php
          $edito_img_id = get_theme_mod('edito_img');
          $edito_img_id = isset($edito_img_id) ? $edito_img_id  : NULL;
          $edito_img_url = wp_get_attachment_image_src($edito_img_id,'medium', false);
          echo wp_get_attachment_image( $edito_img_id, 'thumbnail', "", array( "class" => "img-fluid" ) ); 

        ?>  
      </div>
      <blockquote id="edito_text" class="blockquote mb-3 mb-sm-0 p-0 container-fluid" >


          <?php 
          // Load a customizer setting into a variable
          $edito = esc_attr(get_theme_mod('edito_text'));

          // Is there any text in our edito?
          if( !empty($edito) )
          {
              // Once we verify the variable isn't empty, run nl2br
              $edito = nl2br($edito); ?>

          <p> <?php  echo  $edito ?></p>
          <?php

          }
          ?>
        
          <footer class="blockquote-footer"><?php  echo esc_attr(get_theme_mod( 'edito_sign','' )); ?> </footer>
      </blockquote>          
    </div>
    
  </div>
  <div class="col-12 col-sm-4  d-flex flex-column justify-content-start wow slideInRight" data-wow-delay="0" data-wow-duration="0.3s" data-wow-offset="200">
    <h2 class="h2 left"> <i class="fa fa-address-book mr-2" aria-hidden="true"></i>Contact</h2>
    <?php echo do_shortcode('[contactshortcode]'); ?>
    <?php echo do_shortcode('[contacticonshortcode]'); ?>
  </div>       
</div>