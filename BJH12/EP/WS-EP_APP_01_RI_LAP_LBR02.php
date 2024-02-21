<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			//error_reporting(0);
?>
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">MANUAL PRESENCE > LAPORAN LEMBUR <br> <?PHP echo" $GTG01 <>  $GTG02"; ?></strong>      
        </div>
        <div class="toast-body">
          LAPORAN LEMBUR KARYAWAN
        </div>
    </div>
        <br>
        
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
        #DATA LEMBUR
        $open_ctr_vlbr01_sw = $ms_q("$call_sel Citarum.dbo.tb_tj_prs_lbr_01 WHERE plbr_tglmasuk_01 BETWEEN '$GTG01' AND '$GTG02' order by plbr_tglinput_01 desc");
            while($open_ctr_vlbr01_sww = $ms_fas($open_ctr_vlbr01_sw)){
               
                #DATA KARYAWAN
                $open_tj_vkry01_sw = $ms_q("$sl ID,Per_Code,Per_Name FROM TJ_Main_Data.dbo.HR_Personnel WHERE Per_Code='$open_ctr_vlbr01_sww[KaryNomortj]'");
                    $open_tj_vkry01_sww = $ms_fas($open_tj_vkry01_sw);
                #DATA PRESENSI
                $open_tj_vri01_sw = $ms_q("$sl ID,Per_Code,Date_Time,ep_tjd_shift_01 FROM TJ_Main_Data.dbo.TA_Record_Info WHERE Per_Code='$open_ctr_vlbr01_sww[KaryNomortj]' AND In_Out='2' AND LEFT(Date_Time,10)='$open_ctr_vlbr01_sww[plbr_tglmasuk_01]'");
                    $open_tj_vri01_sww = $ms_fas($open_tj_vri01_sw);
                    #KONVERSI DATA
                    $epwc_conv_vrecinfo01_sw = strlen($open_tj_vri01_sww['ep_tjd_shift_01']);
                                if($epwc_conv_vrecinfo01_sw > 1){
                                    $epwc_sub_vrecinfo01_sww04 = substr($open_tj_vri01_sww['ep_tjd_shift_01'],0,-1);
                                }else{                                  
                                     $epwc_sub_vrecinfo01_sww04 = $open_tj_vri01_sww['ep_tjd_shift_01'];
                                }
                #DATA SHIFT
                $open_tj_vshf01_sw = $ms_q("$call_sel TJ_Main_Data.dbo.tShif WHERE Kode='$epwc_sub_vrecinfo01_sww04' ");
                                $open_tj_vshf01_sww = $ms_fas($open_tj_vshf01_sw);

                    //AND substr(Date_Time,-9)='$open_ctr_vlbr01_sww[plbr_tglmasuk_01]'

    ?>
    <tr>
        <td><?PHP echo $open_ctr_plbr_no; ?></td>
        <td><?PHP echo tanggal_indo($open_ctr_vlbr01_sww['plbr_tglinput_01']); ?></td>
        <td>
        <span class="badge bg-warning"><i class="fas fa-sign-out-alt"></i> <?PHP echo  $open_ctr_vlbr01_sww['plbr_tglmasuk_01']." ". $open_tj_vshf01_sww['Keluar']; ?></span>
        <br>
        <span class="badge bg-danger"> <i class="fas fa-sign-in-alt"></i> <?PHP echo $open_tj_vri01_sww['Date_Time'];  ?></span>
            </td>
        <td><i><?PHP echo $open_tj_vkry01_sww['Per_Code']; ?></i>
                <br>
        <?PHP echo $open_tj_vkry01_sww['Per_Name']; ?>
        </td>
        <td align="center"><?PHP echo $open_ctr_vlbr01_sww['plbr_jmljam_01']." Jam";  ?></td>
    </tr>
    <?PHP $open_ctr_plbr_no++; }  ?>
    <?PHP 
        $open_ctr_tot_vlbr01_sw = $ms_q("$sl SUM(plbr_jmljam_01) as tot_jmljam FROM Citarum.dbo.tb_tj_prs_lbr_01 WHERE  plbr_tglmasuk_01 BETWEEN '$GTG01' AND '$GTG02' AND plbr_status_01='4'");
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
    <a href="<?PHP echo"?HLM=EP_HOME_01&SUB=EP_APP_01&SUB_CHILD=EP_APP_01_MNL&SUB_CHILD02=WS-EP_APP_01_RI_LBR02&GTG01=$ep_txt_cari_tg01&GTG02=$ep_txt_cari_tg02"; ?>" class="badge bg-dark"><i class="far fa-file-alt"></i>&nbsp Print Data</a>
<?PHP } ?>