<?php



// styles and scripts connection
function my_scripts_method() {
  wp_deregister_script('jquery');
  wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', false, null, true);
  wp_enqueue_script('jquery');
  wp_enqueue_script('jquery.likely.min', get_template_directory_uri(). '/js/jquery.likely.min.js', '', '1.1', true);
  wp_enqueue_script('jquery.slick.min', get_template_directory_uri(). '/js/jquery.slick.min.js', '', '1.1', true);
  wp_enqueue_script('main', get_template_directory_uri(). '/js/main.js', '', '1.1', true);
  wp_enqueue_style('style', get_template_directory_uri(). '/style.css');
}
add_action('wp_enqueue_scripts', 'my_scripts_method');



// removing wp default javascript
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );



// thumbnails compability
add_theme_support('post-thumbnails');

// add post bg thumbnail
add_image_size( 'bg', 7, 7 );

// add similar post thumbnail
add_image_size( 'similar_thumb', 600, 600, array( 'center', 'top' ) );

// add similar post bg thumbnail
add_image_size( 'similar_bg', 5, 5, true );

// add similar post bg thumbnail
add_image_size( 'showcase_bg', 20, 20 );

// image quality
add_filter('jpeg_quality', function($arg){
  return 100;
});



// post theme compability
add_theme_support( 'post-formats', array('gallery', 'quote','video', 'aside', 'image', 'link' ) );



// srcset disabling
add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );



// remove thumbnail's classes
function the_post_thumbnail_remove_class($output) {
  $output = preg_replace('/class=".*?"/', '', $output);
  return $output;
}
add_filter('post_thumbnail_html', 'the_post_thumbnail_remove_class');



/*
// add body class by tag name
add_filter('body_class','my_class_names');
function my_class_names( $classes ) {
  if ( has_tag( showcase ) && !is_home() ) {
    $classes[] = 'showcased';
  }
  return $classes;
}
*/



// tags wraping disabling
remove_filter('the_content', 'wpautop');
remove_filter ('the_content', 'wptexturize');



// post sections links modification
function snip_category_rel( $result ) {
  global $post;
  $color_two = get_post_meta($post->ID, "color-two", true);
  // $repeat = get_post_meta($post->ID, "repeat", true);
  if ( $color_two ) {
    if ( is_single() ) {
      $result = str_replace('rel="category tag"', 'class="p-article_section p-article_section--white"', $result);
    } else {
      $result = str_replace('rel="category tag"', 'class="p-article_section p-article_section--white"', $result);
    }
  } else {
    $result = str_replace('rel="category tag"', 'class="p-article_section"', $result);
  }
  return $result;
}
add_filter( 'the_category', 'snip_category_rel' );
add_filter( 'wp_list_categories', 'snip_category_rel' );



// post classes modification
function true_remove( $classes ) {
	$classes = array_diff( $classes, array( "hentry", "type-post", "status-publish", "format-standard", "has-post-thumbnail", "tag-link" ) );
	return $classes;
}
add_filter( 'post_class', 'true_remove' );



// post total summ
function total_post( $bloggood_ru_posts ) {
  $bloggood_ru_posts = wp_count_posts( 'post' );
  $bloggood_ru_posts = $bloggood_ru_posts->publish;
  return $bloggood_ru_posts;
}



// post date month
function dateToRussian( $date ) {
  $month = array(
    "january"   => "янв",
    "february"  => "фев",
    "march"     => "марта",
    "april"     => "апр",
    "may"       => "мая",
    "june"      => "июня",
    "july"      => "июля",
    "august"    => "авг",
    "september" => "сент",
    "october"   => "окт",
    "november"  => "ноя",
    "december"  => "дек"
  );
  return str_replace(array_merge(array_keys($month)), array_merge($month), strtolower($date));
}



// article tags modification
function modify_tags_link( $tags ) {
  $tags = str_replace('<a ', '<a class="tags_link" ', $tags);
  return $tags;
}
add_filter( 'the_tags', 'modify_tags_link' );



// article prev next article modification
function modify_post_link($link) {
  $link = str_replace('<a ', '<a class="art-nav_link" ', $link);
  return $link;
}
add_filter('previous_post_link', 'modify_post_link');
add_filter('next_post_link', 'modify_post_link');



// pagination http://dimox.name/wordpress-pagination-without-a-plugin/
function wp_corenavi() {
  global $wp_query;
  $pages = '';
  $max = $wp_query -> max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;
  $a['mid_size'] = 1; //сколько ссылок показывать слева и справа от текущей
  $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
  $a['prev_text'] = '';
  $a['next_text'] = '';

  if ($max > 1) echo '<div class="paginator">';
  echo $pages . paginate_links($a);
  if ($max > 1) echo '</div>';
}



// post and simple pages custom field "title"
function kama_meta_title($sep=" ", $bloginfo_name=' ⋅ Deadcat Journal') {
  global $wp_query, $post;
  if ( !$bloginfo_name ) $bloginfo_name = get_bloginfo('name');
  if ( is_home() ) $bloginfo_name = '';
  $wp_title = wp_title('', 0, 'right');

  if ( is_category() || is_tag() ) {
    $desc = $wp_query->queried_object->description;
    if ( $desc ) preg_match ('!\[title=(.*)\]!iU',$desc,$match);
    $out = $match[1] ? $match[1].$sep : (( is_tag() )?"Метка:": "Категория:")." $wp_title";
  }
  elseif ( is_home() ) $out = 'Deadcat Journal';
  elseif ( is_singular() ) $out = ($free_title = get_post_meta($post->ID, "title", true)) ? $free_title.$sep : $wp_title;

  $out = trim( $out.$bloginfo_name );
  if ( $paged = get_query_var('paged') ) $out = "$out (страница $paged)";
  return print $out;
}



