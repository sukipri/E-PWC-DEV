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
    <span style="font-size:20px "><a href="HOME.php"><i class="fas fa-angle-double-left"></i></a> &nbsp;  Tunjangan Hari Raya  &nbsp; <!-- <a href="?HLM=RIWAYAT_M_RIWAYAT_THR_02">THR Natal</a>   &nbsp; <a href="?HLM=RIWAYAT_M_RIWAYAT_THR_03"> SHU YAKKUM </a>  -->  </span>
        <form method="post">
          <table width="362" border="0" class="table">
          <tr>
                <td width="268">
                <!-- <span class="badge green">N Natal</span>  <span class=" badge cyan">P Paskah</span> -->
                 <!-- <span class=" badge blue">B Bonus</span> -->
    			<select name="tahun" required>
                      <option value ="">Periode</option>
                        <?php
                            $thr_dis_vthr01_sw = $ms_q("$sl DISTINCT GajiTahun FROM Citarum.dbo.TGajiTHRYakkum ");
                              while($thr_dis_vthr01_sww = $ms_fas($thr_dis_vthr01_sw)){

                                echo "<option value=$thr_dis_vthr01_sww[GajiTahun]>$thr_dis_vthr01_sww[GajiTahun]</option>";
                              }
                                  
                            ?>
                  </select> 
            </td>
                  <td width="268">
                  <select name="jthr" required>
                      <option value ="">-</option>
                      <option value ="P">Paskah</option>
                      <option value ="N">Natal</option>

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
                $jthr = @$sql_slash($_POST['jthr']);
                #DATA GAJI THR
                $thr_vthr01_sw = $ms_q("$call_sel Citarum.dbo.TGajiTHRYakkum WHERE GajiTahun='$tahun' AND KaryNomor='$vkryy[KaryNomorYakkum]' AND GajiTHRJenis='$jthr'");
                while($thr_vthr01_sww = $ms_fas($thr_vthr01_sw)){

                echo"Date-Time $date_html5 $time_html5";
                echo"<br>";	
                echo"NIK  :$vkryy[KaryNomor]<br>";
                echo"Nama :$vkryy[KaryNama]<hr>";
                if($thr_vthr01_sww['GajiTHRJenis']=="N"){
                  echo"<b>THR NATAL $tahun</b>";
                } elseif($thr_vthr01_sww['GajiTHRJenis']=="P"){
                  echo"<b>THR PASKAH $tahun</b>";
                }
            ?>
            <table width="100%" border="0" class="striped">
              <tr>
                <td>UPAH POKOK</td>
                <td><?PHP echo "Rp".number_format($thr_vthr01_sww['GajiUpahPokok1']); ?></td>
              </tr>
              <tr>
                <td>UPAH POKOK 2</td>
                <td><?PHP echo "Rp".number_format($thr_vthr01_sww['GajiUpahPokok2']); ?></td>
              </tr>
              <tr>
                <td>Tunj. Keluarga</td>
                <td><?PHP echo "Rp".number_format($thr_vthr01_sww['GajiTunjKelg']); ?></td>
              </tr>
              <tr>
                <td>Tunj. Peralihan</td>
                <td><?PHP echo "Rp".number_format($thr_vthr01_sww['GajiTunjPeralihan']); ?></td>
              </tr>
              <tr>
                <td>Tunj. Kinerja</td>
                <td><?PHP echo "Rp".number_format($thr_vthr01_sww['GajiTunjKinerja']); ?></td>
              </tr>
              <tr>
                <td>Tunj. Jabatan</td>
                <td><?PHP echo "Rp".number_format($thr_vthr01_sww['GajiTunjJabatan']); ?></td>
              </tr>
              <tr>
                <td><b>THR Bruto</b></td>
                <td><?PHP echo "<b>Rp".number_format($thr_vthr01_sww['GajiTHR']."</b>"); ?></td>
              </tr>
              <tr>
                <td><b>PPh</b></td>
                <td><?PHP echo "<b>Rp".number_format($thr_vthr01_sww['GajiTHRPPh']."</b>"); ?></td>
              </tr>
              <tr>
                <td><b>THR Diterima</b></td>
                <td><?PHP echo "<b>Rp".number_format($thr_vthr01_sww['GajiTHRDiterima']."</b>"); ?></td>
              </tr>
             
            </table>
            <br><br>
            <?PHP } } ?>
</body>
  <?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
	?>