<h5>REPORTING CP *DATE</h5>
<br>
<form method="post">
<div class="input-group mb-3" style="max-width:35rem;">
  <input type="date" class="form-control form-control-sm" required name="tg01" value="<?PHP echo $DATE_HTML5_SQL ?>" required>
  <input type="date" class="form-control form-control-sm" required name="tg02" value="<?PHP echo $DATE_HTML5_SQL ?>" required>
  <select name="list01" class="form-control form-control-sm" required>
    <?PHP 
        $cpf_vkeg03_sw = $CL_Q("$SL idmain_keg_03,keg_nama_03 FROM Citarum.dbo.tb_cpf01_keg_03 ");
        echo"<option value=>Kasus</option>";
            while($cpf_vkeg03_sww = $CL_FAS($cpf_vkeg03_sw)){
                echo"<option value=$cpf_vkeg03_sww[idmain_keg_03]>$cpf_vkeg03_sww[keg_nama_03]</option>";
            }
    ?>
    </select>
  <button class="btn btn-success btn-sm" name="btn_tgl_01">CARI DATA</button>
</div>
</form>
<!--  -->
<?PHP 
    if(isset($_POST['btn_tgl_01'])){
    $tg01 = @$_POST['tg01'];
    $tg02 = @$_POST['tg02'];
    $list01 = @$_POST['list01'];
    $cpf_vkeg03_sw02 = $CL_Q("$SL idmain_keg_03,keg_nama_03 FROM Citarum.dbo.tb_cpf01_keg_03");
        $cpf_vkeg03_sww02 = $CL_FAS($cpf_vkeg03_sw02);

?>
<?PHP echo"<h5>INTERVAL ".FS_DATE($tg01)." - ". FS_DATE($tg02)." | <b>#CASE $cpf_vkeg03_sww02[keg_nama_03] </b></h5>"; ?>
<hr>
<table class="table table-sm table-striped table-bordered">
<tr class="table-dark">
    <td>CP FORM</td>
    <?PHP
        $cpf_vkeg01_sw = $CL_Q("$SL idmain_keg_01,keg_nama_01 FROM Citarum.dbo.tb_cpf01_keg_01 order by keg_urut_01");
        $cpf_nr_vkeg01_sww = $CL_NR($cpf_vkeg01_sw);
            while($cpf_vkeg01_sww = $CL_FAS($cpf_vkeg01_sw)){
                echo"<td>$cpf_vkeg01_sww[keg_nama_01]</td>";
            }
    ?>
</tr>
<?PHP 
    $cpf_vfhead01_sw = $CL_Q("$SL DISTINCT  idmain_inap_01 FROM  tb_cpf01_form_01_head WHERE head_tglinput_01 BETWEEN '$tg01' AND '$tg02 23:59:00' AND idmain_keg_03='$list01'");
        while($cpf_vfhead01_sww = $CL_FAS($cpf_vfhead01_sw)){ #INAP DISTINCT MAIN DATA  
            $cpf_vfhead01_sw02 = $CL_Q("$SL idmain_cpf01_form_01_head,idmain_inap_01,head_kode_01,head_tot_01,head_tot02_02,head_tglinput_01,head_status_01,idmain_keg_03,idmain_keg_01 FROM  tb_cpf01_form_01_head WHERE idmain_inap_01='$cpf_vfhead01_sww[idmain_inap_01]' AND head_tglinput_01 BETWEEN '$tg01' AND '$tg02 23:59:00' AND idmain_keg_03='$list01'");
                $cpf_vfhead01_sww02 = $CL_FAS($cpf_vfhead01_sw02); #DATA FORM HEAD
            $cpf_td_vkeg01_sw = $CL_Q("$SL idmain_keg_01,keg_nama_01 FROM Citarum.dbo.tb_cpf01_keg_01 WHERE idmain_keg_01='$cpf_vfhead01_sww02[idmain_keg_01]' ");
            $cpf_td_vkeg01_sww = $CL_FAS($cpf_td_vkeg01_sw);
            
?>
<tr>
    <td><?PHP echo $cpf_vfhead01_sww['idmain_inap_01']; ?></td>
    <?PHP 
        $cpf_keg01_no = 1;
            while($cpf_keg01_no <= $cpf_nr_vkeg01_sww){
                echo"<td>-</td>";
                $cpf_keg01_no++;  }
    ?>
</tr>
    <?PHP } ?>
</table>
<?PHP } ?>