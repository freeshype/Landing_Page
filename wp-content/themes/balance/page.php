<?php get_header(); the_post(); ?>

  <main class="page-wrap-single-page main" role="main">

    <?php the_post_thumbnail('full', array('class' => 'splash-img')); ?>

    <article class="single-entry group">
      <h1 class="page-title"><?php the_title(); ?></h1>
      <?php the_content(); ?>
      <p><?php the_tags(); ?></p>
    </article>

  </main><?php # END page-wrap-single-post ?>

<?php get_footer(); ?>
