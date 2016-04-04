<?php
// textcrap configuration file

# SQL Configuration
function db ( ) {
	$dbhost     = "localhost";
	$dbuser     = "root";
	$dbpassword = "password";
	$db         = "textcrap";

	$db = new mysqli ( $dbhost, $dbuser, $dbpassword, $db );

	if ( $db->connect_error )
		die ( 'The MySQL database could not reach the web server.' );

	return $db;

}

# Variables
$allow_access     = true;
$allow_access_msg = "Sorry, but textcrap has been closed for the time being.";


# Initialize the website
if ( !$allow_access )
	die ( $allow_access_msg );

# Functions
function doSafe ( $string ) {
	return htmlentities( mysqli_real_escape_string ( db( ), $string ) );
}

function doID ( $length = 6 ) {
	$characters   = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$char_length  = strlen ( $characters );
	$randomString = '';

	for ( $i = 0; $i < $length; $i++ ) {
		$randomString .= $characters[rand(0, $char_length - 1)];
	}

	return $randomString;
}
