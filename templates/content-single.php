<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
    <?php get_template_part('templates/entry-meta'); ?>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      
        <?php if ( has_post_thumbnail() ) : ?>
            <a class="mb-5 d-flex bg-secondary" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail('x-large', ['class' => 'img-fluid center mx-auto', 'title' => 'Featured image']); ?>
            </a>
        <?php endif; ?>
        
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile;
