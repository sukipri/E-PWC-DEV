<b>DATA KRITIK & SARAN Customer</b>
<br><br>
<table class="table table-sm table-bordered table-striped">
<tr class="table-dark">
<td width="6%">#</td>
<td width="50%">KET</td>
<td>-</td>
</tr>
<?PHP
    $ks_no = 1;
    #DATA KS
    $pwc_vks01_sw = $ms_q("$call_sel tb_ks_01 WHERE  ks_tipe_01='1' order by ks_tglinput_01 desc");
        while($pwc_vks01_sww = $ms_fas($pwc_vks01_sw)){
?>
<tr>
<td><?PHP echo $ks_no ?></td>
<td><?PHP echo $pwc_vks01_sww['ks_email_01'] ?>
<br>
<?PHP echo $pwc_vks01_sww['ks_telp_01'] ?>
    <br>
    <?PHP echo $pwc_vks01_sww['ks_isi_01'] ?>
    </td>
<td>
    <span class="badge bg-secondary"><?PHP echo $pwc_vks01_sww['ks_tglinput_01']; ?></span>
    <a href="<?PHP echo"?HLM=KS_PWC_VIEW_01_RP&IDKS01=$pwc_vks01_sww[idmain_ks_01]&UPKS01=UPKS01"; ?>" class="btn btn-primary btn-sm">REPLY</a>
    &nbsp
	<?PHP 
		if($pwc_vks01_sww['ks_status_01']=="1"){
			echo"<span class='badge bg-warning'>Belum dibalas</span>";
		}elseif($pwc_vks01_sww['ks_status_01']=="2"){
			echo"<span class='badge bg-success'>Sudah dibalas</span>";
		}
	?>
    
</td>
</tr>
<?PHP $ks_no++; } ?>
</table>
