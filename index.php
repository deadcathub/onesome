<?php get_header(); ?>

      <section class="">

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

        <ul class="l-post-col | index_post-list">

<?php query_posts($query); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <li class="l-post-col_item">
            <?php get_template_part('block', 'post'); ?>
          </li>

<?php endwhile; ?>
<?php wp_reset_query(); ?>
<?php else: ?>
<?php endif; ?>

        </ul>
      </section>

      <!-- <div class="seo-wrapper">
        <section class="content">
          <h1 class="seo-title">Музыкальный <span class="no-w">интернет-журнал</span> о&nbsp;зарубежном роке</h1>
          <ul class="seo">
            <li class="seo_item">
              <p class="seo_text">
                Erock&nbsp;— <span class="no-w">интернет-журнал</span> о&nbsp;классическом периоде зарубежной <span class="no-w">рок-музыки</span> <span class="no-w">60-х</span>
                и&nbsp;<span class="no-w">70-х</span> годов. Раритетные записи, редкие фотографии, обзоры альбомов, биографии <span class="no-w">рок-групп</span> и&nbsp;исполнителей
                без&nbsp;характерного запаха нафталина. Мы&nbsp;пропагандируем хороший музыкальный вкус, не&nbsp;злоупотребляя пошлым романтизмом.
              </p>
            </li>
            <li class="seo_item">
              <p class="seo_text">
                Знаем, что&nbsp;классический рок это не&nbsp;только Led&nbsp;Zeppelin, Deep&nbsp;Purple, Uriah&nbsp;Heep и&nbsp;их&nbsp;производные.
                Полностью согласны с&nbsp;утверждением, что&nbsp;бить людей за&nbsp;плохой музыкальный вкус&nbsp;— это&nbsp;нормально.
              </p>
            </li>
          </ul>
        </section>
      </div> -->

<?php get_footer(); ?>