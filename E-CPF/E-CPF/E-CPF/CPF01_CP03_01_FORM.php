<?PHP echo"<h5>NO ADMISI $IDADM01 #FORM CPF $cpf_vw03_vkeg03_sww[keg_nama_03] - Denomerator $cpf_vw03_vkeg03_sww[keg_rawat_03] </h5>"; #TITLE

        #DATA VALIDATION
        $cpf_val_vform01_sw = $CL_Q("$SL idmain_cpf01_form_01,idmain_pasien_01,idmain_inap_01,idmain_keg_03 FROM Citarum.dbo.tb_cpf01_form03_01 WHERE idmain_pasien_01='$IDRM01' AND idmain_inap_01='$IDADM01'AND idmain_keg_03='$IDKEG03'");
        $cpf_nr_val_vform01_sww = $CL_NR($cpf_val_vform01_sw);
        if($cpf_nr_val_vform01_sww > 0){
            echo"<span class='badge bg-success'>#SUDAH TERDATA</span>";
        }
?>
<!-- DATAA INAP -->

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?PHP echo $cpf_vw_vpasien01_sww['PasienNama']." <b>#".$cpf_vw_vpasien01_sww['PasienNomorRM']."</b>"; ?></h5>
      </div>
      <div class="modal-body">
        <i class="fas fa-cloud-download-alt"></i> <?PHP echo $cpf_vw_vinap01_sww['InapJamMasuk']; ?>
        <br>
        <i class="fas fa-cloud-upload-alt"></i> <?PHP echo $cpf_vw_vinap01_sww['InapJamKeluar']; ?>
      </div>
        <?PHP if($cpf_vw_vinap01_sww['InapStatus']=="1"){ ?>
        <button type="button" class="btn btn-success btn-sm"><i class="fas fa-clipboard"></i> PASIEN SUDAH KELUAR</button>
        <?PHP }elseif($cpf_vw_vinap01_sww['InapStatus']=="0"){ ?>
        <button type="button" class="btn btn-outline-warning btn-sm"><i class="fas fa-clipboard"></i> PASIEN DALAM MASA INAP</button>
        <?PHP } ?>
    </div>

