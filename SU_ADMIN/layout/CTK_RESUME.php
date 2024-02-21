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
		$IDDKT = @$_GET['IDDKT'];
			$RM = @$_GET['RM'];
			$REG = @$_GET['REG'];
			$vrj_01 =  $ms_q("$call_sel TRawatJalan  where JalanNoReg='$REG'");
			$vrjj_01 = $ms_fas($vrj_01);
			$vps =  $ms_q("$call_sel TPasien  where PasienNomorRM='$RM'");
			$vpss = $ms_fas($vps);
				$vrj_con= $ms_q("select CONVERT(varchar(10),[JalanRMTanggal],103) as tgl_rj from TRawatJalan where JalanNoReg='$REG'");
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
			
	?>
		<style>
			
			.pad{
				padding-top: 4.3rem;
				
			}
			.pad2{
				padding-top: 4.3rem;
				
			}
			.pad_bt{padding-bottom: 0.65rem;
		</style>
		<body onload="window.print();">
		<div class="pad">
		<?php 
			echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp $vrjj_01[PasienNama]";
				echo"<div class=pad_bt></div>";
			echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp $sub_A1 &nbsp&nbsp&nbsp $sub_A2 &nbsp&nbsp&nbsp $sub_A3";
		echo"<div class=pad_bt></div>";
			echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp $RM";
			echo"<div class=pad_bt></div>";
			echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp $sub_TG1 &nbsp&nbsp&nbsp $sub_TG2 &nbsp&nbsp&nbsp $sub_TG3 ";
		echo"<div class=pad_bt></div>";
		?>
		</div>
			<div class="pad2">
		<?php 
			
		
		?>
		</div>
	</body>
</html>