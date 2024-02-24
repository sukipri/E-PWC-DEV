<nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">E-{Clinic PathWay Form} - <?PHP echo"<b>$vus01_sww[namauser]</b>"; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="btn btn-success btn-sm" href="?PG_SA=CPF_ENTRI_01"><i class="fas fa-edit"></i>&nbsp;ENTRI CPF</a>
        </li>
        &nbsp
        <li class="nav-item">
          <a class="btn btn-secondary btn-sm" href="?PG_SA=CPF01_CP_01_FORMVIEW"><i class="fas fa-folder"></i>&nbsp;DATA CP FORM *Non Bedah</a>
          &nbsp
          <a class="btn btn-secondary btn-sm" href="?PG_SA=CPF01_CP_01_FORMVIEW02"><i class="fas fa-folder"></i>&nbsp;DATA CP FORM *Bedah</a>
          &nbsp
          <a class="btn btn-secondary btn-sm" href="?PG_SA=CPF01_CP_01_FORMVIEW02"><i class="fas fa-folder"></i>&nbsp;DATA CP FORM *OBSGIN</a>
        </li>
        
         <!-- <li class="nav-item">
          <a class="btn btn-info" href="?PG_SA=CPF_MNG_01_M"><i class="fas fa-share-alt-square"></i>&nbsp;Pengelolaan Data * Rumah Sakit</a>
        </li>
        &nbsp
        <li class="nav-item">
          <a class="btn btn-primary" href="?PG_SA=CPF_MNG_03_M"><i class="fas fa-share-alt-square"></i>&nbsp;Pengelolaan Data *Nasional</a>
        </li> -->
       
      </ul>
      <!-- -->
     
      <!-- -->
    </div>
    <?PHP if($vus01_sww['idmain']=="9123854615345h3434234234238f12323fwehfrg"){ ?>
    <a href="?PG_SA=CPF01_MD_KEG_01" class="btn btn-success btn-sm"><i class="fas fa-database"></i> MASTER DATA *Non Bedah</a>
    &nbsp
    <a href="?PG_SA=CPF01_MD_KEG02_01" class="btn btn-success btn-sm"><i class="fas fa-database"></i> MASTER DATA *Bedah</a>
    &nbsp
    <a href="?PG_SA=CPF01_MD_KEG03_01" class="btn btn-success btn-sm"><i class="fas fa-database"></i> MASTER DATA *OBSGIN</a>
    &nbsp
    <a href="?PG_SA=CPF01_RPT_VW_01_VFORM" class="btn btn-dark btn-sm"><i class="fas fa-file-alt"></i> REPORTING *non bedah</a>
    &nbsp
    <a href="?PG_SA=CPF01_RPT_VW02_01_VFORM" class="btn btn-dark btn-sm"><i class="fas fa-file-alt"></i> REPORTING *bedah</a>
    <?PHP } ?>
    &nbsp
    <a class="btn btn-danger btn-sm" href="<?PHP echo"../LOGIC/ACS/ACS_LOGOUT.php"; ?>"><i class="fas fa-ban"></i>&nbsp;keluar</a>
  </div>
</nav>