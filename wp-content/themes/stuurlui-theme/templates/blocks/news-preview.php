<?php
$news_query = new WP_Query([
  'post_type' => 'news',
  'posts_per_page' => get_field('count') ?? 3,
  'orderby' => 'date',
  'order' => 'DESC',
  'status' => 'publish',
]);
?>

<section class="news-preview py-12">
  <div class="container">
    <?php if (get_field('title')): ?>
      <div class="col-span-full">
        <h2 class="mb-10! text-center"><?= get_field('title'); ?></h2>
      </div>
    <?php endif; ?>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 md:gap-8">
      <?php if ($news_query->have_posts()): ?>
        <?php
        while ($news_query->have_posts()): $news_query->the_post();
          get_template_part('templates/components/card-news');
        endwhile;
        wp_reset_postdata();
        ?>
      <?php else: ?>
        <div class="col-span-full text-center">
          <p><?php _e('Geen nieuwsberichten gevonden.', 'stuurlui-theme'); ?></p>
        </div>
      <?php endif; ?>
    </div>
    <?php if (get_field('link')): ?>
      <div class="col-span-full text-center mt-10 md:mt-16">
        <a href="<?= get_field('link')['url']; ?>" target="<?= get_field('link')['target'] ?? '_self'; ?>" class="btn btn--outline">
          <?= get_field('link')['title']; ?> <span class="ml-2 bg-cta rounded-[999px] py-1 px-2 text-sm"><?= wp_count_posts('news')->publish; ?></span>
        </a>
      </div>
    <?php endif; ?>
  </div>
</section>