<?php

$errors = array();

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$street_address = filter_input(INPUT_POST, 'street_address', FILTER_SANITIZE_STRING);
$contact = filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$website = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_URL);
$longitude = filter_input(INPUT_POST, 'longitude', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$latitude = filter_input(INPUT_POST, 'latitude', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($name)) {
		$errors['name'] = true;
	}
	
	if (empty($street_address)) {
		$errors['street_address'] = true;
	}
	
	if (empty($contact)) {
		$errors['contact'] = true;
	}
	
	if (empty($email)) {
		$errors['email'] = true;
	}
	
	if (empty($website)) {
		$errors['url'] = true;
	}
	
	if (empty($longitude)) {
		$errors['longitude'] = true;
	}
	
	if (empty($latitude)) {
		$errors['latitude'] = true;
	}
	
	if (empty($errors)) {
		require_once '../includes/db.php';
		
		$sql = $db->prepare('
			INSERT INTO garden_locations (name, street_address, longitude, latitude)
			VALUES (:name, :street_address, :longitude, :latitude)
		');
		$sql->bindValue(':name', $name, PDO::PARAM_STR);
		$sql->bindValue(':street_address', $street_address, PDO::PARAM_STR);
		$sql->bindValue(':contact', $contact, PDO::PARAM_STR);
		$sql->bindValue(':email', $email, PDO::PARAM_STR);
		$sql->bindValue(':url', $website, PDO::PARAM_STR);
		$sql->bindValue(':longitude', $longitude, PDO::PARAM_STR);
		$sql->bindValue(':latitude', $latitude, PDO::PARAM_STR);
		$sql->execute();
		
		header('Location: index.php');
		exit;
	}
}

?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Add a Garden to "Ottawa Community Gardens"</title>
	<link href="../css/general.css" rel="stylesheet">

</head>
<body>
	<h1>&#8220;Ottawa Community Gardens&#8221; addendum</h1>
	
	<form method="post" action="add.php">
		<div>
			<label for="name">Name<?php if (isset($errors['name'])) : ?> <strong>is required</strong><?php endif; ?></label>
			<input id="name" name="name" value="<?php echo $name; ?>" required>
		</div>
		<div>
			<label for="street_address">Address<?php if (isset($errors['street_address'])) : ?> <strong>is required</strong><?php endif; ?></label>
			<input id="street_address" name="street_address" value="<?php echo $street_address; ?>" required>
		</div>
		<div>
			<label for="contact">Contact<?php if (isset($errors['contact'])) : ?> <strong>is required</strong><?php endif; ?></label>
			<input id="contact" name="contact" value="<?php echo $contact; ?>" required>
		</div>
		<div>
			<label for="email">E-mail<?php if (isset($errors['email'])) : ?> <strong>is required</strong><?php endif; ?></label>
			<input id="email" name="email" value="<?php echo $email; ?>" required>
		</div>
		<div>
			<label for="url">Web<?php if (isset($errors['url'])) : ?> <strong>is required</strong><?php endif; ?></label>
			<input id="url" name="url" value="<?php echo $website; ?>" required>
		</div>
		<div>
			<label for="longitude">Longitude<?php if (isset($errors['longitude'])) : ?> <strong>is required</strong><?php endif; ?></label>
			<input id="longitude" name="longitude" value="<?php echo $longitude; ?>" required>
		</div>
		<div>
			<label for="latitude">Latitude<?php if (isset($errors['latitude'])) : ?> <strong>is required</strong><?php endif; ?></label>
			<input id="latitude" name="latitude" value="<?php echo $latitude; ?>" required>
		</div>
		<button type="submit">Add</button>
	</form>
	
</body>
</html>
