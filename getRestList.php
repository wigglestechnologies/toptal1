<?php
header("Content-Type: application/json; charset=UTF-8");
require_once('/Users/Ashbec/Sites/TTScreen.com/include/config.php');
require_once($apache_server . 'Connections' . $filename_separator. 'Toptal2.php'); 
mysqli_select_db($Toptal2, $datbase_Toptal2);
?>
<?php
	// If no cookies present, no one is logged in.
	if (isset($_SESSION['userID'])) {
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
	if (isset($_GET['filter'])) {
		$filter = $_GET['filter'];
	} else {
		$filter = 0;
	}
	$restSelect = "SELECT * FROM Restaurant WHERE averageRating >  " . $filter . ".0" ;
	$restaurant = mysqli_query($Toptal2,$restSelect);
	$row_rest = mysqli_fetch_assoc($restaurant);
	$totalRows_rest = mysqli_num_rows($restaurant);
	$i = 0;
	$json['rest'] = (array) [];
	while ($i < $totalRows_rest) {
		$json['rest'][$i]['restName'] = $row_rest['restaurantName'];
		$json['rest'][$i]['restID'] = $row_rest['restaurantID'];
		$row_rest = mysqli_fetch_assoc($restaurant);
	}
	echo json_encode($json);
	exit(0);
?>