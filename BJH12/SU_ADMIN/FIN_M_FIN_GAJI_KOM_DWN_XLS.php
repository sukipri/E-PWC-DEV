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
<form method="post">
    <h4>#DAFTAR GAJI KARYAWAN RS PANTI WILASA CITARUM</h4>

    <table border="1">
    <tr bgcolor="#1E90FF">
        <td width="5%">#</td>
        <td>NIP</td>
        <td>#</td>
        <td>Penghasilan Kotor</td>
        <td>Penghasilan Bersih</td>
    </tr>
    <?PHP 
            $gaji_no_01 = 1;
                #DATA KARYWAN
                $fin_vkry01_sw = $ms_q("$sl KaryNomor,KaryNomorYakkum,KaryNama FROM TKaryawan WHERE   NOT KaryStatus='91' AND NOT KaryStatus='99'  AND NOT KaryStatus='92'  AND NOT KaryStatus='94'  AND NOT KaryStatus='93' order by KaryNoUrut,KaryNoSub,KaryNama asc");
                while($fin_vkry01_sww = $ms_fas($fin_vkry01_sw)){
                $fin_vgj01_sw = $ms_q("$call_sel TGaji WHERE GajiBulan='$IDGJ01' AND KaryNomor='$fin_vkry01_sww[KaryNomor]'");
                    $fin_vgj01_sww = $ms_fas($fin_vgj01_sw);
    ?>
    <tr>
        <td><?PHP echo $gaji_no_01; ?></td>
        <td><?PHP echo $fin_vkry01_sww['KaryNomorYakkum']; ?></td>
        <td><?PHP echo  $fin_vkry01_sww['KaryNama']; ?></td>
        <td><?PHP echo @$nf($fin_vgj01_sww['GajiKotor']); ?></td>
        <td><?PHP echo @$nf($fin_vgj01_sww['GajiBersih']); ?></td>
      
    </tr>
    <?PHP $gaji_no_01++; } ?>
    <tr>    
        <?PHP 
                #VIEW GAJI BERSIH
                  $fin_cn01_vgj01_sw = $ms_q("$sl SUM(GajiBersih) as tot_bersih  FROM TGaji WHERE GajiBulan='$IDGJ01'");
                    $fin_cn01_vgj01_sww = $ms_fas($fin_cn01_vgj01_sw);
                #VIEW GAJI KOTOR
                $fin_cn02_vgj01_sw = $ms_q("$sl SUM(GajiKotor) as tot_kotor  FROM TGaji WHERE GajiBulan='$IDGJ01'");
                $fin_cn02_vgj01_sww = $ms_fas($fin_cn02_vgj01_sw);
                ?>
        <td></td>
        <td></td>
        <td></td>
        <td><?PHP echo @$nf($fin_cn02_vgj01_sww['tot_kotor']); ?></td>
        <td><?PHP echo @$nf($fin_cn01_vgj01_sww['tot_bersih']); ?> </td>
    </tr>
    </table>
</form>


<?PHP } ?>