<?PHP echo"<h5>#FORM CPF $cpf_vw_vkeg03_sww[keg_nama_03] - Denomerator $cpf_vw_vkeg03_sww[keg_rawat_03] KEGIATAN $cpf_vw_nr_vkeg03rec_sww </h5>"; ?>
<hr>

<?PHP 
    $cpf_vkeg01_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg03_01 order by keg_urut_01 asc ");
        while($cpf_vkeg01_sww = $CL_FAS($cpf_vkeg01_sw)){
?>
<span class="badge badge-primary"><?PHP echo $cpf_vkeg01_sww['keg_nama_01'] ?></span>
<table class="table table-bordered table-sm table-striped">
<tr class="table-dark">
    <td width="23%">KEGIATAN</td>
    <td>URAIAN</td>
    <td width="25%">HARI RAWAT</td>
</tr>
<?PHP 
    $cpf_vkeg03rec_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg03_03_rec WHERE idmain_keg_03='$cpf_vw03_vkeg03_sww[idmain_keg_03]' AND idmain_keg_01='$cpf_vkeg01_sww[idmain_keg_01]'");
     while($cpf_vkeg03rec_sww = $CL_FA($cpf_vkeg03rec_sw)){
        $cpf_vkeg02_sw = $CL_Q("$SL idmain_keg_02,idmain_keg_01,keg_nama_02,keg_ket_02,keg_status_02 FROM Citarum.dbo.tb_cpf01_keg03_02 WHERE idmain_keg_02='$cpf_vkeg03rec_sww[idmain_keg_02]'");
            $cpf_vkeg02_sww = $CL_FAS($cpf_vkeg02_sw);
?>
<tr>
    <td><?PHP echo $cpf_vkeg02_sww['keg_nama_02'] ?></td>
    <td><?PHP echo  $cpf_vkeg02_sww['keg_ket_02']."<br>" ." <b> V "."".$cpf_vkeg03rec_sww['rec_rawat_01']." || NE ".$cpf_vkeg03rec_sww['rec_urut_01']."</b>" ?></td>
    <td>
        <a href="<?PHP echo"?PG_SA=CPF01_MD_KEG03_01&PG_SA_SUB=CPF01_MD_KEG03_01_FORM_RWT&IDKEG03=$IDKEG03&IDKEG03REC=$cpf_vkeg03rec_sww[idmain_keg_03_rec]&UPKEG0203REC=UPKEG0203REC"; ?>" class="btn btn-outline-danger btn-sm">Add Value</a>
    </td>
</tr>
<?PHP } ?>
</table>
<?PHP } ?>