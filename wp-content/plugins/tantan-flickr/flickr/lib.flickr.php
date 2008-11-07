<?php
/*
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

$Revision: 297 $
$Date: 2008-09-22 11:15:23 -0400 (Mon, 22 Sep 2008) $
$Author: joetan54 $

*/

// keys
// add this to your wp-config.php to hard code your keys
if (!defined('TANTAN_FLICKR_APIKEY')) define('TANTAN_FLICKR_APIKEY', get_option('silas_flickr_apikey'));
if (!defined('TANTAN_FLICKR_SHAREDSECRET')) define('TANTAN_FLICKR_SHAREDSECRET', get_option('silas_flickr_sharedsecret'));

require_once(dirname(__FILE__)."/lib.phpFlickr.php");

class TanTanFlickr extends tantan_phpFlickr {
    var $_tantan_apiKey;
    var $_tantan_sharedSecret;
    var $_tantan_user;
    var $_tantan_useCache;
    var $_tantan_errorCode;
    var $_tantan_errorMsg;
    var $_tantan_cacheExpire;
    var $_tantan_options;
    
    function TanTanFlickr() {
        $this->_tantan_apiKey = TANTAN_FLICKR_APIKEY;
        $this->_tantan_sharedSecret = TANTAN_FLICKR_SHAREDSECRET;
        $this->_tantan_errorCode = array();
        $this->_tantan_errorMsg = array();
        $this->_tantan_cacheExpire = -1; //3600;
        $this->_tantan_options = array();
        
        parent::tantan_phpFlickr(TANTAN_FLICKR_APIKEY, TANTAN_FLICKR_SHAREDSECRET, false);
        if (TANTAN_FLICKR_CACHEMODE == 'db') {
            global $wpdb; // hmm, might need to think of a better way of doing this
            $this->enableCache('db', $wpdb);
		} elseif (TANTAN_FLICKR_CACHEMODE == 'false') {
			// no cache
        } else {
            $cacheDir = dirname(__FILE__).'/flickr-cache';
            if (!file_exists($cacheDir)) {
                mkdir($cacheDir, 0770);
            }
            $this->enableCache('fs', $cacheDir);
        }
    }
    
    function getAPIKey() {
        return $this->_tantan_apiKey;
    }
    function getSharedSecret() {
        return $this->_tantan_sharedSecret;
    }
    function getFrob() {
        $this->startClearCache();
        return $this->auth_getFrob();
    }
    
    function getUser() {
        return $this->_tantan_user;
    }
    
    function setUser($user) {
        $this->_tantan_user = $user;
    }
    
    function setOption($key, $value=NULL) {
        if (is_array($key)) {
            $this->_tantan_options = $key;
        } else {
            $this->_tantan_options[$key] = $value;
        }
    }
    function getOption($key) {
        return $this->_tantan_options[$key];
    }
    
    function getRecent($extras = NULL, $per_page = NULL, $page = NULL) {
		if ($return = $this->getObjCache('getRecent', array($extras, $per_page, $page))) {
			return $return;
		}
        $photos = $this->photos_getRecent($extras, $per_page, $page);
        $return = array();
        if (is_array($photos['photo'])) foreach ($photos['photo'] as $photo) {
            $row = array();
            $row['id'] = $photo['id'];
            $row['title'] = $photo['title'];
            $row['sizes'] = $this->getPhotoSizes($photo['id']);
            $row['pagename2'] = $this->_sanitizeTitle($photo['title']);
            $row['pagename'] = $row['pagename2'] . '.html';
            //$row['total'] = $photos['total'];
            $return[$photo['id']] = $row;
        }
		$this->setObjCache('getRecent', array($extras, $per_page, $page), $return);
        return $return;
    }
    function getInteresting($date = NULL, $extras = NULL, $per_page = NULL, $page = NULL) {
		if ($return = $this->getObjCache('getInteresting', array($extras, $per_page, $page))) {
			return $return;
		}
        $photos = $this->interestingness_getList($date, $extras, $per_page, $page);
        $return = array();
        if (is_array($photos['photo'])) foreach ($photos['photo'] as $photo) {
            $row = array();
            $row['id'] = $photo['id'];
            $row['title'] = $photo['title'];
            $row['sizes'] = $this->getPhotoSizes($photo['id']);
            $row['pagename2'] = $this->_sanitizeTitle($photo['title']);
            $row['pagename'] = $row['pagename2'] . '.html';
            //$row['total'] = $photos['total'];
            $return[$photo['id']] = $row;
        }
		$this->setObjCache('getInteresting', array($extras, $per_page, $page), $return);
        return $return;
    }    
    function getPhotosByTags($tags) {
        $user = $this->auth_checkToken();
        //TODO: should disable caching here or something
        $photos = $this->search(array(
            'tags' => $tags,
            'user_id' => $user['user']['nsid'],
        ));
        return $photos;
    }
    function getRelatedTags($tags) { // hmm this get's everyones tags
        $tags = $this->tags_getRelated($tags);
        return $tags;
    }
    
