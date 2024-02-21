
	<form action="" method="post">
	  <table width="44%">
        <tr>
          <td width="57%"><input type="text" class="form-control" placeholder="Masukan Nama Dokter......" name="nama" required></td>
          <td width="43%"><button name="cari" class="btn btn-warning">Cari Data</button></td>
        </tr>
      </table>
	  <?php
	  	if(isset($_POST['cari'])){
			$nama = @trim($_POST['nama']);
	  ?>
	  <br>
	<table width="100%"  border="0" class="table table-bordered">
          <tr class="info">
            <td width="2%">#</td>
            <td width="26%">Nama Dokter</td>
            <td width="55%">Praktik</td>
            <td width="17%">###</td>
          </tr>
		  	<?php
				
				$vdkt =  $ms_q("$call_sel TPelaku where PelakuNama LIKE '%$nama%' order by PelakuNama asc");
				$no = 1;
							while($vdktt = $ms_fas($vdkt)){
						$vpl = $ms_q("$sl UnitKode,UnitNama from TUnit where UnitKode='$vdktt[UnitKode]'");
							$vpll = $ms_fas($vpl);
						//str_replcae
				$teksawal = "$vpll[UnitNama]";
 			$txt_01 = str_replace("Klinik Sp.", "", $teksawal);
				?>
          <tr>
            <td><?php echo"$no"; ?></td>
            <td><?php echo"$vdktt[PelakuNama] //$vdktt[PelakuKode] <br> <b>$txt_01</b>"; ?> </td>
            <td><?php
					$vjdl = $ms_q("$call_sel JadwalDokter where DokterKode='$vdktt[PelakuKode]'");
					$vjdl_nr = $ms_nr($vjdl);
					while($vjdll = $ms_fas($vjdl)){
						if($vjdl_nr < 0 ){
							echo"Tidak Ada Praktik";
							}elseif($vjdl_nr > 0){
							echo"$vjdll[KetHari] $vjdll[KetJam] &nbsp; <i>$vjdll[Kuota]</i><br>";
					} }
						
			?></td>
            <td><a href="<?php echo"?HLM=DAFTAR_DETAIL_DOKTER&IDDKT=$vdktt[PelakuKode]#$vdktt[PelakuNama]"; ?>" class="btn btn-default btn-sm">Detail Dokter</a></td>
          </tr>
		  <?php $no++; } ?>
      </table>
	  <?php } ?>
	</form>
	</div>

