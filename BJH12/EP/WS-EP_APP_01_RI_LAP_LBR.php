<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			//error_reporting(0);
?>
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">MANUAL PRESENCE > LAPORAN LEMBUR</strong>      
        </div>
        <div class="toast-body">
          LAPORAN LEMBUR KARYAWAN
        </div>
    </div>
        <br>
        <form method="post">
        <div class="input-group input-group-sm mb-3" style="max-width:25rem;">
            <input type="date" class="form-control form-control-sm" required name="ep_txt_cari_tg01">
            <input type="date" class="form-control form-control-sm" required name="ep_txt_cari_tg02">
            <div class="input-group-append">
            
            <button class="btn btn-success btn-sm" name="ep_btn_cari_lbr_01">CARI DATA</button>
            </div>
        </div>
        *Data yang ditampilkan adalah data sudah <i>terveriff</i> untuk dikirim
    </form>
        <?PHP 
                if(isset($_POST['ep_btn_cari_lbr_01'])){
                 $ep_txt_cari_tg01 = $sql_sl($_POST['ep_txt_cari_tg01']);
                 $ep_txt_cari_tg02 = $sql_sl($_POST['ep_txt_cari_tg02']);
                
        ?>
    <table class="table table-sm table-bordered table-striped">
    <tr class="table-info">
        <td width="3%">#</td>
        <td width="15%">Tanggal Entri</td>
        <td width="15%">Tanggal Lembur</td>
        <td width="20%">KET</td>
        <td width="20%" align="center">Lembur</td>
    </tr>
    <?PHP 
        $open_ctr_plbr_no = 1;
        $open_ctr_vlbr01_sw = $ms_q("$call_sel Citarum.dbo.tb_tj_prs_lbr_01 WHERE plbr_tglmasuk_01 BETWEEN '$ep_txt_cari_tg01' AND '$ep_txt_cari_tg02' order by plbr_tglinput_01 desc");
            while($open_ctr_vlbr01_sww = $ms_fas($open_ctr_vlbr01_sw)){
                #DATA KARYAWAN
                $open_tj_vkry01_sw = $ms_q("$sl ID,Per_Code,Per_Name FROM TJ_Main_Data.dbo.HR_Personnel WHERE Per_Code='$open_ctr_vlbr01_sww[KaryNomortj]'");
                    $open_tj_vkry01_sww = $ms_fas($open_tj_vkry01_sw);
    ?>
    <tr>
        <td><?PHP echo $open_ctr_plbr_no; ?></td>
        <td><?PHP echo  tanggal_indo($open_ctr_vlbr01_sww['plbr_tglinput_01']); ?></td>
        <td><?PHP echo  tanggal_indo($open_ctr_vlbr01_sww['plbr_tglmasuk_01']); ?></td>
        <td><i><?PHP echo $open_tj_vkry01_sww['Per_Code']; ?></i>
                <br>
        <?PHP echo $open_tj_vkry01_sww['Per_Name']; ?>
        </td>
        <td align="center"><?PHP echo $open_ctr_vlbr01_sww['plbr_jmljam_01']." Jam";  ?></td>
    </tr>
    <?PHP $open_ctr_plbr_no++; }  ?>
    <?PHP 
        $open_ctr_tot_vlbr01_sw = $ms_q("$sl SUM(plbr_jmljam_01) as tot_jmljam FROM Citarum.dbo.tb_tj_prs_lbr_01 WHERE  plbr_tglmasuk_01 BETWEEN '$ep_txt_cari_tg01' AND '$ep_txt_cari_tg02' AND plbr_status_01='4'");
        $open_ctr_tot_vlbr01_sww = $ms_fas($open_ctr_tot_vlbr01_sw);
    ?>
    <tr class="table-dark">
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td align="center">Total  <b><?PHP echo $open_ctr_tot_vlbr01_sww['tot_jmljam']; ?></b> Jam</td>
    </tr>
    </table>
    <br>
    <a href="<?PHP echo"?HLM=EP_HOME_01&SUB=EP_APP_01&SUB_CHILD=WS-EP_APP_01_RI_JADWAL_01&SUB_CHILD02=WS-EP_APP_01_RI_LAP_01&SUB_CHILD03=WS-EP_APP_01_RI_LAP_LBR02&GTG01=$ep_txt_cari_tg01&GTG02=$ep_txt_cari_tg02"; ?>" class="badge bg-primary"><i class="far fa-file-alt"></i>&nbsp Checking Data</a>
    <?PHP } ?>
<?PHP } ?>