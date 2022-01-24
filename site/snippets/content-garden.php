<div class="content-garden-wrapper">
    <?php foreach ($page->images() as $image): ?>
        <img src="<?= $image->url() ?>" class="content-garden-image">
    <?php endforeach ?>
</div>