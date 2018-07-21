<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="healthcaredb";
	$x=array(1,3,4,5,6,7,8,9,10,11,12);
	$conn = mysqli_connect($servername, $username, $password, $db);
	for($i = 0; $i < 11; $i++)

	{
		$sql1="SELECT * FROM `socio_demographic` WHERE Extract(month from timestamp)=$x[$i] GROUP BY child_id;";
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
	//echo "array created";
	//$date = date('d-m-Y', $timestamp);
	//date('Y-m-d', strtotime(str_replace('-','/', $date)));
	//echo $time1[0];
	$date12=date('d-m-Y', strtotime(str_replace('-','/',$time1[0])));
	$del=array();
	$count2=0;
	$sql2="SELECT * FROM `socio_demographic` WHERE Extract(month from timestamp)=$x[$i];";
	$result2=mysqli_query($conn, $sql2);
	while($row2=mysqli_fetch_assoc($result2)){
		//echo "loop<br>";
		$index=array_search($row2['child_id'],$childid1);
		//echo "<br>".$index."<br>";
		if(($row2['timestamp']!=$time1[$index])){
			//echo "if<br>";
			$sql3="DELETE FROM `socio_demographic` WHERE timestamp='$row2[timestamp]' and child_id='$row2[child_id]';";
			$result3=mysqli_query($conn, $sql3);
			//while($row3=mysqli_fetch_assoc($result3))
				//echo $row3['child_id']."<br>";
			
			//echo "done";
		}
	}
	}
?>
<h1 style="text-align: center; color:#339966;">Data Cleansing Successful </h1>