		<br>
        

<?php
	include"../config/connec_01_srv.php";
	
		$qq = @$_GET['qq'];
		$sql2="select * from tb_pembiayaan WHERE idmain_pembiayaan = '".$qq."'";
		$result2 = mssql_query($sql2);
			$row2 = mssql_fetch_array($result2);
				$nom_row2 = number_format($row2['nominal']);
?>
			
            <table class="table" width="100%">
            <tr class="table-info">
            <td width="15%"><?php echo"<b>Rp.$nom_row2</b>"; ?></td>
            <td width="36%"> <input type="text" name="jml_hari" class="form-control" style="max-width:5rem;" placeholder="X hari"></td>
            <td width="49%"> <input type="text" name="jml_orang" class="form-control" style="max-width:7rem;" placeholder="X Peserta"></td>
            </tr>
            </table>
           
		<input type="hidden" name="nom_02" class="form-control" style="max-width:10rem;" value="<?php echo"$row2[nominal]"; ?>">
        
        
        

