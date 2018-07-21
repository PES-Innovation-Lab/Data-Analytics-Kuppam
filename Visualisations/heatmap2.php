<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="heathcaredb";

	$conn = mysqli_connect($servername, $username, $password, $db);
	
	$sql1="SELECT * From `loc`";
	$result1=mysqli_query($conn,$sql1);
	$count=0;
	$array1=array();
	$array2=array();
	while($row1=mysqli_fetch_row($result1)){
		$array1[$count]=$row1[1];
		$array2[$count]=$row1[2];
		$count++;
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Heatmaps</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #floating-panel {
        background-color: #fff;
        border: 1px solid #999;
        left: 25%;
        padding: 5px;
        position: absolute;
        top: 10px;
        z-index: 5;
      }
    </style>
  </head>

  <body>
    <div id="floating-panel">
      <button onclick="toggleHeatmap()">Toggle Heatmap</button>
      <button onclick="changeGradient()">Change gradient</button>
      <button onclick="changeRadius()">Change radius</button>
      <button onclick="changeOpacity()">Change opacity</button>
    </div>
    <div id="map"></div>
    <script>

		var lat= <?php echo '["' . implode('", "', $array1) . '"]' ?>;
		var lon= <?php echo '["' . implode('", "', $array2) . '"]' ?>;
		console.log(lat);
      // This example requires the Visualization library. Include the libraries=visualization
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=visualization">

      var map, heatmap;

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat: 37.775, lng: -122.434},
          mapTypeId: 'satellite'
        });

        heatmap = new google.maps.visualization.HeatmapLayer({
          data: getPoints(),
          map: map
        });
      }

      function toggleHeatmap() {
        heatmap.setMap(heatmap.getMap() ? null : map);
      }

      function changeGradient() {
        var gradient = [
          'rgba(0, 255, 255, 0)',
          'rgba(0, 255, 255, 1)',
          'rgba(0, 191, 255, 1)',
          'rgba(0, 127, 255, 1)',
          'rgba(0, 63, 255, 1)',
          'rgba(0, 0, 255, 1)',
          'rgba(0, 0, 223, 1)',
          'rgba(0, 0, 191, 1)',
          'rgba(0, 0, 159, 1)',
          'rgba(0, 0, 127, 1)',
          'rgba(63, 0, 91, 1)',
          'rgba(127, 0, 63, 1)',
          'rgba(191, 0, 31, 1)',
          'rgba(255, 0, 0, 1)'
        ]
        heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
      }

      function changeRadius() {
        heatmap.set('radius', heatmap.get('radius') ? null : 20);
      }

      function changeOpacity() {
        heatmap.set('opacity', heatmap.get('opacity') ? null : 0.2);
      }

      // Heatmap data: 500 Points
      function getPoints() {
        return [
          new google.maps.LatLng(lat[0], lon[0]),
		  new google.maps.LatLng(lat[1], lon[1]),
		  new google.maps.LatLng(lat[2], lon[2]),
		  new google.maps.LatLng(lat[3], lon[3]),
		  new google.maps.LatLng(lat[4], lon[4]),
		  new google.maps.LatLng(lat[5], lon[5]),
		  new google.maps.LatLng(lat[6], lon[6]),
		  new google.maps.LatLng(lat[7], lon[7]),
		  new google.maps.LatLng(lat[8], lon[8]),
		  new google.maps.LatLng(lat[9], lon[9]),
		  new google.maps.LatLng(lat[10], lon[10]),
		  new google.maps.LatLng(lat[11], lon[11]),
		  new google.maps.LatLng(lat[12], lon[12]),
		  new google.maps.LatLng(lat[13], lon[13]),
		  new google.maps.LatLng(lat[14], lon[14]),
		  new google.maps.LatLng(lat[15], lon[15]),
		  new google.maps.LatLng(lat[16], lon[16]),
		  new google.maps.LatLng(lat[17], lon[17]),
		  new google.maps.LatLng(lat[18], lon[18]),
		  new google.maps.LatLng(lat[19], lon[19]),
		  new google.maps.LatLng(lat[20], lon[20]),
		  new google.maps.LatLng(lat[21], lon[21]),
		  new google.maps.LatLng(lat[22], lon[22]),
		  new google.maps.LatLng(lat[23], lon[23]),
		  new google.maps.LatLng(lat[24], lon[24]),
		  new google.maps.LatLng(lat[25], lon[25]),
		  new google.maps.LatLng(lat[26], lon[26]),
		  new google.maps.LatLng(lat[27], lon[27]),
		  new google.maps.LatLng(lat[28], lon[28]),
		  new google.maps.LatLng(lat[29], lon[29]),
		  new google.maps.LatLng(lat[30], lon[30]),
		  new google.maps.LatLng(lat[31], lon[31]),
		  new google.maps.LatLng(lat[32], lon[32]),
		  new google.maps.LatLng(lat[33], lon[33]),
		  new google.maps.LatLng(lat[34], lon[34]),
		  new google.maps.LatLng(lat[35], lon[35]),
		  new google.maps.LatLng(lat[36], lon[36]),
		  new google.maps.LatLng(lat[37], lon[37]),
		  new google.maps.LatLng(lat[38], lon[38]),
		  new google.maps.LatLng(lat[39], lon[39]),
		  new google.maps.LatLng(lat[40], lon[40]),
		  new google.maps.LatLng(lat[41], lon[41]),
		  new google.maps.LatLng(lat[42], lon[42]),
		  new google.maps.LatLng(lat[43], lon[43]),
		  new google.maps.LatLng(lat[44], lon[44]),
		  new google.maps.LatLng(lat[45], lon[45]),
		  new google.maps.LatLng(lat[46], lon[46]),
		  new google.maps.LatLng(lat[47], lon[47]),
		  new google.maps.LatLng(lat[48], lon[48]),
		  new google.maps.LatLng(lat[49], lon[49]),
		  new google.maps.LatLng(lat[50], lon[50]),
		  new google.maps.LatLng(lat[51], lon[51]),
		  new google.maps.LatLng(lat[52], lon[52]),
		  new google.maps.LatLng(lat[53], lon[53]),
		  new google.maps.LatLng(lat[54], lon[54]),
		  new google.maps.LatLng(lat[55], lon[55]),
		  new google.maps.LatLng(lat[56], lon[56]),
		  new google.maps.LatLng(lat[57], lon[57]),
		  new google.maps.LatLng(lat[58], lon[58]),
		  new google.maps.LatLng(lat[59], lon[59]),
		  new google.maps.LatLng(lat[60], lon[60]),
		  new google.maps.LatLng(lat[61], lon[61]),
		  new google.maps.LatLng(lat[62], lon[62]),
		  new google.maps.LatLng(lat[63], lon[63]),
		  new google.maps.LatLng(lat[64], lon[64]),
		  new google.maps.LatLng(lat[65], lon[65]),
		  new google.maps.LatLng(lat[66], lon[66]),
		  new google.maps.LatLng(lat[67], lon[67]),
		  new google.maps.LatLng(lat[68], lon[68]),
		  new google.maps.LatLng(lat[100], lon[100]),
		  new google.maps.LatLng(lat[101], lon[101]),
		  new google.maps.LatLng(lat[102], lon[102]),
		  new google.maps.LatLng(lat[103], lon[103]),
		  new google.maps.LatLng(lat[104], lon[104]),
		  new google.maps.LatLng(lat[105], lon[105]),
		  new google.maps.LatLng(lat[106], lon[106]),
		  new google.maps.LatLng(lat[107], lon[107]),
		  new google.maps.LatLng(lat[108], lon[108]),
		  new google.maps.LatLng(lat[109], lon[109]),
		  new google.maps.LatLng(lat[110], lon[110]),
		  new google.maps.LatLng(lat[111], lon[111]),
		  new google.maps.LatLng(lat[112], lon[112]),
		  new google.maps.LatLng(lat[113], lon[113]),
		  new google.maps.LatLng(lat[114], lon[114]),
		  new google.maps.LatLng(lat[115], lon[115]),
		  new google.maps.LatLng(lat[116], lon[116]),
		  new google.maps.LatLng(lat[117], lon[117]),
		  new google.maps.LatLng(lat[118], lon[118]),
		  new google.maps.LatLng(lat[119], lon[119]),
		  new google.maps.LatLng(lat[120], lon[120]),
		  new google.maps.LatLng(lat[121], lon[121]),
		  new google.maps.LatLng(lat[122], lon[122]),
		  new google.maps.LatLng(lat[123], lon[123]),
		  new google.maps.LatLng(lat[124], lon[124]),
		  new google.maps.LatLng(lat[125], lon[125]),
		  new google.maps.LatLng(lat[126], lon[126]),
		  new google.maps.LatLng(lat[127], lon[127]),
		  new google.maps.LatLng(lat[128], lon[128]),
		  new google.maps.LatLng(lat[129], lon[129]),
		  new google.maps.LatLng(lat[130], lon[130]),
		  new google.maps.LatLng(lat[131], lon[131]),
		  new google.maps.LatLng(lat[132], lon[132]),
		  new google.maps.LatLng(lat[133], lon[133]),
		  new google.maps.LatLng(lat[134], lon[134]),
		  new google.maps.LatLng(lat[135], lon[135]),
		  new google.maps.LatLng(lat[136], lon[136]),
		  new google.maps.LatLng(lat[137], lon[137]),
		  new google.maps.LatLng(lat[138], lon[138]),
		  new google.maps.LatLng(lat[139], lon[139]),
		  new google.maps.LatLng(lat[140], lon[140]),
		  new google.maps.LatLng(lat[141], lon[141]),
		  new google.maps.LatLng(lat[142], lon[142]),
		  new google.maps.LatLng(lat[143], lon[143]),
		  new google.maps.LatLng(lat[144], lon[144]),
		  new google.maps.LatLng(lat[145], lon[145]),
		  new google.maps.LatLng(lat[146], lon[146]),
		  new google.maps.LatLng(lat[147], lon[147]),
		  new google.maps.LatLng(lat[148], lon[148]),
		  new google.maps.LatLng(lat[149], lon[149]),
		  new google.maps.LatLng(lat[150], lon[150]),
		  new google.maps.LatLng(lat[151], lon[151]),
		  new google.maps.LatLng(lat[152], lon[152]),
		  new google.maps.LatLng(lat[153], lon[153]),
		  new google.maps.LatLng(lat[154], lon[154]),
		  new google.maps.LatLng(lat[155], lon[155]),
		  new google.maps.LatLng(lat[156], lon[156]),
		  new google.maps.LatLng(lat[157], lon[157]),
		  new google.maps.LatLng(lat[158], lon[158]),
		  new google.maps.LatLng(lat[159], lon[159]),
		  new google.maps.LatLng(lat[160], lon[160]),
		  new google.maps.LatLng(lat[161], lon[161]),
		  new google.maps.LatLng(lat[162], lon[162]),
		  new google.maps.LatLng(lat[163], lon[163]),
		  new google.maps.LatLng(lat[164], lon[164]),
		  new google.maps.LatLng(lat[165], lon[165]),
		  new google.maps.LatLng(lat[166], lon[166]),
		  new google.maps.LatLng(lat[167], lon[167]),
		  new google.maps.LatLng(lat[168], lon[168]),
		  new google.maps.LatLng(lat[1200], lon[1200]),
		  new google.maps.LatLng(lat[1201], lon[1201]),
		  new google.maps.LatLng(lat[1202], lon[1202]),
		  new google.maps.LatLng(lat[1203], lon[1203]),
		  new google.maps.LatLng(lat[1204], lon[1204]),
		  new google.maps.LatLng(lat[1205], lon[1205]),
		  new google.maps.LatLng(lat[1206], lon[1206]),
		  new google.maps.LatLng(lat[1207], lon[1207]),
		  new google.maps.LatLng(lat[1208], lon[1208]),
		  new google.maps.LatLng(lat[1209], lon[1209]),
		  new google.maps.LatLng(lat[1210], lon[1210]),
		  new google.maps.LatLng(lat[1211], lon[1211]),
		  new google.maps.LatLng(lat[1212], lon[1212]),
		  new google.maps.LatLng(lat[1213], lon[1213]),
		  new google.maps.LatLng(lat[1214], lon[1214]),
		  new google.maps.LatLng(lat[1215], lon[1215]),
		  new google.maps.LatLng(lat[1216], lon[1216]),
		  new google.maps.LatLng(lat[1217], lon[1217]),
		  new google.maps.LatLng(lat[1218], lon[1218]),
		  new google.maps.LatLng(lat[1219], lon[1219]),
		  new google.maps.LatLng(lat[1220], lon[1220]),
		  new google.maps.LatLng(lat[1221], lon[1221]),
		  new google.maps.LatLng(lat[1222], lon[1222]),
		  new google.maps.LatLng(lat[1223], lon[1223]),
		  new google.maps.LatLng(lat[1224], lon[1224]),
		  new google.maps.LatLng(lat[1225], lon[1225]),
		  new google.maps.LatLng(lat[1226], lon[1226]),
		  new google.maps.LatLng(lat[1227], lon[1227]),
		  new google.maps.LatLng(lat[1228], lon[1228]),
		  new google.maps.LatLng(lat[1229], lon[1229]),
		  new google.maps.LatLng(lat[1230], lon[1230]),
		  new google.maps.LatLng(lat[1231], lon[1231]),
		  new google.maps.LatLng(lat[1232], lon[1232]),
		  new google.maps.LatLng(lat[1233], lon[1233]),
		  new google.maps.LatLng(lat[1234], lon[1234]),
		  new google.maps.LatLng(lat[1235], lon[1235]),
		  new google.maps.LatLng(lat[1236], lon[1236]),
		  new google.maps.LatLng(lat[1237], lon[1237]),
		  new google.maps.LatLng(lat[1238], lon[1238]),
		  new google.maps.LatLng(lat[1239], lon[1239]),
		  new google.maps.LatLng(lat[1240], lon[1240]),
		  new google.maps.LatLng(lat[1241], lon[1241]),
		  new google.maps.LatLng(lat[1242], lon[1242]),
		  new google.maps.LatLng(lat[1243], lon[1243]),
		  new google.maps.LatLng(lat[1244], lon[1244]),
		  new google.maps.LatLng(lat[1245], lon[1245]),
		  new google.maps.LatLng(lat[1246], lon[1246]),
		  new google.maps.LatLng(lat[1247], lon[1247]),
		  new google.maps.LatLng(lat[1248], lon[1248]),
		  new google.maps.LatLng(lat[1249], lon[1249]),
		  new google.maps.LatLng(lat[1250], lon[1250]),
		  new google.maps.LatLng(lat[1251], lon[1251]),
		  new google.maps.LatLng(lat[1252], lon[1252]),
		  new google.maps.LatLng(lat[1253], lon[1253]),
		  new google.maps.LatLng(lat[1254], lon[1254]),
		  new google.maps.LatLng(lat[1255], lon[1255]),
		  new google.maps.LatLng(lat[1256], lon[1256]),
		  new google.maps.LatLng(lat[1257], lon[1257]),
		  new google.maps.LatLng(lat[1258], lon[1258]),
		  new google.maps.LatLng(lat[1259], lon[1259]),
		  new google.maps.LatLng(lat[1260], lon[1260]),
		  new google.maps.LatLng(lat[1261], lon[1261]),
		  new google.maps.LatLng(lat[1262], lon[1262]),
		  new google.maps.LatLng(lat[1263], lon[1263]),
		  new google.maps.LatLng(lat[1264], lon[1264]),
		  new google.maps.LatLng(lat[1265], lon[1265]),
		  new google.maps.LatLng(lat[1266], lon[1266]),
		  new google.maps.LatLng(lat[1267], lon[1267]),
		  new google.maps.LatLng(lat[1268], lon[1268]),
		  new google.maps.LatLng(lat[1200], lon[1100]),
		  new google.maps.LatLng(lat[1201], lon[1101]),
		  new google.maps.LatLng(lat[1202], lon[1102]),
		  new google.maps.LatLng(lat[1203], lon[1103]),
		  new google.maps.LatLng(lat[1204], lon[1104]),
		  new google.maps.LatLng(lat[1205], lon[1105]),
		  new google.maps.LatLng(lat[1206], lon[1106]),
		  new google.maps.LatLng(lat[1207], lon[1107]),
		  new google.maps.LatLng(lat[1208], lon[1108]),
		  new google.maps.LatLng(lat[1209], lon[1109]),
		  new google.maps.LatLng(lat[1210], lon[1110]),
		  new google.maps.LatLng(lat[1211], lon[1111]),
		  new google.maps.LatLng(lat[1212], lon[1112]),
		  new google.maps.LatLng(lat[1213], lon[1113]),
		  new google.maps.LatLng(lat[1214], lon[1114]),
		  new google.maps.LatLng(lat[1215], lon[1115]),
		  new google.maps.LatLng(lat[1216], lon[1116]),
		  new google.maps.LatLng(lat[1217], lon[1117]),
		  new google.maps.LatLng(lat[1218], lon[1118]),
		  new google.maps.LatLng(lat[1219], lon[1119]),
		  new google.maps.LatLng(lat[1220], lon[1120]),
		  new google.maps.LatLng(lat[1221], lon[1121]),
		  new google.maps.LatLng(lat[1222], lon[1122]),
		  new google.maps.LatLng(lat[1223], lon[1123]),
		  new google.maps.LatLng(lat[1224], lon[1124]),
		  new google.maps.LatLng(lat[1225], lon[1125]),
		  new google.maps.LatLng(lat[1226], lon[1126]),
		  new google.maps.LatLng(lat[1227], lon[1127]),
		  new google.maps.LatLng(lat[1228], lon[1128]),
		  new google.maps.LatLng(lat[1229], lon[1129]),
		  new google.maps.LatLng(lat[1230], lon[1130]),
		  new google.maps.LatLng(lat[1231], lon[1131]),
		  new google.maps.LatLng(lat[1232], lon[1132]),
		  new google.maps.LatLng(lat[1233], lon[1133]),
		  new google.maps.LatLng(lat[1234], lon[1134]),
		  new google.maps.LatLng(lat[1235], lon[1135]),
		  new google.maps.LatLng(lat[1236], lon[1136]),
		  new google.maps.LatLng(lat[1237], lon[1137]),
		  new google.maps.LatLng(lat[1238], lon[1138]),
		  new google.maps.LatLng(lat[1239], lon[1139]),
		  new google.maps.LatLng(lat[1240], lon[1140]),
		  new google.maps.LatLng(lat[1241], lon[1141]),
		  new google.maps.LatLng(lat[1242], lon[1142]),
		  new google.maps.LatLng(lat[1243], lon[1143]),
		  new google.maps.LatLng(lat[1244], lon[1144]),
		  new google.maps.LatLng(lat[1245], lon[1145]),
		  new google.maps.LatLng(lat[1246], lon[1146]),
		  new google.maps.LatLng(lat[1247], lon[1147]),
		  new google.maps.LatLng(lat[1248], lon[1148]),
		  new google.maps.LatLng(lat[1249], lon[1149]),
		  new google.maps.LatLng(lat[1250], lon[1150]),
		  new google.maps.LatLng(lat[1251], lon[1151]),
		  new google.maps.LatLng(lat[1252], lon[1152]),
		  new google.maps.LatLng(lat[1253], lon[1153]),
		  new google.maps.LatLng(lat[1254], lon[1154]),
		  new google.maps.LatLng(lat[1255], lon[1155]),
		  new google.maps.LatLng(lat[1256], lon[1156]),
		  new google.maps.LatLng(lat[1257], lon[1157]),
		  new google.maps.LatLng(lat[1258], lon[1158]),
		  new google.maps.LatLng(lat[1259], lon[1159]),
		  new google.maps.LatLng(lat[1260], lon[1160]),
		  new google.maps.LatLng(lat[1261], lon[1161]),
		  new google.maps.LatLng(lat[1262], lon[1162]),
		  new google.maps.LatLng(lat[1263], lon[1163]),
		  new google.maps.LatLng(lat[1264], lon[1164]),
		  new google.maps.LatLng(lat[1265], lon[1165]),
		  new google.maps.LatLng(lat[1266], lon[1166]),
		  new google.maps.LatLng(lat[1267], lon[1167]),
		  new google.maps.LatLng(lat[1268], lon[1168]),
		  new google.maps.LatLng(lat[1300], lon[1300]),
		  new google.maps.LatLng(lat[1301], lon[1301]),
		  new google.maps.LatLng(lat[1302], lon[1302]),
		  new google.maps.LatLng(lat[1303], lon[1303]),
		  new google.maps.LatLng(lat[1304], lon[1304]),
		  new google.maps.LatLng(lat[1305], lon[1305]),
		  new google.maps.LatLng(lat[1306], lon[1306]),
		  new google.maps.LatLng(lat[1307], lon[1307]),
		  new google.maps.LatLng(lat[1308], lon[1308]),
		  new google.maps.LatLng(lat[1309], lon[1309]),
		  new google.maps.LatLng(lat[1310], lon[1310]),
		  new google.maps.LatLng(lat[1311], lon[1311]),
		  new google.maps.LatLng(lat[1312], lon[1312]),
		  new google.maps.LatLng(lat[1313], lon[1313]),
		  new google.maps.LatLng(lat[1314], lon[1314]),
		  new google.maps.LatLng(lat[1315], lon[1315]),
		  new google.maps.LatLng(lat[1316], lon[1316]),
		  new google.maps.LatLng(lat[1317], lon[1317]),
		  new google.maps.LatLng(lat[1318], lon[1318]),
		  new google.maps.LatLng(lat[1319], lon[1319]),
		  new google.maps.LatLng(lat[1320], lon[1320]),
		  new google.maps.LatLng(lat[1321], lon[1321]),
		  new google.maps.LatLng(lat[1322], lon[1322]),
		  new google.maps.LatLng(lat[1323], lon[1323]),
		  new google.maps.LatLng(lat[1324], lon[1324]),
		  new google.maps.LatLng(lat[1325], lon[1325]),
		  new google.maps.LatLng(lat[1326], lon[1326]),
		  new google.maps.LatLng(lat[1327], lon[1327]),
		  new google.maps.LatLng(lat[1328], lon[1328]),
		  new google.maps.LatLng(lat[1329], lon[1329]),
		  new google.maps.LatLng(lat[1330], lon[1330]),
		  new google.maps.LatLng(lat[1331], lon[1331]),
		  new google.maps.LatLng(lat[1332], lon[1332]),
		  new google.maps.LatLng(lat[1333], lon[1333]),
		  new google.maps.LatLng(lat[1334], lon[1334]),
		  new google.maps.LatLng(lat[1335], lon[1335]),
		  new google.maps.LatLng(lat[1336], lon[1336]),
		  new google.maps.LatLng(lat[1337], lon[1337]),
		  new google.maps.LatLng(lat[1338], lon[1338]),
		  new google.maps.LatLng(lat[1339], lon[1339]),
		  new google.maps.LatLng(lat[1340], lon[1340]),
		  new google.maps.LatLng(lat[1341], lon[1341]),
		  new google.maps.LatLng(lat[1342], lon[1342]),
		  new google.maps.LatLng(lat[1343], lon[1343]),
		  new google.maps.LatLng(lat[1344], lon[1344]),
		  new google.maps.LatLng(lat[1345], lon[1345]),
		  new google.maps.LatLng(lat[1346], lon[1346]),
		  new google.maps.LatLng(lat[1347], lon[1347]),
		  new google.maps.LatLng(lat[1348], lon[1348]),
		  new google.maps.LatLng(lat[1349], lon[1349]),
		  new google.maps.LatLng(lat[1350], lon[1350]),
		  new google.maps.LatLng(lat[1351], lon[1351]),
		  new google.maps.LatLng(lat[1352], lon[1352]),
		  new google.maps.LatLng(lat[1353], lon[1353]),
		  new google.maps.LatLng(lat[1354], lon[1354]),
		  new google.maps.LatLng(lat[1355], lon[1355]),
		  new google.maps.LatLng(lat[1356], lon[1356]),
		  new google.maps.LatLng(lat[1357], lon[1357]),
		  new google.maps.LatLng(lat[1358], lon[1358]),
		  new google.maps.LatLng(lat[1359], lon[1359]),
		  new google.maps.LatLng(lat[1360], lon[1360]),
		  new google.maps.LatLng(lat[1361], lon[1361]),
		  new google.maps.LatLng(lat[1362], lon[1362]),
		  new google.maps.LatLng(lat[1363], lon[1363]),
		  new google.maps.LatLng(lat[1364], lon[1364]),
		  new google.maps.LatLng(lat[1365], lon[1365]),
		  new google.maps.LatLng(lat[1366], lon[1366]),
		  new google.maps.LatLng(lat[1367], lon[1367]),
		  new google.maps.LatLng(lat[1368], lon[1368]),
		  new google.maps.LatLng(lat[1300], lon[100]),
		  new google.maps.LatLng(lat[1401], lon[1401]),
		  new google.maps.LatLng(lat[1402], lon[1402]),
		  new google.maps.LatLng(lat[1403], lon[1403]),
		  new google.maps.LatLng(lat[1404], lon[1404]),
		  new google.maps.LatLng(lat[1405], lon[1405]),
		  new google.maps.LatLng(lat[1406], lon[1406]),
		  new google.maps.LatLng(lat[1407], lon[1407]),
		  new google.maps.LatLng(lat[1408], lon[1408]),
		  new google.maps.LatLng(lat[1409], lon[1409]),
		  new google.maps.LatLng(lat[1410], lon[1410]),
		  new google.maps.LatLng(lat[1411], lon[1411]),
		  new google.maps.LatLng(lat[1412], lon[1412]),
		  new google.maps.LatLng(lat[1413], lon[1413]),
		  new google.maps.LatLng(lat[1414], lon[1414]),
		  new google.maps.LatLng(lat[1415], lon[1415]),
		  new google.maps.LatLng(lat[1416], lon[1416]),
		  new google.maps.LatLng(lat[1417], lon[1417]),
		  new google.maps.LatLng(lat[1418], lon[1418]),
		  new google.maps.LatLng(lat[1419], lon[1419]),
		  new google.maps.LatLng(lat[1420], lon[1420]),
		  new google.maps.LatLng(lat[1421], lon[1421]),
		  new google.maps.LatLng(lat[1422], lon[1422]),
		  new google.maps.LatLng(lat[1423], lon[1423]),
		  new google.maps.LatLng(lat[1424], lon[1424]),
		  new google.maps.LatLng(lat[1425], lon[1425]),
		  new google.maps.LatLng(lat[1426], lon[1426]),
		  new google.maps.LatLng(lat[1427], lon[1427]),
		  new google.maps.LatLng(lat[1428], lon[1428]),
		  new google.maps.LatLng(lat[1429], lon[1429]),
		  new google.maps.LatLng(lat[1430], lon[1430]),
		  new google.maps.LatLng(lat[1431], lon[1431]),
		  new google.maps.LatLng(lat[1432], lon[1432]),
		  new google.maps.LatLng(lat[1433], lon[1433]),
		  new google.maps.LatLng(lat[1434], lon[1434]),
		  new google.maps.LatLng(lat[1435], lon[1435]),
		  new google.maps.LatLng(lat[1436], lon[1436]),
		  new google.maps.LatLng(lat[1437], lon[1437]),
		  new google.maps.LatLng(lat[1438], lon[1438]),
		  new google.maps.LatLng(lat[1439], lon[1439]),
		  new google.maps.LatLng(lat[1440], lon[1440]),
		  new google.maps.LatLng(lat[1441], lon[1441]),
		  new google.maps.LatLng(lat[1442], lon[1442]),
		  new google.maps.LatLng(lat[1443], lon[1443]),
		  new google.maps.LatLng(lat[1444], lon[1444]),
		  new google.maps.LatLng(lat[1445], lon[1445]),
		  new google.maps.LatLng(lat[1446], lon[1446]),
		  new google.maps.LatLng(lat[1447], lon[1447]),
		  new google.maps.LatLng(lat[1448], lon[1448]),
		  new google.maps.LatLng(lat[1449], lon[1449]),
		  new google.maps.LatLng(lat[1450], lon[1450]),
		  new google.maps.LatLng(lat[1451], lon[1151]),
		  new google.maps.LatLng(lat[1452], lon[1452]),
		  new google.maps.LatLng(lat[1453], lon[1453]),
		  new google.maps.LatLng(lat[1454], lon[1454]),
		  new google.maps.LatLng(lat[1455], lon[1455]),
		  new google.maps.LatLng(lat[1456], lon[1456]),
		  new google.maps.LatLng(lat[1457], lon[1457]),
		  new google.maps.LatLng(lat[1458], lon[1458]),
		  new google.maps.LatLng(lat[1459], lon[1459]),
		  new google.maps.LatLng(lat[1460], lon[1460]),
		  new google.maps.LatLng(lat[1461], lon[1461]),
		  new google.maps.LatLng(lat[1462], lon[1462]),
		  new google.maps.LatLng(lat[1463], lon[1463]),
		  new google.maps.LatLng(lat[1464], lon[1464]),
		  new google.maps.LatLng(lat[1465], lon[1465]),
		  new google.maps.LatLng(lat[1466], lon[1466]),
		  new google.maps.LatLng(lat[1467], lon[1467]),
		  new google.maps.LatLng(lat[1468], lon[1468])
        ];
      }
    </script>
	<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDE80To9j9uUoQ6Wy0ghE67JTlKSdn4p_A&libraries=visualization&callback=initMap">
    </script>


  </body>
</html