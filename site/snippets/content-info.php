<div class="content-info-wrapper">

    <div class="content-info-column">
    <?php if ($page->texts()->isNotEmpty()): ?>                
        <section class="content-info-texts content-info-section">
            <h1 class="content-info-sectionTitle">Texts</h1>
            <?php foreach($page->texts()->toStructure() as $text): ?>
                <div class="content-info-item">
                    <h2 class="content-info-itemTitle">
                        <?= $text->title()->html() ?>
                    </h2>
                    <div class="content-info-itemDetails">
                        <?= $text->author()->html() ?? '' ?><?= $text->date()->isNotEmpty() ? ', ' . $text->date()->toDate('Y') : '' ?>
                    </div>
                </div>
            <?php endforeach ?>
    <?php endif ?>
        </section>
    <?php if ($page->press()->isNotEmpty()): ?>        
        <section class="content-info-press content-info-section">
            <h1 class="content-info-sectionTitle">Press</h1>
            <?php foreach($page->press()->toStructure() as $pressItem): ?>
                <div class="content-info-item">
                    <h2 class="content-info-itemTitle">
                        <?= $pressItem->title()->html() ?>
                    </h2>
                    <div class="content-info-itemDetails">
                        <?= $pressItem->source()->html() ?? '' ?><?= $pressItem->date()->isNotEmpty() ? ', ' . $pressItem->date()->toDate('Y') : '' ?>
                    </div>
                </div>
            <?php endforeach ?>
        </section>
    <?php endif ?>
    <?php if ($page->publications()->isNotEmpty()): ?>
        <section class="content-info-publication content-info-section">
            <h1 class="content-info-sectionTitle">Publications</h1>
            <?php foreach($page->publications()->toStructure() as $publication): ?>
                <div class="content-info-item">
                    <h2 class="content-info-itemTitle">
                        <?= $publication->title()->html() ?>
                    </h2>
                    <div class="content-info-itemDetails">
                        <?= $publication->location()->isNotEmpty() ? $publication->location()->toPage()->title()->html() : '' ?><?= $publication->date()->isNotEmpty() ? ', ' . $publication->date()->toDate('Y') : '' ?>
                    </div>
                </div>
            <?php endforeach ?>
        </section>
    <?php endif ?>
    <?php if ($page->blurbs()->isNotEmpty()): ?>        
        <section class="content-info-blurbs content-info-section">
            <h1 class="content-info-sectionTitle">Blurbs</h1>
            <?php foreach($page->blurbs()->toStructure() as $blurb): ?>
                <div class="content-info-item">
                    <div class="content-info-quote">
                        <?= $blurb->text()->kt() ?>
                    </div>
                    <div class="content-info-itemDetails">
                        <?= $blurb->author()->html() ?? ''?><?= $blurb->source() ? ', ' . $blurb->source()->html() : ''?><?= $blurb->date()->isNotEmpty() ? ', ' . $blurb->date()->toDate('Y') : '' ?>
                    </div>          
                </div>
            <?php endforeach ?>
        </section>
    <?php endif ?>
    </div>

    <div class="content-info-column">
    <?php if ($page->bio()->isNotEmpty()): ?>       
        <section class="content-info-bio content-info-section">
            <h1 class="content-info-sectionTitle">Bio</h1>
            <div class="content-info-bioText">
                <?= $page->bio()->kirbyttextinline() ?>
            </div>
        </section>
    <?php endif ?>
    <?php if ($page->email()->isNotEmpty() || $page->social()->isNotEmpty()): ?>         
        <section class="content-info-contact content-info-section">
            <h1 class="content-info-sectionTitle">Contact</h1>
            <?php if ($page->email()->isNotEmpty()): ?>
                <div class="content-info-email" >
                    <?= $page->email()->html() ?>
                </div>
            <?php endif ?>
            <?php if ($page->social()->isNotEmpty()): ?>
                <?php foreach($page->social()->toStructure() as $socialItem): ?>
                    <div class="content-info-socialItem" >
                        <a href="<?= $socialItem->url() ?>"><?= $socialItem->text()->html() ?></a>
                    </div>             
                <?php endforeach ?>                   
            <?php endif ?>
        </section>
    <?php endif ?>
    </div>
    
    <?= snippet('lang-selector') ?>
</div>