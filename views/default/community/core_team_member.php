<?php

$entity = elgg_extract('entity', $vars);

$icon = elgg_view_entity_icon($entity, 'medium');

echo elgg_view('object/elements/summary', [
	'icon' => $icon,
	'entity' => $entity,
	'content' => elgg_view('output/longtext', [
		'value' => $entity->description,
	]),
]);