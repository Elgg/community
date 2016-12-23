<?php

elgg_require_js('resources/index');

$content = elgg_view('community/pages/index');

echo elgg_view_page('', $content, 'default', [
	'body_attrs' => [
		'class' => 'elgg-page-landing',
	],
]);
