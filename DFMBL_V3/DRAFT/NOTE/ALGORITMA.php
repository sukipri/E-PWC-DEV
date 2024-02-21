<?PHP
		#--REDERING NAVIGASI MENU --#
			*Sistem Menu navigas dengan sistem back to back model dengan type mobile view control
		
			['#']MAIN MENU
				['#MAIN_MENU'] - Profile
					['#MAIN_MENU - Profile'] - Profile
				------------|SUB CLOSE|--------------
					
			['#']MAIN MENU
				['#MAIN_MENU'] - E-Presence
					#TEXT ALGORITHM
						@Tracing apakah sudah membuat antrian tiket jadwal
						@Membuat Tiket Entri Absen
						@pengkodisian entri 
							[
								Create tiket (making generate kode data)
								if data TRUE MAKING DATA 
								if data False foward old tiket
							]
						
						
					['#MAIN_MENU - E-Presence'] - Check IN
					['#MAIN_MENU - E-Presence'] - Check OUT
					['#MAIN_MENU - E-Presence'] - Riwayat Absensi
				
						
					#LOGIN DENGAN IMEI
					@deteksi variable imei yang ada 
					[if cocok login dengan imei yang sudah terdekteksi
						parameter yang diambil Username dan Password-text
					]
							
					[if salah atau tidak cocok bisa untuk login manual]

				
				
	
	?>