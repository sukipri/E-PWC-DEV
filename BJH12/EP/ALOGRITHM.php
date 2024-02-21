<?PHP

				#>> TABLE STUKTURE REKAP PRESENSI Plant IN DBMS - Citarum
					@tb_tj_prs_rekap_01
					[
						idmain_prekap_01
						ID //>Kunci Data TA_Record_Info
						KaryNomortj
						prekap_kode_01
						prekap_tglinput_01
						prekap_tglmasuk_01
						prekap_shift_01
						prekap_jam_01
						prekap_tgl_01
						prekap_telat_01 //> Nominal Terlambat
						prekap_status_01 //>Masuk Atau Pulang


					]

					@tb_tj_prs_lbr_01
					[
						idmain_plbr_01
						KaryNomortj
						plbr_kode_01
						plbr_ket_01
						plbr_tglinput_01
						plbr_tglmasuk_01
						plbr_jmljam_01
						plbr_status_01
						
					]

		
							@Lap Day
								[
									"Menampilkan Laporan Per tanggal"
									@Calcualtion jam keterlambatan karyawan
									[
										X = jam berangkat / Jam schedule "Mengambil data dari table TJadwal sesuai dengan looping jadwal karyawan" 
											//> Describe relation data Generate DATE dengan absensi yang telah dientri ke table TA_Record_Info lalu generate dan convert kedalam tanggal dengan diambil format "d" lalu filter dalam sintak SQL lalu relasikan ke table TJadwal 
										XX = Jam Pulang "Mengambil data dari table TJadwal sesuai dengan looping jadwal karyawan" 
										X1 = Jam telat
										X2 = ?
										Y = Jam lembur 
											X > X1 = X2 (X1 - X) //>Jam Telat
											Y  >  
									]
									@Calculation total keterlambatan bulanan
									[
										"Sorting data per bulan dari tanggal yang sudah ditentukan"
										"fethcing data dan kalkulasi keterlambatan dan lembur"




									]
						
				

			//--ALGORITHM , ANALIST SETUP DATA--//
					['#'] @Entri Jadwal masuk pekerja / karyawan dengan metode GEOLOCATE
						[*]Login Sesuai User yang sudah disediakan oleh SDM
						[*]Penyeleksian Jadwal Sesuai data jadwal
						[*] Menampilkan data jadwal untuk di konversi
								//--Data analystic--//
									table TKaryawan FROM CITARUM <> table HR_Personnel  FROM TJ_Main_Data
									set KaryNomor FROM CITARUM hide '0' to indentik FROM TJ_Main_data HR_Personnel 
									Penyelarasan field TJadwal dan Tanggal Hari ini
						
				['#'] @Jadwal PUlang Bekerja / Karyawan Dengan metode geoclocate
							[*] Menu CHeck Out 
							[*] Filterisasi data apakah sudah absen masuk atau belum 	
							[*] Lakukan absensi Pulang

				['#'] @Pengetrian jadwal karyawan oleh kabag
							[ #Per DAY
								"Sistem memindai data karyawan apakah akun memiliki hak untuk mengentri jadwal presensi"
								"Masukan Nama staff yang akan terjadwal" //>Filter sesuai dengan nama ruangan
								"Entri Sesuai dengan form dan strukture yang tersedia"
								"Unggah Data....." //> Web Service Metode proccesing
								
							]
							[ #Per Month
								"Sistem Memindai data karyawan apakah akun memiliki hak untuk mengentri jadwal presensi"
								"Masukan nama staff yang akan terjadwal"
								"Entri Sesuai Form dan strukture yang Tersedia"
								"Unggah Data..."
								
							]
							
									//-DATA Analisytic table-//
									
								
			
						
			//--RUMUS PENGAMBILAN LOKASI GCODE--//
				['#']Artificial Desccion TREE
						[*]RANGE VALUE DATA LINGKAR BUJUR (lat,Long)
							[*]PHARSING VALUE
							[*]ARRAY DATA
									"FORMULLA = [M=(lat, lon)=(1.3963 rad, -0.6981 rad)]
										DESCRIBE FORMULLA [
													
									Computing the Minimum and Maximum Latitude
										Moving on a circle with radius R=6371 km from a point A to a point B such that there is an angle r=0.1570 between A and B means covering a 				distance of d=1000 km. Meridians are on such great circles with radius R. Hence we can move along a meridian, i.e. keep the longitude fixed, and simply substract/add r from/to lat in order to obtain the minimum/maximum latitude of all points within the query circle with center M=(lat, lon)=(1.3963 rad, -0.6981 rad):

														latmin = lat - r = 1.2393 rad(3)
														latmax = lat + r = 1.5532 rad
													One approach seen on several web pages for computing the minimum and maximum longitudes is keeping the latitude fixed and changing the longitude, i.e. moving along a circle of latitude. This section will show that this approach gives inaccurate results.

Moving along a circle of latitude means moving along a small circle. A circle of latitude at latitude lat=1.3963 rad has the radius Rs = R · cos(lat) = 1106 km, so d=1000 km now corresponds to an angular radius of rs = d/Rs = d/(R · cos(lat)) = 0.9039. Hence, covering d=1000 km on a circle of latitude gets you to longitude lonS = lon ± d/(R · cos(lat)) = -0.6981 rad ± 0.9039 rad. But this is not the minimum/maximum longitude you can get to by moving d=1000 km in any direction! This is because we moved the distance on a small circle, but small circle distances are greater than great circle distances. Although M=(lat, lon)=(1.3963 rad, -0.6981 rad) and PS=(lat, lonS)=(1.3963 rad, -1.6020 rad) have a distance of d=1000 km on the small circle, we could take a shortcut from M to PS on a great circle. According to equation 1, that shortcut has a length of 967 km. So we could move another 33 km and would still be within the query circle. In particular, we could reach even smaller respectively greater longitudes. So using lon ± d/(R · cos(lat)) as bounding values for longitude would miss some locations that are actually within distance d. For example, the point P3=(1.4618 rad, -1.6021 rad) is outside the computed bounding “box”, although its distance to M is only 872 km. That is an error of more than 12 %!"
															
											]												
							#--CLOSE---#		
									
						#ALGORITHM ABSENSI JIKA ADA TUGAS LUAR
						@absensi dilakukan oleh admin
								pindai data surat tugas dari [Diklat]
								Muncul data view DIKLAT 
								


					
								
							
								
							
						




				
		
					
				   
				
			
			


?>