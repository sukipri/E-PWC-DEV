<span class="mx-2 badge bg-info">CHECK MORMET</span>
<br>
<div class="card border-primary mb-3 mx-2">
  <div class="card-header">ENTRI CHECK</div>
  <div class="card-body">
    <form method="post">
    <!--  -->
        #TANGGAL
        <input type="date" class="form-control form-control-sm" required name="cek_tglmasuk_01">
        #BIDANG
        <select name="cek_klp_01" required class="form-control form-control-sm">
        <?PHP 
        echo"<option value=>-</option>";
            $pwc_vmormet01_sw = $CL_Q("$CL_SL Citarum.dbo.TCekListVar order by VarKode asc");
                while($pwc_vmormet01_sww = $CL_FAS($pwc_vmormet01_sw)){
                    echo"<option value=$pwc_vmormet01_sww[VarKode]>$pwc_vmormet01_sww[VarNama]";
                }
        ?>
        </select>
        #STATUS
        <select name="cek_list_01" required class="form-control form-control-sm">
                <option value="-">-</option>
                <option value="A">ADA LAPORAN</option>
                <option value="T">TIDAK ADA LAPORAN</option>
        </select>
        #KETERANGAN
        <textarea name="cek_ket_01" class="form-control"></textarea>
        <br>
        <button class="btn btn-success btn-sm" name="cek_simpan_01">SIMPAN DATA</button>
    <!--  -->
            </form>
  </div>
</div>
<?PHP include"../LOGIC/PRC/EXE_MIX.php"; ?>

<a href="?PG_SA=EPWC_MORMET_01_VIEW" class="btn btn-outline-dark mx-2">DAFTAR MURMET</a>