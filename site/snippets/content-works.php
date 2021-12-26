<div class="content-works-wrapper">
    <?php foreach($page->children() as $work): ?>
        <?php if ($work->intendedTemplate() != 'gap'): ?>
        <article id="<?= $work->slug() ?>" class="content-works-work"><?= $work->title() ?>
            <div class="content-works-grid">
                <?php $workFiles = $work->selectedImages()->toFiles() ?>
                <?php $workFilesPortrait = $workFiles->filter(function ($file) {
                    return $file->orientation() == 'portrait';
                }) ?>
                <?php foreach ($workFiles as $file): ?>
                    <?php if ($file->type() == 'image'): ?> 
                    <img class="<?= $file->orientation() ?> <?= $file->stretch()->toBool() ? 'stretch' : '' ?> <?= $file->isLast($workFilesPortrait) && !$file->isNth(1,$workFilesPortrait) ? 'last' : '' ?>" src="<?= $file->resize(700)->url() ?>">
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </article>
        <?php endif ?>
    <?php endforeach ?>
</div>