<?php
		@ob_start();
		 @session_start();
			//..INCLUDER//
			include"../DIST/DIST_GET.php";
			//include"../QR/qrlib.php";
			//.....///
		//..Sesiion open../
		 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
 			include'../LOGIC/PG/PG_H_LOCATION.php';
       }else{
	//..Access Method.//
 	  $vus01_sw = $CL_Q("$CL_SL TBUser where namauser='$_SESSION[namauser]' AND akses='4'");
        $vus01_sww = $CL_FAS($vus01_sw);
			if($vus01_sww['akses']==4){ 
				#DATA KARYAWAN dbo.Ctarum
					$epwc_vkry01_sw = $CL_Q("$SL KaryNomor,KaryNomorYakkum,KaryNama,KaryJbtStruktural,UnitKode,KaryDir,UnitKode01,UnitKode02 FROM Citarum.dbo.TKaryawan WHERE KaryNomor='$vus01_sww[kode]'");
						$epwc_vkry01_sww = $CL_FAS($epwc_vkry01_sw);
						
					#echo $epwc_vkry01_sww['KaryDir'];
						#--GET DATA--#
						$epwc_cut_vkry01_sw = substr($epwc_vkry01_sww['KaryNomorYakkum'],1);
						 $IDEMP01 = $epwc_cut_vkry01_sw;
							#DATA KARAYWAN dbo.TJ_MAIN_DATA
							$open_tj_vkry01_sw = $CL_Q("$SL ID,Dept_ID,Dept_Name,Per_Name,Per_Code,ep_ip_01 FROM TJ_Main_Data.dbo.HR_Personnel WHERE Per_Code='$IDEMP01' ");
								$open_tj_vkry01_sww = $CL_FAS($open_tj_vkry01_sw);
						
				#----------DATA VIEW----------#
				#DATA KARYAWAN
				$epwc_vw_vkry01_sw = $CL_Q("$CL_SL  Citarum.dbo.TKaryawan WHERE KaryNomor='$IDKRY'");
						$epwc_vw_vkry01_sww = $CL_FAS($epwc_vw_vkry01_sw);
				#--------------------#
				#DATA LEMBUR 
				#SELECT CONVERT(varchar, '2017-08-25', 102);
				$epwc_vw_vlmbr01_sw = $CL_Q("$CL_SL Citarum.dbo.TKaryLemburHari WHERE LemburID='$IDLBR01'");
				$epwc_vw_vlmbr01_sww  = $CL_FAS($epwc_vw_vlmbr01_sw);
				$epwc_vw02_vlmbr01_sw = $CL_Q("$SL CONVERT(date ,LemburTanggal) as ltgl FROM  Citarum.dbo.TKaryLemburHari WHERE LemburID='$IDLBR01'");
				$epwc_vw02_vlmbr01_sww  = $CL_FAS($epwc_vw02_vlmbr01_sw); #LEMBUR TANGGAL
				#--------------------#
				#DATA TEMPLATE LEMBUR
				$epwc_vw_vlemtmp01_sw = $CL_Q("$CL_SL  Citarum.dbo.tb_lembur_01_lemtmp WHERE idmain_lemtmp_01='$IDLEMTMP01'");
					$epwc_vw_vlemtmp01_sww = $CL_FAS($epwc_vw_vlemtmp01_sw);

				#DATA QUOTE
				$epwc_ls_vkuote01_sw = $CL_Q("$CL_SL Citarum.dbo.tb_kuote_01 order by NEWID()");
				$epwc_ls_vkuote01_sww = $CL_FAS($epwc_ls_vkuote01_sw);

			
		
?>
<style>
	body{ }
	.side-navbar {
	  width: 180px;
	  height: 100%;
	  position: fixed;
	  margin-left: -300px;
	  background-color: #100901;
	  transition: 0.5s;
	}
	
	.nav-link:active,
	.nav-link:focus,
	.nav-link:hover {
	  background-color: #ffffff26;
	}
	
	.my-container {
	  transition: 0.4s;
	}
	
	.active-nav {
	  margin-left: 0;
	}
	
	/* for main section */
	.active-cont {
	  margin-left: 180px;
	}
	
	#menu-btn {
	  background-color: #100901;
	  color: #fff;
	  margin-left: -62px;
	}

</style>
<body>
 			<!-- -->
            	<?PHP 
					#--REndering NAVIGAS--#
						switch(@$SQL_SL($_GET['NAVI'])){
							default:
							include_once"EPWC_MENU_01.php";
							break;
							case'EPWC_MENU_01_PROFIL':
								include"EPWC_MENU_01_PROFIL.php";
							break;
							case'EPWC_MENU_01_EP':
								include"EPWC_MENU_01_EP.php";
							break;
							case'EPWC_MENU_IPF_01':
								include"EPWC_MENU_IPF_01.php";
							break;
							case'EPWC_OTFARM_01':
								include"EPWC_OTFARM_01.php";
							break;
							case'EPWC_ELEMBUR_01':
								include"EPWC_ELEMBUR_01.php";
							break;

						}
				
				 ?>
            
            <!-- -->    

<div class="p-0 my-container active-cont">
	<!-- <center><img src="http://daftar.pantiwilasa-citarum.co.id/images/kop.jpg" class="img-fluid"></center> -->
	
	<center>
	<figure>
  <blockquote class="blockquote">
    <p><i class='fas fa-quote-left'></i> <?PHP echo $epwc_ls_vkuote01_sww['kuote_isi_01'] ?> <i class='fas fa-quote-left'></i></p>
  </blockquote>
  <figcaption class="blockquote-footer">
    Someone famous in <cite title="Source Title">LULABY</cite>
  </figcaption>
</figure>
					</center>

<nav class="navbar top-navbar navbar-light bg-light px-5 mx-3">
        <a class="btn btn-lg border-0" id="menu-btn"><i class="fas fa-angle-double-left"></i></a>
      </nav>
     	<?PHP include"../LOGIC/PG/PG_SA.php"; ?>
</div>

    <!-- bootstrap js -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
      crossorigin="anonymous"></script>
    <!-- custom js -->
    <script>
      var menu_btn = document.querySelector("#menu-btn");
      var sidebar = document.querySelector("#sidebar");
      var container = document.querySelector(".my-container");
	  menu_btn.addEventListener("click", () => {
        sidebar.classList.toggle("active-nav");
        container.classList.toggle("active-cont");
      });
    </script>
   
</body>
<?php
		//..Session Close..//
		}else{
		  include'../LOGIC/PG/PG_H_LOCATION.php';
		} }
		ob_flush();
	
	?>