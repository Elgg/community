<?php

use Elgg\Releases;

$devs = Releases::getReleases(Releases::$dev_branch);
if ($devs) {
	reset($devs);
	list($dev_version, $dev_date) = each($devs);
}

$stables = Releases::getReleases(Releases::$stable_branch);
reset($stables);
list($stable_version, $stable_date) = each($stables);
?>
<div class="elgg-hero">
	<h1>Introducing a powerful open source social networking engine</h1>
	<h2>Providing you with the core components needed to build a socially aware web application</h2>
	<div class="elgg-hero-calls">
		<?php
		echo elgg_view('output/url', [
			'href' => 'about/download',
			'text' => "Get Elgg $stable_version",
			'class' => 'elgg-hero-call',
		]);

		echo elgg_view('output/url', [
			'href' => 'http://learn.elgg.org',
			'text' => "Learn More",
			'class' => 'elgg-hero-call',
			'target' => '_blank',
		]);
		?>
	</div>
	<?php
	echo elgg_view('output/url', [
		'text' => elgg_view('output/img', [
			'src' => 'https://camo.githubusercontent.com/567c3a48d796e2fc06ea80409cc9dd82bf714434/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f6c6566745f6461726b626c75655f3132313632312e706e67',
			'alt' => 'Fork Elgg on Github',
		]),
		'href' => 'https://github.com/elgg/elgg',
		'class' => 'elgg-hero-github',
		'target' => '_blank',
	]);
	?>
</div>

<div class="elgg-landing-about">
	<div class="elgg-inner">
		<div class="elgg-image-block elgg-tagline">
			<div class="elgg-image-alt">
				<?php
				echo elgg_view('output/img', [
					'src' => elgg_get_simplecache_url('logo-full.svg'),
					'width' => 200,
					'alt' => 'Elgg',
				]);
				?>
			</div>
			<div class="elgg-body ">
				Elgg is an award-winning open source social networking engine that provides a robust framework on which to build all kinds of social environments, from a campus wide social network for your university, school or college or an internal collaborative platform for your organization through to a brand-building communications tool for your company and its clients.
			</div>
		</div>

		<div class="elgg-landing-modules">
			<?= elgg_view('community/pages/sprites') ?>
			<?= elgg_view('community/pages/index/beginners') ?>
			<?= elgg_view('community/pages/index/developers') ?>
			<?= elgg_view('community/pages/index/services') ?>
			<?= elgg_view('community/pages/index/contribute') ?>
		</div>
	</div>
</div>