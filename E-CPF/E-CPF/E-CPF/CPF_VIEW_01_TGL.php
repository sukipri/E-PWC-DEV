<?php
		
		 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
 			include'../LOGIC/PG/PG_H_LOCATION.php';
       }else{

			if($vus01_sww['akses']==6 OR $vus01_sww['akses']==61 ){ 
		
?>

	<body>
    <form method="post">
    <table width="100%" class="table table-bordered table-sm" style="max-width:40rem;" border="0">
          <tr>
            <td>
            <h2>DAFTAR CPF</h2>
				<b>*TANGGAL</b>

            </td>
          </tr>
          <tr class="table-info">
            <td>
            
            <!-- -->
            <div class="input-group input-group-sm mb-3">
              <input type="date" class="form-control form-control-sm" name="cpf_tgl_01" required aria-label="Username">
               <input type="date" class="form-control form-control-sm" name="cpf_tgl_02" required aria-label="Server">
              <select name="cpf_jenis_01" class="form-control form-control-sm" required>
              <?PHP 
              $cpf_vw_no = 1;
                  echo"<option value=>Diagnosis</option>";
                  $cpf_vjns01_sw = $CL_Q("$SL DISTINCT form_jenis_01 FROM tb_cpf_form_01 order by form_Jenis_01 asc ");
                    while($cpf_vjns01_sww = $CL_FAS($cpf_vjns01_sw)){
                      echo"<option value=$cpf_vjns01_sww[form_jenis_01]>$cpf_vjns01_sww[form_jenis_01]</option>";
                    }
              ?>
            </select>
              <button name="cari_tgl" class="btn btn-success btn-sm">CARI DATA</button>
             
		</div>
            <!-- -->
            </td>
          </tr>
	</table>
    <!-- -->
    	<?PHP 
			if(isset($_POST['cari_tgl'])){
				$cpf_tgl_01 = @$SQL_SL($_POST['cpf_tgl_01']);
				$cpf_tgl_02 = @$SQL_SL($_POST['cpf_tgl_02']);
        $cpf_jenis_01 = @$SQL_SL($_POST['cpf_jenis_01']);
		 ?>
    <table width="100%" border="0" class="table table-bordered table-sm table-striped">
          <tr>
            <td>#</td>
            <td width="15%">BATCH ID</td>
            <td width="21%">No Admisi</td>
            <td width="22%">Nomor RM</td>
            <td width="25%">Form Jenis</td>
            <td width="17%">DATE</td>
          </tr>
          <?PHP
		  		$cpf_vcform01_sw = $CL_Q("$SL TOP 500 idmain_cpf_form_01,InapNoAdmisi,PasienNomorRM,form_kode_01,form_jenis_01,form_nama_01,form_tglinput_01 FROM tb_cpf_form_01 WHERE  form_uploader='$vus01_sww[idmain]' AND form_tglinput_01 BETWEEN '$cpf_tgl_01' AND '$cpf_tgl_02' AND form_jenis_01='$cpf_jenis_01' order by form_tglinput_01 desc  ");
		   			while($cpf_vcform01_sww = $CL_FAS($cpf_vcform01_sw)){
						//--DATA PAsien--//
						$cpf_vpsn01_sw = $CL_Q("$SL PasienNomorRM,PasienNama,PasienGender,PasienTglLahir FROM TPasien WHERE PasienNomorRM='$cpf_vcform01_sww[PasienNomorRM]'");
								$cpf_vpsn01_sww = $CL_FAS($cpf_vpsn01_sw);
		   
		   ?>
          <tr>
            <td><?PHP echo $cpf_vw_no; ?>
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
          <?PHP $cpf_vw_no++; } ?>
</table>
	</form>
    <?PHP } ?>
    </body>    
    <?PHP }} ?>