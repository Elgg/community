<?php

/**
 * Outputs object metadata
 * @uses $vars['metadata'] Metadata/menu
 */

$metadata = elgg_extract('metadata', $vars);
if (!$metadata) {
	return;
}
echo elgg_format_element('div', [
	'class' => 'elgg-listing-metadata clearfix',
], $metadata);