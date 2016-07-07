<?php get_header(); ?>

  <main class="page-wrap-index main" role="main">

    <section class="grid group">

      <?php
      $args = array(
         'category_name' => 'portfolio',
         'post_type' => 'post',
         'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
         );
      query_posts($args);
      while (have_posts()) : the_post(); ?>

      <a href="<?php the_permalink(); ?>" class="tile">
        <?php the_post_thumbnail('homepage-tile'); ?>
        <h2 class="title"><?php the_title(); ?></h2>
      </a>

      <?php endwhile;?>


    </section><?php # END of grid ?>

  </main><?php # END of page-wrap-index ?>

  <div class="pagination group">
    <p class="alignleft"><?php previous_posts_link('&laquo; Newer') ?></p><p class="alignright"><?php next_posts_link('Older &raquo;') ?></p>
  </div>

<?php get_footer(); ?>