    function getTags($count=100) {
        $data = $this->tags_getListUserPopular(NULL, $count);
        $return = array();
        if (is_array($data)) foreach ($data as $tag) {
            $return[$tag['_content']] = $tag['count'];
        }
        return $return;
    }
    function getTagsByGroup($group_id, $count=100) {
        $return = array();
        return $return;
    }
    function getTagsByAlbum($album_id, $count=100) {
        $return = array();
        return $return;
    }
    
    // no caching
    function search($args) {
		if ($return = $this->getObjCache('search', $args)) {
			return $return;
		}
        $photos = $this->photos_search($args);
        $return = array();
        if (is_array($photos['photo'])) foreach ($photos['photo'] as $photo) {
            $row = array();
            $row['id'] = $photo['id'];
            $row['title'] = $photo['title'];
            $row['sizes'] = $this->getPhotoSizes($photo['id']);
            $row['pagename2'] = $this->_sanitizeTitle($photo['title']);
            $row['pagename'] = $row['pagename2'] . '.html';
            //$row['total'] = $photos['total'];
            $return[$photo['id']] = $row;
        }
		$this->setObjCache('search', $args, $return);
        return $return;
    }
    
    function getAlbumsActual() { // get non cached list
        $this->startClearCache();
        $albums = $this->getAlbums();
        $this->doneClearCache();
        return $albums;
    }
    
    function getAlbums() {
        $albums = $this->photosets_getList();
        $return = array();
        if (is_array($albums['photoset'])) foreach ($albums['photoset'] as $album) {
            $row = array();
            $row['id'] = $album['id'];
            $row['title'] = $album['title'];
            $row['description'] = $album['description'];
            $row['primary'] = $album['primary'];
            $row['photos'] = $album['photos'];
            $row['pagename2'] = $this->_sanitizeTitle($album['title']);
            $row['pagename'] = $row['pagename2'] . '.html';
            $return[$row['id']] = $row;
        }
        return $return;
    }
    
    function getAlbum($album_id) {
        $album_id = $album_id . '';
        $album = $this->photosets_getInfo($album_id);
        $return = array();
        if (is_array($album)) {
            $return['id'] = $album['id'];
            $return['owner'] = $album['owner'];
            $return['primary'] = $album['primary'];
            $return['title'] = $album['title'];
            $return['description'] = $album['description'];
            $return['photos'] = $album['photos'];
            $return['pagename2'] = $this->_sanitizeTitle($album['title']);
            $return['pagename'] = $return['pagename2'] . '.html';
            
        }
        return $return;
    }
    
