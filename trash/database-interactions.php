<?php
$con = mysqli_connect('classroom.cs.unc.edu', 'sortman', 'ProjectNebula', 'sortmandb');
if (!$con) {
	die ('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';

//GET
if ($_SERVER['REQUEST_METHOD'] === 'getSpaces') {
	$extractFromSpaces = "SELECT * FROM a6_spaces";
	$extractQuery = mysqli_query($con, $extractFromSpaces);

	$json = array();
	if ($extractFromSpaces->num_rows !=0) {
		while ($row = $extractQuery->fetch_array()) {
			$json[] = array (
				'spaceID' => $row[0],
				'name' => $row[4],
				'type' => $row[6]
			);
		}
		header('Content-Type: application/json; charset=utf-8');
		$jsonString = json_encode($json);
		echo $jsonString;
	}
}

//POST
else if ($_SERVER['REQUEST_METHOD'] === 'postSpaces') {
	$body;
	if ($_POST == null) {
		$handle = fopen('php://input', 'r');
		$rawData = fgets($handle);
		$body = json_decode($rawData);
	} else {
		$body == $_POST;
	}
	$defaultImage = $body->{'defaultImage'};
	$name = $body->{'name'};
	$type = $body->{'type'};

	$addSpace = "INSERT INTO a6_spaces (defaultImage, name, type)
	VALUES ('$defaultImage', '$name', '$type')";
}


mysqli_close($con);
?>