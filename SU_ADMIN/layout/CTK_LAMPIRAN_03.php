<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<?php
		error_reporting(0);
				include_once"../config/connec_01_srv.php";
				include"../secure/GR_01.php"; //security enggine
				 include"../sc/ID_IDF.php";  //Identifer ID PAGE
       			 include"../sc/stack_Q.php"; //Query SQL
				  include"../sc/code_rand.php"; 
		include"css.php"; 
	?>
	<body onload="window.print();">
	<style>
		.txt{font-size:12px; padding:0.5em;}
	</style>
	<?php 
			$IDDKT = @$_GET['IDDKT'];
			$RM = @$_GET['RM'];
			$REG = @$_GET['REG'];
			$IDG = @$_GET['IDG'];
			?>
<body>
		<br>
		<div class="container">
		<ol class="breadcrumb">
  		<li class="breadcrumb-item"><i class="fa fa-print"></i>&nbsp;Cetak Lampiran pendaftaran</li>
		</ol>
		
		
	<?php 
				
			$vdkt =  $ms_q("$call_sel TPelaku where PelakuKode='$IDDKT'");
			$vdktt = $ms_fas($vdkt);
			$vpl = $ms_q("$call_sel TUnit where UnitKode='$vdktt[UnitKode]'");
			$vpll = $ms_fas($vpl);
			$vrj_01 =  $ms_q("$call_sel TRawatJalan  where JalanNoReg='$REG'");
			$vrjj_01 = $ms_fas($vrj_01);
			$vps =  $ms_q("$call_sel TPasien  where PasienNomorRM='$RM'");
			$vpss = $ms_fas($vps);
			$vrj = @$ms_q("select TNomor.NomorKode,TNomor.NomorAkhir from TNomor where TNomor.NomorKode='PL-$years$month-'");
				$vrjj = $ms_fas($vrj);
				$vrj_con= $ms_q("select CONVERT(varchar(10),[JalanRMTanggal],103) as tgl_rj from TRawatJalan where JalanNoReg='$REG'");
				$vrjj_con = $ms_fas($vrj_con);
					$hit_vrj = $vrjj['NomorAkhir'] + 1;
					$hit_zero = sprintf("%04d", $hit_vrj);
					$sub_01= substr($vpss['PasienTglLahir'],-4);
					$hit_sub = $years_big - $sub_01;
					$dt = "$date_html5 $time_html5";
				if(isset($_GET['LENGKAP'])){
					$ms_q("update TRawatJalan set AppJenisDaftar='3' where JalanNoReg='$REG'");
						header("location:DAFTAR_STEP_04.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&OKEEE=OKEEE#LENGKAP");
			}
				?>

				
				
				
				

	  <table width="100%" border="0" class="table table-bordered">
          <td width="100%" height="37"><?php
						$vgbr_02 =  $ms_q("$sl gambar from TBGambar where JalanNoReg='$REG' AND Gambar='$IDG'");
							while($vgbrr_02 = $ms_fas($vgbr_02)){
				?>
					
						<img src="<?php echo"../../FL/$vgbrr_02[gambar]"; ?>" alt=" " class="img-responsive" />
					
					<?php } ?>
              </td>
          </tr>
      </table>
	
	
	<hr>
		<?php echo"Cetak pada tanggal <i>$date_html5</i>"; ?>
		</div>
</body>
</html>
