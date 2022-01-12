<div class="content-shows-wrapper">
    <?php foreach($page->children() as $show): ?>
        <?php if ($show->selectedImages()->isNotEmpty()): ?>
        <article id="<?= $show->slug() ?>" class="content-shows-show">
            <div class="content-show-slides">
                <!-- USE https://codesandbox.io/s/f9tvz + LazyLoad -->
                <?php $showFiles = $show->selectedImages()->toFiles() ?>
                <?php foreach ($showFiles as $file): ?>
                    <img class="" src="<?= $file->resize(700)->url() ?>">
                <?php endforeach ?>
                <div class="content-show-info">

                    <h1 class="content-show-infoTitle">
                        <?= $show->title()->html() ?>
                    </h1> 

                    <div class="content-show-infoVenueCity">
                        <?= $show->venue()->isNotEmpty() ? $show->venue()->toPage()->title()->html() . ', ' . $show->venue()->toPage()->city()->html() : '' ?>
                    </div>

                    <div class="Content-show-infoDates">
                        <?= $show->datestart()->isNotEmpty() ? $show->datestart()->toDate('j M Y') : '' ?><?= $show->dateend()->isNotEmpty() ? ' - ' . $show->dateend()->toDate('j M Y') : '' ?>
                    </div>

                    <div class="content-show-infoCurator">
                        <?= $show->curator()->isNotEmpty() ? t('curatedby') . ' ' . $show->curator()->toPage()->title()->html() : '' ?>
                    </div>

                    <div class="content-show-infoDescription">
                        <?= $show->description()->kt() ?>
                    </div>
                    
                    <div class="content-show-infoAuthor"> 
                        <?= $show->author()->isNotEmpty() ? $show->author()->html() : '' ?>
                    </div>

                    <div class="content-show-infoWorks">
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

                    <div class="content-show-infoArtists">
                        <?php if($show->artists()->isNotEmpty()): ?>
                            <?= t('artistsinthisshow') . ' ' . $show->artists() . '.'?>
                        <?php endif?>
                    </div>

                    <?= snippet('lang-selector') ?>
                </div>
            </div>
            <h1 class="content-show-title"><?= $show->title() ?></h1>
            <div class="content-show-details"><?= $show->venue()->toPage()->title()->html()?>, <?= $show->venue()->toPage()->city()->html()?> (<?= $show->datestart()->toDate('Y')?>)</div>
            <!-- Selector de idioma -->
        </article>
        <?php endif ?>
    <?php endforeach ?>
</div>