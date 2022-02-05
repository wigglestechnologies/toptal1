<?php
header("Content-Type: application/json; charset=UTF-8");
require_once('/Users/Candidate/Sites/TTScreen.com/include/config.php');
require_once($apache_server . 'Connections' . $filename_separator. 'Toptal2.php'); 
mysqli_select_db($Toptal2, $datbase_Toptal2);
?>
<?php
	// If no cookies present, no one is logged in.
	if (empty($_SESSION['userID'])) {
		$login = TRUE;
	} else {
		$login = FALSE; 
	}
	// Create a function for escaping the data.
	//
	function escape_data ($data) {
		global $Toptal2; // (Need the database connection.)
		return mysqli_real_escape_string($Toptal2, $data);
	} // End of function.
?>
<?php 
$userID = $_SESSION['userID'];
// Verify same login
if (! empty($_GET['restOwner'])) {
	$restOwner = $_GET['restOwner'];
	if ($userID !== $restOwner) {
		$json['status'] ="Authentication error. Login mismatch.";
		echo json_encode($json);
		exit(0);
	}
	if (! empty($_GET['restName'])) {
		$restName = escape_data($_GET['restName']);
	} else {
		// Missing restaurant name should have been caught by client
		$json['status'] = "<p>Restaurant name must be supplied.</p>";
		echo json_encode($json);
		exit(0);
	}
	// Owner verified. Save it.
	if (! empty($_GET['restStreet'])) {
		$restStreet = escape_data($_GET['restStreet']);
	} else {
		$restStreet = null ;
	}
	if (! empty($_GET['restCity'])) {
		$restCity = escape_data($_GET['restCity']);
	} else {
		$restCity = null ;
	}
	if (! empty($_GET['restState'])) {
		$restState = escape_data($_GET['restState']);
	} else {
		$restState = null ;
	}
	if (! empty($_GET['restCountry'])) {
		$restCountry = escape_data($_GET['restCountry']);
	} else {
		$restCountry = null ;
	}
	$insertQuery = "INSERT into Restaurant (restaurantName,restaurantStreet,restaurantCity,restaurantState,"
		. "restaurantCountry,owner,averageRating,highestRating,lowestRating) VALUES "
		. "('$restName','$restStreet','$restCity','$restState','$restCountry','$restOwner','0.0','0.0','0.0')";
	if (mysqli_query($Toptal2,$insertQuery)) {
		$json['status'] = "OK";
	} else {
		$json['status'] = "Duplicate: " . mysqli_error($Toptal2);
	}
} else {
	$json['status'] = "<p>System error. Owner not passed to server. Please try later.</p>";
}
echo json_encode($json);
exit(0);
?>
