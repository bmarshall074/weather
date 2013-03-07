<?php 
session_start();
$lines=file("http://free.worldweatheronline.com/feed/weather.ashx?q={$_POST['location']}&format=csv&num_of_days=5&key=c8bb773a58183637130403", FILE_IGNORE_NEW_LINES);
if($_POST['location'] != '' && isset($lines[1])){
	$f = fopen('../data/locations.csv','a');
	fwrite($f, "\n{$_POST['location']}");
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