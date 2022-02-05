<?php
header("Content-Type: application/json; charset=UTF-8");
require_once('/Users/Ashbec/Sites/TTScreen.com/include/config.php');
require_once($apache_server . 'Connections' . $filename_separator. 'Toptal2.php'); 
mysqli_select_db($Toptal2, $datbase_Toptal2);

// Create a function for escaping the data.
//
function escape_data ($data) {
	global $Toptal2; // (Need the database connection.)
	return mysqli_real_escape_string($Toptal2, $data);
} 

require_once($apache_server . 'include' . $filename_separator . 'encryption.php');

// Establish the user or reject login attempt
$json['status'] = "<p>Status not set.</p>";
if (!empty($_GET['user'])) {
	$user = strtolower(escape_data($_GET['user']));
	$query_user = "SELECT * FROM User WHERE email = '$user'";
	$users = mysqli_query($Toptal2, $query_user) or die(mysqli_error($Toptal2));
	$row_user = mysqli_fetch_assoc($users);
	$totalRows_customer = mysqli_num_rows($users);
	if ($totalRows_customer > 0) {
		// The user account exists.
		// Check the password.
		if (! empty($_GET['pw'])) {
			$pass = $_GET['pw'];
			if ($pass == decode(stripslashes($row_user['password']))) {
				// Successful login
				// Set the cookies
				$userID = $row_user['userID'];
				$userType = $row_user ['userType'];
				$_SESSION['userID'] = $userID;
				$_SESSION['userType'] = $userType;
				$json['status'] = "OK";
				$json['userID'] = $userID;
				$json['userType'] = $userType;
			} else { // bad password
				$json['status'] = "<p>Login failed. Please retry.</p>";
			}
		} else { // missing password
			$errorStr = null;
			foreach ($_GET as $key => $value) {
				$errorStr .= "<p>$key : $value </p>";
			}
			$json['status'] = "<p>System error.  Password not passed to server. POST: </p>" 
				. $errorStr ;
		}
	} else { // username not found
		// Create the user account
		// check for password
		if (empty($_GET['pw'])) {
			$json['status'] = "<p>System error.  Password not passed to server.</p>";
		} else {
			$pass = escape_data(code($_GET['pw']));
			$userType = "regular";
			$insertUserSQL = "INSERT INTO User (email, password, userType) "
				. "VALUES ('$user', '$pass', '$userType') ";
			$result = mysqli_query($Toptal2, $insertUserSQL);
			if (mysqli_affected_rows($Toptal2) > 0) {
				// successful insertion - good to go
				$json['status'] = "OK";
				$userID = mysqli_insert_id($Toptal2);
				$json['userID'] = $userID;
				$json['userType'] = $userType;
				$_SESSION['userID'] = $userID;
				$_SESSION['userType'] = $userType;
			} else {
				$json['status'] = "<p>Database error on creation.  Please retry later.</p>"
					. "<p>" . mysqli_error($Toptal2) . "</p>";
			}
		}
	}
	mysqli_free_result($users);
} else { // No username supplied
	$errorStr = "<p>GET key:value pairs - </p>";
	foreach ($_GET as $key => $value) {
		$errorStr .= "<p>$key : $value </p>";
	}
	$json['status'] = "<p>System error.  Email not passed to server. </p>" . $errorStr; 
}
echo json_encode($json);
exit(0);
?>
