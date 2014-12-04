<?php

class Space {

	private $name;
	private $type;

	 public static function create($name, $type) {

		$con = mysqli_connect('classroom.cs.unc.edu', 'sortman', 'ProjectNebula', 'sortmandb');

		$result = $con->query("insert into a6_spaces values (0, " . 
			                     ", null, null, null " . $name . ", null, " . $type . ", null, null, null, null, null, null, null, 
			                     null, null, null)");

		 if ($result) {
			$new_id = $mysqli->insert_id;
			return new Space($new_id, null, null, null, $name, null, $type, null, null, null, null, null, null, null
				, null, null, null);
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
					       $spaces_info['type']);
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

  	private function __construct($spaceID, $name, $type) {
    	$this->spaceID = $spaceID;
    	$this->name = $name;
    	$this->type = $type;
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

  	public function setName($name) {
    	$this->name = $name;
    	return $this->update();
  	}

  	public function setType($type) {
    	$this->type = $type;
    	return $this->update();
  	}

  	private function update() {
		$con = mysqli_connect('classroom.cs.unc.edu', 'sortman', 'ProjectNebula', 'sortmandb');
		$result = $con->query("update a6_spaces set " .
			     "name=" .
			     "'" . $mysqli->real_escape_string($this->name) . 
			     " where spaceID=" . $this->spaceID);
		return $result;
	}

	public function delete() {
    	$con = mysqli_connect('classroom.cs.unc.edu', 'sortman', 'ProjectNebula', 'sortmandb');
    	$con->query("delete from a6_spaces where spaceID = " . $this->spaceID);
  	}

}

?>