<?PHP 
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
    <?PHP 
        #echo "$epwc_vw_vkry01_sww[GajiUP1Yakkum]";
    ?>
    
<div class="card border-primary mb-3 mx-2" style="max-width: 35rem;">
  <div class="card-header">FORM LEMBUR RADIOLOGI</div>
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
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Jumlah Penanganan</span>
        <input type="text" class="form-control" autocomplete="off" name="elembur_jmlpen_01" autocomplete value="<?PHP echo $epwc_vw_vlmbr01_sww['LemburJmlRad'] ?>" style="max-width:12rem;">
    </div> 
    <!-- <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Jumlah Jam</span>
        <input type="text" class="form-control" autocomplete="off" name="elembur_jmljam_01" autocomplete value="<?PHP #echo $epwc_vw_vlmbr01_sww['LemburBiasa'] ?>" style="max-width:12rem;">
        <span class="input-group-text" id="basic-addon1">for Halftime ex: 1.5</span>
    </div>  -->

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Pemeriksaan</span>
       <textarea class="form-control" name="elembur_ur_01"><?PHP echo $epwc_vw_vlmbr01_sww['LemburUraian'] ?></textarea>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Uraian</span>
        <textarea class="form-control" name="elembur_al_01"><?PHP echo $epwc_vw_vlmbr01_sww['LemburAlasan'] ?></textarea>
    </div>

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
                <li>Isikan setiap memberikan lembur</li>
                <li>Untuk perhitungan halftime ex: 1.5 jam . u/ perhitungan jumlah jam gunakan tanda (.) = titik untuk pengganti tanda (,) = Koma 
    </li>    
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
		#$elembur_jenis_01 = @$SQL_SL($_POST['elembur_jenis_01']); 
        $elembur_jmlpen_01 = @$SQL_SL($_POST['elembur_jmlpen_01']);
		$elembur_jmljam_01 = @$SQL_SL($_POST['elembur_jmljam_01']);
		$elembur_ur_01 = @$SQL_SL($_POST['elembur_ur_01']);
		$elembur_al_01 = @$SQL_SL($_POST['elembur_al_01']);
		$elembur_tar_01 = @$SQL_SL($_POST['elembur_tar_01']);
		$elembur_has_01 = @$SQL_SL($_POST['elembur_has_01']);
        #JOIN DATA
        $add_one = "01";
        $add_bulan = (int)$elembur_bulan_01 + $add_one;
        $add_sp =  sprintf("%'.02d\n",$add_bulan);
        $elembur_thnbln_01 = "$DATE_Y$add_sp";
        $elembur_thnbln_02 = "$elembur_lemtgl_0102$elembur_bulan_01";
                    
            #KALKULASI Lembur RAD
            $rad_kal_jam_vupah01_sw = $elembur_jmlpen_01 * 30 / 60;
            $rad_kal_vupah01_sw = $elembur_jmlpen_01 * 22000;
			$upahlembur_fix =   $rad_kal_vupah01_sw;
		
		if(isset($_POST['simpan_elembur_in02'])){ #PROCCESSING INSERT
			

			#PROCCESSING INSERT
			$save_elembur_01 = @$CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader,UnitKode,LemburTglInput,LemburJmlRad)VALUES('$elembur_thnbln_01','$elembur_thnbln_02','$IDKRY','$elembur_lemtgl_01 00:00:00','100','$elembur_lemtgl_01 00:00:00','$elembur_lemtgl_01 00:00:00','$rad_kal_jam_vupah01_sw','$upahlembur_fix','$elembur_ur_01','$elembur_al_01','$elembur_tar_01','$elembur_has_01','2','$IDMAIN','$epwc_vkry01_sww[KaryDir]','RAD','$IDUPLOADER','$epwc_vw_vkry01_sww[UnitKode]','$DATE_HTML5_SQL','$elembur_jmlpen_01')");
			if($save_elembur_01){
				include"../LAYOUT/NOTIF/NF_SAVE_SUCCESS.php";
				#header("LOCATION:?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW02");
			}else{
				include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
			}
		}
        
        if(isset($_POST['update_elembur_in02'])){ #PROCCESSING UPDATE

           #$upahlembur_rev02 =  $upahlembur_rev01 + ($elembur_jmljam_01 - 1) * 2 * $upahlembur_02;

           #PROCCESSING INSERT
           $update_elembur_01 = @$CL_Q("$UP  Citarum.dbo.TKaryLemburHari SET LemburBulan='$elembur_thnbln_01',LemburBulanRng='$elembur_thnbln_02',KaryNomor='$IDKRY',LemburTanggal='$elembur_lemtgl_01 00:00:00',LemburPersen='100',LemburJam1='$elembur_lemtgl_01 00:00:00',LemburJam2='$elembur_lemtgl_01 00:00:00',LemburBiasa='$rad_kal_jam_vupah01_sw',LemburBiasaJumlah='$upahlembur_fix',LemburUraian='$elembur_ur_01',LemburAlasan='$elembur_al_01',LemburTarget='$elembur_tar_01',LemburHasil='$elembur_has_01',KaryDir='$epwc_vkry01_sww[KaryDir]',UnitKode='$epwc_vw_vkry01_sww[UnitKode]',LemburJmlRad='$elembur_jmlpen_01' WHERE LemburID='$IDLBR01'");
           if($update_elembur_01){
               #include"../LAYOUT/NOTIF/NF_SAVE_SUCCESS.php";
               header("LOCATION:?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW02");
           }else{
               include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
           }
       }

		
    ?>