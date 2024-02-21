<?PHP 
//error_reporting(0);
//..Sesiion open../
 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
     include'../LOGIC/PG/PG_H_LOCATION.php';
}else{ 

?>
<b>#DAFTAR PRESENSI PERSONEL</b>
<br>
<?PHP 
    $epwc_view02_vkry01_sw = $CL_Q("$SL KaryNomor,KaryNomorYakkum,KaryNama,UnitKode FROM Citarum.dbo.TKaryawan WHERE UnitKode='$epwc_vkry01_sww[UnitKode]' AND  NOT KaryStatus='91' AND NOT KaryStatus='99'  AND NOT KaryStatus='92'  AND NOT KaryStatus='94'  AND NOT KaryStatus='93' ");
        while($epwc_view02_vkry01_sww = $CL_FAS($epwc_view02_vkry01_sw)){
            $epwc_sub_view02_vkry01_sw = substr($epwc_view02_vkry01_sww['KaryNomorYakkum'],1);
?>
<span class="badge bg-info"><?PHP echo $epwc_view02_vkry01_sww['KaryNama']; ?></span>
<br>
<table class="table table-sm table-bordered table-striped">
<tr>
<td width="7%">#</td>
<td width="12%" >Waktu</td>
<td>Describe</td>
</tr>
<!--  -->
<?PHP 
    $open_tj_no = 1;
    $ep_ri_tgl01 = date("Y-m-d");
 #RECINFO
 $epwc_vrecinfo01_sw = $CL_Q("$CL_SL TJ_Main_Data.dbo.TA_Record_Info WHERE ep_kode_01 LIKE '%GPS%' AND  Date_Time BETWEEN '$ep_ri_tgl01' AND  '$ep_ri_tgl01 23:59:00' AND Per_Code='$epwc_sub_view02_vkry01_sw' order by ID desc ");
 $epwc_cn_vrecinfo_sw = $CL_NR($epwc_vrecinfo01_sw);
     while($epwc_vrecinfo01_sww = $CL_FAS($epwc_vrecinfo01_sw)){

             #CONVERSION DATA
                 $epwc_conv_vrecinfo01_sw = strlen($epwc_vrecinfo01_sww['ep_tjd_shift_01']);
                     if($epwc_conv_vrecinfo01_sw > 1){
                         $epwc_sub_vrecinfo01_sww04 = substr($epwc_vrecinfo01_sww['ep_tjd_shift_01'],0,-1);
                     }else{                                  
                          $epwc_sub_vrecinfo01_sww04 = $epwc_vrecinfo01_sww['ep_tjd_shift_01'];
                     }

               #Convert DATA FUNCTION
               $ep_get02_vrecinfo01_sw = strtotime($epwc_vrecinfo01_sww['Date_Time']);

               #Substring data
               $epwc_sub_vrecinfo01_sww = substr($epwc_vrecinfo01_sww['Date_Time'],8,2); //>Ambil Tanggal
               $epwc_sub_vrecinfo01_sww02 = substr($epwc_vrecinfo01_sww['Date_Time'],5,2); //> Ambil Bulan
               $epwc_sub_vrecinfo01_sww03 = substr($epwc_vrecinfo01_sww['Date_Time'],0,-9); //> Ambil Bulan
               
         #DATA KARYAWAN 
         $ep_kary01_sw = $CL_Q("$SL ID,Dept_ID,Dept_Name,Per_Name,Per_Code FROM TJ_Main_Data.dbo.HR_Personnel WHERE Per_Code='$epwc_vrecinfo01_sww[Per_Code]' AND Dept_ID='$open_tj_vkry01_sww[Dept_ID]'");
         $ep_kary01_sww = $CL_FAS($ep_kary01_sw);
         /* */
          #DATA JADWAL
         $epwc_tjdw01_sw = $CL_Q("$SL Bulan,NIK,T$epwc_sub_vrecinfo01_sww FROM TJ_Main_Data.dbo.tJadwal WHERE NIK='$epwc_vrecinfo01_sww[Per_Code]' AND Bulan='$epwc_sub_vrecinfo01_sww02'");
         $epwc_tjdw01_sww = $CL_FAS($epwc_tjdw01_sw);
         $epwc_date_d_sw = "T".$epwc_sub_vrecinfo01_sww;
        
             #DATA Shift Get
             /* */
             $epwc_vshift01_sw = $CL_Q("$CL_SL TJ_Main_Data.dbo.tShif WHERE Kode='$epwc_sub_vrecinfo01_sww04'");
             $epwc_vshift01_sww = $CL_FAS($epwc_vshift01_sw);

             #counting jam keterlambatan dan kedatangan SQL
             $ep_get_vrecinfo01_sw = $CL_Q("$SL cast(Date_Time as time(0)) as ambil_waktu FROM TJ_Main_Data.dbo.TA_Record_Info WHERE ID='$epwc_vrecinfo01_sww[ID]' ");
             $ep_get_vrecinfo01_sww = $CL_FAS($ep_get_vrecinfo01_sw);

             #JAM KETERLAMBATAN
             $waktu_awal      =strtotime($epwc_vrecinfo01_sww['Date_Time']);
             $waktu_ahir02 = date("$ep_ri_tgl01 $epwc_vshift01_sww[Masuk]:00");
             $waktu_akhir    =strtotime($waktu_ahir02); 

                 $diff    =  $waktu_awal - $waktu_akhir;
                 $jam    =floor($diff / (60 * 60));
                 $abs_jam = abs($jam);
                 $menit    =$diff - $jam * (60 * 60);
                 $menit02 = $menit / 60;
                 $rn_menit02 = ceil($menit02);
             
             #JAM LEMBUR
             $waktu_awal02     =strtotime($epwc_vrecinfo01_sww['Date_Time']);
             $waktu_ahir0202 = date("$ep_ri_tgl01 $epwc_vshift01_sww[Keluar]:00");
             $waktu_akhir02    =strtotime($waktu_ahir0202); 

                 $diff02    =  $waktu_awal02 - $waktu_akhir02;
                 $jam02    =floor($diff02 / (60 * 60));
                 $abs_jam02 = abs($jam02);
                 $menit02    =$diff02 - $jam02 * (60 * 60);
                 $menit0202 = $menit02 / 60;
                 $rn_menit0202 = ceil($menit0202);


?>
<!--  -->
<tr>
<td>
    <?PHP if($epwc_vrecinfo01_sww['In_Out']=="1"){ ?>
            <span class="badge bg-success">Masuk</span>
    <?PHP }elseif($epwc_vrecinfo01_sww['In_Out']=="1"){ ?>
        <span class="badge bg-danger">Pulang</span>
    <?PHP } ?>
</td>
<td><?PHP echo $epwc_vrecinfo01_sww['Date_Time'];  ?></td>
<td>
<?PHP
            if($jam < 0 ){
                echo"<b>ON TIME</b>";                
            }else{

            #KONDISI TERLAMBAT
            if($epwc_vrecinfo01_sww['In_Out']=="1"){   ?>
            <i><?PHP echo $jam." Jam ".$rn_menit02." Menit "; ?>
        
            <?PHP } } ?>
</td>
</tr>
<?PHP $open_tj_no++; } ?>
</table>
<?PHP } ?>

<?PHP } ?>