<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
	<?php include_once"KOP_M_DAFTAR_MENU.php"; ?>
      <h5>Sortir per tanggal</h5>
      
      <form action="" method="post">
        <table width="100%" class="table" style="max-width:40rem;" border="0">
          <tr>
            <td><input type="date" name="tg1" class="form-control"></td>
            <td><input type="date" name="tg2" class="form-control"></td>
            <td><button class="btn btn-primary" name="cari"><i class="fas fa-search"></i>&nbsp; Sortir</button></td>
          </tr>
        </table>
      </form>
      <?php 
	  	if(isset($_POST['cari'])){
			$tg1 = @$sql_slash($_POST['tg1']);
			$tg2 = @$sql_slash($_POST['tg2']);
	  
	  ?>
      <table width="100%" style="max-width:70rem;" border="0" class="table table-striped">
          <tr class="table-info">
            <td width="18%">TGL Input</td>
            <td width="35%">ID</td>
            <td width="23%">KOP</td>
            <td width="24%">NOTE</td>
          </tr>
         <?php 
		 		$vkp = $ms_q("$call_sel tb_kop WHERE  tgl_input BETWEEN '$tg1' AND '$tg2' ");
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
            <?php if($vkpp['app']==1){ ?>
         <!-- <a href="" class="btn btn-primary btn-sm">Use Kop &nbsp; <i class="fas fa-file-export"></i></a> -->
         &nbsp;
         <a href="<?php echo"?HLM=KOP_M&SUB=KOP_M_DAFTAR&DELKOP=$vkpp[idmain_kop]&DKP=DKP#"; ?>" class="btn btn-danger btn-sm" onClick="return konfirmasi()"><i class="far fa-times-circle"></i>&nbsp;Delete</a>
         	<?php if($vkpp['jenis']==1){ ?>
          &nbsp;
          <font color="#0099CC"><b>EKS</b></font>
          		<?php }elseif($vkpp['jenis']==2){ ?>
                &nbsp;
                <font color="#006633"><b>IN</b></font>
               <?php } ?>
         <?php }elseif($vkpp['app']==2 || $vkpp['app']==4){ ?>
         		<?php if($vkpp['jenis']==1){ ?>
          <a href="<?php echo"?HLM=APP_DUTY_03&IDKOP=$vkpp[idmain_kop]"; ?>" class="btn btn-success btn-sm">Detail &nbsp; <i class="fas fa-file-export"></i></a>
          &nbsp;
          <font color="#0099CC"><b>EKS</b></font>
          		<?php }elseif($vkpp['jenis']==2){ ?>
                <a href="<?php echo"##"; ?>" class="btn btn-info btn-sm">Detail &nbsp; <i class="fas fa-file-export"></i></a>
                &nbsp;
                <font color="#006633"><b>IN</b></font>
				
          <?php }} ?> </td>
          </tr>
          <?php } ?>
</table>
<?php } ?>
</body>
<?php } ?>