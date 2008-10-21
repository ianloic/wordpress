<?php
/*
$Revision: 321 $
$Date: 2008-10-03 17:10:43 -0400 (Fri, 03 Oct 2008) $
$Author: joetan54 $
*/
require_once(dirname(__FILE__).'/class-public.php');

class TanTanFlickrPluginAdmin extends TanTanFlickrPlugin {

    var $config = array();
    
    function TanTanFlickrPluginAdmin() {
        parent::TanTanFlickrPlugin();
        add_action('admin_menu', array(&$this, 'addhooks'));
        add_action('activate_tantan-flickr/flickr.php', array(&$this, 'activate'));
        add_action('deactivate_tantan-flickr/flickr.php', array(&$this, 'deactivate'));
        add_action('load-upload.php', array(&$this, 'addPhotosTab'));

		// WP >= 2.5
		add_action('media_buttons', array(&$this, 'media_buttons')); 
		add_filter('media_buttons_context', array(&$this, 'media_buttons_context'));//create_function('$a', "return '%s';"));
		add_action('media_upload_tantan-flickr-photo-stream', array(&$this, 'media_upload_content'));
		add_action('media_upload_tantan-flickr-photo-albums', array(&$this, 'media_upload_content_albums'));
		add_action('media_upload_tantan-flickr-photo-everyone', array(&$this, 'media_upload_content_everyone'));
		add_action('media_upload_tantan-flickr-photo-interesting', array(&$this, 'media_upload_content_interesting'));
		
        if ($_GET['tantanActivate'] == 'photo-album') {
            $this->showConfigNotice();
        }
    }
    function activate() {
		if (!ereg('plugins.php', $_SERVER['REQUEST_URI'])) return;
		if (function_exists('wp_schedule_event')) {
		    wp_clear_scheduled_hook('tantan_flickr_clear_cache_event');
		    wp_schedule_event(time(), 'daily', 'tantan_flickr_clear_cache_event');
		}
		
        wp_redirect('plugins.php?tantanActivate=photo-album');
        exit;
    }
    function showConfigNotice() {
        add_action('admin_notices', create_function('', 'echo \'<div id="message" class="updated fade"><p>The Flickr Photo Album plugin has been <strong>activated</strong>. <a href="options-general.php?page=tantan-flickr/flickr/class-admin.php">Configure the plugin &gt;</a></p></div>\';'));
    }

