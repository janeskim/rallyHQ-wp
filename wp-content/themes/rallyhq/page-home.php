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
					$loop = new WP_Query( array( 'post_type' => array('home_slider_video', 'campaigns')  ) );
				    if ( $loop->have_posts() ) :
			        while ( $loop->have_posts() ) : $loop->the_post(); ?>
									<?php echo get_the_title(); ?>
									<!--todo-->
			        <?php endwhile;
			    endif;
			    wp_reset_postdata();
				?>
			</div><!--/slideshow-->
			<div class="intro">
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'home' );

				endwhile; // End of the loop.
				?>
			</div>
		</main>
		<section class="team">
			<div class="team-container">
				<h2 class="home-header">Team members</h2>
				<?php
			    $loop = new WP_Query( array( 'post_type' => 'team_members', 'order' => 'ASC' ) );
			    if ( $loop->have_posts() ) :
			        while ( $loop->have_posts() ) : $loop->the_post(); ?>

		            <a href="<?php the_permalink(); ?>">
			            <div class="pindex team-member">
		                <?php if ( has_post_thumbnail() ) { ?>
		                  <?php the_post_thumbnail(); ?>
		                  <!--todo-->
		                <?php } ?>

		                <div class="team-member-info">
		                	<p class="team-member-info-name"><?php echo get_the_title(); ?></p>
		                	<p class="team-member-inforole">Co-founder</p>
		                </div>
		               </a>
		            </div>
			        <?php endwhile;
			    endif;

			    wp_reset_postdata();

				?>
			</div>
		</section><!--/team-->
		<section class="more-info">
			<?php
		    $loop = new WP_Query( array( 'pagename' => 'home' ) );
		    if ( $loop->have_posts() ) :
		        while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <?php if( get_field('how_it_works') ): ?>
									<h2 class="home-header"><?php the_field('how_it_works'); ?></h2>
								<?php endif; ?>
								<?php if( get_field('how_it_works_body') ): ?>
									<div class="more-info-content">
										<p>
											<?php the_field('how_it_works_body'); ?>
										</p>
									</div>
								<?php endif; ?>
		        <?php endwhile;
		    endif;

		    wp_reset_postdata();
			?>
		</section>
		<div class="mailchimp">
			<!-- Begin MailChimp Signup Form -->
			<div id="mc_embed_signup">
			<form action="//RallyHQ.us15.list-manage.com/subscribe/post?u=fd7e409dee67f2d831fa75b71&amp;id=485a536aec" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			    <div id="mc_embed_signup_scroll">
			    <h2 class="home-header">Join Rally</h2>
			<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
			<div class="mc-field-group">
			    <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
			</label>
			    <input type="email" value="" name="EMAIL" class="required email mailchimp-input" id="mce-EMAIL">
			</div>
			<div class="mc-field-group">
			    <label for="mce-FNAME">First Name </label>
			    <input type="text" value="" name="FNAME" class="mailchimp-input" id="mce-FNAME">
			</div>
			<div class="mc-field-group">
			    <label for="mce-LNAME">Last Name </label>
			    <input type="text" value="" name="LNAME" class="mailchimp-input" id="mce-LNAME">
			</div>
			<div class="mc-field-group">
			    <label for="mce-MMERGE3">Zip Code </label>
			    <input type="text" value="" name="MMERGE3" class="mailchimp-input" id="mce-MMERGE3">
			</div>
			    <div id="mce-responses" class="clear">
			        <div class="response" id="mce-error-response" style="display:none"></div>
			        <div class="response" id="mce-success-response" style="display:none"></div>
			    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
			    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_fd7e409dee67f2d831fa75b71_485a536aec" tabindex="-1" value=""></div>
			    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button mailchimp-button"></div>
			    </div>
			</form>
			</div>
			<!--End mc_embed_signup-->
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
