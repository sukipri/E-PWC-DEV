<?PHP 
    error_reporting(0);
        #GENERATE UPLOADER
        if($epwc_vkry01_sww['UnitKode']=="95"){
            $IDUPLOADER = "04161031";
        }else{
            $IDUPLOADER = "$epwc_vkry01_sww[KaryNomor]";
        }
    $epwc_dt_vlmbr01_sw = $CL_Q("$SL DAY(LemburTanggal) as day_dt FROM  Citarum.dbo.TKaryLemburHari WHERE LemburID='$IDLBR01'");
      $epwc_dt_vlmbr01_sww  = $CL_FAS($epwc_dt_vlmbr01_sw);

      #SUBTRING substr("Hello world",6);
      $epwc_dtbulan = substr($epwc_vw_vlmbr01_sww['LemburBulanRng'],4);
      #echo  $epwc_dtbulan ;
?>
<b class="mx-2 badge bg-info"><?PHP echo"DATA <i>$epwc_vw_vkry01_sww[KaryNama]</i>"; ?></b>
<br>
<form method="post">
<div class="card border-primary mb-3 mx-2" style="max-width: 52rem;">
  <div class="card-header">FORM LEMBUR</div>
  <div class="card-body">
   <!--  -->
   <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">DATE</span>
        <!-- <input type="number" class="form-control" name="elembur_lemtgl_01" required> -->
        <select name="elembur_lemtgl_0101" class="form-control" required>
        <option value="">Tanggal</option>
        <?PHP 
            $no_lembur = 1;
                while($no_lembur <= 31){
                   $no_spritf =  sprintf("%'.02d\n", $no_lembur);
                   if($no_spritf==$epwc_dt_vlmbr01_sww['day_dt']){
                    echo"<option value=$no_spritf selected>$no_spritf</option>";
                   }else{
                    echo"<option value=$no_spritf>$no_spritf</option>";
                }
                $no_lembur++; 
                  
                }
        ?>      
    </select>
      <select name="elembur_bulan_01" class="form-control" required>
        <option value="">Bulan Lembur</option>
        <?PHP 
            $no_lemburbulan = 1;
                while($no_lemburbulan <= 12){ #$epwc_dtbulan
                   $no_spritf =  sprintf("%'.02d\n", $no_lemburbulan);
                   if($no_spritf==$epwc_dtbulan){
                    echo"<option value=$no_spritf selected>$no_spritf</option>";
                   }else{
                    echo"<option value=$no_spritf>$no_spritf</option>";
                   }
                   $no_lemburbulan++; 
                }
        ?>
        
    </select>
    <input type="number" class="form-control" name="elembur_lemtgl_0102" required placeholder="Tahun..." value="<?PHP echo $DATE_Y; ?>">
    <span class="badge bg-info">Jumlah Jam</span>
    <input type="text" class="form-control" autocomplete="off" name="elembur_jmljam_01" required value="<?PHP echo $epwc_vw_vlmbr01_sww['LemburBiasa']; ?>">
     <!-- <input type="time" class="form-control" name="elembur_tgljam1_01" required  value="<?PHP #echo $epwc_vw_vlmbr01_sww['LemburTgljam1'] ?>">
    <input type="time" class="form-control" name="elembur_tgljam2_01" required  value="<?PHP #Eecho $epwc_vw_vlmbr01_sww['LemburTgljam2'] ?>"> -->
    </div>
    

     <!--  -->
   <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Jenis Lembur</span>
        <!-- <input type="number" class="form-control" name="elembur_lemtgl_01" required> -->
        <select name="elembur_jenis_01" class="form-control" required style="max-width:17rem;">
       
        <?PHP  
            if($epwc_vw_vlmbr01_sww['LemburJenis']=="INFAL"){
                echo"<option value=INFAL>CUTI/INFAL</option>";
                echo"<option value=BIASA>LEMBUR BIASA</option>";
                echo"<option value=PP>PENYELESAIAN PEKERJAAN</option>";
                echo"<option value=DM>DINAS MALAM</option>";
            }elseif($epwc_vw_vlmbr01_sww['LemburJenis']=="BIASA"){
                echo"<option value=BIASA>LEMBUR BIASA</option>";
                echo"<option value=INFAL>CUTI/INFAL</option>";
                echo"<option value=PP>PENYELESAIAN PEKERJAAN</option>";
                echo"<option value=DM>DINAS MALAM</option>";
            }elseif($epwc_vw_vlmbr01_sww['LemburJenis']=="PP"){
                echo"<option value=PP>PENYELESAIAN PEKERJAAN</option>";
                echo"<option value=BIASA>LEMBUR BIASA</option>";
                echo"<option value=INFAL>CUTI/INFAL</option>";
                echo"<option value=DM>DINAS MALAM</option>";
            }elseif($epwc_vw_vlmbr01_sww['LemburJenis']=="DM"){
                echo"<option value=DM>DINAS MALAM</option>";
                echo"<option value=PP>PENYELESAIAN PEKERJAAN</option>";
                echo"<option value=BIASA>LEMBUR BIASA</option>";
                echo"<option value=INFAL>CUTI/INFAL</option>";
            }else{
                echo"<option value=></option>";
                echo"<option value=INFAL>CUTI/INFAL</option>";
                echo"<option value=BIASA>LEMBUR BIASA</option>";
                echo"<option value=PP>PENYELESAIAN PEKERJAAN</option>";
                echo"<option value=DM>DINAS MALAM</option>";
            }
        ?>
       
    </select>
    </div>
    Jika <span class="badge bg-primary">CUTI/INFAL</span> Silahkan mengganti jadwal dahulu
    <br>
    Jika <span class="badge bg-primary">Dinas Malam</span> Silahkan sesuaikan dengan jadwal masuk
    <br><br>
    <!-- <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Jumlah Jam</span>
        <input type="text" class="form-control" autocomplete="off" name="elembur_jmljam_01" autocomplete value="<?PHP #echo $epwc_vw_vlmbr01_sww['LemburBiasa'] ?>" style="max-width:12rem;">
        <span class="input-group-text" id="basic-addon1">for Halftime ex: 1.5</span>
    </div>  -->
    <?PHP 
        #if($epwc_vkry01_sww['KaryNomorYakkum']=="04950490"){ ?>
        <!-- <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Uraian</span>
            <select name="elembur_ur_01" class="form-control form-control-sm">
                <option value=""></option>
                <option value="Admisi Ranap">Admisi Ranap</option>
                <option value="Pendaftaran Onsite">Pendaftaran Onsite</option>
            </select>
            </div>

            <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Alasan</span>
            <select name="elembur_al_01" class="form-control form-control-sm">
                <option value=""></option>
                <option value="Menggantikan Petugas Cuti / Libur">Menggantikan Petugas Cuti / Libur</option>
                <option value="Menggantikan Petugas Sakit">Menggantikan Petugas Sakit</option>
            </select>
            </div> -->
     <?PHP #}else{ ?>
    <!-- <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Uraian</span>
       <textarea class="form-control" name="elembur_ur_01"><?PHP #echo $epwc_vw_vlmbr01_sww['LemburUraian'] ?></textarea>
    </div> -->
   <?PHP 
        if(@$_GET['UPLMBR01']){
   ?>
     
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Uraian</span>
       <textarea class="form-control" name="elembur_ur_01"><?PHP echo $epwc_vw_vlmbr01_sww['LemburUraian'] ?></textarea>
    </div> 

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Alasan</span>
        <textarea class="form-control" name="elembur_al_01"><?PHP echo $epwc_vw_vlmbr01_sww['LemburAlasan'] ?></textarea>
    </div>  
             <?PHP }else{ ?>
                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Uraian > Alasan</span>
                <select name="elembur_ur_01" class="form-control form-control-sm" required>
                    <option value=""></option>
                        <?PHP 
                            $epwc_sl_vlemtmp01_sw = $CL_Q("$SL idmain_lemtmp_01,lemtmp_uisi_01,lemtmp_aisi_01  FROM tb_lembur_01_lemtmp WHERE (UnitKode='$epwc_vkry01_sww[UnitKode]' OR UnitKode01='$epwc_vkry01_sww[UnitKode01]') AND KaryNomor='$epwc_vkry01_sww[KaryNomor]' ");
                            while($epwc_sl_vlemtmp01_sww = $CL_FAS($epwc_sl_vlemtmp01_sw)){ #SLC TEMPATE
                                echo"<option value=$epwc_sl_vlemtmp01_sww[idmain_lemtmp_01]>$epwc_sl_vlemtmp01_sww[lemtmp_uisi_01] > $epwc_sl_vlemtmp01_sww[lemtmp_aisi_01]</option>";
                            }
                        ?>
                    </select>
                    <code> U/ uraian bisa diisikan di menu <a href="?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_IN02TEMP">TEMP.LEMBUR</a> . setelah mengisi di temp.Lembur , isikan pilihan uraian sesuai dengan informasi lembur yang akan dimasukan . <p>dan U/ alasan uraian , sudah otomatis terinput sesuai dengan template yang sudah ditetapkan</p> </code>
                </div>
<br>
            <?PHP } ?>
        <?PHP #} ?>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Target</span>
        <textarea class="form-control" name="elembur_tar_01">Harus Terselesaikan</textarea>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Hasil</span>
        <textarea class="form-control" name="elembur_has_01">Terselesaikan</textarea>
    </div>

    <ul>
        <li>#<b>KETENTUAN PENGISIAN FORM</b>
            <ul>
                <li>Isikan data dengan benar setiap memberikan lembur</li>
    </ul>
    <br>
   <!--  -->
   <?PHP 
        if(@$_GET['UPLMBR01']){
            echo"<button class='btn btn-danger btn-sm' name='update_elembur_in02'>UPDATE DATA</button>"; 
        }else{
            echo"<button class='btn btn-success btn-sm' name='simpan_elembur_in02'>SIMPAN DATA</button>";
        }
   ?>
    
