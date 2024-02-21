<?php
		@ob_start();
			//..INCLUDER//
			include"../DIST/DIST_GET.php";
		
?>

<?PHP include"EPWC_LAP_MENU.php"; ?>
<div style="padding-top:2%"></div>
<div class="container">    

<!--  -->
		<?PHP 
			switch(@$SQL_SL($_GET['PG_SA'])){
				default:
				include"EPWC_LAP_RJ_01VIEW.php";
				break;
				case'EPWC_LAP_OBAT_01VIEW':
					include"EPWC_LAP_OBAT_01VIEW.php";
				break;
				case'EPWC_LAP_RI_01VIEW':
					include"EPWC_LAP_RI_01VIEW.php";
				break;
				case'EPWC_LAP_LAB_01VIEW':
					include"EPWC_LAP_LAB_01VIEW.php";
				break;
				case'EPWC_LAP_RAD_01VIEW':
					include"EPWC_LAP_RAD_01VIEW.php";
				break;
				case'EPWC_LAP_FIN_01VIEW':
					include"EPWC_LAP_FIN_01VIEW.php";
				break;
				case'EPWC_LAP_LEMBUR_01VIEW':
					include"EPWC_LAP_LEMBUR_01VIEW.php";
				break;
				case'EPWC_LAP_TT_01VIEW':
					include"EPWC_LAP_TT_01VIEW.php";
				break;
				case'EPWC_LAP_PEMLOG_01VIEW':
					include"EPWC_LAP_PEMLOG_01VIEW.php";
				break;
			}

		?>
<!--  -->
</div>
<div class="mx-3" style="padding-top:10%"><?PHP echo"&copyLULABY $DATE_Y Allright Reserved"; ?></div>