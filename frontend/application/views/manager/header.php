<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $this->config->item('ws_site'); ?> [ <?php if(isset($title) ) echo $title; ?> ]</title>

	<!-- Vendor CSS -->
	<link href="<?php echo vendor_url('bower_components/fullcalendar/dist/fullcalendar.min.css') ?>" rel="stylesheet">

	<link href="<?php echo vendor_url('bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') ?>" rel="stylesheet">
	<!-- Vendor CSS -->
	<link href="<?php echo vendor_url('bower_components/animate.css/animate.min.css') ?>" rel="stylesheet">
	<link href="<?php echo vendor_url('bower_components/google-material-color/dist/palette.css') ?>" rel="stylesheet">
	<link href="<?php echo vendor_url('bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo vendor_url('bower_components/bootstrap-sweetalert/lib/sweet-alert.css'); ?>" rel="stylesheet">
	<!-- CSS -->
	<link href="<?php echo css_url('app.min.1.admin'); ?>" rel="stylesheet">
	<link href="<?php echo css_url('app.min.2.admin'); ?>" rel="stylesheet">
	<link href="<?php echo vendor_url('bootgrid/jquery.bootgrid.min.css'); ?>" rel="stylesheet">

	<link href="<?php echo vendor_url('bower_components/bootstrap-select/dist/css/bootstrap-select.css'); ?>" rel="stylesheet">
	<link href="<?php echo vendor_url('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo vendor_url('bower_components/chosen/chosen.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo vendor_url('farbtastic/farbtastic.css'); ?>" rel="stylesheet">
	<script src="<?php echo vendor_url('bower_components/jquery/dist/jquery.min.js'); ?>"></script>
	<script src="<?php echo vendor_url('bootgrid/jquery.bootgrid.updated.min.js'); ?>"></script>
</head>
<body data-ma-header="teal">
<header id="header" class="media">
	<div class="pull-left h-logo">
		<a href="index-2.html" class="hidden-xs">
			<?php echo site_name(); ?>
			<small>Manager</small>
		</a>

		<div class="menu-collapse" data-ma-action="sidebar-open" data-ma-target="main-menu">
			<div class="mc-wrap">
				<div class="mcw-line top palette-White bg"></div>
				<div class="mcw-line center palette-White bg"></div>
				<div class="mcw-line bottom palette-White bg"></div>
			</div>
		</div>
	</div>

	<ul class="pull-right h-menu">
		<li class="hm-search-trigger">
			<a href="#" data-ma-action="search-open">
				<i class="hm-icon zmdi zmdi-search"></i>
			</a>
		</li>



		<li class="dropdown hm-profile">
			<a data-toggle="dropdown" href="#">
				<img src="<?php echo img_url('profile-pics/1.jpg'); ?>" alt="">
			</a>

			<ul class="dropdown-menu pull-right dm-icon">
				<li>
					<a href="<?php echo site_url(); ?>/Manager/show/account"><i class="zmdi zmdi-account"></i> Mon compte</a>
				</li>
				<li>
					<a href="<?php echo site_url(); ?>/Manager/show/logout"><i class="zmdi zmdi-input-antenna"></i> Déconnexion</a>
				</li>

			</ul>
		</li>
	</ul>



</header>


<script src="<?php echo vendor_url('bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo vendor_url('bower_components/Waves/dist/waves.min.js'); ?>"></script>
<script src="<?php echo vendor_url('bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js'); ?>"></script>
<script src="<?php echo vendor_url('bower_components/salvattore/dist/salvattore.min.js'); ?>"></script>
<script src="<?php echo vendor_url('bower_components/flot/jquery.flot.js'); ?>"></script>
<script src="<?php echo vendor_url('bower_components/flot/jquery.flot.resize.js'); ?>"></script>

<script src="<?php echo vendor_url('bower_components/flot.curvedlines/curvedLines.js'); ?>"></script>
<script src="<?php echo vendor_url('sparklines/jquery.sparkline.min.js'); ?>"></script>
<script src="<?php echo vendor_url('bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js'); ?>"></script>
<script src="<?php echo vendor_url('bower_components/moment/min/moment.min.js'); ?>"></script>


