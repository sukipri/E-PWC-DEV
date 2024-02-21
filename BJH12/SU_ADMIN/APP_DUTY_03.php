<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
		<?php
			$IDKOP = @$sql_slash($_GET['IDKOP']);
			$IDDELCAT= @$sql_escape($_GET['IDDELCAT']);
			$DELPART = @$sql_slash($_GET['DELPART']);
			$DELPBR = @$sql_slash($_GET['DELPBR']);
			$DELTEM = @$sql_slash($_GET['DELTEM']);
				  $vkp = $ms_q("$call_sel tb_kop WHERE idmain_kop='$IDKOP'");
                        $vkpp = $ms_fas($vkp);
					 $vkpd = $ms_q("$call_sel tb_kop_detail WHERE idmain_kop='$IDKOP'");
                        $vkppd = $ms_fas($vkpd);
			//UPDATE
			if(isset($_POST['simpan_up'])){
				$kop = @$sql_slash($_POST['kop']);
				$tjn = @$sql_slash($_POST['tjn']);
				$htg = @$sql_slash($_POST['htg']);
				$jam = @$sql_slash($_POST['jam']);
				$tmp = @$sql_slash($_POST['tmp']);
				$acr = @$sql_slash($_POST['acr']);
				$tbr = @$sql_slash($_POST['tbr']);
				$trp = @$sql_slash($_POST['trp']);
				$brk = @$sql_slash($_POST['brk']);
				$plng = @$sql_slash($_POST['plng']);
				$png = @$sql_slash($_POST['png']);
				$ket = @$sql_slash($_POST['ket']);
				$skp = @$sql_slash($_POST['skp']);
				$tema = @$sql_slash($_POST['tema']);
				$bentuk = @$sql_slash($_POST['bentuk']);
				$pengirim = @$sql_slash($_POST['pengirim']);
				$kegiatan = @$sql_slash($_POST['kegiatan']);
				$jam_pel = @$sql_slash($_POST['jam_pel']);
				
					$ms_q("$up tb_kop_detail set tujuan='$tjn',hari_tgl_tugas='$htg',jam='$jam',tempat='$tmp',acara='$acr',stasiun='$tbr',hari_tgl_go='$brk',hari_tgl_out='$plng',trans='$trp',penanggung='$png',ket='$ket',app='3',skp='$skp',jam_pel='$jam_pel',pengirim='$pengirim',kegiatan='$kegiatan',bentuk='$bentuk',tema='$tema' WHERE idmain_kop_detail='$vkppd[idmain_kop_detail]'");
					header("location:?HLM=APP_DUTY_03&IDKOP=$IDKOP");
			}
			
			if(isset($_POST['pilih'])){
				$kry = @$sql_slash($_POST['kry']);
				//$jbt_struk = @$sql_slash($_POST['jbt_struk']);
					$ms_q("$in tb_kary_part values('$IDMAIN','$kry','$IDKOP','$vkppd[idmain_kop_detail]','$c_kode_vkryp','$vkppd[skp]','$vkppd[jam_pel]','')"); 
					header("location:?HLM=APP_DUTY_03&IDKOP=$IDKOP");
			}
			if(isset($_POST['pilih_02'])){
				$tembusan = @$sql_slash($_POST['tembusan']);
				$urutan= @$sql_slash($_POST['urutan']);
					$ms_q("$in tb_kary_tembusan values('$IDMAIN','$IDKOP','$c_kode_vkryt','$tembusan','$urutan')"); 
					header("location:?HLM=APP_DUTY_03&IDKOP=$IDKOP");
			}
			if(isset($_POST['pilih_03'])){
				$jenis_biaya = @$sql_slash($_POST['jenis_biaya']);
				$nom = @$sql_slash($_POST['nom']);
				$ket_nom = @$sql_slash($_POST['ket_nom']);
				$jml_part = @$sql_slash($_POST['jml_part']);
				
						
					$ms_q("$in tb_biaya_rekam_kop values('$IDMAIN','$jenis_biaya','$IDKOP','$c_kode_vbyjr','$nom','$jml_part','$date_html5','$ket_nom')"); 
					header("location:?HLM=APP_DUTY_03&IDKOP=$IDKOP");
			}
			
			
						//DELETE partisipan
						if(isset($_GET['DPART'])){
							$ms_q("$dl FROM tb_kary_part WHERE idmain_kary_part='$DELPART'");
								header("location:?HLM=APP_DUTY_03&IDKOP=$IDKOP");
						}			
						
						//DELETE biaya
						if(isset($_GET['DELBIAYA'])){
							$ms_q("$dl FROM tb_pembiayaan_rekam WHERE idmain_pembiayaan_rekam='$DELPBR'");
								header("location:?HLM=APP_DUTY_03&IDKOP=$IDKOP");
						}	
						if(isset($_GET['DTEM'])){
							$ms_q("$dl FROM tb_kary_tembusan WHERE idmain_kary_tembusan='$DELTEM'");
								header("location:?HLM=APP_DUTY_03&IDKOP=$IDKOP");
						}					
						
				//insert Biaya
			if(isset($_POST['pilih_biaya'])){
				$jpb = @$sql_slash($_POST['jpb']);
				$by_01 = @$sql_slash($_POST['by_01']);
				$nom_02 = @$sql_slash($_POST['nom_02']);
				$jml_hari = @$sql_slash($_POST['jml_hari']);
				$jml_orang = @$sql_slash($_POST['jml_orang']);
						$hit_nom_biaya = $nom_02 * $jml_hari ;
							$hit_nom_biaya_02 = $hit_nom_biaya * $jml_orang;
						$ms_q("$in tb_pembiayaan_rekam VALUES('$IDMAIN','$jpb','$by_01','$IDKOP','$c_kode_vpbr','$nom_02','$jml_hari','$jml_orang','$hit_nom_biaya_02')");
							header("location:?HLM=APP_DUTY_03&IDKOP=$IDKOP");
					
			}
				if(isset($_POST['pilih_cat'])){
					$cat = @$sql_slash($_POST['cat']);
						$ms_q("$in tb_cat_rekam VALUES('$IDMAIN','$cat','$IDKOP','$c_kode_vctr')");
						header("location:?HLM=APP_DUTY_03&IDKOP=$IDKOP");
				}
				
				if(isset($_POST['pilih_bidang'])){
					$bidang = @$sql_slash($_POST['bidang']);
						$ms_q("$in tb_kel_bidang_rekam VALUES('$IDMAIN','$bidang','$IDKOP','$c_kode_vkbdr')");
						header("location:?HLM=APP_DUTY_03&IDKOP=$IDKOP");
				}
						//delete cat rekam
							if(isset($_GET['DELCAT'])){
								$ms_q("$dl FROM tb_cat_rekam WHERE idmain_cat_rekam='$IDDELCAT'");	
							header("location:?HLM=APP_DUTY_03&IDKOP=$IDKOP");
							}
			?>