    function admin() {
    
        if ((TANTAN_FLICKR_CACHEMODE == "fs") && !is_writable(dirname(__FILE__).'/flickr-cache/')) {
            echo "<div class='wrap'>
            <h2>Permissions Error</h2>
            <p>This plugin requires that the directory <strong>".dirname(__FILE__)."/flickr-cache/</strong> be writable by the web server.</p> 
            <p>You may want to try to manually delete this flickr-cache directory, and have the plugin try to create it to see if that will fix this problem.</p>
            <p>Otherwise, please contact your server administrator to ensure the proper permissions are set for this directory. </p>
            </div>
            ";
            return;
        } elseif (!get_settings('permalink_structure')) {
            $error = "In order to view your photo album, your <a href='options-permalink.php'>WordPress permalinks</a> need to be set to something other than <em>Default</em>.";
/*
        } elseif (!function_exists('curl_init')) {
            $error = "You do not have the required libraries to use this plugin. The PHP library <a href='http://us2.php.net/curl'>libcurl</a> needs to be installed on your server.";
*/
        } elseif (@constant('DB_CHARSET') === null) {
			$error = "Your database character encoding does not seem to be set. It is <strong>strongly</strong> recommended that you set it to <em>utf8</em> for maximum compatibility. <a href=\"http://codex.wordpress.org/Editing_wp-config.php#Database_character_set\">Instructions are available here.</a> ".
				"Once you have set your database encoding, please deactivate and reactivate this plugin.";
		} 

        if ($_POST['action'] == 'savekey') {
            update_option('silas_flickr_apikey', $_POST['flickr_apikey']);
            update_option('silas_flickr_sharedsecret', $_POST['flickr_sharedsecret']);
            $message = "Saved API Key.";
        } elseif ($_POST['action'] == 'resetkey') {
            update_option('silas_flickr_apikey', false);
            update_option('silas_flickr_sharedsecret', false);
            $message = "API Key reset";
        }

        $flickr_apikey = get_option('silas_flickr_apikey');
        $flickr_sharedsecret = get_option('silas_flickr_sharedsecret');

        if ($flickr_apikey && $flickr_sharedsecret) {
            
        require_once(dirname(__FILE__).'/lib.flickr.php');
        $flickr = new TanTanFlickr();

        if ($flickr->cache == 'db') {
            global $wpdb;
			$wpdb->hide_errors();
			$charset_collate = '';
			if ( (method_exists($wpdb, 'supports_collation') && $wpdb->supports_collation()) || (version_compare(mysql_get_server_info($wpdb->dbh), '4.1.0', '>=')) ) {
				if ( ! empty($wpdb->charset) )
					$charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
				if ( ! empty($wpdb->collate) )
					$charset_collate .= " COLLATE $wpdb->collate";
			}
            $wpdb->query("
                CREATE TABLE IF NOT EXISTS `$flickr->cache_table` (
                    `command` CHAR( 255 ) NOT NULL ,
                    `request` CHAR( 35 ) NOT NULL ,
                    `response` MEDIUMTEXT NOT NULL ,
                    `created` DATETIME NOT NULL ,
                    `expiration` DATETIME NOT NULL ,
                    INDEX ( `request` ),
					INDEX ( `command` )
                ) $charset_collate");//
			$wpdb->query("CREATE INDEX commandCreated on $flickr->cache_table(command, created)");
			$wpdb->show_errors();
			if (function_exists('wp_schedule_event')) {
                wp_clear_scheduled_hook('tantan_flickr_clear_cache_event');
                wp_schedule_event(time(), 'daily', 'tantan_flickr_clear_cache_event');
			}

        }
        
        if ($_POST['action'] == 'save') {
            $flickr->clearCache();
            $token = $flickr->auth_getToken($_POST['frob']);
            if ($token) {
                update_option('silas_flickr_token', $token);
            } else {
                $error = $flickr->getErrorMsg();
            }
        } elseif ($_POST['action'] == 'logout') {
            update_option('silas_flickr_token', '');
            $flickr->clearCache();
        } elseif ($_POST['action'] == 'savebase') {
            $url = parse_url(get_bloginfo('siteurl'));
            $baseurl = $url['path'] . '/' . $_POST['baseurl'];
            if (!ereg('.*/$', $baseurl)) $baseurl .= '/';

            if ($_POST['synidcateoff'] || strlen($_POST['baseurl']) <= 0) {
                $baseurl = false;
            }
            update_option('silas_flickr_baseurl_pre', $url['path'] . '/');
            update_option('silas_flickr_baseurl', $baseurl);
            
            update_option('silas_flickr_hideprivate', $_POST['hideprivate']);
            update_option('silas_flickr_showbadge', $_POST['showbadge']);
            update_option('silas_flickr_linkoptions', $_POST['linkoptions']);
        }
        
        
        $auth_token  = get_option('silas_flickr_token');
        $baseurl     = get_option('silas_flickr_baseurl');
        $baseurl_pre = get_option('silas_flickr_baseurl_pre');
        $hideprivate = get_option('silas_flickr_hideprivate');
        $showbadge   = get_option('silas_flickr_showbadge');
        $linkoptions = get_option('silas_flickr_linkoptions');
        $hideAlbums  = get_option('silas_flickr_hidealbums');
        $hideGroups  = get_option('silas_flickr_hidegroups');
        $groupOrder  = get_option('silas_flickr_grouporder');
        $albumOrder  = get_option('silas_flickr_albumorder');
        

        
        $flickrAuth = false;
    
        if (!$auth_token) {
			$flickr->clearCache();
            $frob = $flickr->getFrob();
            $error = $flickr->getErrorMsg();
            
            $flickrAuth = false;
        } else {
            $flickr->setToken($auth_token);
            $flickr->setOption(array(
                'hidePrivatePhotos' => get_option('silas_flickr_hideprivate'),
            ));
            $user = $flickr->auth_checkToken();
            if (!$user) { // get a new frob and try to re-authenticate
                $error = $flickr->getErrorMsg();
                update_option('silas_flickr_token', '');
                $flickr->setToken('');
                $frob = $flickr->getFrob();
            } else {
                $flickrAuth = true;
                $flickr->setUser($user);
                update_option('silas_flickr_user', $user);
            }
        }
        
        } // apikey check
        
        if ($flickrAuth) { // passed authentication
        
        if ($_POST['action'] == 'clearcache') {
            if ($_POST['album'] == 'all') {
                if ($flickr->clearCache()) {
                    $message = "Successfully cleared the cache.";
                } else {
                    $error = "Cache clear failed. Try manually deleting the 'flickr-cache' directory or the silas_flickr_cache database table.";
                }
            } else {
                $flickr->startClearCache();
                $albums = $flickr->getAlbums();
                $photos = $flickr->getPhotos($_POST['album']);
                $flickr->doneClearCache();
                $message = "Refreshed " . count($photos) . " photos in ".$albums[$_POST['album']]['title'].".";
            }
        } elseif ($_POST['action'] == 'savealbumsettings') {
            if (!is_array($_POST['hideAlbum'])) $_POST['hideAlbum'] = array();
            update_option('silas_flickr_hidealbums', $_POST['hideAlbum']);
            $hideAlbums = $_POST['hideAlbum'];
            
            if (!is_array($_POST['albumOrder'])) $_POST['albumOrder'] = array();
            asort($_POST['albumOrder']);
            update_option('silas_flickr_albumorder', $_POST['albumOrder']);
            $albumOrder = $_POST['albumOrder'];
            

            $message .= "Saved album settings. ";
            if (is_array($_POST['clearAlbum'])) {
                $flickr->startClearCache();
                foreach ($_POST['clearAlbum'] as $album_id) {
                    $photos = $flickr->getPhotos($album_id);
                }
                $flickr->doneClearCache();
                $message .= "Cleared cache for selected albums. ";

            }
        } elseif ($_POST['action'] == 'savegroupsettings') {
            if (!is_array($_POST['hideGroup'])) $_POST['hideGroup'] = array();
            update_option('silas_flickr_hidegroups', $_POST['hideGroup']);
            $hideGroups = $_POST['hideGroup'];
            
            if (!is_array($_POST['groupOrder'])) $_POST['groupOrder'] = array();
            asort($_POST['groupOrder']);
            update_option('silas_flickr_grouporder', $_POST['groupOrder']);
            $groupOrder = $_POST['groupOrder'];
            
            $message .= "Saved group settings. ";
            if (is_array($_POST['clearGroup'])) {
                $flickr->startClearCache();
                foreach ($_POST['clearGroup'] as $group_id) {
                    $photos = $flickr->getPhotosByGroup($group_id);
                }
                $flickr->doneClearCache();
                $message .= "Cleared cache for selected groups. ";
            }
        } 
        
        }
        include(dirname(__FILE__).'/admin-options.html');
        
    }
    function uploading_iframe($src) {
        return '../wp-content/plugins/tantan-flickr/flickr/'.$src;
    }
    
    function addhooks() {
        add_options_page('Photo Album', 'Photo Album', 10, __FILE__, array(&$this, 'admin'));
        if (version_compare(get_bloginfo('version'), '2.1', '<')) {
            add_filter('uploading_iframe_src', array(&$this, 'uploading_iframe'));
        }
        $this->version_check();
    }
    function version_check() {
        global $TanTanVersionCheck;
        if (is_object($TanTanVersionCheck)) {
            $data = get_plugin_data(dirname(__FILE__).'/../flickr.php');
            $TanTanVersionCheck->versionCheck(200, $data['Version']);
        }
    }

	function media_buttons() {
	}
	function media_buttons_context($context) {
		global $post_ID, $temp_ID;
		$dir = dirname(__FILE__);

		$image_btn = get_option('siteurl').'/wp-content/plugins/tantan-flickr/flickr/icon.gif';
		$image_title = 'Flickr';
		
		$uploading_iframe_ID = (int) (0 == $post_ID ? $temp_ID : $post_ID);

		$media_upload_iframe_src = "media-upload.php?post_id=$uploading_iframe_ID";
		$out = ' <a href="'.$media_upload_iframe_src.'&tab=tantan-flickr-photo-stream&TB_iframe=true&height=500&width=640" class="thickbox" title="'.$image_title.'"><img src="'.$image_btn.'" alt="'.$image_title.'" /></a>';
		return $context.$out;
	}
	function media_upload_content_interesting() { return $this->media_upload_content('interesting');}
	function media_upload_content_everyone() { return $this->media_upload_content('everyone');}
	
	// list out albums
	function media_upload_content_albums() { return $this->media_upload_content('albums');}
	
	// display photo stream
	function media_upload_content($mode='stream') {
        /*    
		if (!$this->options) $this->options = get_option('tantan_wordpress_s3');
		//if (!is_object($this->s3)) {
	        require_once(dirname(__FILE__).'/lib.s3.php');
	        $this->s3 = new TanTanS3($this->options['key'], $this->options['secret']);
	        $this->s3->setOptions($this->options);
        //}
        */
		add_filter('media_upload_tabs', array(&$this, 'media_upload_tabs'));
        add_action('admin_print_scripts', array(&$this, 'upload_tabs_scripts'));
		if (function_exists('media_admin_css')) add_action('admin_print_scripts', 'media_admin_css');
		else wp_enqueue_style( 'media' );
		
		add_action('tantan_media_upload_header', 'media_upload_header');
		if ($mode == 'albums') {
			wp_iframe(array(&$this, 'albumsTab'));
		} elseif ($mode == 'everyone') {
		    $_REQUEST['everyone'] = true;
		    wp_iframe(array(&$this, 'photosTab'), 40);
		} elseif ($mode == 'interesting') {
		    $_REQUEST['interesting'] = true;
		    wp_iframe(array(&$this, 'photosTab'), 40);
		} else {
			wp_iframe(array(&$this, 'photosTab'), 40);
		}
	}
	function media_upload_tabs($tabs) {
		return array(
			'tantan-flickr-photo-stream' => __('Photo Stream', 'tantan-flickr'), // handler action suffix => tab text
			'tantan-flickr-photo-albums' => __('Albums', 'tantan-flickr'),
			'tantan-flickr-photo-everyone' => __('Everyone', 'tantan-flickr'),
			'tantan-flickr-photo-interesting' => __('Interesting', 'tantan-flickr'),
		);
	}
    function addPhotosTab() {
        add_filter('wp_upload_tabs', array(&$this, 'wp_upload_tabs'));
        add_action('admin_print_scripts', array(&$this, 'upload_tabs_scripts'));
        //add_action('upload_files_tantan_flickr', array(&$this, 'upload_files_tantan_flickr'));
    }
    function wp_upload_tabs ($array) {
        /*
         0 => tab display name, 
        1 => required cap, 
        2 => function that produces tab content, 
        3 => total number objects OR array(total, objects per page), 
        4 => add_query_args
	*/
		$count = $this->getNumPhotos();
	    $args = array();
        if ($_REQUEST['tags']) $args['tags'] = $_REQUEST['tags'];
        if ($_REQUEST['everyone']) $args['everyone'] = 1;
        $tab = array(
            'tantan_flickr' => array('Photos (Flickr)', 'upload_files', array(&$this, 'photosTab'), array(min($count,500), 10), $args),
            'tantan_flickr_album' => array('Albums (Flickr)', 'upload_files', array(&$this, 'albumsTab'), 0, $args)
            );
        return array_merge($array, $tab);
    }
    function upload_tabs_scripts() {
		if (!class_exists('Services_JSON')) require_once(dirname(__FILE__).'/json.php');
        include(dirname(__FILE__).'/admin-tab-head.html');
    }
    // gets called before tabs are rendered
    function upload_files_tantan_flickr() {
        //echo 'upload_files_tantan_flickr';
    }
    function photosTab($perpage=20) {
        $tags = $_REQUEST['tags'];
        //$offsetpage = (int) ($_GET['start'] / $perpage) + 1;
        $offsetpage = (int) $_GET['paged'];
		$offsetpage = $offsetpage ? $offsetpage : 1;
        $everyone = isset($_REQUEST['everyone']) && $_REQUEST['everyone'];
		$interesting = false;
        if (isset($_REQUEST['interesting']) && $_REQUEST['interesting']) {
			$interesting = true;
            $photos = $this->getInterestingPhotos($date, $offsetpage, $perpage);
        } else {
            $photos = $this->getRecentPhotos($tags, $offsetpage, $perpage, $everyone, false);
        }
		
		//
		// TODO: this is WP2.5 specific code, should abstract out
		//
		if (ereg('media-upload.php', $_SERVER['REQUEST_URI'])) {
			if (!$tags && (!$everyone && !$interesting)) {
				$count = $this->getNumPhotos();
				$page_links = paginate_links( array(
					'base' => add_query_arg( 'paged', '%#%' ),
					'format' => '',
					'total' => ceil($count / $perpage),
					'mid_size' => 1,
					'current' => $offsetpage,
				));
			} else {
				$page_links = '';
				if ($offsetpage > 1) {
					$link = add_query_arg( 'paged', $offsetpage - 1 );
					$page_links = "<a class='prev page-numbers' href='" . clean_url($link) . "'>".__('&laquo; Previous', 'tantan-flickr')."</a>";
				}
				if (count($photos) >= $perpage) {
				$link = add_query_arg( 'paged', $offsetpage + 1 );
				$page_links .= "<a class='next page-numbers' href='" . clean_url($link) . "'>".__('Next &raquo;', 'tantan-flickr')."</a>";
				$count = -1;
				}
			}
		}

        do_action('tantan_media_upload_header');
		include(dirname(__FILE__).'/admin-photos-tab.html');
    }
    function albumsTab() {
        $usecache = ! (isset($_REQUEST['refresh']) && $_REQUEST['refresh']);
        $albums = $this->getRecentAlbums($usecache);
		$user = $this->getUser();
		do_action('tantan_media_upload_header');
        include(dirname(__FILE__).'/admin-albums-tab.html');
    }
    
    
   
    // cleanup after yourself
    function deactivate() {
        require_once(dirname(__FILE__).'/lib.flickr.php');
        $flickr = new TanTanFlickr();
        if (is_writable(dirname(__FILE__).'/flickr-cache/')) {
            $flickr->clearCache();
        }
        if ($flickr->cache == 'db') {
            global $wpdb;
            $wpdb->query("DROP TABLE $flickr->cache_table;");
        }
    }


	function getNumPhotos() {
		$auth_token = get_option('silas_flickr_token');
        $baseurl = get_option('silas_flickr_baseurl');
        $linkoptions = get_option('silas_flickr_linkoptions');
        if ($auth_token) {
            require_once(dirname(__FILE__).'/lib.flickr.php');
            $flickr = new TanTanFlickr();
            $flickr->setToken($auth_token);
            $flickr->setOption(array(
                'hidePrivatePhotos' => get_option('silas_flickr_hideprivate'),
            ));
			$user = $flickr->auth_checkToken();
	        $nsid = $user['user']['nsid'];
			if ($nsid) {
	            $info = $flickr->people_getInfo($nsid);
				return (int) $info['photos']['count'];
			}
			return 0;
		}
	}
}

function tantan_flickr_autoupdate($old, $new) {
	remove_action( 'add_option_update_plugins', 'tantan_flickr_autoupdate', 10, 2);
	remove_action( 'update_option_update_plugins', 'tantan_flickr_autoupdate', 10, 2);
	if (is_string($new)) $new = @unserialize($new);
	if (!is_object($new))$new = new stdClass();
	
	$http_request  = "GET /tantan-flickr.serialized HTTP/1.0\r\n";
	$http_request .= "Host: updates.tantannoodles.com\r\n";
	$http_request .= 'User-Agent: WordPress/' . $wp_version . '; ' . get_bloginfo('url') . "\r\n";
	$http_request .= "\r\n";
	$http_request .= $request;
	$response = '';
	if( false != ( $fs = @fsockopen( 'updates.tantannoodles.com', 80, $errno, $errstr, 3) ) && is_resource($fs) ) {
		fwrite($fs, $http_request);
		while ( !feof($fs) ) $response .= fgets($fs, 1160); // One TCP-IP packet
		fclose($fs);
		$response = explode("\r\n\r\n", $response, 2);
	}
	$update = unserialize( $response[1] );
	if (is_object($update)) {
		$thisPlugin = get_plugin_data(dirname(__FILE__).'/../flickr.php');
		if (version_compare($thisPlugin['Version'], $update->new_version, '<')) {
			$new->response['tantan-flickr/flickr.php'] = $update;
			update_option('update_plugins', $new);
		}
	}
}
function tantan_flickr_after_plugin_row($file) {
    if (strpos('tantan-flickr/flickr.php',$file)!==false ) {
	    $current = get_option( 'update_plugins' );
	    if ( !isset( $current->response[ $file ] ) ) return false;
	    $r = $current->response[ $file ];
	    echo "<tr><td colspan='5' style='text-align:center;'>";
		echo "<a href='http://tantannoodles.com/category/toolkit/photo-album/'>View the latest updates for this plugin &gt;</a>";
		echo "</td></tr>";
		
	}
}
if (TANTAN_AUTOUPDATE_NOTIFY && version_compare(get_bloginfo('version'), '2.3', '>=')) {
	add_action( 'add_option_update_plugins', 'tantan_flickr_autoupdate', 10, 2);
	add_action( 'update_option_update_plugins', 'tantan_flickr_autoupdate', 10, 2);
	add_action( 'after_plugin_row', 'tantan_flickr_after_plugin_row' );

}
?>