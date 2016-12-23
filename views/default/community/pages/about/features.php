<?php ?>

<div class="elgg-about-award">
	<?php
	echo elgg_view('output/img', [
		'src' => elgg_get_simplecache_url('images/bossie.gif'),
		'alt' => 'Bossie Award',
	]);
	?>
	<p>Elgg was voted best open source social networking platform in 2008</p>
</div>

<p class="elgg-about">Elgg is an award-winning open source social networking engine that provides a robust framework on which to build all kinds of social environments, from a campus wide social network for your university, school or college or an internal collaborative platform for your organization through to a brand-building communications tool for your company and its clients.</p>


<ul class="elgg-about-features">
	<li><strong>Well-documented core API</strong> that allows developers to kick start their new project with a simple learning curve</li>
	<li><strong>Composer</strong> is the package manager of choice that greatly simplifes installation and maintenance of Elgg core and plugins</li>
	<li><strong>Flexible system of hooks and events</strong> that allows plugins to extend and modify most aspects of application's functionality and behavior</li>
	<li><strong>Extendable system of views</strong> that allows plugins to collaborate on application's presentation layer and built out complex custom themes</li>
	<li><strong>Cacheable system of static assets</strong> that allows themes and plugins to serve images, stylesheets, fonts and scripts bypassing the engine</li>
	<li><strong>User authentication</strong> is powered by pluggable auth modules, which allow applications to implement custom authentication protocols</li>
	<li><strong>Security</strong> is ensured by built-in anti CSRF validation, strict XSS filters, HMAC signatures, latest cryptographic approaches to password hashing</li>
	<li><strong>Client-side API</strong> powered by asynchronous JavaScript modules via RequireJS and a build-in Ajax service for easy communication with the server</li>
	<li><strong>Flexible entity system</strong> that allows applications to prototype new types of content and user interactions</li>
	<li><strong>Opinionated data model</strong> with a consolidated API layer that allows the developers to easily interface with the database</li>
	<li><strong>Access control system</strong> that allows applications to build granular content access policies, as well as create private networks and intranets</li>
	<li><strong>Groups</strong> - out of the box support for user groups</li>
	<li><strong>File storage</strong> powered by flexible API that allows plugins to store user-generated files and serve/stream them without booting the engine</li>
	<li><strong>Notifications service</strong> that allows applications to subscribe users to on-site and email notifications and implement integrations with other their-party services</li>
	<li><strong>RPC web services</strong> that can be used for complex integrations with external applications and mobile clients</li>
	<li><strong>Internationalization</strong> and localization of Elgg applications is simple and can be integrated with third-party services such as Transifex</li>
	<li><strong>Elgg community</strong> that can help with any arising issues and hosts a repository of <strong>1000+ open source plugins</strong></li>
</ul>