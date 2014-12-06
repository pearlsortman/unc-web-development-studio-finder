<?php

require_once('SS_orm_space.php');

$path_components = explode('/', $_SERVER['PATH']);
echo($path_components);

if ($_SERVER['REQUEST_METHOD'] == "GET") {

	if ((count($path_components) >=2)) && ($path_components[1] != "")) {
		$space_id = intval($path_components[1]);
}
}

?>