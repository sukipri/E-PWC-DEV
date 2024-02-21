<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
	?>
<form method="post">
    <b>#KOMPARASI DATA GAJI</b>
<div class="input-group input-group-sm mb-3" style="max-width:20rem;">
  <select name="txt_kom_cari01" class="form-control form-control-sm">
            <option value=""></option>
                  	<?php
								$vgj_02 = $ms_q("$sl GajiBulan,KaryNomor FROM TGaji  WHERE KaryNomor='04181143'  order by GajiBulan desc");
									while($vgjj_02 = $ms_fas($vgj_02)){
										echo"<option value=$vgjj_02[GajiBulan]>$vgjj_02[GajiBulan]</option>";
									}
					
						?>
    </select>
  <div class="input-group-append">
  <button class="btn btn-success btn-sm" name="btn_kom_cari01">CARI DATA</button>
  </div>
</div>
<br>
<!-- DATA VIEW -->
<?PHP $gaji_no_01 = 1; if(isset($_POST['btn_kom_cari01'])){ $txt_kom_cari01 = @$_POST['txt_kom_cari01']; ?>
    <div style="overflow:auto;width:auto;height:40rem;padding:2px;border:1px solid #eee">
    <table class="table table-sm table-bordered table-striped">
    <tr class="table-info">
        <td width="5%">#</td>
        <td>NIP</td>
        <td>#</td>
        <td>Penghasilan Kotor</td>
        <td>Penghasilan Bersih</td>
        <td>#</td>
        <td>#</td>
        <td>#</td>
        <td>#</td>
        <td>#</td>
    </tr>
    <?PHP 
        
                #DATA KARYWAN
                $fin_vkry01_sw = $ms_q("$sl KaryNomor,KaryNomorYakkum,KaryNama FROM TKaryawan WHERE   NOT KaryStatus='91' AND NOT KaryStatus='99'  AND NOT KaryStatus='92'  AND NOT KaryStatus='94'  AND NOT KaryStatus='93' order by KaryNoUrut,KaryNoSub,KaryNama asc");
                while($fin_vkry01_sww = $ms_fas($fin_vkry01_sw)){
                $fin_vgj01_sw = $ms_q("$call_sel TGaji WHERE GajiBulan='$txt_kom_cari01' AND KaryNomor='$fin_vkry01_sww[KaryNomor]'");
                    $fin_vgj01_sww = $ms_fas($fin_vgj01_sw);
    ?>
    <tr>
        <td><?PHP echo $gaji_no_01; ?></td>
        <td><?PHP echo $fin_vgj01_sww['KaryNomor']; ?></td>
        <td><?PHP echo  $fin_vkry01_sww['KaryNama']; ?></td>
        <td><?PHP echo @$nf($fin_vgj01_sww['GajiKotor']); ?></td>
        <td><?PHP echo @$nf($fin_vgj01_sww['GajiBersih']); ?></td>
        <td>#</td>
        <td>#</td>
        <td>#</td>
        <td>#</td>
        <td>#</td>
    </tr>
    <?PHP $gaji_no_01++; } ?>
    </table>
    </div>
                    <br>
                    <a href="<?PHP echo"FIN_M_FIN_GAJI_KOM_DWN_REDI.php?IDGJ01=$txt_kom_cari01"; ?>" target="_blank" class="btn btn-primary btn-sm">Download DATA *XLS</a>
    <?PHP } ?>
</form>


<?PHP } ?>