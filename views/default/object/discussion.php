<?php

/**
 * Forum topic entity view
 */
$full = elgg_extract('full_view', $vars, FALSE);
$topic = elgg_extract('entity', $vars, FALSE);

if (!$topic) {
	return;
}

$poster = $topic->getOwnerEntity();
if (!$poster) {
	elgg_log("User {$topic->owner_guid} could not be loaded, and is needed to display entity {$topic->guid}", 'WARNING');
	if ($full) {
		forward('', '404');
	}
	return;
}

$excerpt = elgg_get_excerpt($topic->description);

$poster_icon = elgg_view_entity_icon($poster, 'tiny');

$by_line = elgg_view('page/elements/by_line', $vars);

$tags = elgg_view('output/tags', array('tags' => $topic->tags));

$replies_link = '';
$reply_text = '';

$num_replies = elgg_get_entities(array(
	'type' => 'object',
	'subtype' => 'discussion_reply',
	'container_guid' => $topic->guid,
	'count' => true,
	'distinct' => false,
		));

if ($num_replies != 0) {
	$last_reply = elgg_get_entities(array(
		'type' => 'object',
		'subtype' => 'discussion_reply',
		'container_guid' => $topic->guid,
		'limit' => 1,
		'distinct' => false,
	));
	if (isset($last_reply[0])) {
		$last_reply = $last_reply[0];
	}
	/* @var ElggDiscussionReply $last_reply */

	$poster = $last_reply->getOwnerEntity();
	$reply_time = elgg_view_friendly_time($last_reply->time_created);

	$reply_text = elgg_view('output/url', [
		'text' => elgg_echo('discussion:updated', [$poster->name, $reply_time]),
		'href' => $last_reply->getURL(),
		'is_trusted' => true,
	]);

	$menu_items = [
			[
			'name' => 'replies_count',
			'href' => $topic->getURL() . '#group-replies',
			'text' => $num_replies . ' ' . elgg_echo('discussion:replies'),
			'priority' => 800,
			'section' => 'social',
		],
	];
}

$metadata = elgg_view_menu('entity', array(
	'entity' => $topic,
	'handler' => 'discussion',
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz',
	'items' => $menu_items,
		));

if ($full) {
	$subtitle = "$by_line";

	$params = array(
		'entity' => $topic,
		'metadata' => $metadata,
		'subtitle' => $subtitle,
		'tags' => $tags,
		'icon' => $poster_icon,
		'title' => false,
	);
	$params = $params + $vars;
	$list_body = elgg_view('object/elements/summary', $params);

	echo elgg_view('object/elements/full', [
		'entity' => $topic,
		'summary' => $list_body,
		'body' => elgg_view('output/longtext', array(
			'value' => $topic->description,
			'class' => 'clearfix',
		)),
	]);
} else {
	$subtitle = "$by_line<br />$reply_text";

	$params = array(
		'entity' => $topic,
		'metadata' => $metadata,
		'subtitle' => $subtitle,
		'tags' => $tags,
		'content' => $excerpt,
		'icon' => $poster_icon,
	);
	$params = $params + $vars;
	echo elgg_view('object/elements/summary', $params);
}
