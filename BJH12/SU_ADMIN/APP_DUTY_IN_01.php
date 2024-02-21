<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
		<?php
			$IDKOP = @$sql_slash($_GET['IDKOP']);
					$vkp_02 = $ms_q("$call_sel tb_kop WHERE app='1' order by tgl_input desc");
                       	 $vkpp_02 = $ms_fas($vkp_02);
             ?>
					<?php
						if(isset($_POST['simpan'])){
								$hari = @$sql_slash($_POST['hari']);
								$bulan = @$sql_slash($_POST['bulan']);
								$tahun = @$sql_slash($_POST['tahun']);
								$pic = @$sql_slash($_POST['pic']);
								$agenda = @$sql_slash($_POST['agenda']);
								$ruang = @$sql_slash($_POST['ruang']);
								$tgl_data = date("$tahun/$hari/$tahun");
									$save = $ms_q("$in tb_kop_in_detail VALUES('$IDMAIN','$IDKOP','$c_kode_vkpin','$pic','$agenda','$hari','$bulan','$tahun','$tahun-$bulan-$hari 00:00:00.000','','$ruang','')");
									$save_02 = $ms_q("$up tb_kop set app='2' WHERE idmain_kop='$IDKOP' ");
								
				if($save && $save_02){ header("location:?HLM=APP_DUTY_IN_01_UPDATE&IDKOP=$IDKOP&IDKOPDTL=$IDMAIN");  ?>
						<div class="alert alert-dismissible alert-success">
							 <strong>Well done!</strong> You successfully save...
						</div>
						<?php }else{ ?>
						<div class="alert alert-dismissible alert-danger">
							 <strong>Ula laaa!</strong> Save is Failed
						</div>
			<?php }} ?>

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="HOME.php">Home</a></li>
                <li class="breadcrumb-item active">Jadwal Rapat Internal</li>
        </ol>
        	<?php echo"<h5><b>Kop</b> $vkpp_02[kop] $vkpp_02[ket]"; ?></h5>
        	
        <form name="form1" method="post" action="">
          <table width="100%" class="table table-bordered" style="max-width:60rem;" border="0">
            <tr>
              <td width="38%">
              <b>Tanggal</b>
              	<select name="hari" style="max-width:15rem;" class="form-control" required>
                 <option value=""></option>
              		<?php
						$no_hari = 1;
							while( $no_hari <= 32){
									echo"<option value=$no_hari>$no_hari</option>";
							$no_hari++; }
					?>
                </select>              </td>
              <td width="25%">
               <b>Bulan</b>
              	<select name="bulan" class="form-control" required>
                <option value=""></option>
              		<?php
						$no_bulan = 1;
							while( $no_bulan <= 13){
									echo"<option value=$no_bulan>$no_bulan</option>";
							$no_bulan++; }
					?>
                </select>              </td>
              <td width="37%">
               <b>Tahun</b>
              	<select name="tahun" class="form-control" required>
              		<?php
						$thn_now = date("Y");
						//$no_tahun = 2017;
							//while( $no_tahun <= 2025){
									echo"<option value=$thn_now>$thn_now</option>";
							//$no_tahun++; }
					?>
                </select>              </td>
            </tr>
            <tr>
              <td>
              	<b>PIC</b>
                	<select name="pic" class="form-control" style="max-width:25rem;" required>
                    <option value=""></option>
                    	<?php
							$vkr_02 = $ms_q("$sl KaryNomor,KaryNama FROM TKaryawan WHERE NOT KaryStatus='9' order by KaryNama asc");
								while($vkrr_02 = $ms_fas($vkr_02)){
									echo"<option value=$vkrr_02[KaryNomor]>$vkrr_02[KaryNama]</option>";
								}
						?>
                    </select>              </td>
              <td colspan="2"><b>Agenda</b><textarea class="form-control" name="agenda"></textarea></td>
            </tr>
            <tr>
              <td><b>Ruang</b><input type="text" name="ruang" class="form-control"></td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" align="right">
               	<button  class="btn btn-primary" name="simpan">Save changes</button>
              </td>
            </tr>
          </table>
</form>
</body>

<?php } ?>
