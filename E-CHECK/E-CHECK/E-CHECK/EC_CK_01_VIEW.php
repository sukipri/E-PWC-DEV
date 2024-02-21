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
		
?>
	<a href="<?php echo"?PG_SA=EC_CK_01_VIEW&PG_SA_SUB=EC_CK_01_IN_VIEW_ALL"; ?>" class="badge badge-warning"><i class="fas fa-check"></i>&nbsp;Riwayat Checking / Today</a>
	    &nbsp;	
    <a href="<?php echo"?PG_SA=EC_CK_01_VIEW&PG_SA_SUB=EC_CK_01_IN_VIEW_HARI"; ?>" class="badge badge-danger"><i class="fas fa-check"></i>&nbsp;#Riwayat Checking / Hari</a>
		        &nbsp;	
    <a href="<?php echo"?PG_SA=EC_CK_01_VIEW&PG_SA_SUB=EC_CK_01_IN_VIEW"; ?>" class="badge badge-info"><i class="fas fa-check"></i>&nbsp;#Riwayat Checking / User</a>
	    <br><br>
	<?php include"../LOGIC/PG/PG_SA_SUB.php";  ?>
	
<?php
		//..Session Close..//
		}else{
		  include'../LOGIC/PG/PG_H_LOCATION.php';
		} }
		ob_flush();
	
	?>