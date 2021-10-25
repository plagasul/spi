<?php

return [
    'languages' => true,
    'debug'  => true,
    'panel' => [
        'css' => 'assets/css/panel/custom-panel.css'
    ],    
    'hooks' => [
        'page.create:after' => function ($page, $input) {
            if ($page->intendedTemplate() == "work") {
                $index = site()->content('es')->workIndex()->toInt();
                $index++;
                $index = str_pad(strval($index), 3, "0", STR_PAD_LEFT);
                $page->update([
                    'unique' => $index . '-CS'
                ], 'es');
                site()->update([
                    'workIndex' => $index
                ], 'es');
            }
        },
    ]
];
