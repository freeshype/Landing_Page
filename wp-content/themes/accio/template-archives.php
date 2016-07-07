<?php
/**
 * Template Name: Archives
 *
 * The Template for displaying archives.
 *
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 */

get_header(); ?>

<section id="page">

	<!-- Start Content -->
	<div id="content">

		<div class="container">

			<div id="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="hentry-box">

						<div class="entry-wrap">

							<div class="entry-header">

								<div class="entry-info">

									<?php $heading_value = rwmb_meta('accio_page_heading', 'type=text'); ?>

									<?php if($heading_value) : ?>

									<h2 class="entry-title page-title"><?php echo $heading_value; ?></h2>

									<?php else : ?>

									<h2 class="entry-title page-title"><?php the_title(); ?></h2>

									<?php endif; ?>

								</div>

							</div>

							<div class="entry-content">

								<?php the_content(); ?>

								<br>

								<div class="row-fluid">

									<div class="archive-lists">

										<div class="span6">

											<div class="toggle-group accordion">

												<div class="toggle">
													<h4><?php _e('Last 30 Posts', 'framework'); ?></h4>
													<div class="toggle-content">
														<ul>
															<?php

																$queries = array(
																	'numberposts' => 5,
																	'orderby' => 'post_date',
																	'post_type' => 'post'
																);


																$postslist = get_posts( $queries ); foreach ($postslist as $post) : setup_postdata($post);
															?>
															<li>
																<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
															</li>
															<?php endforeach; wp_reset_query(); ?>
														</ul>
													</div>
												</div>

												<div class="toggle">
													<h4><?php _e('Archives by Month', 'framework'); ?></h4>
													<div class="toggle-content">
														<ul>
															<?php wp_get_archives('type=monthly'); ?>
														</ul>
													</div>
												</div>

												<div class="toggle">
													<h4><?php _e('Tags', 'framework'); ?></h4>
													<div class="toggle-content">
														<?php

														$args = array(
															'smallest' => 18,
														    'largest' => 18,
														    'unit' => 'px',
														    'format' => 'list',
														    'number' => 45
															);

														wp_tag_cloud( $args );

														?>
													</div>
												</div>

											</div>

										</div>

										<div class="span6">

											<div class="toggle-group accordion">

												<div class="toggle">
													<h4><?php _e('Archives By Year', 'framework'); ?></h4>
													<div class="toggle-content">
														<ul>
															<?php wp_get_archives('type=yearly'); ?>
														</ul>
													</div>
												</div>

												<div class="toggle">
													<h4><?php _e('Archives by Subject', 'framework'); ?></h4>
													<div class="toggle-content">
														<ul>
															<?php wp_list_categories('hierarchical=0&title_li='); ?>
														</ul>
													</div>
												</div>

												<div class="toggle">
													<h4><?php _e('Authors', 'framework'); ?></h4>
													<div class="toggle-content">
														<ul>
														<?php wp_list_authors('show_fullname=1&optioncount=0&orderby=post_count&order=DESC&number=3'); ?>
														</ul>
													</div>
												</div>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

					</div>

				</article>

				<?php endwhile; ?>

				<?php else : ?>

				<?php get_template_part('content', 'none'); ?>

				<?php endif; ?>

			</div>

		</div>

	<!-- End Content -->
	</div>

</section>

<?php get_footer(); ?>
