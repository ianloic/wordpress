<?php
/*
Plugin Name: Google Code Prettify
Plugin URI: http://www.deanlee.cn/wordpress/google-code-prettify-for-wordpress/
Description: this plugin using <a href="http://code.google.com/p/google-code-prettify/">google-code-prettify</a> to highlight source code in your posts. 
Author: Dean Lee
Version: 1.1
Author URI: http://www.deanlee.cn
*/
function gcp_the_content_filter($content) {
		return preg_replace_callback("/<pre\s+.*class\s*=\"prettyprint\">(.*)<\/pre>/siU",
								  "gcp_parse_code",
								 $content);
}
function gcp_parse_code($matches)
{
	$plancode = $matches[0];
	$html_entities_match = array( "|\<br \/\>|", "#<#", "#>#", "|&#39;|", '#&quot;#', '#&nbsp;#' );
	$html_entities_replace = array( "\n", '&lt;', '&gt;', "'", '"', ' ' );
	$plancode = preg_replace( $html_entities_match, $html_entities_replace, $plancode );

	$plancode = str_replace('&lt;', '<', $plancode);
	$plancode = str_replace('&gt;', '>', $plancode);
	return $plancode;
}

function gcp_head() {
	$current_path = get_option('siteurl') .'/wp-content/plugins/' . basename(dirname(__FILE__)) .'/';
	?>
	<link href="<?php echo $current_path; ?>prettify.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo $current_path; ?>prettify.js"></script>
	<?php
}

function gcp_footer(){
	?>
	<script type="text/javascript">
		window.onload = function(){prettyPrint();};
	</script>
<?php
}

add_action('wp_head','gcp_head');
add_action('get_footer','gcp_footer');
/*add_filter('the_content', 'gcp_the_content_filter', 0);*/
?>
