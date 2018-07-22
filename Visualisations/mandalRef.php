<?php
require_once('connect.php');
$table=["eye","ent","skin","health1","health2"];
$count=array();
$ref_sum=array();

for($i=1;$i<6;$i++)
{
	$sum=0;
	for($j=0;$j<sizeof($table);$j++)
	{
		if($j!=3)
		{
			$query="SELECT count(distinct `child_id`) FROM `".$table[$j]."` where `referal`=1 AND substr(`child_id`,1,1)=".$i." ";
			$result=mysqli_query($bd,$query);
			$count[$j]=mysqli_fetch_row($result);
			$sum=$sum+$count[$j][0];
		}
		else
		{
			$query="SELECT count(distinct `child_id`) FROM ".$table[$j]." where `oe_referal`=1 AND substr(`child_id`,1,1)=".$i."";
			$result=mysqli_query($bd,$query);
			$count[$j]=mysqli_fetch_row($result);
			$sum=$sum+$count[$j][0];
			
		}	
	}
	$ref_sum[$i-1]=$sum;
}
$ref_sum=json_encode($ref_sum);
print_r($ref_sum);

?>