<?php
		@ob_start();
			//..INCLUDER//
			include"../DIST/DIST_GET.php";
		
?>
<div style="padding-top:3%"></div>
<div class="container">
    <!--  -->
<h4>#STATISTIK VIEW RAWAT JALAN</h4>

    <form method="post">
        <div class="input-group mb-3" style="max-width:36rem;">
        <input type="date" class="form-control" name="tg01" required value="<?PHP echo $DATE_HTML5_SQL ?>">
        <input type="date" class="form-control" name="tg02" required value="<?PHP echo $DATE_HTML5_SQL ?>">
       <select name="jns01" class="form-control" required>
        <option value="">Acuan</option>
        <option value="PrshKode">PENANGGUNG</option>
        <option value="Poli">Poli</option>
        </select>
        <button class="btn btn-success btn-sm" name="btn_cari_01">CARI DATA</button>
        </div>
    </form>
    <hr>
    <?PHP 
        if(isset($_POST['btn_cari_01'])){
            $tg01 = @$SQL_SL($_POST['tg01']);
            $tg02 = @$SQL_SL($_POST['tg02']);
            $jns01 = @$SQL_SL($_POST['jns01']);
        
    ?>
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
            $epwc_vrj01_sw = $CL_Q("$SL DISTINCT $jns01 FROM  Citarum.dbo.VLapRawatJalan WHERE JalanRMTanggal BETWEEN '$tg01' AND '$tg02 23:59'    ");
                while($epwc_vrj01_sww = $CL_FAS($epwc_vrj01_sw)){
                    $epwc_vrj01_sw02 = $CL_Q("$SL JalanNoReg,PrshKode,PrshNama,Poli FROM Citarum.dbo.VLapRawatJalan WHERE JalanRMTanggal BETWEEN '$tg01' AND '$tg02 23:59' AND $jns01='$epwc_vrj01_sww[$jns01]'   ");
                          $epwc_nr_vrj01_sww02 = $CL_NR($epwc_vrj01_sw02);
                          $epwc_vrj01_sww02 = $CL_FAS($epwc_vrj01_sw02);

                          //echo"{y:$epwc_nr_vrj01_sww02,label: '$epwc_vrj01_sww[$jns01]'},";      
                          if($jns01=="PrshKode"){
                            echo"{y:$epwc_nr_vrj01_sww02,label: '$epwc_vrj01_sww02[PrshNama]'},";  
                        }elseif($jns01=="Poli"){
                            echo"{y:$epwc_nr_vrj01_sww02,label: '$epwc_vrj01_sww02[Poli]'},";  
                        }  
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
<!--  -->

    <table class="table table-sm table-bordered table-striped">
    <tr class="table-dark" align="center">
        <td width="30%">PARAMETER</td>
        <td width="20%">Total</td>
    </tr>
    <?php
            $epwc02_vrj01_sw = $CL_Q("$SL DISTINCT $jns01 FROM  Citarum.dbo.VLapRawatJalan WHERE JalanRMTanggal BETWEEN '$tg01' AND '$tg02 23:59'   ");
                while($epwc02_vrj01_sww = $CL_FAS($epwc02_vrj01_sw)){
                    $epwc02_vrj01_sw02 = $CL_Q("$SL JalanNoReg,PrshKode,PrshNama,Poli FROM  Citarum.dbo.VLapRawatJalan WHERE JalanRMTanggal BETWEEN '$tg01' AND '$tg02 23:59' AND $jns01='$epwc02_vrj01_sww[$jns01]'  ");
                          $epwc02_nr_vrj01_sww02 = $CL_NR($epwc02_vrj01_sw02);
                          $epwc02_vrj01_sww02 = $CL_FAS($epwc02_vrj01_sw02);
                    ?>
    <tr>
        <td>
            <?PHP 
                if($jns01=="PrshKode"){
                    echo  $epwc02_vrj01_sww02['PrshNama'];
                }elseif($jns01=="Poli"){
                    echo  $epwc02_vrj01_sww02['Poli'];
                }
            ?>
    </td>
        <td align="right"><?PHP echo  $NF($epwc02_nr_vrj01_sww02); ?></td>
    </tr>
        <?PHP } ?>

    </table>

    <?PHP } ?>
    <!--  -->
</div>
<?PHP ob_flush();