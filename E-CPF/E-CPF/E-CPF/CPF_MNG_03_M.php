<?php
		
		 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
 			include'../LOGIC/PG/PG_H_LOCATION.php';
       }else{

			if($vus01_sww['akses']==6 OR $vus01_sww['akses']==61 ){ 
		
?>

	<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">MAIN MENU</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a href="?PG_SA=CPF_MNG_03_M&PG_SA_SUB=CPF_VIEW_03_ALL" class="nav-link btn btn-outline-warning btn-sm active"><i class="fas fa-bars"></i>&nbsp;Tampilkan CPF *Semua</a>
              </li>
           	&nbsp;
             <li class="nav-item">
           		<a href="?PG_SA=CPF_MNG_03_M&PG_SA_SUB=CPF_VIEW_02_TGL" class="nav-link btn btn-outline-warning btn-sm active"><i class="far fa-calendar-alt"></i>&nbsp;Tampilkan CPF *TANGGAL</a>
            </li>
            &nbsp;
             <li class="nav-item">
           		<a href="?PG_SA=CPF_MNG_01_M&PG_SA_SUB=CPF_LAP_01_M" class="nav-link btn btn-outline-success btn-sm active"><i class="	fas fa-book"></i>&nbsp;Laporan CPF</a>
            </li>
          </ul>
         
        </div>
      </div>
</nav>
           
    <!-- -->
    <?PHP include"../LOGIC/PG/PG_SA_SUB.php"; ?>
    
    </body>
    
    <?PHP }} ?>