<p class="elgg-output">
	Are you an individual or organization who uses and likes Elgg? Consider becoming an official supporter of the Elgg project.
	With only $50 per year for individuals or $150 per year for organizations, you can help the Elgg project.
</p>
<p class="elgg-output">
	Elgg supporters are listed below unless requested not to be. If you would like to become an Elgg supporter, please read the <a href="#disclaimer">disclaimer</a>,
	subscribe via PayPal,
	and send an email to <a	href="mailto:info@elgg.org">info@elgg.org</a> confirming the date you subscribed and the relevant details for your level
	(these can be found on the tables below). Once all the details have been received, we will add you to the appropriate list. Thanks for your support!
</p>
<p class="elgg-output">
	All funds raised via the Elgg supporters network go directly into core Elgg development and  provision (elgg.org/svn/trac etc).
	It is a great way to help with Elgg development!
</p>

<p class="elgg-output">
	Supporters are able to put this official logo on their site if they wish:
<div>
	<?=
	elgg_view('output/img', [
		'src' => elgg_get_simplecache_url('images/elgg-supporters.gif'),
		'alt' => 'Elgg Supporter',
	]);
	?>
</div>
</p>

<?php
$organizations = [
	[
		'name' => 'Irene Ilina',
		'organization' => 'SkaDate Dating Software LLC',
		'url' => 'http://www.skadate.com',
	],
	[
		'name' => 'Fabrice Collette',
		'organization' => 'Mélèze Conseil',
		'url' => 'http://www.meleze-conseil.com',
		'username' => 'fabcol',
	],
	[
		'name' => 'Paul Stewart',
		'organization' => 'Arck Interactive LLC',
		'url' => 'http://arckinteractive.com',
		'username' => 'arckinteractive',
	],
	[
		'name' => 'Caroline Meeks',
		'organization' => 'Solution Grove',
		'url' => 'http://www.solutiongrove.com/xowiki/elgg',
	],
	[
		'name' => 'Jeroen Dalsem',
		'organization' => 'ColdTrick IT Solutions',
		'url' => 'http://www.coldtrick.com',
		'username' => 'jdalsem',
	],
	[
		'name' => 'Tom Voorneveld',
		'url' => 'http://www.lorinthe.com',
		'organization' => Lorinthe,
	], [
		'name' => 'Mike Kasper',
		'url' => 'http://myfreepersonals.com/',
		'organization' => 'My Free Personals',
		'username' => 'topdog08',
	],
	[
		'name' => 'Andrew Boon',
		'url' => 'http://www.boonex.com',
		'organization' => 'BoonEx Community Software',
	],
	[
		'name' => 'Veronika Cardes',
		'url' => 'http://www.dating-service.com',
		'nofollow' => true,
		'organization' => 'Dating Service.com',
	],
	[
		'name' => 'Taka Fujita',
		'organization' => 'Kototoy Factory Co., Ltd.',
		'url' => 'http://kototoy.jp',
		'username' => 'teilnehmen',
	],
	[
		'name' => 'Jon Dron',
		'organization' => 'Athabasca University',
		'url' => 'http://athabascau.ca',
	],
	[
		'name' => 'Teodor Nica',
		'organization' => 'VideoWhisper Webcam Software',
		'url' => '	http://www.videowhisper.com',
		'username' => 'videowhisper',
	],
	[
		'name' => 'Aron West',
		'organization' => 'Compassion And Peace Association of Canada (CAPAOC)',
		'url' => '	http://www.capaoc.org/',
		'username' => 'aronw9376',
	],
	[
		'name' => 'Michele & Gianni',
		'organization' => 'Social Business World',
		'url' => 'http://www.socialbusinessworld.org/',
		'username' => 'michele',
	],
	[
		'name' => 'HRDNZ (Moodle Partner)',
		'organization' => 'Human Resource Development International Ltd',
		'url' => 'http://www.hrdnz.com',
		'username' => 'stuartrmealor',
	],
	[
		'name' => 'Christophe Lamm',
		'organization' => 'Ligne Bleue Cyber',
		'url' => 'http://www.ligne-bleue-cyber.com/services/creation_de_sites_web.html',
		'username' => 'clamm',
	],
	[
		'name' => 'Elena Ganenkova',
		'organization' => 'JetBrains',
		'url' => 'http://www.jetbrains.com/',
	],
	[
		'name' => 'Christian Bernert',
		'organization' => 'Sogln Ltd.',
		'url' => 'http://www.sogln.com/',
		'username' => 'sogln',
	],
	[
		'organization' => 'MilesWeb Internet Services Pvt Ltd.',
		'name' => 'Chetan Mahale',
		'url' => 'https://www.milesweb.com/web-hosting.php'
	]
];

