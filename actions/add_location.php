<?php 
session_start();
if(strpos($_POST['location'], ' ')) {
	$location2 = str_replace(' ', '_', $_POST['location']);
}else {
	$location2=$_POST['location'];
}
$lines=file("http://free.worldweatheronline.com/feed/weather.ashx?q=$location2&format=csv&num_of_days=5&key=c8bb773a58183637130403", FILE_IGNORE_NEW_LINES);
if($_POST['location'] != '' && isset($lines[1])){
	$f = fopen('../data/locations.csv','a');
	fwrite($f, "\n$location2");
	fclose($f);
	header('Location:../?p=list_locations');
}else {
	$_SESSION['POST']=$_POST;
	$_SESSION['message']=array(
			'text'=>'You have not entered a valid zip code or city name',
			'type'=> 'alert'
	);
	header('Location:../?p=form_add_location');
}
?>