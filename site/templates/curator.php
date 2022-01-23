
<?php
    // Migrate old dimensions to new element 
/*
    try {
        foreach(page('works')->childrenAndDrafts() as $work) {
            echo '<h1>' . $work->title() . '</h1><br />';

            $elements = $work->elementdimensions()->yaml();
            echo '-actual elements-' . '<br />';
            dump($elements);
            echo '---' . '<br />';

            $values = [];            
            foreach ([
                'variabledimensions',
                'width', 
                'height', 
                'length',
                'duration'
            ] as $f) {
                if ($work->$f()->isNotEmpty()) {
                    $values[$f] = $work->$f()->toString();
                }
            }

            echo '-old dimensions-' . '<br />';
            dump($values);
            echo '---' . '<br />';            
            
            if (count($values) > 0) {
                $elements[] = $values;
                $work->update([
                    'elementdimensions' => Data::encode($elements, "yaml")
                ]);

                echo '-new elements-' . '<br />';
                dump($work->elementdimensions()->yaml());
                echo '---' . '<br />';
           
            }
        }
    } catch (Exception $e) {
        dump($e);
    }
*/
