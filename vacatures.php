<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ifource
 */
 /*
Template Name: Vacatures
*/
get_header() ?>

<div class="tekst-vervolg">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="large-12 cell">
				<?php
				if ( function_exists('yoast_breadcrumb') ) {
				  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				}
				?>
			</div>
		</div>
		<div class="grid-x grid-padding-x">
			<div class="large-10 large-offset-1 cell">
				<?php
				while ( have_posts() ) :
					the_post(); ?>
					<h1><?php the_title();?></h1>
					<?php the_content();?>
				<?php  endwhile; // End of the loop.
				?>
			</div>
		</div>
	</div>
</div>
<div class="projecten-vervolg">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
				<?php 

				$posts = get_posts(array(
					'posts_per_page'	=> -1,
					'post_type'			=> 'vacature'
				));

				if( $posts ): ?>


					<?php foreach( $posts as $post ): 

						setup_postdata( $post );

						?>
								
						<div class="large-4 cell">
							<div class="project">
								<a href="<?php the_permalink(); ?>">
                                <?php
                                // Must be inside a loop.

                                if ( has_post_thumbnail() ) { ?>
                                    <img class="vacatureimg" src="<?php echo get_the_post_thumbnail_url($post_id, 'large'); ?>">
                                <?php }
                                else { ?>
                                    <img class="vacatureimg" src="<?php bloginfo('template_directory'); ?>/assets/imgs/logo.svg">
                                <?php }
                                ?>
                                </a>
								<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
								<a href="<?php the_permalink(); ?>" class="button" style="margin-top:30px;">Lees meer</a>
							</div>
						</div>

					<?php endforeach; ?>


					<?php wp_reset_postdata(); ?>

				<?php endif; ?>
		</div>
	</div>
</div>

<?php
get_footer();