// custom meta description http://amateurblogger.ru/seo-optimizaciya-wordpress-title-i-metategi-bez-plagina/
function kama_meta_description ($home_description='Интернет-журнал для любителей рок-музыки 60-х и 70-х. Информационный, музыкальный и фоторесурс, посвящённый рок-музыке',$maxchar=200) {
  global $wp_query,$post;
  if (is_singular()) {
    if ( $descript = get_post_meta($post->ID, "description", true) )
      $out = $descript;
    elseif ($post->post_excerpt!='')
      $out = trim(strip_tags($post->post_excerpt));
    else
      $out = trim(strip_tags($post->post_content));
    $char = iconv_strlen( $out, 'utf-8' );
    if ( $char > $maxchar ) {
      $out = iconv_substr( $out, 0, $maxchar, 'utf-8' );
      $words = split(' ', $out ); $maxwords = count($words) - 1;
      $out = join(' ', array_slice($words, 0, $maxwords)).' ...';
    }
  }
  elseif (is_category() || is_tag()) {
    $desc = $wp_query->queried_object->description;
    if ($desc) preg_match ('!\[description=(.*)\]!iU',$desc,$match);
    $out = $match[1]?$match[1]:'';
  }
  elseif (is_home()) $out = $home_description;

  if ($out) {
    $out = str_replace( array("\n","\r"), ' ', strip_tags($out) );
    $out = preg_replace("@\[.*?\]@", '', $out);
    return print "<meta name='description' content='$out' />\n";
  }
  else return false;
}



// custom article CSS
add_action('admin_menu', 'custom_css_hooks');
add_action('save_post', 'save_custom_css');
add_action('wp_head','insert_custom_css');

function custom_css_hooks() {
  add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'post', 'normal', 'high');
  add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'page', 'normal', 'high');
}

function custom_css_input() {
  global $post;
  echo '<input type="hidden" name="custom_css_noncename" id="custom_css_noncename" value="'.wp_create_nonce('custom-css').'" />';
  echo '<textarea name="custom_css" id="custom_css" rows="5" cols="50" style="width:100%;">'.get_post_meta($post->ID,'_custom_css',true).'</textarea>';
}

function save_custom_css($post_id) {
  if (!wp_verify_nonce($_POST['custom_css_noncename'], 'custom-css')) return $post_id;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
  $custom_css = $_POST['custom_css'];
  update_post_meta($post_id, '_custom_css', $custom_css);
}

function insert_custom_css() {
  if ( is_page() || is_single() ) {
    if (have_posts()) : while (have_posts()) : the_post();
    echo '<style>'.get_post_meta(get_the_ID(), '_custom_css', true).'</style>';
    endwhile; endif;
    rewind_posts();
  }
}



// opengraph http://www.wphook.ru/seo/open-graph-vkontakte.html
function wph_open_graph() {
  echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '" />'.PHP_EOL;
  echo '<meta property="fb:admins" content="CjTgouOs2OE" /> '.PHP_EOL;
 
  global $post;
  if (is_singular()) {
    echo '<meta property="og:title" content="' . get_the_title() . '" />'.PHP_EOL;
    echo '<meta property="og:type" content="article" />'.PHP_EOL;
    echo '<meta property="og:url" content="' . get_permalink() . '" />'.PHP_EOL;
    echo '<meta property="og:image" content="' . esc_attr(wph_catch_that_image()) . '" />'.PHP_EOL;
  }
  if (is_home()) {
    echo '<meta property="og:type" content="website" />'.PHP_EOL;
    echo '<meta property="og:url" content="' . get_bloginfo('url') . '" />'.PHP_EOL;
    echo '<meta property="og:image" content="https://deadcat.me/journal/wp-content/uploads/2018/10/woodstock-1969-girl-ralph-ackerman.jpg" />'.PHP_EOL;
  }
}
add_action('wp_head', 'wph_open_graph'); 

function wph_catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  preg_match_all('/<img[^>]+src=([\'"])?((?(1).+?|[^\s>]+))(?(1)\1)/', $post->post_content, $result);     
  $first_img = $result[2][0];
  if (empty($first_img)) {
    $first_img = "https://deadcat.me/journal/wp-content/uploads/2018/10/woodstock-1969-girl-ralph-ackerman.jpg";
  }
  return $first_img;
}



// post title prefix removing
function title_format($content) {
  return '%s';
}
add_filter('private_title_format', 'title_format');
add_filter('protected_title_format', 'title_format');



// color lightness
function adjustBrightness($hex, $steps) {
  $steps = max(-255, min(255, $steps));
  $hex = str_replace('#', '', $hex);
  if ( strlen($hex) == 3 ) {
    $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
  }
  $color_parts = str_split($hex, 2);
  $return = '#';
  foreach ($color_parts as $color) {
    $color   = hexdec($color);
    $color   = max(0,min(255,$color + $steps));
    $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT);
  }
  return $return;
}



// google analytics
add_action('wp_footer','my_analytics', 20);
function my_analytics() { ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-74151423-1', 'auto');
  ga('send', 'pageview');
</script>
<?php }




?>