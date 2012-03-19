<?php


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (empty($id)) {
	header('Location: index.php');
	exit;
}

require_once 'includes/db.php';

$sql = $db->prepare('
	SELECT id, name, street_address, longitude, latitude
	FROM garden_locations
	WHERE id = :id
');

$sql->bindValue(':id', $id, PDO::PARAM_INT);

$sql->execute();

$results = $sql->fetch();

if (empty($results)) {
	header('Location: index.php');
	exit;
}

?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $results['name']; ?> &middot; Ottawa Community Gardens</title>
	<link href="css/general.css" rel="stylesheet">

</head>
<body>
	
	<h1><?php echo $results['name']; ?></h1>
	<p>Address: <?php echo $results['street_address']; ?></p>
	<p>Longitude: <?php echo $results['longitude']; ?></p>
	<p>Latitude: <?php echo $results['latitude']; ?></p>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="js/open-data-app.js"></script>

</body>
</html>
