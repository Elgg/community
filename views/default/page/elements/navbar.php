<?php
elgg_require_js('page/elements/navbar');
?>

<div class="elgg-nav-logo">
	<?php
	echo elgg_view('output/url', [
		'href' => elgg_get_site_url(),
		'text' => elgg_view('output/img', [
			'src' => elgg_get_simplecache_url('logo.svg'),
		]),
	]);
	?>
</div>

<?= elgg_view('core/account/login_dropdown') ?>

<div class="elgg-nav-button">
	<span></span>
	<span></span>
	<span></span>
</div>

<div class="elgg-nav-collapse">
	<?= elgg_view_menu('site'); ?>
</div>
