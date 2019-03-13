<?php get_header(); ?>

  <header class="page-header">
    <div class="content">
      <h1 class="page-title">Группа</h1>
      <!-- <ul class="popular">
        <li class="popular_item popular_item--title">Популярные темы</li>
        <li class="popular_item"><a href="#">Deep Purple</a></li>
        <li class="popular_item"><a href="#">Продюсер</a></li>
        <li class="popular_item"><a href="#">Beatles</a></li>
        <li class="popular_item"><a href="#">Rolling Stones</a></li>
        <li class="popular_item"><a href="#">редкие</a></li>
      </ul> -->
    </div>
  </header>

  <section class="content content--two">
    <ul class="l-grid">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <li class="l-grid_item">

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