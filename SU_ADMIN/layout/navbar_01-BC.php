<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="?">E-PWC {B.S}</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-child"></i>&nbsp;Pendaftaran<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		  <!-- ?HLM=[sesuaikan dengan nama file yang disimpan di Layout -->
	<li><a href="<?php echo"?HLM=LIST_DAFTAR_TODAY"; ?>"><i class="fa fa-circle-o-notch"></i>&nbsp; Pendaftar</a></li>
	<li><a href="<?php echo"?HLM=LIST_DAFTAR_BATAL"; ?>"><i class="fa fa-circle-o-notch"></i>&nbsp; Pendaftar Batal</a></li>
	 <li><a href="<?php echo"?HLM=LIST_DAFTAR_ONLINE"; ?>"><i class="fa fa-circle-o-notch"></i>&nbsp; Pendaftar Online Total</a></li>
     <li><a href="<?php echo"?HLM=LIST_DAFTAR"; ?>"><i class="fa fa-circle-o-notch"></i>&nbsp; Pendaftar Total</a></li>
     <li><a href="<?php echo"?HLM=first_page"; ?>"><i class="fa fa-circle-o-notch"></i>&nbsp; Statistik</a></li>
	   </ul>
        </li>
		<!-- second dropdown -->
		       <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-child"></i>&nbsp;Dokter<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		  <!-- ?HLM=[sesuaikan dengan nama file yang disimpan di Layout -->
	<li><a href="<?php echo"?HLM=INPUT_JADWAL_DOKTER"; ?>"><i class="fa fa-circle-o-notch"></i>&nbsp; Entri Jadwal Dokter</a></li>
	 <li><a href="<?php echo"?HLM=DAFTAR_DOKTER"; ?>"><i class="fa fa-circle-o-notch"></i>&nbsp; List Jadwal Dokter</a></li>
	   </ul>
        </li>
		
		<!-- third dropdown -->
		      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-child"></i>&nbsp;Pasien<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		  <!-- ?HLM=[sesuaikan dengan nama file yang disimpan di Layout -->
	<li><a href="<?php echo"?HLM=#"; ?>"><i class="fa fa-circle-o-notch"></i>&nbsp; Entri Data Pasien</a></li>
	 <li><a href="<?php echo"?HLM=DATA_PASIEN"; ?>"><i class="fa fa-circle-o-notch"></i>&nbsp; List Data Pasien</a></li>
	 <li><a href="<?php echo"?HLM=DATA_PASIEN_LAB"; ?>"><i class="fa fa-circle-o-notch"></i>&nbsp; HASIL LAB</a></li>
	 
	   </ul>
        </li> 
		 <!-- fourth -->
        
        </li>
        </ul>
         <?php 
			if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){ ?>
         <ul class="nav navbar-nav navbar-right">
        <li><a href="logic/#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-exclamation-circle"></i>&nbsp;Login Access</a>
        <ul class="dropdown-menu" role="menu">
		  <!-- ?HLM=[sesuaikan dengan nama file yang disimpan di Layout -->
     <li><a href="<?php echo"?HLM=s#"; ?>"><i class="fa fa-terminal"></i>&nbsp;Mysql Login</a></li>
     <li><a href="<?php echo"?HLM=SQL_LOGIN"; ?>"><i class="fa fa-terminal"></i>&nbsp;SQL Server Login</a></li>
     <li><a href="<?php echo"?HLM=##"; ?>"><i class="fa fa-terminal"></i>&nbsp;PostGreSQL Login</a></li>
     <li><a href="<?php echo"?HLM=##"; ?>"><i class="fa fa-terminal"></i>&nbsp;DBAccess Login</a></li>
	  <li class="divider"></li>
	   <li><a href="<?php echo"?HLM=ADD_USER_MYSQL"; ?>"><i class="fa fa-terminal"></i>&nbsp;Add User Mysql</a></li>
	   <li><a href="<?php echo"?HLM=ADD_USER_SRV"; ?>"><i class="fa fa-terminal"></i>&nbsp;Add User SQLServer</a></li>
     </ul>
         </li>
      </ul> 
        <?php } else { ?>
         <ul class="nav navbar-nav navbar-right">
        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-exclamation-circle"></i>&nbsp;<?php echo"$_SESSION[namauser]"; ?></a><ul class="dropdown-menu" role="menu">
		  <!-- ?HLM=[sesuaikan dengan nama file yang disimpan di Layout -->
  	<li><a href="<?php echo"?HLM=HAPUS_SAMPAH"; ?>"><i class="fa fa-terminal"></i>&nbsp;Clear</a></li>
	 <li><a href="<?php echo"logic/LOGOUT.php"; ?>"><i class="fa fa-terminal"></i>&nbsp;Log Out</a></li>
    </ul></li>
		    <li><a href="#"><?php echo"$time_html5"; ?></a></li>
      </ul> 
       <?php } ?>
      
      </ul>
      </div>
  </div>
</nav>