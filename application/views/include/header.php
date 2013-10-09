<!DOCTYPE html>

<html lang="en">

	<head>
		<meta charset="utf-8">
		<title><?php if(isset($title)) echo $title; ?></title>
		<meta name="description" content="Responsive Header Nav">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<link rel="stylesheet" href="assets/css/styles.css">
		<script src="assets/js/jquery-2.0.3.min.js"></script>
		
		<?php if($this->uri->segment(1) != 'about' && $this->uri->segment(1) != 'contact') { ?>
			<link rel="stylesheet" type="text/css" href="<?= site_url('assets/js/mapbox/mapbox.css'); ?>">
		    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/js/DataTables-1.9.4/media/css/jquery.dataTables_themeroller.css'); ?>">
		    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/css/jquery-ui/jquery-ui.min.css'); ?>">
			<script src="<?= site_url('assets/js/nepal-district.js'); ?>"></script>
		    <script src="<?= site_url('assets/js/district-info.js'); ?>"></script>
		    <script src="<?= site_url('assets/js/map.js'); ?>"></script>
		    <style type="text/css">
		        #map { height: 450px; }

		        .leaflet-popup-close-button {
		            display: none;
		        }

		        .leaflet-popup-content-wrapper {
		            pointer-events: none;
		        }

		        .leaflet-popup-content-wrapper, .leaflet-popup-tip {
		            background: #FEFCE5;
		        }

		        .map-legend i {
		            width: 18px;
		            height: 18px;
		            float: left;
		            margin-right: 8px;
		            opacity: 0.7;
		        }

		        #column-chart {
		            width: 35%;
		            height: auto;
		        }

		        .tg-table { border-collapse: collapse; border-spacing: 0; }
		        .tg-table td, .tg-table th { background-color: #fff; border: 1px #aaa solid; color: #333; font-family: sans-serif; font-size: 100%; padding: 10px; vertical-align: top; }
		        .tg-table .tg-even td  { background-color: #FCFBE3; }
		        .tg-table th  { color: #222; font-size: 110%; font-weight: bold; }
		        .tg-bf { font-weight: bold; }
		        .tg-center { text-align: center; }
		    </style>
		<?php } ?>
		
		<?php if ($this->uri->segment(1) == 'about') { ?>
			<link rel="stylesheet" href="assets/js/nivo-slider/nivo-slider.css" type="text/css" />
			<link rel="stylesheet" href="assets/js/nivo-slider/themes/default/default.css" type="text/css" />
			<script type="text/javascript">
				$(window).load(function() {
					$('#slider').nivoSlider({
					    effect: 'random',               // Specify sets like: 'fold,fade,sliceDown'
					    controlNav: true,              // 1,2,3... navigation
					    pauseOnHover: true,             // Stop animation while hovering
					    randomStart: true,             // Start on a random slide
					});
				});
			</script>
		<?php } ?>
		<!--[if IE]> <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	</head>

	<header>
		<div id="header-elements">
			<a href="<?php echo site_url(); ?>" id="logo"></a>
			<nav>
				<a href="#" id="menu-icon"></a>
				<ul>
					<li><a href="<?php echo site_url(); ?>" class="<?php if($this->uri->segment(1) != 'about' && $this->uri->segment(1) != 'contact') echo 'current'; ?>">Home</a></li>
					<li><a href="<?php echo site_url('about'); ?>" class="<?php if($this->uri->segment(1) == 'about') echo 'current'; ?>">About</a></li>
					<li><a href="<?php echo site_url('contact'); ?>" class="<?php if($this->uri->segment(1) == 'contact') echo 'current'; ?>">Contact</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<body>