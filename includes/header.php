<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
	<html class="no-js" lang="en" >

		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Your Website Name Here!</title>
			<link href="includes/favicon.ico" rel="icon" type="image/x-icon" />

			<!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
			<link rel="stylesheet" href="css/normalize.css">
			<link rel="stylesheet" href="css/foundation.css">
			<link rel="stylesheet" href="css/app.css">

			<script src="js/vendor/custom.modernizr.js"></script>

		</head>
		<body>
			<nav class="top-bar" data-topbar>
			<ul class="title-area">
				<li class="name">
				<h1><a href="index.php">Your Name Here!</a></h1>
				</li>
				<li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
			</ul>

			<section class="top-bar-section">
			<!-- Right Nav Section -->
			<ul class="right">
				<li><a href="about_comics.php">About The Comics</a></li>
				<li class="has-dropdown">
					<a href="#">Comics</a>
					<ul class="dropdown">
<?php
$comics = scandir('comics');
sort($comics);
foreach ($comics as $comic){
	if ($comic === '.' or $comic === '..') continue;
	if (is_dir ('comics/'.$comic)){
?>
<li><a href="<?php echo "comic.php?comic=$comic"; ?>"><?php echo $comic; ?></a></li>
<?php
	}
}
?>
					</ul>
				</li>
				<li><a href="about.php">About The Author</a></li>
			</ul>

			<!-- Left Nav Section -->
			</section>
			</nav>
			<p>&nbsp;</p>
