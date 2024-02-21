<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
		<?php
			$DELKOP = @$sql_slash($_GET['DELKOP']);
			if(isset($_GET['DKP'])){
				$ms_q("$dl FROM tb_kop WHERE idmain_kop='$DELKOP'");
				header("location:?HLM=KOP_M&SUB=KOP_M_DAFTAR_IN");
			}
		
		?>
       <?php include_once"KOP_M_DAFTAR_MENU.php"; ?>
        <h5> Daftar Nomor Surat Internal <a href=><i class="far fa-calendar-alt"></i>&nbsp;Lihat kalender</a></h5>
<table width="100%" style="max-width:70rem;" border="0" class="table table-striped">
          <tr class="table-info">
            <td width="18%">TGL Input</td>
            <td width="35%">ID</td>
            <td width="23%">KOP</td>
            <td width="24%">NOTE</td>
          </tr>
         <?php 
		 		$vkp = $ms_q("$sl TOP 300 * FROM tb_kop WHERE jenis='2' order by tgl_input desc ");
					while($vkpp = $ms_fas($vkp)){
					
		 ?>
          <tr>
            <td><?php echo"$vkpp[tgl_input]"; ?></td>
            <td><?php echo"$vkpp[kode]"; ?></td>
            <td><?php echo"$vkpp[kop]"; ?></td>
            <td><?php echo"$vkpp[ket]"; ?></td>
          </tr>
          <tr>
            <td colspan="4">
         
         <!-- <a href="" class="btn btn-primary btn-sm">Use Kop &nbsp; <i class="fas fa-file-export"></i></a> -->
         &nbsp;
         	   <?php if($vkpp['app']==1){ ?>
         <a href="<?php echo"?HLM=KOP_M&SUB=KOP_M_DAFTAR_IN&DELKOP=$vkpp[idmain_kop]&DKP=DKP#"; ?>" class="btn btn-danger btn-sm" onClick="return konfirmasi()"><i class="far fa-times-circle"></i>&nbsp;Delete</a>
         	&nbsp;
            <?php }elseif($vkpp['app']==2 || $vkpp['app']==4){ ?>
        <a href="<?php echo"?HLM=APP_DUTY_IN_01_UPDATE&IDKOP=$vkpp[idmain_kop]&IDKOPDTL="; ?>" class="btn btn-success btn-sm">Detail &nbsp; <i class="fas fa-file-export"></i></a>
          &nbsp;
          <?php } ?>
    </td>
          </tr>
          <?php } ?>
        </table>
</body>
<?php } ?>
