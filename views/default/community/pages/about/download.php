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

$lts_releases = Releases::getReleases(Releases::$lts_branch);
reset($lts_releases);
list($lts_version, $lts_date) = each($lts_releases);
?>
<div class="elgg-box elgg-state-notice">
	The simplest way to install and maintain your Elgg project is via Composer.
	Please check our <b><a href="http://learn.elgg.org/en/stable/intro/install.html" tartet="_blank">Installation</a></b> docs for instructions.
</div>

<div class="elgg-module elgg-module-info">
	<div class="elgg-head">
		<h3>License</h3>
	</div>
	<div class="elgg-body">
		<p class="elgg-output">Elgg is available under GPL Version 2, with a portion of the code alternately available under MIT.
			<a href="http://learn.elgg.org/en/latest/intro/license.html">More info</a>.</p>
		<p class="elgg-output">You may
			<a href="mailto:info@elgg.org">request an MIT release</a> (please specify version) or create one easily: After executing
			<code>composer install</code>, delete the contents of the <code>/mod</code> directory.</p>
	</div>
</div>

<?php
if ($devs) {
	$content = "<p class=\"elgg-output\">Elgg $dev_version is available for early testers. <strong>Do not use this version in production.</strong><br />
		Please report all bugs to <a href=\"https://github.com/Elgg/Elgg/issues\">GitHub</a></p>";

	$button = elgg_view('output/url', [
		'text' => "Download $dev_version",
		'href' => "about/getelgg?forward=elgg-{$dev_version}.zip",
		'class' => 'elgg-button elgg-button-submit',
	]);


	$content = elgg_format_element('div', [
		'class' => 'elgg-output',
			], $content);


	echo elgg_view_module('info', "Development Release - $dev_date", $content, [
		'footer' => $button,
	]);
}

$content = "<p class=\"elgg-output\">Elgg $stable_version (<a href=\"https://github.com/Elgg/Elgg/blob/$stable_version/CHANGELOG.md\">changelog</a>)
	is the latest and recommended version of Elgg.</p>";

$content = elgg_format_element('div', [
	'class' => 'elgg-output',
		], $content);

$button = elgg_view('output/url', [
	'text' => "Download $stable_version",
	'href' => "about/getelgg?forward=elgg-{$stable_version}.zip",
	'class' => 'elgg-button elgg-button-submit',
		]);

echo elgg_view_module('info', "Stable Release - $stable_date", $content, [
	'footer' => $button,
]);


$lts_branch = Releases::$lts_branch;

$content = "<p class=\"elgg-output\">Elgg $lts_version (<a href=\"https://github.com/Elgg/Elgg/blob/$lts_version/CHANGELOG.md\">changelog</a>) is the recommended release if using Elgg $lts_branch</p>";

$content = elgg_format_element('div', [
	'class' => 'elgg-output',
		], $content);

$button = elgg_view('output/url', [
	'text' => "Download $lts_version",
	'href' => "about/getelgg?forward=elgg-{$lts_version}.zip",
	'class' => 'elgg-button elgg-button-submit',
]);

echo elgg_view_module('info', "LTS Release - $lts_date", $content, [
	'footer' => $button,
]);

$release_li = function ($version, $date, $in_git = true) {
	$links = [];

	$links[] = elgg_view('output/url', [
		'href' => "about/getelgg?forward=elgg-{$version}.zip",
		'text' => 'zip',
	]);

	if ($in_git) {
		$links[] = elgg_view('output/url', [
			'href' => "https://github.com/Elgg/Elgg/tree/$version",
			'text' => 'source',
			'is_trusted' => true,
		]);
	}

	$links = implode(', ', $links);

	return elgg_format_element('li', [
		'class' => 'elgg-item pam',
	], "<span><b>$version</b> ($links) - released $date</span>");
};
?>

<div id="previous"></div>

<div class="elgg-module elgg-module-info">
	<div class="elgg-head">
		<h3>Previous releases</h3>
	</div>
	<div class="elgg-body">
		<ul class="elgg-list">
			<?php
			$releases = Releases::getReleases(Releases::$stable_branch, false);
			array_shift($releases);
			foreach ($releases as $version => $date) {
				echo $release_li($version, $date);
			}

			$releases = Releases::getReleases(Releases::$lts_branch, false);
			array_shift($releases);
			foreach ($releases as $version => $date) {
				echo $release_li($version, $date);
			}
			?>
		</ul>
	</div>
</div>

<div class="elgg-module elgg-module-info">
	<div class="elgg-head">
		<h3>Security releases</h3>
	</div>
	<div class="elgg-body">
		<?php
		$branches = Releases::$security_branches;
		$last_branch = array_pop($branches);
		?>
		<p class="elgg-output"><b>Elgg <?= implode(', ', $branches) ?>, and <?= $last_branch ?> are receiving only security updates.</b></p>
		<ul class="elgg-list">
			<?php
			foreach (Releases::$security_branches as $branch) {
				$releases = Releases::getReleases($branch);
				foreach ($releases as $version => $date) {
					echo $release_li($version, $date);
				}
			}
			?>
		</ul>
	</div>
</div>

<div class="elgg-module elgg-module-info">
	<div class="elgg-head">
		<h3>Unsupported releases</h3>
	</div>
	<div class="elgg-body">
		<p class="elgg-output"><b>These versions of Elgg are no longer supported:</b></p>
		<ul class="elgg-list">
			<?php
			foreach (Releases::getUnsupportedReleases() as $version => $date) {
				echo $release_li($version, $date, !in_array($version, Releases::$untagged_releases));
			}
			?>
		</ul>
	</div>
</div>
