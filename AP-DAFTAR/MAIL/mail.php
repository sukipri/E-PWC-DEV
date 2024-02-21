<?php
/*
 * @author Codingan
 * @website http://codingan.com
 * @facebook https://www.facebook.com/codingan
 */

// menampilkan semua error kecuali deprecated dan notice
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);

require 'phpmailer/PHPMailerAutoload.php';
	$nama = "Meika Kurniawan";
	$eml = "sukipri@outlook.com";
	/*
require '../config/connec_01_srv.php';
			$IDDKT = @$_GET['IDDKT'];
			$RM = @$_GET['RM'];
			$NO = @$_GET['NO'];
			$REG = @$_GET['REG'];
			$OKE = @$_GET['OKE'];
			$WAKTU = @$_GET['WAKTU'];
			$NOURUT = @$_GET['NOURUT'];
			$BTL = @$_GET['BTL'];
				$vdkt =  $ms_q("$call_sel TPelaku where PelakuKode='$IDDKT'");
				$vdktt = $ms_fas($vdkt);
				$vpl = $ms_q("$call_sel TUnit where UnitKode='$vdktt[UnitKode]'");
				$vpll = $ms_fas($vpl);
				$vrj_01 =  $ms_q("$call_sel TRawatJalan  where JalanNoReg='$REG'");
				$vrjj_01 = $ms_fas($vrj_01);
				$vps =  $ms_q("$call_sel TPasien  where PasienNomorRM='$RM'");
				$vpss = $ms_fas($vps);
				$vrj = @$ms_q("select TNomor.NomorKode,TNomor.NomorAkhir from TNomor where TNomor.NomorKode='PL-$years$month-'");
				$vrjj = $ms_fas($vrj);
				$vpr =  $ms_q("$sl PrshKode,PrshNama from TPerusahaan  where PrshKode='$vrjj_01[PrshKode]'");
				$vprr = $ms_fas($vpr);
*/
$message = "Pendaftaran anda telah disetujui, <br>Nomor urut anda <font size=15><b>05</b><br>$nama</font>";

// membuat obyek phpmailer
$mail = new PHPMailer(true);

// memberitahu class untuk menggunakan SMTP
$mail->IsSMTP();

// mengaktifkan debug SMTP (untuk pengujian) atur 0 untuk menonaktifkan mode debugging, 1 untuk menampilkan hasil debug
$mail->SMTPDebug = 0;

// mengaktifkan otentikasi SMTP
$mail->SMTPAuth = true;

// menetapkan prefix ke server
$mail->SMTPSecure = 'ssl';

// atur Gmail sebagai server SMTP
$mail->Host = 'smtp.gmail.com';

// atur server SMTP untuk server Gmail
$mail->Port = 465;

// alamat gmail kamu
$mail->Username = 'sukipri9985@gmail.com';

// password Anda harus disertakan dalam tanda kutip tunggal
$mail->Password = 'sayangstella';

// tambahkan subjek
$mail->Subject = ' Contoh email - PWC.com ';

// alamat email pengirim dan nama
$mail->SetFrom('sukipri9985@gmail.com', 'TEst PWC');

// alamat email penerima
$mail->AddAddress("$eml");

// jika kamu mengirim ke beberapa orangg, tambahkan baris ini lagi
//$mail->AddAddress('tosend@domain.com');

// jika kamu ingin mengirim Carbon copy (Cc)
//$mail->AddCC('tosend@domain.com');

// jika kamu ingin mengirim Blind carbon copy (Bcc)
//$mail->AddBCC('tosend@domain.com');

// tambahkan isi pesan
$mail->MsgHTML($message);

// tambahkan lampiran jika ada
$mail->AddAttachment('time.png');

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
