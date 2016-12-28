<?php

/**
 * Static pages of the Elgg community
 */
elgg_register_event_handler('init', 'system', 'community_init');
elgg_register_plugin_hook_handler('route:rewrite', 'all', 'community_handle_legacy_pages');

/**
 * Init
 * @return void
 */
function community_init() {

	elgg_extend_view('elgg.css', 'community.css');

	elgg_register_css('fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600|Roboto:400,600&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese');
	elgg_load_css('fonts');

	elgg_unregister_plugin_hook_handler('prepare', 'menu:site', '_elgg_site_menu_setup');
	elgg_register_event_handler('pagesetup', 'system', 'community_pagesetup', 1000);
	elgg_register_plugin_hook_handler('register', 'menu:site', 'community_setup_site_menu', 1000);

	//remove "Powered by Elgg" link
	elgg_unregister_menu_item('footer', 'powered');

	elgg_register_plugin_hook_handler('forward', 'all', 'community_forward');

	elgg_register_plugin_hook_handler('action', 'login', 'community_login_action');

	elgg_register_page_handler('about', 'community_about_page_handler');
	elgg_register_plugin_hook_handler('register', 'menu:page', 'community_setup_page_menu');

	elgg_extend_view('page/elements/sidebar', 'community/sidebar/donate', 999);
}

/**
 * Setup main site menu
 *
 * @param string         $hook   "register"
 * @param string         $type   "menu:site"
 * @param ElggMenuItem[] $return Menu
 * @param array          $params Hook params
 * @return ElggMenuItem[]
 */
function community_setup_site_menu($hook, $type, $return, $params) {

	$original_items = $return;

	$return = [];
	$return[] = ElggMenuItem::factory([
				'name' => 'about',
				'text' => 'About',
				'href' => 'about',
				'priority' => 100,
	]);

	$about = community_prepare_about_menu_items();
	foreach ($about as $item) {
		$item->setParentName('about');
		$return[] = $item;
	}

	$return[] = ElggMenuItem::factory([
				'name' => 'blog',
				'text' => 'Blog',
				'href' => 'blog',
				'priority' => 150,
	]);

	$return[] = ElggMenuItem::factory([
				'name' => 'community',
				'text' => 'Community',
				'href' => 'activity',
				'priority' => 300,
	]);

	$priorities = [
		'blog' => false,
		'bookmarks' => false,
		'members' => false,
		'pages' => false,
		'themes' => false,
		'plugins' => 400,
		'showcase' => 300,
		'groups' => 600,
	];

	foreach ($original_items as $key => $item) {
		$name = $item->getName();
		$priority = elgg_extract($name, $priorities);
		if ($priority === false) {
			continue;
		} else if ($priority) {
			$item->setPriority($priority);
		} else {
			$item->setParentName('community');
		}
		$return[] = $item;
	}

	if (!elgg_is_logged_in()) {
		if (elgg_is_active_plugin('registration_randomizer')) {
			$info = registration_randomizer_generate_token();
			$registration_url = 'register/' . $info['ts'] . '/' . $info['token'];
		} else {
			$registration_url = 'register';
		}

		$return[] = ElggMenuItem::factory([
					'name' => 'register',
					'text' => 'Register',
					'href' => $registration_url,
					'priority' => 2,
					'parent_name' => 'community',
		]);
	}

	$groups = [
		1161181 => 'Performance & Scalability',
		834462 => 'Beginning Developers',
		211069 => 'Feedback & Planning',
		179063 => 'Technical Support',
		75603 => 'Professional Services',
		11 => 'Theme Development',
		7 => 'Plugin Development',
		15815 => 'General Discussions',
	];

	asort($groups);

	foreach ($groups as $guid => $group) {
		$return[] = ElggMenuItem::factory([
					'name' => "groups:$guid",
					'text' => $group,
					'href' => "groups/profile/$guid",
					'parent_name' => 'groups',
		]);
	}

	$return[] = ElggMenuItem::factory([
				'name' => 'download',
				'text' => 'Download',
				'href' => 'about/download',
				'priority' => 900,
	]);

	return $return;
}

/**
 * Prepare about menu items
 * @return ElggMenuItem[]
 */
function community_prepare_about_menu_items() {

	$return = [];

	$pages = [
		'features',
		'documentation',
		'supporters',
		'license',
		'domain_policy',
		'services',
		'hosting',
		'foundation',
		'team',
	];

	$priority = 100;
	foreach ($pages as $page) {
		$return[] = ElggMenuItem::factory([
					'name' => "about:$page",
					'text' => elgg_echo("community:about:$page"),
					'href' => "about/$page",
					'priority' => $priority,
		]);
		$priority += 50;
	}

	return $return;
}

