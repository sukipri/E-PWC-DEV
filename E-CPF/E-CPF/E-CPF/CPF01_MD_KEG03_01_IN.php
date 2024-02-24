<form method="post">
<div class="card border-primary mb-3" style="max-width: 25rem;">
  <div class="card-header">ENTRI KEGIATAN CPF</div>
  <div class="card-body">
 <!--  -->
    #PENUNJANG
    <select name="idmain_keg_01" class="form-control form-control-sm" required>
    <?PHP 
        $cpf_vkeg01_sw = $CL_Q("$SL idmain_keg_01,keg_nama_01 FROM tb_cpf01_keg02_01 order by keg_nama_01");
        echo"<option value></option>";
            while($cpf_vkeg01_sww = $CL_FAS($cpf_vkeg01_sw)){
                if($cpf_vkeg01_sww['idmain_keg_01']==$cpf_vw02_vkeg02_sww['idmain_keg_01']){
                    echo"<option value=$cpf_vkeg01_sww[idmain_keg_01] selected>$cpf_vkeg01_sww[keg_nama_01]</option>";
                }else{
                echo"<option value=$cpf_vkeg01_sww[idmain_keg_01]>$cpf_vkeg01_sww[keg_nama_01]</option>";
            }}
    ?>
    </select>
    #NAMA KEGIATAN
    <input type="text" class="form-control form-control-sm" required name="keg_nama_02" value="<?PHP echo $cpf_vw02_vkeg02_sww['keg_nama_02'] ?>">
    #HARI RAWAT
    <input type="text" class="form-control form-control-sm" required name="keg_rawat_02" value="<?PHP echo $cpf_vw02_vkeg02_sww['keg_rawat_02'] ?>" style="max-width:10rem;">
    #URAIAN KEGIATAN
    <textarea class="form-control" required name="keg_ket_02"><?PHP echo $cpf_vw02_vkeg02_sww['keg_ket_02'] ?></textarea>
    <br>
    <?PHP if(isset($_GET['UPKEG02'])){ ?>
        <button class="btn btn-warning btn-sm" name="keg02_up_02">UPDATE DATA</button>
    <?PHP }else{ ?>
        <button class="btn btn-success btn-sm" name="keg02_simpan_02">SIMPAN DATA</button>
    <?PHP } ?>
 <!--  -->
  </div>
</div>

</form>
<?PHP include"../LOGIC/PRC/EXE_MIX.php"; ?>
<br>
<?PHP 
    $cpf_vkeg01_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg02_01 order by keg_urut_01 asc");
        while($cpf_vkeg01_sww = $CL_FAS($cpf_vkeg01_sw)){
?>
<span class="badge badge-primary"><?PHP echo $cpf_vkeg01_sww['keg_nama_01'] ?></span>
<table class="table table-bordered table-sm table-striped">
<tr class="table-dark">
    <td width="23%">KEGIATAN</td>
    <td>URAIAN</td>
    <td>-</td>
</tr>
<?PHP 
    $cpf_vkeg02_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg02_02 WHERE idmain_keg_01='$cpf_vkeg01_sww[idmain_keg_01]' ");
            while($cpf_vkeg02_sww = $CL_FAS($cpf_vkeg02_sw)){
?>
<tr>
    <td><?PHP echo "<a href=?PG_SA=CPF01_MD_KEG02_01&PG_SA_SUB=CPF01_MD_KEG02_01_IN02&IDKEG02=$cpf_vkeg02_sww[idmain_keg_02]&UPKEG02=UPKEG02>". $cpf_vkeg02_sww['keg_nama_02']."</a>" ?></td>
    <td><?PHP echo $cpf_vkeg02_sww['keg_ket_02'] ?></td>
    <td><?PHP echo $cpf_vkeg02_sww['keg_rawat_02'] ?></td>
</tr>
<?PHP } ?>
</table>
<?PHP } ?>