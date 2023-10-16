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
/* Template Name: Contactpagina */

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
			<div class="large-3 cell">
				<?php
				while ( have_posts() ) :
					the_post(); ?>

					<h1><?php the_title();?></h1>
					<?php the_field('adresgegevens', 'option');?>
					<?php the_content();?>

				<?php  endwhile; // End of the loop.
				?>
			</div>
			<div class="large-8 large-offset-1 cell">
				<figure>
				  <img src="<?php echo the_post_thumbnail_url('large'); ?>">
				</figure>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2479.2088041888082!2d5.19165731630944!3d51.58273641301233!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6eb416b67b797%3A0x9fe60908f3e622ed!2sSchijfstraat%208%2C%205061%20KB%20Oisterwijk!5e0!3m2!1snl!2snl!4v1670573300772!5m2!1snl!2snl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>

				
				<?php

				// Check rows exists.
				if( have_rows('tekstblokken') ):

					// Loop through rows.
					while( have_rows('tekstblokken') ) : the_row(); ?>
		
					<?php if ( get_sub_field( 'afbeelding' ) ): ?>
					<div class="grid-x grid-padding-x">
						<div class="large-8 cell">
							<h2><?php the_sub_field('titel'); ?></h2>
							<?php the_sub_field('tekst'); ?>
						</div>
						<div class="large-4 cell">
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
						<div class="large-12 cell">
							<h2><?php the_sub_field('titel'); ?></h2>
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
				

	</div>
</div>





<?php
get_footer();
