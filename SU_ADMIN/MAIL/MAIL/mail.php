<?php
/*
 * @author Codingan
 * @website http://codingan.com
 * @facebook https://www.facebook.com/codingan
 */

// menampilkan semua error kecuali deprecated dan notice
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);

require 'phpmailer/PHPMailerAutoload.php';

$message = file_get_contents('pesan.php');

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
$mail->Username = 'daftarpwc@gmail.com';

// password Anda harus disertakan dalam tanda kutip tunggal
$mail->Password = 'phoseidonathena12345';

// tambahkan subjek
$mail->Subject = ' Contoh email - TEST.com ';

// alamat email pengirim dan nama
$mail->SetFrom('daftarpwc@gmail.com', 'UJI COBA');

// alamat email penerima
$mail->AddAddress('sukipri@gmail.com');

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
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="http://codingan.com/wp-content/uploads/imgc/favicon.ico" type="image/x-icon" />
        <title>Mengirim email dari server localhost/online menggunakan PHP - codingan.com</title>
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>

    <body>

        <div id="container">
            <div id="body">
                <header>
                    <div class="mainTitle" >Mengirim email dari server localhost/online menggunakan PHP</div>
                </header>
                <article>
                    <div class="height30"></div>
                    <div style="text-align:center;" class="title">
                        <div class="title"><a href="index.php" title="Back to homepage" >Kembali ke halaman awal </a></div>
                        <div class="height20"></div>
                        <div class="title" style="color: #009900"><?php echo $msg; ?></div>
                        <div style="height: 40px; clear: both;"></div>
                        <div style="margin:10px 0;width:100%;float: left;">
                            <div style="width:35%;float: left;margin:0 auto;text-align: center;">
                                <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Ffacebook.com%2Fcodingan&amp;width&amp;height=360&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=198210627014732" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:360px;" allowTransparency="true"></iframe>
                            </div>
                        </div>
                        <div style="height: 10px; clear: both;"></div>
                    </div>
                </article>
                <footer>
                    <div class="copyright">
                        <a href="http://codingan.com" target="_blank">&copy; <?php echo date("Y"); ?> - Codingan.com</a>
                    </div>
                    <div class="footerlogo"><a href="http://codingan.com" target="_blank"><img src="http://codingan.com/wp-content/uploads/imgc/codingan-logo.png" width="200" height="auto" alt="Codingan logo" /></a> </div>
                </footer>
            </div></div>
    </body>
</html>
