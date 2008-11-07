<?php
/*
Plugin Name: Flickr Photo Album 
Plugin URI: http://www.tantannoodles.com/toolkit/photo-album/
Description: This plugin will retrieve your Flickr photos and allow you to easily add your photos to your posts. <a href="options-general.php?page=tantan-flickr/flickr/class-admin.php">Configure...</a>
Author: Joe Tan
Version: 1.1
Author URI: http://www.tantannoodles.com/

Copyright (C) 2008 Joe Tan

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA

Change Log: http://code.google.com/p/photo-album/wiki/ChangeLog

$Revision: 321 $
$Date: 2008-10-03 17:10:43 -0400 (Fri, 03 Oct 2008) $
$Author: joetan54 $

*/

// These two lines are for backwards compatibility
// developer note: options are still stored in database with "silas_" prefix
if (defined('SILAS_FLICKR_DISPLAYGROUPS')) define('TANTAN_FLICKR_DISPLAYGROUPS', SILAS_FLICKR_DISPLAYGROUPS);
if (defined('SILAS_FLICKR_CACHEMODE'))     define('TANTAN_FLICKR_CACHEMODE', SILAS_FLICKR_CACHEMODE);

//
// Add these to the top of your wp-config.php to change these settings. 
//
if (!defined("TANTAN_FLICKR_DISPLAYGROUPS"))  define("TANTAN_FLICKR_DISPLAYGROUPS", false); // IMPORTANT: Please make sure you only tell the plugin to only pull in groups for which you have permission to display photos from
if (!defined("TANTAN_FLICKR_CACHEMODE"))      define("TANTAN_FLICKR_CACHEMODE", "db"); // use "fs" to use filesystem based caching instead
if (!defined("TANTAN_FLICKR_CACHE_TIMEOUT"))  define("TANTAN_FLICKR_CACHE_TIMEOUT", 30*86400); // 30 days default cache
if (!defined("TANTAN_FLICKR_SEARCH_LICENSE")) define("TANTAN_FLICKR_PUBLIC_LICENSE", '4'); // license to use when searching public photos. more info for possible values: http://www.flickr.com/services/api/flickr.photos.licenses.getInfo.html
if (!defined("TANTAN_FLICKR_BASEURL"))        define("TANTAN_FLICKR_BASEURL", get_option('silas_flickr_baseurl'));
if (!defined("TANTAN_FLICKR_COMMENTS"))       define("TANTAN_FLICKR_COMMENTS", 'flickr'); // which commenting system to use

//define('TANTAN_FLICKR_APIKEY', '');
//define('TANTAN_FLICKR_SHAREDSECRET', '');

// auto update notification
if (!defined('TANTAN_AUTOUPDATE_NOTIFY')) define('TANTAN_AUTOUPDATE_NOTIFY', true);


if (ereg('/wp-admin/', $_SERVER['REQUEST_URI'])) { // just load in admin
    require_once(dirname(__FILE__).'/flickr/class-admin.php');
    $TanTanFlickrPluginAdmin =& new TanTanFlickrPluginAdmin();
    
} else {
    if (TANTAN_FLICKR_BASEURL) {
        if (strpos($_SERVER['REQUEST_URI'], TANTAN_FLICKR_BASEURL) === 0) {
            $_SERVER['_TANTAN_FLICKR_REQUEST_URI'] = $_SERVER['REQUEST_URI'];

            require_once(dirname(__FILE__).'/flickr/class-public.php');
            $TanTanFlickrPlugin =& new TanTanFlickrPlugin();
			$SilasFlickrPlugin =& $TanTanFlickrPlugin; // backwards compatibility
			
            status_header(200);
			remove_action('template_redirect', 'redirect_canonical');
            add_filter('request', array(&$TanTanFlickrPlugin, 'request'));
            add_action('parse_query', array(&$TanTanFlickrPlugin, 'parse_query'));
			add_action('parse_request', array(&$TanTanFlickrPlugin, 'parse_query'));
            add_action('template_redirect', array(&$TanTanFlickrPlugin, 'template'));
        } elseif (strpos($_SERVER['REQUEST_URI'].'/', TANTAN_FLICKR_BASEURL) === 0) {
            header('location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'/');
            exit;
        }
    }
    // short code support
    if (function_exists('add_shortcode')) {
        // lazy load the flickr libraries
        add_shortcode('flickr', create_function('$attribs=false, $content=false', 'require_once(dirname(__FILE__)."/flickr/class-public.php"); if (!is_object($GLOBALS[TanTanFlickrPlugin])) $GLOBALS[TanTanFlickrPlugin] =& new TanTanFlickrPlugin(); return $GLOBALS[TanTanFlickrPlugin]->getShortCodeHTML($attribs, $content);'));
    }
    add_action('template_redirect', create_function('', "if (file_exists(TEMPLATEPATH  . '/photoalbum-resources.php')) require_once(TEMPLATEPATH . '/photoalbum-resources.php'); else require_once(dirname(__FILE__) . '/templates/photoalbum-resources.php');"));
}
if (get_option('silas_flickr_showbadge')) { // load sidebar widget
    add_action('plugins_loaded', create_function('', 'require_once(dirname(__FILE__)."/flickr/widget.php"); $GLOBALS[TanTanFlickrWidget] =& new TanTanFlickrWidget();'));
}
// clear flickr cache
add_action('tantan_flickr_clear_cache_event', create_function('', 'require_once(dirname(__FILE__)."/flickr/lib.flickr.php");$flickr = new TanTanFlickr();@$flickr->clearCacheStale();'));
?>