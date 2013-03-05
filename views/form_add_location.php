<h2>Add a Location</h2>
<form class="form-horizontal" action="actions/add_location.php" method="post">
	<div class="control-group">
		<label class="control-label" for="location_name">Location Name</label>
		<div class="controls">
			<?php echo input('location_name','optional')?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="location_zip">Zip Code</label>
		<div class="controls">
			<?php echo input('contact_lastname','optional')?>
		</div>
	</div>
</form>