    function getGroupsActual() {
		if (!TANTAN_FLICKR_DISPLAYGROUPS) return array();
	
        $this->startClearCache();
        $groups = $this->getGroups();
        $this->doneClearCache();
        return $groups;
    }
    function getGroups() {
		if (!TANTAN_FLICKR_DISPLAYGROUPS) return array();
		
        $groups = $this->groups_pools_getGroups();
        $return = array();

        if (is_array($groups['group'])) foreach ($groups['group'] as $group) {
            $row = array();
            $row['id'] = $group['id'];
            $row['name'] = $group['name'];
            $row['photos'] = $group['photos'];
            $row['privacy'] = $group['privacy'];
            $row['admin'] = $group['admin'];
            $row['pagename2'] = $this->_sanitizeTitle($group['name']);
            $row['pagename'] = $row['pagename2'] . '.html';
            $row['iconurl'] = ($group['iconserver'] > 0) ? 'http://static.flickr.com/'.$group['iconserver'].'/buddyicons/'.$group['id'].'.jpg'
                : 'http://www.flickr.com/images/buddyicon.jpg';

			$this->doneClearCache();
            $info = $this->getGroup($group['id']);
			$this->startClearCache();
            $row['description'] = $info['description'];
            $row['privacy'] = $info['privacy'];
            $row['members'] = $info['members'];
            $row['flickrURL'] = $info['flickrURL'];
            $return[$row['id']] = $row;
        }
        return $return;
    }
    function getGroup($group_id) {
		if (!TANTAN_FLICKR_DISPLAYGROUPS) return array();
	
        $group_id = $group_id . '';
        $group = $this->groups_getInfo($group_id);
        $return = array();
        if (is_array($group)) {
            $groups = $this->groups_pools_getGroups();
            
            foreach ($groups['group'] as $g) if ($g['id'] == $group_id) break;
            
            $return['id'] = $group['id'];
            $return['name'] = $group['name'];
            $return['description'] = $group['description'];
            $return['members'] = $group['members'];
            $return['photos'] = $g['photos'];
            $return['privacy'] = $group['privacy'];
            $return['pagename2'] = $this->_sanitizeTitle($group['name']);
            $return['pagename'] = $return['pagename2'] . '.html';
            $return['flickrURL'] = $this->urls_getGroup($group_id);
        }
        return $return;
    }
    
    function getPhotosByGroup($group_id, $tags=NULL, $user_id = NULL, $extras = NULL, $per_page = NULL, $page = NULL) {
		if (!TANTAN_FLICKR_DISPLAYGROUPS) return array();
	
        $group_id = $group_id . '';
        
        $this->_tantan_cacheExpire = 3600;
        $photos = $this->groups_pools_getPhotos($group_id, $tags, $user_id, $extras, $per_page, $page);
        $this->_tantan_cacheExpire = -1;
        
        
        $return = array();
        if (is_array($photos['photo'])) foreach ($photos['photo'] as $photo) {
            $row = array();
            $row['id'] = $photo['id'];
            $row['title'] = $photo['title'];
            $row['sizes'] = $this->getPhotoSizes($photo['id']);
            $row['pagename2'] = $this->_sanitizeTitle($photo['title']);
            $row['pagename'] = $row['pagename2'] . '.html';
            $return[$photo['id']] = $row;
        }
        return $return;
    }
        
    function getPhotos($album_id, $extras = NULL, $per_page = NULL, $page = NULL) {
		if ($return = $this->getObjCache('getPhotos', array($extras, $album_id, $per_page, $page))) {
			return $return;
		}
        $album_id = $album_id . '';
        $photos = $this->photosets_getPhotos($album_id, $extras, NULL, $per_page, $page);
        $return = array();
        if (is_array($photos['photo'])) foreach ($photos['photo'] as $photo) {
            $row = array();
            $row['id'] = $photo['id'];
            $row['title'] = $photo['title'];
            $row['sizes'] = $this->getPhotoSizes($photo['id']);
            $row['pagename2'] = $this->_sanitizeTitle($photo['title']);
            $row['pagename'] = $row['pagename2'] . '.html';
            $row = array_merge($row, (array) $this->getPhoto($photo['id']));
            $return[$photo['id']] = $row;
        }
		$this->setObjCache('getPhotos', array($extras, $album_id, $per_page, $page), $return);
        return $return;
    }
    
