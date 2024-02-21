<?php
         @session_start();
         $IDTT01=@$_GET['IDTT01'];
         $IDAKSES01 = @$_GET['IDAKSES01'];
			//..INCLUDER//
            include"../../CONFIG/MSSQL/MS_CONNECT_01.php";
            //include"./../../DIST/CFG/CFG_01.php";
            include"../../DIST/CODE/CODE_02_DDL.php";
         
			//.....///
		//..Sesiion open../
		 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
 		    	include'PG_H_LOCATION.php';
       }else{
	//..Access Method.//
 	 $vus01_sw = $CL_Q("$CL_SL TBUser where namauser='$_SESSION[namauser]' AND akses='$IDAKSES01'");
        $vus01_sww = $CL_FAS($vus01_sw);
        
			if($vus01_sww['akses']=="4"){ 
?>
        <!-- Direct to HOME_APP.php-->
        <meta http-equiv="refresh" content="0; url=<?php echo"../../DFMBL/EPWC_HOME_01.php"; ?>">
            <!-- . . . ..  -->

            <?php   }elseif($vus01_sww['akses']=="00"){ echo"User Not valid";   ?>
                
            <!-- Close Session -->
            <?php

                        }else{
                            include'PG_H_LOCATION.php';
                        } }
                        ob_flush();

                    ?>