<section class="dropdown-grid py-12">
  <div class="container">
    <?php if (get_field('title')): ?>
      <div class="col-span-full">
        <h2 class="mb-4! md:mb-10!"><?= get_field('title'); ?></h2>
      </div>
    <?php endif; ?>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 md:gap-8">
      <?php if (get_field('faqs')):
        foreach (get_field('faqs') as $faq):
          if (!$faq['title'] || !$faq['content']) continue;
      ?>
          <div class="col-span-1 dropdown border-b border-primary/20 h-fit" data-dropdown-open="false">
            <div class="dropdown__title py-4 flex justify-between items-center hover:cursor-pointer group">
              <h3 class="h4 text-md mb-0! relative left-0 group-hover:left-4 transition-all duration-300"><?= $faq['title']; ?></h3>
              <i class="fa-solid fa-plus text-primary group-hover:text-cta! transition-all duration-300"></i>
              <i class="fa-solid fa-minus text-primary group-hover:text-cta! transition-all duration-300"></i>
            </div>
            <div class="dropdown__content">
              <div class="richtext text-primary/60 mb-4"><?= $faq['content']; ?></div>
              <?php if ($faq['link']): ?>
                <a href="<?= $faq['link']['url']; ?>" target="<?= $faq['link']['target'] ?? '_self'; ?>" class="block underline hover:no-underline text-primary mb-6"><?= $faq['link']['title']; ?></a>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>