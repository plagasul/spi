<div class="content-works-wrapper">
    <?php foreach($page->children() as $work): ?>
        <?php if ($work->intendedTemplate() != 'gap'): ?>
        <article id="<?= $work->slug() ?>" class="content-works-work">
            <div class="content-works-grid">
                <?php $workFiles = $work->selectedImages()->toFiles()->filterBy('type','==','image') ?>
                <?php foreach ($workFiles as $file): ?>
                        <img class="<?= $file->orientation() ?> <?= $file->stretch()->toBool() === true || $file->shouldStretch($workFiles) ? 'stretch' : '' ?>" src="<?= $file->resize(700)->url() ?>">
                <?php endforeach ?>
            </div>
            <div class="content-works-details">
                <h1 class="content-works-title">
                    <?= $work->title()->kt() ?>
                </h1>

                <div class="content-works-detailsArea">

                    <?php if ($work->medium()->isNotEmpty()): ?>
                    <div class="content-works-medium">
                        <?=  $work->medium()->kt() ?>
                    </div>
                    <?php endif ?>

                    <?php if ($work->elementdimensions()->isNotEmpty()): ?>
                    <div class="content-works-elements">
                    <?php foreach ($work->elementdimensions()->toStructure() as $element): ?>
                        <div class="content-works-element">
                            <?= $element->elementdescription()->isNotEmpty() ? $element->elementdescription()->kirbytextinline() . ': ' : '' ?><?php if ($element->variableDimensions()->toBool()): ?>
                                <?= t('variabledimensions') ?>
                            <?php else: ?>
                                <?= $element->width()->isNotEmpty() ? $element->width() : ''?>
                                <?= $element->height()->isNotEmpty() ? ' x ' . $element->height() : ''?>
                                <?= $element->length()->isNotEmpty() ? ' x ' . $element->length() : ''?>
                                <?= 
                                    $element->width()->isNotEmpty() ||                        $element->height()->isNotEmpty() || 
                                    $element->length()->isNotEmpty() ? ' cm ' : '' 
                                ?>             
                                <?= $element->diameter()->isNotEmpty() ? 'ø ' . $element->diameter() . ' cm' : ''?>
                                <?= $element->duration()->isNotEmpty() ? $element->duration()->toDate('G\h i\' s\'\'') : '' ?>
                            <?php endif ?>
                        </div>
                    <?php endforeach ?>
                    </div>
                    <?php endif ?>

                    <div class="content-works-date">
                        <?= $work->datestart()->isNotEmpty() ? $work->datestart() : 'n.d.'?>
                        <?= $work->ongoing()->toBool() ? ' - ongoing' : '' ?>
                        <?= $work->ongoing()->toBool() == false && $work->dateend()->isNotEmpty() ? ' - ' . $work->dateend() : '' ?>
                    </div>
                                            
                </div>


                <?php if ($work->description()->isNotEmpty()): ?>
                <div class="content-works-description">
                    <?= $work->description()->kt() ?>
                </div>
                <?php endif ?>
                
                <?php $showsIncluded = $work->includedInShows() ?>
                <?php if ($showsIncluded->isNotEmpty()): ?>
                    <?php 
                        $showTitles = '';
                        foreach ($showsIncluded as $show ) {
                            $showTitles .= $show->title();
                            $showTitles .= $show->isLast($showsIncluded) ? '.' :', ';
                        } 
                    ?>    
                    <div class="content-works-featured">
                        <?= t('featured') ?> <?= $showTitles ?>
                    </div>
                <?php endif ?>
                <?= snippet('lang-selector') ?>
            </div>
        </article>
        <?php endif ?>
    <?php endforeach ?>
</div>