<?php
session_start();
if(strpos($_POST['location'], ' ')) {
	$location = str_replace(' ', '_', $_POST['location']);
}else {
	$location=$_POST['location'];
}
$lines=file("http://free.worldweatheronline.com/feed/weather.ashx?q=$location&format=csv&num_of_days=5&key=c8bb773a58183637130403", FILE_IGNORE_NEW_LINES);
if( $_POST['location'] != '' && isset($lines[1])) {	
// Read file into array
$lines = file('../data/locations.csv', FILE_IGNORE_NEW_LINES);

// Replace line with new values
$lines[$_POST['linenum']] = "$location";

// Create the string to write to the file
$data_string = implode("\n",$lines);

// Write the string to the file, overwriting the current contents
$f = fopen('../data/locations.csv','w');
fwrite($f,$data_string);
fclose($f);

$_SESSION['message'] = array(
		'text' => 'The location has been edited.',
		'type' => 'info'
);

header('Location:../?p=list_locations');
} else {
	// Store submitted data into session data
	$_SESSION['POST'] = $_POST;
	
	// Store error message in session data
	$_SESSION['message'] = array(
			'text' => 'You have not entered a valid zip code or city name',
			'type' => 'error'
	);
	
	// Redirect to the form
	header("Location:../?p=form_edit_location&location={$_POST['linenum']}");
}

?>
