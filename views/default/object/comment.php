<?php

/**
 * Elgg comment view
 *
 * @uses $vars['entity']    ElggComment
 * @uses $vars['full_view'] Display full view or brief view
 */
$full_view = elgg_extract('full_view', $vars, true);
$comment = elgg_extract('entity', $vars);
/* @var ElggComment $comment */

$entity = get_entity($comment->container_guid);
$commenter = get_user($comment->owner_guid);

if (!$comment || !$entity || !$commenter) {
	return true;
}

$commenter_link = elgg_view('output/url', [
	'text' => $commenter->getDisplayName(),
	'href' => $commenter->getURL(),
]);

$commenter_icon = elgg_view_entity_icon($commenter, 'tiny');

$friendlytime = elgg_view('output/url', [
	'href' => $comment->getURL(),
	'text' => elgg_view_friendly_time($comment->time_created),
]);

if ($full_view) {
	$anchor = elgg_view('output/url', [
		'name' => "comment-{$comment->guid}",
	]);

	$menu = elgg_view_menu('entity', array(
		'entity' => $comment,
		'handler' => 'comment',
		'sort_by' => 'priority',
		'class' => 'elgg-menu-hz',
	));

	$comment_text = elgg_view('output/longtext', array(
		'value' => $comment->description,
		'class' => 'elgg-inner',
		'data-role' => 'comment-text',
	));

	echo $anchor . elgg_view('object/elements/summary', [
				'entity' => $comment,
				'title' => false,
				'tags' => false,
				'subtitle' => "$commenter_link $friendlytime",
				'metadata' => $menu,
				'content' => $comment_text,
				'icon' => $commenter_icon,
	]);
} else {
	$entity_link = elgg_view('output/url', [
		'text' => $entity->getDisplayName() ? : elgg_echo('untitled'),
		'href' => $entity->getURL(),
	]);

	$excerpt = elgg_get_excerpt($comment->description, 80);
	$posted = elgg_echo('generic_comment:on', array($commenter_link, $entity_link));

	echo elgg_view('object/elements/summary', [
		'entity' => $comment,
		'title' => false,
		'tags' => false,
		'subtitle' => "$posted ($friendlytime): <br />$excerpt",
		'icon' => $commenter_icon,
	]);

}
