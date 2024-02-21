<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<?php
		error_reporting(0);
				include_once"../config/connec_01_srv.php";
				include"../secure/GR_01.php"; //security enggine
				 include"../sc/ID_IDF.php";  //Identifer ID PAGE
       			 include"../sc/stack_Q.php"; //Query SQL
				  include"../sc/code_rand.php"; 
		//include"css.php"; 
		$IDDKT = @trim(htmlentities($_GET['IDDKT']));
			$RM = @$_GET['RM'];
			$REG = @$_GET['REG'];
			$vrj_01 =  $ms_q("$call_sel TRawatJalan  where JalanNoReg='$REG'");
			$vrjj_01 = $ms_fas($vrj_01);
			$vps =  $ms_q("$call_sel TPasien  where PasienNomorRM='$RM'");
			$vpss = $ms_fas($vps);
				$vrj_con= $ms_q("select CONVERT(varchar(10),[JalanRMTanggal],105) as tgl_rj from TRawatJalan where JalanNoReg='$REG'");
				$vrjj_con = $ms_fas($vrj_con);
				$A1 = "$vpss[PasienTglLahir]";
				$sub_A1 = substr($A1,0,2);
				$sub_A2 = substr($A1,2,2);
				$sub_A3 = substr($A1,4,4);
				//echo $sub_A1; 18051984
						$TG1 = "$vrjj_con[tgl_rj]";
							$sub_TG1 = substr($TG1,0,2);
							$sub_TG2 = substr($TG1,3,2);
							$sub_TG3 = substr($TG1,6,4);
								//15-10-2018
			$vjdl =  $ms_q("$sl DokterKode,KetHari,KetJam,AtKd,Kuota from JadwalDokter  where AtKd='$vrjj_01[AtKd]'");
				$vjdll = $ms_fas($vjdl);
				$vdkt =  $ms_q("$call_sel TPelaku where PelakuKode='$IDDKT'");
			$vdktt = $ms_fas($vdkt);
				$sub_01= substr($vpss['PasienTglLahir'],-4);
					$hit_sub = $years_big - $sub_01;
	?>
		<style>
		body{ font-size: 14.5px;}
			.pad{
				padding-top: 4.5rem;
				
			}
			.pad2{
				padding-top: 4.3rem;
				
			}
			.pad_bt{padding-bottom: 3rem;}
			.pad_bt2{padding-bottom: 23rem;}
			.pad_rg{letter-spacing: 10px;}
		</style>
		<body onload="window.print();">
		<div class="pad">
			<?php 
				echo"<b>R4</b>";
					echo"<div class=pad_bt></div>";
					if($vrjj_01['WaktuPesan']=="P"){
				echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>Waktu Pagi : $vjdll[KetJam]<br><b>$vdktt[PelakuNama]</b>";
				}elseif($vrjj_01['WaktuPesan']=="S"){
				echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>Waktu Siang : $vjdll[KetJam]<br><b>$vdktt[PelakuNama]</b>";
				}elseif($vrjj_01['WaktuPesan']=="M"){
				echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>Waktu Malam : $vjdll[KetJam]<br><b>$vdktt[PelakuNama]</b>";
				}
			
			?>
		</div>
			<div class="pad_bt2">	</div>
		
        <table width="100%" border="0">
          <tr>
            <td width="14%"><b>Semarang</b></td>
            <td width="86%"><b><?php echo"$vrjj_con[tgl_rj]"; ?></b></td>
          </tr>
          <tr>
            <td width="14%"><b>Nomor</b></td>
            <td width="86%"><b><?php echo"$RM"; ?></b></td>
          </tr>
          <tr>
            <td width="14%"><b>Nama</b></td>
            <td width="86%"><b><?php echo"$vpss[PasienNama]"; ?></b></td>
          </tr>
          <tr>
              <td width="14%"><b>Tgl Lahir</b></td>
            <td width="86%"><b><?php echo"$sub_A1-$sub_A2-$sub_A3"; ?></b></td>
          </tr>
          <tr>
          <td width="14%"><b>Umur</b></td>
            <td width="86%"><b><?php echo"$hit_sub"; ?></b></td>
          </tr>
          <tr>
             <td width="14%"><b>Alamat</b></td>
            <td width="86%"><b><?php echo"$vpss[PasienAlamat]"; ?></b></td>
          </tr>
        </table>	
	    </body>
</html>