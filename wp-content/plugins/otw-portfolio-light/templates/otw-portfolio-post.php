<?php

/**

 * The Template for displaying all single Portfolio posts.

 */



get_header();

otw_pfl_scripts_styles(); /* include the necessary srctips and styles */

otw_pfl_filter_scripts_styles();

?>



<?php $style_width = '';

  if( get_option( 'otw_pfl_content_width' ) ) {

      $style_width = 'style="width:'.get_option('otw_pfl_content_width').'px;"';

  }

?>



<div class="otw-row" <?php echo $style_width; ?>>



			<?php while ( have_posts() ) : the_post(); ?>



            <div class="otw-eighteen otw-columns">



            <article id="post-<?php the_ID(); ?>" <?php post_class('otw-single-portfolio-item'); ?>>

                <?php if ( get_post_meta( $post->ID, 'otw_head_title_setting_pfl', true) != 1 ) { ?>

                    <div class="entry-header">

                        <h1 class="entry-title"><?php the_title(); ?></h1>

					</div>

                <?php } ?>

                  <!-- Portfolio Image Slider -->

                        <?php

                            $check_imgs = get_post_meta( $post->ID, 'custom_otw-portfolio-repeatable-image', true);

                            if( !empty( $check_imgs[0] ) ) {

                            //if(get_post_meta($post->ID, 'custom_otw-portfolio-repeatable-image', true) ){

                         ?>

                          <div class="portfolio-gallery-wrapper">

                            <div class="flexslider" id="portfolio-gallery" style="margin-bottom:10px;">



                            <div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides" style="width: 1600%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">

                                <?php

                                  $post_meta_data = get_post_custom($post->ID);

                                  $custom_repeatable = unserialize($post_meta_data['custom_otw-portfolio-repeatable-image'][0]);

                                   foreach ($custom_repeatable as $custom_image) {

                                        $url = wp_get_attachment_image_src($custom_image, 'otw-porfolio-large');

                                        echo '<li data-thumb="'.$url[0].'" style="width: 700px; float: left; display: block;"><img alt="" src="'.$url[0].'"></li>';

                                   }

                                ?>

                              </ul></div><ul class="flex-direction-nav"><li><a href="#" class="flex-prev flex-disabled"><?php _e( 'Previous', 'otw_pfl' ); ?></a></li><li><a href="#" class="flex-next"><?php _e( 'Next', 'otw_pfl' ); ?></a></li></ul></div>

                            <div class="flexslider" id="portfolio-carousel" style="margin-bottom:10px;">



                            <div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides" style="width: 1600%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">

                                <?php

                                  $post_meta_data = get_post_custom($post->ID);

                                  $custom_repeatable = unserialize($post_meta_data['custom_otw-portfolio-repeatable-image'][0]);

                                   foreach ($custom_repeatable as $custom_image) {

                                        $url = wp_get_attachment_image_src($custom_image, 'otw-porfolio-large');

                                        echo '<li data-thumb="'.$url[0].'" style="width: 210px; float: left; display: block;"><img alt="" src="'.$url[0].'"></li>';

                                   }

                                ?>

                              </ul></div><ul class="flex-direction-nav"><li><a href="#" class="flex-prev flex-disabled"><?php _e( 'Previous', 'otw_pfl' ); ?></a></li><li><a href="#" class="flex-next"><?php _e( 'Next', 'otw_pfl' ); ?></a></li></ul></div>

                          </div>

                        <?php } ?>

                  <!-- END Portfolio Image Slider -->



                 



            </article><!-- #post -->



            </div>



			<?php endwhile; // end of the loop. ?>



	<div class="otw-six otw-columns">

<!--  <div class="categories"><?php the_taxonomies(); ?> <?php edit_post_link( __( 'Edit Post', 'otw_pfl' ), '<span class="edit-link">', '</span><br /><br />' ); ?></div><br /> -->



              <div class="entry-content">
                <h1>
                  <?php the_title(); ?>
                </h1>
				<?php
					// $taxo = get_object_taxonomies( 'otw-portfolio' );
					// $taxo0=$taxo[0];
					// print_r($taxo0);
					// $terms = wp_get_post_terms("", $taxo0, "" );
					// print_r($term);
					// $temp=get_the_terms($post->ID,$taxo0);
					// print_r($temp);
					// print("<pre>".print_r($temp,true);."</pre>");

				?>


                <a href="<?php the_permalink(); ?>"></a>

                <!-- <div class="excerpt">
                  <?php if ( !empty( $post->post_excerpt ) ) :
                    the_excerpt();
                  else :
                    false;
                  endif; ?>
                </div> -->

                <?php the_content(); ?>

                    <!-- Portfolio Meta Content -->

                        <?php if(get_post_meta($post->ID, 'custom_otw-portfolio-url', true) ) { ?>

                            <div class="visit-site"><a href="http://<?php echo get_post_meta($post->ID, 'custom_otw-portfolio-url', true); ?>"><?php _e( 'Visit site', 'otw_pfl' ); ?></a></div>

                        <?php } ?>



                        <?php if(get_post_meta($post->ID, 'custom_otw-portfolio-quote', true) ) { ?>

                            <blockquote class="otw-sc-quote bordered">

                              <p><?php echo get_post_meta($post->ID, 'custom_otw-portfolio-quote', true); ?></p>

                            </blockquote>

                        <?php } ?>

                    <!-- END Portfolio Meta Content -->

              </div>



              <nav class="nav-single">

<!--                 <h3 class="assistive-text"><?php _e( 'Post navigation', 'otw_pfl' ); ?></h3> -->

                <span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'otw_pfl' ) . '</span> Previous' ); ?></span>

                <span class="nav-next"><?php next_post_link( '%link', 'Next <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'otw_pfl' ) . '</span>' ); ?></span>

              </nav><!-- .nav-single -->



              <?php // comments_template( '', true ); ?>

	</div>



</div>



<?php get_footer(); ?>