<?php 
// This script sets the error reporting for the site.
error_reporting (E_ALL & ~E_DEPRECATED); // development level
// error_reporting(0); // production level (off)
// This specifies server names for file and URL prefixes
$secure_server = "http://10.50.0.110/~Candidate/TTScreen.com/";
$normal_server = "http://10.50.0.110/~Candidate/TTScreen.com/";
$apache_server = "/Users/Candidate/Sites/TTScreen.com/";

// $AIS_domain = "TTScreen.com";
$AIS_domain = "TTScreen.com";
$email_domain = "Candidate.com";

// Session cookie setup
$cookie_options['lifetime'] = 0;
$cookie_options['path'] = "/";
$cookie_options['domain'] = NULL;
$cookie_options['secure'] = FALSE;  // (only because my local server doesn't have an SSL certificate yet.)
// $cookie_options['samesite'] = 'Lax';
session_set_cookie_params($cookie_options['lifetime'],$cookie_options['path'],$cookie_options['domain'],$cookie_options['secure']);
session_name('TTScreen');
session_start();
$session_key = "?TTScreen=" . session_id();

// Define the newline sequence
// FREEBSD -> \n (LF)
// $newline = chr(10);
// LINUX  -> \r\n (CRLF)
$newline = chr(13) . chr(10);

// Select the file name separator character
// Windows uses the backslash
// Linux/UNIX uses slash
$filename_separator = "/"; //Linux, MacOS
// $filename_separator = "\\"; //Windows

// Set the default time zone
$timezone = date_default_timezone_set ( "America/Detroit" );

// This allows every routine to operate as if magic quotes was off
function magicQuotesRemove(&$array) {
   if(!get_magic_quotes_gpc())
       return;
   foreach($array as $key => $elem) {
       if(is_array($elem))
           magicQuotesRemove($elem);
       else
           $array[$key] = stripslashes($elem);
   }
}

magicQuotesRemove($_GET);
magicQuotesRemove($_POST);
magicQuotesRemove($_COOKIE);

?>