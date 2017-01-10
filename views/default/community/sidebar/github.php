<?php
if (!elgg_in_context('about')) {
	return;
}
?>

<div class="elgg-module elgg-module-info">
	<div class="elgg-head">
		<h3>Elgg on Github</h3>
	</div>
	<div class="elgg-body">
		<p class="elgg-output">You can follow the latest work in progress or contribute via GitHub.</p>
		<?php
		echo elgg_view('output/url', [
			'href' => 'https://github.com/Elgg/Elgg',
			'text' => elgg_view('output/img', [
				'src' => elgg_get_simplecache_url('images/GitHub_Logo.png'),
				'alt' => 'Elgg on Github',
			]),
			'is_trusted' => true,
		]);
		?>
	</div>
</div>