<h2>Saved Locations</h2>

<table class="table">
	<thead>
		<tr>
			<th>Location</th>
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
				$location = $line;
				echo '<tr>';
				echo 	"<td><a href=./?p=display_weather&location=$location>$location</a></td>";;
				echo 	"<td><a class=\"btn btn-warning\" href=\"./?p=form_edit_location&location=$i\"><i class=\"icon-edit icon-white\"></i></a> <a class=\"btn btn-danger\"  href=\"actions/delete_location.php?linenum=$i\"><i class=\"icon-trash icon-white\"></i></a></td>";
				echo '</tr>';
			
				$i++; // increment line number
			}
			?>
	</tbody>
</table>