<?php 
session_start();
if($_POST['location'] != ''){
	$f = fopen('../data/locations.csv','a');
	fwrite($f, "\n{$_POST['location']}");
	fclose($f);
	header('Location:../?p=list_locations');
}else {
	$_SESSION['POST']=$_POST;
	$_SESSION['message']=array(
			'text'=>'Where\'s the stuff, man?',
			'type'=> 'alert'
	);
	header('Location:../?p=form_add_location');
}
?>