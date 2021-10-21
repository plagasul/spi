<?= $page->title() . '<br />'?>
<br />
<?= page('shows')->children()->eachTitle() ?>