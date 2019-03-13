<?php get_header(); ?>

  <header class="page-header">
    <div class="content">
      <h1 class="page-title">Эпоха</h1>
      <!-- <ul class="popular">
        <li class="popular_item popular_item--title">Популярные темы</li>
        <li class="popular_item"><a href="#">70-e</a></li>
        <li class="popular_item"><a href="#">Мода</a></li>
        <li class="popular_item"><a href="#">Политика</a></li>
        <li class="popular_item"><a href="#">Студия</a></li>
        <li class="popular_item"><a href="#">Кино</a></li>
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