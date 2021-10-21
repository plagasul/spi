<?php
Kirby::plugin('jaume/pagesMethods', [
	'pagesMethods' => [
		'eachTitle' => function () {
			$titles = '';
			if ($this->isNotEmpty()) {
				forEach($this as $page) {
					$titles .= $page->title();
					if ($page->isLast($this)) {
						$titles .= ' | ';
					} else {
						$titles .= ', ';
					}
				}
			}
			return $titles;
		}
	]
]);