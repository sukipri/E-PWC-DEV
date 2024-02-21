
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
<br>

<div class="alert alert-dismissible alert-danger">
  
  <p class="mx-2"><i class="fas fa-file-alt"></i> Peng-entrian <b>Dinas Malam</b> dilakukan dengan memasukan tanggal yang sudah di otomatiskan sesuai jadwal yang sudah tetapkan di aplikasi presensi. Masukan tanggal lembur H+1 , misalkan lembur dilakukan tanggal <i>10</i> maka tanggal yang dimasukan tanggal setelahnya yaitu tanggal <i>11</i> </p>
</div>
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
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T01'>";
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
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T02'>";
                                            $sts_T02 = "ADA";
                                        }else{
                                            $sts_T02 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T02'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T03']=="M" OR $tj_ls_vjdw01_sww['T03']=="X" OR $tj_ls_vjdw01_sww['T03']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T03'>";
                                            $sts_T03 = "ADA";
                                        }else{
                                            $sts_T03 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T03'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T04']=="M" OR $tj_ls_vjdw01_sww['T04']=="X" OR $tj_ls_vjdw01_sww['T04']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T04'>";
                                            $sts_T04 = "ADA";
                                        }else{
                                            $sts_T04 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T04'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                        <?PHP 
                                        if($tj_ls_vjdw01_sww['T05']=="M" OR $tj_ls_vjdw01_sww['T05']=="X" OR $tj_ls_vjdw01_sww['T05']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T05'>";
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
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T06'>";
                                            $sts_T06 = "ADA";
                                        }else{
                                            $sts_T06 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T06'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T07']=="M" OR $tj_ls_vjdw01_sww['T07']=="X" OR $tj_ls_vjdw01_sww['T07']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T07'>";
                                            $sts_T07 = "ADA";
                                        }else{
                                            $sts_T07 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T07'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T08']=="M" OR $tj_ls_vjdw01_sww['T08']=="X" OR $tj_ls_vjdw01_sww['T08']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T08'>";
                                            $sts_T08 = "ADA";
                                        }else{
                                            $sts_T08 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T08'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                       if($tj_ls_vjdw01_sww['T09']=="M" OR $tj_ls_vjdw01_sww['T09']=="X" OR $tj_ls_vjdw01_sww['T09']=="Y" ){                                     
                                        echo"<input type='date' required class='form-control form-control' name='txt_tgl_T09'>";
                                        $sts_T09 = "ADA";
                                    }else{
                                        $sts_T09 = "NADA";
                                        echo $tj_ls_vjdw01_sww['T09'];
                                    }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T10']=="M" OR $tj_ls_vjdw01_sww['T10']=="X" OR $tj_ls_vjdw01_sww['T10']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T10'>";
                                            $sts_T10 = "ADA";
                                        }else{
                                            $sts_T10 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T10'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T11']=="M" OR $tj_ls_vjdw01_sww['T11']=="X" OR $tj_ls_vjdw01_sww['T11']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T11'>";
                                            $sts_T11 = "ADA";
                                        }else{
                                            $sts_T11 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T11'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T12']=="M" OR $tj_ls_vjdw01_sww['T12']=="X" OR $tj_ls_vjdw01_sww['T12']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T12'>";
                                            $sts_T12 = "ADA";
                                        }else{
                                            $sts_T12 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T12'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T13']=="M" OR $tj_ls_vjdw01_sww['T13']=="X" OR $tj_ls_vjdw01_sww['T13']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T13'>";
                                            $sts_T13 = "ADA";
                                        }else{
                                            $sts_T13 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T13'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T14']=="M" OR $tj_ls_vjdw01_sww['T14']=="X" OR $tj_ls_vjdw01_sww['T14']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T14'>";
                                            $sts_T14 = "ADA";
                                        }else{
                                            $sts_T14 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T14'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                       if($tj_ls_vjdw01_sww['T15']=="M" OR $tj_ls_vjdw01_sww['T15']=="X" OR $tj_ls_vjdw01_sww['T15']=="Y" ){                                     
                                        echo"<input type='date' required class='form-control form-control' name='txt_tgl_T15'>";
                                        $sts_T15 = "ADA";
                                    }else{
                                        $sts_T15 = "NADA";
                                        echo $tj_ls_vjdw01_sww['T15'];
                                    }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T16']=="M" OR $tj_ls_vjdw01_sww['T16']=="X" OR $tj_ls_vjdw01_sww['T16']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T16'>";
                                            $sts_T16 = "ADA";
                                        }else{
                                            $sts_T16 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T16'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T17']=="M" OR $tj_ls_vjdw01_sww['T17']=="X" OR $tj_ls_vjdw01_sww['T17']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T17'>";
                                            $sts_T17 = "ADA";
                                        }else{
                                            $sts_T17 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T17'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T18']=="M" OR $tj_ls_vjdw01_sww['T18']=="X" OR $tj_ls_vjdw01_sww['T18']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T18'>";
                                            $sts_T18 = "ADA";
                                        }else{
                                            $sts_T18 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T18'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T19']=="M" OR $tj_ls_vjdw01_sww['T19']=="X" OR $tj_ls_vjdw01_sww['T19']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T19'>";
                                            $sts_T19 = "ADA";
                                        }else{
                                            $sts_T19 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T19'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                        
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T20']=="M" OR $tj_ls_vjdw01_sww['T20']=="X" OR $tj_ls_vjdw01_sww['T20']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T20'>";
                                            $sts_T20 = "ADA";
                                        }else{
                                            $sts_T20 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T20'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T21']=="M" OR $tj_ls_vjdw01_sww['T21']=="X" OR $tj_ls_vjdw01_sww['T21']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T21'>";
                                            $sts_T21 = "ADA";
                                        }else{
                                            $sts_T21 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T21'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T22']=="M" OR $tj_ls_vjdw01_sww['T22']=="X" OR $tj_ls_vjdw01_sww['T22']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T22'>";
                                            $sts_T22 = "ADA";
                                        }else{
                                            $sts_T22 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T22'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T23']=="M" OR $tj_ls_vjdw01_sww['T23']=="X" OR $tj_ls_vjdw01_sww['T23']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T23'>";
                                            $sts_T23 = "ADA";
                                        }else{
                                            $sts_T23 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T23'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T24']=="M" OR $tj_ls_vjdw01_sww['T24']=="X" OR $tj_ls_vjdw01_sww['T24']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T24'>";
                                            $sts_T24 = "ADA";
                                        }else{
                                            $sts_T24 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T24'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T25']=="M" OR $tj_ls_vjdw01_sww['T25']=="X" OR $tj_ls_vjdw01_sww['T25']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T25'>";
                                            $sts_T25 = "ADA";
                                        }else{
                                            $sts_T25 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T25'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T26']=="M" OR $tj_ls_vjdw01_sww['T26']=="X" OR $tj_ls_vjdw01_sww['T26']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T26'>";
                                            $sts_T26 = "ADA";
                                        }else{
                                            $sts_T26 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T26'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T27']=="M" OR $tj_ls_vjdw01_sww['T27']=="X" OR $tj_ls_vjdw01_sww['T27']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T27'>";
                                            $sts_T27 = "ADA";
                                        }else{
                                            $sts_T27 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T27'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T28']=="M" OR $tj_ls_vjdw01_sww['T28']=="X" OR $tj_ls_vjdw01_sww['T28']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T28'>";
                                            $sts_T28 = "ADA";
                                        }else{
                                            $sts_T28 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T28'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T29']=="M" OR $tj_ls_vjdw01_sww['T29']=="X" OR $tj_ls_vjdw01_sww['T29']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T29'>";
                                            $sts_T29 = "ADA";
                                        }else{
                                            $sts_T29 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T29'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T30']=="M" OR $tj_ls_vjdw01_sww['T30']=="X" OR $tj_ls_vjdw01_sww['T30']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T30'>";
                                            $sts_T30 = "ADA";
                                        }else{
                                            $sts_T30 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T30'];
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        if($tj_ls_vjdw01_sww['T31']=="M" OR $tj_ls_vjdw01_sww['T31']=="X" OR $tj_ls_vjdw01_sww['T31']=="Y" ){                                     
                                            echo"<input type='date' required class='form-control form-control' name='txt_tgl_T31'>";
                                            $sts_T31 = "ADA";
                                        }else{
                                            $sts_T31 = "NADA";
                                            echo $tj_ls_vjdw01_sww['T31'];
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

                             if($sts_T01=="ADA"){     
                                $save_T01_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T01 00:00:00','100','$txt_tgl_T01 00:00:00','$txt_tgl_T01 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T01$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T01
                               # echo"MASUK";
                                    }else{
                                        echo"";
                                    }
                                    
                            if($sts_T02=="ADA"){     
                            $save_T02_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T02 00:00:00','100','$txt_tgl_T02 00:00:00','$txt_tgl_T02 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T02$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T02
                                       # echo"MASUK";
                             }else{
                                    echo"";
                            }

                            if($sts_T03=="ADA"){     
                             $save_T03_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T03 00:00:00','100','$txt_tgl_T03 00:00:00','$txt_tgl_T03 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T03$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T03
                                               # echo"MASUK";
                             }else{
                                echo"";
                             }

                            if($sts_T04=="ADA"){     
                            $save_T04_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T04 00:00:00','100','$txt_tgl_T04 00:00:00','$txt_tgl_T04 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T04$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T04
                                                       # echo"MASUK";
                             }else{
                                 echo"";
                             }
                            if($sts_T05=="ADA"){
                                                                #$save_lmalam_01  = "IKEEEH";
                              $save_T05_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T05 00:00:00','100','$txt_tgl_T05 00:00:00','$txt_tgl_T05 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T05$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T05
                                                                #echo"MASUK";
                                 }else{
                                     echo"";
                                    }
                            if($sts_T06=="ADA"){     
                             $save_T06_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T06 00:00:00','100','$txt_tgl_T06 00:00:00','$txt_tgl_T06 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T06$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T06
                                                                                  # echo"MASUK";
                                  }else{
                                     echo"";
                                      }

                          if($sts_T07=="ADA"){     
                             $save_T07_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T07 00:00:00','100','$txt_tgl_T07 00:00:00','$txt_tgl_T07 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T07$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T07
                                                                                                          # echo"MASUK";
                              }else{
                             echo"";
                             }
                              if($sts_T08=="ADA"){     
                             $save_T08_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T08 00:00:00','100','$txt_tgl_T08 00:00:00','$txt_tgl_T08 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T08$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T08
                                                                                                                                  # echo"MASUK";
                           }else{
                          echo"";
                           }
                            if($sts_T09=="ADA"){     
                            $save_T09_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T09 00:00:00','100','$txt_tgl_T09 00:00:00','$txt_tgl_T09 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T09$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T09
                                              # echo"MASUK";
                                                   }else{
                                                       echo"";
                                                   }
                            if($sts_T10=="ADA"){     
                             $save_T10_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T10 00:00:00','100','$txt_tgl_T10 00:00:00','$txt_tgl_T10 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T10$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T10
                               # echo"MASUK";
                                    }else{
                                        echo"";
                                    }
                            if($sts_T11=="ADA"){     
                            $save_T11_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T11 00:00:00','100','$txt_tgl_T11 00:00:00','$txt_tgl_T11 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T11$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T11
                               # echo"MASUK";
                                    }else{
                                        echo"";
                                    }
                           if($sts_T12=="ADA"){     
                             $save_T12_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T12 00:00:00','100','$txt_tgl_T12 00:00:00','$txt_tgl_T12 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T12$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T12
                               # echo"MASUK";
                                    }else{
                                        echo"";
                                    }
                            if($sts_T13=="ADA"){     
                          $save_T13_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T13 00:00:00','100','$txt_tgl_T13 00:00:00','$txt_tgl_T13 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T13$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T13
                               # echo"MASUK";
                                    }else{
                                        echo"";
                                    }
                            if($sts_T14=="ADA"){     
                           $save_T14_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T14 00:00:00','100','$txt_tgl_T14 00:00:00','$txt_tgl_T14 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T14$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T14
                               # echo"MASUK";
                                    }else{
                                        echo"";
                                    }
                          if($sts_T15=="ADA"){     
                             $save_T15_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T15 00:00:00','100','$txt_tgl_T15 00:00:00','$txt_tgl_T15 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T15$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T15
                               # echo"MASUK";
                                    }else{
                                        echo"";
                                    }
                            if($sts_T16=="ADA"){     
                            $save_T16_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T16 00:00:00','100','$txt_tgl_T16 00:00:00','$txt_tgl_T16 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T16$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T16
                               # echo"MASUK";
                                    }else{
                                        echo"";
                                    }

                            if($sts_T17=="ADA"){     
                            $save_T17_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T17 00:00:00','100','$txt_tgl_T17 00:00:00','$txt_tgl_T17 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T17$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T17
                               # echo"MASUK";
                                    }else{
                                        echo"";
                                    }
                             if($sts_T18=="ADA"){     
                            $save_T18_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T18 00:00:00','100','$txt_tgl_T18 00:00:00','$txt_tgl_T18 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T18$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T18
                               # echo"MASUK";
                                    }else{
                                        echo"";
                                    }
                            if($sts_T19=="ADA"){     
                             $save_T19_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T19 00:00:00','100','$txt_tgl_T19 00:00:00','$txt_tgl_T19 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T19$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T19
                               # echo"MASUK";
                                 }else{
                                   echo"";
                               }
                            if($sts_T20=="ADA"){     
                            $save_T20_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T20 00:00:00','100','$txt_tgl_T20 00:00:00','$txt_tgl_T20 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T20$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T20
                                                  # echo"MASUK";
                            }else{
                             echo"";
                                }
                            if($sts_T21=="ADA"){     
                            $save_T21_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T21 00:00:00','100','$txt_tgl_T21 00:00:00','$txt_tgl_T21 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T21$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T21
                               # echo"MASUK";
                                    }else{
                                        echo"";
                                    }
                            if($sts_T22=="ADA"){     
                         $save_T22_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T22 00:00:00','100','$txt_tgl_T22 00:00:00','$txt_tgl_T22 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T22$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T22
                               # echo"MASUK";
                                    }else{
                                        echo"";
                                    }
                         if($sts_T23=="ADA"){     
                           $save_T23_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T23 00:00:00','100','$txt_tgl_T23 00:00:00','$txt_tgl_T23 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T23$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T23
                               # echo"MASUK";
                                    }else{
                                        echo"";
                                    }
                         if($sts_T24=="ADA"){     
                         $save_T24_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T24 00:00:00','100','$txt_tgl_T24 00:00:00','$txt_tgl_T24 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T24$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T24
                               # echo"MASUK";
                                    }else{
                                        echo"";
                                    }
                            if($sts_T25=="ADA"){     
                         $save_T25_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T25 00:00:00','100','$txt_tgl_T25 00:00:00','$txt_tgl_T25 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T25$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T25
                               # echo"MASUK";
                                    }else{
                                        echo"";
                                    }
                        if($sts_T26=="ADA"){     
                          $save_T26_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T26 00:00:00','100','$txt_tgl_T26 00:00:00','$txt_tgl_T26 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T26$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T26
                               # echo"MASUK";
                                    }else{
                                        echo"";
                                    }
                            if($sts_T27=="ADA"){     
                          $save_T27_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T27 00:00:00','100','$txt_tgl_T27 00:00:00','$txt_tgl_T27 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T27$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T27
                               # echo"MASUK";
                                    }else{
                                        echo"";
                                    }
                            if($sts_T28=="ADA"){     
                           $save_T28_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T28 00:00:00','100','$txt_tgl_T28 00:00:00','$txt_tgl_T28 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T28$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T28
                               # echo"MASUK";
                                    }else{
                                        echo"";
                                    }
                            if($sts_T29=="ADA"){     
                           $save_T29_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T29 00:00:00','100','$txt_tgl_T29 00:00:00','$txt_tgl_T29 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T29$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T29
                               # echo"MASUK";
                                    }else{
                                        echo"";
                                    }
                            if($sts_T30=="ADA"){     
                          $save_T30_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T30 00:00:00','100','$txt_tgl_T30 00:00:00','$txt_tgl_T30 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T30$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T30
                               # echo"MASUK";
                                    }else{
                                        echo"";
                                    }
                            if($sts_T31=="ADA"){     
                          $save_T31_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]','$IDKRY','$txt_tgl_T31 00:00:00','100','$txt_tgl_T31 00:00:00','$txt_tgl_T31 00:00:00','3','$upahlembur_fix','$ket_lembur','$ket_lembur','$ket_lembur','$ket_lembur','2','T31$IDMAIN','$epwc_vkry01_sww[KaryDir]','DM','$epwc_vkry01_sww[KaryNomor]')"); #T31
                               # echo"MASUK";
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