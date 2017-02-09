<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rallyhq
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<div class="slideshow" style="border:1px solid silver; height:300px;"">
			slideshow/video placeholder goes here
		</div>
		<?php if( get_field('mission_header') ): ?>
			<h2><?php the_field('mission_header'); ?></h2>
		<?php endif; ?>
		<?php
			the_content();

			// wp_link_pages( array(
			// 	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rallyhq' ),
			// 	'after'  => '</div>',
			// ) );
		?>

		<?php if( get_field('team_header') ): ?>
			<h2><?php the_field('team_header'); ?></h2>
		<?php endif; ?>
	</div><!-- .entry-content -->

	
</article><!-- #post-## -->
