<?php 
extract($_GET);
if(isset($_GET['zip']) && $_GET['zip']!='' && is_numeric($_GET['zip']) && strlen($_GET['zip'])==5){
$lines=file("http://free.worldweatheronline.com/feed/weather.ashx?q=$zip&format=csv&num_of_days=5&key=c8bb773a58183637130403", FILE_IGNORE_NEW_LINES);
$message="Weather for $zip";
$value=$zip;
}elseif(isset($_GET['location']) && $_GET['location']!=''){
$lines=file("http://free.worldweatheronline.com/feed/weather.ashx?q=$location&format=csv&num_of_days=5&key=c8bb773a58183637130403", FILE_IGNORE_NEW_LINES);
$message="Weather for $location";
$value=$location;
} else {
$_SESSION['message']=array(
		'text'=>'No valid zip code or location has been entered, showing weather information for 68135',
		'type'=> 'alert'
);
$message="Weather for 68135";
$lines=file("http://free.worldweatheronline.com/feed/weather.ashx?q=68135&format=csv&num_of_days=5&key=c8bb773a58183637130403", FILE_IGNORE_NEW_LINES);
$value='68135';
}
//echo print_r($lines);
$parts=explode(',',$lines[8]);
$humidity=$parts[10];
$cloudcover=$parts[13];
$weathericon=$parts[3];



$parts2=explode(',', $lines[9]);
//echo "Current temperature in Farenheit:";
$tempf=$parts[1]*1.8+32;
//echo "$tempf";
$tempmaxf=$parts2[2];
$tempminf=$parts2[4];
$windspeed=$parts2[5];
if($cloudcover<25) {
	$cloud='sunny';
}elseif($cloudcover<60 && $cloudcover>=25){
	$cloud='partly cloudy';
}elseif($cloudcover<85 && $cloudcover>=60){
	$cloud='mostly cloudy';
}elseif($cloudcover>=85){
	$cloud='cloudy';
}else {
	$cloud='Error';
}
if($tempf<32) {
	$temp='freezing';
}elseif($tempf<50 && $tempf>=32){
	$temp='cold';
}elseif($tempf<65 && $tempf>=50){
	$temp='chilly';
}elseif($tempf>=65 && $tempf>=78){
	$temp='mild';
}elseif($tempf>=78 && $tempf>=88){
	$temp='warm';
}elseif($tempf>=88 && $tempf>=100){
	$temp='hot';
}elseif($tempf>=100){
	$temp='very hot';
}else {
	$temp='Error';
}
?>

<div>
<h2><?php echo $message?></h2>
<img src="<?php echo $weathericon?>" alt="weather-icon"/><p id="description">Currently <?php echo $cloud?> and <?php echo $temp?> outside</p>

<table class="table" id="display">
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
<table class="table">
	<tr>
		<th>icon</th>
		<th>Expected High</th>
		<th>Expected Low</th>
		<th>Estimated Wind speed</th>
	</tr>
	<tr>
		<td><img class="icon" src="<?php echo $weathericon?>"</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>
<form action="actions/add_location.php" method="post">
	<input type="hidden" name="location" value="<?php echo $value?>" />
	<button id="save" type="submit" class="btn btn-primary pull-right">
	Add this location to my locations
	</button>
</form>
</div>
<?php
