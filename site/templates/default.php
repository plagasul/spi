<?php snippet('html-pre') ?>
<?php snippet('navbar') ?>
<div class="home-show">
    <div class="home-show-area">
        <!-- Slider main container -->    
        <div class="swiper swiper_left">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <?php foreach($site->lefthome()->toFiles() as $f): ?>
                <div class="swiper-slide"><img src="<?= $f->url()?>" /></div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <div class="home-show-area">
        <!-- Slider main container -->    
        <div class="swiper swiper_right">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <?php foreach($site->righthome()->toFiles() as $f): ?>
                <div class="swiper-slide"><img src="<?= $f->url()?>" /></div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<?php snippet('html-post') ?>
