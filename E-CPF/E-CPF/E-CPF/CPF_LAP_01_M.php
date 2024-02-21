<?php
		
		 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
 			include'../LOGIC/PG/PG_H_LOCATION.php';
       }else{

			if($vus01_sww['akses']==6 OR $vus01_sww['akses']==61 ){ 
		
?>
	<body>
     <table width="100%" class="table table-bordered table-sm" style="max-width:40rem;" border="0">
          <tr>
            <td>
            <h2>LAPORAN CPF</h2>
				<b>*REPORT SYSTEMS</b>

            </td>
          </tr>
          <tr class="table-info">
            <td>&nbsp; </td>
          </tr>
	</table>
    <!-- -->
    <table width="100%" border="0" class="table table-sm">
          <tr>
            <td width="25%">
            <!--- -->
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center">
              <a href="?PG_SA=CPF_MNG_01_M&PG_SA_SUB=CPF_LAP_01_M&PG_SA_SUB_02=CPF_LAP_01_M_ALL"><i class="fas fa-file"></i>&nbsp;Laporan *Total</a>
              
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                 <a href="?PG_SA=CPF_MNG_01_M&PG_SA_SUB=CPF_LAP_01_M&PG_SA_SUB_02=CPF_LAP_01_M_TGL"><i class="fas fa-file"></i>&nbsp;Laporan *TGL</a>
               
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="?PG_SA=CPF_MNG_01_M&PG_SA_SUB=CPF_LAP_01_M&PG_SA_SUB_02=CPF_LAP_01_M_PNYT"><i class="fas fa-file"></i>&nbsp;Laporan *Penyakit</a>
               
              </li>
		</ul>
    
            
            <!-- -->
            
            </td>
            <td width="75%">
					<?PHP include"../LOGIC/PG/PG_SA_SUB_02.php"; ?>
            </td>
          </tr>
	</table>

    
    </body>
    
      <?PHP }} ?>

