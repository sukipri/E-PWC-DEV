<?php
	 session_start(); 
	 include"../config/connec_01_srv.php";
	 if(isset($_POST["kirim"])){ 
	$username=@trim($_POST["username"]);
	$passuser=@trim($_POST["passuser"]);  
	$mdpass=crc32($passuser);
	$dt=mssql_query("select idmain,kode,namauser,passuser,akses from TBUser where namauser='$username' AND passuser='$mdpass'");
	$bc=mssql_fetch_row($dt);
	if($bc > 1){
	      // di gunakan untuk mengawali perintah session
	    
		   $_SESSION['namauser']=$bc[1];  // di gunakan untuk membandingkan variabel session dengan database
		   $_SESSION['passuser']=$bc[2];
		   header("location:../");
		 }else{
		echo "<script language='javascript'>alert('Username or password is wrong')</script>";
	echo "<script language='javascript'>window.location = '../?HLM=SQL_LOGIN'</script>";
	exit();
		}
	}else{
	echo "<script language='javascript'>alert('Username or password is wrong')</script>";
	echo "<script language='javascript'>window.location = '../?HLM=SQL_LOGIN'</script>";
	exit();
	}
   
   
?>