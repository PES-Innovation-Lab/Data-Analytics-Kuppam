<!DOCTYPE html>
<meta charset="utf-8">
<style>

body {
  font: 10px sans-serif;
}

.group-tick line {
  stroke: #000;
}

.ribbons {
  fill-opacity: 0.67;
}

.input-color {
    position: relative;
}
.input-color input {
    padding-left: 20px;
}
.input-color .color-box {
    width: 15px;
    height: 15px;
    "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
    background-color: #ccc;
    
}
.label
{
	position: relative;
	left: 700px;
	top: -450px;
}
</style>
<?php
	include "mandal2.php";
?>
<svg width="600" height="600"></svg>
<script src="https://d3js.org/d3.v4.min.js"></script>
<script>

var matrix = [
  [<?php echo $e1?>, <?php echo $ne1?>, <?php echo $e2?>, <?php echo $ne2?>, <?php echo $e3?>, <?php echo $ne3?>, <?php echo $e4?>, <?php echo $ne4?>, <?php echo $e5?>, <?php echo $ne5?>, <?php echo $e6?>, <?php echo $ne6?>, <?php echo $e7?>, <?php echo $ne7?>, <?php echo $e8?>, <?php echo $ne8?>],
  [<?php echo $te1?>, <?php echo $tne1?>, <?php echo $te2?>, <?php echo $tne2?>, <?php echo $te3?>, <?php echo $tne3?>, <?php echo $te4?>, <?php echo $tne4?>, <?php echo $te5?>, <?php echo $tne5?>, <?php echo $te6?>, <?php echo $tne6?>, <?php echo $te7?>, <?php echo $tne7?>, <?php echo $te8?>, <?php echo $tne8?>],
  [<?php echo $se1?>, <?php echo $sne1?>, <?php echo $se2?>, <?php echo $sne2?>, <?php echo $se3?>, <?php echo $sne3?>, <?php echo $se4?>, <?php echo $sne4?>, <?php echo $se5?>, <?php echo $sne5?>, <?php echo $se6?>, <?php echo $sne6?>, <?php echo $se7?>, <?php echo $sne7?>, <?php echo $se8?>, <?php echo $sne8?>], 
  [<?php echo $c1?>, 0, <?php echo $k2?>, <?php echo $k3?>, <?php echo $k4?>, <?php echo $k5?>, <?php echo $k6?>, <?php echo $k7?>, <?php echo $k8?>, <?php echo $k9?>, <?php echo $k10?>, <?php echo $k11?>, <?php echo $k12?>, <?php echo $k13?>, <?php echo $k14?>, <?php echo $k15?>],
  [0, 0, <?php echo $c3?>, <?php echo $m1?>, <?php echo $m2?>, <?php echo $m3?>, <?php echo $m4?>, <?php echo $m5?>, <?php echo $m6?>, <?php echo $m7?>, <?php echo $m8?>, <?php echo $m9?>, <?php echo $m10?>, <?php echo $m11?>, <?php echo $m12?>, <?php echo $m13?>],
  [0, 0, 0, 0, <?php echo $c5?>, <?php echo $z1?>, <?php echo $z2?>, <?php echo $z3?>, <?php echo $z4?>, <?php echo $z5?>, <?php echo $z6?>, <?php echo $z7?>, <?php echo $z8?>, <?php echo $z9?>, <?php echo $z10?>, <?php echo $z11?>],
  [0, 0, 0, 0, 0, 0, <?php echo $c7?>, <?php echo $p1?>, <?php echo $p2?>, <?php echo $p3?>, <?php echo $p4?>, <?php echo $p5?>, <?php echo $p6?>, <?php echo $p7?>, <?php echo $p8?>, <?php echo $p9?>],
  [0, 0, 0, 0, 0, 0, 0, 0, <?php echo $c9?>, <?php echo $r1?>, <?php echo $r2?>, <?php echo $r3?>, <?php echo $r4?>, <?php echo $r5?>, <?php echo $r6?>, <?php echo $r7?>],
  [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, <?php echo $c11?>, <?php echo $t1?>, <?php echo $t2?>, <?php echo $t3?>, <?php echo $t4?>, <?php echo $t5?>],
  [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, <?php echo $c13?>, <?php echo $v1?>, <?php echo $v2?>, <?php echo $v3?>],
  [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, <?php echo $c15?>, <?php echo $x1?>]
];

