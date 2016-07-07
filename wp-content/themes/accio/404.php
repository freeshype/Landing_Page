<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 */

?>

<?php get_header(); ?>

<!-- Start Intro Box -->
<div class="intro-box">
	<div class="container">
		<div class="row">
			<div class="span12">
				<div class="intro-box-inner"><span><i class="icon-exclamation"></i></span> <?php _e('Oops, you found something that doesn\'t exist', 'framework'); ?></div>
			</div>
		</div>
	</div>
</div>
<!-- End Intro Box -->

<section id="page">

	<!-- Start Content -->
	<div id="content">

		<div class="container">

			<div class="row">

				<div id="main" class="span8">

					<?php get_template_part('content', 'none'); ?>

				</div>

				<?php get_sidebar(); ?>

			</div>

		</div>

	<!-- End Content -->
	</div>

</section>

<?php get_footer(); ?>
