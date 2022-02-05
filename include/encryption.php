<?php 

	// Two functions that encrypt and decrypt data.
	//
	// If you're installing these in a new application, at a  minimum you should change
	// the value of the key and the initial value.  Do not lose the new values since you 
	// cannot decrypt any existing encrypted data without them.
	//
function code ($data) {
	$cipher_mode = "AES-128-CFB";
	// test database encryption keys
	$cipher_key = "e3491950f577a11d"; 
	$cipher_iv = "b46ae24695601953";  
	return base64_encode(openssl_encrypt ($data, $cipher_mode, $cipher_key, 0, $cipher_iv));
} // end of function code (returns string)
function decode ($data) {
	$cipher_mode = "AES-128-CFB";
	$cipher_key = "e3491950f577a11d"; 
	$cipher_iv = "b46ae24695601953";  
	return openssl_decrypt (base64_decode($data), $cipher_mode, $cipher_key, 0, $cipher_iv);
} //end of function decode (returns string)

?>
