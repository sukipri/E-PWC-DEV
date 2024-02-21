<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <strong class="me-auto">KOMPARASI</strong>
    <small>-</small>
    <button type="button" class="btn-close ms-2 mb-1" data-bs-dismiss="toast" aria-label="Close">
      <span aria-hidden="true"></span>
    </button>
  </div>
  <div class="toast-body">
    <b>Komparasi Presensi / Month</b>
  </div>
</div>
<form method="post">
<div class="input-group input-group-sm mb-3" style="max-width:30rem;">
  <input type="date" class="form-control form-control-sm" name="ep_ri_tg01" required>
  <input type="date" class="form-control form-control-sm" name="ep_ri_tg02" required>
  <div class="input-group-append">
    <button class="btn btn-primary btn-sm" name="ep_btn_cari_01">CARI DATA</button>
  </div>
</div>
</form>
  <!--  -->
  <b><i class="fas fa-check-circle"></i></i>&nbsp Checking DATA</b>
  <br>
<div style="overflow:auto;width:auto;height:50rem;padding:2px;border:1px solid #eee">
<table class="table table-sm table-bordered table-striped">

<tr class="table-info">
    <td width="5%">No</td>
    <td width="20%">Ket</td>
    <td width="20%">DATE</td>
    <td>Keterlambatan</td>
    <td>#</td>
