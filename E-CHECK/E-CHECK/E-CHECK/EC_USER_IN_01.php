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
<h5 class="">#Add User</h5>
<br>
	<form method="post">
    <div class="card border-primary mb-3" style="max-width: 20rem;">
          <div class="card-header">Form add user</div>
          <div class="card-body">
        	<!-- -->
            	<b>REFF ID</b>
                <br>
            	<input type="text" readonly style="max-width:13rem;" class="form-control form-control-sm" name="ec_user_kode_01" value="<?php echo"$ec_cq_vuser01_sw"; ?>">
             	<br>
                
                <b>UserName</b>
                <br>
            	<input type="text" style="max-width:15rem;" class="form-control form-control-sm" name="ec_user_nama_01" required autocomplete="off">
                <br>
                
                <b>Password</b>
                <br>
            	<input type="text" style="max-width:15rem;" class="form-control form-control-sm" name="ec_user_pass_01" required autocomplete="off">
           		<br>
                <button name="ec_user_simpan_01" class="btn btn-success btn-sm"><i class="	fas fa-save"></i>&nbsp;Simpan Data</button>
            <!-- -->    
          </div>
	</div>
   	</form>
	     <!-- -->
        	<?php include_once"../LOGIC/PRC/EXE_IN.php"; ?>
        <!-- -->
<?php
		//..Session Close..//
		}else{
		  include'../LOGIC/PG/PG_H_LOCATION.php';
		} }
		ob_flush();
	
	?>