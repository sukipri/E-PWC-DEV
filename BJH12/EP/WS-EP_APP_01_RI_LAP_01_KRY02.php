<?PHP 
 
		$epwc_vkry01_sw02 = $ms_q("$sl KaryNomor,KaryNomorYakkum,KaryNama,KaryJbtStruktural,UnitKode FROM Citarum.dbo.TKaryawan WHERE KaryNomorYakkum='0$IDEMP01'");
			$epwc_vkry01_sww02 = $ms_fas($epwc_vkry01_sw02);
                #DATA UNIT
                    $epwc_vunit01_sw = $ms_q("$call_sel TUnitPrs WHERE UnitKode='$epwc_vkry01_sww02[UnitKode]'");
                    $epwc_vunit01_sww = $ms_fas($epwc_vunit01_sw);
                #SUB DDATA
                $epwc_sub_vkry01_sw = substr($epwc_vkry01_sww02['KaryNomorYakkum'],1);

?>
<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <strong class="me-auto">Data laporan / Karyawan</strong>
    <small><b><?PHP echo  $epwc_vunit01_sww['UnitNama']; ?></b></small>
      <span aria-hidden="true"></span>
  </div>
  <div class="toast-body">
   <?PHP echo $epwc_vkry01_sww02['KaryNama']; ?>
   <br>
   <i><?PHP echo $epwc_vkry01_sww02['KaryNomorYakkum']; ?></i>
  </div>
</div>
<br>
<b>#Recent Presensi Data</b>
<div style="overflow:auto;width:auto;height:30rem;padding:2px;border:1px solid #eee">
<table class="table table-bordered table-sm table-striped">
  <tr class="table-info">
        <td  width="15%">#</td>
        <td  width="20%">Jadwal Masuk  / Pulang</td>
        <td width="20%">Jam Berangkat / Pulang</td>
        <td width="20%">Keterlambatan / Lembur</td>
        <td></td>
    </tr>
    <?PHP 
        $epwc_vrecinfo01_sw = $ms_q("$sl TOP 15 *  FROM  TJ_Main_Data.dbo.TA_Record_Info WHERE Per_Code='$IDEMP01' order by Date_Time desc ");
        $epwc_cn_vrecinfo_sw = $ms_nr($epwc_vrecinfo01_sw);
            while($epwc_vrecinfo01_sww = $ms_fas($epwc_vrecinfo01_sw)){

               #Convert DATA FUNCTION
               $ep_get02_vrecinfo01_sw = strtotime($epwc_vrecinfo01_sww['Date_Time']);

               #Substring data
               $epwc_sub_vrecinfo01_sww = substr($epwc_vrecinfo01_sww['Date_Time'],8,2); //>Ambil Tanggal
               $epwc_sub_vrecinfo01_sww02 = substr($epwc_vrecinfo01_sww['Date_Time'],5,2); //> Ambil Bulan
               $epwc_sub_vrecinfo01_sww03 = substr($epwc_vrecinfo01_sww['Date_Time'],0,-9); //> Ambil Bulan tanggal hari

         #DATA KARYAWAN 
         $ep_kary01_sw = $ms_q("$sl ID,Dept_ID,Dept_Name,Per_Name,Per_Code FROM TJ_Main_Data.dbo.HR_Personnel WHERE Per_Code='$epwc_vrecinfo01_sww[Per_Code]'");
         $ep_kary01_sww = $ms_fas($ep_kary01_sw);
         /* */
          #DATA JADWAL
         $epwc_tjdw01_sw = $ms_q("$sl Bulan,NIK,T$epwc_sub_vrecinfo01_sww FROM TJ_Main_Data.dbo.tJadwal WHERE NIK='$epwc_vrecinfo01_sww[Per_Code]' AND Bulan='$epwc_sub_vrecinfo01_sww02'");
         $epwc_tjdw01_sww = $ms_fas($epwc_tjdw01_sw);
         $epwc_date_d_sw = "T".$epwc_sub_vrecinfo01_sww;
             #DATA Shift Get
             /* */
             $epwc_vshift01_sw = $ms_q("$call_sel TJ_Main_Data.dbo.tShif WHERE Kode='$epwc_vrecinfo01_sww[ep_tjd_shift_01]'");
             $epwc_vshift01_sww = $ms_fas($epwc_vshift01_sw);

             #counting jam keterlambatan dan kedatangan SQL
             $ep_get_vrecinfo01_sw = $ms_q("$sl cast(Date_Time as time(0)) as ambil_waktu FROM TJ_Main_Data.dbo.TA_Record_Info WHERE ID='$epwc_vrecinfo01_sww[ID]' ");
             $ep_get_vrecinfo01_sww = $ms_fas($ep_get_vrecinfo01_sw);

             #JAM KETERLAMBATAN
             $waktu_awal      =strtotime($epwc_vrecinfo01_sww['Date_Time']);
             $waktu_ahir02 = date("$epwc_sub_vrecinfo01_sww03 $epwc_vshift01_sww[Masuk]:00");
             $waktu_akhir    =strtotime($waktu_ahir02); 

                 $diff    =  $waktu_awal - $waktu_akhir;
                 $jam    =floor($diff / (60 * 60));
                 $abs_jam = abs($jam);
                 $menit    =$diff - $jam * (60 * 60);
                 $menit02 = $menit / 60;
                 $rn_menit02 = ceil($menit02);
             
             #JAM LEMBUR
             $waktu_awal02     =strtotime($epwc_vrecinfo01_sww['Date_Time']);
             $waktu_ahir0202 = date("$epwc_sub_vrecinfo01_sww03 $epwc_vshift01_sww[Keluar]:00");
             $waktu_akhir02    =strtotime($waktu_ahir0202); 

                 $diff02    =  $waktu_awal02 - $waktu_akhir02;
                 $jam02    = floor($diff02 / (60 * 60));
                 $abs_jam02 = abs($jam02);
                 $menit02    =$diff02 - $jam02 * (60 * 60);
                 $menit0202 = $menit02 / 60;
                 $rn_menit0202 = ceil($menit0202);

    ?>
    <tr>
        <td><a href="<?PHP echo"?HLM=EP_HOME_01&SUB=EP_APP_01&SUB_CHILD=WS-EP_APP_01_RI_JADWAL_01&SUB_CHILD02=WS-EP_APP_01_RI_LAP_01&SUB_CHILD03=WS-EP_APP_01_RI_JADWAL_01_UP&IDEMP01=$IDEMP01&IDRECINFO01=$epwc_vrecinfo01_sww[ID]"; ?>"><?PHP echo $epwc_vrecinfo01_sww['ep_kode_01']; ?></a></td>
        <td align="center">
        <?PHP 
             if($epwc_vrecinfo01_sww['In_Out']=="1"){  echo $epwc_vshift01_sww['Masuk']; }elseif($epwc_vrecinfo01_sww['In_Out']=="2"){ echo $epwc_vshift01_sww['Keluar'];}
            
            ?>
        </td>
        <td>
        <span class="badge bg-success"><?PHP if($epwc_vrecinfo01_sww['In_Out']=="1"){ echo $epwc_vrecinfo01_sww['Date_Time'];  }  ?></span>
        <br>
        <span class="badge bg-danger"><?PHP if($epwc_vrecinfo01_sww['In_Out']=="2"){ echo $epwc_vrecinfo01_sww['Date_Time'];  }  ?></span>
        </td>
        <td align="center">         
        <?PHP
            if($jam < 0 ){
                echo"<b>ON TIME</b>";                
            }else{
            #KONDISI TERLAMBAT
            if($epwc_vrecinfo01_sww['In_Out']=="1"){   ?>
            <i><?PHP echo $jam." Jam ".$rn_menit02." Menit "; ?>
            <?PHP }elseif($epwc_vrecinfo01_sww['In_Out']=="2"){ echo $jam02." Jam ".$rn_menit0202." Menit";  } } ?>
          </i>
        </td>
        <td align="center">-</td>
    </tr>
    <?PHP } ?>
