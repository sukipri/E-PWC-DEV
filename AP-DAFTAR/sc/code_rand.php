	<?php
		//ENCODING STACK
	$ack_big = rand('999999','888888');
	$ack_small = rand('9999','7777');
	$ack_md5 = md($ack_big);
	$ack_cr32_big = cr($ack_big);
	$ack_cr32_small = cr($ack_small);
	$ack_sha1 = hs($ack_big);
	$date_ack = date("Ymd");
	$date_ack_tiny = date("Ymd");
	$time_ack = date("h-i-s");
	$time_ack2 = date("his");
	$am = date("A");
	$years = date("y");
	$years_big = date("Y");
	$month = date("m");
	$day = date("d");
	$time_html5 = date("h:i:s");
	$date_html5 = date("Y-m-d");
	$date_html5_tiny = date("y-m-d");
	$IDMAIN = "$date_ack$ack_sha1$time_ack2";
	$IDMAIN_TINY = "$ack_sha1$time_ack2";
	//$err = @error_reporting(0);
	?>