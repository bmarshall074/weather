<?php 
extract($_GET);
$othermessage='';
if(isset($_GET['location']) && $_GET['location']!=''){
	if(strpos($_GET['location'], ' ')) {
		$location2 = str_replace(' ', '_', $_GET['location']);
	}else {
		$location2=$_GET['location'];
	}
	$lines=file("http://free.worldweatheronline.com/feed/weather.ashx?q=$location2&format=csv&num_of_days=5&key=c8bb773a58183637130403", FILE_IGNORE_NEW_LINES);
	if(strpos($_GET['location'], '_')){
		$location3=str_replace('_', ' ', $_GET['location']);
	}else {
		$location3=$location;
	}
	$message="Weather for $location3";
	$value=$location2;
} else {
	
}if(is_numeric($_GET['location'])){
	$contents = file_get_contents("http://api.smartystreets.com/zipcode?auth-id=3e29d78d-5150-4a21-b18c-b337e424df69&auth-token=DpHUb5iBhlwp9Ew073CkibL9Rk8pakW0cG8WOFPUHGVAQxtdsPzTMFvA1InklA5Ruvjgn3NAX6a8X%2BGhENpl%2Bw%3D%3D&street=&street2=&city=&state=&zipcode=$location2&candidates=10");
	$results = json_decode($contents, TRUE);
	$city=$results[0]['city_states'][0]['city'];
	$state=$results[0]['city_states'][0]['state'];
	$message="Weather for $city, $state ($location2)";
}
if(isset($lines[1])){
//echo print_r($lines);
$parts=explode(',',$lines[8]);
$humidity=$parts[10];
$cloudcover=$parts[13];
$weathericon=$parts[3];



$parts2=explode(',', $lines[9]);
//echo "Current temperature in Farenheit:";
$tempf=round($parts[1]*1.8+32,0,PHP_ROUND_HALF_UP);
//echo "$tempf";
$tempmaxf=$parts2[2];
$tempminf=$parts2[4];
$windspeed=$parts2[5];
if($cloudcover<25) {
	$cloud='clear';
}elseif($cloudcover<60 && $cloudcover>=25){
	$cloud='partly cloudy';
}elseif($cloudcover<85 && $cloudcover>=60){
	$cloud='mostly cloudy';
}elseif($cloudcover>=85){
	$cloud='overcast';
}else {
	$cloud='Error';
}
if($tempf<32) {
	$temp='freezing';
}elseif($tempf<50 && $tempf>=32){
	$temp='cold';
}elseif($tempf<65 && $tempf>=50){
	$temp='chilly';
}elseif($tempf>=65 && $tempf<78){
	$temp='mild';
}elseif($tempf>=78 && $tempf<88){
	$temp='warm';
}elseif($tempf>=88 && $tempf<100){
	$temp='hot';
}elseif($tempf>=100){
	$temp='very hot';
}else {
	$temp='Error';
}
?>

<div>
<p><?php echo $othermessage?></p>
<h2><?php echo $message?></h2>
<div id="now">
<img src="<?php echo $weathericon?>" alt="weather-icon"/><p id="description">Currently <?php echo $cloud?> and <?php echo $temp?> outside</p>
</div>

<table id="current" class="table" id="display">
	<tr>
		<th>Current Temperature</th>
		<th>High for the day</th>
		<th>Low for the day</th>
		<th>Humidity</th>
		<th>Wind speed</th>
		<th>Cloudcover</th>
	</tr>
	<tr>
		<td><?php echo $tempf ?> &#8457;</td>
		<td><?php echo $tempmaxf ?> &#8457;</td>
		<td><?php echo $tempminf ?> &#8457;</td>
		<td><?php echo $humidity ?> &#37;</td>
		<td><?php echo $windspeed ?> MPH</td>
		<td><?php echo $cloudcover ?> &#37;</td>
	</tr>
</table>
<h3>Four Day Forecast</h3>
<table id="extended" class="table">
	<tr>
		<th>Date</th>
		<th></th>
		<th>Expected High (&#176;F)</th>
		<th>Expected Low (&#176;F)</th>
		<th>Estimated Wind Speed (MPH)</th>
	</tr>
<?php 
$i=0;
foreach($lines as $line){
	if($i>=10){
		$parts3=explode(',',$line);
		$date=$parts3[0];
		$iconforecast=$parts3[10];
		$tempminforecast=$parts3[4];
		$tempmaxforecast=$parts3[2];
		$windspeedforecast=$parts3[5];
		echo "<tr><td>$date</td><td class=\"forecast\"><img src=\"$iconforecast\" class=\"forecast\" alt=\"weather\"/></td><td>$tempmaxforecast</td><td>$tempminforecast</td><td>$windspeedforecast</td></tr>";
	}
	$i++;
}
?>
</table>
<form id="save" action="actions/add_location.php" method="post">
	<input type="hidden" name="location" value="<?php echo $value?>" />
	<button type="submit" class="btn btn-primary pull-right">
	Add this location to my locations
	</button>
</form>
</div>
<?php
}else{
	echo "This Location has not been found. <a href=\"./?p=list_locations\">Click here to return to your saved locations.</a>";
}