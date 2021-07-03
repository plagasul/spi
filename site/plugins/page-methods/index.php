<?php
Kirby::plugin('jaume/page-methods', [
	'pageMethods' => [
		'includedInShows' => function () {
			$shows = new Pages();
            return page("shows")->children()->filter(function ($show) use ($shows) {
				foreach($show->worksIncluded()->toPages() as $work) {
					if ($work === $this) {
						$shows->add($show);
					}
				}
				return $shows;
			});	
		},
		'dateOrOngoing' => function () {
			if ($this->ongoing()->toBool() === true) {
				return ' -> Ongoing';
			} else if ($this->yearend()->isNotEmpty()) {
				return ' -> ' . $this->yearend();
			} else {
				return '';
			}
		}
	]
]);