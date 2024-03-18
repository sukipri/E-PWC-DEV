<?PHP echo"<i class='fas fa-hashtag'></i> <b>SETUP FORM KASUS $cpf_vw_vkeg03_sww[keg_nama_03] </b>"; ?>
<br><br>
<?PHP 
    $cpf_vkeg01_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg_01 order by keg_nama_01");
        while($cpf_vkeg01_sww = $CL_FAS($cpf_vkeg01_sw)){
?>
<span class="badge bg-primary"><?PHP echo $cpf_vkeg01_sww['keg_nama_01'] ?></span>
<table class="table table-bordered table-sm table-striped">
<tr class="table-dark">
    <td width="23%">KEGIATAN</td>
    <td>URAIAN</td>
    <td>-</td>
</tr>
<?PHP 
    $cpf_vkeg02_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg_02 WHERE idmain_keg_01='$cpf_vkeg01_sww[idmain_keg_01]' ");
            while($cpf_vkeg02_sww = $CL_FAS($cpf_vkeg02_sw)){
?>
<tr>
    <td><?PHP echo $cpf_vkeg02_sww['keg_nama_02'] ?></td>
    <td><?PHP echo $cpf_vkeg02_sww['keg_ket_02'] ?></td>
    <td>
        <?PHP 
            $cpf_vkeg03rec_sw = $CL_Q("$SL idmain_keg_03_rec,idmain_keg_02,idmain_keg_03,rec_kode_01 FROM Citarum.dbo.tb_cpf01_keg_03_rec WHERE idmain_keg_02='$cpf_vkeg02_sww[idmain_keg_02]' and idmain_keg_03='$cpf_vw_vkeg03_sww[idmain_keg_03]' ");
                $cpf_nr_vkeg03rec_sww  = $CL_NR($cpf_vkeg03rec_sw);
                $cpf_vkeg03rec_sww = $CL_FAS($cpf_vkeg03rec_sw);
        ?>
            <?PHP if($cpf_nr_vkeg03rec_sww > 0){ ?>
                <a href="<?PHP echo"?PG_SA=CPF01_MD_KEG_01&PG_SA_SUB=CPF01_MD_KEG_01_IN03REC02&IDKEG03=$IDKEG03&IDKEG02=$cpf_vkeg02_sww[idmain_keg_02]&DELKEG03REC=DELKEG03REC&IDDELKEG03REC=$cpf_vkeg03rec_sww[idmain_keg_03_rec]"; ?>" class="btn btn-danger btn-sm">REJECT</a>
        <?PHP }elseif($cpf_nr_vkeg03rec_sww <= 1){ ?>
             <a href="<?PHP echo"?PG_SA=CPF01_MD_KEG_01&PG_SA_SUB=CPF01_MD_KEG_01_IN03REC02&IDKEG01=$cpf_vkeg01_sww[idmain_keg_01]&IDKEG03=$IDKEG03&IDKEG02=$cpf_vkeg02_sww[idmain_keg_02]&&SAVEKEG03REC=SAVEKEG03REC"; ?>" class="btn btn-success btn-sm">ADD</a>
        <?PHP } ?>
    </td>
</tr>
<?PHP } ?>
</table>
<?PHP } ?>
<?PHP include"../LOGIC/PRC/EXE_MIX.php"; ?>