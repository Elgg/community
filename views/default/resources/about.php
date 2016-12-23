<?php

$page = elgg_extract('page', $vars, 'index');

$title = elgg_echo("community:about:$page");
$content = elgg_view("community/pages/about/$page", $vars);

$layout = elgg_view_layout('content', [
	'content' => $content,
	'title' => $title,
	'filter' => '',
]);

echo elgg_view_page($title, $layout);
