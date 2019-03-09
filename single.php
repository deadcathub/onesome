<?php get_header(); ?>

<?php
$color_one = get_post_meta($post->ID, "color-one", true);
$color_two = get_post_meta($post->ID, "color-two", true);
$pic_one   = get_post_meta($post->ID, "pic-one", true);
$repeat    = get_post_meta($post->ID, "repeat", true);
$lead      = get_post_meta($post->ID, "lead", true);
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



<article class="article">

<?php if ( $repeat ) : ?>

  <header class="js-article-header | article-header <?php if ( $color_one ) { echo 'article-header--color'; } ?>"
    <?php
    if ( $color_one && $color_two && !$pic_one ) {
      echo 'style="background: linear-gradient(179deg, ' . '#' . $color_one . ','  . '#' . $color_two . ')"';
    } else if ( $color_one && !$color_two && !$pic_one ) {
      echo 'style="background: linear-gradient(179deg, ' . '#' . $color_one . ', ' . adjustBrightness($color_one, 20) . ')"';
    } else if ( $color_one && !$color_two && $pic_one ) {
      echo 'style="background: url(' . $pic_one . ') no-repeat center/contain, linear-gradient(160deg, ' . '#' . $color_one . ', ' . adjustBrightness($color_one, 20) . ')"';
    } else if ( $color_one && $color_two && $pic_one ) {
      echo 'style="background: url(' . $pic_one . ') no-repeat center/contain, linear-gradient(160deg, ' . '#' . $color_one . ','  . '#' . $color_two . ')"';
    }
    ?>>
    <div class="article-header_meta">
      <?php the_category(' '); ?>
      <time class="article-header_date <?php if ( $color_one ) { echo 'article-header_date--white'; } ?>" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo dateToRussian(get_the_date('j F Y')); ?></time>
    </div>
    <h1 class="article-header_title <?php if ( $color_one ) { echo 'article-header_title--white'; } ?>">
      <?php the_title(); ?>
    </h1>
    <?php if ( $lead ) : ?>
    <p class="article-lead <?php if ( $color_one ) { echo 'article-lead--white'; } ?>">
      <?php echo $lead; ?>
    </p>
    <?php endif; ?>
  </header>

<?php else : ?>

  <header class="js-article-header | article-header">
    <div class="article-header_meta">
      <?php the_category(' '); ?>
      <time class="article-header_date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
        <?php echo dateToRussian(get_the_date('j F Y')); ?>
      </time>
    </div>
    <h1 class="article-header_title">
      <?php the_title(); ?>
    </h1>
    <?php if ( $lead ) : ?>
    <p class="article-lead">
      <?php echo $lead; ?>
    </p>
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



<section class="content | article_more">
  <div class="b-post-header">
    <h3 class="b-post-header_title">Больше записей</h3>
    <a class="b-post-header_link" href="/all/">Все записи</a>
  </div>
  <ul class="l-post-row | more_post-list">
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
    <li class="l-post-row_item">

      <article class="b-post-small">
        <a href="<?php the_permalink(); ?>" class="b-post_link c-link"></a>
        <div class="b-post-small_holder">
          <div class="b-post-small_content">
            <div class="b-post-small_pic" style="background: url('<? $path = get_the_post_thumbnail_url(null, 'similar_bg'); echo 'data:image/' . pathinfo($path, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($path)); ?>') no-repeat; background-size: cover;">
              <?php the_post_thumbnail( 'similar_thumb' );?>
            </div>
            <div class="b-post-small_data"
              <?php
              $color_one = get_post_meta($post->ID, "color-one", true);
              if ( $color_one ) {
                echo 'style="background: linear-gradient(to top, ' . adjustBrightness($color_one, 3) . ' 10%, transparent);"';
              }
              ?>>
              <h3 class="b-post-small_title <?php if ( $color_one || $post_type ) { echo 'b-post-small_title--white'; } ?>">
                <?php the_title(); ?>
              </h3>
              <span class="b-post-small_date <?php if ( $color_one || $post_type ) { echo 'b-post-small_date--white'; } ?>">
                <?php echo dateToRussian(get_the_date('j F Y')); ?>
              </span>
            </div>
          </div>
        </div>
      </article>

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



