
	<ol class="breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-circle-o-notch"></i>&nbsp;Data Pasien *Name</li>
    <li class="breadcrumb-item"> <a href="?HLM=DATA_PASIEN_TGL">Data Pasien *Daftar</a></li>
  </ol>
  
      <form name="form1" method="post" action="">
        <table width="594" border="0">
          <tr>
            <td width="253"><input type="text" name="nama" class="form-control" required placeholder="Masukan Nama/No RM"></td>
            <td width="156"><button name="cari" class="btn btn-success">Cari Pasien</button></td>
          </tr>
        </table>
      </form>
      
      <table  border="0" class="table table-bordered table-sm table-striped">
        <tr class="table-warning">
          <td>NO RM</td>
          <td>Nama</td>
          <td>Alamat</td>
          <td>Tlp</td>
          <td>Tlp HP</td>
          <td>Gender</td>
        </tr>
        <?php
            if(isset($_POST['cari'])){
              $nama = @trim($_POST['nama']);
         $vps =  $ms_q("$call_sel TPasien  order by PasienNama asc ");
              while($vpss = $ms_fas($vps)){
                  
               ?>
        <tr>
          <td><?php echo"<a href=?HLM=RIWAYAT_RAWAT&RM=$vpss[PasienNomorRM]#REKAMMEDIS>$vpss[PasienNomorRM]</a>"; ?></td>
          <td><?php echo"$vpss[PasienNama]"; ?></td>
          <td><?php echo"$vpss[PasienTglLahir]"; ?></td>
          <td><?php echo"$vpss[PasienTelp]"; ?></td>
          <td><?php echo"$vpss[PasienHp]"; ?></td>
          <td><?php echo"$vpss[PasienGender]"; ?></td>
        </tr>
     
        <?php } $jum_vps = $ms_nr($vps);   ?>
           <tr>
          <td colspan="5"><?php echo"Jumlah Pasien Dengan Kode <b>$nama <i> Adalah $jum_vps</i></b>"; ?></td>
        </tr>
        <?php } ?>
      </table>
  