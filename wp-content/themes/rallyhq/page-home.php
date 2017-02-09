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

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'home' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
		<section class="team">
			<h2>Team members</h2>
			<?php
		    $loop = new WP_Query( array( 'post_type' => 'team_members' ) );
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
		    $loop = new WP_Query( array( 'post_type' => 'advisors' ) );
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
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
