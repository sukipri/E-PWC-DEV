
<body>
		<h4><i class="fa fa-bars"></i>&nbsp;List Pendaftar Rawat Jalan</h4>
		<form method="post" action="">
		<table width="100%" border="0" class="table">
  <tr>
    <td><input type="date" name="tg1" class="form-control"></td>
    <td><input type="date" name="tg2" class="form-control"></td>
    <td><button name="cari" class="btn btn-info">Cari Data</button> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
  </form>

        <table width="100%" border="0" class="table table-bordered">
          <tr class="info">
                 <td width="2%">#</td>
            <td width="14%">NO REG</td>
            <td width="12%">NO RM</td>
            <td width="17%">Nama</td>
            <td width="19%">Alamat</td>
            <td width="11%">Tgl Pesan</td>
            <td width="6%">Tgl RM </td>
            <td width="6%">VIA</td>
            <td width="19%">Poli</td>
          </tr>
		  	<?php
				if(isset($_POST['cari'])){
					$tg1 = @$_POST['tg1'];
					$tg2 = @$_POST['tg2'];
				$vps = @$ms_q("SELECT  * FROM TRawatJalan where TanggalPesan BETWEEN '$tg1' AND '$tg2' AND JalanCaraDaftar='4' AND NOT AppJenisDaftar='1'  ORDER BY JalanRMTanggal DESC");
					$no = 1;
						
					while($vpss = $ms_fas($vps)){
						$no_rjk = @trim($vpss['JalanNoRujukan']);
					$vpl = $ms_q("$call_sel TUnit where UnitKode='$vpss[UnitKode]'");
						$vpll = $ms_fas($vpl);
			?>
          <tr>
            <td><?php echo"$no"; ?></td>
            <td>
			<?php echo"$vpss[JalanNoReg]"; ?>
			<br>
			<?php
				if($vpss['AppJenisDaftar']==2){
				?>
				<span class="badge badge-primary"><?php echo"<h4>#$vpss[JalanNoUrut]</h4> "; ?></span>
				<?php }elseif($vpss['AppJenisDaftar']==4){ ?>
				<b><font color="#CC3333"><b><i>Canceled</i></b></font></b>
				<?php } ?>
			</td>
            <td><?php echo"<a href=?HLM=LIST_DETAIL_DAFTAR&IDDKT=$vpss[DokterKode]&RM=$vpss[PasienNomorRM]&WAKTU=$vpss[WaktuPesan]&REG=$vpss[JalanNoReg]&NORJK=$no_rjk&LENGKAP=LENGKAP#LENGKAP>$vpss[PasienNomorRM]</a>"; ?></td>
            <td><?php echo"$vpss[PasienNama]"; ?><br><?php echo"Gender $vpss[PasienGender]"; ?></td>
            <td><?php echo"$vpss[PasienAlamat]"; ?></td>
            <td><?php echo"$vpss[TanggalPesan]"; ?></td>
            <td><?php echo"$vpss[JalanRMTanggal]"; ?></td>
            <td align="center"> <?php
			 		if($vpss['UserID1']=="MOBILE"){
			 ?>
               <h2><i class="fa fa-mobile"></i></h2>
               <?php }elseif($vpss['UserID1']=="WEB"){ ?>
               <h4><i class="fa fa-desktop"></i></h4>
               <?php }else{ ?>
			   	<h4><font color="#006633">ONLINE</font></h4>
			<?php } ?></td>
             <td>
			 <?php 
			 echo"$vpll[UnitNama]";
			 //if(empty($vpss['JalanNoUrut'])){ echo"Kosong"; }else{ echo"$vpss[JalanNoUrut]"; } 
			 ?>
			    <?php
				   	if($vpss['JalanStatus']==9){
				?>
						<b><font color="#CC3333"><b><i>Dibatalkan, Dengan alasan khusus</i></b></font></b>
				<?php }else{  ?>
		
	 			  <?php } ?>
			</td>
          </tr>
        
		  <?php $no++; }  ?>
		  <?php
		  	$vps_02 = @$ms_q("SELECT  * FROM TRawatJalan where TanggalPesan BETWEEN '$tg1' AND '$tg2' AND JalanCaraDaftar='4' AND AppJenisDaftar='2'   ORDER BY JalanRMTanggal DESC");
				$vps_02_jum = $ms_nr($vps_02);
			$vps_03 = @$ms_q("SELECT  * FROM TRawatJalan where TanggalPesan BETWEEN '$tg1' AND '$tg2' AND JalanCaraDaftar='4' AND AppJenisDaftar='4'   ORDER BY JalanRMTanggal DESC");
				$vps_03_jum = $ms_nr($vps_03);
		   ?>
		    <tr class="success">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><?php echo"Valid <b>$vps_02_jum</b>"; ?></td>
            <td><?php echo"Tidak Valid <b>$vps_03_jum</b>"; ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
		  <?php } ?>
        </table>
</body>

