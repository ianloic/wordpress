<?php
/*
Plugin Name: Flickr Sidebar widget
Description: Adds a sidebar widget to display your recent Flickr photos
Author: Joe Tan
Version: 0.2.1
Author URI: http://www.tantannoodles.com/

$Revision: 135 $
$Date: 2008-04-28 17:52:23 -0400 (Mon, 28 Apr 2008) $
$Author: joetan54 $

*/

class TanTanFlickrWidget {
    function TanTanFlickrWidget () {
        if (function_exists('register_sidebar_widget')) { 
            register_sidebar_widget('Flickr Sidebar', array(&$this, 'display'));
            register_widget_control('Flickr Sidebar', array(&$this, 'control'));
        }
        $options = get_option('silas_flickr_widget');
        if ($options['animate']) {
            add_action('wp_head', array(&$this, 'animationHeader'));
            add_action('wp_footer', array(&$this, 'animationFooter'));
        }
    }
    
    function control() {
        require_once(dirname(__FILE__).'/lib.flickr.php');
        $flickr = new TanTanFlickr();
        $auth_token  = get_option('silas_flickr_token');
        $flickr->setToken($auth_token);
        $flickr->setOption(array(
            'hidePrivatePhotos' => get_option('silas_flickr_hideprivate'),
        ));
        $user = $flickr->auth_checkToken();

        
		$options = $newoptions = get_option('silas_flickr_widget');
		if ( $_POST['tantan-flickr-submit'] ) {
			$newoptions['title'] = strip_tags(stripslashes($_POST['tantan-flickr-title']));
			$newoptions['tags'] = strip_tags(stripslashes($_POST['tantan-flickr-tags']));
			$newoptions['count'] = (int) $_POST['tantan-flickr-count'];
			$newoptions['randomize'] = $_POST['tantan-flickr-randomize'] ? true : false;
			$newoptions['animate'] = $_POST['tantan-flickr-animate'] ? true : false;
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('silas_flickr_widget', $options);
		}

        include(dirname(__FILE__).'/widget-options.html');
    }
    
    function animationHeader() {
        global $TanTanFlickrPlugin;
        include ($this->getDisplayTemplate('widget-header.html'));
    }
    function animationFooter() {
        
    }
    
    function display($args) {
			global $TanTanFlickrPlugin;
			if (!is_object($TanTanFlickrPlugin) || strtolower(get_class($TanTanFlickrPlugin)) != 'tantanflickrplugin' ) {
		    require_once(dirname(__FILE__).'/class-public.php');
				$TanTanFlickrPlugin =& new TanTanFlickrPlugin();
			}
			extract($args);
			$defaults = array('count' => 10);
			$options = (array) get_option('silas_flickr_widget');
			$altPhotos = array();
			foreach ( $defaults as $key => $value )
			if ( !isset($options[$key]) )
				$options[$key] = $defaults[$key];
			$photos;
			if ($options['randomize']) {
				$photos = $TanTanFlickrPlugin->getRandomPhotos($options['tags'], $options['count']);
			} else {
				$photos = $TanTanFlickrPlugin->getRecentPhotos($options['tags'], 0, $options['count']);
			}
			if ($options['randomize'] || $options['animate']) {
				if (count($photos) < $options['count']) {
					$altPhotos = $photos;
				} else {
					$altPhotos = array_slice($photos, $options['count']);
					$photos = array_slice($photos, 0, $options['count']);
				}
			}
			echo $before_widget;
			if ($options['animate']) {
				include ($this->getDisplayTemplate('widget-display-animate.html'));
			} else {
				include ($this->getDisplayTemplate('widget-display.html'));
			}
				echo $after_widget;
    }
    function getDisplayTemplate($file) {
        if (file_exists(TEMPLATEPATH . '/'.$file)) {
            return TEMPLATEPATH . '/'.$file;
        } else {
            return dirname(__FILE__).'/'.$file;
        }
    }
}
?>