    function getPhoto($photo_id) {
        $photo_id = $photo_id . '';
        $photo = $this->photos_getInfo($photo_id);

		// do some housekeeping and clean stuff up to save memory
		$flatten = array('tag', 'url');
		foreach ($flatten as $key) {
			$flattend = array();
			if (is_array($photo[$key.'s'][$key])) foreach ($photo[$key.'s'][$key] as $node) $flattend[] = $node['_content'];
			unset($photo[$key.'s']);
			$photo[$key.'s'] = $flattend;
		}		
		foreach (array('farm','rotation','originalsecret','originalformat', 'secret', 'server') as $key) unset($photo[$key]);
        return $photo;
    }
    function getComments($photo_id) {
        $photo_id = $photo_id . '';
        $this->_tantan_cacheExpire = 3600;
        $comments = $this->photos_comments_getList($photo_id);
        $this->_tantan_cacheExpire = -1;
        
        $return = array();
        $comments = $comments['comment'];
        if (is_array($comments)) foreach ($comments as $comment) {
            $row = array();
            $row['id'] = $comment['id'];
            $row['author'] = $this->people_getInfo($comment['author']);
            $row['datecreate'] = $comment['datecreate'];
            $row['permalink'] = $comment['permalink'];
            $row['comment'] = $comment['_content'];
            $return[$comment['id']] = $row;
        }
        return $return;
    }
    
    function getPhotoSizes($photo_id) {
        $photo_id = $photo_id . '';
        $sizes = $this->photos_getSizes($photo_id);
        $return = array();
        if (is_array($sizes)) foreach ($sizes as $k => $size) {
            $return[$size['label']] = $size;
        }
        return $return;
    }
    function getContext($photo_id, $album_id='') {
        $photo_id = $photo_id . '';
        $album_id = $album_id . '';
        $context = array();
        if ($album_id) {
            $context = $this->photosets_getContext($photo_id, $album_id);
        } else {
            $context = $this->photos_getContext($photo_id);
        }
        $context['prevphoto']['pagename'] = $this->_sanitizeTitle($context['prevphoto']['title']).'.html';
        $context['nextphoto']['pagename'] = $this->_sanitizeTitle($context['nextphoto']['title']).'.html';
        return $context;
    }
    function getContextByGroup($photo_id, $group_id) {
		if (!TANTAN_FLICKR_DISPLAYGROUPS) return array();
	
        $photo_id = $photo_id . '';
        $group_id = $group_id . '';
        $context = $this->groups_pools_getContext($photo_id, $group_id);
        $context['prevphoto']['pagename'] = $this->_sanitizeTitle($context['prevphoto']['title']).'.html';
        $context['nextphoto']['pagename'] = $this->_sanitizeTitle($context['nextphoto']['title']).'.html';
        return $context;
    }

    function manualSort($array, $order) {
        if (!is_array($array)) { return array(); }
        
        if (is_array($order)) {
            $pre = array();
            //$mid = array();
            $pos = array();
            foreach ($order as $id => $ord) {
                if ($array[$id]) {
                    if (((int) $ord < 0)) { 
                        $pre[$id] = $array[$id];
                        unset($array[$id]);
                    } elseif (((int) $ord > 0)) { 
                        $pos[$id] = $array[$id];
                        unset($array[$id]);
                    //} else {
                        //$mid[$id] = $array[$id];
                    }
                }
            }
            return $pre + $array + $pos;
        } else {
            return $array;
        }
    }

