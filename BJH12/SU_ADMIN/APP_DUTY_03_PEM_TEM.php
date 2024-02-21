<?php
		//error_reporting(0);
		ob_start();
		session_start();
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	 	   include'../logic/H_LOCATION.php';
			} else {
		include"css.php";
		include"../CONFIG_INTERNAL.php";
		//User assigment
		$u = $ms_q("select * from TBUser where namauser='$_SESSION[namauser]'");
		$uu = $ms_fas($u);
			if($uu['akses']==5){ 
		
			?>
            
            <?php 
				$IDKOP = @$sql_slash($_GET['IDKOP']);
				$DELTEM = @$sql_slash($_GET['DELTEM']);
					$vkp = $ms_q("$call_sel tb_kop WHERE idmain_kop='$IDKOP'");
                        $vkpp = $ms_fas($vkp);
						
						if(isset($_POST['pilih_02'])){
						$tembusan = @$sql_slash($_POST['tembusan']);
						$urutan= @$sql_slash($_POST['urutan']);
					$ms_q("$in tb_kary_tembusan values('$IDMAIN','$IDKOP','$c_kode_vkryt','$tembusan','$urutan')"); 
					header("location:APP_DUTY_03_PEM_TEM.php?IDKOP=$IDKOP");
			}
			
			if(isset($_GET['DTEM'])){
							$ms_q("$dl FROM tb_kary_tembusan WHERE idmain_kary_tembusan='$DELTEM'");
								header("location:APP_DUTY_03_PEM_TEM.php?IDKOP=$IDKOP");
						}					
						
			
			?>
            
<body>
		
                            <h5 class="modal-title" id="exampleModalLabel">Input Carbon Copy</h5>
        <form method="post" action="">            
                          <div class="modal-body">
                           <input type="text" name="tembusan" class="form-control" style="max-width:20rem;" placeholder="CC.."> 
                           <br>
                            <input type="number" name="urutan" style="max-width:10rem;" class="form-control" placeholder="Urutan.."> 
                           <!-- <select name="tembusan" class="form-control">
                          <option value=""></option>
                          <?php
						  		//$vunt = $ms_q("$sl UnitKode,UnitNama FROM TUnitPrs order by UnitNama asc ");
											//while($vuntt = $ms_fas($vunt)){
										//echo"<option value=$vuntt[UnitNama]>$vuntt[UnitNama]</option>";	
									//}
						  ?>
                          </select>
                          -->
                          </div>
                          <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" onClick="tutupWin()">Close</button>  -->
                            <button  class="btn btn-primary"  name="pilih_02">Save changes</button>
                          </div>
                          <br><br>
             <h5>Tembusan</h5>
            <?php
				$vkrt = $ms_q("$call_sel tb_kary_tembusan WHERE idmain_kop='$IDKOP'");
					while($vkrrt = $ms_fas($vkrt)){
					
					 ?>
					
					<span class="badge badge-pill badge-primary"><?php echo"$vkrrt[nama]"; ?></span>
                      <a href="<?php echo"APP_DUTY_03_PEM_TEM.php?IDKOP=$IDKOP&DELTEM=$vkrrt[idmain_kary_tembusan]&DTEM=DTEM"; ?>" onClick="return konfirmasi()"><i class="far fa-times-circle"></i></a> 
			<?php } ?> 
  </form>                
</body>

<?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
	?>
