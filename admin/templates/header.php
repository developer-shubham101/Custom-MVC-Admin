<?php
$title = $this->title;

ob_start( 'sanitize_output'  );

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="description" content="PHP MVC Design patten.">
	<!-- Favicons-->
	
	<meta name="msapplication-TileColor" content="#1565c0">
	<meta name="msapplication-TileImage" content="<?php echo URL ?>assets/favicon144X144.png">
	<link rel="icon" href="<?php echo URL ?>assets/favicon32X32.png" sizes="32x32">
	<!--  Android 5 Chrome Color-->
	<meta name="theme-color" content="#EE6E73">
	<!-- CSS-->
	<link href="<?php echo URL; ?>assets/materialize/css/prism.css" rel="stylesheet">
	<link href="<?php echo URL; ?>assets/materialize/css/ghpages-materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
	<link href="http://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<title><?php echo $title ;?></title>
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>assets/bootstrapv3/css/fonts.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL ?>assets/css/webarch.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo URL ?>assets/css/jquery.scrollbar.css"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo URL ?>assets/css/zebra_pagination.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>assets/plugin/editable/css/bootstrap-editable.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>assets/plugin/TE/jquery-te-1.4.0.css">
	<script src="<?php echo URL; ?>assets\js\jquery-1.11.3.min.js"></script>
	<!--<script src="<?php echo URL; ?>assets\js\jquery.scrollbar.min.js"></script>-->
	<!--<script src="<?php echo URL; ?>assets\js\webarch.js"></script>-->
	<?php include 'site-location.php'; ?>

	<script src="<?php echo URL; ?>assets\bootstrapv3\js\bootstrap.min.js"></script>
	<script src="<?php echo URL; ?>assets\js\jquery.form.js"></script>
	<script src="<?php echo URL; ?>assets\js\jquery.validate.min.js"></script>
	<script src="<?php echo URL; ?>assets\js\jquery.autocomplete.min.js"></script>
	<script src="<?php echo URL; ?>assets/plugin/editable/js/bootstrap-editable.min.js"></script>
	<script src="<?php echo URL; ?>assets/plugin/TE/jquery-te-1.4.0.min.js"></script>
	<script src="<?php echo URL; ?>assets\js\script.js"></script>
	<script src="<?php echo URL; ?>assets/materialize/js/jquery.timeago.min.js"></script>
	<script src="<?php echo URL; ?>assets/materialize/js/prism.js"></script>
	<script src="<?php echo URL; ?>assets/materialize/jade/lunr.min.js"></script>
	<script src="<?php echo URL; ?>assets/materialize/jade/search.js"></script>
	<script src="<?php echo URL; ?>assets/materialize/bin/materialize.js"></script>
	<script src="<?php echo URL; ?>assets/materialize/js/init.js"></script>
	<body>
		<header>
			<div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav waves-effect waves-light circle hide-on-large-only"><i class="material-icons">menu</i></a></div>
			<ul id="nav-mobile" class="side-nav fixed">
				<li class="logo">
					<a id="logo-container" href="http://materializecss.com/" class="brand-logo">
						<object id="front-page-logo" type="image/svg+xml" data="<?php echo URL; ?>assets/ss.svg">Your browser does not support SVG</object>
						<!-- My site -->
					</a>
				</li>
				<li class="search">
					<div class="search-wrapper card">
						<input id="search"><i class="material-icons">search</i>
						<div class="search-results"></div>
					</div>
				</li>
				<?php
				$menues = array(
					array("url" => "http","title" => "List Of http"),
					array("url" => "http/create","title" => "Create http"),
					array("url" => "team","title" => "Cities List"),
					array("url" => "president","title" => "President Of India"),
					array("url" => "gallery","title" => "Gallery"),
					array("url" => "logout","title" => "Logout"),
					);
				if (Help::isLogedin()){
					foreach ($menues as $key => $value) {
						echo '<li class="bold">
						<a class="waves-effect waves-teal" href="' . URL . $value ['url'] . '">
							'.$value ['title'].'
						</a>
					</li>';
				}
			}
			?>
			<li class="no-padding">
				<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header  waves-effect waves-teal">DEMO</a>
						<div class="collapsible-body">
							<ul>
								<li><a href="color.html">Color</a></li>
								<li><a href="grid.html">Grid</a></li>
								<li><a href="helpers.html">Helpers</a></li>
								<li><a href="media-css.html">Media</a></li>
								<li><a href="pulse.html">Pulse</a></li>
								<li><a href="sass.html">Sass</a></li>
								<li><a href="shadow.html">Shadow</a></li>
								<li><a href="table.html">Table</a></li>
								<li><a href="css-transitions.html">Transitions</a></li>
								<li><a href="typography.html">Typography</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</li>
		</ul>
	</header>
	<main>
		<div class="section no-pad-bot" id="index-banner">
			<div class="container">
				<h1 class="header center-on-small-only">MVC Design patten</h1>
				<div class='row center'>
					<h4 class ="header col s12 light center">A simple custom  MVC framework...<br /> Created by Shubham Sharma <a href="maleto:nbt.suhbham@outlook.com" title="Send Mail">Contact on nbt.suhbham@outlook.com</a></h4>
				</div>
			</div>
		</div>
