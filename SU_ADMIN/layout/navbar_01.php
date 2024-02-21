<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="?"><?PHP echo"ADMIN - $uu[namauser]"; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <?PHP 
        #AKSES POINTMENT
        if($uu['akses']=="1" OR $uu['akses']=="A1" ){
    ?>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-user-circle"></i> Pendaftaran
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo"?HLM=LIST_DAFTAR_TODAY"; ?>">Pendaftar</a>
          <a class="dropdown-item" href="<?php echo"?HLM=LIST_DAFTAR_BATAL"; ?>">Pendf Batal</a>
          <a class="dropdown-item" href="<?php echo"?HLM=LIST_DAFTAR_ONLINE"; ?>">Pendf ONLINE</a>
          <a class="dropdown-item" href="<?php echo"?HLM=LIST_DAFTAR_MJKN"; ?>">Pendf MJKN</a>
          <a class="dropdown-item" href="<?php echo"?HLM=LIST_DAFTAR_APM"; ?>">Pendf APM</a>
          <a class="dropdown-item" href="<?php echo"?HLM=first_page"; ?>">STATISTIK</a>
        </div>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-user-circle"></i> Dokter
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo"?HLM=INPUT_JADWAL_DOKTER"; ?>">ENTRI JADWAL DOKTER</a>
          <a class="dropdown-item" href="<?php echo"?HLM=DAFTAR_DOKTER"; ?>">LIST DOKTER</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-user-circle"></i> Pasien
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo"?HLM=DATA_PASIEN"; ?>">DATA PASIEN</a>
          <a class="dropdown-item" href="<?php echo"?HLM=DATA_PASIEN_LAB"; ?>">HASIL LAB</a>
        </div>
      </li>
      <?PHP }if($uu['akses']=="CPF1" OR $uu['akses']=="A1"){ #CPF ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-user-circle"></i> CPF
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo"?HLM=CPF_LIST_01"; ?>">DATA  Realtime</a>
          <a class="dropdown-item" href="<?php echo"?HLM=CPF_LIST_01_STK03_DATE"; ?>">DATA  Statistik DATE *INTERNAL</a>
          <a class="dropdown-item" href="<?php echo"?HLM=CPF_LIST_01_STK04_DATE"; ?>">DATA  Statistik DATE *NASIONAL</a>
          <a class="dropdown-item" href="<?php echo"?HLM=CPF_LIST_01_STK03"; ?>">DATA  Statistik REALTIME</a>
        </div>
      </li>
      <?PHP }if($uu['akses']=="VK1" OR $uu['akses']=="A1"){ #KODE REGISTER ?>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-user-circle"></i> KODE REGISTER (VK)
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo"?HLM=KR_VK_01_IN"; ?>">ENTRI KODE</a>
          <a class="dropdown-item" href="<?php echo"?HLM=KR_VK_01_VIEW"; ?>">REKAP KODE</a>
        </div>
      </li>
      
      <?PHP }if($uu['akses']=="11" OR $uu['akses']=="A1"){ #KODE REGISTER ?>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-user-circle"></i> KRITIK & SARAN
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="<?php echo"?HLM=KS_PWC_VIEW_01"; ?>">KRITIK & SARAN</a>
        </div>
      </li>
      <?PHP } ?>
      &nbsp
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active btn btn-dark btn-sm" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-quote-left"></i> MORE
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="<?php echo"?HLM=HAPUS_SAMPAH"; ?>">WS-API(Web Service)</a>
        <a class="dropdown-item" href="<?php echo"?HLM=HAPUS_SAMPAH"; ?>">CLEAR LOG</a>
          <a class="dropdown-item" href="logic/LOGOUT.php">!KELUAR</a>
        </div>
      </li>
      
    </ul>
  </div>
</nav>