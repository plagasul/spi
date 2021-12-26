<?php $garden = asset('assets/svg/Garden_centered_2.svg') ?>
<nav class="navbar">
    <div class="navbar-top">
        <div class="garden navbar-item">
            <a href="<?= page("garden")->url() ?>"><img src="<?= $garden->url() ?>" /></a>
        </div>
        <div class="info navbar-item <?= $page == page("info") ? 'active' : '' ?>"><a href="<?= page("info")->url() ?>"><?= page("info")->title()->lower()->html() ?></a></div>
        <div class="shows navbar-item <?= $page == page("shows") ? 'active' : '' ?>"><a href="<?= page("shows")->url() ?>"><?= page("shows")->title()->lower()->html() ?></a></div>
        <div class="works navbar-item <?= $page == page("works") ? 'active' : '' ?>"><a href="<?= page("works")->url() ?>"><?= page("works")->title()->lower()->html() ?></a></div>
    </div>
    <div class="navbar-bottom">
        <div class="logo navbar-item"><a href="<?= $site->url() ?>"><?= $site->title()->html() ?></a></div>
    </div>
</nav>