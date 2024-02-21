<?php
	//include"../../config/connec_01_srv.php";
	//$ec_vuser01_sw = mssql_query("select * from TBUser WHERE namauser='secure101'");
		//$ec_vuser01_sww = mssql_fetch_assoc($ec_vuser01_sw);
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

// Konfigurasi SMTP
$mail->isSMTP();
$mail->Host = 'smtp-mail.outlook.com';
$mail->SMTPAuth = true;
$mail->Username = 'ccrspwc@outlook.com';
$mail->Password = 'cornelia!@#$%';
$mail->SMTPSecure = 'TLS';
$mail->Port = 587;

$mail->setFrom('ccrspwc@outlook.com', '[PWC]K&S');
$mail->addReplyTo('ccrspwc@outlook.com', '[PWC]K&S');

// Menambahkan penerima
$mail->addAddress("$ks_email_01");

// Menambahkan beberapa penerima
//$mail->addAddress('penerima2@contoh.com');
//$mail->addAddress('penerima3@contoh.com');

// Menambahkan cc atau bcc 
$mail->addCC('itpwc@outlook.com');
$mail->addBCC('bcc@contoh.com');

// Subjek email
$mail->Subject = 'Balasan Kritik & Saran dari Anda';

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent = "$ks_isi_01";
$mail->Body = $mailContent;

/* Menambahakn lampiran
$mail->addAttachment('lmp/file1.pdf');
$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru
*/
// Kirim email
if(!$mail->send()){
    echo 'Pesan tidak dapat dikirim.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
    //echo 'Email telah terkirim';
}