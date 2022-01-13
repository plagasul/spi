<div class="content-shows-wrapper">
    <?php foreach($page->children() as $show): ?>
        <?php if ($show->selectedImages()->isNotEmpty()): ?>
        <article id="<?= $show->slug() ?>" class="content-shows-show">
            <div class="content-shows-slides">
                <!-- USE https://codesandbox.io/s/f9tvz + LazyLoad -->
                <?php $showFiles = $show->selectedImages()->toFiles() ?>
                <?php foreach ($showFiles as $file): ?>
                    <img class="<?= $file->isLast($showFiles) ? 'last' : ''?>" src="<?= $file->resize(700)->url() ?>">
                <?php endforeach ?>
                <div class="content-shows-info">

                    <h1 class="content-shows-infoTitle">
                        <?= $show->title()->html() ?>
                    </h1> 

                    <div class="content-shows-infoVenueCity">
                        <?= $show->venue()->isNotEmpty() ? $show->venue()->toPage()->title()->html() . ', ' . $show->venue()->toPage()->city()->html() : '' ?>
                    </div>

                    <div class="content-shows-infoDates">
                        <?= $show->datestart()->isNotEmpty() ? $show->datestart()->toDate('j M Y') : '' ?><?= $show->dateend()->isNotEmpty() ? ' - ' . $show->dateend()->toDate('j M Y') : '' ?>
                    </div>

                    <div class="content-shows-infoCurator">
                        <?= $show->curator()->isNotEmpty() ? t('curatedby') . ' ' . $show->curator()->toPage()->title()->html() : '' ?>
                    </div>

                    <div class="content-shows-infoDescription">
                        <?= $show->description()->kt() ?>
                    </div>
                    
                    <div class="content-shows-infoAuthor"> 
                        <?= $show->author()->isNotEmpty() ? $show->author()->html() : '' ?>
                    </div>

                    <div class="content-shows-infoWorks">
                        <?php if($show->worksIncluded()->isNotEmpty()): ?>
                            <?php 
                                $workTitles = '';
                                foreach($show->worksIncluded()->toPages() as $work) {
                                    $workTitles .= $work->title();
                                    $workTitles .= $work->isLast($show->worksIncluded()->toPages()) ? '.' : ', ';
                                }
                            ?>
                            <?= t('worksinthisshow') . ' ' . $workTitles?>
                        <?php endif?>
                    </div>

                    <div class="content-shows-infoArtists">
                        <?php if($show->artists()->isNotEmpty()): ?>
                            <?= t('artistsinthisshow') . ' ' . $show->artists() . '.'?>
                        <?php endif?>
                    </div>

                    <?= snippet('lang-selector') ?>
                </div>
            </div>
            <div class="content-shows-details">
                <h1 class="content-shows-title">
                    <?= $show->title() ?>
                </h1>
                <div class="content-shows-venueCity">
                    <?= $show->venue()->toPage()->title()->html()?>, <?= $show->venue()->toPage()->city()->html()?> (<?= $show->datestart()->toDate('Y')?>)
                </div>
            </div>
        </article>
        <?php endif ?>
    <?php endforeach ?>
</div>