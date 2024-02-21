<?PHP  
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
		$u = $ms_q("$call_sel TBUser where namauser='$_SESSION[namauser]'");
		$uu = $ms_fas($u);
			$vkry = $ms_q("$call_sel TKaryawan WHERE KaryNomor='$uu[kode]'");
				$vkryy = $ms_fas($vkry);
				$vkry_tgl= $ms_q("select CONVERT(varchar(10),[KaryTglLahir],101) as tg_lhr from Tkaryawan where KaryNomor='$vkryy[KaryNomor]'");
					$vkryy_tgl = $ms_fas($vkry_tgl);
		if($uu['akses']==4){ 
            $txt_tahun = $_GET['thn'];
?>
<div class="container">

        <?PHP 
            #DATA GAJI YAKKUM
            $epwc_vgajiy01_sw = $ms_q("$call_sel Citarum.dbo.TGajiYakkum WHERE KaryNomorYakkum='$vkryy[KaryNomorYakkum]' AND GajiBulan='$txt_tahun'");
                $epwc_vgajiy01_sww = $ms_fas($epwc_vgajiy01_sw);
               
                #substr("Hello world",6);
                
        ?>
               
				<table class="table">
				<tr>
					<td><img src="https://www.pantiwilasa-citarum.co.id/WEB-PWC/OPT-03/IMG/LOGO/logo_new.png" width="87" height="87"></td>
					<td width="71%">
					 <b>SLIP GAJI KECIL </b> <br> <?PHP #echo $vkryy['KaryNama']; ?>
					 <hr>
					 <table>
						<tr>
							<td>NIP</td>
							<td>:</td>
							<td><?PHP echo $vkryy['KaryNomorYakkum']; ?></td>
						</tr>
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td><?PHP echo $vkryy['KaryNama'];  ?></td>
						</tr>
						<tr>
							<td>Tahun</td>
							<td>:</td>
							<td><?PHP echo substr($txt_tahun,0,4)  ?></td>
						</tr>
						<tr>
							<td>Bulan</td>
							<td>:</td>
							<td><?PHP echo substr($txt_tahun,4);  ?></td>
						</tr>
					 </table>
					 
					</td>
				</tr>
				</table>
				
            <table class="striped">
                
                <tr>
                    <td><b>Potongan RS</b></td>
                    <td><?PHP echo ""; ?></td>
                </tr>
                <tr>
                    <td>Pot. RS - Obat</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiRSObat']) ?></td>
                </tr>
                <tr>
                    <td>Pot. RS - Bank</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiRSBank']) ?></td>
                </tr>
                <tr>
                    <td>Pot. RS - Seragam</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiRSSeragam']) ?></td>
                </tr>
                <tr>
                    <td>Pot. RS - Studi</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiRSStudi']) ?></td>
                </tr>
                <tr>
                    <td>Potongan PPNI / IBI</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiRSPPNI']) ?></td>
                </tr>
                <tr>
                    <td>Pot. RS - Biaya Perawatan</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiRSRawat']) ?></td>
                </tr>
                <tr>
                    <td>Pot. RS - Lain - Lain</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiRSLain']) ?></td>
                </tr>
                <tr>
                    <td><b>Potongan BMKK</b></td>
                    <td><?PHP echo ""; ?></td>
                </tr>
                <tr>
                    <td>Pot. BMKK - Iuran Anggota</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiBMKKIur']) ?></td>
                </tr>
                <tr>
                    <td>Pot. BMKK - Pinjaman</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiBMKKPinjaman']) ?></td>
                </tr>
                <tr>
                    <td>Pot. BMKK - Tali Asih</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiBMKKTaliAsih']) ?></td>
                </tr>
                <tr>
                    <td>Pot. BMKK - Tabungan</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiBMKKTabungan']) ?></td>
                </tr>
                <tr>
                    <td>Pot. BMKK - Kematian</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiBMKKMati']) ?></td>
                </tr>
                <tr>
                    <td>Pot. BMKK - Elektronik</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiBMKKElektronik']) ?></td>
                </tr>
                <tr>
                    <td>Pot. BMKK - Lain-Lain</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiBMKKLain']) ?></td>
                </tr>
                <?PHP 
                    #KONVSERI POTONGAN 02
                    $epwc_hit_tpot02_01 = $epwc_vgajiy01_sww['GajiRSObat'] + $epwc_vgajiy01_sww['GajiRSBank'] + $epwc_vgajiy01_sww['GajiRSSeragam'] + $epwc_vgajiy01_sww['GajiRSStudi'] + $epwc_vgajiy01_sww['GajiRSPPNI'] +  $epwc_vgajiy01_sww['GajiRSRawat'] + $epwc_vgajiy01_sww['GajiRSLain'] + $epwc_vgajiy01_sww['GajiBMKKIur'] + $epwc_vgajiy01_sww['GajiBMKKPinjaman'] + $epwc_vgajiy01_sww['GajiBMKKTaliAsih'] + $epwc_vgajiy01_sww['GajiBMKKTabungan'] + $epwc_vgajiy01_sww['GajiBMKKMati'] + $epwc_vgajiy01_sww['GajiBMKKElektronik'] ;

                ?>
                <tr>
                    <td><b>Total Pot RS & BMKK</b></td>
                    <td><?PHP echo "Rp ".$nf($epwc_hit_tpot02_01) ?></td>
                </tr>
                <tr class="blue lighten-3">
                    <td><b>Gaji Diterima</b></td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiDiterima']) ?></td>
                </tr>
            </table>
        </div>
        <script>
		    window.print();
	    </script>
        <!-- https://upah.yakkum.org/index.php/slipurl/webslip/ff328be2f8736ee3709a537622dc4f90/2023/01/04
        https://upah.yakkum.org/index.php/slipurl/webslip/cef5524641d35342a138832d05ffe4e9/2023/01/04 -->
        <?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
	?>