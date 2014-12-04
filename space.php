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
	private $hasParking;
	private $hasDesk;
	private $hasBreakroom;
	private $hasPrinting;
	private $hasStorage;


	 public static function create($name, $type, $street, $city, $state, $zip, $logo, $description, $website, $numberSeats, $hasWifi, $hasParking,
	 	$hasDesk, $hasBreakroom, $hasPrinting, $hasStorage) {

		$con = mysqli_connect('classroom.cs.unc.edu', 'sortman', 'ProjectNebula', 'sortmandb');

		$result = $con->query("insert into a6_spaces values (0, " . 
			                     ", " .  $name . ", " . $type . ", " . $street . ", " . $city . ", " . $state . ", " . $zip . ", " . $logo . 
			                     ", " . $logo . ", " . $description . ", " . $website . ", " . $numberSeats . ", " . $hasWifi . ", " . $hasParking . 
			                     ", " . $hasDesk . ", " . $hasBreakroom . ", " . $hasPrinting . ", " . $hasStorage . ")");

		 if ($result) {
			$new_id = $mysqli->insert_id;
			return new Space($new_id, $name, $type, $street, $city, $state, $zip, $logo, $description, $website, $numberSeats, $hasWifi, $hasParking,
				$hasDesk, $hasBreakroom, $hasPrinting, $hasStorage);
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
      echo "NOT CONNECTED";
    }

    echo "UPDATING";
    echo $this->hasParking;
    echo $this->hasWifi;
    $sql="UPDATE a6_spaces SET name='newwwwwww' WHERE spaceID='1'";
    if (mysqli_query($mysqli, $sql)) {
      echo "New way of doing things has worked.";
    } else {
      echo "Still having errors.";
    }

    mysqli_close($mysqli);
    
	}

	public function delete() {
    	$con = mysqli_connect('classroom.cs.unc.edu', 'sortman', 'ProjectNebula', 'sortmandb');
    	$con->query("delete from a6_spaces where spaceID = " . $this->spaceID);
  	}

}

?>