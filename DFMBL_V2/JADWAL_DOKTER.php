<?php 
		
			include"config02.php";
			include"css.php";
	?>
<body>
	<?php include"MENU.php"; ?>
<nav>
		<div class="nav-wrapper blue accent-2">
		   <ul>
		  <li><a href="#!!"><b>Jadwal Dokter</b></a></li>
		  </ul>
</div>
	  </nav>
	       
             
             <!-- -->
               <div class="pdt txt">
		<a href="HOME.php" class="waves-effect waves-light btn grey"><i class="material-icons">chevron_left</i></a>
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
            <td colspan="3"><?php echo"$vdktt[PelakuNama]<br> <b>Poli $txt_01</b><br>"; ?>
			
             <?php
					$vjdl = $ms_q("$call_sel JadwalDokter where DokterKode='$vdktt[PelakuKode]'");
					$vjdl_nr = $ms_nr($vjdl);
					while($vjdll = $ms_fas($vjdl)){
						if($vjdl_nr < 0 ){
							echo"Tidak Ada Praktik";
							}elseif($vjdl_nr > 0){
							echo"$vjdll[KetHari] $vjdll[KetJam]<br>";
					} }
						
			?>
            </td>
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
