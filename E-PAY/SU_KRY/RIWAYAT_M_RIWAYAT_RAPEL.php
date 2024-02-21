<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<?php 	if($uu['akses']==4){  ?>
	<span style="font-size:20px "><a href="HOME.php"><i class="fas fa-angle-double-left"></i></a> &nbsp; || DATA RAPEL </span>
    <form method="post">
    <table width="362" border="0" class="table">
      <tr>
<td width="268">
	<select name="rapelanbulan" required>
                  <option value ="">Periode</option>
                  	<?php
                      
                            $epay_vgr01_sw =$ms_q("$sl RapelanBulan,RapelanJenis,KaryNomor FROM TGajiRapelan WHERE KaryNomor='$vkryy[KaryNomor]' AND RapelanStatus='1' ");
                                while($epay_vgr01_sww = $ms_fas($epay_vgr01_sw)){
                                    echo"<option value=$epay_vgr01_sww[RapelanBulan]>Rapelan $epay_vgr01_sww[RapelanBulan]</option>";
                                }
					
						?>
              </select>  
              <br>
              <select name="rapelanjenis" required>
                  <option value ="">Jenis</option>
                  <option value="T">THR</option>
                  <option value="L">LEMBUR</option>                      
              </select> 
    
		</td>
        <td width="79"><button class="waves-effect green darken-2 waves-light btn" name="go">GO</button></td>
            <td width="10">&nbsp;</td>
        </tr>
        </table>
    </form>
        <br>
    <?PHP if(isset($_POST['go'])){ $rapelanbulan = @$_POST['rapelanbulan']; $rapelanjenis = @$_POST['rapelanjenis']; ?>
    <?PHP if($rapelanjenis=="T"){ echo"<b>#RAPELAN THR $rapelanbulan</b>"; ?>
    <table width="100%" border="0" class="table striped">
        <?PHP
            $epay_vgr01_sw02 = $ms_q("$call_sel TGajiRapelan WHERE RapelanBulan='$rapelanbulan' AND RapelanJenis='$rapelanjenis' AND KaryNomor='$vkryy[KaryNomor]' ");
                while($epay_vgr01_sww02 = $ms_fas($epay_vgr01_sw02)){
        ?>
            <tr>
             <td colspan="2" class="green lighten-1"><b>#Penghasilan</b></td>
            </tr>
            <tr>
                <td>Selisih Paskah</td>
                <td><?PHP echo "Rp.".@$nf($epay_vgr01_sww02['RapelanJml1']); ?></td>
            </tr>
            <tr>
                <td>Selisih SHU</td>
                <td><?PHP echo "Rp.".@$nf($epay_vgr01_sww02['RapelanJml2']); ?></td>
            </tr>
            <tr>
                <td>Selisih NATAL</td>
                <td><?PHP echo "Rp.".@$nf($epay_vgr01_sww02['RapelanJml3']); ?></td>
            </tr>
            <tr>
                <td>TOTAL Bruto</td>
                <td><?PHP echo "Rp.".@$nf($epay_vgr01_sww02['RapelanBruto']); ?></td>
            </tr>
            <tr>
                <td>PPh 21</td>
                <td><?PHP echo "Rp.".@$nf($epay_vgr01_sww02['RapelanPPh21']); ?></td>
            </tr>
            <tr class="green lighten-3">
                <td>Diterima</td>
                <td><?PHP echo "Rp.".@$nf($epay_vgr01_sww02['RapelanDiterima']); ?></td>
            </tr>
            <?PHP } ?>
        </table>

        <?PHP }elseif($rapelanjenis=="L"){    ?>
           
            <?PHP
            $epay_vgr01_sw03 = $ms_q("$call_sel TGajiLemburRapel WHERE    KaryNomor='$vkryy[KaryNomor]' ");
                while($epay_vgr01_sww03 = $ms_fas($epay_vgr01_sw03)){
                    echo"<br>";
                    echo"<b>#RAPELAN LEMBUR $epay_vgr01_sww03[RapelBulan]</b>";
        ?>
         <table width="100%" border="0" class="table striped">
            <tr>
             <td colspan="2" class="green lighten-1"><b>#Penghasilan</b></td>
            </tr>
            <tr>
                <td>Lembur</td>
                <td><?PHP echo "Rp.".@$nf($epay_vgr01_sww03['LemburJumlah1']); ?></td>
            </tr>
            <tr>
                <td>Selisih Lembur</td>
                <td><?PHP echo "Rp.".@$nf($epay_vgr01_sww03['Selisih']); ?></td>
            </tr>
            <tr class="green lighten-3">
                <td>Diterima</td>
                <td><?PHP echo "Rp.".@$nf($epay_vgr01_sww03['LemburJumlah1']); ?></td>
            </tr>
            </table>
            <?PHP } ?>
            <hr>
            <i>RINGKASAN</i>
            <br>
            <?PHP 
            #LBR 01
        $epay_tot_vgr01_sw03 = $ms_q("$sl SUM(LemburJumlah1) as tot_lbr01 FROM TGajiLemburRapel  WHERE    KaryNomor='$vkryy[KaryNomor]' ");
            $epay_tot_vgr01_sww03 = $ms_fas($epay_tot_vgr01_sw03);
            #LBR 02
            $epay_tot02_vgr01_sw03 = $ms_q("$sl SUM(LemburJumlah2) as tot_lbr02 FROM TGajiLemburRapel  WHERE    KaryNomor='$vkryy[KaryNomor]' ");
            $epay_tot02_vgr01_sww03 = $ms_fas($epay_tot02_vgr01_sw03);
            #SLISIH
            $epay_tot03_vgr01_sw03 = $ms_q("$sl SUM(Selisih) as tot_lbr03 FROM TGajiLemburRapel  WHERE    KaryNomor='$vkryy[KaryNomor]' ");
            $epay_tot03_vgr01_sww03 = $ms_fas($epay_tot03_vgr01_sw03);
                    
                    #KET
                    echo"Nominal Lembur <b>".@$nf($epay_tot_vgr01_sww03['tot_lbr01'])."</b>";
                    echo"<br>";
                    echo"Nominal Selisih <b>".@$nf($epay_tot03_vgr01_sww03['tot_lbr03'])."</b>";
                    echo"<br>";
                    echo"Nominal Diterima <b>".@$nf($epay_tot02_vgr01_sww03['tot_lbr02'])."</b>";
            ?>
            
        
<?PHP } } ?>

<?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
	?>
