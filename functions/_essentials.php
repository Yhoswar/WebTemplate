<?php 

///////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////// GENERAL FUNCTIONS ////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

function clear_inject_mysql($string){
	
	if (($string) and !is_array($string)) { 
		$string=str_replace(";","",$string);
		$string=str_replace("<?","",$string);
		$string=str_replace("#","",$string);
		$string=str_replace("?>","",$string);
		$string=str_replace("$","",$string);
		$string=addslashes($string);
		
	}
	
	return $string;
}

function ml($phrase, $text_replaces) {
	
	$key_replaces = explode ( "|", $text_replaces );
	
	foreach ( $key_replaces as $key_r ) {
		$keys = explode ( "->", $key_r );
		if ($keys [0] != '')
			$phrase = str_replace ( "#" . $keys [0] . "#", $keys [1], $phrase );
	}
	return $phrase;
}

function mla($phrase, $array_replaces) {
	
	foreach ( $array_replaces as $key => $value ) $phrase = str_replace ( '#' . $key . '#', $value, $phrase );
	
	return $phrase;
}

function _bot_detected() {

  return (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/bot|crawl|slurp|spider|google|mediapartners/i', $_SERVER['HTTP_USER_AGENT']));
  
}

///////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////// LANGUAGE FUNCTIONS ////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

function HostURL() {
	
     $_HOST = explode(".",$_SERVER["HTTP_HOST"]);
    
     unset ($_HOST[0]);
    
     return ($_HOST = implode(".",$_HOST));
   
}

function CompleteHostURL() {
	
     return ($_SERVER["HTTP_HOST"]);
   
}

function HostURLHTTP($AllUrl=false) {
	
     $_HOST = explode(".",$_SERVER["HTTP_HOST"]);
     
     if ($AllUrl) return ($_SERVER["REQUEST_SCHEME"]."://".$_HOST = implode(".",$_HOST)); 
     
     unset ($_HOST[0]);
     
     return ($_SERVER["REQUEST_SCHEME"]."://www.".$_HOST = implode(".",$_HOST));
   
}

function language_detect($default=false){
	
	$page = $_SERVER["REQUEST_URI"];
	
	if (substr($page,0,1) == "/") $page = substr($page,1,99999);
	
	$url  = explode("/",$page);
	
	$lang = $url[0];
	
	switch($lang) {
		case ('es') : { return "es"; break; }
		case ('ca') : { return "ca"; break; }
		case ('en') : { return "en"; break; }
		case ('fr') : { return "fr"; break; }
		case ('de') : { return "de"; break; }
		case ('pt') : { return "pt"; break; }
		case ('it') : { return "it"; break; }
		default     : { return $default; break; }
	}
}

function construct_url($url,$lang,$AllUrl=false){
	
	global $_urls;
	global $_LanguageDefault;	
	
	if (!$url and $lang == $_LanguageDefault) return HostURLHTTP($AllUrl)."";
	if (!$url and $lang != $_LanguageDefault) return HostURLHTTP($AllUrl)."/$lang/";
	
	if (substr($url,0,1) != "/") $url = "/$url";
	
	$lang = strtolower($lang);
	
	if ($lang == $_LanguageDefault)  return HostURLHTTP($AllUrl)."$url.html";
	
	if (!isset($_urls[substr($url,1,9999)][$lang]))  return HostURLHTTP($AllUrl)."/$lang"."$url.html";
	
	return HostURLHTTP($AllUrl)."/$lang/".$_urls[substr($url,1,9999)][$lang].".html";
	

}

function change_language($new_lang){
	
	global $_urls;
	global $_LanguageDefault;	

	$page = $_SERVER["REQUEST_URI"];
	
	if (substr($page,0,1) == "/") $page = substr($page,1,99999);
	
	$url  = explode("/",$page);
	
	if ((!$url[0] or (!@$url[1] and strlen($url[0]) < 3)) and $new_lang == $_LanguageDefault) return HostURLHTTP()."";
	if ((!$url[0] or (!@$url[1] and strlen($url[0]) < 3)) and $new_lang != $_LanguageDefault) return HostURLHTTP()."/$new_lang/";
	
	$lang_url = strtolower($url[0]);
	
	switch($lang_url) {
		case ('es') : { unset($url[0]); break; }
		case ('ca') : { unset($url[0]); break; }
		case ('en') : { unset($url[0]); break; }
		case ('fr') : { unset($url[0]); break; }
		case ('de') : { unset($url[0]); break; }
		case ('pt') : { unset($url[0]); break; }
		case ('it') : { unset($url[0]); break; }
		default     : { $lang_url = $_LanguageDefault; break; }
	}
	
	$url  = implode("/",$url);	

	$params  = explode(".html",$url);
	
	$url = $params[0];
	
	$RootUrl = "";
	
	if (is_array($_urls)){
		foreach ($_urls as $u=>$l){
			
			if ($u              == $url and @$l[$new_lang])                                    return HostURLHTTP()."/$new_lang/".$l[$new_lang].".html".$params[1];
			if (@$l[$lang_url]  == $url and @$l[$lang_url] and $new_lang == $_LanguageDefault) return HostURLHTTP()."/$u.html".$params[1];
			if (@$l[$lang_url]  == $url and @$l[$lang_url] and $new_lang != $_LanguageDefault) $RootUrl = $u;
			
		}
	}
	
	if ($RootUrl and isset($_urls[$RootUrl][$new_lang])) return HostURLHTTP()."/$new_lang/".$_urls[$RootUrl][$new_lang].".html".$params[1];
	
	return HostURLHTTP()."/$page";
	

}

function HTTP_ERR_RETURN($code,$msg){

    echo $msg;

    header("HTTP/1.0 $code Not Found");

    exit;


}

function getSubdomain($subdomain){
	
	$domain = $_SERVER["HTTP_HOST"];
	
	if (substr_count($domain,"www.") > 0) $domain = substr($domain,4,9999);
	
	$finalUrl = $subdomain.".".$domain;
	
	return "//$finalUrl";
}

function retrieveSubdomain(){
	
	$_HOST = explode(".",$_SERVER["HTTP_HOST"]);
	
	return (strtolower($_HOST[0]));
}

///////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////// COOKIES FUNCTIONS ////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

	
function encrypt($string, $key) {
	
   $result = '';
   
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   
   return base64_encode($result);
   
}

function decrypt($string, $key) {
	
   $result = '';
   $string = base64_decode($string);
   
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   
   return $result;
   
}

function setCookieValues($CookieName,$values,$settime) {
	
     $keyEncript = time();
     $value      = $keyEncript;
     $_HOST      = HostURL();
     $time       = ($settime === true) ? time()+60*60*24*30*12 : 0;  // Un any
     
     foreach ($values as $key=>$row){ $value .= "**".encrypt("$key=>$row",$keyEncript+63); }
         
     setcookie($CookieName, "$value", $time, "/", ".$_HOST", 0,false);
   
}

function setCookieValue($CookieName,$value,$settime) {
	
	 // Si no existeix la cookie la creem de 0 amb el valor passat
	 if (!isset($_COOKIE[$CookieName])) {
		 $key = substr($value,0,strpos($value,"=>"));
		 $val = substr($value,strpos($value,"=>")+2);	 	
	 	 setCookieValues($CookieName,array($key=>$val),0);
	 	 return;
	 }
	 
	 $cook        = explode("**",$_COOKIE[$CookieName]);
	 $keyEncript  = $cook[0];
	
	 $key = substr($value,0,strpos($value,"=>"));
	 $val = substr($value,strpos($value,"=>")+2);
	
	 $ck[] = $keyEncript;
	
     // Desencriptem les dades
     foreach ($cook as $row) { 
    	$aux = decrypt($row,$keyEncript+63);
    	$ck[substr($aux,0,strpos($aux,"=>"))] = substr($aux,strpos($aux,"=>")+2);
     }
    
     unset ($ck['']);
    
     $ck[$key] = $val;
     
     $_HOST      = HostURL();
     $time       = ($settime === true) ? time()+60*60*24*30*12 : 0;  // Un any
     
     $value = $keyEncript;
     
     foreach ($ck as $key=>$row){ $value .= "**".encrypt("$key=>$row",$keyEncript+63); }
         
     setcookie($CookieName, "$value", $time, "/", ".$_HOST", 0,false);
     
     $_COOKIE[$CookieName] = $value;
   
}
	
function getCookieValue($CookieName,$value) {
	
	if (!isset($_COOKIE[$CookieName])) return '';
	
	$cook        = @explode("**",$_COOKIE[$CookieName]);
	$lenght      = @strlen($value);
	$keyEncript  = (int) @$cook[0];
	$value       = @strtolower($value);
	
	// Desencriptem les dades
    foreach ($cook as $row) { 
    	$aux = decrypt($row,$keyEncript+63);
    	if ( strtolower(substr($aux,0,$lenght)) == $value) return (substr($aux,$lenght+2));
    }

    return ('');
   
}
