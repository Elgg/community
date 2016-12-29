require(['elgg'], function (elgg) {
	/**
	 * Filter default lightbox options
	 */
	elgg.register_hook_handler('getOptions', 'ui.lightbox', function (hook, type, params, options) {
		return $.extend({}, options, {
			current: elgg.echo('js:lightbox:current', ['{current}', '{total}']),
			previous: '<span class="fa fa-caret-left"></span>',
			next: '<span class="fa fa-caret-right"></span>',
			close: '<span class="fa fa-times"></span>',
			opacity: 0.5,
			width: '95%',
			height: 'auto',
			maxWidth: '990px',
			maxHeight: '990px',
		});
	});
});