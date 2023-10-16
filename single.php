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
			<div class="large-12 cell">
				<?php the_post_thumbnail();?>
			</div>
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

<?php
get_footer();
