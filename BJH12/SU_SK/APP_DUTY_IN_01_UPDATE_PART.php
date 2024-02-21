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
		?>
        <ol class="breadcrumb">
  			<li class="breadcrumb-item"><a href="HOME.php">Home</a></li>
                <li class="breadcrumb-item active"><a href="<?php echo"?HLM=APP_DUTY_IN_01_UPDATE&IDKOP=$IDKOP&IDKOPDTL=$IDKOPDTL"; ?>">Jadwal Rapat Internal [UPDATE]</a></li>
                <li class="breadcrumb-item active">Peserta Rapat</li>
        </ol>
       
<form method="post">
                     <table width="100%" border="0" class="table">
                       <tr>
                         <td width="53%">
                        <select style="max-width:30rem;" onChange="showUser(this.value)" name="kry" class="form-control">
                            <option value=""></option>
                            <?php
								/*
								$vem = $ms_q("$sl idmain_kary,kode,nik,nama,alamat FROM tb_kary order by nama asc");
									while($vemm = $ms_fas($vem)){
										echo"<option value=$vemm[idmain_kary]> $vemm[nama] / $vemm[nik] /$vemm[alamat]</option>";
									}
									*/
									$vkry_pusat = $ms_q("$sl KaryNomor,KaryNama FROM TKaryawan  WHERE NOT KaryStatus='91' AND NOT KaryStatus='99'  AND NOT KaryStatus='92'  AND NOT KaryStatus='94'  AND NOT KaryStatus='93' order by KaryNama asc");
										$no = 1;
											while($vkryy_pusat = $ms_fas($vkry_pusat)){
												echo"<option value=$vkryy_pusat[KaryNomor]>$vkryy_pusat[KaryNama]</option>";
											}
							?>
</select>
                            <hr>
                            <script>
							function showUser(str) {
							  if (str=="") {
								document.getElementById("txtHint_part").innerHTML="";
								return;
							  } 
							  if (window.XMLHttpRequest) {
								// code for IE7+, Firefox, Chrome, Opera, Safari
								xmlhttp=new XMLHttpRequest();
							  } else { // code for IE6, IE5
								xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
							  }
							  xmlhttp.onreadystatechange=function() {
								if (this.readyState==4 && this.status==200) {
								  document.getElementById("txtHint_part").innerHTML=this.responseText;
								}
							  }
							  xmlhttp.open("GET","DATA_PART_GET_01.php?qq_part="+str,true);
							  xmlhttp.send();
							}
					</script>
                     <div id="txtHint_part"><b></b></div>
                     <button class="btn btn-success btn-sm" name="simpan"><i class="far fa-save"></i>&nbsp; S.I.M.P.A.N</button>
        				<?php
							if(isset($_POST['simpan'])){
								$kd_kry = $sql_slash($_POST['kd_kry']);
									$ms_q("$in tb_kary_part VALUES ('$IDMAIN','$kd_kry','$IDKOP','$IDKOPDTL','$c_kode_vkryp','0','0','','','','','')");
								header("location:?HLM=APP_DUTY_IN_01_UPDATE_PART&IDKOP=$IDKOP&IDKOPDTL=$IDKOPDTL");
							}
						?>
                         </td>
                         <td width="47%">
                         <b><i class="fa fa-align-justify"></i> Daftar Peserta</b><br><br>
                         <?php
						 	$vkry_prt = $ms_q(" $sl idmain_kary_part,idmain_kary,idmain_kop FROM tb_kary_part WHERE idmain_kop='$IDKOP'");
								while($vkryy_prt = $ms_fas($vkry_prt)){
									$vkry_02 = $ms_q("$sl KaryNomor,KaryNama,UnitKode from TKaryawan WHERE KaryNomor='$vkryy_prt[idmain_kary]'");
										$vkryy_02 = $ms_fas($vkry_02);
												$vunit_03= mssql_query("select * from TUnitPrs WHERE UnitKode='$vkryy_02[UnitKode]'");
														$vunitt_03 = mssql_fetch_assoc($vunit_03);
									
						 ?>
                         	<i class="far fa-user"></i>&nbsp; <?php echo"$vkryy_02[KaryNama] / <i>$vunitt_03[UnitNama]</i>"; ?><br>
                         <?php } ?>
                         </td>
                       </tr>
                     </table>
                     </form>
</body>
<?php } ?>
