<?PHP  
    #if($vkryy['KaryNomorYakkum']=="04181143" OR $vkryy['KaryNomorYakkum']=="04171083"){  
?>
<form method="post">
<select name="txt_tahun" required>
<option value=""></option>
<?PHP 
        $epwc_sl_vgajiy01_sw = $ms_q("$sl DISTINCT GajiBulan FROM Citarum.dbo.TGajiYakkum WHERE KaryNomorYakkum='$vkryy[KaryNomorYakkum]' AND GajiSTatus='1' order by GajiBulan desc");
        while($epwc_sl_vgajiy01_sww = $ms_fas($epwc_sl_vgajiy01_sw)){
            echo"<option value=$epwc_sl_vgajiy01_sww[GajiBulan]>$epwc_sl_vgajiy01_sww[GajiBulan]</option>";
        }
?>
</select>
<button class="waves-effect green darken-2 waves-light btn" name="go">GO</button>
</form>

<?PHP 
    if(isset($_POST['go'])){
        $txt_tahun = @$_POST['txt_tahun'];
        #echo "<b>GAJI BULAN $txt_tahun";
?>
        <?PHP 
            #DATA GAJI YAKKUM
            $epwc_vgajiy01_sw = $ms_q("$call_sel Citarum.dbo.TGajiYakkum WHERE KaryNomorYakkum='$vkryy[KaryNomorYakkum]' AND GajiBulan='$txt_tahun'");
                $epwc_vgajiy01_sww = $ms_fas($epwc_vgajiy01_sw);
               
                #substr("Hello world",6);
                
        ?>
            <table class="striped">
                <tr>
                    <td>NIP</td>
                    <td><?PHP echo $vkryy['KaryNomorYakkum'] ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><?PHP echo $vkryy['KaryNama'] ?></td>
                </tr>
                <tr>
                    <td>TAHUN</td>
                    <td><?PHP echo substr($txt_tahun,0,4); ?></td>
                </tr>
                <tr>
                    <td>Bulan</td>
                    <td><?PHP echo  substr($txt_tahun,4) ?></td>
                </tr>
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
                    $epwc_hit_insetif_01  = $epwc_vgajiy01_sww['GajiInsentifTambahan'] + $epwc_vgajiy01_sww['GajiInsentifGizi'] + $epwc_vgajiy01_sww['GajiInsentifRM'] + $epwc_vgajiy01_sww['GajiInsentifManajer'] + $epwc_vgajiy01_sww['GajiInsentifVerifInternal'] + $epwc_vgajiy01_sww['GajiInsentifRad'] + $epwc_vgajiy01_sww['GajiInsentifProgrammer'] + $epwc_vgajiy01_sww['GajiJasaMedis'] ; 
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
                    $epwc_hit_kinerja_01  = $epwc_vgajiy01_sww['GajiBonus'] + $epwc_vgajiy01_sww['GajiBonusBagian']+ $epwc_vgajiy01_sww['GajiBonusResep'] + $epwc_vgajiy01_sww['GajiHomeCare'] + $epwc_vgajiy01_sww['GajiMODPWC'] + $epwc_vgajiy01_sww['GajiMODKusuma'] + $epwc_vgajiy01_sww['GajiRapelan'] + $epwc_vgajiy01_sww['GajiJagaDokter'] + $epwc_vgajiy01_sww['GajiTunjKinerjaMin'] + $epwc_vgajiy01_sww['GajiMCUDokter']; 
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
						<?PHP }elseif($vkryy['KaryNoUrut']=="0007"){ ?>
						<li>Home Care</li>
						<li>Tunj.Kerja Minimal</li>
						<?PHP }elseif($vkryy['KaryNoUrut']=="0002" OR $vkryy['KaryNoUrut']=="0003" OR $vkryy['KaryNoUrut']=="0039"){ ?>
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
							if($vkryy['KaryNoUrut']=="0001"){
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiHomeCare'])."</li>";
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiMCUDokter'])."</li>";
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiJagaDokter'])."</li>";
							}elseif($vkryy['KaryNoUrut']=="0007"){
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiHomeCare'])."</li>";
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiTunjKinerjaMin'])."</li>";
							}elseif($vkryy['KaryNoUrut']=="0002" OR $vkryy['KaryNoUrut']=="0003" OR $vkryy['KaryNoUrut']=="0039"){
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiBonusResep'])."</li>";
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiTunjKinerjaMin'])."</li>";
							}elseif($vkryy['KaryNoUrut']=="0011"){
								echo"<li>Rp.".$nf($epwc_vgajiy01_sww['GajiHomeCare'])."</li>";
							}
						?>
					</td>
                </tr>
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
                    <td><b>Total Penerimaan</b></td>
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
                    <td>Gaji Bersih</td>
                    <td><?PHP echo "Rp ".$nf($epwc_vgajiy01_sww['GajiBersih']) ?></td>
                </tr>
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
            <br>
        <!-- https://upah.yakkum.org/index.php/slipurl/webslip/ff328be2f8736ee3709a537622dc4f90/2023/01/04
        https://upah.yakkum.org/index.php/slipurl/webslip/cef5524641d35342a138832d05ffe4e9/2023/01/04 -->
        <a href="<?PHP echo"CTK_GAJI_YAKKUM.php?thn=$txt_tahun"; ?>" target="_blank" class="btn">PRINT SLIP BESAR</a>
		&nbsp
		<a href="<?PHP echo"CTK_GAJI_YAKKUM02.php?thn=$txt_tahun"; ?>" target="_blank" class="btn">PRINT SLIP KECIL</a>
		
		<hr>
		*(lakukan pencetakan document melalui browser ( https://rspwc.net/E-PWC/E-PAY/ ) di copy lalu buka di Chrome / Firefox 
		
<?PHP } ?>