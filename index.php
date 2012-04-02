<?php
/**
 * Displays the list and map for the open data set
 *
 * @package Ottawa Community Gardens
 * @copyright 2012 Deanna Wadden
 * @author Deanna Wadden <deannawadden@rogers.com>
 * @link https://wadd0032@github.com/wadd0032/open-data-app.git
 * @license 
 * @version 1.0.0
 */

require_once 'includes/db.php';

$results = $db->query('
	SELECT id, name, street_address, longitude, latitude,  rate_count, rate_total
	FROM garden_locations
	ORDER BY name ASC
	
');

include_once 'includes/wrapper-top.php';

?>
<div class="wrapper">
	<div id="geolocation">
		<button id="geo">Where Am I?</button>
		<form id="geo-form">
			<input type="text" id="adr" placeholder="Location: address, intersection or postal code">
			<input type="submit">
		</form>
	</div>
	
	<div id="map"></div>
	
	<div id="main-list" class="gradient">
		<table>
			<tbody class="garden-list">
				<?php foreach ($results as $garden) : ?>
					<?php
						if ($garden['rate_count'] > 0) {
							$rating = round($garden['rate_total'] / $garden['rate_count']);
						} else {
							$rating = 0;
						}
					?>
					
					<tr data-id="<?php echo $garden['id']; ?>">
						<td class="names" itemscope itemtype="http://schema.org/CivicStructure">
							<strong class="distance"></strong>
								<a href="garden/<?php echo $garden['id']; ?>" itemprop="name"><?php echo $garden['name']; ?></a>
								<span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
									<meta itemprop="latitude" content="<?php echo $garden['latitude']; ?>">
									<meta itemprop="longitude" content="<?php echo $garden['longitude']; ?>">
								</span>
						</td>
						<td class="rating">
							<ol class="rater">
								<?php for ($i = 1; $i <= 5; $i++) : ?>
									<?php $class = ($i <= $rating) ? 'is-rated' : ''; ?>
									<li class="rater-level <?php echo $class; ?>">★</li>
								<?php endfor; ?>
							</ol>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

</div>
<?php

include_once 'includes/wrapper-bottom.php';

?>