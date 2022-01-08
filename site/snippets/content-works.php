<div class="content-works-wrapper">
    <?php foreach($page->children() as $work): ?>
        <?php if ($work->intendedTemplate() != 'gap'): ?>
        <article id="<?= $work->slug() ?>" class="content-works-work">
            <div class="content-works-grid">
                <?php $workFiles = $work->selectedImages()->toFiles() ?>
                <?php foreach ($workFiles as $file): ?>
                    <?php if ($file->type() == 'image'): ?> 
                    <img class="<?= $file->orientation() ?> <?= $file->stretch()->toBool() === true || $file->shouldStretch($workFiles) ? 'stretch' : '' ?>" src="<?= $file->resize(700)->url() ?>">
                    <?php endif ?>
                <?php endforeach ?>
            </div>
            <h1 class="content-works-title"><?= $work->title() ?></h1>
            <div class="content-work-date"><?= $work->dateStart()->isNotEmpty() ? $work->datestart()->toDate('Y') : 'n.d.'?><?= $work->ongoing()->toBool() ? ' - ongoing' : '' ?><?= $work->dateend()->isNotEmpty() ? ' - ' . $work->dateend()->toDate('Y') : '' ?></div>
            <?php foreach ($work->elementdimensions()->toStructure() as $element): ?>
                <div class="content-works-details"></div>
            <?php endforeach ?>
            <div class="content-works-description"><?= $work->description()->kt() ?></div>
            <?php $showsIncluded = $work->includedInShows() ?>
            <?php if ($showsIncluded->isNotEmpty()): ?>
                <?php 
                    $showTitles = '';
                    foreach ($showsIncluded as $show ) {
                        $showTitles .= $show->title();
                        if ($show->isLast($showsIncluded)) {
                            $showTitles .= '.';
                        } else {
                            $showTitles .= ', ';
                        }
                    } 
                ?>    
                <div class="content-works-featured"><?= t('featured') ?> <?= $showTitles ?></div>
            <?php endif ?>
            <!-- Selector de idioma -->
        </article>
        <?php endif ?>
    <?php endforeach ?>
</div>