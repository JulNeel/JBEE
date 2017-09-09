<?php $tag_list = get_the_tag_list('',', '); ?>
<?php $category_list = get_the_category_list(', '); ?>
<?php $post_time = get_post_time('c', true); ?>
<?php $post_date = get_the_date(); ?>
<span class="meta meta-date small font-weight-bold">
	<i class="fa fa-calendar mr-1" aria-hidden="true"></i>
	<time class="updated" datetime="<?php $post_time ?>"><?php echo $post_date; ?></time>
</span>
<span> - </span>
<span class="meta meta-category small font-weight-bold">
	<i class="fa fa-folder-open-o mr-1" aria-hidden="true"></i>
	<?php echo $category_list; ?>
</span>
<?php if ($tag_list) { ?>
<span> - </span>
<span class="meta meta-tags small font-weight-bold"><i class="fa fa-tags mr-1" aria-hidden="true"></i>	
	<?php echo $tag_list; ?>
</span>
<?php } ?>

<span class="meta meta-tags small font-weight-bold">
	<span> - </span>
	<?php edit_post_link(__('edit','sage'),'<i class="fa fa-pencil-square-o mr-1" aria-hidden="true"></i>'); ?>
</span>
<?php /** <p class="byline author vcard"><?= __('By', 'sage'); ?> <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?= get_the_author(); ?> </a></p>**/ 