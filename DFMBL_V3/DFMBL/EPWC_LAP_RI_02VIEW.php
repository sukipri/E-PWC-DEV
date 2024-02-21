<b>laporan Operasi</b>
<br>
<span class="badge bg-info">Laporan Penggunaan Asuransi</span>
<table class="table table-sm table-bordered">
    <?PHP 
        #DATA BPJS
        $epwc_nr_vop01_sw = $CL_Q("$SL PasienNomorRM,BedahNomor FROM Citarum.dbo.VKamarOpMnj WHERE PrshKode='1-0113' AND BedahTanggal BETWEEN '$tg01' AND '$tg02 23:59'");
        $epwc_nr_vop01_sww = $CL_NR($epwc_nr_vop01_sw);
        #DATA NON BPJS
        $epwc_nr02_vop01_sw = $CL_Q("$SL PasienNomorRM,BedahNomor FROM Citarum.dbo.VKamarOpMnj WHERE NOT PrshKode='1-0113' AND BedahTanggal BETWEEN '$tg01' AND '$tg02 23:59'");
        $epwc_nr02_vop01_sww = $CL_NR($epwc_nr02_vop01_sw);
    ?>
<tr class="table-success">
    <td><b>BPJS</b><br>
    <img src="https://www.cekindo.com/wp-content/uploads/2023/02/photo.jpg" width="100" height="100">
</td>
    <td><?PHP echo  "<span class='badge bg-dark'>".$epwc_nr_vop01_sww ." Pasien Melakukan Operasi.</span>"  ?>
    <hr>
    <!--  -->
    <?PHP 
        #DATA OPERASI
        $epwc_op_no = 1;
        $epwc_vop01_sw = $CL_Q("$CL_SL Citarum.dbo.VKamarOpMnj WHERE PrshKode='1-0113' AND BedahTanggal BETWEEN '$tg01' AND '$tg02 23:59' ");
        while($epwc_vop01_sww = $CL_FAS($epwc_vop01_sw)){
    ?>
    <div class="alert alert-dismissible alert-secondary">
        <?PHP echo $epwc_op_no."."; ?>
        <strong><?PHP echo"$epwc_vop01_sww[BedahNomor]"; ?></strong> <?PHP echo $epwc_vop01_sww['NamaOp'] ?> <a href="#" class="alert-link"><?PHP echo $epwc_vop01_sww['TTNama'] ?></a>.
    </div>
    <?PHP $epwc_op_no++; } ?>
    <!--  -->
    </td>
</tr>
<tr>
<td><b>UMUM</b><br>
    <img src="https://assets-a1.kompasiana.com/items/album/2016/01/30/mraad-website-article-items-01-02-56ac7204a823bdc706f19d4a.jpg?t=o&v=770" width="100" height="100">
    <td><?PHP echo  "<span class='badge bg-dark'>".$epwc_nr02_vop01_sww." Pasien Melakukan Operasi.</span>";  ?>
    <hr>
     <!--  -->
     <?PHP 
        #DATA OPERASI
        $epwc_op_no02 = 1;
        $epwc_vop01_sw02 = $CL_Q("$CL_SL Citarum.dbo.VKamarOpMnj WHERE NOT PrshKode='1-0113' AND BedahTanggal BETWEEN '$tg01' AND '$tg02 23:59' ");
        while($epwc_vop01_sww02 = $CL_FAS($epwc_vop01_sw02)){
    ?>
    <div class="alert alert-dismissible alert-secondary">
        <?PHP echo $epwc_op_no02."."; ?>
        <strong><?PHP echo"$epwc_vop01_sww02[BedahNomor] | $epwc_vop01_sww02[PasienNama] "; ?></strong> <?PHP echo $epwc_vop01_sww02['NamaOp'] ?> <a href="#" class="alert-link"><?PHP echo $epwc_vop01_sww02['TTNama'] ?></a>.
    </div>
    <?PHP $epwc_op_no02++; } ?>
    <!--  -->
    </td>
</tr>
</table>
