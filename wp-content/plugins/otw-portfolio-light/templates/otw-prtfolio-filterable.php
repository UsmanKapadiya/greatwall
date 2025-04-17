<?php



/* Template Name: Portfolio Filterable */



get_header();

otw_pfl_scripts_styles(); /* include the necessary srctips and styles */

otw_pfl_filter_scripts_styles();

?>



<?php $style_width = '';

  if( get_option( 'otw_pfl_content_width' ) ) {

      $style_width = 'style="width:'.get_option('otw_pfl_content_width').'px;"';

  }

?>



        <div class="otw-row otw-sc-portfolio" <?php echo $style_width; ?>>

              <div class="otw-twentyfour otw-columns">
                  

<script type="text/javascript">
    function toggle_visibility(foo) {
       var e = document.getElementById(foo);
       if(e.style.display == 'none')
          e.style.display = 'block';
       else
          e.style.display = 'none';
    }
</script>

                  <ul class="otw-portfolio block-grid three-up mobile">  

                  <li data-type="commercial industrial residential masonry" data-id="id-projects">

                          <article id="post-150" class="otw-portfolio-item post-150 otw-portfolio type-otw-portfolio status-publish has-post-thumbnail hentry otw-portfolio-category-commercial otw-portfolio-category-industrial otw-portfolio-category-residential">

                              <a href="#" title="PROJECTS" class="otw-portfolio-item-link">
                                  <h3>PROJECTS</h3>

                                <div class="image">
                                    <img width="303" height="210" src="http://www.intellidt.com/greatwall/wp-content/uploads/2016/08/bg-303x210.jpg" class="attachment-otw-portfolio-medium size-otw-portfolio-medium wp-post-image" alt="bg">
                                </div>
                                <div class="filter-projects-title">
                                  <section class="filter">
                                    <a href="#" onclick="toggle_visibility('foo');"><span style="color: white;">FILTER PROJECTS &gt;&gt;</span></a>
                                    <div id="foo" style="display:none">
                                      <span style="color: white;">
                                        <?php $taxo = get_object_taxonomies( 'otw-portfolio' );
                                          foreach ( $taxo as $tax_name ) {            
                                              $categories = get_categories('taxonomy='.$tax_name);
                                              $i = 0; $len = count( $categories );
                                              foreach ($categories as $category) {
                                                  if ($i == 0) { ?><ul class="otw-portfolio-filter"> <li class="all"><a href="#"><?php _e( 'All', 'otw_pfl' ); ?></a></li> <?php }
                                                    echo '<li class="'.$category->category_nicename.'"><span class="separator">/</span><a href="#">'.$category->cat_name.'</a></li>';
                                                  if ($i == $len - 1) { echo '</ul>'; }
                                                  $i++;
                                              }
                                          }
                                        ?>
                                      </span>
                                    </div>
                                  </section>
                                </div>
                              </a>
                          </article>

                  </li>        				  

                  <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;  ?>

                  <?php query_posts('post_type=otw-portfolio&posts_per_page=-1&paged='.$paged); ?>

                  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                      <li class="<?php foreach(get_the_terms($post->ID, 'otw-portfolio-category') as $term) echo $term->slug.' ' ?>" data-type="<?php foreach(get_the_terms($post->ID, 'otw-portfolio-category') as $term) echo $term->slug.' ' ?>" data-id="id-<?php echo($post->post_name) ?>">

                          <article id="post-<?php the_ID(); ?>" <?php post_class('otw-portfolio-item'); ?>>

                            	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="otw-portfolio-item-link">

                            		<div class="image">

                                		<?php if ( has_post_thumbnail()) { ?>

                                		    <?php the_post_thumbnail('otw-portfolio-medium'); ?>

                                		<?php } else { ?>

                                            <div style="background:url(<?php echo plugins_url( '/otw-portfolio-light/images/pattern-1.png' ) ?>);width:<?php echo get_option('otw_pfl_thumb_size_w', '303'); ?>px;height:<?php echo get_option('otw_pfl_thumb_size_h', '210'); ?>px" title="<?php _e( 'No Image', 'otw_pfl' ); ?>"></div>

                                        <?php } ?>

                            		</div>

                            		<div class="title">

                            			<h4><?php the_title(); ?></h4> 
                                  <!-- <div class="excerpt">
                                    <?php if ( !empty( $post->post_excerpt ) ) :
                                      the_excerpt();
                                    else :
                                      false;
                                    endif; ?>
                                  </div> -->

                                  <h3><?php foreach(get_the_terms($post->ID, 'otw-portfolio-category') as $term) echo $term->slug.' ' ?></h3>

                            		</div>

                            		<!-- <div class="text entry-content"> -->

                            			<!-- <?php the_excerpt(); ?> -->

                            		<!-- </div> -->

                            	<span class="shadow-overlay hide-for-small"></span></a>

                          </article>

                      </li>



                  <?php endwhile; ?>

                  </ul>

            </div>

          </div>



<?php else: ?>



    <article id="post-0" class="post no-results not-found">

		<header class="entry-header">

			<h1 class="entry-title"><?php _e( 'Nothing Found', 'otw_pfl' ); ?></h1>

		</header>



		<div class="entry-content">

			<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'otw_pfl' ); ?></p>

			<?php get_search_form(); ?>

		</div><!-- .entry-content -->

	</article><!-- #post-0 -->



<?php endif; ?>



    <?php otw_pagination_pfl(); ?>



<?php get_footer(); ?>