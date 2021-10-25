<?php
Kirby::plugin('jaume/page-methods', [
	'pageMethods' => [
		'includedInShows' => function () {
			$shows = new Pages();
            page("shows")->children()->filter(function ($show) use ($shows) {
				foreach($show->worksIncluded()->toPages() as $work) {
					if ($work === $this) {
						$shows->add($show);
					}
				}

			});	
			// return $this->title();
			return $shows;			
		},
		'dateOrOngoing' => function () {
			if ($this->ongoing()->toBool() === true) {
				return ' -> Ongoing | ';
			} else if ($this->dateend()->isNotEmpty()) {
				return ' -> ' . $this->dateend() . ' | ';
			} else {
				return '';
			}
		}
	]
]);