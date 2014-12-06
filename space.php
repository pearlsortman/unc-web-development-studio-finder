<?php

class Space {

	private $name;
	private $type;
	private $street;
	private $city;
	private $state;
	private $zip;
	private $logo;
	private $description;
	private $website;
	private $numberSeats;
	private $hasWifi;
	private $hasParking ;
	private $hasDesk;
	private $hasBreakroom;
	private $hasPrinting;
	private $hasStorage;


	 public static function create($name, $type, $street, $city, $state, $zip, $logo, $description, $website, $numberSeats, $hasWifi, $hasParking,
	 	$hasDesk, $hasBreakroom, $hasPrinting, $hasStorage) {

		$mysqli = mysqli_connect('classroom.cs.unc.edu', 'sortman', 'ProjectNebula', 'sortmandb');

    $sqlName =        "'" . $mysqli->real_escape_string($name) . "', ";
    $sqlType =        "'" . $mysqli->real_escape_string($type) . "', ";
    $sqlStreet =      "'" . $mysqli->real_escape_string($street) . "', ";
    $sqlCity =        "'" . $mysqli->real_escape_string($city) . "', ";
    $sqlState =       "'" . $mysqli->real_escape_string($state) . "', ";
    $sqlDescription = "'" . $mysqli->real_escape_string($description) . "', ";
    $sqlWebsite =     "'" . $mysqli->real_escape_string($website) . "', ";

		$sql = ("INSERT INTO a6_spaces VALUES (0, " . $sqlName . $sqlType . $sqlStreet . $sqlCity . $sqlState . $zip . ", " . $logo . 
                           ", " . $sqlDescription . $sqlWebsite . $numberSeats . ", " . $hasWifi . ", " . $hasParking . 
			                     ", " . $hasDesk . ", " . $hasBreakroom . ", " . $hasPrinting . ", " . $hasStorage . ")");

    if (mysqli_query($mysqli, $sql)) {
      echo "*******************CREATED RECORD \n";
      $new_id = $mysqli->insert_id;
      echo $new_id;
      return new Space($new_id, $name, $type, $street, $city, $state, $zip, $logo, $description, $website, $numberSeats, $hasWifi, $hasParking,
        $hasDesk, $hasBreakroom, $hasPrinting, $hasStorage);
    
    } else {
      echo "*******************RECORD NOT CREATED \n";
    }

		 
		
		return null;
	}

	public static function findByID($spaceID) {
		$con = mysqli_connect('classroom.cs.unc.edu', 'sortman', 'ProjectNebula', 'sortmandb');
		$result = $con->query("select * from a6_spaces where spaceID = " . $spaceID);
		if ($result) {
			if ($result->num_rows == 0){
				return null;
			}
			$spaces_info = $result->fetch_array();

      $spaces_info['numberSeats'] = 0;
      $spaces_info['logo'] = 0;
			return new Space($spaces_info['spaceID'],
					       $spaces_info['name'],
					       $spaces_info['type'],
					       $spaces_info['street'],
					       $spaces_info['city'],
					       $spaces_info['state'],
					       $spaces_info['zip'],
					       $spaces_info['logo'],
					       $spaces_info['description'],
					       $spaces_info['website'],
					       $spaces_info['numberSeats'],
					       $spaces_info['hasWifi'],
					       $spaces_info['hasParking'],
					       $spaces_info['hasDesk'],
					       $spaces_info['hasBreakroom'],
					       $spaces_info['hasPrinting'],
					       $spaces_info['hasStorage']);
		}
		return null;
	}

	public static function getAllIDs() {
    	$con = mysqli_connect('classroom.cs.unc.edu', 'sortman', 'ProjectNebula', 'sortmandb');

    	$result = $con->query("select spaceID from a6_spaces");
    	$id_array = array();

    	if ($result) {
      		while ($next_row = $result->fetch_array()) {
				$id_array[] = intval($next_row['spaceID']);
      		}
    	}
    return $id_array;
  	}

    public static function findByType($type) {
      $con = mysqli_connect('classroom.cs.unc.edu', 'sortman', 'ProjectNebula', 'sortmandb');

      $sqlType = "'" . $con->real_escape_string($type) . "'";
      $result = $con->query("SELECT * FROM a6_spaces WHERE type=" . $sqlType);

      $json = array();
        if ($result->num_rows != 0)
        {
            while ($row = $result->fetch_array())
            {
                $json[]= array(
                    'spaceID' => $row[0],
                    'name' => $row[1],
                    'type' => $row[2],
                    'street' => $row[3],
                    'city' => $row[4],
                    'state' => $row[5],
                    'zip' => $row[6],
                    'logo' => $row[7],
                    'description' => $row[8],
                    'website' => $row[9],
                    'numberSeats' => $row[10],
                    'hasWifi' => $row[11],
                    'hasParking' => $row[12],
                    'hasDesk' => $row[13],
                    'hasBreakroom' => $row[14],
                    'hasPrinting' => $row[15],
                    'hasStorage' => $row[16]
                );
            }
            header('Content-Type: application/json');
            $jsonString = json_encode($json);
         }
         return $jsonString;
    }

