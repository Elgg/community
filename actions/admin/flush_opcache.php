<?php
/**
 * Flush the APC opcode cache
 */

if (function_exists('opcache_reset')) {
	if (opcache_reset()) {
		system_message(elgg_echo('opcache:flush:success'));
		forward(REFERER);
	}
}

register_error(elgg_echo('opcache:flush:fail'));
