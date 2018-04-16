<?php
/**
 * Redirect for downloading Elgg so that we can record this
 */

$root = elgg_get_root_path();

require "$root/credentials.php";

// Where are the downloads stored?
$download_base = "https://elgg.org/download/";

// Connect to db
$connection = mysqli_connect('localhost', $db_user, $db_password, 'www_elgg_org');

// Sanitise plugin URL
$url = trim(mysqli_real_escape_string($connection, $_GET['forward']));
if (empty($url)) {
	header("Location: https://elgg.org/about/download/");
	exit();
}

// Get existing counter, if any
if ($result = mysqli_query($connection, "SELECT count(downloads) AS total FROM plugins WHERE url = '{$url}'")) {
	$row = mysqli_fetch_object($result);
	$count = $row->total;
} else {
	$count = 0;
}
if ($count) {
	mysqli_query($connection, "UPDATE plugins SET downloads = downloads + 1 WHERE url = '{$url}'");
} else {
	mysqli_query($connection, "INSERT INTO plugins SET downloads = 1, url = '{$url}'");
}

forward("{$download_base}{$url}");
