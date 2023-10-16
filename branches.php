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
Template Name: Branches
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
		<div class="grid-x grid-padding-x" style="margin-top:40px;">
				
				<?php

				// Check rows exists.
				if( have_rows('tekstblokken') ):

					// Loop through rows.
					while( have_rows('tekstblokken') ) : the_row(); ?>

						<div class="large-6 cell">
							<div class="branche">
								<?php if ( get_sub_field( 'titel_is_h3' ) ): ?>
									<h3><?php the_sub_field('titel'); ?></h3>
								<?php else: // field_name returned false ?>
									<h2><?php the_sub_field('titel'); ?></h2>
								<?php endif; // end of if field_name logic ?>
								<?php the_sub_field('tekst'); ?>
								<?php 
											$image = get_sub_field('afbeelding');
											$size = 'full'; // (thumbnail, medium, large, full or custom size)
											if( $image ) {
												echo wp_get_attachment_image( $image, $size );
											} 
								?>
							</div>
						</div>
				

					<?php // End loop.
					endwhile;

				// No value.
				else :
					// Do something...
				endif; ?>
				
		</div>
	</div>
</div>

<?php
get_footer();
