<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			//error_reporting(0);
?>
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">MANUAL PRESENCE > LEMBUR > <br> <?PHP echo"$GTG01 - $GTG02"; ?></strong>      
        </div>
        <div class="toast-body">
           <b>MANAGE Pengajuan Lembur Karyawan</b>
           <br>
           *Data yang ditampilkan adalah data yang belum terveriff untuk dikirim
        </div>
    </div>
        <form method="post">
    <table class="table table-sm table-bordered table-striped">
    <tr class="table-info">
        <td width="3%">#</td>
        <td width="15%">Tanggal Entri</td>
        <td width="15%">Tanggal Lembur</td>
        <td width="20%">KET</td>
        <td width="20%" align="center">Lembur</td>
        <td width="10%">##</td>
    </tr>
    <?PHP 
        $open_ctr_plbr_no = 1;
        $open_ctr_vlbr01_sw = $ms_q("$call_sel Citarum.dbo.tb_tj_prs_lbr_01 WHERE (plbr_status_01='1' OR plbr_status_01='2' OR plbr_status_01='4') AND plbr_tglmasuk_01 BETWEEN '$GTG01' AND '$GTG02' order by plbr_tglinput_01 desc");
        $open_ctr_nr_vlbr01_sw = $ms_nr($open_ctr_vlbr01_sw);
            while($open_ctr_vlbr01_sww = $ms_fas($open_ctr_vlbr01_sw)){
                #DATA KARYAWAN
                $open_tj_vkry01_sw = $ms_q("$sl ID,Per_Code,Per_Name FROM TJ_Main_Data.dbo.HR_Personnel WHERE Per_Code='$open_ctr_vlbr01_sww[KaryNomortj]'");
                    $open_tj_vkry01_sww = $ms_fas($open_tj_vkry01_sw);
    ?>
    <tr>
        <td><?PHP echo $open_ctr_plbr_no; ?>
            <input type="hidden" name="<?PHP echo"ep_idmain_plbr_01$open_ctr_plbr_no"; ?>" value="<?PHP echo $open_ctr_vlbr01_sww['idmain_plbr_01']; ?>">
            </td>
            <td><?PHP echo  tanggal_indo($open_ctr_vlbr01_sww['plbr_tglinput_01']); ?></td>
            <td><?PHP echo  tanggal_indo($open_ctr_vlbr01_sww['plbr_tglmasuk_01']); ?></td>
            <td><i><?PHP echo $open_tj_vkry01_sww['Per_Code']; ?></i>
                <br>
        <?PHP echo $open_tj_vkry01_sww['Per_Name']; ?>
        </td>
        <td align="center"><?PHP echo $open_ctr_vlbr01_sww['plbr_jmljam_01']." Jam";  ?></td>
        <td>
            <?PHP if($open_ctr_vlbr01_sww['plbr_status_01']=="1"){ ?>
                <a href="<?PHP echo"?HLM=EP_HOME_01&SUB=EP_APP_01&SUB_CHILD=EP_APP_01_MNL&SUB_CHILD02=#"; ?>" class="btn btn-info btn-sm">Approve / Direksi</a>
                <?PHP }elseif($open_ctr_vlbr01_sww['plbr_status_01']=="2"){ ?>
                <a href="<?PHP echo"?HLM=EP_HOME_01&SUB=EP_APP_01&SUB_CHILD=EP_APP_01_MNL&SUB_CHILD02=WS-EP_APP_01_RI_LBR02&GTG01=$GTG01&GTG02=$GTG02&SAVEPLBR01=SAVEPLBR01&IDPLBR01=$open_ctr_vlbr01_sww[idmain_plbr_01]"; ?>" class="btn btn-warning btn-sm">Approve / SDM</a>
                <?PHP }elseif($open_ctr_vlbr01_sww['plbr_status_01']=="4"){ ?>
                <a href="<?PHP echo"##"; ?>" class="btn btn-success btn-sm">Approved</a>
                <?PHP } ?>
        </td>
    </tr>
    <?PHP $open_ctr_plbr_no++; }  ?>
    <?PHP 
        $open_ctr_tot_vlbr01_sw = $ms_q("$sl SUM(plbr_jmljam_01) as tot_jmljam FROM Citarum.dbo.tb_tj_prs_lbr_01 WHERE  plbr_tglmasuk_01 BETWEEN '$GTG01' AND '$GTG02'");
        $open_ctr_tot_vlbr01_sww = $ms_fas($open_ctr_tot_vlbr01_sw);
    ?>
    <tr class="table-dark">
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td align="center">Total pengajuan jam <b><?PHP echo $open_ctr_tot_vlbr01_sww['tot_jmljam']; ?></b> Jam</td>
        <td>-</td>
    </tr>
    </table>
    <br>
        <button class="btn btn-primary btn-sm" name="ep_save_plbr_01">APPROVE ALL</button>
    </form>
            <?PHP include"../logic/EP_EXE_MIX.php"; ?>
<?PHP } ?>