function community_setup_page_menu($hook, $type, $return, $params) {

	if (!elgg_in_context('about')) {
		return;
	}

	$about = community_prepare_about_menu_items();
	foreach ($about as $item) {
		$return[] = $item;
	}

	return $return;
}

function community_login_action() {
	if (empty($_SERVER['HTTP_REFERER'])) {
		return;
	}
	if ($_SERVER['HTTP_REFERER'] === elgg_get_site_url()) {
		elgg_get_session()->set('last_forward_from', ELGG_COMMUNITY_THEME_SUPPORT_URL);
	}
}

function community_forward($h, $t, $v, $p) {
	// odds are we want the Community URL instead of the home page
	$site = elgg_get_site_url();
	if ($v === $site) {
		return "{$site}activity";
	}
}

/**
 * Setup menu items
 */
function community_pagesetup() {

	// Extend footer with report content link
	if (elgg_is_logged_in()) {
		elgg_unregister_menu_item('footer', 'report_this');

		$href = "javascript:elgg.forward('reportedcontent/add'";
		$href .= "+'?address='+encodeURIComponent(location.href)";
		$href .= "+'&title='+encodeURIComponent(document.title));";

		elgg_register_menu_item('extras', array(
			'name' => 'report_this',
			'href' => $href,
			'title' => elgg_echo('reportedcontent:this:tooltip'),
			'text' => elgg_view_icon('report-this'),
		));
	}

	// footer navigation
	$items = array(
		'home' => array(elgg_echo('comminity:home'), 'elgg.org'),
		'community' => array(elgg_echo('comminity:community'), 'elgg.org/activity'),
		'blog' => array(elgg_echo('comminity:blog'), 'blog.elgg.org'),
		'hosting' => array(elgg_echo('comminity:hosting'), 'elgg.org/about/hosting'),
		'services' => array(elgg_echo('comminity:services'), 'elgg.org/about/services'),
		'docs' => array(elgg_echo('comminity:learn'), 'learn.elgg.org/'),
		'download' => array(elgg_echo('comminity:download'), 'elgg.org/about/download'),
	);

	foreach ($items as $id => $info) {
		list($text, $href) = $info;
		$item = new ElggMenuItem($id, $text, $href);
		elgg_register_menu_item('footer_navigation', $item);
	}

	elgg_register_menu_item('footer', array(
		'name' => 'policy',
		'href' => "http://elgg.org/about/domain_policy",
		'text' => elgg_echo('comminity:policy'),
		'section' => 'default',
	));
}

