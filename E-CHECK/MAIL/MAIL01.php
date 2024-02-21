<?php
		include"../DIST/DIST_GET.php";
	//User
	$ec_vuser01_sw = mssql_query("select * from TBUser WHERE idmain='$IDUSER01'");
		$ec_vuser01_sww = mssql_fetch_assoc($ec_vuser01_sw);
	//Rec
	$ec_vttr01_sw = $CL_Q("$CL_SL tb_ec_titik_01_rec WHERE idmain_titik_01_rec='$IDMAIN01'");
		$ec_vttr01_sww = $CL_FAS($ec_vttr01_sw);
	require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

// Konfigurasi SMTP
$mail->isSMTP();
$mail->Host = 'SMTP.Office365.com';
$mail->SMTPAuth = true;
$mail->Username = 'itpwc@outlook.com';
$mail->Password = 'cornelia12345';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('itpwc@outlook.com', 'Laporan E-CHECK ');
$mail->addReplyTo('itpwc@outlook.com', 'Laporan E-CHECK');

// Menambahkan penerima
$mail->addAddress('daftarpwc@gmail.com');

// Menambahkan beberapa penerima
//$mail->addAddress('penerima2@contoh.com');
//$mail->addAddress('penerima3@contoh.com');

// Menambahkan cc atau bcc 
$mail->addCC('itpwc@outlook.com');
$mail->addBCC('itpwc@outlook.com');

// Subjek email
$mail->Subject = "Laporan E-CHECK $DATE_HTML5_SQL";

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent = "$ec_vuser01_sww[namauser] telah melakukan input checking tanggal $DATE_HTML5_SQL <br><b>Status</b> $ec_vttr01_sww[rec_laporan_01]";
$mail->Body = $mailContent;

/* Menambahakn lampiran
$mail->addAttachment('lmp/file1.pdf');
$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru
*/
// Kirim email
if(!$mail->send()){
    echo 'Pesan tidak dapat dikirim.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{ ?>
    	<div class="alert alert-dismissible alert-success">
         	<strong>Well done!</strong> Data berhasil dikirim.
		</div>
<?php } ?>