  <?php 
            $daftar = $call_query("$call_from daftar");
                        $jumlah = $call_num($daftar);
                while($daftar_hasil = $call_fetch($daftar)){
                     echo"Nama &nbsp $daftar_hasil[nama]<br>";
                       }
     echo"<hr>$jumlah";
    ?>