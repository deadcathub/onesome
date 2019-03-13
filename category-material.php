<?php get_header(); ?>

  <header class="page-header">
    <div class="content">
      <h1 class="page-title">Матчасть</h1>
      <!-- <ul class="popular">
        <li class="popular_item popular_item--title">Популярные темы</li>
        <li class="popular_item"><a href="#">Гитара</a></li>
        <li class="popular_item"><a href="#">Эффекты</a></li>
        <li class="popular_item"><a href="#">Площадка</a></li>
        <li class="popular_item"><a href="#">Gibson</a></li>
        <li class="popular_item"><a href="#">Сингл</a></li>
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