</tr>
<?PHP 
        if(isset($_POST['ep_btn_cari_01'])){
            $open_ep_no = 1;
            $ep_ri_tg01 = @$_POST['ep_ri_tg01'];
            $ep_ri_tg02 = @$_POST['ep_ri_tg02'];
            $epwc_vrecinfo01_sw = $ms_q("$sl  * FROM  TJ_Main_Data.dbo.TA_Record_Info WHERE  ep_kode_01 LIKE '%GPS%' AND In_Out='1' AND  (Date_Time BETWEEN '$ep_ri_tg01' AND  '$ep_ri_tg02 23:59:00') order by ID desc ");
            $epwc_cn_vrecinfo_sw = $ms_nr($epwc_vrecinfo01_sw);
                while($epwc_vrecinfo01_sww = $ms_fas($epwc_vrecinfo01_sw)){
                    #CONVERSION DATA
                    $epwc_conv_vrecinfo01_sw = strlen($epwc_vrecinfo01_sww['ep_tjd_shift_01']);
                    if($epwc_conv_vrecinfo01_sw > 0){
                        $epwc_sub_vrecinfo01_sww04 = substr($epwc_vrecinfo01_sww['ep_tjd_shift_01'],-1);
                    }elseif($epwc_conv_vrecinfo01_sw < 0){
                        $epwc_sub_vrecinfo01_sww04 = substr($epwc_vrecinfo01_sww['ep_tjd_shift_01'],0);
                    }
                          
                          #Convert DATA FUNCTION
                          $ep_get02_vrecinfo01_sw = strtotime($epwc_vrecinfo01_sww['Date_Time']);

                          #Substring data
                          $epwc_sub_vrecinfo01_sww = substr($epwc_vrecinfo01_sww['Date_Time'],8,2); //>Ambil Tanggal
                          $epwc_sub_vrecinfo01_sww05 = substr($epwc_vrecinfo01_sww['Date_Time'],11); //>Ambil Tanggal
                          $epwc_sub_vrecinfo01_sww02 = substr($epwc_vrecinfo01_sww['Date_Time'],5,2); //> Ambil Bulan
                          $epwc_sub_vrecinfo01_sww03 = substr($epwc_vrecinfo01_sww['Date_Time'],0,-9); //> Ambil Tanggal Lengkap
                          
                    #DATA KARYAWAN 
                    $ep_kary01_sw = $ms_q("$sl  ID,Dept_ID,Dept_Name,Per_Name,Per_Code FROM TJ_Main_Data.dbo.HR_Personnel WHERE Per_Code='$epwc_vrecinfo01_sww[Per_Code]'   ");
                    $ep_kary01_sww = $ms_fas($ep_kary01_sw);
                    /* */
                     #DATA JADWAL
                    $epwc_tjdw01_sw = $ms_q("$sl Bulan,NIK,T$epwc_sub_vrecinfo01_sww FROM TJ_Main_Data.dbo.tJadwal WHERE NIK='$epwc_vrecinfo01_sww[Per_Code]' AND Bulan='$epwc_sub_vrecinfo01_sww02'");
                    $epwc_tjdw01_sww = $ms_fas($epwc_tjdw01_sw);
                    $epwc_date_d_sw = "T".$epwc_sub_vrecinfo01_sww;
                        #DATA Shift Get
                        /* */
                        $epwc_vshift01_sw = $ms_q("$call_sel TJ_Main_Data.dbo.tShif WHERE Kode='$epwc_sub_vrecinfo01_sww04'");
                        $epwc_vshift01_sww = $ms_fas($epwc_vshift01_sw);

                        #counting jam keterlambatan dan kedatangan SQL
                        $ep_get_vrecinfo01_sw = $ms_q("$sl cast(Date_Time as time(0)) as ambil_waktu FROM TJ_Main_Data.dbo.TA_Record_Info WHERE ID='$epwc_vrecinfo01_sww[ID]' ");
                        $ep_get_vrecinfo01_sww = $ms_fas($ep_get_vrecinfo01_sw);

                        #JAM KETERLAMBATAN
                        $waktu_awal      =strtotime($epwc_vrecinfo01_sww['Date_Time']);
                        $waktu_ahir02 = date("$epwc_sub_vrecinfo01_sww03 $epwc_vshift01_sww[Masuk]:00");
                        $waktu_akhir    =strtotime($waktu_ahir02); 

                            #TIME COUNTING
                            $diff    =  $waktu_awal - $waktu_akhir ;
                            $jam    = floor($diff / (60 * 60));
                            $abs_jam = abs($jam);
                            $menit    =$diff - $jam * (60 * 60);
                            $menit02 = $menit / 60;
                            $rn_menit02 = ceil($menit02);

                             
                        #JAM LEMBUR
                        $waktu_awal02     =strtotime($epwc_vrecinfo01_sww['Date_Time']);
                        $waktu_ahir0202 = date("$epwc_sub_vrecinfo01_sww03 $epwc_vshift01_sww[Keluar]:00");
                        $waktu_akhir02    =strtotime($waktu_ahir0202); 

                            #TIME COUNTING 02
                            $diff02    =  $waktu_awal02 - $waktu_akhir02;
                            $jam02    =floor($diff02 / (60 * 60));
                            $abs_jam02 = abs($jam02);
                            $menit02    =$diff02 - $jam02 * (60 * 60);
                            $menit0202 = $menit02 / 60;
                            $rn_menit0202 = ceil($menit0202);

                           #CONVERSION TIME
                           if($diff < 0 ){
                            $epwc_tj_diff_01 = 0;
                            }elseif($diff > 0){
                              $epwc_tj_diff_01 = $diff;
                            }
                    

                    
?>
<tr>
    <td><?PHP echo $open_ep_no;  ?>
    <td><?PHP echo  $ep_kary01_sww['Per_Code']."<br>".$ep_kary01_sww['Per_Name']; ?></td>
    <td> 
                  <!-- FORM UPLOAD -->
                      <input type="hidden" value="<?PHP echo $epwc_vrecinfo01_sww['ID']; ?>" name="<?PHP echo"ep_tj_ri_id_01$open_ep_no"; ?>">
                      <input type="hidden" value="<?PHP echo $epwc_vrecinfo01_sww['Per_Code']; ?>" name="<?PHP echo"ep_tj_ri_nip_01$open_ep_no"; ?>">
                      <input type="hidden" value="<?PHP echo $epwc_vrecinfo01_sww['Date_Time']; ?>" name="<?PHP echo"ep_tj_ri_tgl01_01$open_ep_no"; ?>">
                      <input type="hidden" value="<?PHP echo $epwc_vrecinfo01_sww['ep_tjd_shift_01']; ?>" name="<?PHP echo"ep_tj_ri_shift$open_ep_no"; ?>">
                      <input type="hidden" value="<?PHP echo trim($epwc_sub_vrecinfo01_sww03); ?>" name="<?PHP echo"ep_tj_ri_tgl02_01$open_ep_no"; ?>">
                      <input type="hidden" value="<?PHP echo trim($epwc_sub_vrecinfo01_sww05); ?>" name="<?PHP echo"ep_tj_ri_jam$open_ep_no"; ?>">
                      <input type="hidden" value="<?PHP echo trim($epwc_tj_diff_01); ?>" name="<?PHP echo"ep_tj_ri_telat$open_ep_no"; ?>">
                      
                  <!--  -->
            <span class="badge bg-info">  <?php echo $epwc_sub_vrecinfo01_sww04; ?> <?PHP echo $epwc_vshift01_sww['Masuk']; ?></span>
                    
         <?PHP if($epwc_vrecinfo01_sww['In_Out']=="1"){ ?>
        <span class="badge bg-success"><?PHP echo $epwc_vrecinfo01_sww['Date_Time']; ?></span>
        <?PHP }elseif($epwc_vrecinfo01_sww['In_Out']=="2"){ ?>
        <span class="badge bg-danger"><?PHP echo $epwc_vrecinfo01_sww['Date_Time']; ?></span>
     <?PHP } ?>
    </td>
    <td align="center">
        <?PHP 
            if($jam < 0){
                echo"<b>ON TIME<b>";
            }else{
        ?>
            <i><?PHP echo"$jam jam $rn_menit02 Menit"; ?></i>
        <?PHP  } ?>
    </td>
    <td>#</td>
</tr>

<?PHP $open_ep_no++; } } ?>
                </table>
            </div>
            <br>
            <a href="<?PHP echo"?HLM=EP_HOME_01&SUB=EP_APP_01&SUB_CHILD=EP_APP_01_MNL&SUB_CHILD02=WS-EP_APP_01_RI_KOM_01_BLN02&GTG01=$ep_ri_tg01&GTG02=$ep_ri_tg02"; ?>" class="btn btn-success btn-sm">GO >> </a>
            <?PHP //echo $epwc_cn_vrecinfo_sw; ?>
     
