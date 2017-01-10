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
	<div class="elgg-inner">
		<h1><span>Introducing a powerful open source social networking engine</span></h1>
		<h2><span>Providing you with the core components needed to build a socially aware web application</span></h2>
		<div class="elgg-hero-calls">
			<?php
			echo elgg_view('output/url', [
				'href' => 'about/download',
				'text' => elgg_view_icon('download') . "Get Elgg $stable_version",
				'class' => 'elgg-hero-call',
			]);

			echo elgg_view('output/url', [
				'href' => 'http://learn.elgg.org',
				'text' => elgg_view_icon('info-circle') . "Learn More",
				'class' => 'elgg-hero-call',
				'target' => '_blank',
			]);

			echo elgg_view('output/url', [
				'href' => 'http://github.com/elgg/elgg',
				'text' => elgg_view_icon('github') . "Open Source",
				'class' => 'elgg-hero-call elgg-hero-github',
				'target' => '_blank',
			]);
			?>
		</div>
	</div>
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