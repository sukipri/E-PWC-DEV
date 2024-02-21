 <?PHP #VARIABLE T01
                                $txt_tgl_T01 = @$_POST['txt_tgl_T01']; 
                                #VARIABLE T02
                                $txt_tgl_T02 = @$_POST['txt_tgl_T02']; 
                                #VARIABLE T03
                                $txt_tgl_T03 = @$_POST['txt_tgl_T03']; 
                                #VARIABLE T04
                                $txt_tgl_T04 = @$_POST['txt_tgl_T04']; 
                               #VARIABLE T05
                               $txt_tgl_T05 = @$_POST['txt_tgl_T05']; 
                               #VARIABLE T06
                               $txt_tgl_T06 = @$_POST['txt_tgl_T06']; 
                               #VARIABLE T07
                               $txt_tgl_T07 = @$_POST['txt_tgl_T07']; 
                               #VARIABLE T08
                               $txt_tgl_T08 = @$_POST['txt_tgl_T08']; 
                               #VARIABLE T09
                               $txt_tgl_T09 = @$_POST['txt_tgl_T09']; 
                               #VARIABLE T10
                               $txt_tgl_T10 = @$_POST['txt_tgl_T10']; 
                               #VARIABLE T11
                               $txt_tgl_T11 = @$_POST['txt_tgl_T11']; 
                               #VARIABLE T12
                               $txt_tgl_T12 = @$_POST['txt_tgl_T12']; 
                               #VARIABLE T13
                               $txt_tgl_T13 = @$_POST['txt_tgl_T13']; 
                               #VARIABLE T14
                               $txt_tgl_T14 = @$_POST['txt_tgl_T14']; 
                               #VARIABLE T15
                               $txt_tgl_T15 = @$_POST['txt_tgl_T15']; 
                               #VARIABLE T16
                               $txt_tgl_T16 = @$_POST['txt_tgl_T16']; 
                               #VARIABLE T17
                               $txt_tgl_T17 = @$_POST['txt_tgl_T17']; 
                               #VARIABLE T18
                               $txt_tgl_T18 = @$_POST['txt_tgl_T18']; 
                               #VARIABLE T19
                               $txt_tgl_T19 = @$_POST['txt_tgl_T19']; 
                               #VARIABLE T20
                               $txt_tgl_T20 = @$_POST['txt_tgl_T20']; 
                               #VARIABLE T21
                               $txt_tgl_T21 = @$_POST['txt_tgl_T21']; 
                               #VARIABLE T22
                               $txt_tgl_T22 = @$_POST['txt_tgl_T22']; 
                               #VARIABLE T23
                               $txt_tgl_T23 = @$_POST['txt_tgl_T23']; 
                               #VARIABLE T24
                               $txt_tgl_T24 = @$_POST['txt_tgl_T24']; 
                               #VARIABLE T25
                               $txt_tgl_T25 = @$_POST['txt_tgl_T25']; 
                               #VARIABLE T26
                               $txt_tgl_T26 = @$_POST['txt_tgl_T26']; 
                               #VARIABLE T27
                               $txt_tgl_T27 = @$_POST['txt_tgl_T27']; 
                               #VARIABLE T28
                               $txt_tgl_T28 = @$_POST['txt_tgl_T28']; 
                               #VARIABLE T29
                               $txt_tgl_T29 = @$_POST['txt_tgl_T29']; 
                               #VARIABLE T30
                               $txt_tgl_T30 = @$_POST['txt_tgl_T30']; 
                               #VARIABLE T31
                               $txt_tgl_T31 = @$_POST['txt_tgl_T31']; 

                               if(isset($_POST['btn_simpan_IN02MLM_01'])){ #PROCCESSING
                                $save_lmalam_01  = "IKEEEH";

                                $save_T01_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T01 00:00:00','100','$txt_tgl_T01 00:00:00','$txt_tgl_T01 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T01$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T01
                                $save_T02_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T02 00:00:00','100','$txt_tgl_T02 00:00:00','$txt_tgl_T02 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T02$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T02
                                $save_T03_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T03 00:00:00','100','$txt_tgl_T03 00:00:00','$txt_tgl_T03 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T03$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T03
                                $save_T04_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T04 00:00:00','100','$txt_tgl_T04 00:00:00','$txt_tgl_T04 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T04$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T04

                                   $save_T05_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T05 00:00:00','100','$txt_tgl_T05 00:00:00','$txt_tgl_T05 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T05$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T05

                                   $save_T06_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T06 00:00:00','100','$txt_tgl_T06 00:00:00','$txt_tgl_T06 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T06$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T06
                                   $save_T07_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T07 00:00:00','100','$txt_tgl_T07 00:00:00','$txt_tgl_T07 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T07$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T07
                                   $save_T08_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T08 00:00:00','100','$txt_tgl_T08 00:00:00','$txt_tgl_T08 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T08$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T08


                                   if($save_lmalam_01){
                                       #echo $txt_tgl_T05;
                                       include"../LAYOUT/NOTIF/NF_SAVE_SUCCESS.php";
                                       #header("LOCATION:?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW02");
                                   }else{
                                       echo"GAGAL";
                                   }

                                   

                               }

                               ?>