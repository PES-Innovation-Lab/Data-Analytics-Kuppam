<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "heathcaredb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn>
connect_error) {
die("Connection failed: " . $conn>
connect_error);
}
echo "Connection established<br>";
// Create connection
$x=['child','ent','eye','eye1','health1','health2','images','loc','loc_school','school','skin','socio_demographic'];
$y=[12,39,39,17,50,43,3,3,3,24,27,27];
for($i=0;$i<count($x);$i++){
$s='child_id';
if($i==8 || $i==9)
$s='school_id';
if($i==1){
$sql4="SET GLOBAL FOREIGN_KEY_CHECKS=0;";
$result4=mysqli_query($conn,$sql4);
}
for($j=3;$j<=4;$j++){
//array of required items
$sql1="SELECT * FROM `$x[$i]` WHERE Extract(month from
timestamp)=$j GROUP BY $s";
$result1=mysqli_query($conn,$sql1);
$count=0;
while($row1=mysqli_fetch_row($result1)){
$id1[$count]=$row1[0];
$time1[$count]=$row1[$y[$i]];
$count++;
}
echo "Array of required elements created<br>";
//array of required elements
//compare with entire dataset
$sql2="SELECT * FROM `$x[$i]` WHERE Extract(month from
timestamp)=$j";
$result2=mysqli_query($conn,$sql2);
echo "These are the rows that are going to get deleted<br>";

while($row2=mysqli_fetch_row($result2)){
$index=array_search($row2[0],$id1);
if($row2[$y[$i]]!=$time1[$index]){
//delete duplicate entries
$sql3="SELECT * FROM `child` WHERE
timestamp='$row2[$y[$i]]' and $s='$row2[0]'";
$result3=mysqli_query($conn,$sql3);
}
}
//compare with entire dataset
}
if($i==1){
$sql5="SET GLOBAL FOREIGN_KEY_CHECKS=1;";
$result5=mysqli_query($conn,$sql5);
}
}
?>