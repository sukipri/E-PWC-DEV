<?php 
       include"../secure/GR_01.php"; //security enggine
       include"../sc/ID_IDF.php";  //Identifer ID PAGE
       //include"../css.php";   //style and control title meta
           include"../sc/stack_Q.php"; //Query SQL
       include"../sc/code_rand.php";
        include"../config/connec_01_srv.php";
        include"../config/connec_01_srv_pdo_open.php";
        include"../sc/CODE_GET.php";

        ob_start();
        session_start();
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
    <h3>Download Data Karyawan</h3>
<table width="100%"  class="table table-bordered" border="1">
	<?php 
		$vun = $ms_q("$call_sel TUnitPrs order by UnitNama");
			while($vunn = $ms_fas($vun)){
	?>
	  <tr class="table-info">
	  
	    <td width="91%" bgcolor="orange"><?php echo"<b>$vunn[UnitNama]</b>"; ?></td>
          <td width="9%">-</td>
  </tr>
	  <tr>
	 
	    <td height="33" colspan="2">
        <?php 
			$vkry_up = $ms_q("$sl KaryNomor,KaryNama,KaryTglLahir,UnitKode,KaryNomorYakkum,KaryAlamat,KaryNoKTP FROM TKaryawan WHERE NOT KaryStatus='91' AND NOT KaryStatus='99'  AND NOT KaryStatus='92'  AND NOT KaryStatus='94'  AND NOT KaryStatus='93' AND UnitKode='$vunn[UnitKode]' order by  KaryNama asc  "); 
			$no = 1;    
				while($vkryy_up = $ms_fas($vkry_up)){  
				$vtbu = $ms_q("$call_sel TBUser WHERE kode='$vkryy_up[KaryNomor]'");
							$vtbuu = $ms_fas($vtbu);
			?>
        	<?PHP
                echo $vkryy_up['KaryNama'];
            ?>
                <hr>
        <?php } ?>
        </td>
  </tr>
  <?php } ?>
</table>
</body>
<?php } ob_end_flush(); ?>