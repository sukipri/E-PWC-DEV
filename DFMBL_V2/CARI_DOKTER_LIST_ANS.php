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
    <div class="nav-wrapper blue accent-2">
	   <ul>
      <li><a href="#!!">Pendaftaran Online (Asuransi)</a></li>
      </ul>
	  </div>
  </nav>
  <!--
			<form method="post">
		 <input name="nama" placeholder="Masukan Nama Dokter" type="text" class="validate" required>  
	 <button class="waves-effect waves-light btn blue" name="go"><i class="material-icons">search</i></button>
	 </form>
	 -->
	     <div class="pdt txt">
		<a href="CARI_DOKTER_ANS.php" class="waves-effect waves-light btn grey"><i class="material-icons">chevron_left</i></a>
		 <ul class="collapsible">
		 <?php
		 $vpl = $ms_q("$call_sel TUnit where UnitKode3='0201' order by UnitNama asc");
						while($vpll = $ms_fas($vpl)){
				//str_replcae
			$teksawal = "$vpll[UnitNama]";
 			$txt_01 = str_replace("Klinik Sp.", "", $teksawal);
		 ?>
    <li>
      <div class="collapsible-header"><i class="material-icons">local_hospital</i><?php echo"$txt_01"; ?></div>
      <div class="collapsible-body"><span>
	  
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
				
				$vdkt =  $ms_q("$call_sel TPelaku where UnitKode='$vpll[UnitKode]' AND PelakuStatus='A' AND  NOT PelakuNama LIKE '%PAKET%' order by PelakuNama asc");
				$no = 1;
							while($vdktt = $ms_fas($vdkt)){
						
				?>
          <tr class="txt">
            <td colspan="3"><?php echo"$vdktt[PelakuNama]<br> <b>Poli $txt_01</b>"; ?>
			 <center><a href="<?php echo"DAFTAR_STEP_02_ANS.php?IDDKT=$vdktt[PelakuKode]#$vdktt[SpesKode]"; ?>" class="waves-effect waves-light btn green"><i class="material-icons left">done</i>&nbsp;Pilih Dokter</a></center></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
	  
	  </span></div>
    </li>
  		<?php } ?>
  </ul>
	<?php
		 //if(isset($_POST['go'])){
		 	//$nama= @trim($_POST['nama']);
			
	 ?>
	
	<?php //} ?>
	</div>
	
	
</body>
</html>
