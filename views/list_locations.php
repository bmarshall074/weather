<h2>Saved Locations</h2>

<table class="table">
	<thead>
		<tr>
			<th>Location Name</th>
			<th>Location Zipcode</th>
			<th>Edit/Delete</th>
		</tr>
	</thead>
	<tbody>
			<?php
			$lines = file('data/locations.csv',FILE_IGNORE_NEW_LINES);
			
			// Counter variable for line number
			$i = 0;
			
			//Iterate over the array of lines
			foreach($lines as $line) {
				$parts = explode('/',$line);
				$location = $parts[0];
				$zip = $parts[1];
				echo '<tr>';
				echo 	"<td>$location</td>";
				echo 	"<td>$zip</td>";
				$onclick = "return confirm('Are you sure you want to delete $name?')";
				echo 	"<td><a class=\"btn btn-warning\" href=\"./?p=form_edit_location&location=$i\"><i class=\"icon-edit icon-white\"></i></a> <a class=\"btn btn-danger\" onclick=\"$onclick\" href=\"actions/delete_location.php?linenum=$i\"><i class=\"icon-trash icon-white\"></i></a></td>";
				echo '</tr>';
			
				$i++; // increment line number
			}
			?>
	</tbody>
</table>