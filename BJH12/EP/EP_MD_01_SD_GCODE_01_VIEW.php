<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			error_reporting(0);
			?>
<body>
		<b>#Preview DATA GEO</b>
        <table width="100%" border="0" class="table table-striped table-sm table-bordered">
                  <tr>
                    <td>#</td>
                    <td>Ket</td>
                    <td>LAT</td>
                    <td>LONG</td>
                  </tr>
                  <?PHP 
				  		$ep_geo_no = 1;
				  		$ep_vgeo01_sw = $ms_q("$call_sel tb_ep_geo_01 order by geo_nama_01 asc");
							while($ep_vgeo01_sww = $ms_fas($ep_vgeo01_sw)){
				  ?>
                  <tr>
                    <td><?PHP echo"$ep_geo_no"; ?></td>
                    <td><a href="#"><?PHP echo"$ep_vgeo01_sww[geo_nama_01]"; ?></a></td>
                    <td><?PHP echo"$ep_vgeo01_sww[geo_lat_01]"; ?></td>
                    <td><?PHP echo"$ep_vgeo01_sww[geo_long_01]"; ?></td>
                  </tr>
                  <tr>
                    <td colspan="4">
                    <!-- -->
                    <iframe src="https://www.google.com/maps/embed/v1/view?key=AIzaSyDaRofJNTYxCNlyQgeA4ozIjV2_Ekt-hGc&center=<?php echo"$ep_vgeo01_sww[geo_lat_01],$ep_vgeo01_sww[geo_long_01]"; ?>&zoom=18&maptype=satellite" width="100%" height="500"></iframe>
                    <!-- -->
                    </td>
                  </tr>
                  <?PHP $ep_geo_no++; } ?>
		</table>

</body>
<?PHP } ?>