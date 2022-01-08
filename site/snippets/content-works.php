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
            <div class="content-work-date">
                <?= $work->datestart()->isNotEmpty() ? $work->datestart() : 'n.d.'?>
                <?= $work->ongoing()->toBool() ? ' - ongoing' : '' ?>
                <?= $work->ongoing()->toBool() == false && $work->dateend()->isNotEmpty() ? ' - ' . $work->dateend() : '' ?>
            </div>
            <?php foreach ($work->elementdimensions()->toStructure() as $element): ?>
                <div class="content-works-elementDescription"><?= $element->elementdescription()->kt() ?></div>
                <div class="content-works-elementSize">
                    <?php if ($element->variableDimensions()->toBool()): ?>
                        dimensions variable
                    <?php else: ?>
                        <?= $element->width()->isNotEmpty() ? $element->width() : ''?>
                        <?= $element->height()->isNotEmpty() ? ' x ' . $element->height() : ''?>
                        <?= $element->length()->isNotEmpty() ? ' x ' . $element->length() : ''?>
                        <?= 
                            $element->width()->isNotEmpty() ||                        $element->height()->isNotEmpty() || 
                            $element->length()->isNotEmpty() ? ' cm ' : '' 
                        ?>             
                        <?= $element->diameter()->isNotEmpty() ? 'ø ' . $element->diameter() . ' cm' : ''?>
                        <?= $element->duration()->isNotEmpty() ? $element->duration()->toDate('G\hi\'s\'\'') : '' ?>
                    <?php endif ?>
                </div>
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