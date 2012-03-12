<?php

require_once '../includes/db.php';

$places_xml = simplexml_load_file('community-gardens.kml');

$sql = $db->prepare('
	INSERT INTO garden_locations (name, street_address, longitude, latitude)
	VALUES (:name, :street_address, :longitude, :latitude)
');

foreach ($places_xml->Document->Folder[0]->Placemark as $place) {
	$coords = explode(',', trim($place->Point->coordinates));
	$adr = ' ';
	
	foreach ($place->ExtendedData->SchemaData->SimpleData as $civic) {
		if ($civic->attributes()->name == 'LEGAL_ADDR') {
			$adr = $civic;
		}
	}
	$sql->bindValue(':name', $place->name, PDO::PARAM_STR);
	$sql->bindValue(':street_address', $adr, PDO::PARAM_STR);
	$sql->bindValue(':longitude', $coords[0], PDO::PARAM_STR);
	$sql->bindValue(':latitude', $coords[1], PDO::PARAM_STR);
	$sql->execute();
}

//Use to debug errorsin our SQL code:
//NOTE: REMOVE FROM PRODCTION CODE!!!
//var_dump($sql->errorInfo());