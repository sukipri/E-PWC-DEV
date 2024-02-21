<?PHP 
	$pengirim = "daftarpwc@gmail.com";    
    $penerima = "itpwc@domain.com";    
    $subjek = "Mengirim Email dengan PHP";    
    $pesan = "Uji coba mengirim email dengan PHP mail. Email berhasil terkirim.";   
    $headers = "Dari :" . $pengirim;    
    mail($penerima,$subjek,$pesan, $headers);    
    echo "Pesan email sudah terkirim.";

?>