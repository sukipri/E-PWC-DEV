
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
                                            
                                            #echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T01']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T01' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T01' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T01' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T01' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T01' value='Terselesaikan'>";
                                            echo"<input type='date' name='txt_tgl_T01'>";
                                            echo"<input type='hidden' name='txt_nom_T01' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T01'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                        
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T02']=="M" OR $tj_ls_vjdw01_sww['T02']=="X" OR $tj_ls_vjdw01_sww['T02']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T02']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T02' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T02' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T02' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T02' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T02' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T02' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T02'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T03']=="M" OR $tj_ls_vjdw01_sww['T03']=="X" OR $tj_ls_vjdw01_sww['T03']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T03']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T03' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T03' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T03' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T03' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T03' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T03' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T03'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T04']=="M" OR $tj_ls_vjdw01_sww['T04']=="X" OR $tj_ls_vjdw01_sww['T04']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T04']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T04' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T04' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T04' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T04' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T04' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T04' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T04'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                        <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T05']=="M" OR $tj_ls_vjdw01_sww['T05']=="X" OR $tj_ls_vjdw01_sww['T05']=="Y" ){
                                           
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T05']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T05' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T05' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T05' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T05' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T05' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T05' value=' $upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T05'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                        
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T06']=="M" OR $tj_ls_vjdw01_sww['T06']=="X" OR $tj_ls_vjdw01_sww['T06']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T06']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T06' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T06' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T06' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T06' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T06' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T06' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T06'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T07']=="M" OR $tj_ls_vjdw01_sww['T07']=="X" OR $tj_ls_vjdw01_sww['T07']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T07']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T07' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T07' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T07' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T07' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T07' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T07' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T07'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T08']=="M" OR $tj_ls_vjdw01_sww['T08']=="X" OR $tj_ls_vjdw01_sww['T08']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T08']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T08' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T08' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T08' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T08' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T08' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T08' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T08'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T09']=="M" OR $tj_ls_vjdw01_sww['T09']=="X" OR $tj_ls_vjdw01_sww['T09']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T09']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T09' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T09' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T09' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T09' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T09' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T09' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T09'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T10']=="M" OR $tj_ls_vjdw01_sww['T10']=="X" OR $tj_ls_vjdw01_sww['T10']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T10']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T10' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T10' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T10' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T10' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T10' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T10' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T10'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T11']=="M" OR $tj_ls_vjdw01_sww['T11']=="X" OR $tj_ls_vjdw01_sww['T11']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T11']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T11' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T11' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T11' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T11' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T11' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T11' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T11'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T12']=="M" OR $tj_ls_vjdw01_sww['T12']=="X" OR $tj_ls_vjdw01_sww['T12']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T12']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T12' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T12' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T12' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T12' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T12' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T12' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T12'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T13']=="M" OR $tj_ls_vjdw01_sww['T13']=="X" OR $tj_ls_vjdw01_sww['T13']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T13']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T13' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T13' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T13' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T13' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T13' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T13' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T13'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T14']=="M" OR $tj_ls_vjdw01_sww['T14']=="X" OR $tj_ls_vjdw01_sww['T14']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T14']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T14' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T14' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T14' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T14' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T14' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T14' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T14'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T15']=="M" OR $tj_ls_vjdw01_sww['T15']=="X" OR $tj_ls_vjdw01_sww['T15']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T15']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T15' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T15' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T15' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T15' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T15' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T15' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T15'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T16']=="M" OR $tj_ls_vjdw01_sww['T16']=="X" OR $tj_ls_vjdw01_sww['T16']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T16']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T16' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T16' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T16' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T16' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T16' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T16' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T16'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T17']=="M" OR $tj_ls_vjdw01_sww['T17']=="X" OR $tj_ls_vjdw01_sww['T17']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T17']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T17' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T17' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T17' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T17' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T17' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T17' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T17'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T18']=="M" OR $tj_ls_vjdw01_sww['T18']=="X" OR $tj_ls_vjdw01_sww['T18']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T18']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T18' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T18' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T18' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T18' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T18' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T18' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T18'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T19']=="M" OR $tj_ls_vjdw01_sww['T19']=="X" OR $tj_ls_vjdw01_sww['T19']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T19']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T19' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T19' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T19' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T19' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T19' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T19' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T19'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                        
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T20']=="M" OR $tj_ls_vjdw01_sww['T20']=="X" OR $tj_ls_vjdw01_sww['T20']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T20']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T20' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T20' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T20' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T20' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T20' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T20' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T20'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T21']=="M" OR $tj_ls_vjdw01_sww['T21']=="X" OR $tj_ls_vjdw01_sww['T21']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T21']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T21' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T21' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T21' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T21' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T21' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T21' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T21'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T22']=="M" OR $tj_ls_vjdw01_sww['T22']=="X" OR $tj_ls_vjdw01_sww['T22']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T22']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T22' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T22' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T22' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T22' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T22' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T22' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T22'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T23']=="M" OR $tj_ls_vjdw01_sww['T23']=="X" OR $tj_ls_vjdw01_sww['T23']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T23']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T23' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T23' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T23' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T23' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T23' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T23' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T23'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T24']=="M" OR $tj_ls_vjdw01_sww['T24']=="X" OR $tj_ls_vjdw01_sww['T24']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T24']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T24' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T24' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T24' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T24' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T24' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T24' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T24'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T25']=="M" OR $tj_ls_vjdw01_sww['T25']=="X" OR $tj_ls_vjdw01_sww['T25']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T25']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T25' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T25' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T25' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T25' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T25' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T25' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T25'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T26']=="M" OR $tj_ls_vjdw01_sww['T26']=="X" OR $tj_ls_vjdw01_sww['T26']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T26']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T26' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T26' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T26' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T26' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T26' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T26' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T26'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T27']=="M" OR $tj_ls_vjdw01_sww['T27']=="X" OR $tj_ls_vjdw01_sww['T27']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T27']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T27' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T27' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T27' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T27' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T27' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T27' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T27'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T28']=="M" OR $tj_ls_vjdw01_sww['T28']=="X" OR $tj_ls_vjdw01_sww['T28']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T28']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T28' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T28' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T28' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T28' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T28' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T28' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T28'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T29']=="M" OR $tj_ls_vjdw01_sww['T29']=="X" OR $tj_ls_vjdw01_sww['T29']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T29']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T29' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T29' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T29' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T29' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T29' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T29' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T29'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T30']=="M" OR $tj_ls_vjdw01_sww['T30']=="X" OR $tj_ls_vjdw01_sww['T30']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T30']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T30' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T30' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T30' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T30' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T30' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T30' value='$upahlembur_fix'>";

                                        }else{
                                            echo $tj_ls_vjdw01_sww['T30'] ;
                                        }
                                     ?>
                                     </td>
                                     <td>
                                     <?PHP 
                                        
                                        if($tj_ls_vjdw01_sww['T31']=="M" OR $tj_ls_vjdw01_sww['T31']=="X" OR $tj_ls_vjdw01_sww['T31']=="Y" ){
                                            
                                            echo "<span class='badge bg-dark'>".$tj_ls_vjdw01_sww['T31']."</span>" ;
                                            echo"<input type='hidden' name='txt_jam_T31' value='3'>";
                                            echo"<input type='hidden' name='txt_ur_T31' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_al_T31' value='Dinas Malam'>";
                                            echo"<input type='hidden' name='txt_tar_T31' value='Harus Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_has_T31' value='Terselesaikan'>";
                                            echo"<input type='hidden' name='txt_nom_T31' value='$upahlembur_fix'>";

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
                                $txt_jam_T01 = @$_POST['txt_jam_T01'];
                                $txt_ur_T01 = @$_POST['txt_ur_T01'];
                                $txt_al_T01 = @$_POST['txt_al_T01'];
                                $txt_tar_T01 = @$_POST['txt_tar_T01'];
                                $txt_has_T01 = @$_POST['txt_has_T01'];

                                if(isset($_POST['btn_simpan_IN02MLM_01'])){ #PROCCESSING

                                    $save_t01_lmbr_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)VALUES('$DATE_Y$DATE_m','$tj_ls_vjdw01_sww[Bulan]',$IDKRY,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader)");

                                    

                                }
                        ?>