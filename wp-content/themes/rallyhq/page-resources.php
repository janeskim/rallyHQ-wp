<?php
/**
 * Template Name: Resources 
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rallyhq
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="slideshow" style="border:1px solid silver; height:300px;"">

				<?php
					$loop = new WP_Query( array( 'post_type' => array('resourceslider_video', 'campaigns')  ) );
				    if ( $loop->have_posts() ) :
			        while ( $loop->have_posts() ) : $loop->the_post(); ?>
									<?php echo get_the_title(); ?>
									<!--todo-->
			        <?php endwhile;
			    endif;
			    wp_reset_postdata();
				?>
			</div><!--/slideshow-->
			<!--todo-->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-content">
					<?php the_content();?>
				</div><!-- .entry-content -->
			</article><!-- #post-## -->

		</main><!-- #main -->
	

		
		
		<section class="instagram-feed">
			<?php if ( is_active_sidebar( 'home_widget_1' ) ) : ?>
				<div id="" class=" widget-area" role="complementary">
					<?php dynamic_sidebar( 'home_widget_1' ); ?>
				</div><!--/widget-area -->
			<?php endif; ?>
		</section><!--/instagram-feed-->
	</div><!--/#primary -->

<?php
get_footer();
