<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>

	<table width="100%" style="max-width:70rem;" border="0" class="table table-striped">
              <tr>
                <td>Kode</td>
                <td>Nomor</td>
                <td>Acara</td>
                <td>##</td>
              </tr>
             <?php 
                    $vkp = $ms_q("$call_sel tb_kop WHERE app='1' order by tgl_input desc");
                        while($vkpp = $ms_fas($vkp)){
             ?>
              <tr>
                <td><?php echo"$vkpp[kode]"; ?></td>
                <td><?php echo"$vkpp[kop]"; ?></td>
                <td><?php echo"$vkpp[ket]"; ?></td>
                <td>
                 
         	<?php if($vkpp['jenis']==1){ ?>
            <a href="<?php echo"?HLM=APP_DUTY_02&IDKOP=$vkpp[idmain_kop]"; ?>" class="btn btn-primary">Use Kop &nbsp; <i class="fas fa-file-export"></i></a>
          &nbsp;
          <font color="#0099CC"><b>EKS</b></font>
          		<?php }elseif($vkpp['jenis']==2){ ?>
                <a href="<?php echo"?HLM=APP_DUTY_IN_01&IDKOP=$vkpp[idmain_kop]"; ?>" class="btn btn-info">Use Kop &nbsp; <i class="fas fa-file-export"></i></a>
                &nbsp;
                <font color="#006633"><b>IN</b></font>
               <?php } ?>
                
                </td>
              </tr>
          <?php } ?>
        </table>
</body>
<?php } ?>
