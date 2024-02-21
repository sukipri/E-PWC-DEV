<b>LIST KASUS TERTERA</b>
<!--  -->
    <table class="table table-sm table-bordered table-striped">
    <tr class="table-info">
        <td width="24%">PENYAKIT</td>
        <td></td>
        <td width="20%">##</td>
    </tr>
    <?PHP 
        $cpf_vkeg03_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg02_03 order by keg_nama_03 asc");
            while($cpf_vkeg03_sww = $CL_FAS($cpf_vkeg03_sw)){
    ?>
    <tr>
        <td><?PHP echo "<a href=?PG_SA=CPF01_MD_KEG02_01&PG_SA_SUB=CPF01_MD_KEG02_01_IN03&IDKEG03=$cpf_vkeg03_sww[idmain_keg_03]&UPKEG03=UPKEG03>".$cpf_vkeg03_sww['keg_nama_03']."</a>" ?></td>
        <td></td>
        <td>
            <a href="<?PHP echo"?PG_SA=CPF01_MD_KEG02_01&PG_SA_SUB=CPF01_MD_KEG02_01_IN03REC02&IDKEG03=$cpf_vkeg03_sww[idmain_keg_03]"; ?>" class="btn btn-danger btn-sm"><i class="fas fa-arrow-alt-circle-right"></i> Pilih Kasus</a>
            &nbsp
            <a href="<?PHP echo"?PG_SA=CPF01_MD_KEG02_01&PG_SA_SUB=CPF01_MD_KEG02_01_FORM&IDKEG03=$cpf_vkeg03_sww[idmain_keg_03]"; ?>" class="btn btn-primary btn-sm"><i class="far fa-clipboard"></i> VIEW FORM</a>
        </td>
        
    </tr>
    <?PHP } ?>
    </table>
<!--  -->

<?PHP 
    include"../LOGIC/PRC/EXE_MIX.php";
?>