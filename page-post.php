<?php /* Template Name: All articles posts */ get_header(); ?>

  <div class="post-block">
    <div class="page-header">
      <div class="content content--two cf">
        <h1 class="page-title">Все статьи</h1>
        <span class="b-counter">
          <?php echo wp_count_posts()->publish; ?> записей
        </span>
      </div>
    </div>

    <section class="content content--two">
      <div class="b-intro | page_intro">
        <p class="b-intro_text">
          Правильная музыка не должна быть ни черной, ни белой, ни мужской, ни женской.
          Она должна быть одновременно чужой и очень своей — и для слушателя,
          и для музыканта.
        </p>
        <ul class="b-intro_popular | b-popular">
          <li class="b-popular_item b-popular_item--label">
            Популярные темы:
          </li>
          <li class="b-popular_item">
            <a class="b-popular_link" href="#">Сингл</a>
          </li>
          <li class="b-popular_item">
            <a class="b-popular_link" href="#">Deep Purple</a>
          </li>
          <li class="b-popular_item">
            <a class="b-popular_link" href="#">Альбом</a>
          </li>
          <li class="b-popular_item">
            <a class="b-popular_link" href="#">Студия</a>
          </li>
        </ul>
      </div>

      <ul class="l-grid">

<?php query_posts('cat='); ?><?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <li class="l-grid_item">

          <?php get_template_part('block', 'post'); ?>

        </li>
<?php endwhile; ?><?php else: ?><?php endif; ?>

      </ul>

<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>

    </section>
  </div>

<?php get_footer(); ?>