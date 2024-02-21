<b>DAFTAR CPF *NASIONAL</b>
<hr>
<table class="table table-bordered table-sm">
<tr class="table-info">
    <td width="18%">REFF ID</td>
    <td width="22%">KET</td>
    <td>-</td>
</tr>
<?PHP 
    $cpf_vform02_sw = $CL_Q("$SL idmain_form02_01,PasienNomorRM,InapNoAdmisi,form02_kode_01,form02_jenis_01,form02_tglinput_01 FROM tb_cpf_form02_01 WHERE form02_uploader='$vus01_sww[idmain]' order by form02_tglinput_01 desc");
        while($cpf_vform02_sww = $CL_FAS($cpf_vform02_sw)){
            #DATA PASIEN
            $cpf_vpsn01_sw = $CL_Q("$SL PasienNomorRM,PasienNama FROM TPasien WHERE PasienNomorRM='$cpf_vform02_sww[PasienNomorRM]'");
            $cpf_vpsn01_sww = $CL_FAS($cpf_vpsn01_sw);
?>
<tr>
    <td><a href="<?PHP echo"?PG_SA=CPF_ENTRI_03_DM&IDRM01=$cpf_vform02_sww[PasienNomorRM]&IDADM01=$cpf_vform02_sww[InapNoAdmisi]&UPDM01=UPDM01&IDCFORM02=$cpf_vform02_sww[idmain_form02_01]"; ?>" class="badge-warning"><?PHP echo $cpf_vform02_sww['form02_kode_01']; ?></a><br><?PHP echo $cpf_vform02_sww['form02_tglinput_01']; ?></td>
    <td>
        <?PHP 
        echo $cpf_vform02_sww['PasienNomorRM'];
        echo"<br>";
        echo $cpf_vform02_sww['InapNoAdmisi'];
        echo"<br>";
        echo $cpf_vpsn01_sww['PasienNama'];
        echo"<br>";
        echo $cpf_vform02_sww['form02_jenis_01'];
        ?>
    </td>
    <td>-</td>
</tr>
<?PHP } ?>
</table>