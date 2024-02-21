<?PHP 
//error_reporting(0);
//..Sesiion open../
 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
     include'../LOGIC/PG/PG_H_LOCATION.php';
}else{

?>
<form method="post">

<span class="mx-2"><b>#Statistik Presensi Karyawan</b></span>
<div class="input-group input-group-sm mb-3 mx-2">
<span class="input-group-text" id="basic-addon1">TGL</span>
  <select name="slc_cari_data" required class="form-control form-control-sm">
    <?PHP 
     $day_no = 1;
        while($day_no <= 31){
            $day_zero_no = sprintf("%02s",$day_no);
            echo"<option value=$day_zero_no>$day_zero_no</option>";
        $day_no++;}
    ?>
    </select>
  <button class="btn btn-primary btn-sm" name="btn_cari_data">CARI DATA</button>
</div>

</form>
<?PHP 
    //echo $DATE_Y.$DATE_m;
    if(isset($_POST['btn_cari_data'])){
        $slc_cari_data = @$SQL_SL($_POST['slc_cari_data']);
        //echo "T$slc_cari_data";

    #DATA JADWAL DINAS
    $epwc_tj_vjdw01_sw = $CL_Q("$SL Bulan,NIK,T$slc_cari_data FROM TJ_Main_Data.dbo.tJadwal WHERE Bulan='$DATE_Y$DATE_m' AND NOT  T$DATE_d='C' AND NOT  T$slc_cari_data='W' AND NOT  T$slc_cari_data='L' AND NOT  T$slc_cari_data='E' AND NOT  T$slc_cari_data='D' ");
        $epwc_tj_nr_vjdw01_sw = $CL_NR($epwc_tj_vjdw01_sw);

    #DATA JADWAL LIBUR
    $epwc_tj_vjdw01_sw02 = $CL_Q("$SL Bulan,NIK,T$slc_cari_data FROM TJ_Main_Data.dbo.tJadwal WHERE Bulan='$DATE_Y$DATE_m' AND   (T$DATE_d='C' OR  T$slc_cari_data='W' OR  T$slc_cari_data='L' OR  T$slc_cari_data='E' OR  T$slc_cari_data='D') ");
       $epwc_tj_nr_vjdw01_sw02 = $CL_NR($epwc_tj_vjdw01_sw02);
    
        #DATA TERLAMBAT 
        $epwc_tj_vprs01_sw = $CL_Q("exec TJ_Main_Data.dbo.Proc_Sdm_LapKaryHarianRekap '$DATE_m/$slc_cari_data/$DATE_Y','all'");
            $epwc_tj_vprs01_sww = $CL_FAS($epwc_tj_vprs01_sw);

?>
<div class="alert alert-dismissible alert-success mx-2">
  <i class="fas fa-info"></i> &nbsp
  Jumlah Terjadwal Masuk
  <strong> <?PHP echo $epwc_tj_nr_vjdw01_sw; ?> </strong>
</div>

<div class="alert alert-dismissible alert-info mx-2">
  <i class="fas fa-info"></i> &nbsp
  Jumlah Terjadwal Libur
  <strong> <?PHP echo $epwc_tj_nr_vjdw01_sw02; ?> </strong>
</div>

<div class="alert alert-dismissible alert-danger mx-2">
  <i class="fas fa-info"></i> &nbsp
  Tidak Presensi Masuk
  <strong> <?PHP echo $epwc_tj_vprs01_sww['TdkAbsenMasuk']; ?> </strong>
</div>

<div class="alert alert-dismissible alert-danger mx-2">
  <i class="fas fa-info"></i> &nbsp
  Terlambat Masuk
  <strong> <?PHP echo $epwc_tj_vprs01_sww['TerlambatMasuk']; ?> </strong>
</div>

<div class="alert alert-dismissible alert-danger mx-2">
  <i class="fas fa-info"></i> &nbsp
  Kelebihan Jam
  <strong> <?PHP echo $epwc_tj_vprs01_sww['KelebihanKeluar']; ?> </strong>
</div>
<?PHP } } ?>