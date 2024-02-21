<b>#Upload Data</b> <a href="FIN_M_FIN_GAJI_KOM_TEMP_REDI.php" target="_blank">Download Template</a>
<Form method="post">
<div class="panel panel-success" style="max-width:20rem;">
  <div class="panel-body">
    <?php

    if (isset($_POST['kom_upload_01'])) {//Script akan berjalan jika di tekan tombol submit..
    
    //Script Upload File..
        if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
            echo "<h1>" . "File ". $_FILES['filename']['name'] ." Berhasil di Upload" . "</h1>";
            echo "<h2>Menampilkan Hasil Upload:</h2>";
            readfile($_FILES['filename']['tmp_name']);
        }
    
        //Import uploaded file to Database, Letakan dibawah sini..
        $handle = fopen($_FILES['filename']['tmp_name'], "r"); //Membuka file dan membacanya
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $import="$in TGaji (GajiBulan,KaryNomor,UnitKode,GajiStKeluarga,GajiStPPh,GajiASTEK)VALUES()"; //data array sesuaikan dengan jumlah kolom pada CSV anda mulai dari “0” bukan “1”
            $ms_q($import) or die(mssql_error()); //Melakukan Import
        }
    
        fclose($handle); //Menutup CSV file
        echo "<br><strong>Import data selesai.</strong>";
        
    }else { //Jika belum menekan tombol submit, form dibawah akan muncul.. ?>
    
    <!-- Form Untuk Upload File CSV-->
    Silahkan masukan file csv yang ingin diupload<br /> 
    <form enctype='multipart/form-data' action='' method='post'>
        Cari CSV File anda:<br />
        <input type='file' name='filename' size='100' class="form-control">
        <br>
        <input type='submit' name='kom_upload_01' value='Upload' class="btn btn-success btn-sm">


    </form>
    <?php } mssql_close(); //Menutup koneksi SQL?> 
    </div>
    </div>

</form>