<div id="article-wrapper" class="col-12 col-md-6 my-4" >
<article <?php post_class("shadow container-fluid p-0"); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
	<div class="container-fluid p-0 ">                   
		<div class="overlay"> 
			<a href="<?php the_permalink(); ?>" class="post-img-link">    						
			
			<?php the_post_thumbnail('large', array(  ) ); ?>		
										

	    
				<div class="mask d-flex justify-content-center align-items-center">
		        	<p class="b-f"><?php _e('Read the post','sage'); ?></p>
		    	</div>
	    	</a>
		</div>
	</div>
	<?php endif; ?>
	<header class="p-1 p-lg-3 container-fluid" style="width:100%;">
    	
    	<h2 class="entry-title"><a href="<?php the_permalink(); ?>" class="d-block" ><?php the_title(); ?></a></h2>
		<?php get_template_part('templates/entry-meta'); ?>
	</header>
	<div class="post-main d-flex flex-column flex-md-nowrap p-1  pt-lg-0 px-lg-3 pb-lg-3  ">

		<div class="entry-summary container-fluid p-0">
			<?php the_excerpt(); ?>
		</div>

	</div>
</article>
</div>