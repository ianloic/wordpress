<?php
/*
$Revision: 280 $
$Date: 2008-09-17 10:57:40 -0400 (Wed, 17 Sep 2008) $
$Author: joetan54 $
*/
$root = realpath(dirname(dirname(dirname(dirname(dirname(__FILE__))))));
if (file_exists($root.'/wp-load.php')) {
	// WP 2.6
	require_once($root.'/wp-load.php');
} else {
	// Before 2.6
	require_once($root.'/wp-config.php');
}
if (!isset($_GET['view']) ) {
    exit;
}
require_once(dirname(__FILE__).'/lib.flickr.php');
$flickr = new TanTanFlickr();
$auth_token  = get_option('silas_flickr_token');
$hideAlbums  = get_option('silas_flickr_hidealbums');
$hideGroups  = get_option('silas_flickr_hidegroups');
$groupOrder  = get_option('silas_flickr_grouporder');
$albumOrder  = get_option('silas_flickr_albumorder');
$baseurl     = get_option('silas_flickr_baseurl');
$linkoptions = get_option('silas_flickr_linkoptions');

$linkToBlog = ($baseurl && ($linkoptions != 'flickr'));
$parts = parse_url(get_bloginfo('home'));
$home = 'http://'.$parts['host'];

$flickr->setToken($auth_token);
$flickr->setOption(array(
    'hidePrivatePhotos' => get_option('silas_flickr_hideprivate'),
));
$user = $flickr->auth_checkToken();
$flickr->setUser($user);

if ($_GET['view'] == 'albums') { // load albums
    if (!is_array($hideAlbums)) $hideAlbums = array();
    include(dirname(__FILE__).'/admin-options-albums.html');
} elseif ($_GET['view'] == 'groups') { // load groups
    if (!is_array($hideGroups)) $hideGroups = array();
    include(dirname(__FILE__).'/admin-options-groups.html');
}
?>