<?php get_header(); ?>

  <main class="page-wrap-category main" role="main">

    <section class="grid group">

    <?php if (have_posts()) : ?>

    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

    <?php while (have_posts()) : the_post(); ?>

      <a href="<?php the_permalink(); ?>" class="tile">
        <?php the_post_thumbnail('homepage-tile'); ?>
        <h2 class="title"><?php the_title(); ?></h2>
      </a>

    <?php endwhile;?>

    <?php else : ?>

      <h2>Nothing found</h2>

    <?php endif; ?>

    </section><?php # END of grid ?>

  </main><?php # END of page-wrap-category ?>

  <div class="pagination group">
    <p class="alignleft"><?php previous_posts_link('&laquo; Newer') ?></p><p class="alignright"><?php next_posts_link('Older &raquo;') ?></p>
  </div>

<?php get_footer(); ?>
