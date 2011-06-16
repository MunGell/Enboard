<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9"> 
    <!--[if IE]><script src="js/excanvas.compiled.js"></script><![endif]-->
		<title>Energy dashboard</title>
		<link type="text/css" href="css/cupertino/jquery-ui.css" rel="stylesheet" />	
    <script type="text/javascript" src="http://dygraphs.com/dygraph-combined.js"></script>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="js/dygraph.js"></script>
		<script type="text/javascript" src="js/PachubeAPI.js"></script>
		<script type="text/javascript">
    
    
    
    
			$(function(){
				// Tabs
				$('.tabs').tabs();
				
				date = new Date();
				today = date.getFullYear() + "-0" + (date.getMonth()+1) + "-" +  date.getDate();
				//alert(today);
				function showTodayGraph()
				{
					data = "";
					json = Pachube.getDatastreamHistory('25842', '0', today, today, 0);
					$.each(json.datapoints, function(index, value)
					{
						time = value.at.split('T');
						time[0] = time[0].split('-').join('/');
						time[1] = time[1].substring(0,8);
						time = time.join(" ");
						
						data += time + "," + value.value;
						alert(data);
					});
				}
				showTodayGraph();
				
				//Pachube.getKey();
				//alert(Pachube.key);
				$('#today').append();
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
              <li><a href="#around-you">Around You</a></li>
						</ul>
						<div id="main-info"></div>
						<div id="on-map"></div>
            <div id="around-you"></div>     
					</div>
				<h3><a href="#">Visualization</a></h3>
					<div class="tabs">
						<ul>
							<li><a href="#today">Today</a></li>
                  
							<li><a href="#week">Last 7 days</a></li>
							<li><a href="#month">Last 30 days</a></li>
						</ul>
						<div id="today"><div id="dashgraph" style="width:480px; height:320px;"></div> </div>     
						<div id="week"></div>
						<div id="month"></div>
					</div>
          
        
  <script type="text/javascript">
  //Calling Function for the Visualization Graph (Dygraph)
  g4 = new Dygraph(
    document.getElementById("dashgraph"),
    "temperatures.csv",
    {
      rollPeriod: 7,
      showRoller: true,
      errorBars: true,
      valueRange: [50,125]
    }
  );
</script>          
	</body>
</html>


