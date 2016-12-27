<div class="elgg-module elgg-module-landing">
	<div class="elgg-head">
		<h3>Getting Started</h3>
	</div>
	<div class="elgg-body">
		<ul class="elgg-list">
			<li class="elgg-item">
				<div class="elgg-image-block">
					<div class="elgg-image">
						<svg class="icon">
						<use xlink:href="#box" />
						</svg>
					</div>
					<div class="elgg-body">
						<h3>
							<?php
							echo elgg_view('output/url', [
								'href' => 'http://learn.elgg.org/en/stable/intro/install.html',
								'text' => 'Install',
								'target' => '_blank',
							]);
							?>
						</h3>
						<p class="elgg-subtext">
							Learn about requirements and steps needed to install Elgg on your server.
						</p>
					</div>
				</div>
			</li>
			<li class="elgg-item">
				<div class="elgg-image-block">
					<div class="elgg-image">
						<svg class="icon">
						<use xlink:href="#workspace" />
						</svg>
					</div>
					<div class="elgg-body">
						<h3>
							<?php
							echo elgg_view('output/url', [
								'href' => 'showcase',
								'text' => 'Showcase',
							]);
							?>
						</h3>
						<p class="elgg-subtext">
							Get inspiration from other projects powered by Elgg.
						</p>
					</div>
				</div>
			</li>
			<li class="elgg-item">
				<div class="elgg-image-block">
					<div class="elgg-image">
						<svg class="icon">
						<use xlink:href="#puzzle" />
						</svg>
					</div>
					<div class="elgg-body">
						<h3>
							<?php
							echo elgg_view('output/url', [
								'href' => 'plugins',
								'text' => 'Plugins & Themes',
							]);
							?>
						</h3>
						<p class="elgg-subtext">
							Find the ideal plugins and themes in our repository of community sourced projects.
						</p>
					</div>
				</div>
			</li>

			<li class="elgg-item">
				<div class="elgg-image-block">
					<div class="elgg-image">
						<svg class="icon">
						<use xlink:href="#alphabet" />
						</svg>
					</div>
					<div class="elgg-body">
						<h3>
							<?php
							echo elgg_view('output/url', [
								'href' => 'http://learn.elgg.org/en/stable/tutorials/index.html',
								'text' => 'Hello, World!',
								'target' => '_blank',
							]);
							?>
						</h3>
						<p class="elgg-subtext">
							Our tutorials will guide you through the first steps of building an Elgg plugin.
						</p>
					</div>
				</div>
			</li>

			<li class="elgg-item">
				<div class="elgg-image-block">
					<div class="elgg-image">
						<svg class="icon">
						<use xlink:href="#newborn" />
						</svg>
					</div>
					<div class="elgg-body">
						<h3>
							<?php
							echo elgg_view('output/url', [
								'href' => 'groups/profile/834462/beginning-developers',
								'text' => 'Beginning Developers Group',
							]);
							?>
						</h3>
						<p class="elgg-subtext">
							Join our community group dedicated to helping get started with Elgg customizations and plugin development.
						</p>
					</div>
				</div>
			</li>

		</ul>
	</div>
</div>
