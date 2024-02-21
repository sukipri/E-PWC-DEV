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
			$TG = @$_GET['TG'];
			$HARI = @$_GET['HARI'];
			$ket = "Sebelum ke Poli Silahkan menuju pendaftaran,untuk cek berkas khusus";

$message = "<img src=http://daftar.pantiwilasa-citarum.co.id/images/logo_citarum.png> <br>Pendaftaran anda telah disetujui, <br>Nomor urut anda <br><font size=14><b>$NO</b></font><br>Nomor RM //$RM<br>Nomor Reg //$REG<br>Email $EML<br>Datang tanggal $TG <br> $HARI $WAKTU <br> <b>$ket</b> <br><br><a href=http://daftar.pantiwilasa-citarum.co.id/E-PWC/DAFTAR/DAFTAR_PRINT.php?IDDKT=$IDDKT&REG=$REG&RM=$RM>Klik, Untuk Cetak bukti Pendaftaran (Gunakan Personal Komputer/PC)</a>";

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
$mail->Password = 'phoseidonathena';

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
	header("location:../?HLM=LIST_DAFTAR_TODAY_APP");
?>
