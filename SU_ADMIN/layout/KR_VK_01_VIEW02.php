<b>#REKAP KODE REGISTER * DATE</b>
<hr>
<form method="post">
<div class="input-group input-group-sm mb-3" style="max-width:30rem;">
  <input type="date" class="form-control form-control-sm" required name="tg01">
  <input type="date" class="form-control form-control-sm" required name="tg02">
  <div class="input-group-append">
    <button class="btn btn-success btn-sm" name="btn_caridata_01">CARI DATA</button>
  </div>
</div>
</form>
<?PHP 
    if(isset($_POST['btn_caridata_01'])){
    $tg01 = @$_POST['tg01'];
    $tg02 = @$_POST['tg02'];
    
?>
<table class="table table-bordered table-sm table-striped">
<tr class="table-info">
    <td width="16%">TGL LAHIR</td>
    <td width="25%">KET PASIEN</td>
    <td>KET KELAHIRAN</td>
    <td>-</td>
</tr>
<?PHP 
    #DATA KODE RESGISTER
    $pwc_vkr01_sw = $ms_q("$call_sel tb_vk_kr_01 WHERE kr_tgljamlhr_01 BETWEEN '$tg01' AND '$tg02' ");
        while($pwc_vkr01_sww = $ms_fas($pwc_vkr01_sw)){
            #DATA PASIEN
        $pwc_vpsn01_sw = $ms_q("$sl PasienNomorRM,PasienNama,PasienAlamat FROM TPasien WHERE PasienNomorRM='$pwc_vkr01_sww[PasienNomorRM]'");
        $pwc_vpsn01_sww = $ms_fas($pwc_vpsn01_sw);
        #DATA DOKTER
        $pwc_vdkt01_sw = $ms_q("$sl PelakuKode,PelakuNama FROM TPelaku WHERE PelakuKode='$pwc_vkr01_sww[kr_dpjp_01]'");
            $pwc_vdkt01_sww = $ms_fas($pwc_vdkt01_sw);
            
?>
<tr>
    <td><?PHP echo $pwc_vkr01_sww['kr_tgljamlhr_01']; ?></td>
    <td>
    <?PHP echo $pwc_vpsn01_sww['PasienNomorRM']; ?>
    <br>
    <?PHP echo $pwc_vpsn01_sww['PasienNama']; ?>
    <br>
    <?PHP echo $pwc_vpsn01_sww['PasienAlamat']; ?>
    </td>
    <td>
        <b>Nomor</b> <a href="<?PHP echo"?HLM=KR_VK_01_UP&IDKR01=$pwc_vkr01_sww[idmain_kr_01]&UPKR01=UPKR01"; ?>"><?PHP echo $pwc_vkr01_sww['kr_kode_01']; ?></a>
        <br>
        <?PHP echo "<b>JAM</b> ".$pwc_vkr01_sww['kr_jamlhr_01']; ?>
        <br>
        <?PHP echo "<b>AS</b> ".$pwc_vkr01_sww['kr_as_01']; ?>
        <br>
        <?PHP echo "<b>BB</b> ".$pwc_vkr01_sww['kr_bb_01']; ?>
        <br>
        <?PHP echo "<b>PB</b> ".$pwc_vkr01_sww['kr_pb_01']; ?>
        <br>
            <?PHP if($pwc_vkr01_sww['kr_n_01']=="1"){echo"<b>N</b> TIDAK";}else{echo"<b>N</b> YA";} ?>
        <br>
        <?PHP if($pwc_vkr01_sww['kr_n_01']=="1"){echo"<b>IUFD</b> TIDAK";}else{echo"<b>IUFD</b> YA";} ?>
        <br>
        <?PHP if($pwc_vkr01_sww['kr_sc_01']=="1"){echo"<b>SC</b> TIDAK";}else{echo"<b>SC</b> YA";} ?>
        <br>
        <?PHP if($pwc_vkr01_sww['kr_n_01']=="1"){echo"<b>IUFD</b> TIDAK";}else{echo"<b>IUFD</b> YA";} ?>
        <br>
        <?PHP echo "<b>INDIKASI</b> ".$pwc_vkr01_sww['kr_indikasi_01']; ?>
        <br>
        <?PHP echo "<b>DPJP</b> ". $pwc_vdkt01_sww['PelakuNama']; ?>

    </td>
    <td>-</td>
</tr>
<?PHP } ?>
</table>
<?PHP } ?>