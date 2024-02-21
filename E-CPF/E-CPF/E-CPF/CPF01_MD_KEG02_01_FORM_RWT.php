<form method="post">
<div class="card border-primary mb-3" style="max-width: 25rem;">
  <div class="card-header"><a href="<?PHP echo"?PG_SA=CPF01_MD_KEG02_01&PG_SA_SUB=CPF01_MD_KEG02_01_FORM&IDKEG03=$IDKEG03"; ?>"><i class="fas fa-angle-double-left"></i> BACK </a> <?PHP echo"UPDATE VALUES"; ?>  </div>
  <div class="card-body">

<!--  -->
    <input type="number" class="form-control form-control-sm" name="rec_rawat_01" required style="max-width:10rem;" placeholder="Values" value="<?PHP echo $cpf_vw_vkeg0203rec_sww['rec_rawat_01'] ?>">
    <input type="number" class="form-control form-control-sm" name="rec_urut_01" required style="max-width:10rem;" placeholder="Nomor Entri..." value="<?PHP echo $cpf_vw_vkeg0203rec_sww_gen ?>">
    <br>
    <button class="btn btn-success btn-sm" name="rec02_up_01">UPDATE DATA</button>

<!--  -->

</div>
</div>
<?PHP include"../LOGIC/PRC/EXE_MIX.php"; ?>