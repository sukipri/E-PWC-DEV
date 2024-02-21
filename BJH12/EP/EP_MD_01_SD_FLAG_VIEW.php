<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
			<body>
            		<table width="100%" border="0" class="table table-bordered table-sm table-striped" style="max-width:35rem;">
                          <tr>
                            <td>#</td>
                            <td>ID REFF</td>
                            <td>KETERANGAN</td>
                          </tr>
                          <?PHP 
						  	$ep_flag_no = 1;
						  		$ep_vflag01_sw = $ms_q("$call_sel tb_ep_flag_01 order by flag_kode_01 desc");
									while($ep_vflag01_sww = $ms_fas($ep_vflag01_sw)){
						  ?>
                          <tr>
                            <td><?PHP echo"$ep_flag_no"; ?></td>
                            <td><?PHP echo"$ep_vflag01_sww[flag_kode_01]"; ?></td>
                            <td><?PHP echo"$ep_vflag01_sww[flag_ket_01]"; ?></td>
                          </tr>
                          
                          <?PHP $ep_flag_no++; } ?>
					</table>

            </body>
            
            
      <?PHP } ?>