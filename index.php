<?php

$title = 'Home';

include 'includes/wrapper-top.php';

require_once 'includes/db.php';

$results = $db->query('
	SELECT id, name, street_address, longitude, latitude
	FROM garden_locations
	ORDER BY name ASC
	LIMIT 10
');

?>



<ul class="garden-list">
	<?php foreach ($results as $garden) : ?>
		<li itemscope itemtype="http://schema.org/CivicStructure">
			<a href="single.php?id=<?php echo $garden['id']; ?>" itemprop="name"><?php echo $garden['name']; ?></a>
			<span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
				<meta itemprop="latitude" content="<?php echo $garden['latitude']; ?>">
				<meta itemprop="longitude" content="<?php echo $garden['longitude']; ?>">
			</span>
		</li>
	<?php endforeach; ?>
</ul>

<div id="map"></div>

<?php
	include_once 'includes/wrapper-bottom.php';
?>