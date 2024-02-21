<b>#DATA WAKTU PELAYANAN</b>
<br>
<form method="post">
<div class="input-group input-group-sm mb-3 mx-2" style="max-width:25rem;">
  <input type="date" class="form-control form-control-sm" name="date_caridata_01" required>
  <div class="input-group-append">
    <button class="btn btn-success btn-sm" name="btn_caridata_01">CARI DATA</button>
  </div>
</div>
</form>

<br>
<?PHP 
    if(isset($_POST['btn_caridata_01'])){
    $date_caridata_01 = @$_POST['date_caridata_01'];
    
?>
<br>
<b><?PHP echo "SORTING DATA ".@FS_DATE($date_caridata_01); ?></b>
<table class="table table-sm table-bordered">
<tr class="table-primary">
    <td width="2%">#</td>
    <td width="20%">DOKTER</td>
    <td width="20%">Total Pasien</td>
    <td width="10%">Sub Rata2(*menit)</td>
    <td width="10%">Sub Rata2(*menit) Admisi</td>
</tr>
<?PHP 
    $pwc_layan_no = 1;
    
    $pwc_vwlyn01_sw = $CL_Q("$SL DISTINCT DokterKode FROM WaktuLayanPoli  WHERE TaskID4 BETWEEN '$date_caridata_01 00:00:00' AND '$date_caridata_01 23:59:00'");
        while($pwc_vwlyn01_sww = $CL_FAS($pwc_vwlyn01_sw)){
            #JUMLAH PASIEN
            $pwc_nr_vpsn01_sw = $CL_Q("$SL NoReg FROM WaktuLayanPoli  WHERE  DokterKode='$pwc_vwlyn01_sww[DokterKode]' AND  TaskID4 BETWEEN '$date_caridata_01 00:00:00' AND '$date_caridata_01 23:59:00' ");
            $pwc_nr_vpsn01_sww = $CL_NR($pwc_nr_vpsn01_sw);
            #DATA DOKTER
            $pwc_vdkt01_sw = $CL_Q("$SL PelakuKode,PelakuNama FROM TPelaku WHERE PelakuKode='$pwc_vwlyn01_sww[DokterKode]'");
            $pwc_vdkt01_sww = $CL_FAS($pwc_vdkt01_sw);
            #KONVERSI
            $pwc_conv_vwlyn01_sw = $CL_Q("$SL SUM(Selisih) as conv_slh FROM WaktuLayanPoli WHERE DokterKode='$pwc_vwlyn01_sww[DokterKode]' AND Selisih > 1 AND TaskID4 BETWEEN '$date_caridata_01 00:00:00' AND '$date_caridata_01 23:59:00'"); #SELISIH 01
            $pwc_conv_vwlyn01_sww = $CL_FAS($pwc_conv_vwlyn01_sw);
            $pwc_conv02_vwlyn01_sw = $CL_Q("$SL SUM(SelisihPendaf) as conv02_slh FROM WaktuLayanPoli WHERE DokterKode='$pwc_vwlyn01_sww[DokterKode]' AND Selisih > 1 AND TaskID4 BETWEEN '$date_caridata_01 00:00:00' AND '$date_caridata_01 23:59:00'"); #SELISIH 02
            $pwc_conv02_vwlyn01_sww = $CL_FAS($pwc_conv02_vwlyn01_sw);
            $pwc_nr_vwlyn01_sw = $CL_Q("$SL NoReg,DokterKode FROM WaktuLayanPoli WHERE DokterKode='$pwc_vwlyn01_sww[DokterKode]' AND TaskID4 BETWEEN '$date_caridata_01 00:00:00' AND '$date_caridata_01 23:59:00'"); #WaktuLayan ROWS
            $pwc_nr_vwlyn01_sww = $CL_NR($pwc_nr_vwlyn01_sw);
                #KALKULASI
                $pwc_hit_vwlyn01_sw = $pwc_conv_vwlyn01_sww['conv_slh'] / $pwc_nr_vwlyn01_sww;
                $pwc_hit02_vwlyn01_sw = $pwc_conv02_vwlyn01_sww['conv02_slh'] / $pwc_nr_vwlyn01_sww;
                $pwc_ceil_vwlyn01_sw = ceil($pwc_hit_vwlyn01_sw);
                $pwc_ceil02_vwlyn01_sw = ceil($pwc_hit02_vwlyn01_sw);
            

?>  
<tr>
    <td><?php echo $pwc_layan_no; ?></td>
    <td><?PHP echo $pwc_vdkt01_sww['PelakuNama'] ?></td>
    <td><?PHP echo $pwc_nr_vpsn01_sww; ?></td>
    <td align="center">
        <?PHP if($pwc_ceil_vwlyn01_sw > 100){ ?>
 
        <?PHP echo ceil($pwc_hit_vwlyn01_sw); ?>
    <?PHP }else{ ?>
       
        <?PHP echo ceil($pwc_hit_vwlyn01_sw); ?>
    <?PHP } ?>
    </td>
    <td>
    <?PHP if($pwc_ceil02_vwlyn01_sw > 100){ ?>
        <?PHP echo ceil($pwc_hit02_vwlyn01_sw); ?>
    <?PHP }else{ ?>
        <?PHP echo ceil($pwc_hit02_vwlyn01_sw); ?>
    <?PHP } ?>
    </td>
</tr>
<?PHP $pwc_layan_no++; } ?>
<?PHP 
 #KONVERSI
    $pwc_conv_vwlyn01_sw02 = $CL_Q("$SL SUM(Selisih) as conv_slh FROM WaktuLayanPoli WHERE  TaskID4 BETWEEN '$date_caridata_01 00:00:00' AND '$date_caridata_01 23:59:00' AND Selisih > 1"); #SELISIH
    $pwc_conv_vwlyn01_sww02 = $CL_FAS($pwc_conv_vwlyn01_sw02);
    $pwc_nr_vwlyn01_sw02 = $CL_Q("$SL NoReg,DokterKode FROM WaktuLayanPoli WHERE  TaskID4 BETWEEN '$date_caridata_01 00:00:00' AND '$date_caridata_01 23:59:00'"); #WaktuLayan ROWS
    $pwc_nr_vwlyn01_sww02 = $CL_NR($pwc_nr_vwlyn01_sw02);
        #KALKULASI
        $pwc_hit_vwlyn01_sw02 = $pwc_conv_vwlyn01_sww02['conv_slh'] / $pwc_nr_vwlyn01_sww02;
?>
            <tr class="table-secondary">
                <td align="center"><b>TOTAL RATA2</b></td>
                <td align="center"> 
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?PHP echo ceil($pwc_hit_vwlyn01_sw02); ?>%;"></div>
                    </div>
                    
                     <?PHP echo ceil($pwc_hit_vwlyn01_sw02); ?>
                </td>
            </tr>
</table>
<?PHP } ?>