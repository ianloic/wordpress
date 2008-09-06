<?php
/*
Copy this file into your current active theme's directory to customize this template

This template resource file defines the template tags used to create the HTML for your photos.

Note that the popup overlay display methods requires that you download the appropriate JavaScript libraries. 
You'll probably also need to tweak some paths in order for it to work with your setup.

A bunch of these libraries use jQuery, so if you're on an old version of WordPress (2.1 or order), 
you may need to download and install jQuery.

jQuery: http://jquery.com/ (also included by default with WordPress 2.2+)
*/

if (!defined('TANTAN_DISPLAY_LIBRARY'))      define('TANTAN_DISPLAY_LIBRARY', false);
if (!defined('TANTAN_DISPLAY_LIBRARY_PATH')) define('TANTAN_DISPLAY_LIBRARY_PATH', 'http://static.tantannoodles.com'); 
if (!defined('TANTAN_DISPLAY_POPUP_SIZE'))   define('TANTAN_DISPLAY_POPUP_SIZE', 'Medium');


//
// This is the base class used to display photos. You can override the methods defined in this class if you want to use
// a JavaScript display library (ie Lightbox). Some examples given below.
//
class TanTanFlickrDisplayBase {
	function headTags() { echo ''; /* include links to javascript, or stylesheet libraries here */}
	function footer() {echo ''; /* anything that might need to go into the footer*/ }
	
	// draw out a photo thumbnail, with <a> and <img> tags
	function photo ($photo, $options=null) {
		if (!is_array($options)) $options = array();
		$defaults = array(
			'size' => 'Square',
			'scale' => 1,
			'album' => null,
			'context' => null,
			'prefix' => '',
			'linkoptions' => null
			);
		$options = array_merge($defaults, $options);
		extract($options);

		if (($context == 'gallery-index') && $album) {
			$prefix = 'album/'.$album['id'].'/';
		}
		if (($linkoptions == 'flickr') && is_array($photo['urls'])) {
			$href = array_pop($photo['urls']);
		} else {
			$href = TanTanFlickrDisplay::href($photo, $album, $prefix);
		}
		$html = '<a class="tt-flickr tt-flickr-'.$size.'" href="'.$href.'" '.
            ($album ? ('rel="album-'.$album['id'].'" ') : '').
			'id="photo-'.$photo['id'].'" '.
			'title="'.htmlentities($photo['title'], ENT_QUOTES, 'UTF-8') . strip_tags($photo['description'] ? ' - '.$photo['description'] : '').'">'.
			TanTanFlickrDisplay::image($photo, $size, $scale).
			'</a> ';
		return $html;
	}
	
	// return the link to where the photo should go
	function href($photo, $album=null, $prefix='') {
		return $prefix.'photo/'.$photo['id'].'/'.($album ? ($album['pagename2'].'-') : '').$photo['pagename'];
	}
	
	// draw out an image tag
	function image($photo, $size, $scale=1) {
		return '<img src="'.$photo['sizes'][$size]['source'].'" width="'.($photo['sizes'][$size]['width']*$scale).'" '.
			'height="'.($photo['sizes'][$size]['height']*$scale).'" '. 
			'alt="'.htmlentities($photo['title'], ENT_QUOTES, 'UTF-8').'" />';
	}
	
	// draw the video code
	function video($video) {
		return '<object '.
		'width="'.$video['width'].'" height="'.$video['height'].'" '.
		'data="'.$video['source'].'" '. 
		'type="application/x-shockwave-flash" '.
		'classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"> '.
		'<param name="flashvars" value="flickr_show_info_box=false"></param> '.
		'<param name="movie" value="'.$video['source'].'"></param> '.
		'<param name="bgcolor" value="#000000"></param> '.
		'<param name="allowFullScreen" value="true"></param> '.
		'<embed type="application/x-shockwave-flash" '.
			'src="'.$video['source'].'" bgcolor="#000000" allowfullscreen="true" '.
			'flashvars="flickr_show_info_box=false" '.
			'width="'.$video['width'].'" height="'.$video['height'].'"></embed></object>';
	}
	
