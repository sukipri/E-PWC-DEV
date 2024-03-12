<form method="post">
<div class="card border-primary mb-3" style="max-width: 25rem;">
  <div class="card-header">FORM SET CPF 01</div>
  <div class="card-body">
<!--  -->
    #NAMA KASUS
    <input type="text" class="form-control form-control-sm" required name="keg_nama_03" value="<?PHP echo $cpf_vw03_vkeg03_sww['keg_nama_03'] ?>">
    #DENOM
    <input type="text" class="form-control form-control-sm" required name="keg_rawat_03" value="<?PHP echo $cpf_vw03_vkeg03_sww['keg_rawat_03'] ?>">
    #URAIAN KEGIATAN
    <textarea class="form-control" required name="keg_ket_03"></textarea>
    <br>
    <?PHP if(isset($_GET['UPKEG03'])){ ?>
        <button class="btn btn-warning btn-sm" name="keg03_up_03">UPDATE DATA</button>
    <?PHP }else{ ?>
        <button class="btn btn-success btn-sm" name="keg03_simpan_03">SIMPAN DATA</button>
    <?PHP } ?>
<!--  -->

</div>
</div>
<?PHP 
    include"../LOGIC/PRC/EXE_MIX.php";
?>