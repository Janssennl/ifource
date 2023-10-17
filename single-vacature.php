<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ifource
 */

get_header();
?>
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

				
				<?php

				// Check rows exists.
				if( have_rows('tekstblokken') ):

					// Loop through rows.
					while( have_rows('tekstblokken') ) : the_row(); ?>
		
					<?php if ( get_sub_field( 'afbeelding' ) ): ?>
					<div class="grid-x grid-padding-x">
						<div class="large-11 large-offset-1 cell">
							<?php if ( get_sub_field( 'titel_is_h3' ) ): ?>
								<h3><?php the_sub_field('titel'); ?></h3>
							<?php else: // field_name returned false ?>
								<h2><?php the_sub_field('titel'); ?></h2>
							<?php endif; // end of if field_name logic ?>
						</div>
						<div class="large-5 large-offset-1 cell">
							<?php the_sub_field('tekst'); ?>
						</div>
						<div class="large-5 cell">
							<?php 
								$image = get_sub_field('afbeelding');
								$size = 'full'; // (thumbnail, medium, large, full or custom size)
								if( $image ) {
									echo wp_get_attachment_image( $image, $size );
								} 
							?>
						</div>
					</div>
					<?php else: // field_name returned false ?>
					<div class="grid-x grid-padding-x">
						<div class="large-10 large-offset-1 cell">
							<?php if ( get_sub_field( 'titel_is_h3' ) ): ?>
								<h3><?php the_sub_field('titel'); ?></h3>
							<?php else: // field_name returned false ?>
								<h2><?php the_sub_field('titel'); ?></h2>
							<?php endif; // end of if field_name logic ?>
							<?php the_sub_field('tekst'); ?>
						</div>
					</div>
					<?php endif; // end of if field_name logic ?>


					<?php // End loop.
					endwhile;

				// No value.
				else :
					// Do something...
				endif; ?>

				<div class="grid-x grid-padding-x">
					<div class="large-10 large-offset-1 cell">
						<p>Geen probleem als je jouw sollicitatiebrief en CV nog niet klaar hebt liggen, klik <a href="mailto:info@ifource.nl">hier</a> en laat je telefoonnummer achter. Wij nemen spoedig contact met je op.</p>
					</div>
				</div>

	</div>
</div>


<?php
get_footer();
