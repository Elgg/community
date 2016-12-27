<?php
/**
 * Register help
 *
 */
$title = elgg_echo("comminity:title:register");

ob_start();
?>
<p>To keep this community site useful and safe for all, please:</p>
<ul>
	<li>Do not post test content. Test content on the community site will be deleted.</li>
	<li>Be courteous, friendly, and patient with all members of the site.</li>
	<li>Be respectful of plugin developers' time and priorities.</li>
	<li>Read and follow the <a href="<?= elgg_normalize_url('terms') ?>">Terms and Conditions.</a></li>
</ul>
<?php
$body = ob_get_clean();

?>
<div class="elgg-output">
	<?php echo elgg_view_module('register', $title, $body); ?>
</div>
