<!-- Side-Nav -->
    <div class="side-navbar active-nav justify-content-between flex-wrap flex-column" id="sidebar">
     <ul class="nav flex-column text-white w-100" style="color:#FFF;">
        <a href="#" class="nav-link h5 text-white my-2">
        <h4>E-PWC</h4>
        <span class="badge badge-info"><?PHP echo"$epwc_vkry01_sww[KaryNama]"; ?></span>
           <span class="badge badge-warning"><?PHP echo"$epwc_vkry01_sww[KaryNomorYakkum]"; ?></span>
         </a>
      
          <li class="nav-link">
          <a href="?" class="mx-2 h4" style="color:#FFF;"> <i class="fas fa-angle-double-left"></i> &nbsp;Back</a>
        </li>
      <?PHP //if($open_tj_vkry01_sww['ep_ip_01']==$HP_ID_MD5){ ?> <?PHP //} #mAINTENANCE ?> 
        <li class="nav-link">
          <a href="<?PHP echo"https://rspwc.net/E-PWC/DFMBL_V3/DFMBL/DFMBL/WS-EPWC_EP_APP_01.php?IDEMP01=$IDEMP01"; ?>" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-door-closed"></i>&nbsp;Check In</a>
        </li>
         <li class="nav-link">
          <a href="<?PHP echo"https://rspwc.net/E-PWC/DFMBL_V3/DFMBL/DFMBL/WS-EPWC_EP_APP_02.php?IDEMP01=$IDEMP01"; ?>" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-door-open"></i>&nbsp;Check Out</a>
        </li>
        
        <?PHP if($epwc_vkry01_sww['KaryNomor']=="04110877" OR $epwc_vkry01_sww['KaryNomor']=="04161031" OR $epwc_vkry01_sww['KaryNomor']=="04960451"){ ?>
        <li class="nav-link">
          <a href="<?PHP echo"?NAVI=EPWC_MENU_01_EP&PG_SA=WS-EPWC_EP_DATA_PRESENSI02"; ?>" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-file-alt"></i>&nbsp;STS.Presensi</a>
        </li>
         <?PHP } ?>
        <li  class="nav-link">
           <a href="?NAVI=EPWC_MENU_01_EP&PG_SA=WS-EPWC_EP_APP_01_VIEW" class="mx-2 h5" style="color:#FFF;"><i class="far fa-address-book"></i>&nbsp;R. Presensi</a>
        </li>
            <?PHP if($epwc_vkry01_sww['KaryJbtStruktural']=="09" OR $epwc_vkry01_sww['KaryJbtStruktural']=="20"){  
            }else{ ?>
        <li  class="nav-link">
           <a href="?NAVI=EPWC_MENU_01_EP&PG_SA=WS-EPWC_EP_APP_01_VIEW02" class="mx-2 h5" style="color:#FFF;"><i class="far fa-address-book"></i>&nbsp;R.P.Personel</a>
        </li>
        <li  class="nav-link">
           <a href="<?PHP echo"?NAVI=EPWC_MENU_01_EP&PG_SA=EPWC_EJADWAL_01_IN"; ?>" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-upload"></i>&nbsp;Entri Jadwal</a>
        </li>
        <!-- <li  class="nav-link">
           <a href="<?PHP #echo"?NAVI=EPWC_MENU_01_EP&PG_SA=WS-EPWC_EP_APP_JDW_IN"; ?>" class="mx-2 btn btn-success" style="color:#FFF;"><i class="fas fa-upload"></i>&nbsp;Entri Jadwal</a>
        </li> -->
            <?PHP } ?>
         <?PHP #if($epwc_vkry01_sww['KaryJbtStruktural']=="01" OR $epwc_vkry01_sww['KaryJbtStruktural']=="02"){ ?>
         <!-- <li  class="nav-link">
           <a href="<?PHP #echo"?NAVI=EPWC_MENU_01_EP&PG_SA=WS-EPWC_EP_APP_JDW_LBR_APP"; ?>" class="mx-2 btn btn-success" style="color:#FFF;"><i class="fas fa-bell-slash"></i>&nbsp;App.Lembur</a>
        </li> -->
        <?PHP #} ?>
        <li  class="nav-link">
              <a href="?NAVI=EPWC_MENU_01_EP&PG_SA=#" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-user-alt-slash"></i>&nbsp;Form Ijin</a>
          </li>
          <li  class="nav-link">
           <a href="?NAVI=EPWC_MENU_01_EP&PG_SA=WS-EPWC_EP_APP_01_JDW" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-calendar-alt"></i>&nbsp;Jadwal Masuk</a>
        </li>
        <?PHP if($open_tj_vkry01_sww['ep_ip_01']=="0"){ ?>
         <li  class="nav-link">
            <a href="<?PHP echo"?NAVI=EPWC_MENU_01_EP&UPIP=UPIP"; ?>" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-microchip"></i>&nbsp;Patenkan</a>
          </li>
          <?PHP include"../LOGIC/PRC/EXE_MIX.php"; ?>
           <?PHP } ?>
           <?PHP echo"<center>IP ". $_IP_ADDRESS."</center>"; ?>
               
      </ul>    
    </div>
