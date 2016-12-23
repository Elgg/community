<?php

$plugin_root = __DIR__;
$root = dirname(dirname($plugin_root));
$alt_root = dirname(dirname(dirname($root)));
if (file_exists("$plugin_root/vendor/autoload.php")) {
	$path = $plugin_root;
} else if (file_exists("$root/vendor/autoload.php")) {
	$path = $root;
} else {
	$path = $alt_root;
}

return [
	'default' => [
		'css.js' => $path . '/vendor/bower-asset/require-css/css.js',
		'hljs.js' => $path . '/vendor/components/highlightjs/highlight.pack.js',
		'hljs.css' => $path . '/vendor/components/highlightjs/styles/default.css',
	],
];
