<section class="home-hero-slider py-12">
  <div class="container">
    <div class="grid grid-cols-1 md:grid-cols-12">
      <div class="col-span-1 md:col-span-5 flex flex-col">
        <?php if (get_field('title')): ?>
          <h1 class="">
            <?= get_field('title'); ?>
          </h1>
        <?php endif; ?>

        <?php if (get_field('content')): ?>
          <div class="richtext pt-5 mt-5 md:pt-10 md:mt-10 border-t border-primary/20">
            <?= get_field('content'); ?>
          </div>
        <?php endif; ?>

        <?php if (get_field('awards')): ?>
          <div class="pt-5 mt-5 md:pt-10 md:mt-10 border-t border-primary/20 flex flex-row gap-4">
            <?php foreach (get_field('awards') as $award):
              if (!$award['image']) continue;
            ?>
              <?php if ($award['link'] && $award['link']['url']): ?>
                <a href="<?= $award['link']['url']; ?>" target="<?= $award['link']['target'] ?? '_self'; ?>" aria-label="<?= $award['link']['title'] ?? ''; ?>" class="relative transition-all bottom-0 duration-300 hover:bottom-1 flex-2 flex items-center justify-center">
                  <?= wp_get_attachment_image($award['image'], 'small'); ?>
                </a>
              <?php else: ?>
                <div class="flex-1 flex items-center justify-center">
                  <?= wp_get_attachment_image($award['image'], 'small'); ?>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="col-span-1 md:col-span-6 md:col-start-7 flex justify-center">
        <?php if (get_field('case_slider')):
          $slider_settings = json_encode([
            'loop' => true,
            'spaceBetween' => 48,
            'slidesPerView' => 1,
            'autoplay' => [
              'delay' => 3000,
            ],
            'pagination' => [
              'el' => '.swiper-pagination',
              'clickable' => true,
            ],
          ]);
        ?>
          <div class="swiper max-w-full md:max-w-[500px] mx-auto md:mr-0! my-auto" data-swiper-settings="<?= esc_attr($slider_settings); ?>">
            <div class="swiper-wrapper">
              <?php foreach (get_field('case_slider') as $case): ?>
                <div class="swiper-slide aspect-square group">
                  <?php if ($case['link'] && $case['link']['url']): ?>
                    <a href="<?= $case['link']['url']; ?>" target="<?= $case['link']['target'] ?? '_self'; ?>" aria-label="<?= $case['link']['title'] ?? ''; ?>" class="absolute z-99 top-0 left-0 w-full h-full"></a>
                  <?php endif; ?>

                  <?php if ($case['image']): ?>
                    <?= wp_get_attachment_image($case['image'], 'large', attr: ['class' => 'z-1 absolute top-0 right-0 w-[92%] h-[92%] scale-100 group-hover:scale-103 transition-all duration-1000']); ?>
                  <?php endif; ?>

                  <?php if ($case['logo']): ?>
                    <?= wp_get_attachment_image($case['logo'], 'small', attr: ['class' => 'z-1 absolute bottom-[8%] left-[8%] block max-w-[48%] max-h-[11%] h-full w-auto']); ?>
                  <?php endif; ?>

                  <div class="border bg-white border-primary/20 rounded-sm absolute bottom-0 left-0 w-[92%] h-[92%] group-hover:bg-cta/20 transition-all duration-300">
                    <span class="bg-none text-primary text-sm rounded-tl-sm rounded-br-sm py-1 px-2 border-t-primary/20 border-l-primary/20 border-t border-l absolute -bottom-px -right-px group-hover:bg-primary group-hover:text-white transition-all duration-300">Bekijk case <i class="ml-1 fa-solid fa-arrow-right"></i></span>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>