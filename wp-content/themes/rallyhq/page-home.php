<?php
/**
 * Template Name: Home 
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
					$loop = new WP_Query( array( 'post_type' => array('slider_video', 'campaigns')  ) );
				    if ( $loop->have_posts() ) :
			        while ( $loop->have_posts() ) : $loop->the_post(); ?>
									<?php echo get_the_title(); ?>
									<!--todo-->
			        <?php endwhile;
			    endif;
			    wp_reset_postdata();
				?>
			</div><!--/slideshow-->

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'home' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
		<section class="team">
			<h2>Team members</h2>
			<?php
		    $loop = new WP_Query( array( 'post_type' => 'team_members', 'order' => 'ASC' ) );
		    if ( $loop->have_posts() ) :
		        while ( $loop->have_posts() ) : $loop->the_post(); ?>
	            <div class="pindex">

                <?php if ( has_post_thumbnail() ) { ?>
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                  <!--todo-->
                <?php } ?>

                <p class="member-name"><?php echo get_the_title(); ?></p>

	            </div>
		        <?php endwhile;
		    endif;

		    wp_reset_postdata();

			?>
		</section><!--/team-->

		<section class="advisors">
			<h2>Advisors</h2>
			<?php
		    $loop = new WP_Query( array( 'post_type' => 'advisors', 'order' => 'ASC' ) );
		    if ( $loop->have_posts() ) :
		        while ( $loop->have_posts() ) : $loop->the_post(); ?>
	            <div class="pindex">

                <?php if ( has_post_thumbnail() ) { ?>
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                  <!--todo-->
                <?php } ?>

                <p class="member-name"><?php echo get_the_title(); ?></p>

	            </div>
		        <?php endwhile;
		    endif;

		    wp_reset_postdata();

			?>
		</section>
		<section>
			<?php
		    $loop = new WP_Query( array( 'pagename' => 'home' ) );
		    if ( $loop->have_posts() ) :
		        while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <?php if( get_field('how_it_works') ): ?>
									<h2><?php the_field('how_it_works'); ?></h2>
								<?php endif; ?>
								<?php if( get_field('how_it_works_body') ): ?>
									<div>
										<?php the_field('how_it_works_body'); ?>
									</div>
								<?php endif; ?>
		        <?php endwhile;
		    endif;

		    wp_reset_postdata();
			?>
		</section>
		<div class="mailchimp" style="border:1px solid silver; height:300px;"">
			placeholder - mailchimp signup form goes here
		</div><!--/mailchimp-->

		<section class="quotes">
			<?php
		    $loop = new WP_Query( array( 'post_type' => 'quote' ) );
		    if ( $loop->have_posts() ) :
		        while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <!--this will be a slideshow thing-->
								<p><?php the_content(); ?></p>
		        <?php endwhile;
		    endif;

		    wp_reset_postdata();

			?>
		</section><!--/quotes-->
		<section class="join">
			<?php
		    $loop = new WP_Query( array( 'pagename' => 'home' ) );
		    if ( $loop->have_posts() ) :
		        while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <?php if( get_field('join_form_header') ): ?>
									<h2><?php the_field('join_form_header'); ?></h2>
								<?php endif; ?>
								<?php if( get_field('join_form_field') ): ?>
									<h2><?php the_field('join_form_field'); ?></h2>
								<?php endif; ?>
		        <?php endwhile;
		    endif;

		    wp_reset_postdata();
			?>
		
		</section><!--/join-->
		<section class="instagram-feed">
			<?php if ( is_active_sidebar( 'home_widget_1' ) ) : ?>
	<div id="" class=" widget-area" role="complementary">
		<?php dynamic_sidebar( 'home_widget_1' ); ?>
	</div><!-- #primary-sidebar -->
<?php endif; ?>
		</section><!--/instagram-feed-->
	</div><!--/#primary -->

<?php
get_footer();
