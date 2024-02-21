<?php
		$email = "sukipri9985@gmail.com";
		$subject = "Account Information";
		$messages= "Your Password  HELOOO";
    	$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= 'From: <admin@zunasport.id>';
			@mail($email, $subject, $messages, $headers);
?>