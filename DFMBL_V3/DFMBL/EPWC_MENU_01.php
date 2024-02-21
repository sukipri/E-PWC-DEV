 <!-- Side-Nav -->
<?php
		switch(@$SQL_SL($_GET['OUT'])){
			case'OUT':
				include"../LOGIC/ACS/ACS_LOGOUT.php";
				break;
		}
	?>
    <div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
      <ul class="nav flex-column text-white w-100" style="color:#FFF;">
        <a href="#" class="nav-link h5 text-white my-2">
        <h4>E-PWC</h4>
         <span class="badge badge-info"><?PHP echo"$epwc_vkry01_sww[KaryNama]"; ?></span>
           <span class="badge badge-warning"><?PHP echo"$epwc_vkry01_sww[KaryNomorYakkum]"; ?></span>
        </a>
        <li class="nav-link">
          <a href="http://103.164.114.138/E-PWC/E-PAY/SU_KRY/HOME.php?HLM=PROFIL_M_PROFIL" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-male"></i>&nbsp;Data Pribadi</a>
        </li>
        <li class="nav-link">
           <a href="?NAVI=EPWC_MENU_01_EP" class="mx-2 h5" style="color:#FFF;"><i class="far fa-address-book"></i>&nbsp;E-Presence</a>
        </li>
        <li  class="nav-link">
           <a href="http://103.164.114.138/E-PWC/E-PAY/SU_KRY/HOME.php" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-money-bill"></i>&nbsp;E-PAY</a>
        </li>
        <li  class="nav-link">
           <a href="#" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-file-alt"></i>&nbsp;Surat Tugas</a>
        </li>
        <li  class="nav-link">
           <a href="#" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-book-reader"></i>&nbsp;E-Kinerja</a>
        </li>
       <?PHP #if($epwc_vkry01_sww['KaryNomor']=="04181143"){ ?>
        <li  class="nav-link">
           <a href="?NAVI=EPWC_ELEMBUR_01" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-dumbbell"></i>&nbsp;E-Lembur</a>
        </li>
        <?PHP #} ?>
      <?PHP if($epwc_vkry01_sww['UnitKode']=="76"){ ?>
         <li  class="nav-link">
            <a href="?NAVI=EPWC_MENU_IPF_01" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-toolbox"></i>&nbsp;IPF</a>
         </li>
      <?PHP } ?>
      <?PHP if($epwc_vkry01_sww['KaryNomor']=="212/SMG/YAKKUM" OR $epwc_vkry01_sww['KaryNomor']=="04130960" OR $epwc_vkry01_sww['KaryNomor']=="04161031" ){ ?>
         <li  class="nav-link">
            <a href="?PG_SA=EPWC_LAYANPOLI_01" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-toolbox"></i>&nbsp;Lap.Waktu Tunggu</a>
         </li>
      <?PHP } ?>
      <?PHP  if($epwc_vkry01_sww['KaryNomor']=="04161031" OR $epwc_vkry01_sww['KaryNomor']=="04181143" OR $epwc_vkry01_sww['KaryNomor']=="04130956" ){ ?> 
         <!-- <li  class="nav-link">
            <a href="?PG_SA=EPWC_MORMET_01" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-toolbox"></i>&nbsp;Check MorMet</a>
         </li> -->
         <li  class="nav-link">
            <a href="?NAVI=EPWC_OTFARM_01" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-notes-medical"></i>&nbsp;OtFarm</a>
         </li>
   <?PHP } ?>
        <div style="padding-top:10rem;"></div>
        <li  class="nav-link">
           <a href="?OUT=OUT" class="mx-2 h5 btn btn-danger btn-sm" style="color:#FFF;"><i class="fas fa-sign-out-alt"></i>&nbsp;LOG OUT</a>
        </li>
      </ul>

      <span href="#" class="nav-link h4 w-100 mb-5">
        <a href=""><i class="bx bxl-instagram-alt text-white"></i></a>
        <a href=""><i class="bx bxl-twitter px-2 text-white"></i></a>
        <a href=""><i class="bx bxl-facebook text-white"></i></a>
      </span>
    </div>

 