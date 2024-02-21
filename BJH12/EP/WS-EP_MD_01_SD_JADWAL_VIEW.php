<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
			<body>
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
					
					$send = curl("http://182.253.60.178/E-PWC/BJH12/EP_API/API_EP_TJADWAL_01.php");
					
					// mengubah JSON menjadi array
					@$data_jadwal = json_decode($send, TRUE);
					
						//print_r($data);

?>

			<!-- -->
            <?PHP include"WS-EP_MD_01_SD_JADWAL_MENU.php"; ?>
                <div style="overflow:auto;width:auto;height:45rem;padding:2px;border:1px solid #eee">
                <table width="100%" border="0" class="table table-bordered table-sm table-striped">
                <tr class="table-info">
                        <td width="1%">#</td>
                        <td width="4%">BULAN</td>
                        <td width="4%">KET</td>
                        <td width="2%">1</td>
                        <td width="2%">2</td>
                        <td width="2%">3</td>
                        <td width="2%">4</td>
                        <td width="2%">5</td>
                        <td width="2%">6</td>
                        <td width="2%">7</td>
                        <td width="2%">8</td>
                        <td width="2%">9</td>
                        <td width="2%">10</td>
                        <td width="2%">11</td>
                        <td width="2%">12</td>
                        <td width="2%">13</td>
                        <td width="2%">14</td>
                        <td width="2%">15</td>
                        <td width="2%">16</td>
                         <td width="2%">17</td>
                        <td width="2%">18</td>
                        <td width="2%">19</td>
                        <td width="2%">20</td>
                         <td width="2%">21</td>
                        <td width="2%">22</td>
                        <td width="2%">23</td>
                        <td width="2%">24</td>
                         <td width="2%">25</td>
                        <td width="2%">26</td>
                        <td width="2%">27</td>
                        <td width="2%">28</td>
                         <td width="2%">29</td>
                        <td width="2%">30</td>
                        <td width="2%">31</td>
                        <td width="27%">&nbsp;</td>
                       
                        
                        
                              
                      </tr>
                <?php
					$ep_jawdawl_no = 1;
				foreach($data_jadwal['data_jadwal']as $baris_jadwal){
			?>
                      
                      <tr>
                        <td><?PHP echo"$ep_jawdawl_no"; ?></td>
                        <td><a href="#"><?PHP echo $baris_jadwal['bulan'] ?></a></td>
                        <td><b><?PHP echo $baris_jadwal['nip'] ?></b>
                        <br>
                        <?PHP echo $baris_jadwal['nama'] ?>
                        <br>
                        <?PHP echo $baris_jadwal['gustu'] ?>
                        </td>
                       <td width="2%"><?PHP echo $baris_jadwal['t01'] ?></td>
                        <td width="2%"><?PHP echo $baris_jadwal['t02'] ?></td>
                        <td width="2%"><?PHP echo $baris_jadwal['t03'] ?></td>
                        <td width="3%"><?PHP echo $baris_jadwal['t04'] ?></td>
                        <td width="3%"><?PHP echo $baris_jadwal['t05'] ?></td>
                        <td width="3%"><?PHP echo $baris_jadwal['t06'] ?></td>
                        <td width="3%"><?PHP echo $baris_jadwal['t07'] ?></td>
                        <td width="3%"><?PHP echo $baris_jadwal['t08'] ?></td>
                        <td width="3%"><?PHP echo $baris_jadwal['t09'] ?></td>
                        <td width="3%"><?PHP echo $baris_jadwal['t10'] ?></td>
                     	<td width="3%"><?PHP echo $baris_jadwal['t11'] ?></td>
                        <td width="3%"><?PHP echo $baris_jadwal['t12'] ?></td>
                        <td width="2%"><?PHP echo $baris_jadwal['t13'] ?></td>
                        <td width="2%"><?PHP echo $baris_jadwal['t14'] ?></td>
                        <td width="2%"><?PHP echo $baris_jadwal['t15'] ?></td>
                        <td width="2%"><?PHP echo $baris_jadwal['t16'] ?></td>
                         <td width="2%"><?PHP echo $baris_jadwal['t17'] ?></td>
                        <td width="2%"><?PHP echo $baris_jadwal['t18'] ?></td>
                        <td width="2%"><?PHP echo $baris_jadwal['t19'] ?></td>
                        <td width="2%"><?PHP echo $baris_jadwal['t20'] ?></td>
                         <td width="3%"><?PHP echo $baris_jadwal['t21'] ?></td>
                        <td width="3%"><?PHP echo $baris_jadwal['t22'] ?></td>
                        <td width="1%"><?PHP echo $baris_jadwal['t23'] ?></td>
                        <td width="1%"><?PHP echo $baris_jadwal['t24'] ?></td>
                         <td width="1%"><?PHP echo $baris_jadwal['t25'] ?></td>
                        <td width="1%"><?PHP echo $baris_jadwal['t26'] ?></td>
                        <td width="1%"><?PHP echo $baris_jadwal['t27'] ?></td>
                        <td width="1%"><?PHP echo $baris_jadwal['t28'] ?></td>
                         <td width="1%"><?PHP echo $baris_jadwal['t29'] ?></td>
                        <td width="1%"><?PHP echo $baris_jadwal['t30'] ?></td>
                        <td width="1%"><?PHP echo $baris_jadwal['t31'] ?></td>
                        <td width="27%">&nbsp;</td>
                      </tr>
                      
                      <?PHP $ep_jawdawl_no++; } ?>
			</table>
			</div>
                
            
            
            </body>
            
  <?PHP } ?>