	// this prints out the JavaScript function used to insert a photo into blog posts
	function js() {
		return "function tantan_makePhotoHTML(photo, size) { \n".
			"if (size == 'Video Player') {\n".
				"return '[flickr video='+photo['id']+']'\n".
			"}\n".
				"return '<a href=\"'+photo['targetURL']+'\" class=\"tt-flickr'+(size ? (' tt-flickr-'+size) : '')+'\">' + \n".
				"	'<img src=\"'+photo['sizes'][size]['source']+'\" alt=\"'+photo['title']+'\" width=\"'+photo['sizes'][size]['width']+'\" height=\"'+photo['sizes'][size]['height']+'\" border=\"0\" />' + \n".
				"	'</a> '; \n".
			"} \n";
	}
}


/*
	Base class for common functions used by popup overlay libraries
*/
class TanTanFlickrPopUpOverlay extends TanTanFlickrDisplayBase {
	function href($photo, $album=null, $prefix='') {
		if (isset($photo['sizes']['Video Player'])) {
			return parent::href($photo, $album=null, $prefix='');
		} elseif (isset($photo['sizes'][TANTAN_DISPLAY_POPUP_SIZE]['source'])) {
			return $photo['sizes'][TANTAN_DISPLAY_POPUP_SIZE]['source'];
		} else {
			return $photo['sizes']['Original']['source'];
		}
	}
	function js() {
		return 
			"function tantan_makePhotoHTML(photo, size) { \n".
			"if (size == 'Video Player') {\n".
				"return '[flickr video='+photo['id']+']'\n".
			"}\n".
			"var imgTag = '<img src=\"'+photo['sizes'][size]['source']+'\" alt=\"'+photo['title']+'\" width=\"'+photo['sizes'][size]['width']+'\" height=\"'+photo['sizes'][size]['height']+'\" border=\"0\" />' \n".
			"if (photo['photos']) { \n".
				"return '<a href=\"'+photo['targetURL']+'\" class=\"tt-flickr'+(size ? (' tt-flickr-'+size) : '')+'\">' + \n".
				"imgTag + \n".
				"'</a>'\n".
			"} else if (parseInt(photo['sizes'][size]['width']) < parseInt(photo['sizes']['".TANTAN_DISPLAY_POPUP_SIZE."']['width'])) { \n".
			"	return '<a href=\"'+photo['sizes']['".TANTAN_DISPLAY_POPUP_SIZE."']['source']+'\" class=\"tt-flickr tt-flickr'+(size ? (' tt-flickr-'+size) : '')+'\">' + \n".
			"	imgTag + \n".
			"		'</a> '; \n".
			"} else { return imgTag } \n".
			"} \n";
	}	
}
/*
	FancyBox: http://fancy.klade.lv/
*/
class TanTanFlickrDisplayFancyBox extends TanTanFlickrPopUpOverlay {
	function headTags() {
		wp_enqueue_script('jquery');
		wp_print_scripts();
		echo '<link href="'.TANTAN_DISPLAY_LIBRARY_PATH.'/fancybox-1.0.0/fancy.css" media="screen" rel="stylesheet" type="text/css"/>';
		echo '<script src="'.TANTAN_DISPLAY_LIBRARY_PATH.'/fancybox-1.0.0/jquery.fancybox-1.0.0.js" type="text/javascript"></script>';
		echo '<script type="text/javascript">jQuery(document).ready(function($) { $("a.tt-flickr[href$=.jpg]").fancybox(); });</script>';
	}
}

/*
	Facebox: http://famspam.com/facebox
*/
class TanTanFlickrDisplayFaceBox extends TanTanFlickrPopUpOverlay {
	function headTags() {
		wp_enqueue_script('jquery');
		wp_print_scripts();
		echo '<link href="'.TANTAN_DISPLAY_LIBRARY_PATH.'/facebox-1.1/facebox.css" media="screen" rel="stylesheet" type="text/css"/>';
		echo '<script src="'.TANTAN_DISPLAY_LIBRARY_PATH.'/facebox-1.1/facebox.js" type="text/javascript"></script>';
		echo '<script type="text/javascript">jQuery(document).ready(function($) { $("a.tt-flickr[href$=.jpg]").facebox(); });</script>';
	}
}

