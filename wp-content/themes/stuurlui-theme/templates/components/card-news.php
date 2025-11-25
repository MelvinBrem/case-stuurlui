<?php
if (get_post_type() !== 'news') return;

$categories = get_the_terms(get_the_ID(), 'news-category');
?>

<a href="<?= get_the_permalink(); ?>" aria-role="link" aria-label="<?= get_the_title(); ?>" class="group">
  <article class="h-full bg-white border-b border-primary/20 transition-all duration-200 focus-visible:border-primary hover:border-primary">
    <div class="bg-primary/50 aspect-video w-full h-auto overflow-hidden">
      <?php if (has_post_thumbnail()) : ?>
        <?= get_the_post_thumbnail(null, 'large', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-all duration-500']); ?>
      <?php endif; ?>
    </div>
    <div class="flex p-6 gap-6 flex-col">
      <div class="flex gap-2">
        <span class="py-1 px-2 text-sm border border-primary/75 rounded-sm"><?= get_the_date('j F Y'); ?></span>
        <?php if ($categories) : ?>
          <?php foreach ($categories as $category) : ?>
            <span class="py-1 px-2 text-sm border border-primary/75 rounded-sm"><?= $category->name; ?></span>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
      <h3 class="h4"><?= get_the_title(); ?></h3>
    </div>
  </article>
</a>