<?php
    return function ($site, $page, $kirby) {

        $news = $page->news()->toStructure();
        $current = $news->filter(function ($item) {
            return  $item->datestart()->toDate('Y-m-d') == date('Y-m-d') || 
                    (
                        $item->datestart()->toDate() < time() && 
                        $item->dateend()->toDate() > time()
                    );
        });
        $upcoming = $news->filter(function ($item) {
            return  $item->datestart()->isEmpty() || 
                    $item->datestart()->toDate('Y-m-d') > date('Y-m-d');
        });

        // pass vars to the template
        return compact('current', 'upcoming');
    };