    public static function findByLocation($city, $state) {
      $con = mysqli_connect('classroom.cs.unc.edu', 'sortman', 'ProjectNebula', 'sortmandb');

      $sqlCity = "'" . $con->real_escape_string($city) . "' && ";
      $sqlState = "'" . $con->real_escape_string($state) . "'";

      $result = $con->query("SELECT * FROM a6_spaces WHERE " . "city=" . $sqlCity . "state=" . $sqlState);

            $json = array();
        if ($result->num_rows != 0)
        {
            while ($row = $result->fetch_array())
            {
                $json[]= array(
                    'spaceID' => $row[0],
                    'name' => $row[1],
                    'type' => $row[2],
                    'street' => $row[3],
                    'city' => $row[4],
                    'state' => $row[5],
                    'zip' => $row[6],
                    'logo' => $row[7],
                    'description' => $row[8],
                    'website' => $row[9],
                    'numberSeats' => $row[10],
                    'hasWifi' => $row[11],
                    'hasParking' => $row[12],
                    'hasDesk' => $row[13],
                    'hasBreakroom' => $row[14],
                    'hasPrinting' => $row[15],
                    'hasStorage' => $row[16]
                );
            }
            header('Content-Type: application/json');
            $jsonString = json_encode($json);
         }
         return $jsonString;
    }

    public static function findByTypeAndLocation($type, $city, $state) {
      $con = mysqli_connect('classroom.cs.unc.edu', 'sortman', 'ProjectNebula', 'sortmandb');

      $sqlType = "'" . $con->real_escape_string($type) . "' &&";
      $sqlCity = "'" . $con->real_escape_string($city) . "' && ";
      $sqlState = "'" . $con->real_escape_string($state) . "'";

      $result = $con->query("SELECT * FROM a6_spaces WHERE " . "type=" . $sqlType . "city=" . $sqlCity . "state=" . $sqlState);

            $json = array();
        if ($result->num_rows != 0)
        {
            while ($row = $result->fetch_array())
            {
                $json[]= array(
                    'spaceID' => $row[0],
                    'name' => $row[1],
                    'type' => $row[2],
                    'street' => $row[3],
                    'city' => $row[4],
                    'state' => $row[5],
                    'zip' => $row[6],
                    'logo' => $row[7],
                    'description' => $row[8],
                    'website' => $row[9],
                    'numberSeats' => $row[10],
                    'hasWifi' => $row[11],
                    'hasParking' => $row[12],
                    'hasDesk' => $row[13],
                    'hasBreakroom' => $row[14],
                    'hasPrinting' => $row[15],
                    'hasStorage' => $row[16]
                );
            }
            header('Content-Type: application/json');
            $jsonString = json_encode($json);
         }
         return $jsonString;
    }

  	private function __construct($spaceID, $name, $type, $street, $city, $state, $zip, $logo, $description, $website, $numberSeats, $hasWifi, $hasParking,
	 	$hasDesk, $hasBreakroom, $hasPrinting, $hasStorage) {
    	$this->spaceID = $spaceID;
    	$this->name = $name;
    	$this->type = $type;
    	$this->street = $street;
    	$this->city = $city;
    	$this->state = $state;
    	$this->zip = $zip;
    	$this->logo = $logo;
    	$this->description = $description;
    	$this->website = $website;
    	$this->numberSeats = $numberSeats;
    	$this->hasWifi = $hasWifi;
    	$this->hasParking = $hasParking;
    	$this->hasDesk = $hasDesk;
    	$this->hasBreakroom = $hasBreakroom;
    	$this->hasPrinting = $hasPrinting;
    	$this->hasStorage = $hasStorage;

  	}

	public function getSpaceID() {
    	return $this->spaceID;
  	}

  	public function getName() {
   		return $this->name;
  	}

  	public function getType() {
    	return $this->type;
  	}

  	public function getStreet() {
    	return $this->street;
  	}

  	public function getCity() {
   		return $this->city;
  	}

  	public function getState() {
    	return $this->state;
  	}

  	public function getZip() {
    	return $this->zip;
  	}

  	public function getLogo() {
   		return $this->logo;
  	}

  	public function getDescription() {
    	return $this->description;
  	}

  	public function getWebsite() {
    	return $this->website;
  	}

  	public function getNumberSeats() {
   		return $this->numberSeats;
  	}

  	public function getHasWifi() {
    	return $this->hasWifi;
  	}

  	public function getHasParking() {
    	return $this->hasParking;
  	}

  	public function getHasDesk() {
   		return $this->hasDesk;
  	}

  	public function getHasBreakroom() {
    	return $this->hasBreakroom;
  	}

