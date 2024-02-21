<?php
		@ob_start();
		 @session_start();
			//..INCLUDER//
			
			//.....///
		//..Sesiion open../
		 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
 			include'../LOGIC/PG/PG_H_LOCATION.php';
       }else{
	
			if($vus01_sww['akses']==31){ 

			#PROCCESSING DELETE QUERY
			$IDDELUSR01 = @$_GET['IDDELUSR01'];
			#PROCCESSING
			if(isset($_GET['DELUSR01'])){
				$ec_del_user_01 = @$CL_Q("DELETE FROM TBUser WHERE idmain='$IDDELUSR01'");
				header("LOCATION:?PG_SA=EC_USER_01_VIEW");

			}		
?>
	<h5 class="">#List User <a href="?PG_SA=EC_USER_IN_01" class="badge badge-success">+Tambah Pengguna</a></h5>
    <br>
    	<table width="100%" border="0" class="table table-sm table-bordered table-striped" style="max-width:55rem;">
              <tr class="table-info">
                <td width="8%">#</td>
                <td width="19%">REFF ID</td>
                <td width="56%">UserName</td>
                <td width="17%">Aksi</td>
              </tr>
              <?php
			  	$ec_user_no = 1;
			  		$ec_vuser01_sw = $CL_Q("$CL_SL TBUser WHERE akses='312' OR akses='31' order by kode desc");
						while($ec_vuser01_sww = $CL_FAS($ec_vuser01_sw)){
			  ?>
              <tr>
                <td><?php echo"$ec_user_no"; ?></td>
                <td><?php echo"$ec_vuser01_sww[kode]"; ?></td>
                <td><?php echo"$ec_vuser01_sww[namauser] - $ec_vuser01_sww[akses]<br><b>MD5</b> $ec_vuser01_sww[passuser]<br><b>Text</b> $ec_vuser01_sww[password_text]"; ?></td>
                <td><a href="<?PHP echo "?PG_SA=EC_USER_01_VIEW&IDDELUSR01=$ec_vuser01_sww[idmain]&DELUSR01=DELUSR01"; ?>" class="btn btn-danger btn-sm">DELETE</a></td>
              </tr>
              <?php $ec_user_no++;} ?>
         </table>

<?php
		//..Session Close..//
		}else{
		  include'../LOGIC/PG/PG_H_LOCATION.php';
		} }
		ob_flush();
	
	?>