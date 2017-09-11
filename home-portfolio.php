<div class="container d-flex flex-column">
<div class="row">
	<div class="col-12" >
		<h2 class="post-title h1 mt-1 mb-5 center wow fadeInLeft col-12" data-wow-duration="0.9s" data-wow-delay="0.1s" data-wow-offset="200" >
		<?php the_title(); ?>
		</h2>
		
	</div>
	<div class="wow fadeInRight col-12" data-wow-duration="0.9s" data-wow-delay="0.1s" data-wow-offset="100">
	<?php the_content(); ?>
<?php 
$projet_allcat_terms = get_terms( array(
    'taxonomy' => 'cat_jbee_projets',
    'hide_empty' => false
) );



if ( ! empty( $projet_allcat_terms ) && ! is_wp_error( $projet_allcat_terms ) ){
    echo '<div id="filters" class="clearfix mx-0 mb-5 row no-gutters"><button type="button" class="btn btn-primary-outline filter h6 mr-2" data-filter="all">'.  __( 'All', 'sage' ) .'</button>'; 
    foreach ( $projet_allcat_terms as $term ) {
        echo '<button type="button" class="btn btn-primary-outline filter h6 mr-2" data-filter=".'. $term->slug . '">' . $term->name . '</button>';
    }
    echo '</div>';
}
?>


	<div id="portfoliolist" class="row d-flex no-gutters">


		<?php
		$args2 = array( 
			'post_type' => 'jbee_projets',
			'posts_per_page' => 10,
			'orderby' => 'menu_order',
			'order' => 'ASC'
			);
		$projetloop = new WP_Query( $args2 );

		while ( $projetloop->have_posts() ) : $projetloop->the_post(); ?>

		<?php 

	 	$post_id = get_the_ID();
	 	$projet_img = rwmb_meta( 'jbee-image_advanced_1', 'size=slideshow_img' );
	 	$projet_client = rwmb_meta( 'jbee-text_2');
	 	$projet_url = rwmb_meta( 'jbee-url_1' );


	 	$projet_cat_terms = get_the_terms( get_the_ID(), 'cat_jbee_projets' );
	 	if ( ! empty( $projet_cat_terms ) && ! is_wp_error( $projet_cat_terms ) ){
	    $cat_array = array();
	    foreach ( $projet_cat_terms as $term ) {
	        $cat_array[] = $term->slug;
	    }                     
	    $cat_list = join( " ", $cat_array );
	}

	 	$projet_tag_terms = get_the_terms( get_the_ID(), 'tag_jbee_projets' );
	 	 	if ( ! empty( $projet_tag_terms ) && ! is_wp_error( $projet_tag_terms ) ){
	    $tag_array = array();                  
	    foreach ( $projet_tag_terms as $tag ) {
	        $tag_array[] = $tag->name;
	    }
	    $tag_list = join( ", ", $tag_array );
		}
	 ?>




		<div class="portfolio col-12 col-md-6 col-lg-3 <?php echo $cat_list ?>" data-cat="<?php echo $cat_list ?>">



			<div class="portfolio-wrapper " data-toggle="modal" data-target="#<?php echo $post_id ?>" >
			<?php the_post_thumbnail( 'porfolio_img',['class' => ''] ); ?>
		      <a class="portfolio-overlay">
		          <span class="portfolio-overlay-text center"><?php the_title(); ?><br><i class="fa fa-plus center" aria-hidden="true"></i></span> 
		      </a>
			</div>


			<div class="modal-wrap">
			<div class="modal fade" id="<?php echo $post_id ?>">
				 <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h2><?php the_title(); ?></h2>
				        <?php 
				        if($projet_url){ ?>
		              	<a class="ml-auto my-0 nav-link btn btn-primary-outline" href="<?php  echo $projet_url; ?>" aria-label="Facebook" target="_blank">
		                
		                <span class="h6"><i class="fa fa-link" aria-hidden="true"></i> <?php _e('Visit the site', 'sage')  ?></span>
		              	</a><?php } 
				        ?>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">

				      <?php 

						if ( !empty( $projet_img ) ) {
						echo '<div id="portfolio-carousel-', esc_attr( $post_id),'" class="carousel slide" data-ride="carousel"> <div class="carousel-inner" role="listbox">';
							$i = 0;
						    foreach ( $projet_img as $image ) {

							if ($i == 0) {
							    echo '<div class="carousel-item active"><img class="d-block w-100" src="', esc_url( $image['url'] ), '" title="', esc_attr( $image['title'] ), '" alt="', esc_attr( $image['alt'] ), '"></div>';
							} else {
							     echo '<div class="carousel-item"><img class="d-block w-100 " src="', esc_url( $image['url'] ), '" title="', esc_attr( $image['title'] ), '" alt="', esc_attr( $image['alt'] ), '"></div>';
							}
							$i++;

							}
						        
						
						echo '  <div class="control-wrapper"><a class="carousel-control-prev" href="#portfolio-carousel-', esc_attr ($post_id),'" role="button" data-slide="prev">
									<i class="fa fa-chevron-left fa-2x p-2" aria-hidden="true"></i>
									<span class="sr-only">Previous</span>
								 </a>
								<a class="carousel-control-next" href="#portfolio-carousel-', esc_attr ($post_id),'" role="button" data-slide="next">
									<i class="fa fa-chevron-right fa-2x p-2" aria-hidden="true"></i>
									<span class="sr-only">Next</span>
								</a></div>
							</div>
						</div>';
						}



				       ?>
				      	<div class="projet-content p-2 mt-2"> <?php the_content(); ?></div>
				      </div>
				      <div class="modal-footer left">
						<?php 
						
						if(isset($projet_client)){ ?>
		              	<span class="h6 mr-2">
		              		<i class="fa fa-user" aria-hidden="true"></i>
		              		<span class="sr-only"><?php  _e('Client : ','sage'); ?> </span>
		              		<?php echo $projet_client; ?>
		              	</span><?php }  ?>

		              	<?php if(isset($tag_list)){ ?>
		              	<span class="h6 mr-2">
		              		<i class="fa fa-tags" aria-hidden="true"></i>
		              		<span class="sr-only"><?php  _e('Tags : ','sage'); ?> </span>
		              		<?php echo $tag_list; ?>
		              	</span><?php } ?>

				      </div>
				    </div>
				  </div>


			</div></div>
			
		</div> <!--end porfolio-->
	

<?php endwhile; ?>
</div> <!--end row-->
</div>
</div>
</div>