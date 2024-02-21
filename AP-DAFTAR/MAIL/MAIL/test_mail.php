<?php
$name="Meika Kurniawan";
$email="sukipri@outlook.com";
$subject="Hanya Uji COba";
$message="Heloo Ganteng..";

$to=$email;

$message="From:$name <br />".$message;

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= 'From: suckittrees.com <noreply@yourwebsite.com>'."\r\n" . 'Reply-To: '.$name.' <'.$email.'>'."\r\n";
$headers .= 'Cc: admin@suckittrees.com' . "\r\n"; //untuk cc lebih dari satu tinggal kasih koma
@mail($to,$subject,$message,$headers);
if(@mail)
{
echo "Email sent successfully !!";	
}
?>