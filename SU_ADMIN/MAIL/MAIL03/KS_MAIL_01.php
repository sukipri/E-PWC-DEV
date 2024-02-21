<?php
error_reporting(E_ALL);
require 'PHPMailer/src/PHPMailer.php' ;
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
$mail =  new PHPMailer\PHPMailer1\PHPMailer();
    $mail->IsSMTP(); 
    $mail->IsHTML(true);
    $mail->SMTPAuth 	= true; 
    $mail->Host 		= "pantiwilasa-citarum.co.id";
    $mail->Port 		= 587;
    $mail->SMTPSecure 	= "ssl";
    $mail->Username 	= "cs@pantiwilasa-citarum.co.id"; //username SMTP
    $mail->Password 	= "cornelia12345";   //password SMTP
	$mail->From    		= "cs@pantiwilasa-citarum.co.id"; //sender email
	$mail->FromName 	= "Nugroho Prayogo";      //sender name
	$mail->AddAddress("daftarpwc@gmail.com", "CC CITARUM");//recipient: email and name
	$mail->Subject  	=  "Percobaan";
	$mail->Body     	=  "Coba-Coba";
	
    $mail->AddAttachment("/cpanel.png","filesaya");
	if($mail->Send()){
     echo "Email sent successfully";
	}else{
	 echo "Email failed to send";
	}
?> 