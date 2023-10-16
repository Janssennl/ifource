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
Template Name: Homepagina
*/

get_header();
?>

<div class="headerplaat" style="background-image:url('<?php bloginfo('template_directory'); ?>/assets/imgs/header_beeldmerk.png'), url(<?php
$image = get_field('afbeelding');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
    echo wp_get_attachment_image_url( $image, $size );
}?>); background-size: 62% 100%, cover; background-position:top left, center right; background-repeat: no-repeat, no-repeat;">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="large-6 cell">
				<?php the_field('tekstregel_1');?>
			</div>
		</div>
	</div>
</div>

<div class="grid-container homecontent">
	<div class="grid-x grid-padding-x">
		<div class="large-10 large-offset-1 cell">
				<?php
				while ( have_posts() ) :
					the_post(); ?>

					<?php the_content();?>

				<?php  endwhile; // End of the loop.
				?>
		</div>
	</div>
</div>

<div class="grid-container diensten">
	<div class="grid-x grid-padding-x">
		<div class="large-12 cell">
			<h2>Onze <strong>diensten</strong></h2>
		</div>

    <?php

    // Check rows exists.
    if( have_rows('diensten') ):

        // Loop through rows.
        while( have_rows('diensten') ) : the_row(); ?>

        <div class="large-4 cell">
          <a href="<?php echo get_sub_field('button_link'); ?>"><div class="blok">
            <figure>
              <img src="<?php
              $image = get_sub_field('afbeelding');
              $size = 'large'; // (thumbnail, medium, large, full or custom size)
              if( $image ) {
                  echo wp_get_attachment_image_url( $image, $size );
              }?>">
            </figure>
            <div class="tekst">
              <h3><?php echo get_sub_field('titel'); ?></h3>
              <p><?php echo get_sub_field('tekst'); ?></p>
            </div>
            <a href="<?php echo get_sub_field('button_link'); ?>" class="button"><?php echo get_sub_field('button_tekst'); ?></a>
			 </div></a>
        </div>



       <?php   // End loop.
        endwhile;

    // No value.
    else :
        // Do something...
    endif; ?>

	</div>
</div>

<div class="projecten">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="large-10 large-offset-1 cell">
				<h2>Recente <strong>projecten</strong></h2>
			</div>
			<div class="large-10 large-offset-1 cell">
				<div class="sliderprojecten">
					
					<?php
					$featured_posts = get_field('projecten');
					if( $featured_posts ): ?>
						<?php foreach( $featured_posts as $post ): 

							// Setup this post for WP functions (variable must be named $post).
							setup_postdata($post); ?>
							<div>
								
								<div class="grid-x grid-padding-x" id="child-<?php the_ID(); ?>">
									<div class="large-6 cell">
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
									</div>
									<div class="large-6 cell">
										<div class="tekst">
											<p class="kop"><?php the_title(); ?></p>
											<p><?php the_excerpt(); ?>
												<a href="<?php the_permalink(); ?>"><strong>Lees meer ></strong></a>
											</p>
											</div>
									</div>
								</div>
								
							</div>
						<?php endforeach; ?>
						<?php 
						// Reset the global post object so that the rest of the page works correctly.
						wp_reset_postdata(); ?>
					<?php endif; ?>
					
					
					
					
				</div>
			</div>
		</div>
	</div>
</div>

<div class="branches" style="width: 100%;
  background: url('<?php 
						$image = get_field('afbeelding_branches');
						$size = 'full'; // (thumbnail, medium, large, full or custom size)
						if( $image ) {
							echo wp_get_attachment_image_url( $image, $size );
					} ?>') no-repeat right; 
  background-size: 50% 100%;">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="large-6 cell">
				<div class="tekst">
					<h2><?php the_field('titel_branches');?></h2>
						<div class="grid-x grid-padding-x">
							<div class="large-6 cell">
								<?php the_field('lijst_links');?>
							</div>
							<div class="large-6 cell">
								<?php the_field('lijst_rechts');?>
							</div>
						</div>
						<a href="<?php the_field('button_link');?>" class="button"><?php the_field('button_tekst');?></a>
				</div>
			</div>
			<div class="large-6 cell">

			</div>
		</div>
	</div>
</div>


<div class="grid-container extracontent">
	<div class="grid-x grid-padding-x">
		<div class="large-10 large-offset-1 cell">
					<?php the_field('extra_content');?>
		</div>
	</div>
</div>

<?php
get_footer();