  	 public function getHasPrinting() {
   		return $this->hasPrinting;
  	}

  	public function getHasStorage() {
    	return $this->hasStorage;
  	}

  	public function setName($name) {
    	$this->name = $name;
    	return $this->update();
  	}

  	public function setType($type) {
    	$this->type = $type;
    	return $this->update();
  	}

  	 public function setStreet($street) {
    	$this->street = $street;
    	return $this->update();
  	}

  	public function setCity($city) {
   		$this->city = $city;
    	return $this->update();
  	}

  	public function setState($state) {
    	$this->state = $state;
    	return $this->update();
  	}

  	public function setZip($zip) {
    	$this->zip = $zip;
    	return $this->update();
  	}

  	public function setLogo($logo) {
   		$this->logo = $logo;
    	return $this->update();
  	}

  	public function setDescription($description) {
    	$this->description = $description;
    	return $this->update();
  	}

  	public function setWebsite($website) {
    	$this->website = $website;
    	return $this->update();
  	}

  	public function setNumberSeats($numberSeats) {
   		$this->numberSeats = $numberSeats;
    	return $this->update();
  	}

  	public function setHasWifi($hasWifi) {
    	$this->hasWifi = $hasWifi;
      echo $hasWifi;
    	return $this->update();
  	}

  	public function setHasParking($hasParking) {
    	$this->hasParking = $hasParking;
      echo $hasParking;
    	return $this->update();
  	}

  	public function setHasDesk($hasDesk) {
   		$this->hasDesk = $hasDesk;
    	return $this->update();
  	}

  	public function setHasBreakroom($hasBreakroom) {
    	$this->hasBreakroom = $hasBreakroom;
    	return $this->update();
  	}

  	 public function setHasPrinting($hasPrinting) {
   		$this->hasPrinting = $hasPrinting;
    	return $this->update();
  	}

  	public function setHasStorage($hasStorage) {
    	$this->hasStorage = $hasStorage;
    	return $this->update();
  	}

  	private function update() {
		$mysqli = mysqli_connect('classroom.cs.unc.edu', 'sortman', 'ProjectNebula', 'sortmandb');

    if(!$mysqli) {
      echo "NOT CONNECTED \n";
    }

    $sqlName =        "'" . $mysqli->real_escape_string($this->name) . "', ";
    $sqlType =        "'" . $mysqli->real_escape_string($this->type) . "', ";
    $sqlStreet =      "'" . $mysqli->real_escape_string($this->street) . "', ";
    $sqlCity =        "'" . $mysqli->real_escape_string($this->city) . "', ";
    $sqlState =       "'" . $mysqli->real_escape_string($this->state) . "', ";
    $sqlDescription = "'" . $mysqli->real_escape_string($this->description) . "', ";
    $sqlWebsite =     "'" . $mysqli->real_escape_string($this->website) . "', ";

    $sql=("UPDATE a6_spaces SET " .
      "name=" . $sqlName .
      "type=" . $sqlType .
      "street=" . $sqlStreet .
      "city=" . $sqlCity .
      "state=" . $sqlState .
      "zip=$this->zip, " .
      "logo=$this->logo, " .
      "description=" . $sqlDescription .
      "website=" . $sqlWebsite .
      "numberSeats=$this->numberSeats, " .
      "hasWifi=$this->hasWifi, " .
      "hasParking=$this->hasParking, " .
      "hasDesk=$this->hasDesk, " .
      "hasBreakroom=$this->hasBreakroom, " .
      "hasPrinting=$this->hasPrinting, " .
      "hasStorage=$this->hasStorage " . 
      "WHERE spaceID=$this->spaceID");


    if (mysqli_query($mysqli, $sql)) {
      echo "*******************New way of doing things has worked. \n";
    } else {
      echo "*******************Still having errors. \n";
    }

    mysqli_close($mysqli);
    return($sql);
	}

	public function delete() {
    	$con = mysqli_connect('classroom.cs.unc.edu', 'sortman', 'ProjectNebula', 'sortmandb');
    	$con->query("delete from a6_spaces where spaceID = " . $this->spaceID);
  }

  public function getJSON() {
    $json_obj = array('spaceID' => $this->spaceID,
          'name' => $this->name,
          'type' => $this->type,
          'street' => $this->street,
          'city' => $this->city,
          'state' => $this->state,
          'zip' => $this->zip,
          'logo' => $this->logo,
          'description' => $this->description,
          'website' => $this->website,
          'numberSeats' => $this->numberSeats,
          'hasWifi' => $this->hasWifi,
          'hasParking' => $this->hasParking,
          'hasDesk' => $this->hasDesk,
          'hasBreakroom' => $this->hasBreakroom,
          'hasPrinting' => $this->hasPrinting,
          'hasStorage' => $this->hasStorage);
    return json_encode($json_obj);
  }

}

?>