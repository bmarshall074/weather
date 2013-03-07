<?php 
session_start();

require('functions.php')
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Bootstrap CSS -->
			<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
		<!-- Plain CSS -->
			<link rel="stylesheet" type="text/css" href="styles.css" />
		<!-- jQuery JS -->
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<!-- Bootstrap JS -->
			<script src="bootstrap/js/bootstrap.min.js"></script>
		<!-- Custom Fonts -->
			<link href='http://fonts.googleapis.com/css?family=Prosto+One' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
		<title>Weather</title>
	</head>
	<body>
		<div id="wrapper" class="container">
			<header>
				<?php include('layout/header.php') ?>
			</header>
			<nav>
				<?php include('layout/nav.php') ?>
			</nav>
			<section role="main">
				<?php include('layout/main.php') ?>
			</section>
			<footer>
				<?php include('layout/footer.php') ?>
			</footer>
		</div>
	</body>
</html>