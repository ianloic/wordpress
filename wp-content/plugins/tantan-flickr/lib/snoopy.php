<?php
/*
This is a clone of the PEAR HTTP/Request class object. It uses the Snoopy library to do the networking stuff (which basically uses fsockopen). 
Should also work with the HTTPS protocol

only supports POST and GET
*/
class TanTanHTTPRequestSnoopy {
    var $snoopy;
    var $postData;
    var $cookies;
    var $raw;
    var $response;
    var $headers;
    var $url;
	var $method;
    
    function TanTanHTTPRequestSnoopy($url = '', $params = array()) {
		$this->snoopy = new Snoopy();

        $this->postData = array();
        $this->cookies = array();
        $this->headers = array();
        if (!empty($url)) { 
            $this->setURL($url);
        } else { 
            $this->setURL(false); 
        }
        foreach ($params as $key => $value) {
            $this->{'_' . $key} = $value;
        }
        
        $this->addHeader('Connection', 'close');
        
        // We don't do keep-alives by default
        $this->addHeader('Connection', 'close');

        // Basic authentication
        if (!empty($this->_user)) {
            $this->addHeader('Authorization', 'Basic ' . base64_encode($this->_user . ':' . $this->_pass));
        }

        // Proxy authentication (see bug #5913)
        if (!empty($this->_proxy_user)) {
            $this->addHeader('Proxy-Authorization', 'Basic ' . base64_encode($this->_proxy_user . ':' . $this->_proxy_pass));
        }

    }
    
    function addHeader($header, $value) {
        $this->headers[$header] = $value;
    }
    
    function setMethod($method) {
        switch ($method) {
            case 'DELETE':
            break;
            case 'PUT':
                $this->method = 'PUT';
            break;
            case 'POST':
                $this->method = 'POST';
            break;
            default:
            case 'GET':
                $this->method = 'GET';
            break;
        }
    }
    function setURL($url) {
        $this->url = $url;
    }
    function addPostData($name, $value) {
        $this->postData[$name] = $value;
    }
    function addCookie($name, $value) {
        $this->cookies[$name] = array('name' => $name, 'value' => $value);
    }
    function sendRequest() {
        $headers = array(
           "Accept: *.*",
        );
        
        foreach ($this->headers as $k=>$h) {
            $headers[] = "$k: $h";
        }

        if (count($this->cookies) > 0) {
            $this->snoopy->cookies = $this->cookies;
        }
		$this->response = array('header' => '', 'body' => '', 'code' => '');
		
		$this->snoopy->_httpmethod = $this->method;

		if ($this->method == 'POST') {
			$res = $this->snoopy->submit($this->url, $this->postData);
		} else {
			$res = $this->snoopy->fetch($this->url);
		}
		if ($res) {
			$this->response['header'] = $this->snoopy->headers;
			$this->response['body'] = $this->snoopy->results;
			$this->response['code'] = $this->snoopy->response_code;
		}
        return true; // hmm no error checking for now
    }
    
    function getResponseHeader($header=false) {
        if ($header) {
            return $this->response['header'][$header];
        } else {
            return $this->response['header'];
        }
    }
    function getResponseCookies() {
        $hdrCookies = array();
        foreach ($this->response['header'] as $key => $value) {
            if (strtolower($key) == 'set-cookie') {
                $hdrCookies = array_merge($hdrCookies, explode("\n", $value));
            }
        }
        //$hdrCookies = explode("\n", $this->response['header']['Set-Cookie']);
        $cookies = array();
        
        foreach ($hdrCookies as $cookie) {
            if ($cookie) {
                list($name, $value) = explode('=', $cookie, 2);
                list($value, $domain, $path, $expires) = explode(';', $value);
                $cookies[$name] = array('name' => $name, 'value' => $value);
            }
        }
        return $cookies;
    }
    function getResponseBody() {
        return $this->response['body'];
    }
    function getResponseCode() {
        return $this->response['code'];
    }
    function getResponseRaw() {
        return $this->raw;
    }
    function clearPostData($var=false) {
        if (!$var) {
            $this->postData = array();
        } else {
            unset($this->postData[$var]);
        }
    }
}
?>