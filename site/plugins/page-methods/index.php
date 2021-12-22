<?php
Kirby::plugin('jaume/page-methods', [
	'pageMethods' => [
		'includedInShows' => function () {
			return page("shows")->childrenAndDrafts()->filter(function ($show) {
				return $show->worksIncluded()->toPages()->has($this);
			});	
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