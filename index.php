<?php

require_once 'includes/db.php';

$results = $db->query('
	SELECT id, name, street_address, longitude, latitude,  rate_count, rate_total
	FROM garden_locations
	ORDER BY name ASC
');

include_once 'includes/wrapper-top.php';

?>
<div class="wrapper">
	<div id="main-list" class="gradient">
		<div class="geolocation">
			<button id="geo">Where Am I?</button>
			<form id="geo-form">
				<input id="adr" placeholder="Location: address, intersection or postal code">
			</form>
		</div>
		
	<ul class="garden-list">
			<?php foreach ($results as $garden) : ?>
				<?php
					if ($garden['rate_count'] > 0) {
						$rating = round($garden['rate_total'] / $garden['rate_count']);
					} else {
						$rating = 0;
					}
				?>
				<li itemscope itemtype="http://schema.org/CivicStructure" data-id="<?php echo $garden['id']; ?>">
					<strong class="distance"></strong>
						<a href="single.php?id=<?php echo $garden['id']; ?>" itemprop="name"><?php echo $garden['name']; ?></a>
						<span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
							<meta itemprop="latitude" content="<?php echo $garden['latitude']; ?>">
							<meta itemprop="longitude" content="<?php echo $garden['longitude']; ?>">
						</span>
						<!--	<meter value="<?php //echo $rating; ?>" min="0" max="5"><?php //echo $rating; ?> out of 5</meter>	-->
						<ol class="rater">
						<?php for ($i = 1; $i <= 5; $i++) : ?>
							<?php $class = ($i <= $rating) ? 'is-rated' : ''; ?>
							<li class="rater-level <?php echo $class; ?>">★</li>
							<?php endfor; ?>
						</ol>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	
	<div id="map"></div>
</div>


<?php

include_once 'includes/wrapper-bottom.php';

?>