	<?php 
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		if(isset($_GET['LOGOUT'])){
			//header("location:../logic/LOGOUT.php");
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../logic/LOGOUT.php">';
		}
	?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary  fixed-top">
  <a class="navbar-brand" href="HOME.php"><i class="fas fa-home"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
	<!-- MASTERS -->
     <li class="nav-item dropdown show">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true"><i class="fa fa-suitcase"></i>&nbsp;Entity Human Resource</a>
    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 48px, 0px); top: 0px; left: 0px; will-change: transform;">
	  <!-- <a class="dropdown-item" href="?HLM=MENU_02"><i class="fa fa-terminal"></i>&nbsp;E-HR Menu</a> -->

      <a class="dropdown-item" href="?HLM=KOP_M"><i class="fa fa-terminal"></i>&nbsp;Rapat [E-Meeting]</a>

      
	  <div class="dropdown-divider"></div>
 
    </div>
  </li>
  <!-- MASTERS -->
  		
    <!-- Aplikasi 
     <li class="nav-item dropdown show">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true"><i class="fa fa-suitcase"></i>&nbsp;Aplikasi</a>
    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 48px, 0px); top: 0px; left: 0px; will-change: transform;">
	   <a class="dropdown-item" href="?HLM=APP_DUTY_01"><i class="fa fa-terminal"></i>&nbsp;Buat Tugas </a>
         <a class="dropdown-item" href="?HLM=APP_DUTY_IN_DAFTAR"><i class="fa fa-terminal"></i>&nbsp;Jadwal Tugas / Rapat</a>
	 <div class="dropdown-divider"></div>
    </div>
  </li>
  -->
  <!-- MASTERS -->
  	<!-- REPORTING 
    <li class="nav-item dropdown show">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true"><i class="fa fa-suitcase"></i>&nbsp;Report</a>
    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 48px, 0px); top: 0px; left: 0px; will-change: transform;">
	     <a class="dropdown-item" href="?HLM=RPT_M"><i class="fa fa-terminal"></i>&nbsp;Diklat</a>
           <a class="dropdown-item" href="?HLM=#"><i class="fa fa-terminal"></i>&nbsp;Laporan 2</a>
	 <div class="dropdown-divider"></div>
    </div>
  </li>
  -->
    <!-- REPORTING -->
  
  	</ul>
	
  <a href="#" class="btn btn-success"><i class="fas fa-wrench"></i>&nbsp;<?php echo"$uu[kode]"; ?></a> &nbsp;
   <a href="?LOGOUT=LOGOUT" class="btn btn-danger"><i class="fa fa-sign-out"></i>&nbsp;Log Out</a>
  </div>
</nav>
<?php } ?>