<nav class="sidebar-info" style="background-color:<?= $site->sidebarcolor() ?>">
    <?php if ($current->isNotEmpty() || $upcoming->isNotEmpty()): ?>

        <?php if ($current->isNotEmpty()): ?>    
            <div class="info-news-section info-news-current">
                <h1 class="info-news-heading">Current</h1>
                <?php foreach($current as $c): ?>
                    <div class="info-news-item">
                        <h2 class="info-news-title">
                            <?= $c->title()->html() ?>
                        </h2>
                        <div class="info-news-date">
                            <?= $c->datestart()->toDate('j M Y') ?><?= $c->dateend()->isNotEmpty() ? ' - ' . $c->dateend()->toDate('j M Y') : ''?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif ?>

        <?php if ($upcoming->isNotEmpty()): ?>    
            <div class="info-news-section info-news-upcoming">
                <h1 class="info-news-heading">Upcoming</h1>
                <?php foreach($upcoming as $u): ?>
                    <div class="info-news-item">
                        <h2 class="info-news-title">
                            <?= $u->title()->html() ?>
                        </h2>

                        <?php if ($u->venue()->isNotEmpty()): ?>
                        <div class="info-news-venueCity">
                            <?= $u->venue()->toPage()->title()->html() ?><?= $u->venue()->toPage()->city()->isNotEmpty() ? ', ' . $u->venue()->toPage()->city()->html() : '' ?>
                        </div>
                        <?php endif ?>

                        <?php if ($u->datestart()->isNotEmpty()): ?>
                        <div class="info-news-date">
                            <?= $u->datestart()->toDate('j M Y') ?><?= $u->dateend()->isNotEmpty() ? ' - ' . $u->dateend()->toDate('j M Y') : ''?>
                        </div>                   
                        <?php endif ?>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif ?>

    <?php else: ?>
        <div class="info-news-cat">
            <?= asset('assets/gif/Gatito_durmiendo.gif') ?>
        </div>
    <?php endif ?>    
</nav>


