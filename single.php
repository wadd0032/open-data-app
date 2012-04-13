<?php

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (empty($id)) {
	header('Location: index.php');
	exit;
}

require_once 'includes/db.php';
require_once 'includes/functions.php';

$sql = $db->prepare('
	SELECT id, name, street_address, contact, email, url, longitude, latitude,  rate_count, rate_total
	FROM garden_locations
	WHERE id = :id
');

$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->execute();
$garden = $sql->fetch();

if (empty($garden)) {
	header('Location: index.php');
	exit;
}

$title = $garden['name'];

if ($garden['rate_count'] > 0) {
	$rating = round($garden['rate_total'] / $garden['rate_count']);
} else {
	$rating = 0;
}

$cookie = get_rate_cookie();

include_once 'includes/wrapper-top.php';

?>

<div id="single-info">
	<h1><?php echo $garden['name']; ?></h1>
	<dl>
		<dt>Address</dt><dd><?php echo $garden['street_address']; ?></dd>
		<dt>Contact</dt><dd><?php echo $garden['contact']; ?></dd>
		<dt>E-mail</dt><dd><?php echo $garden['email']; ?></dd>
		<dt>Web</dt><dd><?php echo $garden['url']; ?></dd>
		<dt>Longitude</dt><dd><?php echo $garden['longitude']; ?></dd>
		<dt>Latitude</dt><dd><?php echo $garden['latitude']; ?></dd>
		<dt>Average Rating</dt><dd><meter value="<?php echo $rating; ?>" min="0" max="5"><?php echo $rating; ?> out of 5</meter></dd>
	</dl>
	
	<?php if (isset($cookie[$id])) : ?>
	
	<h2>Your rating</h2>
	<ol class="rater rater-usable clearfix">
		<?php for ($i = 1; $i <= 5; $i++) : ?>
			<?php $class = ($i <= $cookie[$id]) ? 'is-rated' : ''; ?>
			<li class="rater-level <?php echo $class; ?>">★</li>
		<?php endfor; ?>
	</ol>
	
	<?php else : ?>
	
	<h2>Rate</h2>
	<ol class="rater rater-usable">
		<?php for ($i = 1; $i <= 5; $i++) : ?>
		<li class="rater-level"><a href="rate.php?id=<?php echo $garden['id']; ?>&rate=<?php echo $i; ?>">★</a></li>
		<?php endfor; ?>
	</ol>
	
	<div>
		<button id="home">Home</button>
	</div>

	<?php endif; ?>
</div>

<?php

include_once 'includes/wrapper-bottom.php';

?>