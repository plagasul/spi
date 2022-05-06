<div class="content-garden-wrapper">
    <?php if ($page->hasImages()) : ?>
        <?php foreach ($page->images() as $image) : ?>
            <img src="<?= $image->url() ?>" class="content-garden-image">
        <?php endforeach ?>
    <?php endif ?>
</div>