<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="HOME.php">Home</a></li>
			<li class="breadcrumb-item active">Langkah 01</li>
            <li class="breadcrumb-item active">Langkah  02</li>
            <li class="breadcrumb-item active">Langkah 03</li>
		</ol>
       <form method="post">
  <br>
          <!--   -->
        <table width="100%" style="max-width:60rem;" border="0" class="table table-bordered">
        
          <tr class="table-primary">
            <td colspan="3" >Daftar Isi Surat Tugas</td>
          </tr>
          <tr>
            <td width="42%"><b>Nomor</b><input type="text" readonly name="kop" style="max-width:20rem;" class="form-control" value="<?php echo"$vkpp[kop]"; ?>"></td>
            <td colspan="2"><b>Kota Tujuan</b><input type="text"  name="tjn" style="max-width:25rem;"  class="form-control" placeholder="Manado" value="<?php echo"$vkppd[tujuan]"; ?>" required></td>
          </tr>
          <tr class="table-info">
            <td colspan="3">Penjadwalan</td>
          </tr>
          <tr>
            <td><b>Hari & Tanggal</b><input type="text"  name="htg" style="max-width:25rem;" class="form-control" value="<?php echo"$vkppd[hari_tgl_tugas]"; ?>" required></td>
            <td colspan="2"><b>Jam</b><input type="text"  name="jam" style="max-width:25rem;" class="form-control" value="<?php echo"$vkppd[jam]"; ?>" required></td>
          </tr>
          <tr>
            <td rowspan="3"><b>Lokasi</b><input type="text"  name="tmp" style="max-width:25rem;" class="form-control" value="<?php echo"$vkppd[tempat]"; ?>" required></td>
            <td colspan="2"><b>Acara</b><textarea name="acr" class="form-control"><?php echo"$vkppd[acara]"; ?></textarea></td>
          </tr>
          <tr>
            <td width="25%">
            <!--
            <select name="bentuk" class="form-control" style="max-width:20rem;" required>
              <option value="">Bentuk...</option>
              <option value="Seminar">Seminar</option>
              <option value="Workshop">Workshop</option>
              <option value="Pelatihan">Pelatihan</option>
              <option value="Seminar & Workshop">Seminar & Workshop</option>
              <option value="Seminar,Workshop & Pelatihan">Seminar,Workshop & Pelatihan</option>
            </select>
            -->
           <b>Bentuk</b><input type="text"  name="bentuk" style="max-width:25rem;" class="form-control" value="<?php echo"$vkppd[bentuk]"; ?>" required>            </td>
            <td width="33%"><b>Tema</b><input type="text"  name="tema" style="max-width:25rem;" class="form-control" value="<?php echo"$vkppd[tema]"; ?>" required></td>
          </tr>
          <tr>
            <td>
            <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#buyer05"><i class="fas fa-clipboard"></i>&nbsp; Tambahkan Kelompok Bidang</a>
                <!-- modal kel Bidang -->
                
                  <div class="modal fade" id="buyer05" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Entri Kelompok Bidang</h5>
                          </div>
                          <div class="modal-body">
                            <select name="bidang" class="form-control">
                            <option value=""></option>
						<?php
                                $vkbd_03 = $ms_q("$call_sel tb_kel_bidang");
									while($vkbdd_03 = $ms_fas($vkbd_03)){
											echo"<option value=$vkbdd_03[idmain_kel_bidang]>$vkbdd_03[nama]</option>";
						}?>
                            </select>
                            <hr>
                            <!-- <input type="text" name="jbt_struk" class="form-control" placeholder="Structural Position..."> -->
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button  class="btn btn-primary" name="pilih_bidang">Save changes</button>
                          </div>
                        </div>
                      </div>
              </div>
            </td>
            <td>
            <!-- Preview Kelompok Bidang-->
            <b>Kelompok Bidang / Profesi</b><hr>
            	<?php
					$vkbdr_01 = $ms_q("$call_sel tb_kel_bidang_rekam WHERE idmain_kop='$IDKOP'");
						while($vkbddr_01 = $ms_fas($vkbdr_01)){
								$vkbd_04 = $ms_q("$call_sel tb_kel_bidang WHERE idmain_kel_bidang='$vkbddr_01[idmain_kel_bidang]'");
										$vkbdd_04 = $ms_fas($vkbd_04);
							echo"$vkbdd_04[nama]<br>";
						}
				?>
            
            </td>
          </tr>
          <tr class="table-info">
            <td colspan="3">Akomodasi</td>
          </tr>
          <tr>
            <td><b>Tempat Berangkat</b><input type="text"  name="tbr" style="max-width:25rem;" class="form-control" value="<?php echo"$vkppd[stasiun]"; ?>" required></td>
            <td colspan="2"><b>Sarana Trasportasi</b><input type="text"  name="trp" style="max-width:25rem;" class="form-control" value="<?php echo"$vkppd[trans]"; ?>" required></td>
          </tr>
          <tr>
            <td><b>Keberangkatan</b><input type="text"  name="brk" style="max-width:25rem;" class="form-control" value="<?php echo"$vkppd[hari_tgl_go]"; ?>" required></td>
            <td colspan="2"><b>Kepulangan</b><input type="text"  name="plng" style="max-width:25rem;" class="form-control" value="<?php echo"$vkppd[hari_tgl_out]"; ?>" required></td>
          </tr>
          <tr>
            <td><b>Penanggung</b><input type="text"  name="png" style="max-width:25rem;" class="form-control" value="<?php echo"$vkppd[penanggung]"; ?>" required></td>
            <td colspan="2">
            	 <!-- <b>Catatan</b> <textarea name="ket" class="form-control"><?php //echo"$vkppd[ket]"; ?></textarea> -->
                 <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#buyer04"><i class="fas fa-clipboard"></i>&nbsp; Tambahkan Catatan</a>
                <!-- modal cat -->
                
                  <div class="modal fade" id="buyer04" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Berikan Catatan</h5>
                          </div>
                          <div class="modal-body">
                            <select name="cat" class="form-control">
                            <option value=""></option>
						<?php
                                $vct_03 = $ms_q("$call_sel tb_cat_tugas ");
									while($vctt_03 = $ms_fas($vct_03)){
											echo"<option value=$vctt_03[idmain_cat_tugas]>$vctt_03[isi]</option>";
						}?>
                            </select>
                            <hr>
                            <!-- <input type="text" name="jbt_struk" class="form-control" placeholder="Structural Position..."> -->
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button  class="btn btn-primary" name="pilih_cat">Save changes</button>
                          </div>
                        </div>
                      </div>
              </div>
                <!-- modal cat -->
                <hr>
                <b>Setelah selesai Pelatihan :</b>
                <ol>
                <?php 
					  $vctr_01 = $ms_q("$call_sel tb_cat_rekam WHERE idmain_kop='$IDKOP' ");
									while($vcttr_01= $ms_fas($vctr_01)){
										 $vct_04 = $ms_q("$call_sel tb_cat_tugas WHERE idmain_cat_tugas='$vcttr_01[idmain_cat_tugas]' ");
											$vctt_04 = $ms_fas($vct_04);
										echo"<li>$vctt_04[isi] <a href=?HLM=APP_DUTY_03&IDKOP=$IDKOP&DELCAT=DELCAT&IDDELCAT=$vcttr_01[idmain_cat_rekam]>Delete?</a></li>";
							}
				?>
                </ol>            </td>
          </tr>
          <tr>
            <td><b>SKP</b><input type="number"  name="skp" style="max-width:10rem;" class="form-control" value="<?php echo"$vkppd[skp]"; ?>"  required></td>
            <td colspan="2"><b>Jumlah Jam</b><input type="text"  name="jam_pel" style="max-width:10rem;" class="form-control" value="<?php echo"$vkppd[jam_pel]"; ?>"  required></td>
          </tr>
          <tr>
            <td><b>Pengirim</b><input type="text" class="form-control" name="pengirim" value="<?php echo"$vkppd[pengirim]"; ?>" style="max-width:20rem;"></td>
            <td colspan="2"><b>Kegiatan</b><input type="text" class="form-control" name="kegiatan" value="<?php echo"$vkppd[kegiatan]"; ?>" style="max-width:20rem;"></td>
          </tr>
          <tr>
            <td>
              
            </td>
            <td colspan="2"><button name="simpan_up" onClick="return konfirmasi_simpan()" class="btn btn-success"><i class="fas fa-save"></i>&nbsp;Update</button></td>
          </tr>
        </table>
        <br>
         <table width="100%" style="max-width:60rem;" border="0" class="table table-bordered">
             <tr>
            <td width="26%">
            
            <!-- <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#buyer01"><i class="fas fa-plus"></i>&nbsp; Partisipan</a> -->
       
     		  <!-- <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#buyer02"><i class="fas fa-plus"></i>&nbsp; Tembusan</a>
              <br><br> --> 
               <a href="#"  onClick="MM_openBrWindow('<?php echo"APP_DUTY_03_PEM_TEM.php?IDKOP=$IDKOP"; ?>','','scrollbars=yes,width=600,height=400')" class="btn btn-info btn-sm"><i class="fas fa-plus"></i>&nbsp; Tembusan</a>
             <br><br>
             <a href="#"  onClick="MM_openBrWindow('<?php echo"APP_DUTY_03_PEM_PART.php?IDKOP=$IDKOP"; ?>','','scrollbars=yes,width=800,height=400')" class="btn btn-info btn-sm"><i class="fas fa-plus"></i>&nbsp; Peserta</a>
              <!-- <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#buyer03"><i class="fas fa-plus"></i>&nbsp; Pembiayaan Tugas</a>   -->
                                     <!-- Button trigger modal -->
                 
                    <!-- Modal 1 -->
        <div class="modal fade" id="buyer01" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pilih Partisipan</h5>
                          </div>
                          <div class="modal-body">
                            <select name="kry" class="form-control">
                            <option value=""></option>
                            <?php
								/*
								$vem = $ms_q("$sl idmain_kary,kode,nik,nama,alamat FROM tb_kary order by nama asc");
									while($vemm = $ms_fas($vem)){
										echo"<option value=$vemm[idmain_kary]> $vemm[nama] / $vemm[nik] /$vemm[alamat]</option>";
									}
									*/
									$vkry_pusat = $ms_q("$sl KaryNomor,KaryNama FROM TKaryawan order by KaryNama asc");
										$no = 1;
											while($vkryy_pusat = $ms_fas($vkry_pusat)){
												echo"<option value=$vkryy_pusat[KaryNomor]>$vkryy_pusat[KaryNama]</option>";
											}
							?>
                            </select>
                            <hr>
                            <!-- <input type="text" name="jbt_struk" class="form-control" placeholder="Structural Position..."> -->
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button  class="btn btn-primary" name="pilih">Save changes</button>
                          </div>
                        </div>
                      </div>
              </div>
                    
                                <!-- Modal 2 -->
        <div class="modal fade" id="buyer02" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Input Carbon Copy</h5>
                          </div>
                          <div class="modal-body">
                           <input type="text" name="tembusan" class="form-control" placeholder="CC.."> 
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button  class="btn btn-primary" name="pilih_02">Save changes</button>
                          </div>
                        </div>
                      </div>
              </div> 
                    <!-- Modal 3 -->
                      <div class="modal fade" id="buyer03" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Entry Cost </h5>
                          </div>
                          <div class="modal-body">
                        
                        <script>
							function showUser(str) {
							  if (str=="") {
								document.getElementById("txtHint").innerHTML="";
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
								  document.getElementById("txtHint").innerHTML=this.responseText;
								}
							  }
							  xmlhttp.open("GET","DATA_BIAYA_GET.php?q="+str,true);
							  xmlhttp.send();
							}
					</script>
				 <select style="max-width:15rem;" class="form-control" name="jpb" onChange="showUser(this.value)">
                 <option value=""></option>
              		<?php
						$vpbj = $ms_q("$call_sel tb_pembiayaan_jenis ");
							while($vpbjj = $ms_fas($vpbj)){
								echo"<option value=$vpbjj[idmain_pembiayaan_jenis]>$vpbjj[nama]</option>";
								}
					?>
						    </select>
                             <!-- penampil data -->
                        	<div id="txtHint"><b></b></div>
                             <!-- penampil data -->
                             
                          <!-- Penampil data -->
                            <script>
							function showUserr(str) {
							  if (str=="") {
								document.getElementById("txtHintt").innerHTML="";
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
								  document.getElementById("txtHintt").innerHTML=this.responseText;
								}
							  }
							  xmlhttp.open("GET","DATA_BIAYA_GET_02.php?qq="+str,true);
							  xmlhttp.send();
							}
					</script>
                             
                             <div id="txtHintt"><b></b></div>
                             <!-- -->
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button  class="btn btn-primary" name="pilih_biaya">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div> 
                    
               </td>
            <td width="74%">
            <h5>Participan</h5>
            <?php
				$vkrp = $ms_q("$call_sel tb_kary_part WHERE idmain_kop='$IDKOP'");
					$jum_vkrp = $ms_nr($vkrp);
					while($vkrrp = $ms_fas($vkrp)){
						$vem_02 = $ms_q("$sl KaryNomor,KaryNama,KaryAlamat FROM  TKaryawan WHERE KaryNomor='$vkrrp[idmain_kary]'");
									$vemm_02 = $ms_fas($vem_02);
					 ?>
					<input type="hidden" value="<?php echo"$jum_vkrp"; ?>" name="jml_part">
					<span class="badge badge-pill bg-secondary"><?php echo"$vemm_02[KaryNomor] $vemm_02[KaryNama]"; ?></span>
                    <a href="<?php echo"?HLM=APP_DUTY_03&IDKOP=$IDKOP&DELPART=$vkrrp[idmain_kary_part]&DPART=DPART"; ?>" onClick="return konfirmasi()"><i class="far fa-times-circle"></i></a> 
			<?php } ?>
            <br><br>
             <h5>Tembusan</h5>
            <?php
				$vkrt = $ms_q("$call_sel tb_kary_tembusan WHERE idmain_kop='$IDKOP'");
					while($vkrrt = $ms_fas($vkrt)){
					
					 ?>
					
					<span class="badge badge-pill bg-primary"><?php echo"$vkrrt[nama]"; ?></span>
                      <a href="<?php echo"?HLM=APP_DUTY_03&IDKOP=$IDKOP&DELTEM=$vkrrt[idmain_kary_tembusan]&DTEM=DTEM"; ?>" onClick="return konfirmasi()"><i class="far fa-times-circle"></i></a> 
			<?php } ?>    
            <br><br>       
               <h5>Biaya</h5>
            <?php
					$vpbr_02 = $ms_q("$call_sel tb_pembiayaan_rekam WHERE idmain_kop='$IDKOP'");
						while($vpbrr_02 = $ms_fas($vpbr_02)){
									$vpbj_02 = $ms_q("$call_sel tb_pembiayaan_jenis WHERE idmain_pembiayaan_jenis='$vpbrr_02[idmain_pembiayaan_jenis]' ");
										$vpbjj_02 = $ms_fas($vpbj_02);
							$hit_jum_hari = ($vpbrr_02['nominal'] * $vpbrr_02['jml_hari']) * $vpbrr_02['jml_orang'] ;
							$nom_vpbr = @$nf($hit_jum_hari);
						
					
					 ?>
					
					<span class="badge badge-pill bg-primary"><?php echo" $vpbjj_02[nama] <i>Rp.$nom_vpbr</i>"; ?></span>
                    <a href="<?php echo"?HLM=APP_DUTY_03&IDKOP=$IDKOP&DELPBR=$vpbrr_02[idmain_pembiayaan_rekam]&DELBIAYA=DELBIAYA#"; ?>" onClick="return konfirmasi()"><i class="far fa-times-circle"></i></a> 
			<?php } ?>  
      <br><br>
        <a href="<?php echo"EM_BPD_01_REDI.php?IDKOP01=$IDKOP"; ?>" target="_blank" class="btn btn-success btn-sm"><i class="far fa-file-excel"></i> BPD *XLS</a>
      
             </td>
          </tr>
             <tr>
               <td colspan="2">
                 <b>#TTD  dr.Yohanes Mada.S.,Sp.PD</b>
               <br>
               <a href="<?php echo"../SU_PUBLIC/CTK_SURAT_TUGAS.php?IDKOP=$IDKOP"; ?>" target="_blank" class="btn btn-danger btn-sm"><i class="far fa-file"></i>&nbsp;Cetak Surat Perjalanan </a>
               &nbsp;
               <a href="<?php echo"../SU_PUBLIC/CTK_BIAYA_PERJALANAN_DINAS.php?IDKOP=$IDKOP"; ?>" target="_blank" class="btn btn-info btn-sm"><i class="far fa-file"></i>&nbsp;Cetak BPD </a>
               &nbsp;
               <a href="<?php echo"../SU_PUBLIC/CTK_SURAT_TUGAS_02.php?IDKOP=$IDKOP"; ?>" target="_blank" class="btn btn-danger btn-sm"><i class="far fa-file"></i>&nbsp;Cetak Surat  Tugas </a>
               &nbsp;
               <a href="<?php echo"../SU_PUBLIC/CTK_SURAT_TUGAS_03.php?IDKOP=$IDKOP"; ?>" target="_blank" class="btn btn-danger btn-sm"><i class="far fa-file"></i>&nbsp;Cetak Surat  Pengijinan </a>
             </td></tr>
             <tr>
               <td colspan="2" class="table-warning">
               <b>#TTD  drg. Kriswidiati, M.Kes</b>
               <br>
               <a href="<?php echo"../SU_PUBLIC/CTK_SURAT_TUGAS_DK_02.php?IDKOP=$IDKOP"; ?>" target="_blank" class="btn btn-danger btn-sm"><i class="far fa-file"></i>&nbsp;Cetak Surat Perjalanan </a>
               &nbsp;
               <a href="<?php echo"../SU_PUBLIC/CTK_BIAYA_PERJALANAN_DINAS_DK_02.php?IDKOP=$IDKOP"; ?>" target="_blank" class="btn btn-info btn-sm"><i class="far fa-file"></i>&nbsp;Cetak BPD </a>
               &nbsp;
               <a href="<?php echo"../SU_PUBLIC/CTK_SURAT_TUGAS_02_DK_02.php?IDKOP=$IDKOP"; ?>" target="_blank" class="btn btn-danger btn-sm"><i class="far fa-file"></i>&nbsp;Cetak Surat  Tugas </a>
               &nbsp;
               <a href="<?php echo"../SU_PUBLIC/CTK_SURAT_TUGAS_03_DK_03.php?IDKOP=$IDKOP"; ?>" target="_blank" class="btn btn-danger btn-sm"><i class="far fa-file"></i>&nbsp;Cetak Surat  Pengijinan </a>
               </td>
             </tr>
             <tr>
               <td colspan="2" class="table-info">
                <b>#TTD  dr. Santi Kristiani, Sp.PK</b>
               <br>
               <a href="<?php echo"../SU_PUBLIC/CTK_SURAT_TUGAS_DK_03.php?IDKOP=$IDKOP"; ?>" target="_blank" class="btn btn-danger btn-sm"><i class="far fa-file"></i>&nbsp;Cetak Surat Perjalanan </a>
               &nbsp;
               <a href="<?php echo"../SU_PUBLIC/CTK_BIAYA_PERJALANAN_DINAS_DK_03.php?IDKOP=$IDKOP"; ?>" target="_blank" class="btn btn-info btn-sm"><i class="far fa-file"></i>&nbsp;Cetak BPD </a>
               &nbsp;
               <a href="<?php echo"../SU_PUBLIC/CTK_SURAT_TUGAS_02_DK_03.php?IDKOP=$IDKOP"; ?>" target="_blank" class="btn btn-danger btn-sm"><i class="far fa-file"></i>&nbsp;Cetak Surat  Tugas </a>
               &nbsp;
               <a href="<?php echo"../SU_PUBLIC/CTK_SURAT_TUGAS_03_DK_03.php?IDKOP=$IDKOP"; ?>" target="_blank" class="btn btn-danger btn-sm"><i class="far fa-file"></i>&nbsp;Cetak Surat  Pengijinan </a>
               </td>
             </tr>
         </table>
</form>
</body>
<?php } ?>
