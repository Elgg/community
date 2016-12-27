<div class="elgg-module elgg-module-landing">
	<div class="elgg-head">
		<h3>Developer Center</h3>
	</div>
	<div class="elgg-body">
		<ul class="elgg-list">
			<li class="elgg-item">
				<div class="elgg-image-block">
					<div class="elgg-image">
						<svg class="icon">
						<use xlink:href="#file" />
						</svg>
					</div>
					<div class="elgg-body">
						<h3>
							<?php
							echo elgg_view('output/url', [
								'href' => 'http://learn.elgg.org/',
								'text' => 'Documentation',
								'target' => '_blank',
							]);
							?>
						</h3>
						<p class="elgg-subtext">
							Find detailed information about Elgg's architecture, approach and features.
						</p>
					</div>
				</div>
			</li>
			<li class="elgg-item">
				<div class="elgg-image-block">
					<div class="elgg-image">
						<svg class="icon">
						<use xlink:href="#business" />
						</svg>
					</div>
					<div class="elgg-body">
						<h3>
							<?php
							echo elgg_view('output/url', [
								'href' => 'http://reference.elgg.org/2.x/annotated.html',
								'text' => 'API Reference',
								'target' => '_blank',
							]);
							?>
						</h3>
						<p class="elgg-subtext">
							This is a handy resource to search and find out what functions exist within Elgg.
						</p>
					</div>
				</div>
			</li>
			<li class="elgg-item">
				<div class="elgg-image-block">
					<div class="elgg-image">
						<svg class="icon">
						<use xlink:href="#github-logo" />
						</svg>
					</div>
					<div class="elgg-body">
						<h3>
							<?php
							echo elgg_view('output/url', [
								'href' => 'https://github.com/elgg/elgg',
								'text' => 'Source Code',
								'target' => '_blank',
							]);
							?>
						</h3>
						<p class="elgg-subtext">
							Elgg is an open source framework hosted and developed on Github.
						</p>
					</div>
				</div>
			</li>
			<li class="elgg-item">
				<div class="elgg-image-block">
					<div class="elgg-image">
						<svg class="icon">
						<use xlink:href="#ladybug" />
						</svg>
					</div>
					<div class="elgg-body">
						<h3>
							<?php
							echo elgg_view('output/url', [
								'href' => 'https://github.com/elgg/elgg/issues',
								'text' => 'Bug Tracker',
								'target' => '_blank',
							]);
							?>
						</h3>
						<p class="elgg-subtext">
							This is Elgg's bug tracker, if you find bugs or have patches for existing bugs then head on over and get involved.
						</p>
					</div>
				</div>
			</li>

			<li class="elgg-item">
				<div class="elgg-image-block">
					<div class="elgg-image">
						<svg class="icon">
						<use xlink:href="#light-bulb" />
						</svg>
					</div>
					<div class="elgg-body">
						<h3>
							<?php
							echo elgg_view('output/url', [
								'href' => 'groups/profile/211069/feedback-and-planning',
								'text' => 'Feedback & Planning',
							]);
							?>
						</h3>
						<p class="elgg-subtext">
							Discussions about the past, present, and future of Elgg.
						</p>
					</div>
				</div>
			</li>

		</ul>
	</div>
</div>
