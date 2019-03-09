<!doctype html>
<html lang="ru" prefix="og: http://ogp.me/ns#">
  <head>
    <meta charset="utf-8">
    <title><?php kama_meta_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="date=no">
    <meta name="format-detection" content="address=no">
    <meta name="format-detection" content="email=no">
    <meta name="msapplication-config" content="none">
    <meta name='yandex-verification' content='623854631fd4c8fb' />
    <link href="https://fonts.googleapis.com/css?family=Alegreya:400,500,700,800&amp;subset=cyrillic" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&amp;subset=cyrillic" rel="stylesheet"> -->
    <!-- vollkorn -->
    <link rel="publisher" href="https://plus.google.com/106444110530197075060"/>
    <?php kama_meta_description() ?>
    <meta name="keywords" content="рок rock 70 60 зарубежный классика старые настоящий хард лучшие группы легенды музыканты исполнители рокстар фото статьи новости цитаты даты календарь альбомы обложки биографии картинки коллекции сборник музыка дискография эпоха classic old hard бесплатно">
    <link rel="icon" type="image/png" sizes="16x16" href="https://shuka.design/lib/icons/favicon3.png">
<!--     <link rel="icon" type="image/png" sizes="16x16" href="/journal/wp-content/themes/deadcat/img/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/journal/wp-content/themes/deadcat/img/favicon/favicon-32x32.png"> -->
<!--     <link rel="icon" type="image/png" sizes="96x96" href="/journal/wp-content/themes/deadcat/images/favicon/favicon-96x96.png">
    <link rel="apple-touch-icon" sizes="57x57" href="/journal/wp-content/themes/deadcat/images/favicon/favicon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/journal/wp-content/themes/deadcat/images/favicon/favicon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/journal/wp-content/themes/deadcat/images/favicon/favicon-72x72.png"> -->
<?php wp_head();?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-74151423-1', 'auto');
      ga('send', 'pageview');
    </script>
  </head>
  <body class="<?php if ( is_home() ) { echo ' index'; } ?>" >

    <div class="js-subnav subnav">
      <a class="js-logo | logo logo--s | subnav_logo" href="<?php bloginfo ('url'); ?>"></a>
      <div class="content | subnav_content">
        <?php  if ( is_single() ) : ?>
        <div class="subnav_title">
          <?php the_title(); ?>
        </div>
        <?php endif; ?>
        <a class="inst | subnav_inst" href="https://www.instagram.com/soundonmars/" target="_blank">
          <div class="inst_title">Instagram</div>
        </a>
      </div>
      <div class="likely likely--hor n-s | subnav_likely">
        <div class="facebook" title="фейсбук"></div>
        <div class="vkontakte" title="вконтакте"></div>
        <div class="twitter" title="твиттер"></div>
        <div class="odnoklassniki" title="одноклассники"></div>
      </div>
    </div>

    <div class="js-page-wrapper | page-wrapper">

      <nav class="m-menu">
        <span class="js-menu-close | m-menu_close">✕</span>
        <div class="m-menu_content">
          <ul class="m-menu_list">
            <li class="m-menu_item">
              <a class="m-menu_link" href="<?php echo home_url();?>/category/band/">Группа</a>
            </li>
            <li class="m-menu_item">
              <a class="m-menu_link" href="<?php echo home_url();?>/category/record/">Запись</a>
            </li>
            <li class="m-menu_item">
              <a class="m-menu_link" href="<?php echo home_url();?>/category/person/">Персона</a>
            </li>
            <li class="m-menu_item">
              <a class="m-menu_link" href="<?php echo home_url();?>/category/material/">Матчасть</a>
            </li>
            <li class="m-menu_item">
              <a class="m-menu_link" href="<?php echo home_url();?>/category/era/">Эпоха</a>
            </li>
            <li class="m-menu_item">
              <a class="m-menu_link" href="<?php echo home_url();?>/all/">Все статьи</a>
            </li>
            <!--
            <li class="m-menu_item">
              <a class="m-menu_link" href="<?php echo home_url(); ?>/project/">О&nbsp;проекте</a>
            </li>
            -->
          </ul>
          <div class="likely likely--hor likely--menu n-s">
            <div class="facebook" title="фейсбук"></div>
            <div class="vkontakte" title="вконтакте"></div>
            <div class="twitter" title="твиттер"></div>
            <div class="odnoklassniki" title="одноклассники"></div>
          </div>
      </nav>

      <header class="js-header | header <?php $art_design = get_post_meta($post->ID, "art-design-showcase", true); if ( $art_design && is_singular() ) { echo 'header--showcase'; } if ( is_home() ) { echo ' reservsed'; } ?> n-s">

        <ul class="js-sandwich | b-sandwich | header_sandwich">
          <li class="b-sandwich_item"></li>
          <li class="b-sandwich_item"></li>
          <li class="b-sandwich_item"></li>
        </ul>

        <a class="js-logo | logo logo--m | header_logo" href="<?php bloginfo ('url'); ?>">deadcat.me</a>

        <nav class="js-menu | menu">
          <ul class="menu_list">
            <li class="menu_item">
              <a class="menu_link" href="<?php echo home_url();?>/category/band/">Группа</a>
            </li>
            <li class="menu_item">
              <a class="menu_link" href="<?php echo home_url();?>/category/record/">Запись</a>
            </li>
            <li class="menu_item">
              <a class="menu_link" href="<?php echo home_url();?>/category/person/">Персона</a>
            </li>
            <li class="menu_item">
              <a class="menu_link" href="<?php echo home_url();?>/category/material/">Матчасть</a>
            </li>
            <li class="menu_item">
              <a class="menu_link" href="<?php echo home_url();?>/category/era/">Эпоха</a>
            </li>
            <li class="menu_item">
              <a class="menu_link" href="<?php echo home_url();?>/all/">Все статьи</a>
            </li>
            
            <!--
            <li class="menu_item">
              <a class="menu_link" href="<?php echo home_url(); ?>/project/">О&nbsp;проекте</a>
            </li>
            -->
          </ul>

        </nav>
        <!--
        <a class="egg" href="#">
          <img src="http://erock.ru/wp-content/themes/erock/images/dylan.png" width="200" height="200" alt="">
        </a>
        -->

      </header>
      <main>
