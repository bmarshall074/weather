<?php 
extract($_GET);
if(isset($_GET['zip']) && $_GET['zip']!='' && is_numeric($_GET['zip']) && strlen($_GET['zip'])==5){
$lines=file("http://free.worldweatheronline.com/feed/weather.ashx?q=$zip&format=csv&num_of_days=1&key=c8bb773a58183637130403", FILE_IGNORE_NEW_LINES);
$message="Weather for $zip";
$value=$zip;
}elseif(isset($_GET['location']) && $_GET['location']!=''){
$lines=file("http://free.worldweatheronline.com/feed/weather.ashx?q=$location&format=csv&num_of_days=1&key=c8bb773a58183637130403", FILE_IGNORE_NEW_LINES);
$message="Weather for $location";
$value=$location;
} else {
$message="No valid zip code or location has been entered, showing weather for the zip code 68135";
$lines=file("http://free.worldweatheronline.com/feed/weather.ashx?q=68135&format=csv&num_of_days=1&key=c8bb773a58183637130403", FILE_IGNORE_NEW_LINES);
}
//echo print_r($lines);
$parts=explode(',',$lines[8]);
$parts2=explode(',', $lines[9]);
//echo "Current temperature in Farenheit:";
$tempf=$parts[1]*1.8+32;
//echo "$tempf";
$tempmaxf=$parts2[2];
$tempminf=$parts2[4];
$humidity=$parts[10];
$windspeed=$parts2[5];
$cloudcover=$parts[13];
$weathericon=$parts2[10];
?>

<h2><?php echo $message?></h2>
<img src='<?php echo $weathericon ?>' alt="weather-icon"/>
<table class="table">
	<tr>
	<th>Current Temperature</th>
	<th>High for the day</th>
	<th>Low for the day</th>
	<th>Humidity</th>
	<th>Wind speed</th>
	<th>Cloudcover</th>
	</tr>
	<tr>
		<td><?php echo $tempf ?></td>
		<td><?php echo $tempmaxf ?></td>
		<td><?php echo $tempminf ?></td>
		<td><?php echo $humidity ?></td>
		<td><?php echo $windspeed ?></td>
		<td><?php echo $cloudcover ?></td>
	</tr>
</table>
<?php
