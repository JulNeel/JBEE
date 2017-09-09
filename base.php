<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?> data-spy="scroll" data-target="#nav-header" data-offset="150">

      <!-- #loader-->
      <?php if (Setup\display_loader()) : ?> 
              <?php include Wrapper\loader_path(); ?> 
      <?php endif; ?>
      <!-- /#loader-->

<script> 
var $buoop = {vs:{i:11,f:-4,o:-4,s:8,c:-4},api:4}; 
function $buo_f(){ 
 var e = document.createElement("script"); 
 e.src = "//browser-update.org/update.min.js"; 
 document.body.appendChild(e);
};
try {document.addEventListener("DOMContentLoaded", $buo_f,false)}
catch(e){window.attachEvent("onload", $buo_f)}
</script>
 

    <?php
      get_template_part('templates/header');
    ?>

    <div id="main-content-wrap" class="wrap container-fluid p-0" role="document">

    
    <?php
    if ( is_home() ) { ?>
              <main>
                
                  <?php include Wrapper\template_path(); ?>
               
              </main><!-- /.main -->
    <?php } else { ?>

        <section id="content" class="section container-fluid d-flex home-section">
          <div class="container">
            <div class="row">


              <main class="main">
                
                  <?php include Wrapper\template_path(); ?>
               
              </main><!-- /.main -->
                <?php if (Setup\display_sidebar()) : ?>
              <aside class="sidebar">
                <?php include Wrapper\sidebar_path(); ?>
              </aside><!-- /.sidebar -->
                <?php endif; ?>
            </div>
          </div>
        </section ><!-- /.wrap -->
    <?php } ?>
    </div><!-- /.content -->
     <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>

  </body>
</html>
