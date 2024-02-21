		<br>
          
    <select name="by_01" class="form-control" style="max-width:20rem;" onChange="showUserr(this.value)">
    <option value=""></option>
<?php
	include"../config/connec_01_srv.php";
	
		$q = @$_GET['q'];
		$sql="select * from tb_pembiayaan WHERE idmain_pembiayaan_jenis = '".$q."'";
		$result = mssql_query($sql);
			while($row = mssql_fetch_array($result)){
				$nom_row = number_format($row['nominal']);
		
				
?>
	<?php
			echo"<option value=$row[idmain_pembiayaan]>$row[jenjang] - $row[lokasi] Rp.$nom_row</option>";
		?>
       
        <?php } ?> 
        </select>
        	 <!-- penampil data -->
                        	
                      <!-- penampil data -->