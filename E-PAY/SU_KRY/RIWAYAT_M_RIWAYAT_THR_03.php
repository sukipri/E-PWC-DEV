<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
    error_reporting(0);
			?>
            <?php 	if($uu['akses']==4){  ?>
<body>
<br><br>
    <span style="font-size:20px "><a href="HOME.php"><i class="fas fa-angle-double-left"></i></a> &nbsp;  <a href="?HLM=RIWAYAT_M_RIWAYAT_THR">THR Paskah</a>  &nbsp; <a href="?HLM=RIWAYAT_M_RIWAYAT_THR_02">THR Natal</a>   &nbsp;  SHU YAKKUM   </span>
        <form method="post">
          <table width="362" border="0" class="table">
          <tr>
                <td width="268">
                <!-- <span class="badge green">N Natal</span>  <span class=" badge cyan">P Paskah</span> -->
                 <!-- <span class=" badge blue">B Bonus</span> -->
    			<select name="tahun" required>
                      <option value ="">Periode</option>
                        <?php
                            $thr_dis_vthr01_sw = $ms_q("$sl DISTINCT GajiTahun FROM Citarum.dbo.TGajiTHRYakkum WHERE GajiTHRJenis='p'");
                              while($thr_dis_vthr01_sww = $ms_fas($thr_dis_vthr01_sw)){

                                echo "<option value=$thr_dis_vthr01_sww[GajiTahun]>$thr_dis_vthr01_sww[GajiTahun]</option>";
                              }
                                  
                            ?>
                  </select>  
        
            </td>
            <td width="79"><button class="waves-effect green darken-2 waves-light btn" name="go">GO</button></td>
                <td width="10">&nbsp;</td>
            </tr>
          </table>
        
    </form>
            <br><br>
            <?PHP 
              if(isset($_POST['go'])){
                $tahun = @$sql_slash($_POST['tahun']);
                #DATA GAJI THR
                $thr_vthr01_sw = $ms_q("$call_sel Citarum.dbo.TGajiTHRYakkum WHERE GajiTahun='$tahun' AND KaryNomor='$vkryy[KaryNomorYakkum]'");
                $thr_vthr01_sww = $ms_fas($thr_vthr01_sw);


                echo"Date-Time $date_html5 $time_html5";
                echo"<br>";	
                echo"NIK  :$vkryy[KaryNomor]<br>";
                echo"Nama :$vkryy[KaryNama]<hr>";
                echo"<b>Periode Tahun SHU $tahun</b>";
            ?>
            <table width="100%" border="0" class="striped">
              <tr>
                <td>GAJI POKOK</td>
                <td><?PHP echo "Rp".number_format($thr_vthr01_sww['GajiUpahPokok1']); ?></td>
              </tr>
              <tr>
                <td>GAJI POKOK 2</td>
                <td><?PHP echo "Rp".number_format($thr_vthr01_sww['GajiUpahPokok2']); ?></td>
              </tr>
              <tr>
                <td>Tunjangan Kelg</td>
                <td><?PHP echo "Rp".number_format($thr_vthr01_sww['GajiTunjKelg']); ?></td>
              </tr>
              <tr>
                <td>Gaji Peralihan</td>
                <td><?PHP echo "Rp".number_format($thr_vthr01_sww['GajiTunjPeralihan']); ?></td>
              </tr>
              <tr>
                <td>Gaji Kinerja</td>
                <td><?PHP echo "Rp".number_format($thr_vthr01_sww['GajiTunjKinerja']); ?></td>
              </tr>
              <tr>
                <td><b>Gaji Kotor</b></td>
                <td><?PHP echo "<b>Rp".number_format($thr_vthr01_sww['GajiKotor']."</b>"); ?></td>
              </tr>
              <tr>
                <td><b>Gaji SHU</b></td>
                <td><?PHP echo "<b>Rp".number_format($thr_vthr01_sww['GajiTHR']."</b>"); ?></td>
              </tr>
              <tr>
                <td><b>Gaji PPh</b></td>
                <td><?PHP echo "<b>Rp".number_format($thr_vthr01_sww['GajiTHRPPh']."</b>"); ?></td>
              </tr>
              <tr>
                <td><b>SHU Diterima</b></td>
                <td><?PHP echo "<b>Rp".number_format($thr_vthr01_sww['GajiTHRDiterima']."</b>"); ?></td>
              </tr>
             
            </table>
            <?PHP } ?>
</body>
  <?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
	?>