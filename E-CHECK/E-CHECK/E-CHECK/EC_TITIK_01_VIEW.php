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
	
	<a href="?PG_SA=EC_TITIK_01_VIEW&PG_SA_SUB=EC_TITIK_01_IN_VIEW" class="badge badge-warning"><i class="far fa-edit"></i>&nbsp;Lihat daftar titik</a>
    &nbsp;
    <a href="?PG_SA=EC_TITIK_01_VIEW&PG_SA_SUB=EC_TITIK_01_IN" class="badge badge-info"><i class="far fa-edit"></i>&nbsp;Entri Titik</a>
    <br><br>
	<?php include"../LOGIC/PG/PG_SA_SUB.php";  ?>
<?php
		//..Session Close..//
		}else{
		  include'../LOGIC/PG/PG_H_LOCATION.php';
		} }
		ob_flush();
	
	?>