<?php 
@ob_start();
@session_start();
error_reporting(0);
   //..INCLUDER//
	#GET_DATA
	include"../CONFIG/MSSQL/MS_CONNECT_02.php";
	include"../DIST/CODE/CODE_01.php";
	include"../DIST/CODE/CODE_02_DDL.php";
	include"../DIST/CFG/CFG_02.php";
	$IDEMP02 = @$SQL_SL($_GET['IDEMP02']);
	$IDEMP01 = @$SQL_SL($_GET['IDEMP01']);

		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../LOGIC/PG/PG_H_LOCATION.php";
	} else {
				#DATA_KRY
				$ep_dept01_sw = $CL_Q("$CL_SL HR_Personnel WHERE Per_Code='$IDEMP02'");
                    $ep_dept01_sww = $CL_FAS($ep_dept01_sw);
?>
<!-- -->
<h4><a href="http://182.253.60.178/E-PWC/DFMBL_V3/DFMBL/EPWC_HOME_01.php?NAVI=EPWC_MENU_01_EP&PG_SA=WS-EPWC_EP_APP_JDW_IN" class="btn  btn-warning btn-sm mx-2"><i class="fas fa-angle-double-left"></i>BACK</a>Entri Bulan</h4>

<form method="post">
<div style="max-width:20rem;" class="mx-2">
<div class="input-group input-group-sm mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1">Bulan</span>
		</div>
        <select name="ep_bulan_01_mnl" class="form-control form-control-sm" required>
        <option value=""></option>
        <?PHP 
            $ep_bulan_no = 1;
            
                while($ep_bulan_no <= 12){
                    $ep_bulan_no_zero = sprintf("%02d",$ep_bulan_no);
                    echo"<option value=$DATE_Y$ep_bulan_no_zero>$DATE_Y$ep_bulan_no_zero</option>";
                $ep_bulan_no++; }
        ?>
        </select>
                </div>
        <button name="ep_simpan_bulan01_mnl" class="btn btn-success btn-sm"><i class="fas fa-cloud-upload-alt"></i>Unggah data</button>

        <ol>
            <li>Masukan Bulan Baru Untuk <i>Peng-identitasan jadwal</i> pada kolom form bulan</li>
            <li>Klil link daftar bulan yang ada pada list jadwal yang tertera</li>
        </ol>

</form>
                <?PHP include"../LOGIC/PRC/EXE_MIX_MNL.php" ?>
<hr>
   <b>#JADWAL MASUK</b>
            <table width="100%" border="0">
              <tr valign="top">
                <td width="23%">-</td>
                <td width="77%">
                <!-- -->
                 <?php 
				  ##-GET DATA--##
				    
				 
					//$APIkey="17dd3619561411ce1bf65fe7a91ca7fba9fa9f2e3f8b7419eddda096d9024fcc";
						function curl01($urlsf){
						$chsf01 = curl_init(); 
						curl_setopt($chsf01,CURLOPT_HTTPHEADER,array(
						"Content-Type: Application/JSON",          
						"Accept: Application/JSON"
					));
						curl_setopt($chsf01, CURLOPT_URL, $urlsf); 
						curl_setopt($chsf01, CURLOPT_RETURNTRANSFER, 1); 
						curl_setopt($chsf01, CURLOPT_CUSTOMREQUEST,"GET");
						curl_setopt($chsf01, CURLOPT_TIMEOUT, 60);  
						curl_setopt($chsf01, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($chsf01, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($chsf01, CURLPROTO_HTTPS , true);
						curl_setopt($chsf01, CURLINFO_HEADER_OUT, true);
						$outputsf = curl_exec($chsf01); 
						curl_close($chsf01);      
						return $outputsf;
					}
					
					$send01 = curl01("http://182.253.60.178/E-PWC/BJH12/EP_API/API_EP_TJADWAL_03.php?IDEMP01=$IDEMP01");
					
					// mengubah JSON menjadi array
					@$data_kry = json_decode($send01, TRUE);
					
						//print_r($data);

?> 


				 <?PHP foreach($data_kry['data_kry'] as $baris_kry){ ?>
				<div class="card border-primary mb-3" style="max-width: 80rem;">
                  <div class="card-header"><?PHP echo $baris_kry['nama_kry']; ?></div>
                      <!-- -->
                      
                     <table width="100%" border="0" class="table table-bordered table-sm table-striped">
                      <tr class="table-primary">
                                    <td>Bulan</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>7</td>
                                    <td>8</td>
                                    <td>9</td>
                                    <td>10</td>
                                    <td>11</td>
                                    <td>12</td>
                                    <td>13</td>
                                    <td>14</td>
                                    <td>15</td>
                                    <td>16</td>
                                    <td>17</td>
                                    <td>18</td>
                                    <td>19</td>
                                    <td>20</td>
                                    <td>21</td>
                                    <td>22</td>
                                    <td>23</td>
                                    <td>24</td>
                                    <td>25</td>
                                    <td>26</td>
                                    <td>27</td>
                                    <td>28</td>
                                    <td>29</td>
                                    <td>30</td>
                                    <td>31</td>
                            </tr>
                      <?PHP foreach($baris_kry['data_jdw'] as $baris_jdw){ ?>
                                  <tr>
                                    <td><a href="<?PHP echo"WS-EPWC_EP_APP_JDW_IN03_MNL.php?&IDEMP02=$IDEMP02&IDEMP01=$IDEMP01&IDBLN01=$baris_jdw[bulan]"; ?>"><?PHP echo $baris_jdw['bulan'] ; ?></a></td>
                                    <td><?PHP echo $baris_jdw['t01'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t02'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t03'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t04'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t05'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t06'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t07'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t08'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t09'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t10'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t11'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t12'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t13'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t14'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t15'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t16'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t17'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t18'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t19'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t20'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t21'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t22'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t23'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t24'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t25'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t26'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t27'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t28'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t29'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t30'] ; ?></td>
                                    <td><?PHP echo $baris_jdw['t31'] ; ?></td>
                            </tr>
                                <?PHP } ?>  
                                   
					</table>
		
                      <!-- -->
                    
				</div>
                    <?PHP } ?>
                <!-- -->
                	</div>
                </td>
              </tr>
		</table>

<?PHP } ob_end_flush(); ?>