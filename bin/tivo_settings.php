<?php

/*
 *  Define file locations from the point of view for index.php
 *  
 *  IE "C:\Program Files\tnpl"
 *  or "/Users/myMac/TNPL/"
 *
 * NOTE: 
 * delim and $binpath has been moved to index.php allowing this settings file to be in a private location
 * 
 */
//$root_path = "." . delim;	// the full path so PHP can find its associated files (relative locations may be used)
$root_path = delim . "usr" . delim . "local" . delim . "tivo_now_playing" . delim;

$image_path = $root_path . "images" . delim ; // file path to images (TODO get the images from an external source)


$xml_path = "xml/"; // temporary location for data downloaded from TiVos (may be shared with other instances of index.php)

// location and running options for the wget program
//define("wgetpath", delim . "usr" . delim . "local" . delim . "bin" . delim . "wget --no-check-certificate");


// define("wgetpath", delim . "usr" . delim . "bin" . delim . "wget --dns-timeout=45 --connect-timeout=30 --read-timeout=20 --max-redirect=25 --tries=2 --level=0");

// moved wget from /usr/bin to usr/local/bin and use old working version of wget
//define("wgetpath", delim . "usr" . delim . "local" . delim . "bin" . delim . "wget --ciphers=DEFAULT:@SECLEVEL=1 --no-check-certificate --dns-timeout=45 --connect-timeout=30 --read-timeout=20 --max-redirect=25 --tries=2 --level=0");
define("wgetpath", delim . "usr" . delim . "local" . delim . "bin" . delim . "wget --secure-protocol=auto --no-check-certificate --dns-timeout=45 --connect-timeout=30 --read-timeout=20 --max-redirect=25 --tries=2 --level=0 --no-verbose ");


// define("wgetpath", delim . "usr" . delim . "local" . delim . "bin" . delim . "wget --no-check-certificate");

define("tivoport", "80");


// locations defined from the point of view of the browser
// used in the html pages to link to archives and back to the index
// TODO find a way to reference the location in the browser 

// $myurl="file:///usr/local/tivo_now_playing/";
$myurl="/tnpl/";

//  if using the default tree the following needs no modification
$mybin	= $myurl . "bin/";  	// HTML path to find support files (ie, javascript)
$images = $myurl . "images" . delim ; 	// HTML path to images
//$images = "images" . delim ; // file path to images 

// javascript
$mytjs = $mybin . "tivo_now_playing.js";
$mysorttable = $mybin . "sorttable.js";

// CSS files
$mycss = $mybin . "tivo.css"; 	// HTML path for css used in main pages
$summary_css = $mycss;		// HTML path for css used in the summary table page

//  default settings for the TiVos can be overridden for each box
$mymak1    = "1234567890";	// MAK address for your TiVo; find it online or in settings on the TiVo
$mysubnet1 = "192.168.1";	// first 3 quads of the IP address (saves typing and typo errors)
$mymak2=   = "2345678901";	// Possible to use a second account if needed
$mysubnet1 = "192.168.2";       // and network

//
$mywrn    = "15";		// when % free space gets below this value color changes to yellow 
$mycrit   = "10";		// below this value color changes to red

// settings for each TiVo monitored
// note: size_gb will be adjusted upward as drive gets full. Auto-size can be overridden, see log/$name$_drive_size.php

$tivos = array(
	"t01" => array("ip" => "$mysubnet1.101", "mak" => $mymak1, "model"=> "849", "size_gb" => "0", "warning" => $mywrn, "critical" => $mycrit, "name" => "TiVo01", "nowplaying" => "BoltP - Now Playing", "feedtitle" => "TiVo1","shorttitle" => "BoltP", "feeddescription" => "BoltP - Now Playing", "feedlink" => $myurl, "css" => $mycss, "js" => $mytjs),

	"t02" => array("ip" => "$mysubnet1.102", "mak" => $mymak1, "model"=> "746", "size_gb" => "0", "warning" => $mywrn, "critical" => $mycrit, "name" => "TiVo02", "nowplaying" => "Roamio - Now Playing", "feedtitle" => "TiVo", "shorttitle" => "Roamio", "feeddescription" => "Roamio - Now Playing", "feedlink" => $myurl, "css" => $mycss, "js" => $mytjs),

	"t03" => array("ip" => "$mysubnet2.103", "mak" => $mymak2, "model"=> "D6E", "size_gb" => "0", "warning" => $mywrn, "critical" => $mycrit, "name" => "TiVo03", "nowplaying" => "Edge - Now Playing", "feedtitle" => "TiVo", "shorttitle" => "Edge", "feeddescription" => "Edge - Now Playing", "feedlink" => $myurl, "css" => $mycss, "js" => $mytjs),

);


// other options
$dorss = 0; 			// 0 or 1 : create RSS files
$disabledownloadlinks = 1; 	// 0 or 1 : 0 = show download links in HTML
$disablexmllinks = 1; 		// 0 or 1 : 0 = make show title hyperlink to XML data	
$imdblinks = 1; 		// 0 or 1 : create additional image w/links to imdb.com
$nplarchives = 1;		// 0 or 1 : 0 = no NPL archiving; 1 = archiving enabled

?>
