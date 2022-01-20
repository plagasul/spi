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
                <div class="content-shows-info" style="background-color:<?= $site->sidebarcolor() ?>" >

                    <h1 class="content-shows-infoTitle">
                        <?= $show->title()->html() ?>
                    </h1> 

                    <?php if ($show->venue()->isNotEmpty()): ?>
                    <div class="content-shows-infoVenueCity">
                        <?=  $show->venue()->toPage()->title()->html() . ', ' . $show->venue()->toPage()->city()->html() ?>
                    </div>
                    <?php endif ?>

                    <?php if ($show->datestart()->isNotEmpty()): ?>
                    <div class="content-shows-infoDates">
                        <?= $show->datestart()->toDate('j M Y') ?><?= $show->dateend()->isNotEmpty() ? ' - ' . $show->dateend()->toDate('j M Y') : '' ?>
                    </div>
                    <?php endif ?>

                    <?php if ($show->curator()->isNotEmpty()): ?>
                    <div class="content-shows-infoCurator">
                        <?=  t('curatedby') . ' ' . $show->curator()->toPage()->title()->html() ?>
                    </div>
                    <?php endif ?>

                    <?php if($show->description()->isNotEmpty()): ?>
                    <div class="content-shows-infoDescription">
                        <?= $show->description()->kt() ?>
                    </div>
                    <?php endif ?>

                    <?php if($show->author()->isNotEmpty()): ?>
                    <div class="content-shows-infoAuthor"> 
                        <?= $show->author()->html() ?>
                    </div>
                    <?php endif ?>

                    <?php if($show->worksIncluded()->isNotEmpty()): ?>
                    <div class="content-shows-infoWorks">
                            <?php 
                                $workTitles = '';
                                foreach($show->worksIncluded()->toPages() as $work) {
                                    $workTitles .= $work->title();
                                    $workTitles .= $work->isLast($show->worksIncluded()->toPages()) ? '.' : ', ';
                                }
                            ?>
                            <?= t('worksinthisshow') . ' ' . $workTitles?>
                    </div>
                    <?php endif?>

                    <?php if($show->artists()->isNotEmpty()): ?>
                    <div class="content-shows-infoArtists">
                            <?= t('with') . ' ' . $show->artists() . '.'?>
                    </div>
                    <?php endif?>

                    <?= snippet('lang-selector') ?>
                </div>
            </div>
            <div class="content-shows-details">
                <h1 class="content-shows-title">
                    <?= $show->title() ?>
                </h1>

                <?php if ($show->venue()->isNotEmpty()): ?>
                <div class="content-shows-venueCity">
                    <?= $show->venue()->toPage()->title()->html()?>, <?= $show->venue()->toPage()->city()->html()?> (<?= $show->datestart()->toDate('Y')?>)
                </div>
                <?php endif ?>
                
            </div>
        </article>
        <?php endif ?>
    <?php endforeach ?>
</div>