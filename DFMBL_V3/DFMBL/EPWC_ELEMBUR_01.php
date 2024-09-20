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
        <?PHP  #if($epwc_vkry01_sww['UnitKode']=="93" ){ ?>
          <!-- <li class="nav-link">
          <a href="<?PHP #echo"?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_IN"; ?>" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-receipt"></i>&nbsp;Entri Lembur</a>
        </li>
        <li class="nav-link">
          <a href="<?PHP #echo"?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_IN02TEMP"; ?>" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-receipt"></i>&nbsp;Temp.Lembur</a>
        </li> -->
          <?PHP #} ?>
        <?PHP  if($epwc_vkry01_sww['KaryNomor']=="04181143" OR $epwc_vkry01_sww['KaryJbtStruktural']=="08" OR $epwc_vkry01_sww['KaryJbtStruktural']=="06" OR  $epwc_vkry01_sww['KaryJbtStruktural']=="07"  OR $epwc_vkry01_sww['KaryNomor']=="04181107" OR $epwc_vkry01_sww['KaryNomor']=="04241255"  OR $epwc_vkry01_sww['KaryNomor']=="744/SMG/YAKKUM" OR $epwc_vkry01_sww['KaryNomor']=="04161065" ){ ?>
        <li class="nav-link">
          <a href="<?PHP echo"?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_IN"; ?>" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-receipt"></i>&nbsp;Entri Lembur</a>
        </li>
        <li class="nav-link">
          <a href="<?PHP echo"?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW02"; ?>" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-receipt"></i>&nbsp;Mng.Lembur</a>
        </li>
        <li class="nav-link">
          <a href="<?PHP echo"?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_IN02TEMP"; ?>" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-receipt"></i>&nbsp;Temp.Lembur</a>
        </li>
        <!-- --> <li class="nav-link">
          <a href="<?PHP echo"?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW02HIS"; ?>" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-receipt"></i>&nbsp;His Lem.Personel</a>
        </li> 
        <?PHP } ?>
        <?PHP  if($epwc_vkry01_sww['KaryNomor']=="04181143" OR $epwc_vkry01_sww['KaryNomor']=="671/SMG/YAKKUM" OR $epwc_vkry01_sww['KaryNomor']=="837/SMG/YAKKUM" OR $epwc_vkry01_sww['KaryNomor']=="04100869"   OR $epwc_vkry01_sww['KaryNomor']=="04161065"){ ?>
        <li class="nav-link">
          <a href="<?PHP echo"?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEWM"; ?>" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-receipt"></i>&nbsp;Verif Lembur</a>
        </li>
        <!-- <li class="nav-link">
          <a href="<?PHP echo"?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW03"; ?>" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-receipt"></i>&nbsp;Lingkup Bagian</a>
        </li> -->
        <?PHP } ?>
        <li class="nav-link">
          <a href="<?PHP echo"?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW04"; ?>" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-receipt"></i>&nbsp;Riwayat Lembur</a>
        </li>
    
      </ul>    
    </div>
