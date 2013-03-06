<h2>Add a Location</h2>
<form class="form-horizontal" action="actions/add_location.php" method="post">
	<div class="control-group">
		<label class="control-label" for="location">Location Name</label>
		<div class="controls">
			<?php echo input('location','Enter a City or Zipcode')?>
		</div>
	</div>
	<div class="form-actions">
<button type="submit" class="btn btn-success"><i class="icon-plus-sign icon-white"></i> Add Location</button>
<button type="button" class="btn" onclick="window.history.go(-1)">Cancel</button>
</div>
</form>