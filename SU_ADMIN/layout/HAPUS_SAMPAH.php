
<body>
		<?php
			if(isset($_POST['hapus'])){
				$ms_q("$dl FROM TRawatJalan WHERE AppJenisDaftar='1'");
			}
		?>
        	<form method="post">
            	<button class="btn btn-danger btn-sm" onClick="return konfirmasi()" name="hapus">Hapus Data</button>
            </form>
        	<h4>-Pendaftaran Tidak Terpakai-</h4>
        	<table width="100%" border="0" class="table table-bordered">
          <tr class="info">
            <td width="2%">#</td>
            <td width="12%">No REG</td>
            <td width="6%">No RM</td>
            <td width="14%">Nama</td>
            <td width="14%">Alamat</td>
            <td width="9%">Tgl Pesan</td>
            <td width="10%">Tgl Periksa </td>
            <td width="29%">Dokter,Poli,Penanggung</td>
         <td width="4%">VIA</td>
          </tr>
		  	<?php
				$tg = date('d');
				$hit_dt = $tg + 1;
	$vps = @$ms_q("SELECT *  FROM TRawatJalan where    AppJenisDaftar='1' order by TanggalPesan desc");
					$no = 1;
					while($vpss = $ms_fas($vps)){
					$vpl = $ms_q("$call_sel TUnit where UnitKode='$vpss[UnitKode]'");
						$vpll = $ms_fas($vpl);
					$vdk = $ms_q("$sl PelakuKode,PelakuNama from TPelaku where PelakuKode='$vpss[DokterKode]'");
						$vdkk = $ms_fas($vdk);
					$vpr =  $ms_q("$sl PrshKode,PrshNama from TPerusahaan  where PrshKode='$vpss[PrshKode]'");
						$vprr = $ms_fas($vpr);
						$vrj_con= $ms_q("select CONVERT(varchar(10),[JalanRMTanggal],103) as tgl_rj from TRawatJalan where JalanNoReg='$vpss[JalanNoReg]'");
					$vrjj_con = $ms_fas($vrj_con);
					$vrj_con_02= $ms_q("select CONVERT(varchar(10),[TanggalPesan],103) as tgl_rjj from TRawatJalan where JalanNoReg='$vpss[JalanNoReg]'");
					$vrjj_con_02 = $ms_fas($vrj_con_02);
						//str_replcae
			$teksawal = "$vpll[UnitNama]";
 			$txt_01 = str_replace("Klinik Sp.", "", $teksawal);
				?>
          <tr>
            <td><?php echo"$no"; ?></td>
            <td>
			<?php echo"$vpss[JalanNoReg]"; ?>
			<?php
				if($vpss['AppJenisDaftar']==2){
				?>
				<a class="btn btn-success btn-sm">Success<?php echo"<b>&nbsp;#$vpss[JalanNoUrut]</b></a> "; ?>
				<?php }elseif($vpss['AppJenisDaftar']==1){?>
				<span class="badge badge-primary">On Proccess</span>
				<?php }elseif($vpss['AppJenisDaftar']==3){ ?>
				<a href="<?php echo"?HLM=LIST_DETAIL_DAFTAR&IDDKT=$vpss[DokterKode]&RM=$vpss[PasienNomorRM]&WAKTU=$vpss[WaktuPesan]&REG=$vpss[JalanNoReg]&LENGKAP=LENGKAP#LENGKAP"; ?>" class="btn btn-warning btn-sm">Butuh Persetujuan</a>
				<?php } ?>
			</td>
            <td><?php echo"<a href=?HLM=LIST_DETAIL_DAFTAR&IDDKT=$vpss[DokterKode]&RM=$vpss[PasienNomorRM]&WAKTU=$vpss[WaktuPesan]&REG=$vpss[JalanNoReg]&LENGKAP=LENGKAP#LENGKAP>$vpss[PasienNomorRM]</a>"; ?></td>
            <td><?php echo"$vpss[PasienNama]<br> Kode Waktu: <b>$vpss[WaktuPesan]</b>"; ?><br> <?php echo"Gender $vpss[PasienGender]"; ?></td>
            <td><?php echo"$vpss[PasienAlamat]"; ?></td>
                 <td><?php echo"$vrjj_con_02[tgl_rjj]"; ?></td>
            <td><?php echo"$vrjj_con[tgl_rj] "; ?></td>
            <td><?php 
			  echo"$vdkk[PelakuNama]<br>";
			 echo"$txt_01<br>";
			  echo"<b>$vprr[PrshNama]</b>";
			
			 //if(empty($vpss['JalanNoUrut'])){ echo"Kosong"; }else{ echo"$vpss[JalanNoUrut]"; } 
			 ?></td>
             <td align="center"><?php
			 		if($vpss['UserID1']=="MOBILE"){
			 ?>
               <h2><i class="fa fa-mobile"></i></h2>
               <?php }elseif($vpss['UserID1']=="WEB"){ ?>
               <h4><i class="fa fa-desktop"></i></h4>
               <?php }else{ ?>
			   	<h4><font color="#006633">ONLINE</font></h4>
				<?php } ?>
			</td>
          </tr>
		  <?php $no++; }  ?>
        </table>
</body>

