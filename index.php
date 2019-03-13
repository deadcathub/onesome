<?php get_header(); ?>

      <section>

        <!-- <div class="b-day | index_day">
          <h3 class="b-day_title">Дата</h3>
          <div class="b-day_day">
            <div class="b-day_date">
              26
            </div>
            <div class="b-day_label">
              июля – 1970
            </div>
          </div>
          <p class="b-day_text">
            Лондонская квартира Хендрикса по улице Brook Street станет постоянно действующим музеем.
            Соответсвующий указ подписала Королева Елизавета.
          </p>
        </div> -->

        <ul class="l-grid | p-index_showcase">

<?php query_posts($query); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <li class="l-grid_item">
            <?php get_template_part('block', 'post'); ?>
          </li>

<?php endwhile; ?>
<?php wp_reset_query(); ?>
<?php else: ?>
<?php endif; ?>

        </ul>
      </section>

<!--       <div class="seo-wrapper">
        <section class="content">
          <h1 class="seo-title">Deadcat Journal</h1>
          <p class="seo_text">
            Интернет-журнал о&nbsp;классическом периоде зарубежной рок-музыки. Раритетные записи
            редкие фотографии, обзоры альбомов, биографии рок-групп и&nbsp;исполнителей
            без&nbsp;характерного запаха нафталина. Мы&nbsp;пропагандируем хороший музыкальный вкус,
            не&nbsp;злоупотребляя пошлым романтизмом.
          </p>
        </section>
      </div> -->

<?php get_footer(); ?>