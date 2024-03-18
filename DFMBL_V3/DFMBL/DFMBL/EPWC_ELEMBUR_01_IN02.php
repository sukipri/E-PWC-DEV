<?PHP 
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
    </div>

     <!--  -->
   <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Jenis Lembur</span>
        <!-- <input type="number" class="form-control" name="elembur_lemtgl_01" required> -->
        <select name="elembur_jenis_01" class="form-control" required>
       
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
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Jumlah Jam</span>
        <input type="text" class="form-control" autocomplete="off" name="elembur_jmljam_01" autocomplete value="<?PHP echo $epwc_vw_vlmbr01_sww['LemburBiasa'] ?>" style="max-width:12rem;">
        <span class="input-group-text" id="basic-addon1">for Halftime ex: 1.5</span>
    </div> 
    <?PHP 
        if($epwc_vkry01_sww['KaryNomorYakkum']=="04950490"){ ?>
        <div class="input-group mb-3">
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
            </div>
     <?PHP }else{ ?>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Uraian</span>
       <textarea class="form-control" name="elembur_ur_01"><?PHP echo $epwc_vw_vlmbr01_sww['LemburUraian'] ?></textarea>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Alasan</span>
        <textarea class="form-control" name="elembur_al_01"><?PHP echo $epwc_vw_vlmbr01_sww['LemburAlasan'] ?></textarea>
    </div>
        <?PHP } ?>
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
		$elembur_jenis_01 = @$SQL_SL($_POST['elembur_jenis_01']);
		$elembur_jmljam_01 = @$SQL_SL($_POST['elembur_jmljam_01']);
		$elembur_ur_01 = @$SQL_SL($_POST['elembur_ur_01']);
		$elembur_al_01 = @$SQL_SL($_POST['elembur_al_01']);
		$elembur_tar_01 = @$SQL_SL($_POST['elembur_tar_01']);
		$elembur_has_01 = @$SQL_SL($_POST['elembur_has_01']);
        
		#PROCCESSING INSERT
		if(isset($_POST['simpan_elembur_in02'])){
				#JOIN DATA
                    $add_one = "01";
                    $add_bulan = (int)$elembur_bulan_01 + $add_one;
                    $add_sp =  sprintf("%'.02d\n",$add_bulan);
					$elembur_thnbln_01 = "$DATE_Y$add_sp";
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
			#PROCCESSING INSERT
			$save_elembur_01 = @$CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader,UnitKode)VALUES('$elembur_thnbln_01','$elembur_thnbln_02','$IDKRY','$elembur_lemtgl_01 00:00:00','100','$elembur_lemtgl_01 00:00:00','$elembur_lemtgl_01 00:00:00','$elembur_jmljam_01','$upahlembur_fix','$elembur_ur_01','$elembur_al_01','$elembur_tar_01','$elembur_has_01','2','$IDMAIN','$epwc_vkry01_sww[KaryDir]','$elembur_jenis_01','$epwc_vkry01_sww[KaryNomor]','$epwc_vw_vkry01_sww[UnitKode]')");
			if($save_elembur_01){
				include"../LAYOUT/NOTIF/NF_SAVE_SUCCESS.php";
				#header("LOCATION:?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW02");
			}else{
				include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
			}
		}

		#PROCCESSING UPDATE
		if(isset($_POST['update_elembur_in02'])){		
			#JOIN DATA
				$elembur_thnbln_01 = "$DATE_Y$DATE_m";
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
		$save_elembur_01 = @$CL_Q("$UP  Citarum.dbo.TKaryLemburHari SET LemburBulan='$elembur_thnbln_01',LemburBulanRng='$elembur_thnbln_02',KaryNomor='$IDKRY',LemburTanggal='$elembur_lemtgl_01 00:00:00',LemburPersen='100',LemburJam1='$elembur_lemtgl_01 00:00:00',LemburJam2='$elembur_lemtgl_01 00:00:00',LemburBiasa='$elembur_jmljam_01',LemburBiasaJumlah='$upahlembur_fix',LemburUraian='$elembur_ur_01',LemburAlasan='$elembur_al_01',LemburTarget='$elembur_tar_01',LemburHasil='$elembur_has_01',KaryDir='$epwc_vkry01_sww[KaryDir]',UnitKode='$epwc_vw_vkry01_sww[UnitKode]' WHERE LemburID='$IDLBR01'");
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