/*
	jQuery lightBox: http://leandrovieira.com/projects/jquery/lightbox/
*/
class TanTanFlickrDisplayJQueryLightboxBox extends TanTanFlickrPopUpOverlay {
	function headTags() {
		wp_enqueue_script('jquery');
		wp_print_scripts();
		echo '<link href="'.TANTAN_DISPLAY_LIBRARY_PATH.'/jquery-lightbox-0.5/css/jquery.lightbox.css" media="screen" rel="stylesheet" type="text/css"/>';
		echo '<script src="'.TANTAN_DISPLAY_LIBRARY_PATH.'/jquery-lightbox-0.5/js/jquery.lightbox.js" type="text/javascript"></script>';
		echo '<script type="text/javascript">jQuery(document).ready(function($) { $("a.tt-flickr[href$=.jpg]").lightBox(); });</script>';
	}
}

/*
	FancyZoom: http://www.cabel.name/2008/02/fancyzoom-10.html   (not a jQuery plugin)
*/
class TanTanFlickrDisplayFancyZoom extends TanTanFlickrPopUpOverlay {
	function headTags() {
		echo '<script src="'.TANTAN_DISPLAY_LIBRARY_PATH.'/fancyzoom-1.1/js-global/FancyZoom.js" type="text/javascript"></script>';
		echo '<script src="'.TANTAN_DISPLAY_LIBRARY_PATH.'/fancyzoom-1.1/js-global/FancyZoomHTML.js" type="text/javascript"></script>';
	}
	function footer() {
		echo '<script type="text/javascript">setupZoom();</script>';
	}
}
class TanTanFlickrDisplayThickBox extends TanTanFlickrPopUpOverlay {
	function headTags() {
		wp_enqueue_script('thickbox');
		wp_print_scripts();
		$siteurl = get_option('siteurl');
        echo "<style type='text/css' media='all'>
        	@import '{$siteurl}/wp-includes/js/thickbox/thickbox.css?1';
        	div#TB_title {
        		background-color: #222222;
        		color: #cfcfcf;
        	}
        	div#TB_title a, div#TB_title a:visited {
        		color: #cfcfcf;
        	}
        </style>\n";
		echo '<script type="text/javascript">var tb_pathToImage = "'.$siteurl.'/wp-includes/js/thickbox/loadingAnimation.gif";var tb_closeImage = "'.$siteurl.'/wp-includes/js/thickbox/tb-close.png";jQuery(document).ready(function($) { tb_init("a.tt-flickr[href$=.jpg]"); });</script>';
	}
}


$fancybox  = "class TanTanFlickrDisplay extends TanTanFlickrDisplayFancyBox {};";
$facebox   = "class TanTanFlickrDisplay extends TanTanFlickrDisplayFaceBox {};";
$lightbox  = "class TanTanFlickrDisplay extends TanTanFlickrDisplayJQueryLightboxBox {};";
$fancyzoom = "class TanTanFlickrDisplay extends TanTanFlickrDisplayFancyZoom {};";
$thickbox  = "class TanTanFlickrDisplay extends TanTanFlickrDisplayThickBox {};";

$default   = "class TanTanFlickrDisplay extends TanTanFlickrDisplayBase {}; ";
switch (TANTAN_DISPLAY_LIBRARY) {
	case 'fancybox':  eval($fancybox); break;
	case 'facebox':   eval($facebox); break;
	case 'lightbox':  eval($lightbox); break;
	case 'fancyzoom': eval($fancyzoom); break;
	case 'thickbox':  eval($thickbox); break;
	default: eval($default);
}

add_action('wp_head', create_function('', 'TanTanFlickrDisplay::headTags();'));
add_action('wp_footer', create_function('', 'TanTanFlickrDisplay::footer();'));
?>