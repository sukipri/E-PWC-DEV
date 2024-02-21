<?php
/*
 * @author Codingan
 * @website http://codingan.com
 * @facebook https://www.facebook.com/codingan
 */

// menampilkan semua error kecuali deprecated dan notice
//error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);

	require "phpmailer/PHPMailerAutoload.php";

	 include"../config/connec_01_srv.php";
		
			$RM = @$_GET['RM'];
			$EML = @$_GET['EML'];
			$REG = @$_GET['REG'];
		
			$ket = "Dokter yang bersangkutan tidak Praktek , mohon untuk melakukan live chat yang tersedia di Aplikasi atau Web untuk konfirmasi Pergantian Tanggal dan jam";
			//$ket02 = "<a href=http://daftar.pantiwilasa-citarum.co.id/E-PWC/DFMBL_V2/UPLOAD_BERKAS.php?RM=$RM&REG=$REG>Klik Disi</a>";
			$message = "<img src=http://daftar.pantiwilasa-citarum.co.id/images/head2_new.jpg width=1000 height=200><br>$ket<br>Terima Kasih";

// membuat obyek phpmailer
$mail = new PHPMailer(true);

// memberitahu class untuk menggunakan SMTP
$mail->IsSMTP();

// mengaktifkan debug SMTP (untuk pengujian) atur 0 untuk menonaktifkan mode debugging, 1 untuk menampilkan hasil debug
$mail->SMTPDebug = 0;

// mengaktifkan otentikasi SMTP
$mail->SMTPAuth = true;

// menetapkan prefix ke server
$mail->SMTPSecure = "ssl";

// atur Gmail sebagai server SMTP
$mail->Host = "smtp.gmail.com";

// atur server SMTP untuk server Gmail
$mail->Port = 465;

// alamat gmail kamu
$mail->Username = "daftarpwc@gmail.com";

// password Anda harus disertakan dalam tanda kutip tunggal
$mail->Password = 'phoseidonathena12345';

// tambahkan subjek
$mail->Subject = ' Pendaftaran Indent Rawat Jalan ';

// alamat email pengirim dan nama
$mail->SetFrom("daftarpwc@gmail.com", "Pemberitahuan Pendaftaran RSPWC");

// alamat email penerima
$mail->AddAddress("$EML");

// jika kamu mengirim ke beberapa orangg, tambahkan baris ini lagi
//$mail->AddAddress('tosend@domain.com');

// jika kamu ingin mengirim Carbon copy (Cc)
//$mail->AddCC('tosend@domain.com');

// jika kamu ingin mengirim Blind carbon copy (Bcc)
//$mail->AddBCC('tosend@domain.com');

// tambahkan isi pesan
$mail->MsgHTML($message);

// tambahkan lampiran jika ada
//$mail->AddAttachment("../../../images/logo.png");

try {
    // kirim email
    $mail->Send();
    $msg = "Email berhasil dikirim";
} catch (phpmailerException $e) {
    $msg = $e->getMessage();
} catch (Exception $e) {
    $msg = $e->getMessage();
}
	echo"<h4>Pesan berhasil Dikirim</h4>";
?>
