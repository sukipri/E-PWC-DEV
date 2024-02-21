<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

	<?php 
		
			include"config02.php";
			include"css.php";
	?>
<body>
		<?php include"MENU.php"; ?>
		 <nav>
    <div class="nav-wrapper">
	   <ul>
      <li><a href="#!!">Pendaftaran Online (Asuransi)</a></li>
      </ul>
	  </div>
  </nav>
		<div class="pdt">
		<div class="container">
		<form method="post">
  <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">accessibility</i>
          <input id="icon_prefix" type="text" name="nama" class="validate txt" required>
          <label for="icon_prefix">Isikan Nama Dokter</label>
	    </div>
		<div class="input-field col s6">
		  <button class="waves-effect waves-light btn blue" name="go"><i class="material-icons">search</i></button>
	    </div>
	</div>
	</form>
	<?php
		 if(isset($_POST['go'])){
		 	$nama= @trim($_POST['nama']);
			
	 ?>
	<table class="table striped">
        <thead>
          <tr class="txt">
              <th>Nama</th>
              <th>Jadwal</th>
              <th>Poli</th>
          </tr>
        </thead>

        <tbody>
		  	<?php
				
				$vdkt =  $ms_q("$call_sel TPelaku where PelakuNama LIKE '%$nama%' AND PelakuStatus='A' order by PelakuNama asc");
				$no = 1;
							while($vdktt = $ms_fas($vdkt)){
						$vpl = $ms_q("$call_sel TUnit where UnitKode='$vdktt[UnitKode]'");
							$vpll = $ms_fas($vpl);
				//str_replcae
			$teksawal = "$vpll[UnitNama]";
 			$txt_01 = str_replace("Klinik Sp.", "", $teksawal);
				?>
          <tr class="txt">
            <td colspan="3"><?php echo"$vdktt[PelakuNama]<br> <b>Poli $txt_01</b>"; ?>
			 <center><a href="<?php echo"DAFTAR_STEP_02_ANS.php?IDDKT=$vdktt[PelakuKode]#$vdktt[SpesKode]"; ?>" class="waves-effect waves-light btn green"><i class="material-icons left">done</i>&nbsp;Pilih Dokter</a></center></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
	<?php } ?>
	</div>
	
	</div>
</body>
</html>
