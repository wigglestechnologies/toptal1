<?php
header("Content-Type: application/json; charset=UTF-8");
require_once('/Users/Ashbec/Sites/TTScreen.com/include/config.php');
require_once($apache_server . 'Connections' . $filename_separator. 'Toptal.php'); 
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
	
	if ($login) {
		$userID = $_SESSION['userID'];
	} else {
		$json['status'] = "Authentication error.  Please login again.";
		echo json_encode($json);
		exit(0);
	}
	if (! empty($_GET['restID'])) {
		$restID = $_GET['restID'];
		$restSelect = "SELECT * FROM Restaurant WHERE restaurantID = " . $restID ;
		$restaurant = mysqli($Toptal2,$restSelect);
		$row_rest = mysqli_fetch_assoc($restaurant);
		$totalRows_rest = mysqli_num_rows($restaurant);
		// This shouldn't happen but check anyway
		if ($totalRows_rest == 0) {
			$json['status'] = "Not found.";
			echo json_encode($json);
			exit(0);
		}
		$json['restName'] = $row_rest['restaurantName'];
		$json['restStreet'] = $row_rest['restaurantStreet'];
		$json['restCity'] = $row_rest['restaurantCity'];
		$json['restState'] = $row_rest['restaurantState'];
		$json['restCountry'] = $row_rest['restaurantCountry'];
		$json['averageRating'] = $row_rest['averageRating'];
		$json['highestRating'] = $row_rest['highestRating'];
		$json['lowestRating'] = $row_rest['lowestRating'];
		$reviewSelect = "SELECT * FROM Review WHERE restaurantID = " . $restID
			. "ORDER BY visitDate DESC LIMIT 5";
		$reviews = mysqli_query($toptal2,$reviewselect);
		$row_review = mysqli_fetch_assoc($reviews);
		$totalRows_review = mysqli_num_rows($reviews);
		$json['review'] = (array) [];
		$i = 0;
		
		while ($i < $totalRows_review) {
			$json['review'][$i]['rating'] = $row_review['rating'];
			$json['review'][$i]['visitDate'] = $row_review['visitDate'];
			$json['review'][$i]['comment'] = $row_review['comment'];
			$json['review'][$i]['reply'] = $row_review['reply'];
			$authorID = $row_review['authorID'];
			$authorSelect = "SELECT email in User WHERE userID = " . $authorID;
			$authors = mysqli_query($Toptal2,$authorSelect);
			$row_author = mysqli_fetch_assoc($authors);
			$json['review'][$i]['author'] = $row_author['email'];
			$row_review = mysqli_fetch_assoc($reviews);
		}
	}
	echo json_encode($json);
	exit(0);
?>