<script src="<?php echo vendor_url('bower_components/bootstrap-select/dist/js/bootstrap-select.js'); ?>"></script>

<script src="<?php echo vendor_url('bower_components/nouislider/distribute/jquery.nouislider.all.min.js'); ?>"></script>


<script src="<?php echo vendor_url('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'); ?>"></script>

<script src="<?php echo vendor_url('bower_components/typeahead.js/dist/typeahead.bundle.min.js'); ?>"></script>

<script src="<?php echo vendor_url('summernote/dist/summernote-updated.min.js'); ?>"></script>


<script src="<?php echo vendor_url('bower_components/fullcalendar/dist/fullcalendar.min.js'); ?>"></script>

<script src="<?php echo vendor_url('bower_components/simpleWeather/jquery.simpleWeather.min.js'); ?>"></script>
<script src="<?php echo vendor_url('bower_components/Waves/dist/waves.min.js'); ?>"></script>
<script src="<?php echo vendor_url('bootstrap-growl/bootstrap-growl.min.js'); ?>"></script>
<script src="<?php echo vendor_url('bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>


<!-- Placeholder for IE9 -->
<!--[if IE 9 ]>
<script src="<?php echo vendor_url('bower_components/jquery-placeholder/jquery.placeholder.min.js'); ?>"></script>
<![endif]-->

<script src="<?php echo js_url('flot-charts/curved-line-chart.js'); ?>"></script>
<script src="<?php echo js_url('flot-charts/bar-chart.js'); ?>"></script>
<script src="<?php echo js_url('charts.js'); ?>"></script>






<script src="<?php echo vendor_url('bower_components/chosen/chosen.jquery.min.js'); ?>"></script>
<script src="<?php echo vendor_url('fileinput/fileinput.min.js'); ?>"></script>
<script src="<?php echo vendor_url('input-mask/input-mask.min.js'); ?>"></script>
<script src="<?php echo vendor_url('farbtastic/farbtastic.min.js'); ?>"></script>




<script src="<?php echo js_url('functions.js'); ?>"></script>
<script src="<?php echo js_url('actions.js'); ?>"></script>
<script src="<?php echo js_url('demo.js'); ?>"></script>



<section id="main">


	<aside id="s-main-menu" class="sidebar">
		<div class="smm-header">
			<i class="zmdi zmdi-long-arrow-left" data-ma-action="sidebar-close"></i>
		</div>

		<ul class="smm-alerts">
			<li data-user-alert="sua-messages" data-ma-action="sidebar-open" data-ma-target="user-alerts">
				<i class="zmdi zmdi-email"></i>
			</li>
			<li data-user-alert="sua-notifications" data-ma-action="sidebar-open" data-ma-target="user-alerts">
				<i class="zmdi zmdi-notifications"></i>
			</li>
			<li data-user-alert="sua-tasks" data-ma-action="sidebar-open" data-ma-target="user-alerts">
				<i class="zmdi zmdi-view-list-alt"></i>
			</li>
		</ul>

		<ul class="main-menu">
			<li>
				<a href="<?php echo site_url(); ?>/Manager/dashoard"><i class="zmdi zmdi-home"></i> Tableau de bord</a>
			</li>

			<li><a href="<?php echo site_url(); ?>/Manager/show/chaines"><i class="zmdi zmdi-format-underlined"></i> Gestion des chaines</a></li>
			<li><a href="<?php echo site_url(); ?>/Manager/show/thematiques"><i class="zmdi zmdi-format-underlined"></i> Gestion des thématiques</a></li>
			<li><a href="<?php echo site_url(); ?>/Manager/show/emissions"><i class="zmdi zmdi-format-underlined"></i> Gestion des emission</a></li>
			<li><a href="<?php echo site_url(); ?>/Manager/show/slides"><i class="zmdi zmdi-format-underlined"></i> Gestion des slide</a></li>
			<li><a href="<?php echo site_url(); ?>/Manager/show/programes"><i class="zmdi zmdi-format-underlined"></i> Gestion des programme</a></li>
			<li><a href="<?php echo site_url(); ?>/Manager/show/utilisateurs"><i class="zmdi zmdi-format-underlined"></i> Gestion des utilisateur</a></li>








		</ul>
	</aside>
