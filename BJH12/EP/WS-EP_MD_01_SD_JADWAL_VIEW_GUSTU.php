<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			error_reporting(0);
			?>
			<body>
            <!-- -->
            <?php 
					//$APIkey="17dd3619561411ce1bf65fe7a91ca7fba9fa9f2e3f8b7419eddda096d9024fcc";
						function curl($url){
						$ch = curl_init(); 
						curl_setopt($ch,CURLOPT_HTTPHEADER,array(
						"Content-Type: Application/JSON",          
						"Accept: Application/JSON"
					));
						curl_setopt($ch, CURLOPT_URL, $url); 
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
						curl_setopt($ch, CURLOPT_TIMEOUT, 60);  
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLPROTO_HTTPS , true);
						curl_setopt($ch, CURLINFO_HEADER_OUT, true);
						$output = curl_exec($ch); 
						curl_close($ch);      
						return $output;
					}
					
					$send = curl("http://182.253.60.178/E-PWC/BJH12/EP_API/API_EP_HR_Dept_01.php");
					
					// mengubah JSON menjadi array
					@$data_dept = json_decode($send, TRUE);
					
						//print_r($data);

?>
            <!-- -->
            <?PHP include"WS-EP_MD_01_SD_JADWAL_MENU.php"; ?>
            <b>#DAFTAR DEPARTEMENT</b>
            <table width="100%" border="0">
              <tr valign="top">
                <td width="23%">
                <!-- -->
                <div class="list-group">
                 <div style="overflow:auto;width:auto;height:20rem;padding:2px;border:1px solid #eee">
                <?PHP foreach($data_dept['data_dept']as $baris_dept){ ?>
                      <a href="<?PHP echo"?HLM=EP_HOME_01&SUB=EP_MD_01&SUB_CHILD=EP_MD_01_SD&SUB_CHILD02=WS-EP_MD_01_SD_JADWAL_VIEW_GUSTU&IDDEPT01=".$baris_dept['id_gustu']; ?>" class="list-group-item list-group-item-action"><?PHP echo $baris_dept['gustu']; ?></a>
                    <?PHP } ?>
                     
       			 </div>
                 </div>
                <!-- -->
                </td>
                <td width="77%">
                <!-- -->
                 <?php 
				  ##-GET DATA--##
				    $IDDEPT01 = @$_GET['IDDEPT01'];
				 
					//$APIkey="17dd3619561411ce1bf65fe7a91ca7fba9fa9f2e3f8b7419eddda096d9024fcc";
						function curl01($url01){
						$ch01 = curl_init(); 
						curl_setopt($ch01,CURLOPT_HTTPHEADER,array(
						"Content-Type: Application/JSON",          
						"Accept: Application/JSON"
					));
						curl_setopt($ch01, CURLOPT_URL, $url01); 
						curl_setopt($ch01, CURLOPT_RETURNTRANSFER, 1); 
						curl_setopt($ch01, CURLOPT_CUSTOMREQUEST,"GET");
						curl_setopt($ch01, CURLOPT_TIMEOUT, 60);  
						curl_setopt($ch01, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch01, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch01, CURLPROTO_HTTPS , true);
						curl_setopt($ch01, CURLINFO_HEADER_OUT, true);
						$output01 = curl_exec($ch01); 
						curl_close($ch01);      
						return $output01;
					}
					
					$send01 = curl01("http://182.253.60.178/E-PWC/BJH12/EP_API/API_EP_TJADWAL_02.php?IDDEPT01=$IDDEPT01");
					
					// mengubah JSON menjadi array
					@$data_kry = json_decode($send01, TRUE);
					
						//print_r($data);

?> <div style="overflow:auto;width:auto;height:60rem;padding:2px;border:1px solid #eee">
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
                                    <td><?PHP echo $baris_jdw['bulan'] ; ?></td>
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
	
            </body>
            
          <?PHP } ?>