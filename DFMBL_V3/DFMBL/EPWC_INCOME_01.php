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
        <li class="nav-link">
          <a href="<?PHP echo"?NAVI=EPWC_INCOME_01&PG_SA=EPWC_INCOME_01_TUKIN"; ?>" class="mx-2 h5" style="color:#FFF;"><i class="fas fa-receipt"></i>&nbsp;Tukin</a>
        </li>
    
      </ul>    
    </div>
