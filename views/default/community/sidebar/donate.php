<?php

if (!elgg_in_context('about')) {
	return;
}

$title = 'Supporter Scheme';

ob_start();
?>

<p>
	Are you an individual or organization who uses and likes Elgg? Consider becoming an official supporter of the Elgg project.
	With only $50 per year for individuals or $150 per year for organizations, you can help the Elgg project. 
	<?=
	elgg_view('output/url', [
		'href' => 'about/supporters',
		'text' => 'Learn more >>',
	]);
	?>
</p>
<form class="elgg-supporter-scheme-form" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="hosted_button_id" value="S2HY9L6HZ2Z3A">
	<input type="hidden" name="on0" value="">

	<?php
	echo elgg_view_input('select', [
		'name' => 'os0',
		'options_values' => [
			'Individual' => 'Individual: $50.00USD - yearly',
			'Organization' => 'Organization : $150.00USD - yearly',
		],
	]);
	?>
	<input type="hidden" name="currency_code" value="USD">
	<?php
	echo elgg_view_input('submit', [
		'value' => 'Subscribe',
	]);
	?>
</form>
<?php
$module = ob_get_clean();

echo elgg_view_module('info', $title, $module);
