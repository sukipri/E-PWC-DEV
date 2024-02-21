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
            <h2>DAFTAR CPF</h2>
				<b>*All</b>

            </td>
          </tr>
          <tr class="table-info">
            <td>&nbsp; </td>
          </tr>
	</table>
    <!-- -->
    <table width="100%" border="0" class="table table-bordered table-sm table-striped">
          <tr>
            <td width="15%">BATCH ID</td>
            <td width="21%">No Admisi</td>
            <td width="22%">Nomor RM</td>
            <td width="25%">Form Jenis</td>
            <td width="17%">DATE</td>
          </tr>
          <?PHP
		  		$cpf_vcform01_sw = $CL_Q("$SL TOP 500 idmain_cpf_form_01,InapNoAdmisi,PasienNomorRM,form_kode_01,form_jenis_01,form_nama_01,form_tglinput_01 FROM tb_cpf_form_01 WHERE form_uploader='$vus01_sww[idmain]' order by form_tglinput_01 desc  ");
		   			while($cpf_vcform01_sww = $CL_FAS($cpf_vcform01_sw)){
						//--DATA PAsien--//
						$cpf_vpsn01_sw = $CL_Q("$SL PasienNomorRM,PasienNama,PasienGender,PasienTglLahir FROM TPasien WHERE PasienNomorRM='$cpf_vcform01_sww[PasienNomorRM]'");
								$cpf_vpsn01_sww = $CL_FAS($cpf_vpsn01_sw);
		   
		   ?>
          <tr>
            <td>
            		<a href="<?PHP echo"?PG_SA=CPF_UPDATE_02_HMD&IDCFORM01=$cpf_vcform01_sww[idmain_cpf_form_01]"; ?>" class="btn-success"><?PHP echo"$cpf_vcform01_sww[form_kode_01]"; ?></a>
            
            		<?PHP
						/*
					 if($cpf_vcform01_sww['form_jenis_01']=="HMD"){ ?>
            			<a href="<?PHP echo"?PG_SA=CPF_UPDATE_02_HMD&IDCFORM01=$cpf_vcform01_sww[idmain_cpf_form_01]"; ?>" class="btn-success"><?PHP echo"$cpf_vcform01_sww[form_kode_01]"; ?></a>
                    <?PHP }elseif($cpf_vcform01_sww['form_jenis_01']=="HRN"){ ?>
                    <a href="<?PHP echo"?PG_SA=CPF_UPDATE_02_HRN&IDCFORM01=$cpf_vcform01_sww[idmain_cpf_form_01]"; ?>" class="btn-warning"><?PHP echo"$cpf_vcform01_sww[form_kode_01]"; ?></a>
                    <?PHP }*/ ?>
            </td>
            <td><?PHP echo"$cpf_vcform01_sww[InapNoAdmisi]"; ?></td>
            <td><?PHP echo"$cpf_vcform01_sww[PasienNomorRM]"; ?>
            	<br>
                <?PHP echo"$cpf_vpsn01_sww[PasienNama]"; ?>
            </td>
            <td><?PHP echo"<b>$cpf_vcform01_sww[form_jenis_01]</b>"; ?>
            	<br>
            	<?PHP echo"$cpf_vcform01_sww[form_nama_01]"; ?>	
            </td>
            <td><?PHP echo"$cpf_vcform01_sww[form_tglinput_01]"; ?></td>
          </tr>
          <?PHP } ?>
</table>

    
    
    
    </body>
    
    <?PHP }} ?>