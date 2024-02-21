<?php
	@session_start();
	//ob_start();
	 //session_start();
	//include"../../DIST/DIST_GET.php";
	//include"../../CONFIG/MYSQL/MY_CONNECT_PRD.php";
	  if(isset($_POST['ec_acs_login'])){ 
			$username=@trim($SQL_SL($_POST['us_nama']));
			$passuser=@trim($SQL_SL($_POST['us_pass']));  // MD5 --> 9e39fe12c7c9c968ceabcd0b80d622a7 	
			$tanya_us=@trim($SQL_SL($_POST['tanya_us']));
			$jawab_us=@trim($SQL_SL($_POST['jawab_us']));
				if($jawab_us!==$tanya_us){
                    //header("location:../SU_ADMIN/");
					echo "<script language='javascript'>alert('Wrong Code..')</script>";
					echo "<script language='javascript'>window.location = 'http://182.253.60.178/E-PWC/E-CHECK/E-CHECK/EC_HOME_APP_CLIENT_LOGIN.php'</script>";
				}elseif($jawab_us==$tanya_us ){
						
			//include"../sc/conek.php";
			$mdpass = EN_HS_MD5($passuser);
				$dt=$CL_Q("$CL_SL TBUser WHERE namauser='$username' AND passuser='$mdpass' AND akses='312'");
					$bc=$CL_FR($dt);
			if($bc > 0){
				  // session_start(); // di gunakan untuk mengawali perintah session
					//session_start(); 
				   $_SESSION['namauser']=$bc[2];  // di gunakan untuk membandingkan variabel session dengan database
				   $_SESSION['passuser']=$bc[3];
					 //header("location:?HLM=H_LOGIN"); 
					 echo"<b>Success....</b>";
					echo"$_SESSION[namauser]";
                    echo"$_SESSION[passuser]";
                    ?>
                        <meta http-equiv="refresh" content="0; url=<?php echo"../LOGIC/PG/PG_H_USER.php?IDTT01=$IDTT01&IDAKSES01=312"; ?>">
					<?php
                    //echo "<META HTTP-EQUIV=Refresh Content=0; URL=../LOGIC/PG/PG_H_USER.php?IDTT01=$IDTT01>";
					exit();
						 ?>
					
				 <?php
			
				}else{
				//header("location:../SU_ADMIN/");
				echo "<script language='javascript'>alert('Username or password is wrong')</script>";
				echo "<script language='javascript'>window.location = 'http://182.253.60.178/E-PWC/E-CHECK/E-CHECK/EC_HOME_APP_CLIENT_LOGIN.php''</script>";
				}
			}else{
            //header("location:../SU_ADMIN/");
			echo "<script language='javascript'>alert('Username or password is wrong')</script>";
			echo "<script language='javascript'>window.location = 'http://182.253.60.178/E-PWC/E-CHECK/E-CHECK/EC_HOME_APP_CLIENT_LOGIN.php''</script>";
			} }
				//echo $mdpass;
		ob_flush();
   						?>
   
