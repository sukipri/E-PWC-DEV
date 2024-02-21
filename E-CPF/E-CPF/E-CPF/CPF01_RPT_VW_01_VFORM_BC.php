
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
    $cpf_vkeg03_sw02 = $CL_Q("$SL idmain_keg_03,keg_nama_03 FROM Citarum.dbo.tb_cpf01_keg_03 ");
        $cpf_vkeg03_sww02 = $CL_FAS($cpf_vkeg03_sw02);

?>
<?PHP echo"<h5>INTERVAL ".FS_DATE($tg01)." - ". FS_DATE($tg02)." | <b>#CASE $cpf_vkeg03_sww02[keg_nama_03] </b></h5>"; ?>
<hr>
<table class="table table-sm table-bordered table-striped">
<tr class="table-dark">
    <td width="14%">CP</td>
    <td>POINT +</td>
    <td>POINT -</td>
</tr>
<?PHP 
    $cpf_vfhead01_sw = $CL_Q("$SL DISTINCT  idmain_inap_01 FROM  tb_cpf01_form_01_head WHERE head_tglinput_01 BETWEEN '$tg01' AND '$tg02 23:59:00' AND idmain_keg_03='$list01'");
        while($cpf_vfhead01_sww = $CL_FAS($cpf_vfhead01_sw)){
            #KALKULASI VARIABLE DATA
            $cpf_nr_vfhead01_sw = $CL_Q("$SL idmain_cpf01_form_01_head,idmain_inap_01 FROM  tb_cpf01_form_01_head WHERE head_tglinput_01 BETWEEN '$tg01' AND '$tg02 23:59:00' AND idmain_inap_01='$cpf_vfhead01_sww[idmain_inap_01]' AND idmain_keg_03='$list01'");
                $cpf_nr_vfhead01_sww = $CL_NR($cpf_nr_vfhead01_sw); #DATA ROW 
            $cpf_sum_vfhead01_sw = $CL_Q("$SL SUM(head_tot_01) as sum_tot from tb_cpf01_form_01_head WHERE head_tglinput_01 BETWEEN '$tg01' AND '$tg02 23:59:00' AND idmain_inap_01='$cpf_vfhead01_sww[idmain_inap_01]' AND idmain_keg_03='$list01'  ");   
            $cpf_sum_vfhead01_sww = $CL_FAS($cpf_sum_vfhead01_sw); #DATA SUM +
            $cpf_sum02_vfhead01_sw = $CL_Q("$SL SUM(head_tot02_02) as sum02_tot from tb_cpf01_form_01_head WHERE head_tglinput_01 BETWEEN '$tg01' AND '$tg02 23:59:00' AND idmain_inap_01='$cpf_vfhead01_sww[idmain_inap_01]' AND idmain_keg_03='$list01'");   
            $cpf_sum02_vfhead01_sww = $CL_FAS($cpf_sum02_vfhead01_sw); #DATA SUM +
            #KALKULASI HIT
            $cpf_hit_vfhead01_sw = $cpf_sum_vfhead01_sww['sum_tot'] /  $cpf_nr_vfhead01_sww * 100;
            
?>
<tr>
    <td><?PHP echo $cpf_vfhead01_sww['idmain_inap_01'] ?></td>
    <td align="right"><?PHP echo   $cpf_sum_vfhead01_sww['sum_tot']; ?></td>
    <td align="right"><?PHP echo   $cpf_sum02_vfhead01_sww['sum02_tot']; ?></td>
</tr>
<?PHP } 
       $cpf_tot_vfhead01_sw = $CL_Q("$SL SUM(head_tot_01) as tot_tot from tb_cpf01_form_01_head WHERE head_tglinput_01 BETWEEN '$tg01' AND '$tg02 23:59:00' AND  idmain_keg_03='$list01'  ");   
       $cpf_tot_vfhead01_sww = $CL_FAS($cpf_tot_vfhead01_sw); #DATA SUM +
       $cpf_tot02_vfhead01_sw = $CL_Q("$SL SUM(head_tot02_02) as tot02_tot from tb_cpf01_form_01_head WHERE head_tglinput_01 BETWEEN '$tg01' AND '$tg02 23:59:00' AND  idmain_keg_03='$list01'");   
       $cpf_tot02_vfhead01_sww = $CL_FAS($cpf_tot02_vfhead01_sw); #DATA SUM +
?>
<tr>
    <td width="14%"><b>TOTAL</b></td>
    <td align="right"><?PHP echo "<b>".$cpf_tot_vfhead01_sww['tot_tot']."</b>" ?></td>
    <td align="right"><?PHP echo "<b>".$cpf_tot02_vfhead01_sww['tot02_tot']."</b>" ?></td>
</tr>
</table>

<?PHP } ?>
