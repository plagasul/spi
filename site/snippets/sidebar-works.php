<nav class="sidebar-works" style="background-color:<?= $site->sidebarcolor() ?>">
    <?php foreach(page('works')->children() as $work): ?>
        <?php if ($work->intendedTemplate() != 'gap'): ?>
            <div class="sidebar-works-work" data-work-target="<?= $work->slug() ?>"><a href="#<?= $work->slug() ?>"><?= $work->title()->html() ?></a></div>
        <?php else: ?>
            <div class="sidebar-works-gap">&nbsp;</div>
        <?php endif?>
    <?php endforeach ?>
</nav>