elgg_register_event_handler('init', 'system', function() {
	// Only admins can post blogs
	elgg_register_plugin_hook_handler('container_permissions_check', 'object', function($hook, $type, $return, $params) {
		if ($params['subtype'] == 'blog') {
			if ($params['user'] instanceof ElggUser) {
				return $params['user']->isAdmin();
			}
			
			return false;
		}
	});

	// Support for some very old URLs
	elgg_register_page_handler('requirements.php', function() {
		http_response_code(301);
		forward('http://learn.elgg.org/en/latest/intro/install.html#requirements');
	});

	elgg_register_page_handler('external.php', function() {
		http_response_code(301);
		forward('/plugins');
	});

	elgg_register_page_handler('license.php', function() {
		http_response_code(301);
		forward('http://learn.elgg.org/en/latest/intro/license.html');
	});

	// TODO(ewinslow): Patch core to make this css registration boilerplate unnecessary
	elgg_register_css('widgets/messageboard/content', elgg_get_simplecache_url('widgets/messageboard/content.css'));

	elgg_extend_view('elgg.css', 'cke.css');

	if (function_exists("elgg_ws_unexpose_function")) {
		elgg_ws_unexpose_function('auth.gettoken');
	}

	// Support for syntax-highlighting
	elgg_extend_view('elgg.css', 'pre.css');
	elgg_extend_view('elgg/wysiwyg.css', 'pre.css');

	// Allows elements like <code class="language-php">...</code>
	// These are generated by the ckeditor "codesnippet" plugin
	// NB: Won't have any effect until https://github.com/Elgg/Elgg/pull/8805 lands.
	elgg_register_plugin_hook_handler('spec', 'htmlawed', function($hook, $type, $result, $params) {
		return "$result;code=class(oneof=language-php|language-css|language-javascript)";
	});

	// Load the JS and CSS to get syntax highlighting for rendered HTML
	elgg_require_js('hljs-init');

	// filter new friendships and new bookmarks from river
	elgg_register_plugin_hook_handler('creating', 'river', function($hook, $type, $item) {
		$view = $item['view'];
		switch ($view) {
			case 'river/relationship/friend/create':
			case 'river/object/bookmarks/create':
				return false;
				break;
		}
	});

	// Delete messages from a user who is being deleted
	// TODO(ewinslow): Move to Elgg core??
	elgg_register_event_handler('delete', 'user', function($event, $type, $user) {

		// make sure we delete them all
		$entity_disable_override = access_get_show_hidden_status();
		access_show_hidden_entities(true);

		$messages = elgg_get_entities_from_metadata(array(
			'type' => 'object',
			'subtype' => 'messages',
			'metadata_name' => 'fromId',
			'metadata_value' => $user->getGUID(),
			'limit' => 0,
		));

		if ($messages) {
			foreach ($messages as $e) {
				$e->delete();
			}
		}

		access_show_hidden_entities($entity_disable_override);
	});

	// convert messageboard to private message interface
	elgg_register_widget_type('messageboard', elgg_echo("customizations:widget:pm"), elgg_echo("customizations:widget:pm:desc"), array("profile"));

	// Forward to referrer if posting PM from a widget
	elgg_register_plugin_hook_handler('forward', 'system', function() {
		if (get_input('pm_widget') == true) {
			return $_SERVER['HTTP_REFERER'];
		}
	});

	// do not want the pages link in hover menu
	elgg_unextend_view('profile/menu/links', 'pages/menu');

	// button for flushing apc cache
	elgg_register_plugin_hook_handler('register', 'menu:admin_control_panel', function($hook, $type, $menu, $params) {
		$options = array(
			'name' => 'flush_apc',
			'text' => elgg_echo('apc:flush'),
			'href' => 'action/admin/flush_apc',
			'is_action' => true,
			'link_class' => 'elgg-button elgg-button-action',
		);
		$menu[] = ElggMenuItem::factory($options);
		return $menu;
	});

	$actions = __DIR__ . "/actions";
	elgg_register_action('admin/flush_apc', "$actions/admin/flush_apc.php", 'admin');
});

/**
 * Handle /about pages
 *
 * @param array $segments URL Segments
 * @return bool
 */
function community_about_page_handler($segments) {

	$page = array_shift($segments) ?: 'index';

	if (!elgg_view_exists("community/pages/about/$page")) {
		return false;
	}

	echo elgg_view_resource('about', [
		'page' => $page,
	]);

	return true;
}

/**
 * Route legacy pages to their new location
 *
 * @param string $hook   "route"
 * @param string $type   "all"
 * @param mixed  $return Route
 * @param array  $params Hook params
 * @return mixed
 */
function community_handle_legacy_pages($hook, $type, $return, $params) {

	if (!is_array($return)) {
		return;
	}

	$identifier = elgg_extract('identifier', $params);
	$segments = elgg_extract('segments', $params);

	switch ($identifier) {
		case 'about.php' :
			return [
				'identifier' => 'about',
				'segments' => [
					'features',
				],
			];

		case 'supporter.php' :
			return [
				'identifier' => 'about',
				'segments' => [
					'supporters',
				],
			];

		case 'developers.php' :
			return [
				'identifier' => 'about',
				'segments' => [
					'developers',
				],
			];

		case 'domain.php' :
			return [
				'identifier' => 'about',
				'segments' => [
					'domain_policy',
				],
			];

		case 'download.php' :
		case 'previous.php' :
			return [
				'identifier' => 'about',
				'segments' => [
					'download',
				],
			];

		case 'partners.php' :
		case 'services.php' :
			return [
				'identifier' => 'about',
				'segments' => [
					'services',
				],
			];

		case 'hosting.php' :
			return [
				'identifier' => 'about',
				'segments' => [
					'hosting',
				],
			];

		case 'involved.php' :
			return [
				'identifier' => 'about',
				'segments' => [
					'involved',
				],
			];

		case 'getelgg.php' :
			return [
				'identifier' => 'about',
				'segments' => [
					'getelgg',
				],
			];

		case 'powering.php' :
			return [
				'identifier' => 'showcase',
			];

		case 'news' :
			if ($segments[0] == 'weblog' && $segments[1] == 'rss') {
				forward('http://news.elgg.org/?view=rss');
			} else {
				forward('http://news.elgg.org/');
			}
			return false;
	}
}
