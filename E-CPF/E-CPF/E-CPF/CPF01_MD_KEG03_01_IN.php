<form method="post">
<div class="card border-primary mb-3" style="max-width: 25rem;">
  <div class="card-header">ENTRI PENUNJANG CPF</div>
  <div class="card-body">
 <!--  -->
    #NAMA PENUNJANG
    <input type="text" class="form-control form-control-sm" required name="keg_nama_01" value="<?PHP echo $cpf_vw03_vkeg01_sww['keg_nama_01'] ?>">
    #URUTAN
    <select name="keg_urut_01" class="form-control form-control-sm" required style="max-width:10rem;">
    <?PHP 
        $keg01_no = 1;
        while($keg01_no <= 20){
            if($cpf_vw03_vkeg01_sww['keg_urut_01']==$keg01_no){
                echo"<option value=$keg01_no selected>$keg01_no</option>";
            }else{
            echo"<option value=$keg01_no>$keg01_no</option>";
              }
              $keg01_no++; }
    ?>
    </select>
    #URAIAN PENUNJANG
    <textarea class="form-control" required name="keg_ket_01"><?PHP echo $cpf_vw03_vkeg01_sww['keg_ket_01'] ?></textarea>
    <br>
    <?PHP if(isset($_GET['UPKEG01'])){ ?>
        <button class="btn btn-warning btn-sm" name="keg03_up_01">UPDATE DATA</button>
    <?PHP }else{ ?>
        <button class="btn btn-success btn-sm" name="keg03_simpan_01">SIMPAN DATA</button>
    <?PHP } ?>
 <!--  -->
  </div>
</div>

</form>
        <?PHP include"../LOGIC/PRC/EXE_MIX.php"; ?>
<br>
<table class="table table-sm table-bordered table-striped" style="max-width:43rem;">
<tr class="table-secondary">
    <td width="7%">#</td>
    <td width="30%">Penunjang</td>
    <td>Ket</td>
    <td width="20%">-</td>
</tr>
<?PHP 
     $keg01_no_urut = 1;
    $cpf_vkeg01_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg03_01 order by  CONVERT(INT,keg_urut_01) asc");
        while($cpf_vkeg01_sww = $CL_FAS($cpf_vkeg01_sw)){
?>
<tr>
    <td><?PHP echo  $cpf_vkeg01_sww['keg_urut_01'] ?></td>
    <td><?PHP echo "<a href=?PG_SA=CPF01_MD_KEG03_01&PG_SA_SUB=CPF01_MD_KEG03_01_IN&IDKEG01=$cpf_vkeg01_sww[idmain_keg_01]&UPKEG01=UPKEG01>".$cpf_vkeg01_sww['keg_nama_01']."</a>" ?></td>
    <td><?PHP echo $cpf_vkeg01_sww['keg_ket_01'] ?></td>
    <td>
        <a href="<?PHP echo"?PG_SA=CPF01_MD_KEG03_01&PG_SA_SUB=CPF01_MD_KEG03_01_IN&IDDELKEG01=$cpf_vkeg01_sww[idmain_keg_01]&DELKEG0301=DELKEG0301"; ?>" class="btn btn-danger btn-sm">DELETE</a>
    </td>
</tr>
<?PHP  $keg01_no_urut++; } ?>
</table>