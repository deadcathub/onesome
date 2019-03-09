<?php get_header(); ?>

  <header class="page-header">
    <div class="content">
      <h1 class="page-title">Персона</h1>
      <!-- <ul class="popular">
        <li class="popular_item popular_item--title">Популярные темы</li>
        <li class="popular_item"><a href="#">John Lennon</a></li>
        <li class="popular_item"><a href="#">Mick Jagger</a></li>
        <li class="popular_item"><a href="#">Ian Gillan</a></li>
        <li class="popular_item"><a href="#">Ritchie Blackmoore</a></li>
        <li class="popular_item"><a href="#">Ziggy</a></li>
      </ul> -->
    </div>
  </header>

  <section class="content content--two">
    <ul class="l-post-col">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <li class="l-post-col_item">

        <?php get_template_part('block', 'post'); ?>

      </li>
<?php endwhile; ?>
<?php else: ?>
<?php endif; ?>

    </ul>

    <div class="paginator">
      <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
    </div>

  </section>

<?php get_footer(); ?>