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
	<b>#Agenda Diklat & Rapat</b>
		<form method="post">
        
          <table width="100%" class="table" style="max-width:50rem;" border="0">
            <tr>
              <td width="24%">
              <select name="hari_02" style="max-width:15rem;" class="form-control" disabled required>
                <option value="">Tanggal</option>
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
              </select></td>
              <td width="27%"><select name="bulan_02" class="form-control" required>
                <option value="">Bulan</option>
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
              </select></td>
              <td width="18%"><select name="tahun_02" class="form-control" required>
                <?php
						$thn_now = date("Y");
						//$no_tahun = 2017;
							//while( $no_tahun <= 2025){
									echo"<option value=$thn_now>$thn_now</option>";
							//$no_tahun++; }
					?>
              </select></td>
              <td width="31%">
                	<button  class="btn btn-success" name="go"><i class="fas fa-arrow-alt-circle-up"></i>&nbsp;Tampilkan</button>
              </td>
            </tr>
          </table>
        </form>
        
        <?php 
				if(isset($_POST['go'])){
				
					$bulan_02 = @$_POST['bulan_02'];
					$tahun_02 = @$_POST['tahun_02'];
				
				
		?>
   <?php
   				/*
				$hari	= date("d");
				$bulan	= date ("m");
				$tahun	= date("Y");
				$hari	= date("d");
				*/
				$hari	= date("d");
				$bulan	= "$bulan_02";
				$tahun	= "$tahun_02";
				$jumlahhari=date("t",mktime(0,0,0,$bulan,$hari,$tahun));
						echo"<h5>Bulan $bulan Tahun $tahun</h5>";
			?>
     
           
<table width="200" border="0">
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table>
            
         
        <table style="border:2px solid #1E90FF" class="table table-bordered table-striped">
          <tr class="table-info">
          <td align=center><font color="#FF0000">Minggu</font></td>
          <td align=center>Senin</td>
          <td align=center>Selasa</td>
          <td align=center>Rabu</td>
          <td align=center>Kamis</td>
          <td align=center>Jumat</td>
          <td align=center>Sabtu</td>
          </tr>
          <?php
        $s=date ("w", mktime (0,0,0,$bulan,1,$tahun));
         
        for ($ds=1;$ds<=$s;$ds++) {
        echo "<td></td>";
        }
         
        for ($d=1;$d<=$jumlahhari;$d++) {
         
            if (date("w",mktime (0,0,0,$bulan,$d,$tahun)) == 0) {
                echo "<tr>"; 
                }
        $warna="#000000"; // warna default
         
        if (date("l",mktime (0,0,0,$bulan,$d,$tahun)) == "Sunday") { $warna="#FF0000"; }
			?>
          
       <td> 
     
       <!-- <a href="$tahun-$bulan-$d" data-toggle="modal" data-target="<?php //echo"#app_01_$d"; ?>"><?php //echo"<center><b>$d</b></center>"; ?></a> -->
       <!-- <a href="<?php echo"?HLM=APP_DUTY_IN_DAFTAR&SUB=DATA_KOP_GET_02&IDDT=$tahun-$bulan-$d"; ?>"><?php echo"<center><b>$d</b></center>"; ?></a> -->
       
       <a href="<?php echo"#?HLM=APP_DUTY_IN_DAFTAR&SUB=DATA_KOP_GET_02&IDDT=$tahun-$bulan-$d"; ?>"onClick="MM_openBrWindow('<?php echo"DATA_KOP_GET_02.php?IDDT=$tahun-$bulan-$d"; ?>','','scrollbars=yes,width=900,height=400')"><?php echo"<center><b>$d</b></center>"; ?></a>
         <!-- Modal 1 
         <div class="modal fade" id="<?php echo"app_01_$d"; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Jadwal Tugas / Rapat</h5>
                          </div>
                          <div class="modal-body">
                          	<select class="form-control" onChange="showUser(this.value)" name="kop_terbit">
                            <option value="">Nomor Kop terbit</option>
                       			<?php
										//echo"$tahun-$bulan-$d 00:00:00.000";
									  //$vkp = $ms_q("$call_sel tb_kop WHERE tgl_input = '$tahun-$bulan-$d 00:00:00.000'");
                    					   // while(//$vkpp = $ms_fas($vkp)){
												//echo"<option value=$vkpp[idmain_kop]>$vkpp[kop] $vkpp[ket]</option>";
								//}
								?>
                                </select>
                                
                                  <script>
							function showUser(str) {
							  if (str=="") {
								document.getElementById("txtHint_kop").innerHTML="";
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
								  document.getElementById("txtHint_kop").innerHTML=this.responseText;
								}
							  }
							  xmlhttp.open("GET","DATA_KOP_GET_01.php?qq_kop="+str,true);
							  xmlhttp.send();
							}
					</script>
                                	<div id="txtHint_kop"><b></b></div>
                                
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <!-- <button  class="btn btn-primary" name="pilih_02">Save changes</button> 
                          </div>
                        </div>
                      </div>
              </div> 
              -->
                <!-- Modal 1 -->
       </td>
        <?php
        if (date("w",mktime (0,0,0,$bulan,$d,$tahun)) == 6) { echo "</tr>"; }
        }
        
        ?>
        </table>
        <?php } ?>
        <?php //require"../logic/page_logic_sa_sub.php"; ?>
</body>

<?php } ?>
