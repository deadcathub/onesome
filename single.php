<?php get_header(); ?>

<?php
$color_one = get_post_meta($post->ID, "color-one", true);
$color_two = get_post_meta($post->ID, "color-two", true);
$pic_one   = get_post_meta($post->ID, "pic-one", true);
$lead      = get_post_meta($post->ID, "lead", true);
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



<article class="l-wrap | p-article">

<?php if ( $color_two ) : ?>

  <header class="js-article-header | p-article_header <?php if ( $color_two ) { echo 'p-article_header--color'; } ?>"
    <?php
    if ( $color_two && !$pic_one ) {
      echo 'style="background: linear-gradient(179deg, ' . '#' . $color_two . ', ' . adjustBrightness($color_two, 20) . ')"';
    } else if ( $color_two && $pic_one ) {
      echo 'style="background: url(' . $pic_one . ') no-repeat center/contain, linear-gradient(160deg, ' . '#' . $color_two . ', ' . adjustBrightness($color_two, 20) . ')"';
    }
    ?>>
    <div class="p-article_wrap">
      <h1 class="p-article_title <?php if ( $color_two ) { echo 'p-article_title--white'; } ?>">
        <?php the_title(); ?>
      </h1>
      <div class="p-article_meta">
        <time class="p-article_date <?php if ( $color_two ) { echo 'p-article_date--white'; } ?>" datetime="<?php echo get_the_date('Y-m-d'); ?>">
          <?php echo dateToRussian(get_the_date('j F Y')); ?>
        </time>
        <?php the_category(' '); ?>
      </div>
      <?php if ( $lead ) : ?>
      <p class="p-article_lead <?php if ( $color_two ) { echo 'p-article_lead--white'; } ?>">
        <?php echo $lead; ?>
      </p>
    </div>
    <?php endif; ?>
  </header>

<?php else : ?>

  <header class="js-article-header | p-article_header">
    <div class="p-article_wrap">
      <h1 class="p-article_title">
        <?php the_title(); ?>
      </h1>
      <div class="p-article_meta">
        <time class="p-article_date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
          <?php echo dateToRussian(get_the_date('j F Y')); ?>
        </time>
        <?php the_category(' '); ?>
      </div>
      <?php if ( $lead ) : ?>
      <p class="p-article_lead">
        <?php echo $lead; ?>
      </p>
    </div>
    <?php endif; ?>
  </header>

<?php endif; ?>

<?php the_content(); ?>

<?php endwhile; ?>
<?php else: ?>
<?php endif; ?>

  <div class="likely-wrapper likely-wrapper--article">
    <div class="likely likely--hor n-s">
      <div class="facebook" title="facebook"></div>
      <div class="vkontakte" title="vkontakte"></div>
      <div class="twitter" title="twitter"></div>
      <div class="odnoklassniki" title="odnoklassniki"></div>
    </div>
  </div>

</article>



<section class="p-article_more">
  <ul class="l-grid">
<?php
$orig_post = $post;
global $post;
$tags = wp_get_post_tags( $post->ID );
if ( $tags ) {
$tag_ids = array();
foreach ( $tags as $individual_tag ) $tag_ids[] = $individual_tag->term_id;
$args = array(
'tag__in' => $tag_ids,
'post__not_in' => array( $post->ID ),
'posts_per_page' => 4,
'caller_get_posts' => 1
);
$my_query = new wp_query( $args );
while ( $my_query->have_posts() ) {
$my_query->the_post();
?>
    <li class="l-grid_item">
      <?php get_template_part('block', 'post'); ?>
    </li>

<? }
}
$post = $orig_post;
wp_reset_query();
?>
  </ul>
</section>

<!-- <div class="subsribe">
  <a href="https://www.instagram.com/erockru/" class="subsribe_link">
    <img class="subsribe_ico" src="/wp-content/themes/erock/images/inst-ico.png" alt="">
    <div class="subsribe_meta">
      <div class="subsribe_title">
        Instagram erock
      </div>
      <div class="subsribe_text">
        Классический рок в картинках
      </div>
    </div>
  </a>
</div> -->

<?php get_footer(); ?>