</div>

    </form>
    <?PHP #include"../LOGIC/PRC/EXE_MIX.php"; ?>
    <?php
            #--------------ELEMBUR PROCCESSING--------------------------#
		#VARIABLE
		#$elembur_tahun_01 = @$SQL_SL($_POST['elembur_tahun_01']);
		$elembur_bulan_01 = @$SQL_SL($_POST['elembur_bulan_01']);
		$elembur_lemtgl_0101 = @$SQL_SL($_POST['elembur_lemtgl_0101']);
		$elembur_lemtgl_0102 = @$SQL_SL($_POST['elembur_lemtgl_0102']);
		$elembur_hittgl_01 = "$elembur_lemtgl_0102-$elembur_bulan_01-$elembur_lemtgl_0101";
		$elembur_lemtgl_01 = "$elembur_hittgl_01";
		$elembur_jenis_01 = @$SQL_SL($_POST['elembur_jenis_01']);
		$elembur_jmljam_01 = @$SQL_SL($_POST['elembur_jmljam_01']);
		$elembur_ur_01 = @$SQL_SL($_POST['elembur_ur_01']);
		$elembur_al_01 = @$SQL_SL($_POST['elembur_al_01']);
		$elembur_tar_01 = @$SQL_SL($_POST['elembur_tar_01']);
		$elembur_has_01 = @$SQL_SL($_POST['elembur_has_01']);
        $elembur_tgljam1_01 = @$SQL_SL($_POST['elembur_tgljam1_01']);
        $elembur_tgljam2_01 = @$SQL_SL($_POST['elembur_tgljam2_01']);
        #KONVERSI DATA
        $datetime1 = new DateTime("$elembur_lemtgl_01  $elembur_tgljam1_01");
        $datetime2 = new DateTime("$elembur_lemtgl_01 $elembur_tgljam2_01");
        $interval = $datetime1->diff($datetime2); 
        $elembur_ls_jmljam_01 = $interval->format('%h'); 
        $elembur_ls_jmljam_02 = $interval->format('%i'); 
        if($elembur_ls_jmljam_02 < 10){
            $elembur_rsl_jmljam_02 =  $elembur_ls_jmljam_01;
        }elseif($elembur_ls_jmljam_02 < 29){
            $elembur_rsl_jmljam_02 =  $elembur_ls_jmljam_01.".3";
        }elseif($elembur_ls_jmljam_02 < 58){
            $elembur_rsl_jmljam_02 =  $elembur_ls_jmljam_01.".5";
        }
        #$elembur_jmljam_01 = $elembur_rsl_jmljam_02;
        #JOIN DATA
        $add_one = "01";
        $add_bulan = (int)$elembur_bulan_01 + $add_one;
        $add_sp =  sprintf("%'.02d\n",$add_bulan);
        $elembur_thnbln_01 = "$DATE_Y$add_sp";
        $elembur_thnbln_02 = "$elembur_lemtgl_0102$elembur_bulan_01";
		
		if(isset($_POST['simpan_elembur_in02'])){#PROCCESSING INSERT
            #CEKING DATA Jam
            // $pl_ck_vlem01_sw = $CL_Q("$SL LemburBulan,LemburBulanRng,LemburTglInput,LemburTgljam1,LemburTgljam2 FROM Citarum.dbo.TKaryLemburHari WHERE LemburTanggal='$elembur_lemtgl_01 00:00:00' AND LemburTgljam1='$elembur_tgljam1_01' AND LemburTgljam2='$elembur_tgljam2_01' AND KaryNomor='$IDKRY'");
            // $pl_ck_nr_vlem01_sww = $CL_NR($pl_ck_vlem01_sw);
            // #echo "Ada".$pl_ck_vlem01_sww;
            // if($pl_ck_nr_vlem01_sww > 0){
            //                 echo"<div class='alert alert-dismissible alert-danger'>
            // <strong>Oh snap!</strong> Tanggal Sudah pernah Di input sebelumnya
            //         </div>";
            // }else{

            #CEKING DATA URAIAN LEMBUR 
            $epwc_ck_vlemtmp01_sw = $CL_Q("$SL idmain_lemtmp_01,lemtmp_uisi_01,lemtmp_aisi_01  FROM Citarum.dbo.tb_lembur_01_lemtmp WHERE  idmain_lemtmp_01='$elembur_ur_01' ");
             $epwc_ck_vlemtmp01_sww = $CL_FAS($epwc_ck_vlemtmp01_sw);
            
			$upahlembur = $epwc_vw_vkry01_sww['GajiUP1Yakkum'] + $epwc_vw_vkry01_sww['GajiUP2Yakkum'] + $epwc_vw_vkry01_sww['GajiKlgYakkum'] + $epwc_vw_vkry01_sww['GajiTunjKinerjaMinYakkum'] + $epwc_vw_vkry01_sww['GajiInsentifRadYakkum'] + $epwc_vw_vkry01_sww['GajiInsentifProgYakkum'] + $epwc_vw_vkry01_sww['GajiTunjPeralihanYakkum'] ; #Upah Lembur 02
			// $hit_new_lem_01 = ($elembur_jmljam_01 * 2) / 0.5;
			$upahlembur_02 = $upahlembur / 173 ; #Upah lembur 02
			$upahlembur_var_rev01 = 1.5;
			$upahlembur_rev01 =  $upahlembur_var_rev01 * $upahlembur_02 ;
			$upahlembur_rev02 =  $upahlembur_rev01 + ($elembur_jmljam_01 - 1) * 2 * $upahlembur_02;
			
			$upahlembur_fix =  $upahlembur_rev02; 
			#PROCCESSING INSERT
			$save_elembur_01 = @$CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader,UnitKode,LemburTglInput,LemburTgljam1,LemburTgljam2)VALUES('$elembur_thnbln_01','$elembur_thnbln_02','$IDKRY','$elembur_lemtgl_01 00:00:00','100','$elembur_lemtgl_01 00:00:00','$elembur_lemtgl_01 00:00:00','$elembur_jmljam_01','$upahlembur_fix','$epwc_ck_vlemtmp01_sww[lemtmp_uisi_01]','$epwc_ck_vlemtmp01_sww[lemtmp_aisi_01]','$elembur_tar_01','$elembur_has_01','2','$IDMAIN','$epwc_vkry01_sww[KaryDir]','$elembur_jenis_01','$IDUPLOADER','$epwc_vw_vkry01_sww[UnitKode]','$DATE_HTML5_SQL','','')");
            
            #$save_elembur_01 = @$CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader,UnitKode,LemburTglInput,LemburTgljam1,LemburTgljam2)VALUES('$elembur_thnbln_01','$elembur_thnbln_02','$IDKRY','$elembur_lemtgl_01 00:00:00','100','$elembur_lemtgl_01 00:00:00','$elembur_lemtgl_01 00:00:00','$elembur_jmljam_01','$upahlembur_fix','$elembur_ur_01','$elembur_al_01','$elembur_tar_01','$elembur_has_01','2','$IDMAIN','$epwc_vkry01_sww[KaryDir]','$elembur_jenis_01','$IDUPLOADER','$epwc_vw_vkry01_sww[UnitKode]','$DATE_HTML5_SQL','$elembur_tgljam1_01','$elembur_tgljam2_01')");
			if($save_elembur_01){
				include"../LAYOUT/NOTIF/NF_SAVE_SUCCESS.php";
                #echo $interval->format('%h')." Hours ".$interval->format('%i')." Minutes";
				#header("LOCATION:?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW02");
			}else{
				include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
			}
		}
    #} #CLOSE else for Cek data

		if(isset($_POST['update_elembur_in02'])){	#PROCCESSING UPDATE	 
			#JOIN DATA
				#$elembur_thnbln_01 = "$DATE_Y$DATE_m";
				$elembur_thnbln_02 = "$elembur_lemtgl_0102$elembur_bulan_01";
		 /*UpahPerJam = ((JmlUP1 + JmlUP2 + JMLKlg + JmlKinerjaMin + _
		JmlInsentifRad + JmlInsentifProg + JmlTunjPeralihan) / 173) */
			#GajiUP1Yakkum,GajiUP2Yakkum,GajiKlgYakkum,GajiTunjKinerjaMinYakkum,GajiInsentifRadYakkum,GajiInsentifProgYakkum,GajiTunjPeralihanYakkum,KaryStatus,KaryLemburKhusus  
		   #Round2Hundred(((1.5 * UpahPerJam) + _((IsNull(e.Row("LemburBiasa"), 0) - 1) * 2) * UpahPerJam))
		
		$upahlembur = $epwc_vw_vkry01_sww['GajiUP1Yakkum'] + $epwc_vw_vkry01_sww['GajiUP2Yakkum'] + $epwc_vw_vkry01_sww['GajiKlgYakkum'] + $epwc_vw_vkry01_sww['GajiTunjKinerjaMinYakkum'] + $epwc_vw_vkry01_sww['GajiInsentifRadYakkum'] + $epwc_vw_vkry01_sww['GajiInsentifProgYakkum'] + $epwc_vw_vkry01_sww['GajiTunjPeralihanYakkum'] ; #Upah Lembur 02
		// $hit_new_lem_01 = ($elembur_jmljam_01 * 2) / 0.5;
		$upahlembur_02 = $upahlembur / 173 ; #Upah lembur 02
		$upahlembur_var_rev01 = 1.5;
		$upahlembur_rev01 =  $upahlembur_var_rev01 * $upahlembur_02 ;
		$upahlembur_rev02 =  $upahlembur_rev01 + ($elembur_jmljam_01 - 1) * 2 * $upahlembur_02;
		
		$upahlembur_fix =  $upahlembur_rev02;
		#$upahlembur_fix =  $hit_new_lem_01;
		#$save_elembur_01 ="oke";
		#PROCCESSING QUERY
		$save_elembur_01 = @$CL_Q("$UP  Citarum.dbo.TKaryLemburHari SET LemburBulan='$elembur_thnbln_01',LemburBulanRng='$elembur_thnbln_02',KaryNomor='$IDKRY',LemburTanggal='$elembur_lemtgl_01 00:00:00',LemburPersen='100',LemburJam1='$elembur_lemtgl_01 00:00:00',LemburJam2='$elembur_lemtgl_01 00:00:00',LemburBiasa='$elembur_jmljam_01',LemburBiasaJumlah='$upahlembur_fix',LemburUraian='$elembur_ur_01',LemburAlasan='$elembur_al_01',LemburTarget='$elembur_tar_01',LemburHasil='$elembur_has_01',KaryDir='$epwc_vkry01_sww[KaryDir]',UnitKode='$epwc_vw_vkry01_sww[UnitKode]',LemburTgljam1='',LemburTgljam2='' WHERE LemburID='$IDLBR01'");
        
        #$save_elembur_01 = @$CL_Q("$UP  Citarum.dbo.TKaryLemburHari SET LemburBulan='$elembur_thnbln_01',LemburBulanRng='$elembur_thnbln_02',KaryNomor='$IDKRY',LemburTanggal='$elembur_lemtgl_01 00:00:00',LemburPersen='100',LemburJam1='$elembur_lemtgl_01 00:00:00',LemburJam2='$elembur_lemtgl_01 00:00:00',LemburBiasa='$elembur_jmljam_01',LemburBiasaJumlah='$upahlembur_fix',LemburUraian='$elembur_ur_01',LemburAlasan='$elembur_al_01',LemburTarget='$elembur_tar_01',LemburHasil='$elembur_has_01',KaryDir='$epwc_vkry01_sww[KaryDir]',UnitKode='$epwc_vw_vkry01_sww[UnitKode]',LemburTgljam1='$elembur_tgljam1_01',LemburTgljam2='$elembur_tgljam2_01' WHERE LemburID='$IDLBR01'");
		if($save_elembur_01){
			#echo $NF($upahlembur_fix);
			#echo"SUKSESS $IDMAIN";
			#echo"<br>";
			#include"../LAYOUT/NOTIF/NF_SAVE_SUCCESS.php";
			header("LOCATION:?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW02");
		}else{
			include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
		}
	}
    ?>