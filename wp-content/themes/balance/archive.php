<?php get_header(); ?>

  <main class="page-wrap-archive main" role="main">

    <div class="blogroll">

    <?php if (have_posts()) : ?>

    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

    <?php while (have_posts()) : the_post(); ?>

      <article class="blog-post">
        <time class="date" datetime="<?php the_time('Y-m-d'); ?>"><i><?php the_time('F jS, Y') ?></i></time>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_excerpt(); ?>
        <p><?php the_tags(); ?></p>
      </article>

    <?php endwhile;?>

    <?php else : ?>

      <h2>Nothing found</h2>

    <?php endif; ?>

    </div><?php # END of blog-roll ?>

  </main><?php # END of page-wrap-archive ?>

  <div class="pagination group">
    <p class="alignleft"><?php previous_posts_link('&laquo; Newer') ?></p><p class="alignright"><?php next_posts_link('Older &raquo;') ?></p>
  </div>

<?php get_footer(); ?>
