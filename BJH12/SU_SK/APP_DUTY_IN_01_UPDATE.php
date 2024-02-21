<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
		<?php
			$IDKOP = @$sql_slash($_GET['IDKOP']);
			$IDKOPDTL = @$sql_slash($_GET['IDKOPDTL']);
					$vkp_02 = $ms_q("$call_sel tb_kop WHERE idmain_kop='$IDKOP'");
                       	 $vkpp_02 = $ms_fas($vkp_02);
						 $vkpin_01 = $ms_q("$call_sel tb_kop_in_detail WHERE idmain_kop='$IDKOP'");
                       			 $vkpinn_01 = $ms_fas($vkpin_01);
						$vkpin_01_time = $ms_q("$sl convert(varchar(30),[tgl_data],8) as tgl_dt FROM tb_kop_in_detail WHERE idmain_kop='$IDKOP'");
                       			 $vkpinn_01_time = $ms_fas($vkpin_01_time);
								
						 	
             ?>
					<?php
						if(isset($_POST['simpan'])){
								$hari = @$sql_slash($_POST['hari']);
								$bulan = @$sql_slash($_POST['bulan']);
								$tahun = @$sql_slash($_POST['tahun']);
								$pic = @$sql_slash($_POST['pic']);
								$agenda = @$sql_slash($_POST['agenda']);
								$ruang = @$sql_slash($_POST['ruang']);
								$jam = @$sql_slash($_POST['jam']);
								$tgl_data = date("$tahun/$hari/$tahun");
									$save = $ms_q("$up tb_kop_in_detail set tgl='$hari',bulan='$bulan',tahun='$tahun',tgl_data='$tahun-$bulan-$hari',ruang='$ruang' , jam='$jam' WHERE idmain_kop='$IDKOP'");
								
				if($save){ header("location:?HLM=APP_DUTY_IN_01_UPDATE&IDKOP=$IDKOP&IDKOPDTL=$IDKOPDTL");  ?>
						<div class="alert alert-dismissible alert-success">
							 <strong>Well done!</strong> You successfully save...
						</div>
						<?php }else{ ?>
						<div class="alert alert-dismissible alert-danger">
							 <strong>Ula laaa!</strong> Save is Failed
						</div>
			<?php }} ?>
  	<?php 
				if(isset($_POST['acc'])){
					$ms_q("$up tb_kop set app='4' WHERE idmain_kop='$IDKOP'");
					header("location:?HLM=APP_DUTY_IN_01_UPDATE&IDKOP=$IDKOP&IDKOPDTL=$IDKOPDTL");
				}
				if(isset($_POST['batal_acc'])){
					$ms_q("$up tb_kop set app='2' WHERE idmain_kop='$IDKOP'");
					header("location:?HLM=APP_DUTY_IN_01_UPDATE&IDKOP=$IDKOP&IDKOPDTL=$IDKOPDTL");
				}
			
			?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="HOME.php">Home</a></li>
                <li class="breadcrumb-item active">Jadwal Rapat Internal [UPDATE]</li>
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
									if($vkpinn_01['tgl']==$no_hari){
									echo"<option value=$no_hari selected>$no_hari</option>";
									}else{
									echo"<option value=$no_hari>$no_hari</option>";
									}
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
							if($vkpinn_01['bulan']==$no_bulan){
									echo"<option value=$no_bulan selected>$no_bulan</option>";
										}else{
									echo"<option value=$no_bulan>$no_bulan</option>";
									}
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
              <td><b>Jam</b><input type="time" class="form-control" name="jam" value="<?php /* echo"$vkpinn_01_time[tgl_dt]"; */ echo"$vkpinn_01[jam]"; ?>"> </td>
              <td colspan="2"><b>Agenda</b><textarea class="form-control" name="agenda"><?php echo"$vkpinn_01[agenda]"; ?></textarea></td>
            </tr>
            <tr>
              <td>
              	<b>PIC</b>
                	<select name="pic" class="form-control" style="max-width:25rem;" required>
                    <option value=""></option>
                    	<?php
							$vkr_02 = $ms_q("$sl KaryNomor,KaryNama FROM TKaryawan WHERE NOT KaryStatus='9' order by KaryNama asc");
								while($vkrr_02 = $ms_fas($vkr_02)){
										if($vkpinn_01['KaryNomor']==$vkrr_02['KaryNomor']){
										echo"<option value=$vkrr_02[KaryNomor] selected>$vkrr_02[KaryNama]</option>";
										}else{
									echo"<option value=$vkrr_02[KaryNomor]>$vkrr_02[KaryNama]</option>";
								}}
						?>
                    </select>              </td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td><b>Ruang</b><input type="text" name="ruang" class="form-control" value="<?php echo"$vkpinn_01[ruang]"; ?>"></td>
              <td colspan="2">
              	<a href="<?php echo"?HLM=APP_DUTY_IN_01_UPDATE_ISI&IDKOP=$IDKOP&IDKOPDTL=$vkpinn_01[idmain_kop_in_detail]"; ?>" class="btn btn-warning"><i class="fas fa-file-alt"></i>&nbsp;Catatan Rapat</a>
                	&nbsp;
                <a href="<?php echo"?HLM=APP_DUTY_IN_01_UPDATE_PART&IDKOP=$IDKOP&IDKOPDTL=$vkpinn_01[idmain_kop_in_detail]"; ?>" class="btn btn-info"><i class="fas fa-file-alt"></i>&nbsp;Peserta</a>
              </td>
            </tr>
            <tr>
              <td colspan="3" align="right">
              	<?php if($vkpp_02['app']==2){ ?>
              	<button style="margin-right:20px;"  class="btn btn-primary" name="acc"><i class="fas fa-check"></i>&nbsp;Verif</button>  
               <?php }elseif($vkpp_02['app']==4){ ?>
               <button style="margin-right:20px;"  class="btn btn-danger" name="batal_acc"><i class="	fas fa-cut"></i>&nbsp;Batalkan</button>  
               <?php } ?>
               &nbsp;
               	<button  class="btn btn-success" name="simpan"><i class="fas fa-arrow-alt-circle-up"></i>&nbsp;Update</button>              </td>
            </tr>
          </table>
</form>
</body>

<?php } ?>
