<?php

require_once 'includes/db.php';

$results = $db->query('
	SELECT id, name, street_address, longitude, latitude
	FROM garden_locations
	ORDER BY name ASC
');

?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Ottawa Community Gardens</title>
	<link href="css/general.css" rel="stylesheet">

</head>
<body>
	<h1>Ottawa Community Gardens</h1>
	
	<ul>

	<?php foreach ($results as $garden) : ?>
		<li>
			<a href="single.php?id=<?php echo $garden['id']; ?>"><?php echo $garden['name']; ?></a>
		</li>
	<?php endforeach; ?>
	</ul>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="js/open-data-app.js"></script>

</body>
</html>
