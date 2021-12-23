<?= $page->title() . '<br />'?>
<br />
<?= page('shows')->children()->eachTitle() ?>

<?php dump($page->worksIncluded()->yaml()) ?>
<?php foreach($page->worksIncluded()->yaml() as $work): ?>
    <?php dump($kirby->page($work)) ?>
<?php endforeach ?>

<?php /*

// Code to clean unique ID's and consecutively assign them, plus delete any possibule secondary lang unique ids

$allworks = page('works')->childrenAndDrafts()->template('work');
dump($allworks);

$i = 001;
foreach ($allworks as $key => $work) {
    // Target
    echo $work->id() . '<br />';
    // Format
    $unique = str_pad(strval($i), 3, "0", STR_PAD_LEFT) . '-CS' ;
    // Echo
    echo 'Actual value: ' .$work->content('es')->unique() . '<br />';
    echo 'Proposed value: ' . $unique . '<br />';
    // Update
    $work->update([
        'unique' => $unique
    ], 'es');    
    // Check
    echo 'New value: ' . $work->content('es')->unique() . '<br /><br />';
    // Nullify secondary lang
    $work->update([
        'unique' => ''
    ], 'en');     
    echo 'Secondary lang: ' . $work->content('en')->unique() . '<br /><br />';
    // Increment
    $i++;
    echo '$i: ' . $i . '<br /><br />'; 
}
site()->update([
    'workIndex' => $i
], 'es');
echo 'workindex es: ' . $i;
site()->update([
    'workIndex' => null
], 'en');

*/ ?>