<article class="b-post">
  <?php
  $color_one = get_post_meta($post->ID, "color-one", true);
  $color_two = get_post_meta($post->ID, "color-two", true);
  $pic_one   = get_post_meta($post->ID, "pic-one", true);
  ?>
  <a class="b-post_link c-link" href="<?php the_permalink(); ?>"></a>
  <div class="b-post_pic" style="background: url('<? $path = get_the_post_thumbnail_url(null, 'bg'); echo 'data:image/' . pathinfo($path, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($path)); ?>') no-repeat; background-size: cover;">
    <div class="b-post_holder">
      <?php the_post_thumbnail(); ?>
    </div>
  </div>
  <div class="b-post_data"
    <?php
      if ( $color_one && $color_two && !$pic_one ) {
        echo 'style="background: linear-gradient(160deg, ' . '#' . $color_two . ','  . '#' . $color_two . ')"';
      } else if ( $color_two && !$color_one && !$pic_one ) {
        echo 'style="background: linear-gradient(160deg, ' . '#' . $color_two . ', ' . adjustBrightness($color_one, 20) . ')"';
      } else if ( $color_two && !$color_one && $pic_one ) {
        echo 'style="background: url(' . $pic_one . ') no-repeat top -1px center/contain, linear-gradient(160deg, ' . '#' . $color_one . ', ' . adjustBrightness($color_one, 20) . ')"';
      } else if ( $color_one && $color_two && $pic_one ) {
        echo 'style="background: url(' . $pic_one . ') no-repeat top -1px center/contain, linear-gradient(160deg, ' . '#' . $color_one . ','  . '#' . $color_two . ')"';
      } else if ( !$color_one && !$color_two && $pic_one ) {
        echo 'style="background: white url(' . $pic_one . ') no-repeat top -1px center/contain"';
      }
    ?>>
    <h2 class="b-post_title"
      <?php
        if ( $color_one ) {
          echo 'style="color: ' . '#' . $color_one . ';"';
        }
      ?>>
      <?php the_title(); ?>
    </h2>
  </div>
</article>