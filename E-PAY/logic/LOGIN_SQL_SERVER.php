<?php
	ob_start();
	 session_start();
	include"../CONFIG_INTERNAL.php";
	  if(isset($_POST["kirim"])){ 
			$username=@trim($sql_slash($_POST["nim"]));
			$passuser=@trim($sql_slash($_POST["passuser"]));  // MD5 --> 9e39fe12c7c9c968ceabcd0b80d622a7 	
			$angka1=@trim($sql_slash($_POST["angka1"]));
			$an_sec=@trim($sql_slash($_POST["an_sec"]));
				if($angka1!==$an_sec){
					//header("location:../SU_KRY/");
						echo"Nomor Salah";
					//echo"$an_sec";
				}elseif( $angka1==$an_sec ){
						//echo"$an_sec";
						
			//include"../sc/conek.php";
			$mdpass=cr($passuser);
				$dt=$ms_q("select idmain,kode,namauser,passuser,akses FROM TBUser WHERE namauser='$username' AND passuser='$mdpass'");
	$bc=$ms_nr($dt);
			if($bc > 0){
				  // session_start(); // di gunakan untuk mengawali perintah session
					//session_start(); 
				   $_SESSION['namauser']=$bc[2];  // di gunakan untuk membandingkan variabel session dengan database
				   $_SESSION['passuser']=$bc[3];
					 header("location:../SU_KRY/HOME.php"); 
						 ?>
					
				 <?php
				//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=HOME.php">';
					//exit;
				}else{
				header("location:../SU_KRY/");
					//echo"<font color=red><b>Password Dan User Salah</b></font>";
				}
			}else{
			header("location:../SU_KRY/");
			} }
				//echo $mdpass;
		ob_flush();
   						?>
   
