<?php

require_once('space.php');

$path_components = explode('/', $_SERVER['PATH_INFO']);

// Note that since extra path info starts with '/'
// First element of path_components is always defined and always empty.

if ($_SERVER['REQUEST_METHOD'] == "GET") {
  // GET means either instance look up, index generation, or deletion

  // Following matches instance URL in form
  // /space.php/<id>

	if((count($path_components) >= 2) &&
		($path_components[1] != '')) {

		// Interpret <type> as string
		$type = trim($path_components[1]);

		// Look up object via ORM. $space is an array of json_encoded values
		$space = Space::findByType($type);

		if ($space == null) {
			// Space not found.
			header("HTTP/1.0 404 Not Found");
			print("Space type: " . $type . " not found.");
			exit();
		}

		// Normal lookup.
		// Generate JSON encoding as response
		header("Content-type: application/json");
		print($space);
		exit();
		}

		
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {

	// Either creating or updating

	// Following matches /space.php/<id> form
	if ((count($path_components) >= 2) &&
		($path_components[1] != "")) {

		// Interpret <id> as integer and look up via ORM
		$space_id = intval($path_components[1]);
		$space = Space::findByID($space_id);

		if ($space == null) {
			//Space not found.
			header("HTTP/1.0 404 Not Found");
			print("Todo id: " . $todo_id . " not found while attempting update.");
			exit();
		}

		// Validate values
		$new_name = false;
		if (isset($_REQUEST['name'])) {
			$new_name = trim($_REQUEST['name']);
			if ($new_name == "") {
				header("HTTP/1.0 400 Bad Request");
				print("Bad name");
				exit();
			}
		}

		$new_type = false;
		if (isset($REQUEST['type'])) {
			$new_type = trim($_REQUEST['type']);
			if ($new_type == "") {
				header("HTTP/1.0 400 Bad Request");
				print("Bad type");
				exit();
			}
		}

		$new_street = false;
		if (isset($REQUEST['street'])) {
			$new_street = trim($_REQUEST['street']);
			if ($new_street == "") {
				header("HTTP/1.0 400 Bad Request");
				print("Bad street");
				exit();
			}
		}

		$new_description = false;
		if (isset($REQUEST['description'])) {
			$new_description = trim($_REQUEST['description']);
			if ($new_description == "") {
				header("HTTP/1.0 400 Bad Request");
				print("Bad description");
				exit();
			}
		}

		$new_website = false;
		if (isset($REQUEST['website'])) {
			$new_website = trim($_REQUEST['website']);
			if ($new_website == "") {
				header("HTTP/1.0 400 Bad Request");
				print("Bad website");
				exit();
			}
		}

		$new_city = false;
		if (isset($REQUEST['city'])) {
			$new_city = trim($_REQUEST['city']);
			if ($new_city == "") {
				header("HTTP/1.0 400 Bad Request");
				print("Bad city");
				exit();
			}
		}

		$new_state = false;
		if (isset($REQUEST['state'])) {
			$new_state= trim($_REQUEST['state']);
			if ($new_state == "") {
				header("HTTP/1.0 400 Bad Request");
				print("Bad state");
				exit();
			}
		}

		$new_zip = false;
    	if (isset($_REQUEST['zip'])) {
      		$new_zip = intval($_REQUEST['zip']);
    	}

    	$new_logo = false;
    	if (isset($_REQUEST['logo'])) {
      		$new_logo = intval($_REQUEST['logo']);
    	}

    	$new_numberSeats = false;
    	if (isset($_REQUEST['numberSeats'])) {
      		$new_numberSeats = intval($_REQUEST['numberSeats']);
    	}

    	$new_hasWifi = false;
    	if (isset($_REQUEST['hasWifi'])) {
      		$new_hasWifi = intval($_REQUEST['hasWifi']);
    	}

    	$new_hasParking = false;
    	if (isset($_REQUEST['hasParking'])) {
      		$new_hasParking = intval($_REQUEST['hasParking']);
    	}

    	$new_hasDesk = false;
    	if (isset($_REQUEST['hasDesk'])) {
      		$new_hasDesk = intval($_REQUEST['hasDesk']);
    	}

    	$new_hasBreakroom = false;
    	if (isset($_REQUEST['hasBreakroom'])) {
      		$new_hasBreakroom = intval($_REQUEST['hasBreakroom']);
    	}

    	$new_hasPrinting = false;
    	if (isset($_REQUEST['hasPrinting'])) {
      		$new_hasPrinting = intval($_REQUEST['hasPrinting']);
    	}

    	$new_hasStorage = false;
    	if (isset($_REQUEST['hasStorage'])) {
      		$new_hasStorage = intval($_REQUEST['hasStorage']);
    	}

		// Update via ORM
		if ($new_name) {
			$space->setName($new_name);
		}
		if ($new_type != false) {
			$space->setType($new_type);
		}
		if ($new_street != false) {
			$space->setStreet($new_street);
		}
		if ($new_description != false) {
			$space->setDescription($new_description);
		}
		if ($new_website != false) {
			$space->setWebsite($new_website);
		}
		if ($new_city != false) {
			$space->setCity($new_city);
		}
		if ($new_state != false) {
			$space->setState($new_state);
		}
		if ($new_zip) {
			$space->setZip($new_zip);
		}
		if ($new_logo) {
			$space->setLogo($new_logo);
		}
		if ($new_numberSeats) {
			$space->setNumberSeats($new_numberSeats);
		}
		if ($new_hasWifi) {
			$space->setWifi($new_hasWifi);
		}
		if ($new_hasParking) {
			$space->setHasParking($new_hasParking);
		}
		if ($new_hasDesk) {
			$space->setHasDesk($new_hasDesk);
		}
		if ($new_hasBreakroom) {
			$space->setHasBreakroom($new_hasBreakroom);
		}
		if ($new_hasPrinting) {
			$space->setHasPrinting($new_hasPrinting);
		}
		if ($new_hasStorage) {
			$space->setHasStorage($new_hasStorage);
		}

		// Return JSON encoding of updated Space
		header("Content-type: application/json");
		print($space->getJSON());
		exit();
	} else {

		// Creating a new Space item

		// Validate values
		$new_name = false;
		if (isset($_REQUEST['name'])) {
			$new_name = trim($_REQUEST['name']);
			if ($new_name == "") {
				header("HTTP/1.0 400 Bad Request");
				print("Bad name");
				exit();
			}
		}

		$new_type = false;
		if (isset($REQUEST['type'])) {
			$new_type = trim($_REQUEST['type']);
			if ($new_type == "") {
				header("HTTP/1.0 400 Bad Request");
				print("Bad type");
				exit();
			}
		}

		$new_street = false;
		if (isset($REQUEST['street'])) {
			$new_street = trim($_REQUEST['street']);
			if ($new_street == "") {
				header("HTTP/1.0 400 Bad Request");
				print("Bad street");
				exit();
			}
		}

		$new_description = false;
		if (isset($REQUEST['description'])) {
			$new_description = trim($_REQUEST['description']);
			if ($new_description == "") {
				header("HTTP/1.0 400 Bad Request");
				print("Bad description");
				exit();
			}
		}

		$new_website = false;
		if (isset($REQUEST['website'])) {
			$new_website = trim($_REQUEST['website']);
			if ($new_website == "") {
				header("HTTP/1.0 400 Bad Request");
				print("Bad website");
				exit();
			}
		}

		$new_city = false;
		if (isset($REQUEST['city'])) {
			$new_city = trim($_REQUEST['city']);
			if ($new_city == "") {
				header("HTTP/1.0 400 Bad Request");
				print("Bad city");
				exit();
			}
		}

		$new_state = false;
		if (isset($REQUEST['state'])) {
			$new_state= trim($_REQUEST['state']);
			if ($new_state == "") {
				header("HTTP/1.0 400 Bad Request");
				print("Bad state");
				exit();
			}
		}

		$new_zip = false;
    	if (isset($_REQUEST['zip'])) {
      		$new_zip = intval($_REQUEST['zip']);
    	}

    	$new_logo = false;
    	if (isset($_REQUEST['logo'])) {
      		$new_logo = intval($_REQUEST['logo']);
    	}

    	$new_numberSeats = false;
    	if (isset($_REQUEST['numberSeats'])) {
      		$new_numberSeats = intval($_REQUEST['numberSeats']);
    	}

    	$new_hasWifi = false;
    	if (isset($_REQUEST['hasWifi'])) {
      		$new_hasWifi = intval($_REQUEST['hasWifi']);
    	}

    	$new_hasParking = false;
    	if (isset($_REQUEST['hasParking'])) {
      		$new_hasParking = intval($_REQUEST['hasParking']);
    	}

    	$new_hasDesk = false;
    	if (isset($_REQUEST['hasDesk'])) {
      		$new_hasDesk = intval($_REQUEST['hasDesk']);
    	}

    	$new_hasBreakroom = false;
    	if (isset($_REQUEST['hasBreakroom'])) {
      		$new_hasBreakroom = intval($_REQUEST['hasBreakroom']);
    	}

    	$new_hasPrinting = false;
    	if (isset($_REQUEST['hasPrinting'])) {
      		$new_hasPrinting = intval($_REQUEST['hasPrinting']);
    	}

    	$new_hasStorage = false;
    	if (isset($_REQUEST['hasStorage'])) {
      		$new_hasStorage = intval($_REQUEST['hasStorage']);
    	}

    	// Create new Space via ORM
    	$new_space = Space::create($name, $type, $street, $city, $state,
    		$zip, $logo, $description, $website, $numberSeats, $hasWifi,
    		$hasParking, $hasDesk, $hasBreakroom, $hasPrinting, $hasStorage);

    	// Report if failed
    	if ($new_space == null) {
    		header("HTTP/1.0 500 Server Error");
    		print("Server couldn't create new space.");
    		exit();
    	}

    	// Generate JSON encoding of new Space
    	header("Content-type: application/json");
    	print($new_space->getJSON());
    	exit();
	}
}

// If here, none of the above applied and URL could not be interpreted
// with respect to RESTful conventions.

header("HTTP/1.0 400 Bad Request");
print("Did not understand URL.");

?>