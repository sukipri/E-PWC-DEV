<html>
   <body>
    <title>Proses data data dengan OOP</title>
    <h4>Proses data data dengan OOP</h4>
    <form action="" method="post">
            <table width="43%">
              <tr>
                <td width="24%"><input type="text" name="kode" placeholder="Kode.." class="form-control"></td>
              </tr>
              <tr>
                <td><input type="text" name="nama" placeholder="Nama..." class="form-control"></td>
              </tr>
              <tr>
                <td><input type="text" name="harga" placeholder="Harga..." class="form-control"></td>
              </tr>
              <tr>
                <td><input type="submit" name="go" value="proses data" class="btn btn-success"></td>
              </tr>
            </table>
            <br>
    </form>
    <?php
	class input_barang {
			
            function Alaram(){
            return"Maaf kode harus diisi bung"; }}
            //object
            $inp_brg = new input_barang();
              //pemanggilan POST data
                $kode = @$_POST['kode'];
                $nama = @$_POST['nama'];
                $harga = @$_POST['harga'];
            //set object
                $inp_brg->kode_barang = "$kode";
                $inp_brg->nama_barang = "$nama";
                $inp_brg->harga_barang = "$harga";
               //penampilan property dan object data
                    if(isset($_POST['go'])){
                        if(empty($kode) || empty($nama)|| empty($harga)){
                           echo $inp_brg->alaram();  
                        }else{
                        echo $inp_brg->kode_barang;
                        echo"<br>";
                        echo $inp_brg->nama_barang;
                        echo"<br>";
                        echo $inp_brg->harga_barang; }}  ?>
			<?php
				$mhs = $call_q($get_db->conek(),"$call_sel mahasiswa");
			while($mhss = $call_fas($mhs)){
        echo "<tr>
            <td>$no</td>
            <td>".$row['idmahasiswa']."</td>
            <td>".$row['nama']."</td>
            <td>".$row['email']."</td>
            <td>".$row['alamat']."</td>
              </tr>";
        $no++;
			}
			?>
</body>   
</html>