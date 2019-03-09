<?php get_header(); ?>

  <div class="page-header">
    <div class="content c-f">
      <h1 class="page-title"><?php the_title(); ?></h1>
      <p class="page-intro">
        Интернет-журнал о&nbsp;зарубежной рок-музыке
      </p>
    </div>
  </div>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="art-content">
  <?php the_content(); ?>
  </div>

  <div class="content">
    <div class="likely likely--first n-s">
      <div class="likely_label">
        <img class="likely_pic" src="/wp-content/themes/erock/images/likely-pic.png" width="" height="" alt=""><br>Расскажи друзьям
      </div>
      <div class="facebook"></div>
      <div class="odnoklassniki"></div>
      <div class="vkontakte"></div>
    </div>
  </div>

<?php endwhile; ?>
<?php else: ?>
<?php endif; ?>

<?php get_footer(); ?>