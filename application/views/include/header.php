<!DOCTYPE html>

<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title><?php if(isset($title)) { echo $title; } else { echo "Program for Accountability in Nepal"; } ?></title>
		<meta name="description" content="Programme for Accountability in Nepal (PRAN) is designed to provide practical training and action learning aimed at developing the capacity of civil society and government actors to promote social accountability in Nepal.">
		<meta name="keywords" content="accountability, social, funding, programme, accountable, transparent, services, agencies, promotion, initiative, society, government, citizen, budget, public">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<script src="<?= site_url('assets/js/jquery-2.0.3.min.js') ?>"></script>
		
		<?php if($this->uri->rsegments[1] == 'map' || $this->uri->segment(1) == 'search' || $this->uri->segment(1) == 'filters') { ?>
			<link rel="stylesheet" type="text/css" href="<?= site_url('assets/js/mapbox/mapbox.css'); ?>">
		    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/js/DataTables-1.9.4/media/css/jquery.dataTables_themeroller.css'); ?>">
		    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/css/jquery-ui/jquery-ui.min.css'); ?>">
		    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/css/alertify.default.css'); ?>">
			<link rel="stylesheet" type="text/css" href="<?= site_url('assets/css/alertify.core.css'); ?>">
		<?php } ?>
		
		<?php if ($this->uri->segment(1) == 'about') { ?>
			<link rel="stylesheet" href="<?= site_url('assets/js/nivo-slider/nivo-slider.css'); ?>" type="text/css" />
			<link rel="stylesheet" href="<?= site_url('assets/js/nivo-slider/themes/default/default.css'); ?>" type="text/css" />
		<?php } ?>

		<link rel="stylesheet" href="<?= site_url('assets/css/styles.css'); ?>">
		<link rel="shortcut icon" href="<?= site_url('assets/img/favicon-pran.png'); ?>" type="image/png">
		<!--[if IE]> <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

		<!-- Google Analytics -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-45269476-1', 'pranmap.org');
		  ga('send', 'pageview');

		</script>
	</head>

	<body>
		<header>
			<div id="header-elements">
				<a href="<?= site_url(); ?>" id="logo"></a>
				<nav>
					<a href="#" id="menu-icon"></a>
					<ul>
						<li><a href="<?= site_url(); ?>" class="<?php if($this->uri->rsegments[1] == 'map' || $this->uri->segment(1) == 'search' || $this->uri->segment(1) == 'filters') echo 'current'; ?>">Home</a></li>
						<li><a href="<?= site_url('about'); ?>" class="<?php if($this->uri->segment(1) == 'about') echo 'current'; ?>">About</a></li>
						<li><a href="<?= site_url('contact'); ?>" class="<?php if($this->uri->segment(1) == 'contact') echo 'current'; ?>">Contact</a></li>
					</ul>
				</nav>
			</div>
		</header>