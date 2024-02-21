	<?php
		switch(@$sql_slash($_GET['OUT'])){
			case'OUT':
				include"../logic/LOGOUT.php";
				break;
		}
	?>
    	<?php
		
		?>
<div class="navbar-fixed">
<nav>
    <div class="nav-wrapper blue darken-3"  style="margin-left:5px;">
      <a href="HOME.php" class="brand-logo">E-PAY</a>
	  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons medium">menu</i></a> 
	  <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="?HLM=RIWAYAT_M_RIWAYAT">Riwayat Gaji</a></li>
        <li><a href="?HLM=RIWAYAT_M_RIWAYAT_THR">Riwayat THR</a></li>
        <li><a href="?HLM=RIWAYAT_M_RIWAYAT_RAPEL">Riwayat RAPEL</a></li>
        <li><a href="?HLM=PROFIL_M_PROFIL">Profil Karyawan</a></li>
          <li><a href="?HLM=PROFIL_M_AKUN">Akun Karyawan</a></li>
          <li><a href="?HLM=PESAN_M_INBOX"><?php echo"Pesan $vps01_sww"; ?></a></li>
          <li><a href="http://103.164.114.138//E-PWC/DFMBL_V3/DFMBL/EPWC_HOME_01.php?">E-PWC</a></li>
        <li><a href="?OUT=OUT">Keluar</a></li>
  
      </ul>
    </div>
  </nav>
  </div>
	 <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img src="http://daftar.pantiwilasa-citarum.co.id/images/H4.jpg" class="responsive-img">
      </div>
	  <br><br><br>
    </div></li>
    <li><div class="divider"></div></li>
            <li><a href="?HLM=RIWAYAT_M_RIWAYAT"><i class="material-icons">attach_money</i>&nbsp;Riwayat Gaji</a></li>
            <li><a href="?HLM=RIWAYAT_M_RIWAYAT_THR"><i class="material-icons">attach_money</i>&nbsp;Riwayat THR</a></li>
            <li><a href="?HLM=RIWAYAT_M_RIWAYAT_RAPEL"><i class="material-icons">attach_money</i>&nbsp;Riwayat RAPEL</a></li>
        <li><a href="?HLM=PROFIL_M_PROFIL"><i class="material-icons">assignment_ind</i>&nbsp;Profil Karyawan</a></li>
           <li><a href="?HLM=PROFIL_M_AKUN"><i class="material-icons">assignment_ind</i>&nbsp;Akun Karyawan</a></li>
            <li><a href="?HLM=PESAN_M_INBOX"><i class="material-icons">contact_mail</i>&nbsp;<?php echo"Pesan <b>$vps01_sww</b>"; ?></a></li>
            <li><a href="http://182.253.60.178/E-PWC/DFMBL_V3/DFMBL/EPWC_HOME_01.php?"><i class="material-icons">home</i>&nbsp;E-PWC</a></li>
        <li><a href="?OUT=OUT"><i class="fas fa-power-off"></i>Keluar</a></li>
  </ul>

