	<?php
		//ENCODING STACK
		date_default_timezone_set('Asia/Jakarta');
		//..VAR URL HOST HOME
			$MY_HOST = @$_SERVER['HTTP_HOST'];
			$MY_DOM = @$_SERVER['REQUEST_URI'];
	
			$ack_big = rand('999999','888888');
			$ack_small = rand('9999','7777');
			$ack_small_XL = rand('9','9');
			$ack_md5 = md($ack_big);
			$ack_cr32_big = cr($ack_big);
			$ack_cr32_small = cr($ack_small);
			$ack_sha1 = hs($ack_big);
			$date_ack = date("Ymd");
			$YR = date("Y");
			$MH = date("m");
			$DY= date("d");
			$am = date("A");
			$years = date("y");
			$years_big = date("Y");
			$month = date("m");
			$day = date("d");
			$date_ack_tiny = date("ymd");
			$time_ack_tiny = date("his");
			$time_ack2 = date("his");
			$time_ack = date("h-i-s");
			$am = date("A");
			$time_html5 = date("H:i:s");
			$date_html5 = date("Y-m-d");
			$date_html5_tiny = date("y-m-d");
			$DATE_HTML5_SQL = date("Y-m-d");
			//$text_date = date('d F Y');
			$nf = @number_format;
		//IDMAIN FIELDS
	$IDMAIN = "$ack_cr32_big$date_ack_tiny$time_ack_tiny";
	$IDMAIN_TINY = "$ack_cr32_big$date_ack_tiny$time_ack_tiny";
		//SECURE Digit Random
		$an = rand('9998','8888');
		$an_02 = rand('99','99');
		
		//BULAN BI
		function tanggal_indo($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}


		#VIEW
		$text_date = tanggal_indo("$YR-$MH-$DY");
		$IDKODE = "$date_ack_tiny$time_ack2";
	?>