<!-- DATA FORM -->
<hr>
<form method="post">
<?PHP 
    $cpf_keg01_no = 1;
    $cpf_vkeg01_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg03_01 order by keg_urut_01 asc ");
    $cpf_nr_vkeg01_sw = $CL_NR($cpf_vkeg01_sw);
    #echo $cpf_nr_vkeg01_sw;
        while($cpf_vkeg01_sww = $CL_FAS($cpf_vkeg01_sw)){

?>
<span class="badge bg-primary"><?PHP echo $cpf_vkeg01_sww['keg_nama_01'] ?></span>
<table class="table table-bordered table-sm table-striped">
<tr class="table-dark">
    <td width="7%">#</td>
    <td width="23%">KEGIATAN</td>
    <td>URAIAN</td>
    <td width="25%"><?PHP echo $cpf_vkeg01_sww['keg_ket_01']; ?></td>
</tr>
<?PHP 
    $cpf_cp_no = 1;
    $cpf_vkeg03rec_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg03_03_rec WHERE idmain_keg_03='$cpf_vw03_vkeg03_sww[idmain_keg_03]' AND idmain_keg_01='$cpf_vkeg01_sww[idmain_keg_01]'"); #MAIN DATA VIEW REC
    $cpf_nr02_vkeg03rec_sww = $CL_NR($cpf_vkeg03rec_sw);
    
     while($cpf_vkeg03rec_sww = $CL_FA($cpf_vkeg03rec_sw)){
        $cpf_vkeg02_sw = $CL_Q("$SL idmain_keg_02,idmain_keg_01,keg_nama_02,keg_ket_02,keg_status_02 FROM Citarum.dbo.tb_cpf01_keg03_02 WHERE idmain_keg_02='$cpf_vkeg03rec_sww[idmain_keg_02]'");#DATA KEG_02
            $cpf_vkeg02_sww = $CL_FAS($cpf_vkeg02_sw);
          #DATA FORM 01
			$cpf_vform01_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_form03_01 WHERE idmain_pasien_01='$IDRM01' AND idmain_inap_01='$IDADM01'AND idmain_keg_03='$IDKEG03' AND idmain_keg_03_rec='$cpf_vkeg03rec_sww[idmain_keg_03_rec]'");
			$cpf_vform01_sww = $CL_FAS($cpf_vform01_sw);
            #KALKULASI
            if($cpf_vform01_sww['form_nilai_01']=="0"){
                $cpf_pt_vform01_sww = 0;
            }else{
                $cpf_pt_vform01_sww = 1 ;
            }
?>
<tr>
    <td><?PHP echo $cpf_cp_no;  ?></td>
    <td><?PHP echo $cpf_vkeg02_sww['keg_nama_02'] ?></td>
    <td><?PHP echo  $cpf_vkeg02_sww['keg_ket_02'] ?></td>
    <td>
        <input type="hidden" name="<?PHP echo"idmain_keg_03_rec$cpf_vkeg03rec_sww[rec_urut_01]"; ?>" value="<?PHP echo $cpf_vkeg03rec_sww['idmain_keg_03_rec'] ?>">
        <input type="hidden" name="<?PHP echo"idmain_cpf01_form_01$cpf_vkeg03rec_sww[rec_urut_01]"; ?>" value="<?PHP echo $cpf_vform01_sww['idmain_cpf01_form_01'] ?>">
        <input type="hidden" name="<?PHP echo"idmain_kegf_01$cpf_vkeg03rec_sww[rec_urut_01]"; ?>" value="<?PHP echo $cpf_vkeg01_sww['idmain_keg_01'] ?>">
        <input type="hidden" name="<?PHP echo"form_nilai02_01$cpf_vkeg03rec_sww[rec_urut_01]"; ?>" value="<?PHP echo $cpf_pt_vform01_sww ?>">
    <?PHP 
                #LOGIC URUT KOSOONG
                if(empty($cpf_vkeg03rec_sww['rec_urut_01'])){ echo "<i>Nomor Entri Masih Kosong</i>";}else{
    ?>
        <select name="<?PHP echo"rec_angka_01$cpf_vkeg03rec_sww[rec_urut_01]"; ?>" required  class="form-control form-control-sm" style="max-width:25%">
        <option value=""></option>
        <?PHP 
            $rawat_cp_no = 0;
            while($rawat_cp_no <= $cpf_vkeg03rec_sww['rec_rawat_01'] ){
                if($rawat_cp_no==$cpf_vform01_sww['form_nilai_01']){
                    echo"<option value=$rawat_cp_no selected>$rawat_cp_no</option>";
                }else{
                    echo"<option value=$rawat_cp_no>$rawat_cp_no</option>";
                 } $rawat_cp_no++; }
        ?>
        </select> 
        <?PHP } ?>
        <?PHP #echo"rec_angka_01$cpf_vkeg03rec_sww[rec_urut_01]"; ?>
    </td>
</tr>
<?PHP $cpf_cp_no++; } 
    //sub TOtal nilai form tiap kotak
    $cpf_sum_vform01_sw = $CL_Q("$SL SUM(form_nilai_01) as sum_nilai FROM Citarum.dbo.tb_cpf01_form03_01 WHERE idmain_pasien_01='$IDRM01' AND idmain_inap_01='$IDADM01'AND idmain_keg_03='$IDKEG03' AND idmain_keg_01='$cpf_vkeg01_sww[idmain_keg_01]' ");
    $cpf_sum_vform01_sww = $CL_FAS($cpf_sum_vform01_sw); #Sub Total form_01
    //sub total konversi form tiap kotak
    $cpf_nr_1_vform01_sw = $CL_Q("$SL SUM(form_nilai02_01) as tot_nilai02 FROM Citarum.dbo.tb_cpf01_form03_01  WHERE form_nilai02_01='1' AND idmain_pasien_01='$IDRM01' AND  idmain_inap_01='$IDADM01' AND idmain_keg_01='$cpf_vkeg01_sww[idmain_keg_01]'");
        $cpf_nr_1_vform01_sww = $CL_FAS($cpf_nr_1_vform01_sw); # sub total Form 01
    //Total persentase tiap form
    $cpf_sum_vformh01_sw = $CL_Q("$SL SUM(head_tot_01) as tot_persen FROM Citarum.dbo.tb_cpf01_form03_01_head WHERE idmain_inap_01='$IDADM01'");
    $cpf_sum_vform01_sww = $CL_FAS($cpf_sum_vformh01_sw); #TOTAL PERSENTASE form head
        
        #HIT SUB TOTAL
            #HIT Pemeriksaan Penunjang 1 +
            #$cpf_form_prc = 1 / 1 * 100;
            $cpf_hit_penj_01 = $cpf_nr_1_vform01_sww['tot_nilai02'] /  $cpf_nr02_vkeg03rec_sww * 100 ;
            #HIT Pemeriksaan Penunjang 1 -
            $cpf_hit_penj_02 =  100 - $cpf_hit_penj_01;

        #HIT Total Persentasi form
                 $cpf_hit_per_vformh01_swcount =  $cpf_sum_vform01_sww['tot_persen'] / 10;
                 $cpf_hit_per_vformh01_sw = ceil($cpf_hit_per_vformh01_swcount);

                    
?>
<tr>
    <td width="7%">-</td>
    <td width="23%">-</td>
    <td>-</td>
    <td width="25%" align="right">
        <?PHP 
            echo "<b>D ".@$cpf_sum_vform01_sww['sum_nilai']."</b> "; 
            echo "|<b>".@ceil($cpf_hit_penj_01)."% </b>";
            echo " |<b> ".@ceil($cpf_hit_penj_02)."%</b>";
            #echo $cpf_nr_1_vform01_sww['tot_nilai02'];
        ?>
        <input type="hidden" name="<?PHP echo"head_tot_01$cpf_keg01_no"; ?>" value="<?PHP echo ceil($cpf_hit_penj_01);?>">
        <input type="hidden" name="<?PHP echo"head_tot_02$cpf_keg01_no"; ?>" value="<?PHP echo ceil($cpf_hit_penj_02);?>">
        <input type="hidden" name="<?PHP echo"idmain_keg_01$cpf_keg01_no"; ?>" value="<?PHP echo $cpf_vkeg01_sww['idmain_keg_01'] ?>">
    </td>  
</tr>
</table>
<?PHP  $cpf_keg01_no++;}  
    #DATA NR Jumlah NOMOR
    $cpf_nr_vkeg03rec_sw = $CL_Q("$SL idmain_keg_03_rec,idmain_keg_03 FROM Citarum.dbo.tb_cpf01_keg03_03_rec WHERE idmain_keg_03='$cpf_vw03_vkeg03_sww[idmain_keg_03]'"); #HIT NUMBER
   $cpf_nr_vkeg03rec_sww = $CL_NR($cpf_nr_vkeg03rec_sw);
     
     #echo $cpf_nr_vkeg03rec_sww; ?>
