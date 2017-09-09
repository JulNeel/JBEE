<?php
$args = array( 
	'post_type' => 'jbee_sections',
	'posts_per_page' => 10,
	'orderby' => 'menu_order',
	'order' => 'ASC'
	);
$sectionloop = new WP_Query( $args );

while ( $sectionloop->have_posts() ) : $sectionloop->the_post(); ?>

<?php 
$titleslug=sanitize_title( the_title('','', false) );
$post_slug= $post->post_name;
$parallax_img_url = get_the_post_thumbnail_url($post->ID, 'full');
 ?>


<section  id="<?php echo $post_slug ?>" 

    <?php if (!empty($parallax_img_url)) { 
        post_class('section container-fluid d-flex home-section parasection home-section');?> 
        data-parallax="scroll" data-image-src="<?php echo $parallax_img_url ?>" data-bleed="50" data-speed="0.2">

    <?php } else {
        post_class('section container-fluid d-flex home-section parasection bg-white'); ?> >
    <?php } ?> 
		

<?php 
$sectionTitle=the_title('','',false);
switch ($post_slug) // on indique sur quelle variable on travaille
{ 
    case 'prestations': 
        $templatePart = 'prestations';
    break;
    
    case 'votre-projet': 
        $templatePart = 'process';
    break;

    case 'a-propos': 
        $templatePart = 'about';
    break;

    case 'portfolio':
        $templatePart = 'portfolio';
    break;
    	
    default:
        $templatePart = 'section';

}

	include(locate_template('home-'.$templatePart.'.php')); ?>

</section>

<?php endwhile;