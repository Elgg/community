<?php
$services = array(
	array(
		'name' => 'Keetup Development',
		'url' => 'http://www.keetup.com/elgg-services',
		'profile_url' => 'https://community.elgg.org/profile/pedroprez',
		'blurb' => 'We are professional Elgg developers specializing in plugins, themes and social networking advice. We also advise companies on Elgg implementations.',
		'icon_filename' => 'keetup.png'
	),
	array(
		'name' => 'Arck Interactive',
		'url' => 'http://www.arckinteractive.com/',
		'profile_url' => 'https://community.elgg.org/profile/arckinteractive',
		'blurb' => 'We are a Portland-based web development agency focused on developing custom social networks, intranets and other applications using Elgg.',
		'icon_filename' => 'arck.jpg'
	),
);

shuffle($services);
?>

<div class="elgg-module elgg-module-landing">
	<div class="elgg-head">
		<h3>Elgg Services</h3>
	</div>
	<div class="elgg-body">
		<ul class="elgg-list">
			<?php
			?>
			<li class="elgg-item">
				<div class="clearfix">
					<div class="elgg-body">
						<?=
						elgg_view('output/url', [
							'href' => $service['url'],
							'text' => elgg_view('output/img', [
								'src' => elgg_get_simplecache_url("images/tn_logo.png"),
								'alt' => 'Thematic Networks',
							]),
							'target' => '_blank',
							'class' => 'float-alt pam',
							'img_class' => 'elgg-photo',
						]);
						?>
						<a href="http://thematic.net" target="_blank">Thematic Networks</a> creates socially-enabled web platforms with enterprise tools that help businesses to engage with their communities and generate revenue from published digital content. Our solutions power all sorts of applications, ranging from Software-as-a-Service networks to customized enterprise social networks, corporate e-learning platforms and social marketplaces with App Stores.
						<br />
						Thematic Networks is a founding member and proud supporter of the Elgg Foundation.
						<br /><br />
						Contact: <a href="mailto:services@thematic.net">services@thematic.net</a>
					</div>
				</div>
			</li>
		</ul>
	</div>
</div>

<div class="elgg-module elgg-module-landing">
	<div class="elgg-head">
		<h3>Listings</h3>
	</div>
	<div class="elgg-body">
		<ul class="elgg-list">
			<?php
			foreach ($services as $service) {
				?>
				<li class="elgg-item">
					<div class="elgg-image-block">
						<div class="elgg-image">
							<?=
							elgg_view('output/url', [
								'href' => $service['url'],
								'text' => elgg_view('output/img', [
									'src' => elgg_get_simplecache_url("images/services/{$service['icon_filename']}"),
									'alt' => $service['name'],
								]),
							]);
							?>
						</div>
						<div class="elgg-body">
							<h3><?= $service['name'] ?></h3>
							<p class="elgg-subtext"><?= $service['blurb'] ?></p>
							<p>
								<a href="<?= $service['url'] ?>"><?= $service['name'] . ' website' ?></a> |
								<a href="<?= $service['profile_url'] ?>"><?= $service['name'] . ' Elgg community profile' ?></a>
							</p>
						</div>
					</div>
				</li>
				<?php
			}
			?>

			<div class="elgg-box-error">
				The service listing feature is currently on hold while we establish the Elgg Foundation. Watch this space and the <a href="blog">Elgg Blog</a> for more information!
				<!--
				<p>The following is a list of companies who offer various Elgg services which is provided to help Elgg users looking for services. Curverider Ltd does not endorse the companies listed and they are in no way affiliated with Curverider Ltd unless stated as an official Elgg Partner, although they do help support core Elgg development through a <b>$150 per 30 day</b> listing fee. All the money raised via these listings goes straight into core Elgg development!</p>
				<p>We constantly monitor companies listed here to help create and foster good options for those requiring Elgg services. If you encounter issues with one of the providers listed here, please get in touch with us. If you are going to get in touch, please make sure you provide adequate detail regarding the issues you have had.</p>
				<p>If you represent a company providing Elgg services and would like to be listed, and in turn help with core development, <a href="mailto:info@elgg.com">please get in touch</a> <small>(info@elgg.com)</small>. At this time, we can only use PayPal, so payment for a listing will come via a PayPal invoice.</p>
				<p><small>We reserve the right to remove or refuse a listing without any prior warning at our complete discretion. There is no refund policy.</small></p>
				-->
			</div>
	</div>
</div>