<?php

$query_args = [
  'post_type' => 'news',
  'posts_per_page' => !empty(get_field('count')) ? get_field('count') : 9,
  'orderby' => 'date',
  'order' => 'DESC',
  'status' => 'publish',
  'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
  's' => isset($_GET['_s']) ? sanitize_text_field($_GET['_s']) : '',
];

if (isset($_GET['news-category']) && !empty($_GET['news-category'])) {
  $query_args['tax_query'] = [
    [
      'taxonomy' => 'news-category',
      'field' => 'term_id',
      'terms' => (int)$_GET['news-category'],
    ],
  ];
}

$news_query = new WP_Query($query_args);
?>

<section class="news-preview py-12">
  <div class="container">
    <?php if (get_field('title')): ?>
      <div class="col-span-full">
        <h1 class="mb-10! text-center"><?= get_field('title'); ?></h1>
      </div>
    <?php endif; ?>

    <div class="col-span-full flex flex-col justify-center mb-10">
      <form action="" method="get" class="search-form relative flex flex-wrap gap-4 mx-auto">
        <span class="relative w-full md:w-fit">
          <input type="text" name="_s" value="<?= isset($_GET['_s']) ? sanitize_text_field($_GET['_s']) : ''; ?>" placeholder="<?= get_field('search_placeholder') ?? __('Zoek je een specifieke blog?', 'stuurlui-theme'); ?>" class="bg-white w-full md:w-fit border-b border-primary/20 focus:border-primary leading-none transition-all duration-200 pl-15 py-3 px-4 placeholder:text-primary/50">
          <i class="fa-solid fa-magnifying-glass absolute left-5 top-1/2 -translate-y-1/2 text-primary z-1"></i>
        </span>
        <span class="relative w-full md:w-fit">
          <?php
          wp_dropdown_categories([
            'taxonomy'        => 'news-category',
            'show_option_all' => __('Alle categorieën', 'stuurlui-theme'),
            'name'            => 'news-category',
            'class'           => 'bg-white w-full md:w-fit border-b border-primary/20 hover:border-primary leading-none transition-all duration-200 py-3 px-4 hover:cursor-pointer',
            'id'              => 'news-category',
            'selected'        => isset($_GET['news-category']) ? (int)$_GET['news-category'] : 0,
          ]);
          ?>
        </span>
      </form>
      <span class="text-sm text-primary/75 block mx-auto mt-4">
        <?= sprintf(__('%d nieuwsberichten gevonden', 'stuurlui-theme'), $news_query->found_posts); ?>
      </span>
    </div>

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

    <?php if ($news_query->max_num_pages > 1) : ?>
      <div class="container mx-auto mt-16 mb-20 flex justify-center">
        <?php
        echo paginate_links([
          'total'   => $news_query->max_num_pages,
          'current' => max(1, get_query_var('paged')),
          'type'    => 'list',
        ]);
        ?>
      </div>
    <?php endif; ?>
</section>