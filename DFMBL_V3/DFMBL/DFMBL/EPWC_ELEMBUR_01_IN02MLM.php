
    <?PHP 
                                 $epwc_sub_vkry01_sw = substr($IDKRY,1);
                                #DATA KALKULASI LEMBUR
                                $tj_ls_vjdw01_sw = $CL_Q("$CL_SL TJ_Main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw'  order by Bulan Desc");
                                $tj_ls_vjdw01_sww = $CL_FAS($tj_ls_vjdw01_sw); #M X Y
                                $epwc_bulan_jdw = substr( $tj_ls_vjdw01_sww['Bulan'],4);

                                $upahlembur = $epwc_vw_vkry01_sww['GajiUP1Yakkum'] + $epwc_vw_vkry01_sww['GajiUP2Yakkum'] + $epwc_vw_vkry01_sww['GajiKlgYakkum'] + $epwc_vw_vkry01_sww['GajiTunjKinerjaMinYakkum'] + $epwc_vw_vkry01_sww['GajiInsentifRadYakkum'] + $epwc_vw_vkry01_sww['GajiInsentifProgYakkum'] + $epwc_vw_vkry01_sww['GajiTunjPeralihanYakkum'] ; #Upah Lembur 02
                                  // $hit_new_lem_01 = ($elembur_jmljam_01 * 2) / 0.5;
                                  $upahlembur_02 = $upahlembur / 173 ; #Upah lembur 02
                                  $upahlembur_var_rev01 = 1.5;
                                  $upahlembur_rev01 =  $upahlembur_var_rev01 * $upahlembur_02 ;
                                  $upahlembur_rev02 =  $upahlembur_rev01 + ( 3 - 1) * 2 * $upahlembur_02;      
                                  $upahlembur_fix =  $upahlembur_rev02;                          
                                #VARIABLE KAL
                                $ket_lembur = "Dinas Malam";
                            
    ?>
