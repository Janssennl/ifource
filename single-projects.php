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
				<p id="breadcrumbs"><span><span><a href="https://www.ifource.nl/">Home</a> » <a href="https://www.ifource.nl/projecten">Projecten</a> » <span class="breadcrumb_last" aria-current="page"><?php the_title();?></span></span></span></p>
			</div>
		</div>
		<div class="grid-x grid-padding-x">
			<div class="large-12 cell">
			<?php
				while ( have_posts() ) :
					the_post(); ?>

					<h1><?php the_title();?></h1>

				<?php  endwhile; // End of the loop.
				?>
				
			</div>
			<div class="large-6 cell">
				<?php
				while ( have_posts() ) :
					the_post(); ?>
						<?php the_content();?>
						<?php if( get_field('kenmerken') ): ?>
							<strong>enkele kenmerken:</strong>
							<ul>
								<?php
									// Check rows exists.
									if( have_rows('kenmerken') ):

										// Loop through rows.
										while( have_rows('kenmerken') ) : the_row();

											// Load sub field value. ?>
								
												<li><?php echo $sub_value = get_sub_field('kenmerk'); ?></li>
								
											<?php // Do something...

										// End loop.
										endwhile;

									// No value.
									else :
										// Do something...
									endif; ?>
							</ul>
						<?php endif; ?>
				<?php  endwhile; // End of the loop.
				?>
			</div>
			<div class="large-5 large-offset-1 cell">
				<?php
				while ( have_posts() ) :
					the_post(); ?>
					<div class="sliderprojecten">
						<div><?php the_post_thumbnail();?></div>
							<?php

							// Check rows exists.
							if( have_rows('afbeeldingen') ):

								// Loop through rows.
								while( have_rows('afbeeldingen') ) : the_row();

									// Load sub field value.
						
										$image = get_sub_field('afbeelding');
										$size = 'full'; // (thumbnail, medium, large, full or custom size)
										if( $image ) { ?>
											<div><?php echo wp_get_attachment_image( $image, $size ); ?></div>
										<?php }
						
									// Do something...

								// End loop.
								endwhile;

							// No value.
							else :
								// Do something...
							endif; ?>
					</div>
					<table>
					<?php if( get_field('naam') ): ?>
						<tr>
							<td>Naam:</td><td><?php the_field('naam'); ?></td>
						</tr>
					<?php endif; ?>
					<?php if( get_field('plaats') ): ?>
						<tr>
							<td>Plaats:</td><td><?php the_field('plaats'); ?></td>
						</tr>
					<?php endif; ?>
					<?php if( get_field('type') ): ?>
						<tr>
							<td>Type:</td><td><?php the_field('type'); ?></td>
						</tr>
					<?php endif; ?>
					<?php if( get_field('discipline') ): ?>
						<tr>
							<td>Discipline:</td><td><?php the_field('discipline'); ?></td>
						</tr>
					<?php endif; ?>
					<?php if( get_field('rol') ): ?>
						<tr>
							<td>Rol:</td><td><?php the_field('rol'); ?></td>
						</tr>
					<?php endif; ?>
					<?php if( get_field('start') ): ?>
						<tr>
							<td>Start:</td><td><?php the_field('start'); ?></td>
						</tr>
					<?php endif; ?>
					<?php if( get_field('eind') ): ?>
						<tr>
							<td>Eind:</td><td><?php the_field('eind'); ?></td>
						</tr>
					<?php endif; ?>
					<?php if( get_field('opdrachtgever') ): ?>
						<tr>
							<td>Opdrachtgever:</td><td><?php the_field('opdrachtgever'); ?></td>
						</tr>
					<?php endif; ?>
					</table>
					<a href="https://www.ifource.nl/projecten/" class="button">Terug naar alle projecten</a>
			

				<?php  endwhile; // End of the loop.
				?>
			</div>
		</div>
		<div class="grid-x grid-padding-x">
			<div class="large-12 cell">
				
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
