<?PHP 
#DATA PASIEN
 $pwc_vpsn01_sw = $ms_q("$sl PasienNomorRM,PasienNama,PasienAlamat FROM TPasien WHERE PasienNomorRM='$IDPSN01'  ");
    $pwc_vpsn01_sww = $ms_fas($pwc_vpsn01_sw);
?>
<b>#ENTRI KODE REGISTRATION 02 <?PHP echo"<i>$pwc_vpsn01_sww[PasienNama]</i>"; ?></b>
<hr>
<table class="table table-bordered table-sm table-striped" style="max-width:65rem;">
<tr class="table-info">
    <td width="13%">NO ADMISI</td>
    <td width="13%" >DATE</td>
    <td width="13%">STATUS</td>
    <td width="13%">###</td>
</tr>
<?PHP 
    $pwc_vri01_sw = $ms_q("$sl InapNoAdmisi,InapTglMasuk,PasienNomorRM,DokterKode,InapStatus FROM TRawatInap WHERE PasienNomorRM='$IDPSN01' order by InapTglMasuk desc");
        while($pwc_vri01_sww = $ms_fas($pwc_vri01_sw)){
            #CONVERT DATE
            $pwc_tg_vri01_sw = $ms_q("$sl CONVERT(DATE,InapTglMasuk) as tg_masuk FROM TRawatInap WHERE PasienNomorRM='$IDPSN01' AND InapNoAdmisi='$pwc_vri01_sww[InapNoAdmisi]'");
            $pwc_tg_vri01_sww = $ms_fas($pwc_tg_vri01_sw);
            
?>
<tr>
    <td><?PHP echo $pwc_vri01_sww['InapNoAdmisi']; ?></td>
    <td><?PHP echo tanggal_indo($pwc_tg_vri01_sww['tg_masuk']); ?></td>
    <td align="center">
        <?PHP if($pwc_vri01_sww['InapStatus']=="0"){ ?>
                <span class="badge bg-warning">Aktif</span>
            <?PHP }elseif($pwc_vri01_sww['InapStatus']=="1"){ ?>
                <span class="badge bg-success">Pass</span>
            <?PHP } ?>
    </td>
    <td>
        <a href="<?PHP echo"?HLM=KR_VK_01_IN03&IDPSN01=$IDPSN01&IDINAP01=$pwc_vri01_sww[InapNoAdmisi]"; ?>" class="btn btn-primary btn-sm">PILIH >></a>
    </td>
</tr>
<?PHP } ?>
</table>