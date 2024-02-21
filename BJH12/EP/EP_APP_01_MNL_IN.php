<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
        <span class="badge bg-info">#ENTRI MANUAL ABSENSI</span>
        <br><br>
        <div class="card border-primary mb-3" style="max-width: 20rem;">
            <div class="card-header">LIST PESERTA DIKLAT</div>
            <div class="card-body">
                <!-- -->
                <?PHP 
                
                    $ep_vdk01_sw = $ms_q("$call_sel   tb_kop_detail WHERE SUBSTRING(kode,5,6)='211001'  order by kode desc  ");
                        while($ep_vdk01_sww = $ms_fas($ep_vdk01_sw)){
                            #DATA_TRACING_KOP
                            $ep_vkryp01_sw = $ms_q("$sl idmain_kary_part,idmain_kary,idmain_kop,idmain_kop_detail FROM tb_kary_part WHERE idmain_kop_detail='$ep_vdk01_sww[idmain_kop_detail]'");
                                $ep_vkryp01_sww = $ms_fas($ep_vkryp01_sw);
                                
                            #data_tracing_karyawan
                            $ep_vkry01_sw = $ms_q("$sl KaryNomor,KaryNama FROM TKaryawan WHERE KaryNomor='$ep_vkryp01_sww[idmain_kary]'");
                            $ep_vkry01_sww = $ms_fas($ep_vkry01_sw);
                                    echo"<a href=#>{-}";
                                    echo $ep_vkry01_sww['KaryNama']."</a><br>";
                        }
                ?>
                <!-- -->
            </div>
            </div>


<?PHP } ?>