var svg = d3.select("svg"),
    width = +svg.attr("width"),
    height = +svg.attr("height"),
    outerRadius = Math.min(width, height) * 0.5 - 40,
    innerRadius = outerRadius - 30;

var formatValue = d3.formatPrefix(",.0", 1e3);

var chord = d3.chord()
    .padAngle(0.05)
    .sortSubgroups(d3.descending);

var arc = d3.arc()
    .innerRadius(innerRadius)
    .outerRadius(outerRadius);

var ribbon = d3.ribbon()
    .radius(innerRadius);

var color = d3.scaleOrdinal()
    .domain(d3.range(11))
    .range(["#000080", "#ff6600", "#e60000", "#40ff00", "#004d00", "#00ace6", "#9900cc", "#ffff00", "#330000", "#999966", "#000000"]);

var g = svg.append("g")
    .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")")
    .datum(chord(matrix));

var group = g.append("g")
    .attr("class", "groups")
  .selectAll("g")
  .data(function(chords) { return chords.groups; })
  .enter().append("g");

group.append("path")
    .style("fill", function(d) { return color(d.index); })
    .style("stroke", function(d) { return d3.rgb(color(d.index)).darker(); })
    .attr("d", arc);

var groupTick = group.selectAll(".group-tick")
  .data(function(d) { return groupTicks(d, 1e3); })
  .enter().append("g")
    .attr("class", "group-tick")
    .attr("transform", function(d) { return "rotate(" + (d.angle * 180 / Math.PI - 90) + ") translate(" + outerRadius + ",0)"; });

groupTick.append("line")
    .attr("x2", 6);

groupTick
  .filter(function(d) { return d.value % 5e3 === 0; })
  .append("text")
    .attr("x", 8)
    .attr("dy", ".35em")
    .attr("transform", function(d) { return d.angle > Math.PI ? "rotate(180) translate(-16)" : null; })
    .style("text-anchor", function(d) { return d.angle > Math.PI ? "end" : null; })
    .text(function(d) { return formatValue(d.value); });

g.append("g")
    .attr("class", "ribbons")
  .selectAll("path")
  .data(function(chords) { return chords; })
  .enter().append("path")
    .attr("d", ribbon)
    .style("fill", function(d) { return color(d.target.index); })
    .style("stroke", function(d) { return d3.rgb(color(d.target.index)).darker(); });

// Returns an array of tick angles and values for a given group and step.
function groupTicks(d, step) {
  var k = (d.endAngle - d.startAngle) / d.value;
  return d3.range(0, d.value, step).map(function(value) {
    return {value: value, angle: value * k + d.startAngle};
  });
}

</script>
<div class="label">
<div class="input-color">
    <div class="color-box" style="background-color: #000080;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Eye</div><br>
	<div class="color-box" style="background-color: #ff6600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ENT</div><br>
	<div class="color-box" style="background-color: #e60000;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Skin</div><br>
	<div class="color-box" style="background-color: #40ff00;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Education</div><br>
	<div class="color-box" style="background-color: #004d00;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Income</div><br>
	<div class="color-box" style="background-color: #00ace6;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Socio&nbsp;Economy</div><br>
	<div class="color-box" style="background-color: #9900cc;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lighting</div><br>
	<div class="color-box" style="background-color: #ffff00;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Water</div><br>
	<div class="color-box" style="background-color: #330000;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hygenic&nbsp;Surroundings</div><br>
	<div class="color-box" style="background-color: #999966;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sanitary&nbsp;Latrines</div><br>
	<div class="color-box" style="background-color: #000000;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Garbage&nbsp;Disposal</div><br>
</div>
</div>