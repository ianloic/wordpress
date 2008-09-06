<?php
/*
Plugin Name: Post-Plugin Library
Plugin URI: http://rmarsh.com/plugins/
Description: Does nothing by itself but supplies common code for the <a href="http://rmarsh.com/plugins/similar-posts/">Similar Posts</a>, <a href="http://rmarsh.com/plugins/recent-posts/">Recent Posts</a>, <a href="http://rmarsh.com/plugins/random-posts/">Random Posts</a>, and <a href="http://rmarsh.com/plugins/recent-comments/">Recent Comments</a> plugins. Make sure you have the latest version of this plugin.
Author: Rob Marsh, SJ
Version: 2.6.1.0
Author URI: http://rmarsh.com/
*/ 

/*
Copyright 2008  Rob Marsh, SJ  (http://rmarsh.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

define ('POST_PLUGIN_LIBRARY', true);

if (!defined('CF_LIBRARY')) require(dirname(__FILE__).'/common_functions.php');
if (!defined('ACF_LIBRARY')) require(dirname(__FILE__).'/admin_common_functions.php');
if (!defined('OT_LIBRARY')) require(dirname(__FILE__).'/output_tags.php');
if (!defined('ADMIN_SUBPAGES_LIBRARY')) require(dirname(__FILE__).'/admin-subpages.php');

?>