    function startClearCache() {
        $this->_tantan_useCache = false;
    }
    function doneClearCache() {
        $this->_tantan_useCache = true;
    }
    function clearCache() {
        global $wpdb;
        if (TANTAN_FLICKR_CACHEMODE == 'db') {
            $result = $this->cache_db->query("DELETE FROM " . $wpdb->prefix . "postmeta WHERE meta_key LIKE 'flickr-%';");
            $result = $this->cache_db->query("DELETE FROM " . $this->cache_table . ";");
            return true;
        } elseif ($this->_clearCache($this->cache_dir)) {
            $result = $this->cache_db->query("DELETE FROM " . $wpdb->prefix . "postmeta WHERE meta_key LIKE 'flickr-%';");
            return @mkdir($this->cache_dir, 0770);
        } else {
            return false;
        }
    }
	function clearCacheStale($what=false, $force=false) {
		if (TANTAN_FLICKR_CACHEMODE == 'db') {
			$commands = array(
			    //'flickr.groups.getInfo' => 4320000,
				'flickr.groups.pools.getContext' => 432000,
				'flickr.groups.pools.getGroups' => 432000,
				'flickr.groups.pools.getPhotos' => 432000,
				//'flickr.people.getInfo' => 432000,
				'flickr.photos.comments.getList' => 86400,
				'flickr.photos.getContext' => 86400,
				//'flickr.photos.getInfo' => 86400,
				'flickr.photos.getRecent' => 43200,
				//'flickr.photos.getSizes' => 86400,
				'flickr.photos.search' => 43200,
				//'flickr.photosets.getContext' => 43200,
				//'flickr.photosets.getInfo' => 86400,
				'flickr.photosets.getList' => 43200,
				'flickr.photosets.getPhotos' => 43200,
				'flickr.tags.getListUserPopular' => 86400,
				//'flickr.urls.getGroup' => 86400,
				'getPhotos' => 43200,
				'search' => 43200,
				'getRecent' => 43200,
				'getRandom'=> 600,
				);
			if($what && $commands[$what]){
			    if ($force) {
				    $time = time() - 120;
			    } else {
			        $time = time() - $commands[$what];
			    }
				$result = $this->cache_db->query("DELETE FROM " . $this->cache_table . " WHERE command = '".$what.($time ? "' AND created < '".strftime("%Y-%m-%d %H:%M:%S", $time) : '')."' ;");
			}else {
				foreach ($commands as $command => $timeout) {
				    if ($force) {
    				    $time = time() - 120;
    			    } else {
                        $time = time() - $timeout;
    			    }
					$result = $this->cache_db->query("DELETE FROM " . $this->cache_table . " WHERE command = '".$command.($time ? "' AND created < '".strftime("%Y-%m-%d %H:%M:%S", $time) : '')."' ;");
				}
			}
      return true;
		}
	}
    function _clearCache($dir) {
       if (substr($dir, strlen($dir)-1, 1) != '/')
           $dir .= '/';
    
       if ($handle = opendir($dir)) {
           while ($obj = readdir($handle)) {
               if ($obj != '.' && $obj != '..') {
                   if (is_dir($dir.$obj)) {
                       if (!$this->_clearCache($dir.$obj))
                           return false;
                   }
                   elseif (is_file($dir.$obj)) {
                       if (!unlink($dir.$obj)) return false;
                   }
               }
           }
           closedir($handle);
    
           if (!@rmdir($dir)) return false;
           return true;
       }
       return false;
    }
    function _sanitizeTitle($title) {
		if (function_exists('sanitize_title_with_dashes')) {
			return sanitize_title_with_dashes($title);
		}
        // try this WP function sanitize_title_with_dashes()

        // comment out these two lines, and use the next two if you like underscores instead
        $output = preg_replace('/\s+/', '-', $title);
        $output = preg_replace("/[^a-zA-Z0-9-]/" , "" , $output);
        //$output = preg_replace("/\s/e" , "_" , $title);
        //$output = preg_replace("/\W/e" , "" , $output);
   	
       // Remove non-word characters
       return $output;
    }
    function getErrorMsgs() {
        return implode("\n", $this->_tantan_errorMsg);
    }
        
    /*
        Reimplemented methods
    */
    function request ($command, $args = array(), $nocache = false) {
        $nocache = ($nocache ? true : 
            ($this->_tantan_useCache ? false : true));
        if ($this->getOption('hidePrivatePhotos')) {
            $args['privacy_filter'] = 1;
            if ($command != 'flickr.auth.checkToken')  {
                $token = $this->token;
                //$this->token = ''; // just make an unathenticated call
            }
        }
        parent::request($command, $args, $nocache);
        if ($token) $this->token = $token;
    }

    
    function enableCache($type, $connection, $cache_expire = 600, $table = 'flickr_cache') {
        global $wpdb;
        if ($type == 'db') {
            $this->cache = 'db';
            $this->cache_db =& $connection;
            $this->cache_table = $wpdb->prefix.'silas_flickr_cache';
            $this->_tantan_useCache = true;
        } elseif ($type == 'fs') {
            $this->cache = 'fs';
            $this->cache_expire = $cache_expire;
            $this->cache_dir = $connection;
            $this->_tantan_useCache = true;
        }
    }

