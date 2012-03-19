<?php

require_once '../includes/db.php';

$results = $db->query('
	SELECT id, name, street_address, longitude, latitude
	FROM garden_locations
	ORDER BY name ASC
');

?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin. &middot; Ottawa Community Gardens</title>
	<link href="../css/general.css" rel="stylesheet">

</head>
<body>
	<h1>Admin. &middot; Ottawa Community Gardens</h1>
	
	
	<div class="button">
		<a href="add.php">Add a Garden</a>
	</div>

	<ul>

	<?php foreach ($results as $garden) : ?>
		<li>
			<a href="single.php?id=<?php echo $garden['id']; ?>"><?php echo $garden['name']; ?></a>
			&bull;
			<a href="edit.php?id=<?php echo $garden['id']; ?>">Edit</a>
			&bull;
			<a href="delete.php?id=<?php echo $garden['id']; ?>">Delete</a>
		</li>
	<?php endforeach; ?>
	</ul>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="../js/open-data-app.js"></script>

</body>
</html>
