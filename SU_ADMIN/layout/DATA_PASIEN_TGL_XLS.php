
	
	<?PHP          
        $tg01 = @$_GET['tg01_bulan'];
        $tg02 = @$_GET['tg01_tahun'];
        $YR = date("Y");
    ?>

   
    <table  border="1" class="table table-bordered table-sm table-striped">
      <tr class="table-warning">
        <td width="5%">NO</td>
        <td width="19%">Nama</td>
        <td>Usia</td>
        <td>Pendidikan</td>
        <td>Agama</td>
        <td>Suku</td>
        <td>Bahasa</td>
        <td>Jenis Kelamin</td>
        <td>Status Perkawinan</td>
      </tr>
	  <?php
    $pwc_pasien_no = 1;
	   $vps =  $ms_q("$call_sel TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02'   order by PasienNama asc ");
			while($vpss = $ms_fas($vps)){
                #DATA VAR PENDIDIKAN
                $pwc_vvar01_sw  = $ms_q("$call_sel TAdmVar WHERE VarSeri='PENDIDIKAN' AND VarKode='$vpss[PasienPdk]' ");
                $pwc_vvar01_sww = $ms_fas($pwc_vvar01_sw);
                #DATA VAR AGAMA
                $pwc_vvar01_sw02  = $ms_q("$call_sel TAdmVar WHERE VarSeri='AGAMA' AND VarKode='$vpss[PasienAgama]' ");
                $pwc_vvar01_sww02 = $ms_fas($pwc_vvar01_sw02);
                 #DATA VAR SUKU
                 $pwc_vvar01_sw03  = $ms_q("$call_sel TAdmVar WHERE VarSeri='SUKUBANGSA' AND VarKode='$vpss[PasienSukuBangsa]' ");
                 $pwc_vvar01_sww03 = $ms_fas($pwc_vvar01_sw03);
                 #DATA VAR KAWIN
                 $pwc_vvar01_sw04  = $ms_q("$call_sel TAdmVar WHERE VarSeri='KAWIN' AND VarKode='$vpss[PasienStatusKw]' ");
                 $pwc_vvar01_sww04 = $ms_fas($pwc_vvar01_sw04);          
                 #DATA VAR bahasa
                 $pwc_vvar01_sw05  = $ms_q("$call_sel TAdmVar WHERE VarSeri='BAHASA' AND VarKode='$vpss[PasienBahasa]' ");
                 $pwc_vvar01_sww05 = $ms_fas($pwc_vvar01_sw05);
                 #KONVSERSI
                 $pwc_sub_vpsn01_sw = substr($vpss['PasienTglLahir'],4);
                 $pwc_sub_vpsn01_sw02 = $YR - $pwc_sub_vpsn01_sw ;

				
			 ?>
      <tr>
        <td><?PHP echo $pwc_pasien_no; ?></td>
        <td>
        <?php echo"<a href=?HLM=RIWAYAT_RAWAT&RM=$vpss[PasienNomorRM]#REKAMMEDIS>$vpss[PasienNomorRM]</a>"; ?>
        <br>
            <?php echo"$vpss[PasienNama]"; ?></td>
        <td><?php echo" $pwc_sub_vpsn01_sw02"; ?></td>
        <td><?php echo"$pwc_vvar01_sww[VarNama]"; ?></td>
        <td><?php echo" $pwc_vvar01_sww02[VarNama]"; ?></td>
        <td><?php echo"$pwc_vvar01_sww03[VarNama]"; ?></td> 
        <td><?php echo"$pwc_vvar01_sww05[VarNama]"; ?></td>
        <td><?php echo"$vpss[PasienGender]"; ?></td>
        <td><?php echo"$pwc_vvar01_sww04[VarNama]"; ?></td>
      </tr>
   
	  <?php $pwc_pasien_no++;} $jum_vps = $ms_nr($vps); 
             #DATA VAR PENDIDIKAN
             $vps_nr_pdk =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienPdk='2' ");
                $vpss_nr_pdk = $ms_nr($vps_nr_pdk);
            $vps_nr_pdk02 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienPdk='3' ");
                $vpss_nr_pdk02 = $ms_nr($vps_nr_pdk02);
            $vps_nr_pdk03 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienPdk='4' ");
                $vpss_nr_pdk03 = $ms_nr($vps_nr_pdk03);
            $vps_nr_pdk04 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienPdk='5' ");
                $vpss_nr_pdk04 = $ms_nr($vps_nr_pdk04);
            $vps_nr_pdk05 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienPdk='6' ");
                $vpss_nr_pdk05 = $ms_nr($vps_nr_pdk05);
            $vps_nr_pdk06 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienPdk='7' ");
                $vpss_nr_pdk06 = $ms_nr($vps_nr_pdk06);
            $vps_nr_pdk07 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienPdk='8'  ");
                $vpss_nr_pdk07 = $ms_nr($vps_nr_pdk07);
            $vps_nr_pdk08 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienPdk='1'  ");
                $vpss_nr_pdk08 = $ms_nr($vps_nr_pdk08);

             #DATA VAR AGAMA
            $vps_nr_ag =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienAgama='3' ");
                $vpss_nr_ag = $ms_nr($vps_nr_ag);
            $vps_nr_ag02 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienAgama='2' ");
                $vpss_nr_ag02 = $ms_nr($vps_nr_ag02);
            $vps_nr_ag03 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienAgama='4' ");
                $vpss_nr_ag03 = $ms_nr($vps_nr_ag03);
            $vps_nr_ag04=  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienAgama='5' ");
                $vpss_nr_ag04 = $ms_nr($vps_nr_ag04);
            $vps_nr_ag05 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienAgama='6' ");
                $vpss_nr_ag05 = $ms_nr($vps_nr_ag05);
            $vps_nr_ag06 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienAgama='8' ");
                $vpss_nr_ag06 = $ms_nr($vps_nr_ag06);
            $vps_nr_ag07 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienAgama='1' ");
                $vpss_nr_ag07 = $ms_nr($vps_nr_ag07);
            $vps_nr_ag08 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienAgama='7' ");
                $vpss_nr_ag08 = $ms_nr($vps_nr_ag08);

            #DATA VAR SUKU
            $vps_nr_sk =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienSukuBangsa='01' ");
                $vpss_nr_sk = $ms_nr($vps_nr_sk);
            $vps_nr_sk02 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienSukuBangsa='02' ");
                $vpss_nr_sk02 = $ms_nr($vps_nr_sk02);    
            $vps_nr_sk03 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienSukuBangsa='03' ");
                $vpss_nr_sk03 = $ms_nr($vps_nr_sk03);    
            $vps_nr_sk04 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienSukuBangsa='04' ");
                $vpss_nr_sk04 = $ms_nr($vps_nr_sk04);    
            $vps_nr_sk05 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienSukuBangsa='05' ");
                $vpss_nr_sk02 = $ms_nr($vps_nr_sk05);    
            $vps_nr_sk06 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienSukuBangsa='09' ");
                $vpss_nr_sk06 = $ms_nr($vps_nr_sk06);

             #DATA VAR BAHASA
             $vps_nr_bhs =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienBahasa='01' ");
                $vpss_nr_bhs = $ms_nr($vps_nr_bhs);
             $vps_nr_bhs02 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienBahasa='02' ");
                 $vpss_nr_bhs02 = $ms_nr($vps_nr_bhs02);
             $vps_nr_bhs03 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienBahasa='03' ");
                $vpss_nr_bhs03 = $ms_nr($vps_nr_bhs03);
            $vps_nr_bhs04 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienBahasa='04' ");
                $vpss_nr_bhs04 = $ms_nr($vps_nr_bhs04);
            $vps_nr_bhs05 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienBahasa='05' ");
                $vpss_nr_bhs05 = $ms_nr($vps_nr_bhs05);
            $vps_nr_bhs06 =  $ms_q("$sl PasienNomorRM,PasienPdk FROM TPasien  where PasienTglInput BETWEEN '$tg01' AND '$tg02' AND PasienBahasa='06' ");
                $vpss_nr_bhs06 = $ms_nr($vps_nr_bhs06);

                #KONVERSI 
                $vps_hit_pdk_sw = $vpss_nr_pdk07 + $vpss_nr_pdk08;
                $vps_hit_ag_sw = $vpss_nr_ag07 + $vpss_nr_ag08;
          
      ?>
	     <tr>
        <td colspan="8">-</td>
      </tr>
	
    </table>
            <br>
            <table class="table table-sm" border="1">
            <tr>
                <td width="17%">
                    <span class="badge bg-dark">TOTAL PASIEN <?PHP echo "$jum_vps";  ?> </span>
                   
                </td>
                <td>
                <span class="badge bg-dark">PENDIDIKAN</span>
                     <!--  -->
                     <ul class="list-group" style="max-width:20rem;">
                        <li class="list-group-item d-flex justify-content-between align-items-center">SD
                        <span class="badge bg-primary rounded-pill"><?PHP echo "$vpss_nr_pdk";  ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">SLTP
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_pdk02);  ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">SLTA
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_pdk03);  ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">AKADEMIK
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_pdk04);  ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">SARJANA
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_pdk05);  ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">PASCA SARJANA
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_pdk06);  ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tidak Bersekolah  / Lain-Lain
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vps_hit_pdk_sw);  ?></span>
                        </li>
                  </ul>
                </td>
                <td>
                <span class="badge bg-dark">AGAMA</span>
                     <!--  -->
                     <ul class="list-group" style="max-width:20rem;">
                        <li class="list-group-item d-flex justify-content-between align-items-center">Kristen
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_ag);  ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Katolik
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_ag02);  ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Hindu
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_ag03);  ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Budha
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_ag04);  ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Islam
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_ag05);  ?></span>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Khonghucu
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_ag06);  ?></span>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tanpa Ket / Lainnya
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vps_hit_ag_sw);  ?></span>
                        </li>
                        </li>
                    </ul>
                </td>
            <td>
            <span class="badge bg-dark">SUKU</span>
                <!--  -->
                <ul class="list-group" style="max-width:20rem;">
                        <li class="list-group-item d-flex justify-content-between align-items-center">JAWA
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_sk);  ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">BATAK
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_sk02);  ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">SUNDA
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_sk03);  ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">TIONGHOA
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_sk04);  ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">MADURA
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_sk05);  ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">LAINYA
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_sk06);  ?></span>
                        </li>
                    </ul>
            </td>
            <td>
            <span class="badge bg-dark">BAHASA</span>
                <!--  -->
                <ul class="list-group" style="max-width:20rem;">
                        <li class="list-group-item d-flex justify-content-between align-items-center">INDONESIA
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_bhs);  ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">JAWA
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_bhs02);  ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">SUNDA
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_bhs03);  ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">BATAK
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_bhs04);  ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">INGGRIS
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_bhs05);  ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">MANDARIN
                        <span class="badge bg-primary rounded-pill"><?PHP echo @$nf($vpss_nr_bhs06);  ?></span>
                        </li>
                    </ul>
            </td>
            </tr>
            </table>
            <br>
           
