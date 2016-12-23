<?php
/**
 * Footer
 *
 */

$nav = elgg_view_menu('footer_navigation', array(
	'sort_by' => 'register',
	'show_section_headers' => true,
	'section' => 'default'
));

?>

<div class="elgg-grid">
	<div class="elgg-col elgg-col-1of3">
		<div class="elgg-module">
			<?php echo $nav; ?>
		</div>
	</div>
	
	<div class="elgg-col elgg-col-1of3">
		<div class="elgg-module">
			<h2><?php echo elgg_echo('community_:title:contact'); ?></h2>
			<p><?php echo elgg_echo('community_:contact'); ?></p>
			<p><?php echo elgg_echo('community_:security'); ?></p>
		</div>
	</div>
	
	<div class="elgg-col elgg-col-1of3">
		<div class="elgg-module">
			<h2><?php echo elgg_echo('community_:title:legal'); ?></h2>
			<p><?php echo elgg_echo('community_:copyright'); ?></p>
			<p><?php echo elgg_echo('community_:trademark'); ?></p>
		</div>		
	</div>
</div>

<?php

echo elgg_view_menu('footer', array('sort_by' => 'priority', 'class' => 'elgg-menu-hz'));
