<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "heathcaredb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connection established<br>";

$loc_id=array();
$loc_lat=array();
$loc_lon=array();
$row1=array();
$row2=array();
static $child_id=array();
static $lat=array();
static $lon=array();
$cnt=0;

$sql1="SELECT * FROM `loc`";
$result1=mysqli_query($conn,$sql1);
$count=0;
while($row1=mysqli_fetch_row($result1)){
	$loc_id[$count]=$row1[0];
	$loc_lat[$count]=$row1[1];
	$loc_lon[$count]=$row1[2];
	$count++;
}
//Array row1[] contains child_id,lat and lon for each instance

$sql2="SELECT child_id FROM `ent` where `urti`=1";
$result2=mysqli_query($conn,$sql2);
$c=0;
while($row2=mysqli_fetch_row($result2)){
	$index=array_search($row2[0],$loc_id);
		if($index){
			 $child_id[$cnt]=$loc_id[$index];
			 $lat[$cnt]=$loc_lat[$index];
			 $lon[$cnt]=$loc_lon[$index];
			}
		$cnt++;	
}
//echo $cnt."<br>";
//for($c=0;$c<=7;$c++){
	//echo $child_id[$c].",".$lat[$c].",".$lon[$c]."<br>";
//}

?>

<html>
<title>ENT Visualised in Geo MAP</title>
<head>

<meta charset="UTF-8">
<style>
	body{
		background-image:url(bg.jpg);
	}
	</style>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0-n44tEbznAsb2nhUnejkRT7va3mewEo&callback=drawChart"
  type="text/javascript"></script>
	<script type="text/javascript">
	
	child_id=[];
	lat=[];
	lon=[];
    child_id[0] = parseFloat(<?php echo $child_id[0] ; ?>);
    lat[0] = parseFloat(<?php echo $lat[0]; ?>);
    lon[0] = parseFloat(<?php echo $lon[0]; ?>);
	child_id[1] = parseFloat(<?php echo $child_id[1] ; ?>);
    lat[1] = parseFloat(<?php echo $lat[1]; ?>);
    lon[1] = parseFloat(<?php echo $lon[1]; ?>);
	
	child_id[2] = parseFloat(<?php echo $child_id[2] ; ?>);
    lat[2] = parseFloat(<?php echo $lat[2]; ?>);
    lon[2] = parseFloat(<?php echo $lon[2]; ?>);
	
	child_id[3] = parseFloat(<?php echo $child_id[3] ; ?>);
    lat[3] = parseFloat(<?php echo $lat[3]; ?>);
    lon[3] = parseFloat(<?php echo $lon[3]; ?>);
	
	child_id[4] = parseFloat(<?php echo $child_id[4] ; ?>);
    lat[4] = parseFloat(<?php echo $lat[4]; ?>);
    lon[4] = parseFloat(<?php echo $lon[4]; ?>);
	child_id[5] = parseFloat(<?php echo $child_id[5] ; ?>);
    lat[5] = parseFloat(<?php echo $lat[5]; ?>);
    lon[5] = parseFloat(<?php echo $lon[5]; ?>);
	
	child_id[6] = parseFloat(<?php echo $child_id[6] ; ?>);
    lat[6] = parseFloat(<?php echo $lat[6]; ?>);
    lon[6] = parseFloat(<?php echo $lon[6]; ?>);
	
	child_id[7] = parseFloat(<?php echo $child_id[7] ; ?>);
    lat[7] = parseFloat(<?php echo $lat[7]; ?>);
    lon[7] = parseFloat(<?php echo $lon[7]; ?>);
	
	
	

    <!--  Then pass it to the JavaScript function:   -->
      google.charts.load("current", {packages:["map"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Lat', 'Long', 'Child id'],
          [lat[0], lon[0], child_id[0]],
          [lat[1], lon[1], child_id[1]],
		  [lat[2], lon[2], child_id[2]],
          [lat[3], lon[3], child_id[3]],
		  [lat[4], lon[4], child_id[4]],
          [lat[5], lon[5], child_id[5]],
		  [lat[6], lon[6], child_id[6]],
          [lat[7], lon[7], child_id[7]]
          
        ]);

        var map = new google.visualization.Map(document.getElementById('map_div'));
        map.draw(data, {showTip: true});
      }

    </script>
  </head>

  <body>
  <center><h1> GEO MAPS TO ANALYSE URTI </h1>
    <div id="map_div" style="width: 700px; height: 700px"></div></center>
  </body>
</html>


