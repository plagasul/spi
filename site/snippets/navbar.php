<nav class="navbar">
        <div class="logo navbar-item"><a href=""><?= $site->title()->html() ?></div>
        <div class="works navbar-item"><a href="<?= page("works")->url() ?>"><?= page("works")->title()->lower()->html() ?></a></div>
        <div class="shows navbar-item"><a href="<?= page("shows")->url() ?>"><?= page("shows")->title()->lower()->html() ?></a></div>
        <div class="info navbar-item"><a href="<?= page("info")->url() ?>"><?= page("info")->title()->lower()->html() ?></a></div>
        <div class="garden navbar-item"><a href="<?= page("garden")->url() ?>">
            <?php $garden = asset('assets/svg/garden.svg') ?>
            <img src="<?= $garden->url() ?>" />
        </a></div>
</nav>