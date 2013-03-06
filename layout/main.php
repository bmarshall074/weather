<?php
// Display message if there is one in Session Data
if(isset($_SESSION['message'])) {
	// Display message
	echo "<div class=\"alert alert-{$_SESSION['message']['type']}\">{$_SESSION['message']['text']}</div>";
	unset($_SESSION['message']);
}

// Store the 'p' parameter from the query string into a variable
if(isset($_GET['p'])) {
	$p = $_GET['p'];
} else {
	$p = 'list_locations';
}

include("views/$p.php");