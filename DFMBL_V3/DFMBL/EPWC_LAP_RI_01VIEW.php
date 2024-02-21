<b><i class="fas fa-folder-open"></i>RAWAT INAP</b>
<br>
<form method="post">
<div class="input-group mb-3" style="max-width:36rem;">
        <input type="date" class="form-control" name="tg01" required value="<?PHP echo $DATE_HTML5_SQL ?>">
        <input type="date" class="form-control" name="tg02" required value="<?PHP echo $DATE_HTML5_SQL ?>">
       <!-- <select name="jns01" class="form-control" required>
        <option value="">Acuan</option>
        <option value="PrshKode">PENANGGUNG</option>
        <option value="Poli">Poli</option>
        </select> -->
        <button class="btn btn-success btn-sm" name="btn_cari_01">CARI DATA</button>
        </div>

</form>
<hr>
<?PHP 
        if(isset($_POST['btn_cari_01'])){
            $tg01 = @$SQL_SL($_POST['tg01']);
            $tg02 = @$SQL_SL($_POST['tg02']);
        
    ?>
     <?PHP echo"<b>INVTERVAL <i>".FS_DATE($tg01)." - ". FS_DATE($tg02)."</i></b>"; ?>
<script type="text/javascript">
	window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light1", // "light2", "dark1", "dark2"
	animationEnabled: true, // change to true		
	title:{
		text: "Grafik  RAWAT INAP"
	},
	data: [
	{
		// Change type to "bar", "area", "spline", "pie",etc.
		type: "column",
        name: "companies",
		axisYType: "secondary",
		color: "#1693BB",
		dataPoints: [
		<?php
                            #RI MASUK
                            $epwc_vri01_sw = $CL_Q("$SL PasienNomorRM FROM TRawatInap WHERE InapTglMasuk BETWEEN '$tg01' AND '$tg02 23:59' AND NOT InapStatus='9' ");
                            $epwc_nr_vri01_sww = $CL_NR($epwc_vri01_sw);
                            #RI KELUAR
                            $epwc_vri01_sw02 = $CL_Q("$SL PasienNomorRM FROM TRawatInap WHERE InapTglKeluar BETWEEN '$tg01' AND '$tg02 23:59' AND  InapStatus='1'  ");
                            $epwc_nr_vri01_sww02 = $CL_NR($epwc_vri01_sw02);
                                #$epwc_vrsp01_sw02 = $CL_Q("$SL  ObatKmrNomor FROM Citarum.dbo.VObatKmrJmlResep WHERE ObatKmrTanggal BETWEEN '$DATE_HTML5_SQL' AND '$DATE_HTML5_SQL 23:59' AND ObatKmrNomor='$epwc_vrsp01_sww[ObatKmrNomor]' ");
                                    #$epwc_nr_vrsp01_sww02 = $CL_NR($epwc_vrsp01_sw02);

                                echo"{y:   $epwc_nr_vri01_sww,label: 'Pasien Masuk'},{y:  $epwc_nr_vri01_sww02,label: 'Pasien Keluar'} ";                        
                          //echo"{y:$epwc_nr_vrj01_sww02,label: '$epwc_vrj01_sww[$jns01]'},";      
                
				?>				
		]
	}
	]
});
		chart.render();
}
</script>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="sd/bar.js"> </script>
<br>
<?PHP include"EPWC_LAP_RI_02VIEW.php"; ?>
<?PHP } ?>