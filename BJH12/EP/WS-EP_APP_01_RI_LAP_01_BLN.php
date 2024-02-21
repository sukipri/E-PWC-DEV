<form method="post">
<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <strong class="me-auto">NOTE <br>  Laporan setelah dilakukan <i>Komparasi</i> data presensi</strong>
   
    <small>-</small>
    <button type="button" class="btn-close ms-2 mb-1" data-bs-dismiss="toast" aria-label="Close">
      <span aria-hidden="true"></span>
    </button>
  </div>
  <div class="toast-body">
    <b>LAPORAN PRESENSI / MONTH</b>
    <br>
    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
      <select name="ep_txt_rekap_02" class="form-control form-control-sm" required>
      <?PHP 
          $ep_rekap_no02 = 2020;
            while($ep_rekap_no02 <= 2025){
              echo"<option value=$ep_rekap_no02>$ep_rekap_no02</option>";
              $ep_rekap_no02++;}

      ?>
      </select>
      </div>
      
      <select name="ep_txt_rekap_01" class="form-control form-control-sm" required>
      <?PHP
        $ep_rekap_no = 1;

        while($ep_rekap_no <= 12){
          $ep_rekap_no_zero = sprintf('%02d',$ep_rekap_no);
          echo"<option value=$ep_rekap_no_zero>$ep_rekap_no_zero</option>";

        $ep_rekap_no++; }
      ?>
      </select>
     <button name="ep_btn_cari_rekap_01" class="btn btn-success btn-sm">CARI DATA</button>
	  </div>
    
  </div>
</div>
</form>
<br>
    <?PHP 
      if(isset($_POST['ep_btn_cari_rekap_01'])){
        $ep_txt_rekap_01 = @$sql_sl($_POST['ep_txt_rekap_01']);
        $ep_txt_rekap_02 = @$sql_sl($_POST['ep_txt_rekap_02']);
          #KONVERSI
          $ep_conv_rekap01 = "$ep_txt_rekap_02-$ep_txt_rekap_01";
      
    ?>
<div style="overflow:auto;width:auto;height:60rem;padding:2px;border:1px solid #eee">
<table class="table table-bordered table-sm table-striped">

<tr class="table-info">
    <td width="5%">#</td>
    <td width="25%">KET</td>
    <td>REPORT ISSUE</td>
    <td>#</td>
    <td>#</td>
</tr>
<?PHP 
                #>>GET OPEN TJ_Main_Data
                #DATA KARYAWAN
                $open_ep_no = 1;
                $open_tj_vkry01_sw = $ms_q("$sl * from TJ_Main_Data.dbo.HR_Personnel order by Per_Name asc");
                    while($open_tj_vkry01_sww = $ms_fas($open_tj_vkry01_sw)){
                #>> GET OPEN CItarum tb_tj_prs_rekap_01
                    #DATA REKAP PRESENSI
                    $open_ctr_vprkp01_sw = $ms_q("$sl SUM(convert(int,prekap_telat_01)) as tot_telat FROM Citarum.dbo.tb_tj_prs_rekap_01 WHERE KaryNomortj='$open_tj_vkry01_sww[Per_Code]' AND prekap_tglmasuk_01 BETWEEN '$ep_conv_rekap01-01' AND '$ep_conv_rekap01-31' ");
                    $open_ctr_cn_vprkp01_sw = $ms_fas($open_ctr_vprkp01_sw);
                #KONVERSI
                    $ep_conv_vprkp01_sw = $open_ctr_cn_vprkp01_sw['tot_telat'] / 60;

?>
<tr>
    <td><?PHP echo $open_ep_no ?></td>
    <td>
        <a href="<?PHP echo"?HLM=EP_HOME_01&SUB=EP_APP_01&SUB_CHILD=WS-EP_APP_01_RI_JADWAL_01&SUB_CHILD02=WS-EP_APP_01_RI_LAP_01&SUB_CHILD03=WS-EP_APP_01_RI_LAP_01_KRY02&IDEMP01=$open_tj_vkry01_sww[Per_Code]"; ?>"><?PHP echo $open_tj_vkry01_sww['Per_Code']; ?></a>
        <br>
        <?PHP echo $open_tj_vkry01_sww['Per_Name']; ?>
    </td>
    <td align="center">
      <?PHP if($open_ctr_cn_vprkp01_sw['tot_telat'] < 0 ){ ?>
        <?PHP echo"<b>ON TIME</b>";  ?>
          <?PHP }elseif($open_ctr_cn_vprkp01_sw['tot_telat'] > 0){  ?>
         Keterlambatan <i><?PHP echo  ceil($ep_conv_vprkp01_sw)." Jam";  ?></i>
        <?PHP } ?>
    </td>
    <td>#</td>
    <td>#</td>
</tr>
<?PHP $open_ep_no++; } ?>
</table>
<?PHP } ?>
    </div>
