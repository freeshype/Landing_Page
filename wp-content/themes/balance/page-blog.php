<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>

  <main class="page-wrap-blog main" role="main">

    <div class="blogroll">

      <?php
      $args = array(
         'category_name' => 'blog',
         'post_type' => 'post',
         'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
         );
      query_posts($args);
      while (have_posts()) : the_post(); ?>


      <article class="blog-post">
        <time class="date" datetime="<?php the_time('Y-m-d'); ?>"><i><?php the_time('F jS, Y') ?></i></time>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_excerpt(); ?>
        <p><?php the_tags(); ?></p>
      </article>

      <?php endwhile;?>

      <div class="pagination group">
        <p class="alignleft newer"><?php previous_posts_link('&laquo; Newer') ?></p><p class="alignright older"><?php next_posts_link('Older &raquo;') ?></p>
      </div>

    </div><?php # END of blogroll ?>

  </main><?php # END of main ?>

<?php get_footer(); ?>
