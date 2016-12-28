<?php

$list = elgg_list_entities([
	'limit' => 0,
	'full_view' => false,
	'item_view' => 'community/core_team_member',
		], 'elgg_get_admins');
?>
<p>Elgg is managed by the Elgg Foundation, a nonprofit organization that was founded to govern, protect, and promote the Elgg open source social network engine. The Foundation aims to provide a stable, commercially and individually independent organization that operates in the best interest of Elgg as an open source project.</p>
<p>
	The Elgg project was started in 2004 by <a href="http://benwerd.com">Ben Werdmuller</a> and <a href="https://twitter.com/davetosh">Dave Tosh</a>
</p>

<?php

echo elgg_view_module('info', 'Core Team', $list);