    function getCached ($request) // buggy, time based caching doesnt work
    {
		if (!$this->_tantan_useCache) return false;
		
        $reqhash = $this->makeReqHash($request);
        if ($this->cache == 'db') {
            $result = $this->cache_db->get_col("SELECT response FROM " . $this->cache_table . " WHERE request = '" . $reqhash . "'");
            if (!empty($result)) {
                return array_pop($result);
            }
            return false;
        } elseif ($this->cache == 'fs') {
            //Checks the database or filesystem for a cached result to the request.
            //If there is no cache result, it returns a value of false. If it finds one,
            //it returns the unparsed XML.
            
            $pre = substr($reqhash, 0, 2);
            $file = $this->cache_dir . '/' . $pre . '/' . $reqhash . '.cache';

            if (file_exists($file)) {
                if ($this->_tantan_cacheExpire > 0) {
                    if ((time() - filemtime($file)) > $this->_tantan_cacheExpire) {
                        return false;
                    }
                } 
                return file_get_contents($file);
            } else {
                return false;
            }
        }
    }
    
    function cache ($request, $response, $expiration=false) {
		if (!$expiration) {
			$expiration = time() + TANTAN_FLICKR_CACHE_TIMEOUT; // 30 days default cache
		}
        $reqhash = $this->makeReqHash($request);
        if ($this->cache == 'db') {
            $this->cache_db->query("DELETE FROM $this->cache_table WHERE request = '$reqhash'");
            $sql = "INSERT INTO " . $this->cache_table . " (command, request, response, created, expiration) VALUES ('".$request['method']."', '$reqhash', '" . addslashes($response) . "', '" . strftime("%Y-%m-%d %H:%M:%S") . "', '" . strftime("%Y-%m-%d %H:%M:%S", $expiration) . "')";
            $this->cache_db->query($sql);
        } elseif ($this->cache == 'fs') {
            //Caches the unparsed XML of a request.
            
            $pre = substr($reqhash, 0, 2);  // store into buckets
            $file = $this->cache_dir . "/" . $pre . '/' . $reqhash . ".cache";
            
            if (!file_exists($this->cache_dir . '/' . $pre)) {
                mkdir($this->cache_dir . '/' . $pre, 0770);
            }
            $fstream = fopen($file, "w");
            if ($fstream) {
                $result = fwrite($fstream,$response);
                fclose($fstream);
            }
            return $result;
        }
    }
    function makeReqHash($request) {
        if (is_array($request)) {
			unset($request['api_key']);
			unset($request['auth_token']);
			unset($request['format']);
		}
        return md5(serialize($request));
    }

	function getObjCache($function, $params) {
		if ($this->cache == 'db') {
			$request = array(
				'method' => $function,
				'params' => $params,
			);
			$return = $this->getCached($request);
			if ($return) {
				return unserialize($return);
			} else {
				return false;
			}
		}
	}
	function setObjCache($function, $params, $obj) {
		if ($this->cache == 'db') {
			$request = array(
				'method' => $function,
				'params' => $params,
			);
            return $this->cache($request, serialize($obj));
		}
	}
    function auth_getToken ($frob) 
    {
        if ($_SESSION['phpFlickr_auth_token']) return $_SESSION['phpFlickr_auth_token'];

        /* http://www.flickr.com/services/api/flickr.auth.getToken.html */
        $this->request('flickr.auth.getToken', array('frob'=>$frob));
        $_SESSION['phpFlickr_auth_token'] = $this->parsed_response['auth']['token'];
        return $_SESSION['phpFlickr_auth_token'];
    }
    
}
?>
