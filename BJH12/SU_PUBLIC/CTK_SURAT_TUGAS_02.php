<?php
		//error_reporting(0);
		ob_start();
		session_start();
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	 	   include'../logic/H_LOCATION.php';
			} else {
		include"css.php";
		include"../CONFIG_INTERNAL.php";
		//User assigment
		$u = $ms_q("select * from TBUser where namauser='$_SESSION[namauser]'");
		$uu = $ms_fas($u);
			if($uu['akses']==5){
			 
		$IDKOP = @$sql_slash($_GET['IDKOP']);
				  $vkp = $ms_q("$call_sel tb_kop WHERE idmain_kop='$IDKOP'");
                        $vkpp = $ms_fas($vkp);
					 $vkpd = $ms_q("$call_sel tb_kop_detail WHERE idmain_kop='$IDKOP'");
                        $vkppd = $ms_fas($vkpd);
					

			?>
            <style>
			.garis_hori{
				border: 0.8px black solid;
				height: 0px;
				width: 225px;
			}
			.garis_hori_dr{
				border: 0.8px black solid;
				height: 0px;
				width: 240px;
			}
			.under { text-decoration: underline; }
			.over  { text-decoration: overline; width:20px; }
			
			.fnt{font-size:1.3rem;}
			.fnt_02{font-size:2rem;}
			.fnt_hd{font-size:1.6rem; text-align:center; padding-right:17rem; font-weight:bold;}
			</style>
<body onLoad="window.print();">
	<div style="padding-top:12rem;"></div>
		<div class="container">
        			<center><font class="fnt_02">SURAT TUGAS</font><div class="garis_hori"></div><font class="fnt"><?php echo"No.$vkpp[kop]"; ?></font></center>
                    <br><br><br>
		<div class="fnt">
        		Sehubungan dengan adanya surat dari <?php echo"$vkppd[pengirim]"; ?> dalam rangka <?php echo"$vkppd[kegiatan]"; ?> <b>"<?php echo $vkppd['acara']; ?>"</b>, yang akan dilaksanakan pada :
                <br><br>
             
          <table width="86%" border="0" align="center" class="fnt">
                  <tr>
                    <td width="17%">Hari/Tanggal</td>
                    <td width="1%">:</td>
                    <td width="82%"><?php echo"$vkppd[hari_tgl_tugas]"; ?> </td>
                  </tr>
                  <tr>
                    <td>Jam</td>
                    <td>:</td>
                    <td><?php echo"$vkppd[jam]"; ?></td>
                  </tr>
                  <tr>
                    <td>Tempat</td>
                    <td>:</td>
                    <td><?php echo"$vkppd[tempat]"; ?></td>
                  </tr>
                  
                  <tr>
                    <td colspan="3" align="right">                </td>
            </tr>
                </table>
          <table width="100%" border="0" class="fnt">
            <tr>
              <td height="55" colspan="2">maka dengan ini kami menugaskan kepada :</td>
            </tr>
            <tr>
              <td height="71" colspan="2"> 
              
              <ol style="padding-left:25rem;">
             <?php
				$vkrp = $ms_q("$call_sel tb_kary_part WHERE idmain_kop='$IDKOP' order by urut asc");
					while($vkrrp = $ms_fas($vkrp)){
						$vem_02 = $ms_q("$sl KaryNomor,KaryNama,UnitKode,KaryJbtStruktural,KaryStatus FROM  TKaryawan WHERE KaryNomor='$vkrrp[idmain_kary]'");
									$vemm_02 = $ms_fas($vem_02);
					 ?>
					
					<?php echo"<li>$vemm_02[KaryNama]</li>"; ?>
			<?php } ?>   </ol></td>
            </tr>
            <tr>
              <td height="61" colspan="2">  <p>untuk mengikuti acara tersebut di atas.<br>
                    Demikian surat tugas ini dibuat untuk dilaksanakan dengan sebaik-baiknya.</p><br>     </td>
            </tr>
            <tr>
              <td width="61%" align="right">              </td>
              <td width="39%" align="center">        
            Dikeluarkan di : Semarang<br>
            Pada tanggal : <?php echo"$text_date"; ?>
            <br>RS Panti Wilasa Citarum
            <br><br><br><br>
            <br>
            
         		dr.Yohanes Mada S,Sp.PD , FINASIM<div class="garis_hori_dr"></div>
             	Direktur    
                 
              </td>
            </tr>
            <tr>
              <td colspan="2">
                Tembusan: <br>
            <ol>
			  <?php
			  
				$vkrt = $ms_q("$call_sel tb_kary_tembusan WHERE idmain_kop='$IDKOP' order by urut asc");
					while($vkrrt = $ms_fas($vkrt)){
					
					 ?>
					
					<li><?php echo"$vkrrt[nama]"; ?></li>
			<?php } ?> 
            </ol>  
              </td>
            </tr>
          </table>
		</div>
        
   </div>
</body>
<?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
	?>
