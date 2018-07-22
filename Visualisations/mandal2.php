<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="healthcaredb";
	

	$conn = mysqli_connect($servername, $username, $password, $db);

	$sql1="SELECT * FROM `socio_demographic` WHERE child_id<30000000000 and child_id>=20000000000;";
	$result1=mysqli_query($conn, $sql1);
	$c1=$c2=$c3=$c4=$c5=$c6=$c7=$c8=$c9=$c10=$c11=$c12=$c13=$c14=$c15=$c16=0;
	
	$edub=array();
	$edua=array();
	$incb=array();
	$inca=array();
	$scb=array();
	$sca=array();
	$lb=array();
	$la=array();
	$wb=array();
	$wa=array();
	$hsb=array();
	$hsa=array();
	$slb=array();
	$sla=array();
	$gdb=array();
	$gda=array();
	while($row1=mysqli_fetch_row($result1)){
		$f1=$f2=$f3=$f4=$f5=$f6=$f7=$f8=$f9=$f10=$f11=$f12=$f13=$f14=$f15=$f16=0;
		$k1=$k2=$k3=$k4=$k5=$k6=$k7=$k8=$k9=$k10=$k11=$k12=$k13=$k14=$k15=0;
		$l1=$l2=$l3=$l4=$l5=$l6=$l7=$l8=$l9=$l10=$l11=$l12=$l13=$l14=0;
		$m1=$m2=$m3=$m4=$m5=$m6=$m7=$m8=$m9=$m10=$m11=$m12=$m13=0;
		$n1=$n2=$n3=$n4=$n5=$n6=$n7=$n8=$n9=$n10=$n11=$n12=0;
		$o1=$o2=$o3=$o4=$o5=$o6=$o7=$o8=$o9=$o10=$o11=0;
		$z1=$z2=$z3=$z4=$z5=$z6=$z7=$z8=$z9=$z10=$z11=0;
		$p1=$p2=$p3=$p4=$p5=$p6=$p7=$p8=$p9=$p10=0;
		$q1=$q2=$q3=$q4=$q5=$q6=$q7=$q8=0;
		$r1=$r2=$r3=$r4=$r5=$r6=$r7=0;
		$s1=$s2=$s3=$s4=$s5=$s6=0;
		$t1=$t2=$t3=$t4=$t5=0;
		$u1=$u2=$u3=$u4=0;
		$v1=$v2=$v3=0;
		$w1=$w2=0;
		$x1=0;
		if($row1[8]<8){
			$edub[$c1]=$row1[0];
			$c1++;
			$f1=1;
		}
		else{
			$edua[$c2]=$row1[0];
			$c2++;
			$f2=1;
		}
		if($row1[14]<5500){
			$incb[$c3]=$row1[0];
			$c3++;
			$f3=1;
		}
		else{
			$inca[$c4]=$row1[0];
			$c4++;
			$f4=1;
		}
		if($row1[15]<2){
			$scb[$c5]=$row1[0];
			$c5++;
			$f5=1;
		}
		else{
			$sca[$c6]=$row1[0];
			$c6++;
			$f6=1;
		}
		if($row1[20]==0){
			$lb[$c7]=$row1[0];
			$c7++;
			$f7=1;
		}
		else{
			$la[$c8]=$row1[0];
			$c8++;
			$f8=1;
		}
		if($row1[22]==0){
			$wb[$c9]=$row1[0];
			$c9++;
			$f9=1;
		}
		else{
			$wa[$c10]=$row1[0];
			$c10++;
			$f10=1;
		}
		if($row1[23]==0){
			$hsb[$c11]=$row1[0];
			$c11++;
			$f11=1;
		}
		else{
			$hsa[$c12]=$row1[0];
			$c12++;
			$f12=1;
		}
		if($row1[23]==0){
			$slb[$c13]=$row1[0];
			$c13++;
			$f13=1;
		}
		else{
			$sla[$c14]=$row1[0];
			$c14++;
			$f14=1;
		}
		if($row1[24]==0){
			$gdb[$c15]=$row1[0];
			$c15++;
			$f15=1;
		}
		else{
			$gda[$c16]=$row1[0];
			$c16++;
			$f16=1;
		}
		if($f1==1 && $f2==1)
			$k1++;
		if($f1==1 && $f3==1)
			$k2++;
		if($f1==1 && $f4==1)
			$k3++;
		if($f1==1 && $f5==1)
			$k4++;
		if($f1==1 && $f6==1)
			$k5++;
		if($f1==1 && $f7==1)
			$k6++;
		if($f1==1 && $f8==1)
			$k7++;
		if($f1==1 && $f9==1)
			$k8++;
		if($f1==1 && $f10==1)
			$k9++;
		if($f1==1 && $f11==1)
			$k10++;
		if($f1==1 && $f12==1)
			$k11++;
		if($f1==1 && $f13==1)
			$k12++;
		if($f1==1 && $f14==1)
			$k13++;
		if($f1==1 && $f15==1)
			$k14++;
		if($f1==1 && $f16==1)
			$k15++;
		//f2
		if($f2==1 && $f3==1)
			$l14++;
		if($f2==1 && $f4==1)
			$l1++;
		if($f2==1 && $f5==1)
			$l2++;
		if($f2==1 && $f6==1)
			$l3++;
		if($f2==1 && $f7==1)
			$l4++;
		if($f2==1 && $f8==1)
			$l5++;
		if($f2==1 && $f9==1)
			$l6++;
		if($f2==1 && $f10==1)
			$l7++;
		if($f2==1 && $f11==1)
			$l8++;
		if($f2==1 && $f12==1)
			$l9++;
		if($f2==1 && $f13==1)
			$l10++;
		if($f2==1 && $f14==1)
			$l11++;
		if($f2==1 && $f15==1)
			$l12++;
		if($f2==1 && $f16==1)
			$l13++;
		//f3
		if($f3==1 && $f4==1)
			$m1++;
		if($f3==1 && $f5==1)
			$m2++;
		if($f3==1 && $f6==1)
			$m3++;
		if($f3==1 && $f7==1)
			$m4++;
		if($f3==1 && $f8==1)
			$m5++;
		if($f3==1 && $f9==1)
			$m6++;
		if($f3==1 && $f10==1)
			$m7++;
		if($f3==1 && $f11==1)
			$m8++;
		if($f3==1 && $f12==1)
			$m9++;
		if($f3==1 && $f13==1)
			$m10++;
		if($f3==1 && $f14==1)
			$m11++;
		if($f3==1 && $f15==1)
			$m12++;
		if($f3==1 && $f16==1)
			$m13++;
		//f4
		if($f4==1 && $f5==1)
			$n1++;
		if($f4==1 && $f6==1)
			$n2++;
		if($f4==1 && $f7==1)
			$n3++;
		if($f4==1 && $f8==1)
			$n4++;
		if($f4==1 && $f9==1)
			$n5++;
		if($f4==1 && $f10==1)
			$n6++;
		if($f4==1 && $f11==1)
			$n7++;
		if($f4==1 && $f12==1)
			$n8++;
		if($f4==1 && $f13==1)
			$n9++;
		if($f4==1 && $f14==1)
			$n10++;
		if($f4==1 && $f15==1)
			$n11++;
		if($f4==1 && $f16==1)
			$n12++;
		//f5
		if($f5==1 && $f6==1)
			$z1++;
		if($f5==1 && $f7==1)
			$z2++;
		if($f5==1 && $f8==1)
			$z3++;
		if($f5==1 && $f9==1)
			$z4++;
		if($f5==1 && $f10==1)
			$z5++;
		if($f5==1 && $f11==1)
			$z6++;
		if($f5==1 && $f12==1)
			$z7++;
		if($f5==1 && $f13==1)
			$z8++;
		if($f5==1 && $f14==1)
			$z9++;
		if($f5==1 && $f15==1)
			$z10++;
		if($f5==1 && $f16==1)
			$z11++;
		//f6
		if($f6==1 && $f7==1)
			$o2++;
		if($f6==1 && $f8==1)
			$o3++;
		if($f6==1 && $f9==1)
			$o4++;
		if($f6==1 && $f10==1)
			$o5++;
		if($f6==1 && $f11==1)
			$o6++;
		if($f6==1 && $f12==1)
			$o7++;
		if($f6==1 && $f13==1)
			$o8++;
		if($f6==1 && $f14==1)
			$o9++;
		if($f6==1 && $f15==1)
			$o10++;
		if($f6==1 && $f16==1)
			$o11++;
		//f7
		if($f7==1 && $f8==1)
			$p1++;
		if($f7==1 && $f9==1)
			$p2++;
		if($f7==1 && $f10==1)
			$p3++;
		if($f7==1 && $f11==1)
			$p4++;
		if($f7==1 && $f12==1)
			$p5++;
		if($f7=1 && $f13==1)
			$p6++;
		if($f7==1 && $f14==1)
			$p7++;
		if($f7==1 && $f15==1)
			$p8++;
		if($f7==1 && $f16==1)
			$p9++;
		//f8
		if($f8==1 && $f9==1)
			$q1++;
		if($f8==1 && $f10==1)
			$q2++;
		if($f8==1 && $f11==1)
			$q3++;
		if($f8==1 && $f12==1)
			$q4++;
		if($f8=1 && $f13==1)
			$q5++;
		if($f8==1 && $f14==1)
			$q6++;
		if($f8==1 && $f15==1)
			$q7++;
		if($f8==1 && $f16==1)
			$q8++;
		//f9
		if($f9==1 && $f10==1)
			$r1++;
		if($f9==1 && $f11==1)
			$r2++;
		if($f9==1 && $f12==1)
			$r3++;
		if($f9=1 && $f13==1)
			$r4++;
		if($f9==1 && $f14==1)
			$r5++;
		if($f9==1 && $f15==1)
			$r6++;
		if($f9==1 && $f16==1)
			$r7++;
		//f10
		if($f10==1 && $f11==1)
			$s1++;
		if($f10==1 && $f12==1)
			$s2++;
		if($f10=1 && $f13==1)
			$s3++;
		if($f10==1 && $f14==1)
			$s4++;
		if($f10==1 && $f15==1)
			$s5++;
		if($f10==1 && $f16==1)
			$s6++;
		//f11
		if($f11==1 && $f12==1)
			$t1++;
		if($f11=1 && $f13==1)
			$t2++;
		if($f11==1 && $f14==1)
			$t3++;
		if($f11==1 && $f15==1)
			$t4++;
		if($f11==1 && $f16==1)
			$t5++;
		//f12
		if($f12=1 && $f13==1)
			$u1++;
		if($f12==1 && $f14==1)
			$u2++;
		if($f12==1 && $f15==1)
			$u3++;
		if($f12==1 && $f16==1)
			$u4++;
		//f13
		if($f13==1 && $f14==1)
			$v1++;
		if($f13==1 && $f15==1)
			$v2++;
		if($f13==1 && $f16==1)
			$v3++;
		//f14
		if($f14==1 && $f15==1)
			$w1++;
		if($f14==1 && $f16==1)
			$w2++;
		//f15
		if($f15==1 && $f16==1)
			$x1++;
	}
	
	$sql2="SELECT * FROM `eye` WHERE child_id<30000000000 and child_id>=20000000000;";
	$result2=mysqli_query($conn, $sql2);
	$e1=$e2=$e3=$e4=$e5=$e6=$e7=$e8=$e9=$e10=$e11=$e12=$e13=$e14=$e15=$e16=0;
	$ne1=$ne2=$ne3=$ne4=$ne5=$ne6=$ne7=$ne8=$ne9=$ne10=$ne11=$ne12=$ne13=$ne14=$ne15=$ne16=0;
	
	while($row2=mysqli_fetch_row($result2)){
		if($row2[1]==1 || $row2[3]==1 || $row2[31]==1 || $row2[33]==1){
			if(in_array($row2[0],$edub))
				$e1++;
			else if(in_array($row2[0],$edua))
				$ne1++;
			if(in_array($row2[0],$incb))
				$e2++;
			else if(in_array($row2[0],$inca))
				$ne2++;
			if(in_array($row2[0],$scb))
				$e3++;
			else if(in_array($row2[0],$sca))
				$ne3++;
			if(in_array($row2[0],$lb))
				$e4++;
			else if(in_array($row2[0],$la))
				$ne4++;
			if(in_array($row2[0],$wb))
				$e5++;
			else if(in_array($row2[0],$wa))
				$ne5++;
			//hs,sl,gd
			if(in_array($row2[0],$hsb))
				$e6++;
			else if(in_array($row2[0],$hsa))
				$ne6++;
			if(in_array($row2[0],$slb))
				$e7++;
			else if(in_array($row2[0],$sla))
				$ne7++;
			if(in_array($row2[0],$gdb))
				$e8++;
			else if(in_array($row2[0],$gda))
				$ne8++;
		}
	}
	
	$sql3="SELECT * FROM `ent` WHERE child_id<30000000000 and child_id>=20000000000;";
	$result3=mysqli_query($conn, $sql3);
	$te1=$te2=$te3=$te4=$te5=$te6=$te7=$te8=0;
	$tne1=$tne2=$tne3=$tne4=$tne5=$tne6=$tne7=$tne8=0;
	
	while($row3=mysqli_fetch_row($result3)){
		if($row3[15]==1 || $row3[13]==1 || $row3[31]==1 || $row3[23]==1 || $row3[27]==1){
			if(in_array($row3[0],$edub))
				$te1++;
			else if(in_array($row3[0],$edua))
				$tne1++;
			if(in_array($row3[0],$incb))
				$te2++;
			else if(in_array($row3[0],$inca))
				$tne2++;
			if(in_array($row3[0],$scb))
				$te3++;
			else if(in_array($row3[0],$sca))
				$tne3++;
			if(in_array($row3[0],$lb))
				$te4++;
			else if(in_array($row3[0],$la))
				$tne4++;
			if(in_array($row3[0],$wb))
				$te5++;
			else if(in_array($row3[0],$wa))
				$tne5++;
			//hs,sl,gd
			if(in_array($row3[0],$hsb))
				$te6++;
			else if(in_array($row3[0],$hsa))
				$tne6++;
			if(in_array($row3[0],$slb))
				$te7++;
			else if(in_array($row3[0],$sla))
				$tne7++;
			if(in_array($row3[0],$gdb))
				$te8++;
			else if(in_array($row3[0],$gda))
				$tne8++;
		}
	}
	
	$sql4="SELECT * FROM `skin` WHERE child_id<30000000000 and child_id>=20000000000;";
	$result4=mysqli_query($conn, $sql4);
	$se1=$se2=$se3=$se4=$se5=$se6=$se7=$se8=0;
	$sne1=$sne2=$sne3=$sne4=$sne5=$sne6=$sne7=$sne8=0;
	
	while($row4=mysqli_fetch_row($result4)){
		if($row4[21]==1 || $row4[3]==1){
			if(in_array($row4[0],$edub))
				$se1++;
			else if(in_array($row4[0],$edua))
				$sne1++;
			if(in_array($row4[0],$incb))
				$se2++;
			else if(in_array($row4[0],$inca))
				$sne2++;
			if(in_array($row4[0],$scb))
				$se3++;
			else if(in_array($row4[0],$sca))
				$sne3++;
			if(in_array($row4[0],$lb))
				$se4++;
			else if(in_array($row4[0],$la))
				$sne4++;
			if(in_array($row4[0],$wb))
				$se5++;
			else if(in_array($row4[0],$wa))
				$sne5++;
			//hs,sl,gd
			if(in_array($row4[0],$hsb))
				$se6++;
			else if(in_array($row4[0],$hsa))
				$sne6++;
			if(in_array($row4[0],$slb))
				$se7++;
			else if(in_array($row4[0],$sla))
				$sne7++;
			if(in_array($row4[0],$gdb))
				$se8++;
			else if(in_array($row4[0],$gda))
				$sne8++;
		}
	}
	
	
?>

