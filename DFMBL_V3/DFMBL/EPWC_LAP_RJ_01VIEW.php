<b><i class="fas fa-folder-open"></i>RAWAT JALAN</b>
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
<div class="row">
<div class="col-7">
<script type="text/javascript">
	window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light1", // "light2", "dark1", "dark2"
	animationEnabled: true, // change to true		
	title:{
		text: "Grafik  Pelayanan Asuransi Rawat Jalan"
	},
	data: [
	{
		// Change type to "bar", "area", "spline", "pie",etc.
		type: "pie",
		dataPoints: [
		<?php
            $epwc_vrj01_sw = $CL_Q("$SL DISTINCT PrshKode FROM  Citarum.dbo.VLapRawatJalan WHERE JalanRMTanggal BETWEEN '$tg01' AND '$tg02 23:59'    ");
                while($epwc_vrj01_sww = $CL_FAS($epwc_vrj01_sw)){
                    $epwc_vrj01_sw02 = $CL_Q("$SL JalanNoReg,PrshKode,PrshNama,Poli FROM Citarum.dbo.VLapRawatJalan WHERE JalanRMTanggal BETWEEN '$tg01' AND '$tg02 23:59' AND PrshKode='$epwc_vrj01_sww[PrshKode]'   ");
                          $epwc_nr_vrj01_sww02 = $CL_NR($epwc_vrj01_sw02);
                          $epwc_vrj01_sww02 = $CL_FAS($epwc_vrj01_sw02);

                          //echo"{y:$epwc_nr_vrj01_sww02,label: '$epwc_vrj01_sww[$jns01]'},";      
                         
                            echo"{y:$epwc_nr_vrj01_sww02,label: '$epwc_vrj01_sww02[PrshNama]'},";                   
                }
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
</div>

<div class="col-5">

<style>
.my-custom-scrollbar {
position: relative;
height: 70%;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
</style>

<!--  -->
<div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-sm table-bordered table-striped">
    <tr class="table-dark" align="center">
        <td width="30%">Penanggung</td>
        <td width="20%">Total</td>
    </tr>
    <?php
            $epwc02_vrj01_sw = $CL_Q("$SL DISTINCT PrshKode FROM  Citarum.dbo.VLapRawatJalan WHERE JalanRMTanggal BETWEEN'$tg01' AND '$tg02 23:59'   ");
                while($epwc02_vrj01_sww = $CL_FAS($epwc02_vrj01_sw)){
                    $epwc02_vrj01_sw02 = $CL_Q("$SL JalanNoReg,PrshKode,PrshNama,Poli FROM  Citarum.dbo.VLapRawatJalan WHERE JalanRMTanggal BETWEEN '$tg01' AND '$tg02 23:59' AND PrshKode='$epwc02_vrj01_sww[PrshKode]'  ");
                          $epwc02_nr_vrj01_sww02 = $CL_NR($epwc02_vrj01_sw02);
                          $epwc02_vrj01_sww02 = $CL_FAS($epwc02_vrj01_sw02);
                    ?>
    <tr>
        <td>
            <?PHP echo  $epwc02_vrj01_sww02['PrshNama'];  ?>
    </td>
        <td align="right"><?PHP echo  $NF($epwc02_nr_vrj01_sww02); ?></td>
    </tr>
        <?PHP } ?>

    </table>
                </div>


</div>

</div>
    <?PHP include"EPWC_LAP_RJ_02VIEW.php"; ?>
    <?PHP } ?>