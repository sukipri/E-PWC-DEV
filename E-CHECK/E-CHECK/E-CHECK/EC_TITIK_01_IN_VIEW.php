<?php
		@ob_start();
		 @session_start();
			//..INCLUDER//
			
			//.....///
		//..Sesiion open../
		 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
 			include'../LOGIC/PG/PG_H_LOCATION.php';
       }else{
	
			if($vus01_sww['akses']==31){ 
		
?>
	
	<h5 class="">#List Titik</h5>
    <br>
    <div style="overflow:auto;width:55rem;;height:400px;padding:2px;border:1px solid #eee">
    <table width="100%" border="0" class="table table-bordered table-sm" style="max-width:60rem;">
          <tr class="table-info">
            <td width="3%">#</td>
            <td width="20%">ID</td>
            <td width="25%">Nama</td>
            <td width="18%">Pantauan</td>
            <td width="34%">Lokasi</td>
            <td width="34%">###</td>
          </tr>
         <?php 
		 	$ec_no_titik = 1;
		 	$ec_vtt01_sw = $CL_Q("$CL_SL tb_ec_titik_01 order by titik_kode_01 asc");
				while($ec_vtt01_sww = $CL_FAS($ec_vtt01_sw)){
		 ?>
          <tr>
            <td><?php echo"$ec_no_titik"; ?></td>
            <td><?php echo"$ec_vtt01_sww[titik_kode_01]"; ?></td>
            <td><?php echo"$ec_vtt01_sww[titik_nama_01]"; ?></td>
            <td>
            	<?php if($ec_vtt01_sww['idmain_kat_01']=="01"){ ?>
						<span class="badge badge-danger">#Beresiko</span>
				<?php }elseif($ec_vtt01_sww['idmain_kat_01']=="02"){
					echo"SIAGA 2";	
				}elseif($ec_vtt01_sww['idmain_kat_01']=="03"){
					echo"SIAGA 3";
				}
				?>

            </td>
            <td><?php echo"$ec_vtt01_sww[titik_lokasi_01]"; ?></td>
            <td>
            <?php 
					QRcode::png("http://182.253.60.178/E-PWC/E-CHECK/E-CHECK/$ec_vtt01_sww[idmain_titik_01]","image$ec_vtt01_sww[idmain_titik_01].png","H",4,4);
					echo"<img src=image$ec_vtt01_sww[idmain_titik_01].png width=120 height=120>";
				?>
            </td>
          </tr>
          <tr>
            <td colspan="6">
            <!-- -->
	            <a href="<?php echo"?PG_SA=EC_TITIK_01_VIEW&PG_SA_SUB=EC_TITIK_01_UP&IDTT01=$ec_vtt01_sww[idmain_titik_01]"; ?>" class="badge badge-warning">#Edit data</a>
            	&nbsp;
                <a href="<?PHP echo"E-CHECK/EC_QR_01.php"; ?>" target="_blank" class="badge badge-primary"><i class="fas fa-barcode"></i>&nbsp;Cetak Code</a>
            	
            <!-- -->
            </td>
          </tr>
          <?php $ec_no_titik++; } ?>
	</table>
	</div>
		<a href="<?PHP echo"E-CHECK/EC_QR_02.php"; ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-barcode"></i>&nbsp;Cetak semua QRCode</a>
<?php
		//..Session Close..//
		}else{
		  include'../LOGIC/PG/PG_H_LOCATION.php';
		} }
		ob_flush();
	
	?>