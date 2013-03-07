<?php
$lines = file('data/locations.csv',FILE_IGNORE_NEW_LINES);

// Get the city association with the 'city' parameter in the query string
$location = $lines[$_GET['location']];
?>

<h2>Edit City</h2>
<form class="form-horizontal" action="actions/edit_location.php" method="post">
	<input type="hidden" name="linenum" value="<?php echo $_GET['location'] ?>" />
	<div class="control-group">
		<label class="control-label" for="location">Location</label>
		<div class="controls">
			<?php echo input('location','Enter a valid zip code or city name', $location) ?>
		</div>
	</div>
	<div class="form-actions">
<button type="submit" class="btn btn-success"><i class="icon-plus-sign icon-white"></i> Edit Location</button>
<button type="button" class="btn" onclick="window.history.go(-1)">Cancel</button>
</div>
</form>