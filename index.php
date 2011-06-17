<?php
require('lib/PachubeAPI.php');

if(isset($_GET['token']) && $token != '')
{
	//$config = getConfig($_GET['token']);
	//$key = $config->
	//$Pachube = 
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Energy dashboard</title>
		<link type="text/css" href="css/cupertino/jquery-ui.css" rel="stylesheet" />	
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="js/dygraph.js"></script>
		<script type="text/javascript" src="js/PachubeAPI.js"></script>
		<script type="text/javascript">
			$(function(){
				// Tabs
				$('.tabs').tabs();
				Pachube.parseURL();
				alert(Pachube.getToken());
			});
		</script>
		<style type="text/css">
			body{ font: 62.5% "Trebuchet MS", sans-serif; margin: 50px;}
			#information {height: 200px !important;}
			#vizualization {height: 400px;}
		</style>	
	</head>
	<body>
		<h2>Energy Dashboard</h2>
				<h3><a href="#">Information</a></h3>
					<div class="tabs">
						<ul>
							<li><a href="#main-info">Main</a></li>
							<li><a href="#on-map">On map</a></li>
						</ul>
						<div id="main-info"></div>
						<div id="on-map"></div>
					</div>
				<h3><a href="#">Vizualization</a></h3>
					<div class="tabs">
						<ul>
							<li><a href="#today">Today</a></li>
							<li><a href="#week">Last 7 days</a></li>
							<li><a href="#month">Last 30 days</a></li>
						</ul>
						<div id="today"></div>
						<div id="week"></div>
						<div id="month"></div>
					</div>
	</body>
</html>


