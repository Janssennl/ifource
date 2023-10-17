<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ifource
 */

?>
<div class="grid-container newsletter">
	<div class="grid-x grid-padding-x">
		<div class="large-6 large-offset-3 cell">
			<h2>Op de hoogte blijven van onze <strong>updates</strong>?</h2>
			<?php the_field('tekst_nieuwsbrief', 'option');?>
			<?php gravity_form( 1, false, false, false, '', false, 100 ); ?>
		</div>

	</div>
</div>
<div class="contactblock">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="large-10 large-offset-1 cell">
				<h2>Contact</h2>
				<p>Neem contact met ons op via onderstaand <strong>contactformulier</strong>.</p>
				<?php gravity_form( 2, false, false, false, '', false, 120 ); ?>
			</div>

		</div>
	</div>
</div>
<div class="footertop">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="large-3 cell">
				<h3>Contact</h3>
			</div>
		</div>
		<div class="grid-x grid-padding-x">

			<div class="large-3 cell">
				<?php the_field('adresgegevens', 'option');?>
			</div>

			<div class="large-3">
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>advies">Energie en installatie advies</a></li>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>advies/energie-advies">Energieadvies</a></li>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>advies/duurzame-energie">Duurzame energie</a></li>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>ontwerp">Energie en installatie ontwerp</a></li>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>begeleiding">Bouwdirectie en bouwtoezicht</a></li>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>opdrachtgevers">Opdrachtgevers</a></li>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>projecten">Projecten</a></li>
				</ul>
			</div>

			<div class="large-3">
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>over-ons">Over ons</a></li>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>over-ons/werkwijze">Werkwijze</a></li>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>over-ons/ons-team">Ons team</a></li>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>over-ons/vacatures">Vacatures</a></li>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>contact">Contact</a></li>
				</ul>
			</div>

			<div class="large-3">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/imgs/logo.svg"></a>
			</div>
		</div>
	</div>
</div>
	<div class="grid-container footerbottom">
		<div class="grid-x grid-padding-x">
			<div class="large-2 cell">
				&copy; iFource B.V.
			</div>
			<div class="large-5 cell">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>privacybeleid/">Privacybeleid</a>  |  <a href="<?php echo esc_url( home_url( '/' ) ); ?>cookieverklaring/">Cookie statement</a>
			</div>
			<div class="large-5 cell janssen">
				Website door <a href="https://www.tundra.nl/" target="_blank">Tundra digital branding &amp; marketing bureau</a>
			</div>
		</div>
	</div>

<script src="<?php bloginfo('template_directory'); ?>/assets/js/vendor.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/foundation.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/slick/slick.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.sliderprojecten').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  autoplay: true,
		  autoplaySpeed: 2000,
		});
	});
</script>
<?php wp_footer(); ?>
</body>
</html>
