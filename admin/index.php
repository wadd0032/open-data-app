<?php

require_once '../includes/db.php';
require_once '../includes/users.php';
if (!user_signed_in()) {
header('Location: sign-in.php');
exit;
}

$results = $db->query('
	SELECT id, name, street_address, longitude, latitude
	FROM garden_locations
	ORDER BY name ASC
');

include_once '../includes/wrapper-top.php';

?>

<div id="revisions">
	<h1>Admin. &middot; Ottawa Community Gardens</h1>
	
	<div class="button">
		<a href="add.php">Add a Garden</a>
	</div>

	<ul>
		<?php foreach ($results as $garden) : ?>
			<li>
				<?php echo $garden['name']; ?>
				&bull;
				<a href="edit.php?id=<?php echo $garden['id']; ?>">Edit</a>
				&bull;
				<a href="delete.php?id=<?php echo $garden['id']; ?>">Delete</a>
			</li>
		<?php endforeach; ?>
	</ul>
</div>

<a href="sign-out.php">Add a Garden</a>

<?php

include_once '../includes/wrapper-bottom.php';

?>