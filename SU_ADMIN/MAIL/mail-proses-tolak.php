<?php
/*
 * @author Codingan
 * @website http://codingan.com
 * @facebook https://www.facebook.com/codingan
 */

// menampilkan semua error kecuali deprecated dan notice
	error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
	require "phpmailer/PHPMailerAutoload.php";

// include"../config/connec_01_srv.php";
			$IDDKT = @$_GET['IDDKT'];
			$RM = @$_GET['RM'];
			$NO = @$_GET['NO'];
			$REG = @$_GET['REG'];
			$OKE = @$_GET['OKE'];
			$WAKTU = @$_GET['WAKTU'];
			$NOURUT = @$_GET['NOURUT'];
			$EML = @$_GET['EML'];
			$ALS = @$_GET['ALS'];

$message = "<img src=http://daftar.pantiwilasa-citarum.co.id/images/head2_new.jpg width=1000 height=200><h4>Maaf,Pendaftaran anda ditolak, Silahkan cek di '<i>Cek Status Pendaftaran</i>' untuk lebih detailnya </h4> ";

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
$mail->SetFrom("daftarpwc@gmail.com", "Nomor Antrian PWC");

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
	header("location:../?HLM=LIST_DAFTAR_BATAL");
?>
