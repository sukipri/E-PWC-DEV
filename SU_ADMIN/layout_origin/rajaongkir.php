


<!DOCTYPE html>
<html>
	<head>
		
	</head>
	
	<body>
	<h2>RajaOngkir</h2>
	<table width="200" border="0" class="table">
      <tr>
        <td>
		<?php

	//Get Data Kabupaten
	$curl = curl_init();	
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "key: 37a1521b2b0b4a22cef6b3a462bc8648"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	echo "<label>Kota Asal</label><br>";
	echo "<select name='asal' id='asal'>";
	echo "<option>Pilih Kota Asal</option>";
		$data = json_decode($response, true);
		for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
		    echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
		}
	echo "</select><br><br><br>";
	//Get Data Kabupaten


	//-----------------------------------------------------------------------------

	//Get Data Provinsi
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "key: 37a1521b2b0b4a22cef6b3a462bc8648"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	echo "Provinsi Tujuan<br>";
	echo "<select name='provinsi' id='provinsi'>";
	echo "<option>Pilih Provinsi Tujuan</option>";
	$data = json_decode($response, true);
	for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
		echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
	}
	echo "</select><br><br>";
	//Get Data Provinsi

?>
		<label>Kabupaten Tujuan</label><br>
		<select id="kabupaten" name="kabupaten"></select><br><br>

		<label>Kurir</label><br>
		<select id="kurir" name="kurir">
			<option value="jne">JNE</option>
			<option value="tiki">TIKI</option>
			<option value="pos">POS INDONESIA</option>
		</select><br><br>

		<label>Berat (gram)</label><br>
		<input id="berat" type="text" name="berat" value="500" />
		<br><br>

		<input id="cek" type="submit" value="Cek"/></td>
        <td><div id="ongkir"></div></td>
      </tr>
    </table>
	

		

	</body>
</html>


<script type="text/javascript">

	$(document).ready(function(){
		$('#provinsi').change(function(){

			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax 
			var prov = $('#provinsi').val();

      		$.ajax({
            	type : 'GET',
           		url : 'layout/cek_kabupaten.php',
            	data :  'prov_id=' + prov,
					success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
					$("#kabupaten").html(data);
				}
          	});
		});

		$("#cek").click(function(){
			//Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax 
			var asal = $('#asal').val();
			var kab = $('#kabupaten').val();
			var kurir = $('#kurir').val();
			var berat = $('#berat').val();

      		$.ajax({
            	type : 'POST',
           		url : 'layout/cek_ongkir.php',
            	data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
					success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
					$("#ongkir").text(data);
				}
          	});
		});
	});
</script>