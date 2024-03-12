<!--  -->
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> <a class="navbar-brand" href="#">E-{CP}FORM - <?PHP echo"<b>$vus01_sww[namauser]</b>"; ?></a></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
      <li class="nav-item">
          <a class=" btn btn-success btn-sm" href="?PG_SA=CPF_ENTRI_01"><i class="fas fa-pencil-alt"></i> ENTRI CP</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">His.Data CP</a>
          <div class="dropdown-menu">
          <a class="dropdown-item" href="?PG_SA=CPF01_CP_01_FORMVIEW"><i class="fas fa-folder"></i>&nbsp;DATA CP FORM *Non Bedah</a>
          <a class="dropdown-item" href="?PG_SA=CPF01_CP_01_FORMVIEW02"><i class="fas fa-folder"></i>&nbsp;DATA CP FORM *Bedah</a>
          <a class="dropdown-item" href="?PG_SA=CPF01_CP_01_FORMVIEW02"><i class="fas fa-folder"></i>&nbsp;DATA CP FORM *OBSGIN</a>
          </div>
        </li>
        <?PHP if($vus01_sww['idmain']=="9123854615345h3434234234238f12323fwehfrg"){ ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">MASTERING</a>
          <div class="dropdown-menu">
      <a href="?PG_SA=CPF01_MD_KEG02_01" class="dropdown-item"><i class="fas fa-database"></i> MASTER DATA *Bedah</a>
      <a href="?PG_SA=CPF01_MD_KEG03_01" class="dropdown-item"><i class="fas fa-database"></i> MASTER DATA *OBSGIN</a>
      <a href="?PG_SA=CPF01_RPT_VW_01_VFORM" class="dropdown-item"><i class="fas fa-file-alt"></i> REPORTING *non bedah</a>
      <a href="?PG_SA=CPF01_RPT_VW02_01_VFORM" class="dropdown-item"><i class="fas fa-file-alt"></i> REPORTING *bedah</a>
          </div>
        </li>
        <?PHP } ?>
      </ul>
      <form class="d-flex">
      <a class="btn btn-danger btn-sm" href="<?PHP echo"../LOGIC/ACS/ACS_LOGOUT.php"; ?>"><i class="fas fa-ban"></i>&nbsp;keluar</a>
      </form>
    </div>
  </div>
</nav>
