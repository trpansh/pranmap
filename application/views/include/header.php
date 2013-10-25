<!DOCTYPE html>

<html lang="en">

	<head>
		<meta charset="utf-8">
		<title><?php if(isset($title)) { echo $title; } else { echo "Program for Accountability in Nepal"; } ?></title>
		<meta name="description" content="PRAN">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<script src="<?= site_url('assets/js/jquery-2.0.3.min.js') ?>"></script>
		
		<?php if($this->uri->segment(1) != 'about' && $this->uri->segment(1) != 'contact') { ?>
			<link rel="stylesheet" type="text/css" href="<?= site_url('assets/js/mapbox/mapbox.css'); ?>">
		    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/js/DataTables-1.9.4/media/css/jquery.dataTables_themeroller.css'); ?>">
		    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/css/jquery-ui/jquery-ui.min.css'); ?>">
		    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/css/alertify.default.css'); ?>">
			<link rel="stylesheet" type="text/css" href="<?= site_url('assets/css/alertify.core.css'); ?>">
		<?php } ?>
		
		<?php if ($this->uri->segment(1) == 'about') { ?>
			<link rel="stylesheet" href="<?= site_url('assets/js/nivo-slider/nivo-slider.css'); ?>" type="text/css" />
			<link rel="stylesheet" href="<?= site_url('assets/js/nivo-slider/themes/default/default.css'); ?>" type="text/css" />
			<script type="text/javascript">
				$(document).ready(function() {
					$('#slider').nivoSlider({
					    effect: 'random',               // Specify sets like: 'fold,fade,sliceDown'
					    controlNav: true,              // 1,2,3... navigation
					    pauseOnHover: true,             // Stop animation while hovering
					    randomStart: true             // Start on a random slide
					});
				});
			</script>
		<?php } ?>

		<link rel="stylesheet" href="<?= site_url('assets/css/styles.css'); ?>">
		<link rel="shortcut icon" href="<?= site_url('assets/img/favicon-pran.ico'); ?>" type="image/png">

		<!--[if IE]> <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	</head>

	<header>
		<div id="header-elements">
			<a href="<?= site_url(); ?>" id="logo"></a>
			<nav>
				<a href="#" id="menu-icon"></a>
				<ul>
					<li><a href="<?= site_url(); ?>" class="<?php if($this->uri->rsegments[1] == 'map') echo 'current'; ?>">Home</a></li>
					<li><a href="<?= site_url('about'); ?>" class="<?php if($this->uri->segment(1) == 'about') echo 'current'; ?>">About</a></li>
					<li><a href="<?= site_url('contact'); ?>" class="<?php if($this->uri->segment(1) == 'contact') echo 'current'; ?>">Contact</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<body>