<br>
<?PHP 
    //CONDITION JIKA PERSENTASE AKHIR SUDAH TERUPLOAD
        $cpf_cek_vformp01_sw = $CL_Q("$SL idmain_formp_01 FROM Citarum.dbo.tb_cpf01_form03_01_head_persen WHERE idmain_inap_01='$IDADM01'");
        $cpf_cek_vformp01_sww = $CL_FAS($cpf_cek_vformp01_sw);
        $cpf_nr_cek_vformp01_sww = $CL_NR($cpf_cek_vformp01_sw);
        #PENGKONDISIAN PERSENTASE TOTAL
        if($cpf_nr_cek_vformp01_sww > 0){
            echo"<button class='btn btn-success' name='###'><i class='fas fa-toggle-off'></i> <b>Selesai</button>";
        }elseif($cpf_nr_cek_vformp01_sww <= 0){
        #--------------//
     if($cpf_nr_val_vform01_sww > 0){

        echo"<button class='btn btn-warning' name='cp03_up_01'> 1.UPDATE DATA</button>";
        echo"&nbsp";
        echo"<button class='btn btn-dark' name='cp03_upload_01'><i class='fas fa-calculator'></i> 2.KALKULASI DENOM</button>";
        echo"&nbsp";
    
        #DATA ROW F HEAD
        $cpf_nr_vfhead01_sw = $CL_Q("$SL idmain_cpf01_form_01_head,idmain_inap_01 FROM Citarum.dbo.tb_cpf01_form03_01_head WHERE idmain_inap_01='$IDADM01'");
            $cpf_nr_vfhead01_sww = $CL_NR($cpf_nr_vfhead01_sw);   

    if($cpf_nr_vfhead01_sww > 0 ){ 
    echo"<button class='btn btn-info' name='cp03_tutup02_01'><i class='fas fa-toggle-off'></i> <b>$cpf_hit_per_vformh01_sw</b>% KIRIM HASIL?</button>";
 }elseif($cpf_nr_vfhead01_sww < 1){ 
        echo"<button class='btn btn-secondary' name='cp03_tutup_01'><i class='fas fa-toggle-off'></i> 3.TUTUP FORM</button>";
        } 
    }else{ 
        echo"<button class='btn btn-success' name='cp03_simpan_01'> 1.SIMPAN DATA</button>";
    } 
    #-----------//
}
    ?>
</form>
<div id="proses"></id>
<br>
<span class="badge bg-success">1.SIMPAN DATA</span> = Melakukan penyimpanan record baru / form baru |  <span class="badge bg-warning">1.UPDATE DATA</span> = Melakukan Update kolom untuk Hari Rawat | <span class="badge bg-dark">KALKULASI DENOM</span> = Kalkulasi Nilai Denomerator per Penunjang | <span class="badge bg-secondary">Tutup Form</span> = Dilakukan ketika semua terkalkulasi | <span class="badge bg-info">KIRIM HASIL ?</span> = Klik untuk mengirimkan hasil ke database
<br>
<i>*Lakukan Sesuai Urutan , cek data terlebih dahulu semebelum melakukan penutupan form</i>
<br>
<i>*Jika ada persentase lebih dari 100 ada gagal hitungan tahap I</i>
<br><br>
    <?PHP include"../LOGIC/PRC/EXE_MIX.php";  ?>