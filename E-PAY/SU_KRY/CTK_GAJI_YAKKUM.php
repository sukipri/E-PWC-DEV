<?PHP  
   //error_reporting(0);
		ob_start();
		session_start();
		
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	 	   
		include"css.php";
		include"../CONFIG_INTERNAL.php";
		$txt_tahun = @$_GET['thn'];
		$idkry = @$_GET['idkry'];
		//User assigment
		$u = $ms_q("$call_sel TBUser where namauser='$_SESSION[namauser]'");
		$uu = $ms_fas($u);
			$vkry = $ms_q("$call_sel TKaryawan WHERE KaryNomorYakkum='$idkry'");
				$vkryy = $ms_fas($vkry);
				$vkry_tgl= $ms_q("select CONVERT(varchar(10),[KaryTglLahir],101) as tg_lhr from Tkaryawan where KaryNomorYakkum='$idkry'");
					$vkryy_tgl = $ms_fas($vkry_tgl);
	       
?>
<div class="container">

        <?PHP 
            #DATA GAJI YAKKUM
            $epwc_vgajiy01_sw = $ms_q("$call_sel Citarum.dbo.TGajiYakkum WHERE KaryNomorYakkum='$idkry' AND GajiBulan='$txt_tahun'");
                $epwc_vgajiy01_sww = $ms_fas($epwc_vgajiy01_sw);
               
                #substr("Hello world",6);
                
        ?>				
				<table class="table">
				<tr>
					<td><img src="logo_new.png" width="87" height="87"></td>
					<td width="71%">
					 <b>SLIP GAJI </b> <br> <?PHP #echo $vkryy['KaryNama']; ?>
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
                    <td><b>RINCIAN</b></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Upah Pokok 1</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiUpahPokok1']) ?></td>
                </tr>
                <tr>
                    <td>Upah Pokok 2</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiUpahPokok2']) ?></td>
                </tr>
                <tr>
                    <td>Tunjangan Transisi</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiTunjTransisi']) ?></td>
                </tr>
                <tr>
                    <td>Tunjangan Keluarga</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiTunjKelg']) ?></td>
                </tr>
                <?PHP 
                    #kumulatig gaji insentif
                    $epwc_hit_insetif_01  = $epwc_vgajiy01_sww['GajiInsentifTambahan'] + $epwc_vgajiy01_sww['GajiInsentifGizi']+ $epwc_vgajiy01_sww['GajiInsentifGizi'] + $epwc_vgajiy01_sww['GajiInsentifRM'] + $epwc_vgajiy01_sww['GajiInsentifManajer'] + $epwc_vgajiy01_sww['GajiInsentifVerifInternal'] + $epwc_vgajiy01_sww['GajiInsentifRad'] + $epwc_vgajiy01_sww['GajiInsentifProgrammer'] + $epwc_vgajiy01_sww['GajiJasaMedis'] ; 
                ?>
                 <tr>
                    <td>Insentif
					<?PHP if($vkryy['KaryNoUrut']=="0041"){ ?>
						<li>Programer</li>
						<li>Insentif Tambahan</li>
					<?PHP }elseif($vkryy['KaryNoUrut']=="0001"){ ?>
						<li>Medis</li>
						<li>Verifikator Internal</li>
						<li>Case Manager</li>
						<li>Insentif Tambahan</li>
					<?PHP }elseif($vkryy['KaryNoUrut']=="0005"){ ?>
						<li>Insentif Tambahan</li>
						<li>Tunj.Radiasi</li>
					<?PHP }elseif($vkryy['KaryNoUrut']=="0029"){ ?>
						<li>Insentif Tambahan</li>
						<li>Gizi</li>
					<?PHP }elseif($vkryy['KaryNoUrut']=="0010"){ ?>
						<li>Insentif Tambahan</li>
						<li>RM</li>
					<?PHP } ?>
					
					</td>
                    <td><?PHP  ?>
					<br>
						<?PHP 
							if($vkryy['KaryNoUrut']=="0041"){
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiInsentifProgrammer'])."</li>";
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiInsentifTambahan'])."</li>";
							}elseif($vkryy['KaryNoUrut']=="0001"){
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiJasaMedis'])."</li>";
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiInsentifVerifInternal'])."</li>";
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiInsentifManajer'])."</li>";
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiInsentifTambahan'])."</li>";
							}elseif($vkryy['KaryNoUrut']=="0005"){
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiInsentifRad'])."</li>";
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiInsentifVerifInternal'])."</li>";
							}elseif($vkryy['KaryNoUrut']=="0029"){
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiInsentifTambahan'])."</li>";
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiInsentifGizi'])."</li>";
							}elseif($vkryy['KaryNoUrut']=="0010"){
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiInsentifTambahan'])."</li>";
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiInsentifRM'])."</li>";
							}else{
								echo "Rp ".$nf($epwc_hit_insetif_01);
							}
						?>
					</td>
                </tr>
                <tr>
                    <td>Tunjangan Representatif</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiTunjRepresentatif']) ?></td>
                </tr>
                <tr>
                    <td>Lembur</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiLembur']) ?></td>
                </tr>
                <tr>
                    <td>Kompensasi</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiKompensasi']) ?></td>
                </tr>
                <?PHP 
                    #kumulatig gaji KINERJA
                    $epwc_hit_kinerja_01  = $epwc_vgajiy01_sww['GajiBonus'] + $epwc_vgajiy01_sww['GajiBonusBagian']+ $epwc_vgajiy01_sww['GajiBonusResep'] + $epwc_vgajiy01_sww['GajiHomeCare'] + $epwc_vgajiy01_sww['GajiMODPWC'] + $epwc_vgajiy01_sww['GajiMODKusuma'] + $epwc_vgajiy01_sww['GajiRapelan'] + $epwc_vgajiy01_sww['GajiJagaDokter'] + $epwc_vgajiy01_sww['GajiTunjKinerjaMin']; 
                ?>
               <tr>
                    <td>Tunjangan Kinerja
						<li>Bonus</li>
						<li>Bonus Bagian</li>
						<li>Rapelan</li>
						<li>MOD</li>
						<?PHP if($vkryy['KaryNoUrut']=="0001"){ ?>
						<li>Home Care</li>
						<li>MCU</li>
						<li>Dokter Jaga</li>
						<?PHP }elseif($vkryy['KaryNoUrut']=="0002" OR $vkryy['KaryNoUrut']=="0003" OR $vkryy['KaryNoUrut']=="0039" OR $vkryy['KaryNoUrut']=="0007"){ ?>
						<li>Home Care</li>
						<li>Resep</li>
						<li>Tunj.Kerja Minimal</li>
						<?PHP }elseif($vkryy['KaryNoUrut']=="0011"){ ?>
						<li>Home Care</li>
						<?PHP } ?>				
					</td>
                    <td><br>
						<?PHP 
							echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiBonus'])."</li>";
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiBonusBagian'])."</li>";
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiRapelan'])."</li>";
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiMODPWC'])."</li>";
								#echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiTunjKinerjaMin'])."</li>";
							if($vkryy['KaryNoUrut']=="0001"){
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiHomeCare'])."</li>";
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiMCUDokter'])."</li>";
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiJagaDokter'])."</li>";
							}elseif($vkryy['KaryNoUrut']=="0002" OR $vkryy['KaryNoUrut']=="0003" OR $vkryy['KaryNoUrut']=="0039" OR $vkryy['KaryNoUrut']=="0007"){
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiHomeCare'])."</li>";
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiBonusResep'])."</li>";
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiTunjKinerjaMin'])."</li>";
							}elseif($vkryy['KaryNoUrut']=="0011"){
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiHomeCare'])."</li>";
							}
						?>
					</td>
                </tr>
                <tr>
                    <td>Tunjangan Peralihan</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiTunjPeralihan']) ?></td>
                </tr>
                <tr>
                    <td>Tunjangan Jabatan</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiTunjJabatan']) ?></td>
                </tr>
				<?PHP 
                     #KONVERSI GAJI
                            $epwc_hit_gajiy_01 = $epwc_vgajiy01_sww['GajiUpahPokok1'] + $epwc_vgajiy01_sww['GajiUpahPokok2'] + $epwc_vgajiy01_sww['GajiTunjTransisi'] + $epwc_vgajiy01_sww['GajiTunjKelg'] + $epwc_hit_insetif_01 + $epwc_vgajiy01_sww['GajiTunjRepresentatif'] + $epwc_vgajiy01_sww['GajiLembur'] +  $epwc_vgajiy01_sww['GajiKompensasi'] + $epwc_hit_kinerja_01 + $epwc_vgajiy01_sww['GajiTunjPeralihan'] + $epwc_vgajiy01_sww['GajiTunjJabatan'] ;
                ?>
                <tr>
                    <td><b>Gaji Bruto</b></td>
                    <td><?PHP echo "Rp.". $nf($epwc_hit_gajiy_01); ?></td>
                </tr>
                <tr>
                    <td><b>Potongan Premi & Pph21</b></td>
                    <td><?PHP echo ""; ?></td>
                </tr>
                <!-- <tr>
                    <td>BPJS Kesehatan</td>
                    <td><?PHP #echo "Rp ".$nf($epwc_vgajiy01_sww['GajiPremiBPJS']) ?></td>
                </tr> -->
                <?PHP 
                    #KONVERSI BPJS
                    $epwc_hit_bpjsk_01  = $epwc_vgajiy01_sww['GajiPotAstekJHT'] + $epwc_vgajiy01_sww['GajiPotAstekJP'] ;
                ?>
                <tr>
                    <td>BPJS Ketenagakerjaan</td>
                    <td><?PHP echo "Rp ".$nf($epwc_hit_bpjsk_01) ?></td>
                </tr>
                <tr>
                    <td>DAPEN</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiPotDapen']) ?></td>
                </tr>
                <tr>
                    <td>Iuran Sukarela</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiPotIurSukarela']) ?></td>
                </tr>
                <tr>
                    <td>DPLK</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiPotDPLK']) ?></td>
                </tr>
                <!-- <tr>
                    <td>PPH21 DTP</td>
                    <td><?PHP  ?></td>
                </tr> -->
                <tr>
                    <td>PPH21</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiPPH21Sebulan']) ?></td>
                </tr>
                <?PHP 
                    #TOTAL POTONGAN 
                    $epwc_hit_tpot_01 =  $epwc_hit_bpjsk_01 + $epwc_vgajiy01_sww['GajiPotDapen'] + $epwc_vgajiy01_sww['GajiPotIurSukarela'] + $epwc_vgajiy01_sww['GajiPotDPLK']  +   $epwc_vgajiy01_sww['GajiPPH21Sebulan'] ;
                ?>
                <tr>
                    <td><b>TOTAL POTONGAN  Premi & Pph21 </b></td>
                    <td><?PHP echo "Rp.".$nf($epwc_hit_tpot_01); ?></td>
                </tr>
                
                <tr>
                    <td><b>GAJI BERSIH</b></td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiBersih']) ?></td>
                </tr>
            </table>
			<br><br><br>
			<!--  -->
			<table class="table-borderless">
			<tr>
			<td>
				<center>
				Kabag SDM 
				<br><br><br><br>
				<u>Bayu Setiawan, S.Pd</u>
				</center>
			</td>
			</tr>
			</table>
        </div>
        <script>
		    window.print();
	    </script>
        <!-- https://upah.yakkum.org/index.php/slipurl/webslip/ff328be2f8736ee3709a537622dc4f90/2023/01/04
        https://upah.yakkum.org/index.php/slipurl/webslip/cef5524641d35342a138832d05ffe4e9/2023/01/04 -->
        <?php
		
		ob_flush();
	?>