<form method="post">
<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <strong class="me-auto">Note</strong>
    <small>11 mins ago</small>
      <span aria-hidden="true"></span>
    </button>
  </div>
  <div class="toast-body">
    Yang tersprtir hanya pengguna Presensi *Masuk <br><i>GPS Method</i>
  </div>
</div>
<br>    
<span class="badge bg-info">#Lap Random / Day</span>
<div class="input-group mb-3" style="max-width:20rem;">
  <input type="date" class="form-control form-control-sm" required name="ep_ri_tgl01">
  <div class="input-group-append">
    <button class="btn btn-success btn-sm" name="ep_ri_cari">CARI DATA</button>
  </div>
</div>
<br>
<?Php if(isset($_POST['ep_ri_cari'])){ $ep_ri_tgl01 = @$_POST['ep_ri_tgl01'];  ?>
<?php 
  	
  //--VIEW REKAP DAY--//
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
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
      $output = curl_exec($ch); 
      curl_close($ch);      
      return $output;
  }
  
  $send = curl("http://103.164.114.138/E-PWC-DEV/BJH12/EP_API/API_EP_RECINFO_01_RKP_DAY_IN.php?ep_ri_tgl01=$ep_ri_tgl01");
  
  // mengubah JSON menjadi array
  @$data_ri = json_decode($send, TRUE);
  
      //print_r($data);

?>
<!-- -->
<table class="table table-bordered table-sm table-striped">
  <tr class="table-info">
        <td width="5%">#</td>
        <td  width="25%">NAMA</td>
        <td  width="20%">Jadwal Masuk  / Pulang</td>
        <td width="20%">Jam Berangkat / Pulang</td>
        <td width="20%">Keterlambatan / Lembur</td>
        <td></td>
    </tr>
    <?PHP 
        $ep_presensi01_no = 1;
        foreach($data_ri['data_ri'] as $baris_ri){
    ?>
    <tr>
        <td><?PHP echo $ep_presensi01_no; ?>
        <td width="20%"><?PHP echo $baris_ri['nama']; echo"<br>";   echo $baris_ri['nip']; ?></td>
        <td align="center">
        <?PHP 
             if($baris_ri['status']=="1"){  echo $baris_ri['cek_shift']." -  ". $baris_ri['cek_masuk']; }elseif($baris_ri['status']=="2"){ echo $baris_ri['cek_keluar'];}
             /*
              $coba_01 = "S1";
                echo "-". substr($coba_01,0,-1);
                */
            ?>
            
        </td>
        <td align="center">
        <span class="badge bg-success"><?PHP if($baris_ri['status']=="1"){ echo $baris_ri['tgl_masuk'];  }  ?></span>
        <br>
        <span class="badge bg-danger"><?PHP if($baris_ri['status']=="2"){ echo $baris_ri['tgl_masuk'];  }  ?></span>
        </td>
        <td align="center">
        <?PHP
            if($baris_ri['cek_telat'] < 0 ){
                echo"<b>ON TIME</b>";                
            }else{

            #KONDISI TERLAMBAT
            if($baris_ri['status']=="1"){   ?>
            <i><?PHP echo $baris_ri['cek_telat']." Jam ".$baris_ri['cek_telat02']." Menit "; ?>
            <?PHP }elseif($baris_ri['status']=="2"){ echo $baris_ri['cek_telat02a']." Jam ".$baris_ri['cek_telat0202']." Menit";  } } ?>
          </i>
        </td>
        <td align="center"><a href="#"><?PHP echo $baris_ri['gps_kode']; ?></a></td>
    </tr>
    <?PHP $ep_presensi01_no++; } ?>
</table>

<?PHP } ?>
</form>  