<span class="mx-2"><b>Daftar Approvement Lembur Malam <?PHP echo "<span class='badge bg-info'>".$epwc_vw_vkry01_sww['KaryNama']."</span>"; ?> </b></span>
<hr>
<form method="post">
<table class="table table-sm table-striped table-bordered">
          <tr class="table-dark">
                                    <td>Bulan</td>
                                     <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>7</td>
                                    <td>8</td>
                                    <td>9</td>
                                    <td>10</td>
                                    <td>11</td>
                                    <td>12</td>
                                    <td>13</td>
                                    <td>14</td>
                                    <td>15</td>
                                    <td>16</td>
                                    <td>17</td>
                                    <td>18</td>
                                    <td>19</td>
                                    <td>20</td>
                                    <td>21</td>
                                    <td>22</td>
                                    <td>23</td>
                                    <td>24</td>
                                    <td>25</td>
                                    <td>26</td>
                                    <td>27</td>
                                    <td>28</td>
                                    <td>29</td>
                                    <td>30</td>
                                    <td>31</td>
          </tr>
                            
          <tr>
                                    <td><?PHP echo $tj_ls_vjdw01_sww['Bulan'] ?></td>
                                     <td><?PHP
                                      if($tj_ls_vjdw01_sww['T01']=="M" OR $tj_ls_vjdw01_sww['T01']=="X" OR $tj_ls_vjdw01_sww['T01']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T01'>";
                                            $sts_T01 = "ADA";
                                        }else{
                                            $sts_T01 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T01'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                        
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T02']=="M" OR $tj_ls_vjdw01_sww['T02']=="X" OR $tj_ls_vjdw01_sww['T02']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T02'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T02'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T03']=="M" OR $tj_ls_vjdw01_sww['T03']=="X" OR $tj_ls_vjdw01_sww['T03']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T03'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T03'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T04']=="M" OR $tj_ls_vjdw01_sww['T04']=="X" OR $tj_ls_vjdw01_sww['T04']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T04'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T04'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                        <?PHP 
                                        if($tj_ls_vjdw01_sww['T05']=="M" OR $tj_ls_vjdw01_sww['T05']=="X" OR $tj_ls_vjdw01_sww['T05']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T05'>";
                                            $sts_T05 = "ADA";
                                        }else{
                                            $sts_T05 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T05'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T06']=="M" OR $tj_ls_vjdw01_sww['T05']=="X" OR $tj_ls_vjdw01_sww['T06']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T06'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T06'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T07']=="M" OR $tj_ls_vjdw01_sww['T07']=="X" OR $tj_ls_vjdw01_sww['T07']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T07'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T07'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T08']=="M" OR $tj_ls_vjdw01_sww['T08']=="X" OR $tj_ls_vjdw01_sww['T08']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T08'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T08'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                       if($tj_ls_vjdw01_sww['T09']=="M" OR $tj_ls_vjdw01_sww['T09']=="X" OR $tj_ls_vjdw01_sww['T09']=="Y" ){                                     
                                        echo"<input type='date' name='txt_tgl_T09'>";
                                    }else{
                                        echo $tj_ls_vjdw01_sww['T09'] ;
                                    }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T10']=="M" OR $tj_ls_vjdw01_sww['T10']=="X" OR $tj_ls_vjdw01_sww['T10']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T10'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T10'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T11']=="M" OR $tj_ls_vjdw01_sww['T11']=="X" OR $tj_ls_vjdw01_sww['T11']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T11'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T11'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T12']=="M" OR $tj_ls_vjdw01_sww['T12']=="X" OR $tj_ls_vjdw01_sww['T12']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T12'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T12'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T13']=="M" OR $tj_ls_vjdw01_sww['T13']=="X" OR $tj_ls_vjdw01_sww['T13']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T13'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T13'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T14']=="M" OR $tj_ls_vjdw01_sww['T14']=="X" OR $tj_ls_vjdw01_sww['T14']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T14'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T14'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                       if($tj_ls_vjdw01_sww['T15']=="M" OR $tj_ls_vjdw01_sww['T15']=="X" OR $tj_ls_vjdw01_sww['T15']=="Y" ){                                     
                                        echo"<input type='date' name='txt_tgl_T15'>";
                                    }else{
                                        echo $tj_ls_vjdw01_sww['T15'] ;
                                    }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T16']=="M" OR $tj_ls_vjdw01_sww['T16']=="X" OR $tj_ls_vjdw01_sww['T16']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T16'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T16'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T17']=="M" OR $tj_ls_vjdw01_sww['T17']=="X" OR $tj_ls_vjdw01_sww['T17']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T17'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T17'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T18']=="M" OR $tj_ls_vjdw01_sww['T18']=="X" OR $tj_ls_vjdw01_sww['T18']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T18'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T18'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T19']=="M" OR $tj_ls_vjdw01_sww['T19']=="X" OR $tj_ls_vjdw01_sww['T19']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T19'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T19'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                        
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T20']=="M" OR $tj_ls_vjdw01_sww['T20']=="X" OR $tj_ls_vjdw01_sww['T20']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T20'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T20'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T21']=="M" OR $tj_ls_vjdw01_sww['T21']=="X" OR $tj_ls_vjdw01_sww['T21']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T21'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T21'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T22']=="M" OR $tj_ls_vjdw01_sww['T22']=="X" OR $tj_ls_vjdw01_sww['T22']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T22'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T22'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T23']=="M" OR $tj_ls_vjdw01_sww['T23']=="X" OR $tj_ls_vjdw01_sww['T23']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T23'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T23'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T24']=="M" OR $tj_ls_vjdw01_sww['T24']=="X" OR $tj_ls_vjdw01_sww['T24']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T24'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T24'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T25']=="M" OR $tj_ls_vjdw01_sww['T25']=="X" OR $tj_ls_vjdw01_sww['T25']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T25'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T25'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T26']=="M" OR $tj_ls_vjdw01_sww['T26']=="X" OR $tj_ls_vjdw01_sww['T26']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T26'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T26'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T27']=="M" OR $tj_ls_vjdw01_sww['T27']=="X" OR $tj_ls_vjdw01_sww['T27']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T27'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T27'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T28']=="M" OR $tj_ls_vjdw01_sww['T28']=="X" OR $tj_ls_vjdw01_sww['T28']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T28'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T28'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T29']=="M" OR $tj_ls_vjdw01_sww['T29']=="X" OR $tj_ls_vjdw01_sww['T29']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T29'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T29'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T30']=="M" OR $tj_ls_vjdw01_sww['T30']=="X" OR $tj_ls_vjdw01_sww['T30']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T30'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T30'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T31']=="M" OR $tj_ls_vjdw01_sww['T31']=="X" OR $tj_ls_vjdw01_sww['T31']=="Y" ){                                     
                                            echo"<input type='date' name='txt_tgl_T31'>";
                                        }else{
                                            echo $tj_ls_vjdw01_sww['T31'] ;
                                        }
                                     ?>
                                     </td>
          </tr>

         </table>
                                        <button class="btn btn-success btn-sm mx-2" name="btn_simpan_IN02MLM_01">SIMPAN DATA</button>
                                    </form>
                                    <!--  -->
                        <?PHP 
                                #VARIABLE T01
                                $txt_tgl_T01 = @$_POST['txt_tgl_T01']; 
                                 #VARIABLE T05
                                 $txt_tgl_T05 = @$_POST['txt_tgl_T05']; 

                               if(isset($_POST['btn_simpan_IN02MLM_01'])){ #PROCCESSING
                                $save_lmalam_01  = "IKEEEH";

                                 if($sts_T01=="ADA"){
                                            
                                $save_T01_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T01 00:00:00','100','$txt_tgl_T01 00:00:00','$txt_tgl_T01 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T01$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T01
                                echo"MASUK";
                                    }else{
                                        echo"";
                                    }

                                    if($sts_T05=="ADA"){
                                        #$save_lmalam_01  = "IKEEEH";
                                        $save_T05_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T05 00:00:00','100','$txt_tgl_T05 00:00:00','$txt_tgl_T05 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T05$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T05
                                        echo"MASUK";
                                }else{
                                    echo"";
                                }

                                   if($save_lmalam_01){
                                       #echo $txt_tgl_T05;
                                       include"../LAYOUT/NOTIF/NF_SAVE_SUCCESS.php";
                                       #header("LOCATION:?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW02");
                                   }else{
                                       echo"GAGAL";
                                   }

                                   

                               }
                        ?>