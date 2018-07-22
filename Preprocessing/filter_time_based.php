<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="heathcaredb";

	$conn = mysqli_connect($servername, $username, $password, $db);
	
	$x=array("ent" , "eye" , "eye1" , "health1" , "health2" , "images" , "loc" , "skin");
	
	for($i=0;$i<8;$i++){
	
	$sql1="SELECT * FROM `$x[$i]` WHERE Extract(month from timestamp)=3 GROUP BY child_id;";
	$result1=mysqli_query($conn, $sql1);
	$count1=0;
	$childid1=array();
	$time1=array();
	while($row1=mysqli_fetch_assoc($result1)){
		$childid1[$count1]=$row1['child_id'];
		//echo $row1['child_id']."->".$row1['timestamp'];
		$time1[$count1]=$row1['timestamp'];
		$count1++;
	}
	
	//$date = date('d-m-Y', $timestamp);
	//date('Y-m-d', strtotime(str_replace('-','/', $date)));
	
	$del=array();
	$count2=0;
	$sql2="SELECT * FROM `$x[$i]` WHERE Extract(month from timestamp)=3;";
	$result2=mysqli_query($conn, $sql2);
	while($row2=mysqli_fetch_assoc($result2)){
		$index=array_search($row2['child_id'],$childid1);
		if($row2['timestamp']!=$time1[$index] && (date('d-m-Y', strtotime(str_replace('-','/',$time1[$index])))==date('d-m-Y', strtotime(str_replace('-','/',$row2['timestamp']))))){
			$sql3="DELETE FROM `$x[$i]` WHERE timestamp='$row2[timestamp]' and child_id='$row2[child_id]';";
			$result3=mysqli_query($conn, $sql3);
			//while($row3=mysqli_fetch_assoc($result3))
				//echo $row3['child_id']."<br>";
		}
	}
	echo "<br>new table<br>".$x[$i]."<br>";
	}
	
?>