usort($organizations, function($a, $b) {
	return strcmp($a['organization'], $b['organization']);
});

$persons = [
	[
		'name' => 'Ben Werdmuller',
		'url' => 'http://benwerd.com/',
		'username' => 'bwerdmuller',
	],
	[
		'name' => 'Marcus Povey',
		'url' => 'http://www.marcus-povey.co.uk/',
		'username' => 'marcus',
	],
	[
		'name' => 'Per Jensen',
		'url' => 'http://www.perjensen-online.dk/',
		'username' => 'gillie',
	],
	[
		'name' => 'Tarun Jangra',
		'url' => 'http://www.pluginlotto.com/',
		'username' => 'izap',
	],
	[
		'name' => 'Shyam Somanadh',
		'url' => 'http://frontiernxt.com/',
		'username' => 'codelust',
		'nofollow' => true,
	],
	[
		'name' => 'John L. Spears',
		'url' => 'http://www.clothingric.com/',
		'username' => '',
		'nofollow' => true,
	],
	[
		'name' => 'Xavier Vaucois',
		'url' => 'http://www.fairbusinessdeal.com/fbd',
		'username' => '',
		'nofollow' => true,
	],
	[
		'name' => 'Allan Moris',
		'url' => 'https://www.emucoupon.com/',
		'username' => '',
		'nofollow' => true,
	],
];

usort($persons, function($a, $b) {
	return strcmp($a['name'], $b['name']);
});
?>
<div class="elgg-module elgg-module-info">
	<div class="elgg-head">
		<h3>Organization Supporters</h3>
	</div>
	<div class="elgg-body">
		<ul class="elgg-list">
			<?php
			foreach ($organizations as $organization) {
				?>
				<li class="elgg-item">
					<h3><?= $organization['organization'] ?></h3>
					<div class="elgg-subtext">
						<?= $organization['name'] ?>
					</div>
					<div class="elgg-subtext">
						<?php
						echo elgg_view('output/url', [
							'href' => $organization['url'],
							'is_trusted' => !elgg_extract('nofollow', $organization, false),
							'target' => '_blank',
						]);
						?>
					</div>

					<?php
					$username = elgg_extract('username', $organization);
					if (!$username) {
						continue;
					}
					$user = get_user_by_username($username);
					if ($user) {
						$icon = elgg_view_entity_icon($user, 'topbar');
						$link = elgg_view('output/url', [
							'href' => $user->getURL(),
							'text' => $user->username,
						]);
						echo elgg_view_image_block($icon, $link, [
							'class' => 'elgg-subtext',
						]);
					}
					?>
				</li>
				<?php
			}
			?>

		</ul>
	</div>
</div>

<div class="elgg-module elgg-module-info">
	<div class="elgg-head">
		<h3>Individual Supporters</h3>
	</div>
	<div class="elgg-body">
		<ul class="elgg-list">
			<?php
			foreach ($persons as $person) {
				?>
				<li class="elgg-item">
					<h3><?= $person['name'] ?></h3>
					<div class="elgg-subtext">
						<?php
						echo elgg_view('output/url', [
							'href' => $person['url'],
							'is_trusted' => !elgg_extract('nofollow', $person, false),
							'target' => '_blank',
						]);
						?>
					</div>

					<?php
					$username = elgg_extract('username', $person);
					if (!$username) {
						continue;
					}
					$user = get_user_by_username($username);
					if ($user) {
						$icon = elgg_view_entity_icon($user, 'topbar');
						$link = elgg_view('output/url', [
							'href' => $user->getURL(),
							'text' => $user->username,
						]);
						echo elgg_view_image_block($icon, $link, [
							'class' => 'elgg-subtext',
						]);
					}
					?>
				</li>
				<?php
			}
			?>
		</ul>
	</div>
</div>

<div id="disclaimer" class="elgg-box-error">
	<p class="elgg-output"><strong>Disclaimer</strong></p>
	<p class="elgg-output">
		We operate a no refund policy on supporter subscriptions. If you would like to withdraw your support, go to
		PayPal and cancel your subscription. You will not be billed the following year.</p>
	<p class="elgg-output">
		Being an Elgg Supporter does not give an individual or organization the right to impersonate, trade as or
		imply they are connected to the Elgg project. They can however mention that they support the Elgg
		project.
	</p>
	<p class="elgg-output">
		If you have any questions about this disclaimer email <a href="mailto:info@elgg.org">info@elgg.org</a>
	</p>
	<p class="elgg-output">
		<small>We reserve the right to remove or refuse a listing without any prior warning at our complete
			discretion. There is no refund policy.
		</small>
	</p>
	<p class="elgg-output">
		<small>If there is no obvious use of Elgg, your site will be linked to with "nofollow" set.</small>
	</p>
</div>
