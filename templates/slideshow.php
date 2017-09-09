<!-- Slideshow HTML --> 
   
            <div id="main-flexslider" class="flexslider  bounceIn shadow" data-wow-delay="0.3s" data-wow-duration="0.3s" data-wow-offset="50">
                <div class="slides">     
                <?php
                    $args = array( 
                        'post_type' => 'any',
                        'offset'=> 0,
                        'posts_per_page' => 3,
                        'category_name' => 'a-la-une',
                        'tax_query' => array('relation' => 'or',
                            array(
                                'taxonomy' => 'tribe_events_cat',
                                'field' => 'slug',
                                'terms' => 'a-la-une'
                                )
                            )
                        );

                    
                     $featured_query = new WP_Query($args);
                     while ($featured_query->have_posts()) : $featured_query->the_post();
                         
                ?>

                                <!-- Faire des trucs... -->

                        <div class="featuredSlide">
                            <a  class="featuredImage" href="<?php the_permalink() ?>" rel="bookmark">
                                <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail('slideshow_img', array( 'class' => 'img-fluid' ) ); ?>              
                                <?php endif; ?>                         
                            </a><!--// .featureImage -->
                            <div class="featuredText faded-bg"> 
                                <h2 class="h1 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                             
                                    <?php
                                    
                                    // Set up and print post meta information for EVENTS
                                    if (tribe_is_event()): ?>
                                                                                            
                                    <div class="tribe-events-event-meta-wrap">
                                        <div class="tribe-events-event-meta">
                                            <div class="">
                                            <?php 
                                            // Setup an array of venue details for use later in the template
                                            $venue_details = tribe_get_venue_details();
                                           
                                            // Venue
                                            $has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';
                                            // Organizer
                                            $organizer = tribe_get_organizer();
                                            ?>
                                                <!-- Schedule & Recurrence Details -->
                                                <div class="tribe-event-schedule-details">
                                                    <?php echo tribe_events_event_schedule_details(); ?>
                                                </div>

                                                    <?php if ( $venue_details ) : ?>
                                                        <!-- Venue Display Info -->
                                                <div class="tribe-events-venue-details">
                                                    <?php echo implode( ', ', $venue_details ); ?>
                                                    <?php
                                                    if ( tribe_get_map_link() ) {
                                                    echo tribe_get_map_link_html();
                                                    }
                                                    ?>
                                                </div> <!-- .tribe-events-venue-details -->
                                                    <?php endif; ?>

                                            </div>
                                        </div><!-- .tribe-events-event-meta -->
                                    </div><!-- .tribe-events-event-meta-wrap -->
                                    
                                        <?php endif ?>              
                              
                            </div><!--// .featureText -->
                        </div>
                    <?php 
                    endwhile;
                    wp_reset_postdata(); ?>




                    <?php
                    $page_1_id = get_theme_mod('slideshow_page_1');
                    $page_2_id = get_theme_mod('slideshow_page_2');
                    $page_3_id = get_theme_mod('slideshow_page_3');
                    $args2 = array( 
                        'post_type' => 'any',
                        'post__in' => array($page_1_id,$page_2_id,$page_3_id),
                        
                        );

                     $pages_query = new WP_Query($args2);
                     while ($pages_query->have_posts()) : $pages_query->the_post();
                         
                ?>

                                <!-- Faire des trucs... -->

                        <div class="featuredSlide">
                            <a  class="featuredImage" href="<?php the_permalink() ?>" rel="bookmark">
                                <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail('slideshow_img', array( 'class' => 'img-fluid' ) ); ?>              
                                <?php endif; ?>                         
                            </a><!--// .featureImage -->
                            <div class="featuredText faded-bg"> 

                                <h2 class="h1 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                             
                    
                              
                            </div><!--// .featureText -->
                        </div>
                    <?php endwhile; 
                    wp_reset_postdata(); ?> 

                   











                </div>   
            </div>
       
<!-- Slideshow HTML --> 