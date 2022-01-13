<?php
Kirby::plugin('jaume/file-methods', [
    'fileMethods' => [
        'shouldStretch' => function ($siblings) {
            // Get only portrait siblings
            $portraits = $siblings->filter(function ($f) {
                return $f->orientation() == 'portrait';
            });

            // If this is the last portrait
            if ($this->is($portraits->last())) {
                // Previous portrait
                $previous = $portraits->nth($this->indexOf($portraits) - 1);

                // If previous portrait sibling stretches, $this should stretch
                if ($previous && $previous->stretch()->toBool() === true) {
                    return true;
                } elseif ($portraits->count() == 2) {
                // If prev does not stretch, and there are only two portraits (including this one), don't stretch
                    return false;
                }

                // Otherwise
                // Get all (portrait) siblings that are not stretched EXCEPT THIS
                $notStretched = $portraits->not($this)->filter(function ($f){
                    return $f->stretch()->toBool() === false;
                }); 

                // If number of not stretched portaits is even (considering previous is not stretched) $this should stretch 
                if ($notStretched->isEven()) {
                    return true;
                // If number of not stretched portraits is odd (considering previous is not stretched) $this should not stretch
                } elseif ($notStretched->isOdd()) {
                    return false;
                }     
            } else {
                return false;
            }
        },
    ]
]);