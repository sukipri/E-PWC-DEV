

<body>
<div class="card border-primary mb-3" style="max-width: 20rem;">
  <div class="card-header"><h4 class="card-title">Entri User</h4></div>
  <div class="card-body">
  <form method="post">
   <!-- -->
   	<input type="text" class="form-control form-control-sm" name="cpf_kode_01" placeholder="Kode User..." autocomplete="off" required>
    <br>
    <input type="text" class="form-control form-control-sm" name="cpf_namauser_01" placeholder="Nama User..." autocomplete="off" required>
        <br>
    <input type="password" class="form-control form-control-sm" name="cpf_pass_01" placeholder="Password..." autocomplete="off" required>
 
   	<br><br>
    <button name="cpf_simpan_01" class="btn btn-success">Simpan Data User</button>
 	   
   <!-- -->
  </form>
  	<br>
     <?PHP include"../../LOGIC/PRC/EXE_IN.php"; ?>
  </div>
</div>

</body>