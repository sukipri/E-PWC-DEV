<?PHP
					include"API_HEADER.php";

                           $user_pwc = "PWC1001";
                           $pass_pwc = "1001PWC";
                           $token =  $pwc_vtoken01_sww['token_kode_01'];
                           $input_user_pwc = @$header['x-username'];
                           $input_token_pwc = @$header['x-token'];
							
							#$cr32_txt01 = crc32("230715122300");
							#RANDOM NUMBER;
							$num_01 = "1111111";
							#$num_01 = "1212121";
							$num_02 = "2222222";
							#$num_02 = "2121212";
							$num_03 = "3333333";
							#$num_03 = "3131313";
							$num_04 = "4444444";
							#$num_04 = "4141414";
							$num_05 = "5555555";
							$num_06 = "6666666";
							$num_07 = "7777777";
							$num_08 = "8888888";
							$num_09 = "9999999";
							
                           $REGRAND = rand("$num_07","$num_01");			  
						   #$REGRAND = rand('99','88');
                           $TXT_REGRAND = "PL-WS$REGRAND";
                           if($user_pwc==$input_user_pwc AND $token==$input_token_pwc){ #OPEN AUTH USERNAME
                    #VARIABLE DATA
						$nomorkartu = $data_input['nomorkartu'];
						$nik = $data_input['nik'];
						$nohp = $data_input['nohp'];
						$norm = $data_input['norm'];
						$kodedokter = $data_input['kodedokter'];
						$jampraktek = $data_input['jampraktek'];
						$jeniskunjungan = $data_input['jeniskunjungan'];
						$tanggalperiksa = $data_input['tanggalperiksa'];
						$kodepoli = $data_input['kodepoli'];
                      
					  #VALIDASI KONTROL
					  
                    #DATA PASIEN
                    $vpsn01_sw = $ms_q("$call_sel  Citarum.dbo.TPasien WHERE PasienNomorRM='$norm'");
                    $vpsn01_sww = $ms_fas($vpsn01_sw);
                    $vpsn01_nr_sww = $ms_fas($vpsn01_sw);
						
						#KALKULASI TANGGAL LAHIR
						$thn_vpsn01_sww = substr("$vpsn01_sww[PasienTglLahir]",4);
						$tanggal_lahir = new DateTime("$thn_vpsn01_sww");
						$sekarang = new DateTime("today");
						if ($tanggal_lahir > $sekarang) { 
						$thn = "0";
						$bln = "0";
						$tgl = "0";
						}
						$thn = $sekarang->diff($tanggal_lahir)->y;
						$bln = $sekarang->diff($tanggal_lahir)->m;
						$tgl = $sekarang->diff($tanggal_lahir)->d;
						#echo $thn." tahun ".$bln." bulan ".$tgl." hari";
					
                    #DATA POLI
                    $vunit01_sw = $ms_q("$sl UnitKode,UnitNama,PoliKodeBPJS FROM Citarum.dbo.TUnit WHERE PoliKodeBPJS='$kodepoli'");
                    $vunit01_sww = $ms_fas($vunit01_sw);
                    #DATA RANDOM DOKTER
                    $vdkt01_sw = $ms_q("$sl PelakuKode,PelakuNama,UnitKode FROM Citarum.dbo.TPelaku WHERE SpesKodeBPJS='$kodepoli' AND PelakuStatus='A' AND NOT SpesKode='PAKET' AND PelakuBPJSKode='$kodedokter'");
                    $vdkt01_sww = $ms_fas($vdkt01_sw);
					
                        if( $vpsn01_nr_sww < 0 || empty($norm) ){
                            $json_fetch = array(
                                'code' => 202,
                                //'test'=> $vjdw01_sub_sw,
                                'message' => 'Nomor RM Tidak ditemukan , silahkan mendaftar sebagai pasien baru'
                             );
                            $json = array(
                                'metadata' => $json_fetch
                            );   
                            $edata = json_encode($json);
                             echo "$edata";
                        }else{
					
                    #KONVERSI
                    $tanggalperiksa_d = date('D',strtotime($tanggalperiksa));
                    $jampraktek_d = substr($jampraktek,0,5);
                    $jampraktek_d2 = substr($jampraktek,-5);
                        if($tanggalperiksa_d=="Sun"){   
                            $hari_sw = 7;
                        }elseif($tanggalperiksa_d=="Mon" ){
                            $hari_sw = 1;
                        }elseif($tanggalperiksa_d=="Tue" ){
                            $hari_sw = 2;
                        }elseif($tanggalperiksa_d=="Wed" ){
                            $hari_sw = 3;
                        }elseif($tanggalperiksa_d=="Thu" ){
                            $hari_sw = 4;
                        }elseif($tanggalperiksa_d=="Fri" ){
                            $hari_sw = 5;
                        }elseif($tanggalperiksa_d=="Sat" ){
                            $hari_sw = 6;
                        }

                        
                    #DATA JADWAL
                    $vjdw01_sw = $ms_q("$sl DokterKode,KetHari,KetJam,Kuota,KuotaBPJS FROM Citarum.dbo.JadwalDokter WHERE DokterKode='$vdkt01_sww[PelakuKode]' AND cast(KetHari as varchar)='$hari_sw'");
                    $vjdw01_sww = $ms_fas($vjdw01_sw);
                    $vjdw01_nr_sww = $ms_nr($vjdw01_sw);  
                    $vjdw01_sub_sw = substr($vjdw01_sww['KetJam'],0,5);
                    #DATA JADWAL HFIZ
                    $vjhfis01_sw = $ms_q("$call_sel Citarum.dbo.TJadwalHFIZ WHERE KodeDok='$kodedokter' AND KodePoli='$kodepoli' AND  Jadwal='$jampraktek' AND Hari='$hari_sw'");
                    $vjhfis01_sww = $ms_fas($vjhfis01_sw);
                    $vjhfis01_nr_sww = $ms_nr($vjhfis01_sw);
					#----Jenis Kunjungan---#
					#DATA SKDP
					$skdp_sw = $ms_q("$call_sel Citarum.dbo.TSKDPPas WHERE PasienNomorRM='$norm' AND KntDPJPKode='$vjhfis01_sww[KodeDok]' order by KntTanggal desc  ");
					$skdp_sww   = $ms_fas($skdp_sw); #DATA SURAT KONTROL
					$rjk_sw = $ms_q("$sl PasienNomorRM,JalanNoRujukan from Citarum.dbo.TRawatJalan WHERE PasienNomorRM='$norm' order by JalanRMTanggal desc ");
					$rjk_sww = $ms_fas($rjk_sw); #DATA RUJUKAN
                  
                      if( $vjhfis01_nr_sww <= 0){
                        $json_fetch = array(
                            'code' => 201,
                           // 'test'=> $hari_sw,
                            'message' => 'Jadwal Tidak Ditemukan'
                         );
                        $json = array(
                            'metadata' => $json_fetch
                        );   
                        $edata = json_encode($json);
                         echo "$edata";
                      }else{
                    /*......................*/
                    #DATA RAWAT JALAN
                    $open_vrj01_sw = $ms_q("$sl JalanNoReg,PasienNomorRM,DokterKode,JalanNoUrut,JalanStatus FROM Citarum.dbo.TRawatJalan WHERE DokterKode='$vdkt01_sww[PelakuKode]' AND (JalanRMTanggal  BETWEEN '$tanggalperiksa $jampraktek_d' AND '$tanggalperiksa  $jampraktek_d2' ) AND NOT JalanStatus='9' AND NOT JalanStatus='1' AND UnitKode='$vdkt01_sww[UnitKode]'");
                    $open_nr_vrj01_sw = $ms_nr($open_vrj01_sw);
                    $open_vrj01_sww = $ms_fas($open_vrj01_sw);
					#KUOTA PAS
					$vdc_cek_01_psn = $ms_q("SELECT   JalanNoReg,PasienNomorRM FROM Citarum.dbo.TRawatJalan where DokterKode='$vdkt01_sww[PelakuKode]' AND    JalanRMTanggal between '$tanggalperiksa 00:00:00' AND '$tanggalperiksa 23:59:00'");
                    $vdcc_cek_01_psnn = $ms_nr($vdc_cek_01_psn);
					
                    #NOMOR REGISTER
                    $vdc_hit_01 = $ms_q("SELECT TOP 1  JalanNoUrut FROM Citarum.dbo.TRawatJalan where DokterKode = '$vdkt01_sww[PelakuKode]' AND JalanRMTanggal between '$tanggalperiksa $jampraktek_d' AND '$tanggalperiksa $jampraktek_d2' and not JalanStatus='9'    AND   JalanNoUrut > 0 order by Convert(Integer,JalanNoUrut) desc");
                    #CEKING DATA ANTRIAN 
                    /*"SELECT TOP 1 JalanNoUrut " & _
                        "FROM TRawatJalan " & _
                        "WHERE JalanRMTanggal BETWEEN @Tgl1 AND @Tgl2 AND DokterKode = @Dokter AND WaktuPesan = @WaktuPesan AND JalanNoUrut <> '' " & _
                        "ORDER BY Convert(Integer,JalanNoUrut) DESC " */

                    $open_cek_vrj01_sw = $ms_q("SELECT TOP 1 JalanNoReg,PasienNomorRM,DokterKode,JalanNoUrut,JalanStatus FROM Citarum.dbo.TRawatJalan WHERE DokterKode='$vdkt01_sww[PelakuKode]' AND JalanRMTanggal  BETWEEN '$tanggalperiksa' AND '$tanggalperiksa 23:59:00'  AND NOT JalanStatus='9'  AND NOT JalanNoUrut='00' AND WaktuPesan ='$vjhfis01_sww[PSM]'  order by Convert(Integer,JalanNoUrut) desc");
                    $open_urut_vrj01_sw = $ms_fas($open_cek_vrj01_sw);
                    $open_nr_urut_vrj01_sw = $ms_nr($open_cek_vrj01_sw);
                    #echo $open_urut_vrj01_sw['JalanNoUrut'];
                    #CEK DATA TRAWATJALAN
                    $vdc_cek_01 = $ms_q("SELECT TOP 1  JalanNoUrut FROM Citarum.dbo.TRawatJalan where   JalanRMTanggal between '$tanggalperiksa 00:00:00' AND '$tanggalperiksa 23:59:00'  AND PasienNomorRM='$norm'");
                    $vdcc_cek_01 = $ms_nr($vdc_cek_01);
                    $vdcc_hit_01 = $ms_fas($vdc_hit_01);
	
                        if($vdcc_cek_01 > 0){ #OPEN AUTH CEK DATA
                            $json_antrian_gagal = array(
                                "message"=> "Nomor Antrean Hanya Dapat Diambil 1 Kali Pada Tanggal Yang Sama",
                                "code"=> 201 
                            );
                            $data_json_antrian_gagal= json_encode($json_antrian_gagal);
                            echo "$data_json_antrian_gagal";
							/**/
						}elseif( $vdcc_cek_01_psnn >= $vjhfis01_sww['KapasitasPas']){ #OPEN AUTH CEK DATA $vjhfis01_sww['KapasitasPas']
                            $json_antrian_gagal_psn = array(
                                "message"=> "Kuota Pasien Sudah Penuh",
								"angkaantrean"=> $vdcc_cek_01_psnn,
                                "code"=> 201 
                            );
                            $data_json_antrian_gagal_psn= json_encode($json_antrian_gagal_psn);
                            echo "$data_json_antrian_gagal_psn";
							
                          }else{ #AUTH CEK DATA
                    
                    #LOGIC ANTRIAN
                    /*
                    if($open_nr_urut_vrj01_sw < 1 ){
                        $vdcc_jum_01 = $open_urut_vrj01_sw['JalanNoUrut'] + 1 ;	
                    }elseif($open_nr_urut_vrj01_sw > 5 ){
                        $vdcc_jum_01 = $open_urut_vrj01_sw['JalanNoUrut'] + 1 ;	
                   }else{
					   $vdcc_jum_01 = $open_urut_vrj01_sw['JalanNoUrut'] + 1 ;	
				   } 
                       */ 
                      #HITUNG COUNTER ANTRIAN
                        $vdcc_jum_01 =  $open_urut_vrj01_sw['JalanNoUrut'] + 1  ;	

                    
                    $hit_zero_02 = sprintf('%02d', $vdcc_jum_01);
                    $hit_conv_zero_02 = is_int($hit_zero_02);

                     #KONVERSI
                     $pwc_conv_vrj01_sw = $vjhfis01_sww['KapasitasPas'] -  $open_nr_vrj01_sw;
                     $vdcc_min_jum = $vdcc_jum_01 * 5;
						
						#KONDISI VARIABLE REFENSI NOMOR 
						if($jeniskunjungan=="1"){	
							$nomorreferensi = $skdp_sww['SKDPNomor'];
						}elseif($jeniskunjungan=="2"){
							$nomorreferensi = $rjk_sww['JalanNoRujukan'];
						}elseif($jeniskunjungan=="3"){
							$nomorreferensi = $skdp_sww['SKDPNomor'];
						}
					
						#KALKULASI DILAYANI  (lama praktik / kuota * nomor urut)
						#$kal_vrj01_sw = $ms_q("$sl Citarum.dbo.TRawatJalan WHERE ");
						$hit01_jam = substr($vjhfis01_sww['Jadwal'],0,-6); #HAFIZ JAM 01
						$hit02_jam = substr($vjhfis01_sww['Jadwal'],6,6); #HAFIZ JAM
						 $waktu_awal      =strtotime("$tanggalperiksa $hit01_jam");
						 $waktu_akhir    = strtotime("$tanggalperiksa $hit02_jam"); // bisa juga waktu sekarang now()
					    //menghitung selisih dengan hasil detik
						$diff    =  $waktu_akhir - $waktu_awal ;
						//membagi detik menjadi jam
						$jam    = floor($diff / (60 * 60));
						//membagi sisa detik setelah dikurangi $jam menjadi menit
						$menit    = $diff - $jam * (60 * 60);
						$menit_hasil = floor($menit / 60);
						#KALKULASI HIT
						$hit_esti_01 = $jam / $pwc_conv_vrj01_sw;
						$hit_esti_02 = $hit_esti_01 * $vdcc_jum_01;
						#KALKULASI KOTOR
						$hit_ktr =  substr($vjhfis01_sww['Jadwal'],0,-3);
						
						if($hit_zero_02 < 15 ){
						$hit_ktr_02 = $hit_ktr + 1; 
						}elseif($hit_zero_02 > 16 ){
						$hit_ktr_02 = $hit_ktr + 2; 
						}elseif($hit_zero_02 > 70 ){
						$hit_ktr_02 = $hit_ktr + 3; 
						}else{
							$hit_ktr_02 = $hit_ktr + 4; 
						}
						
						$hit_krt_02_txt = "kosong";
					    #echo $hit_02;
						
            /**/
            #PROCCESSING PAKAI
            $save_rj = $ms_q("$in Citarum.dbo.TRawatJalan(JalanNoReg,PasienNomorRM,PasienGender,PasienAlamat,PasienKota,PasienNama,TanggalPesan,JalanCaraDaftar,AppJenisDaftar,JalanTanggal,UnitKode,JalanAsalPasien,DokterKode,JalanNoUrut,JalanPasBaru,WaktuPesan,JalanStatus,JalanRMTanggal,JalanRMTanggal2,JalanJenisPeriksa,PrshKode,PasienUmurThn,PasienUmurBln,PasienUmurHr)VALUES('$TXT_REGRAND','$vpsn01_sww[PasienNomorRM]','$vpsn01_sww[PasienGender]','$vpsn01_sww[PasienAlamat]','$vpsn01_sww[PasienKota]','$vpsn01_sww[PasienNama]','$date_html5 $time_html5','4','2','$date_html5','$vunit01_sww[UnitKode]','A','$vdkt01_sww[PelakuKode]','$hit_zero_02','L1','$vjhfis01_sww[PSM]','0','$tanggalperiksa $jampraktek_d','$tanggalperiksa $jampraktek_d','M','1-0113','$thn','$bln','$tgl')"); #ENTRI RWAWAT JALAN 
           
			#PROCCESSING 02 PAKAI
            $save_rj_lokal = $ms_q("$in Citarum.dbo.TAntreTambahBPJS(NoReg,JenisPas,NomorKartu,NIK,NoHP,KodePoli,NamaPoli,PasienBaru,PasienNomorRM,TransTgl,KodeDok,NamaDok,JamPraktek,JenisKunjungan,NomorRef,NomorAntrean,AngkaAntrean,EstimasiLayan,SisaKuotaJKN,KuotaJKN,SisaKuotaNon,KuotaNon,Keterangan,StatusCode,UserDate)VALUES('$TXT_REGRAND','JKN','$nomorkartu','$nik','$nohp','$kodepoli', '$vunit01_sww[UnitNama]','0',$norm,'$tanggalperiksa $jampraktek_d','$kodedokter','$vdkt01_sww[PelakuNama]','$jampraktek','1','$nomorreferensi','$hit_zero_02','$vdcc_jum_01',' $vdcc_min_jum','$pwc_conv_vrj01_sw',$vjhfis01_sww[KapasitasPas],'0','0','oke','200','$date_html5')");			
            
			#PROCCESSING 03
            #$save_rj_lokal02 = $ms_q("$in Citarum.dbo.TWaktuTungguBPJS(NoReg,TransTgl,TaskID,StatusCode,Keterangan,UserID,UserDate,KodeAntrian,TANGGAL,TIMECALL)VALUES('$TXT_REGRAND','$tanggalperiksa $jampraktek_d','1','000','','WS','$date_html5 $time_html5','','','')"); #PELAPORAN BPJS
            #$save_rj_lokal03 = $ms_q("$in Citarum.dbo.TWaktuTungguBPJS(NoReg,TransTgl,TaskID,StatusCode,Keterangan,UserID,UserDate,KodeAntrian,TANGGAL,TIMECALL)VALUES('$TXT_REGRAND','$tanggalperiksa $jampraktek_d','2','000','','WS','$date_html5 $time_html5','','','')"); #PELAPORAN BPJS
			
			#PROCCESSING 04 PAKAI
			$up_rj_lab = $ms_q("$up  Citarum.dbo.TOrderLabPas SET OrderStatusInden='1' , OrderNoDaftar='$TXT_REGRAND' , OrderTgl='$tanggalperiksa $jampraktek_d' WHERE DokterKode='$vdkt01_sww[PelakuKode]' AND  PasienNomorRM='$vpsn01_sww[PasienNomorRM]' AND OrderStatusInden='2' "); #UPDATE E-LAB
			
			#PROCCESSING DELETE *DANGER PAKAI
			$del_rj_ws = $ms_q("delete from Citarum.dbo.TRawatJalan WHERE JalanNoReg LIKE '%WS%' AND   JalanNoUrut='00'");
            
            #$save_rj = "OKE";
			if($save_rj){ 
            $json_fetch = array(            
               "nomorantrean"=> $hit_zero_02,
               "angkaantrean"=> $vdcc_jum_01,
               "kodebooking"=> $TXT_REGRAND,
               "norm"=> $norm,
               "namapoli"=> $vunit01_sww['UnitNama'],
               "namadokter"=> $vdkt01_sww['PelakuNama'],
               'test'=> "$vdcc_jum_01",
			   #'test02'=> "$hit_ktr_02:00" ,  
			   #'Test03'=> strtotime("$tanggalperiksa $hit_ktr_02:00") * 1000,
               "estimasidilayani"=> strtotime("$tanggalperiksa $hit_ktr_02:00") * 1000,
               "sisakuotajkn"=>  $pwc_conv_vrj01_sw,
               "kuotajkn"=>  $vjhfis01_sww['KapasitasPas'],
               "sisakuotanonjkn"=> 0,
               "kuotanonjkn"=> 0,
               "keterangan"=> "Peserta harap 60 menit lebih awal guna pencatatan administrasi."
                
            );
            $metadata = array(
                "message"=>"Ok",
                "code"=> 200
            ); 
                
            }else{
                $json_fetch = array(
                    'response_code' => 201,
                    'response_code_desc' => 'Data Not Set'
                );
                } 

                $json = array(
                    'response' => $json_fetch,
                    'metadata' => $metadata
                );   
                $edata = json_encode($json);
                echo "$edata";
            } #AUTH CEK DATA
        } #JADWAL HFIS
    } #RM
        }else{ #AUTH USERNAME
            $json_respon = array(
                "message"=> "Username atau Password Tidak Sesuai",
                "code"=> 201
    
            );
            $userdata= json_encode($json_respon);
            echo "$userdata";
        } #AUTH USERNAME
    

?>