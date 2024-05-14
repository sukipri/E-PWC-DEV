<?PHP 
    if(isset($_GET['DELKEG03'])){
        $del_form03_01 = $CL_Q("$DL from Citarum.dbo.tb_cpf01_form03_01 WHERE idmain_keg_03='$IDKEG03'"); #DELETE form03
        $del_hform03_01 = $CL_Q("$DL from Citarum.dbo.tb_cpf01_form03_01_head  WHERE idmain_keg_03='$IDKEG03'"); #DELETE form0 head
        $del_pform03_01 = $CL_Q("$DL from Citarum.dbo.tb_cpf01_form03_01_head_persen  WHERE idmain_keg_03='$IDKEG03'"); #DELETE form persen

        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?PG_SA=CPF01_MD_KEG03_01&PG_SA_SUB=CPF01_MD_KEG03_01_IN03REC'>";

    }

?>
<b>LIST KASUS TERTERA</b>
<!--  -->
    <table class="table table-sm table-bordered table-striped">
    <tr class="table-dark">
        <td width="24%">PENYAKIT</td>
        <td></td>
        <td width="20%">##</td>
    </tr>
    <?PHP 
        $cpf_vkeg03_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg03_03 order by keg_nama_03 asc");
            while($cpf_vkeg03_sww = $CL_FAS($cpf_vkeg03_sw)){ #DATA KEG03
    ?>
    <tr>
        <td><?PHP echo "<a href=?PG_SA=CPF01_MD_KEG03_01&PG_SA_SUB=CPF01_MD_KEG03_01_IN03&IDKEG03=$cpf_vkeg03_sww[idmain_keg_03]&UPKEG03=UPKEG03>".$cpf_vkeg03_sww['keg_nama_03']."</a>" ?></td>
        <td>
            <a href="<?PHP echo"?PG_SA=CPF01_MD_KEG03_01&PG_SA_SUB=CPF01_MD_KEG03_01_IN03REC&IDKEG03=$cpf_vkeg03_sww[idmain_keg_03]&DELKEG03=DELKEG03"; ?>" class="btn btn-danger btn-sm"><i class="fas fa-exclamation-triangle	"></i> Reset CP</a>
            *U/ mereset ulang penginputan CP
        </td>
        <td>
            <a href="<?PHP echo"?PG_SA=CPF01_MD_KEG03_01&PG_SA_SUB=CPF01_MD_KEG03_01_IN03REC02&IDKEG03=$cpf_vkeg03_sww[idmain_keg_03]"; ?>" class="btn btn-warning btn-sm"><i class="fas fa-arrow-alt-circle-right"></i> Pilih Kasus</a>
            &nbsp
            <a href="<?PHP echo"?PG_SA=CPF01_MD_KEG03_01&PG_SA_SUB=CPF01_MD_KEG03_01_FORM&IDKEG03=$cpf_vkeg03_sww[idmain_keg_03]"; ?>" class="btn btn-primary btn-sm"><i class="far fa-clipboard"></i> VIEW FORM</a>
        </td>
        
    </tr>
    <?PHP } ?>
    </table>
<!--  -->

<?PHP 
    include"../LOGIC/PRC/EXE_MIX.php";
?>