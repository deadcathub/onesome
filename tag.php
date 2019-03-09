<?php get_header(); ?>

<div class="page-header black">
  <div class="content c-f">
    <h1 class="page-title"><?php single_cat_title(); ?></h1>
    <mark class="page-intro page-intro--theme">
      Статьи и&nbsp;материалы по&nbsp;теме <span>«<?php single_cat_title(); ?>»</span>
    </mark>
  </div>
</div>

<section class="content">
  <div class="post-wrapper post-wrapper--section">

    <?php $counter = 1; $coef = 4; ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php
      $style = '';
      $modulo = $counter % $coef;
      if ( $modulo == 0 ) { $style = 'post--large'; $coef = $coef == 4 ? 12 : 4; }
      if ( in_array($modulo, array(10, 11, 5, 6)) ) { $style = 'post--small'; }
      $counter++;
    ?>
    <article class="post <?php echo $style; ?> <?php foreach( get_the_category() as $cat ) { echo 'post--' . $cat->slug; } ?> faded js-faded">
      <div class="post_pic">
        <?php the_post_thumbnail(); ?>
      </div>
      <div class="post_data">
        <h3 class="post_title"><?php the_category(','); ?><?php the_title(); ?></h3>
        <p class="post_lead"><?php echo get_the_excerpt(); ?></p>
      </div>
      <a href="<?php the_permalink(); ?>" class="c-link"></a>
    </article>
    <?php endwhile; ?>
    <?php else: ?>
    <?php endif; ?>

  </div>

  <div class="paginator">
    <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
  </div>

</section>
<div class="likely likely--first n-s">
  <div class="likely_label">Рассказать друзьям</div>
  <div class="facebook"></div>
  <div class="odnoklassniki"></div>
  <div class="vkontakte"></div>
</div>

<?php get_footer(); ?>