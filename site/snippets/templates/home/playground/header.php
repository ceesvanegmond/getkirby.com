<header class="playground-header">
  <div class="playground-header-title mb-12">
    <h1 class="h1">Kirby is the CMS<br>that adapts to you</h1>
    <nav class="auto-fit" style="--min: 9rem; --gap: var(--spacing-3); max-width: 24rem;">
      <a class="btn btn--outlined" href="<?= '/releases/' . $version ?>">
        <?= icon('spaceship') ?>
        New in <?= $version ?>
      </a>
      <a class="btn btn--filled" href="/try">
        <?= icon('download') ?>
        Try now
      </a>
    </nav>
  </div>
  <div class="w-full">
    <div class="playground-header-layout">
      <figure class="playground-header-figure">
        <span class="playground-header-figure-wrapper" style="--aspect-ratio: <?= $storyImage->width() . '/' . $storyImage->height() ?>">
          <?= img($storyImage, [
            'alt' => $storyImage->alt()->or('Panel screenshot for: ' . $story->title()),
            'src' => [
              'width' => 1280
            ],
            'srcset' => [
              320,
              640,
              960,
              1280,
              1600
            ]
          ]) ?>
        </span>
      </figure>
      <div class="playground-header-menu">
        <ul class="font-mono text-sm pt-6 sticky" style="--top: var(--spacing-2)">
          <?php foreach ($stories as $option) : ?>
					<li><a <?php e($story === $option, 'aria-current="true"') ?> href="?your=<?= $option->slug() ?>"><?= $option->title() ?></a></li>
          <?php endforeach ?>
          <li><a class="font-bold more" href="/love">Your ideas &rarr;</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>
