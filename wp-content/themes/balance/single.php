<?php get_header(); the_post(); ?>

  <main class="page-wrap-single-post main" role="main">

    <article class="single-entry group">
      <h1 class="post-title"><?php the_title(); ?></h1>
      <time class="date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F jS, Y') ?></time>
      <?php the_content(); ?>
      <p><?php the_tags(); ?></p>

      <?php comments_template(); ?>
    </article>

  </main><?php # END page-wrap-single-post ?>

<?php get_footer(); ?>
