<div class="elgg-module elgg-module-landing">
	<div class="elgg-head">
		<h3>Giving Back</h3>
	</div>
	<div class="elgg-body">
		<ul class="elgg-list">
			<li class="elgg-item">
				<div class="elgg-image-block">
					<div class="elgg-image">
						<svg class="icon">
						<use xlink:href="#desert" />
						</svg>
					</div>
					<div class="elgg-body">
						<h3>
							<?php
							echo elgg_view('output/url', [
								'href' => 'about/supporters',
								'text' => 'Supporters Scheme',
							]);
							?>
						</h3>
						<p class="elgg-subtext">
							Are you an individual or organization who uses and likes Elgg? Consider becoming an official supporter of the Elgg project.
						</p>
					</div>
				</div>
			</li>
			<li class="elgg-item">
				<div class="elgg-image-block">
					<div class="elgg-image">
						<svg class="icon">
						<use xlink:href="#keyboard" />
						</svg>
					</div>
					<div class="elgg-body">
						<h3>
							<?php
							echo elgg_view('output/url', [
								'href' => 'http://learn.elgg.org/en/stable/contribute/index.html',
								'text' => 'Contribute',
								'target' => '_blank',
							]);
							?>
						</h3>
						<p class="elgg-subtext">
							Want to improve Elgg? Check out our contributor's guide.
						</p>
					</div>
				</div>
			</li>
			<li class="elgg-item">
				<div class="elgg-image-block">
					<div class="elgg-image">
						<svg class="icon">
						<use xlink:href="#seo" />
						</svg>
					</div>
					<div class="elgg-body">
						<h3>
							<?php
							if (elgg_is_active_plugin('registration_randomizer')) {
								$info = registration_randomizer_generate_token();
								$registration_url = 'register/' . $info['ts'] . '/' . $info['token'];
							} else {
								$registration_url = 'register';
							}
							echo elgg_view('output/url', [
								'href' => $registration_url,
								'text' => 'Join Our Community',
							]);
							?>
						</h3>
						<p class="elgg-subtext">
							Join our community and gain first-hand experience using Elgg.
						</p>
					</div>
				</div>
			</li>
		</ul>
	</div>
</div>
