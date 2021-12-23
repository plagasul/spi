<?= $page->title() ?>

<?php 

$showsIncluded = page("shows")->childrenAndDrafts()->filter(function ($show) use ($page) {
    return $show->worksIncluded()->yaml();
});	
?>

<?php dump($showsIncluded) ?>