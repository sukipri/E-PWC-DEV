<?php 
	include"config03.php";
	include"css.php";
?>
<body>
	<?php include"MENU01.php"; ?>
			<?php
				$day_min = $day - 1;
			?>
	<nav>  <div class="nav-wrapper"> 
	 <ul>
      <li><a href="#">Rawat Jalan</a></li>
      </ul>
	</div></nav>
	<div class="container">
		<h5>Table View Rawat Jalan</h5>
		
			<table class="responsive-table">
				<tr bgcolor="#9DDFFF">
				<td>Poli</td>
				<td>Jumlah</td>
				</tr>
				<?php
			$vrj3 = $ms_q("$sl Poli FROM VJalanRekapDaftar WHERE JalanRMTanggal BETWEEN '$years_big-$month-$day_min' AND '$years_big-$month-$day_min 23:59'   GROUP BY Poli  ");
			while($vrjj3 = $ms_fas($vrj3)){
				$vrj4 = $ms_q("$sl Poli FROM VJalanRekapDaftar WHERE JalanRMTanggal BETWEEN '$years_big-$month-05' AND '$years_big-$month-$day_min 23:59' AND Poli='$vrjj3[Poli]'");
				$jum_vrj2 = $ms_nr($vrj4);
					?>
				<tr>
				<td><?php echo"$vrjj3[Poli]"; ?></td>
				<td><?php echo"$jum_vrj2"; ?></td>
				</tr>
				<?php } ?>
	  </table>
</div>
	<br>

	<script type="text/javascript">
	window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light1", // "light2", "dark1", "dark2"
	animationEnabled: true, // change to true		
	title:{
		text: "Grafik Rawat Jalan"
	},
	data: [
	{
		// Change type to "bar", "area", "spline", "pie",etc.
		type: "bar",
		dataPoints: [
		<?php
		$vrj = $ms_q("$sl Poli FROM VJalanRekapDaftar WHERE JalanRMTanggal BETWEEN '$years_big-$month-$day_min' AND '$years_big-$month-$day_min 23:59'   GROUP BY Poli  ");
			while($vrjj = $ms_fas($vrj)){
				$vrj2 = $ms_q("$sl Poli FROM VJalanRekapDaftar WHERE JalanRMTanggal BETWEEN '$years_big-$month-05' AND '$years_big-$month-$day_min 23:59' AND Poli='$vrjj[Poli]'");
				$jum_vrj = $ms_nr($vrj2);
					
				echo"{y:$jum_vrj,label: '$vrjj[Poli]'},"; 
				}
				?>
				
		]
	}
	]
});
		chart.render();
}
</script>

</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="sd/bar.js"> </script>
</body>
<?php include"js_foot.php"; ?>
