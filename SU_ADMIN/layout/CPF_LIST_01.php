<b>#DAFTAR CLINICAL PATH WAY ENTRI</b>
<br>
<table class="table table-sm table-bordered table-striped" style="max-width:70rem;">
<tr class="table-info">
    <td width="4%">#</td>
    <td width="20%">DATE</td>
    <td width="20%">ADMISI</td>
    <td width="20%">RUANGAN</td>
    <td>-</td>
</tr>
<?PHP 
        $pwc_cpf_no = 1;
        #DATA CPF
        $pwc_cpf01_sw = $ms_q("$call_sel tb_cpf_form_01 order by form_tglinput_01 desc ");
            while($pwc_cpf01_sww = $ms_fas($pwc_cpf01_sw)){
            #DATA USER
            $pwc_vuser01_sw = $ms_q("$call_sel TBUser WHERE idmain='$pwc_cpf01_sww[form_uploader]'");
                $pwc_vuser01_sww = $ms_fas($pwc_vuser01_sw);
                
?>
<tr>
    <td width="7%"><?PHP echo $pwc_cpf_no; ?></td>
    <td><?PHP echo $pwc_cpf01_sww['form_tglinput_01']; ?></td>
    <td><?PHP echo $pwc_cpf01_sww['InapNoAdmisi']; ?></td>
    <td><?PHP echo $pwc_vuser01_sww['namauser'] ?></td>
    <td>-</td>
</tr>
<?PHP $pwc_cpf_no++; } ?>

</table>