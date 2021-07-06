<?php

return [
    'languages' => true,
    'debug'  => true,
    'hooks' => [
        'page.create:after' => function ($page, $input) {
            if ($page->intendedTemplate() == "work") {
                $index = site()->workIndex()->toInt();
                $index++;
                $index = str_pad(strval($index), 3, "0", STR_PAD_LEFT);
                $page->update([
                    'unique' => $index . '-CS'
                ]);
                site()->update([
                    'workIndex' => $index
                ]);
            }
        },
    ]
];