</table>
  </div>

          <!-- ###LEMBUR -->
          <b>#Jadwal</b>
          <div style="overflow:auto;width:auto;height:30rem;padding:2px;border:1px solid #eee">
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
                            <?PHP 
                                $tj_ls_vjdw01_sw = $ms_q("$call_sel TJ_Main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' order by Bulan Desc");
                                $tj_ls_vjdw01_sww = $ms_fas($tj_ls_vjdw01_sw);
                            ?>
          <tr>
                                    <td><?PHP echo $tj_ls_vjdw01_sww['Bulan'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T01'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T02'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T03'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T04'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T05'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T06'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T07'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T08'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T09'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T10'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T11'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T12'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T13'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T14'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T15'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T16'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T17'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T18'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T19'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T20'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T21'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T22'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T23'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T24'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T25'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T26'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T27'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T28'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T29'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T30'] ?></td>
                                     <td><?PHP echo $tj_ls_vjdw01_sww['T31'] ?></td>
          </tr>

         </table>
         <br>
         <?PHP 
            $tj_ls_vshif01_sw = $ms_q("$call_sel TJ_Main_Data.dbo.Tshif");
              while($tj_ls_vshif01_sww = $ms_fas($tj_ls_vshif01_sw)){
                echo $tj_ls_vshif01_sww['Kode']." = ". $tj_ls_vshif01_sww['Ket']."<br>";
              }
         ?>

          </div>

<div class="toast show bg-primary text-white" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <strong class="me-auto">Kalkulasi Laporan / Karyawan</strong>
    <small>11 mins ago</small>
      <span aria-hidden="true"></span>
  </div>
  <div class="toast-body">
  -
  </div>
</div>