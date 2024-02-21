<?PHP 
    #SIP_MD_01_NK_IN
        #VARIABLE MD NK
            $sipk_kode_01 = @$sql_sl($_POST['sipk_kode_01']);
            $idmain_kry_01 = @$sql_sl($_POST['idmain_kry_01']);
            $idmain_unit_01 = @$sql_sl($_POST['idmain_unit_01']);
            $sipk_nama_01 = @$sql_sl($_POST['sipk_nama_01']);
            $sipk_tlp_01 = @$sql_sl($_POST['sipk_tlp_01']);
            $sipk_nik_01 = @$sql_sl($_POST['sipk_nik_01']);
            $sipk_tglmasuk_01 = @$_POST['sipk_tglmasuk_01'];
            $sipk_spes_01 = @$sql_sl($_POST['sipk_spes_01']);
            $sipk_ttl_01 = @$sql_sl($_POST['sipk_ttl_01']);
            $sipk_ttl02_01 = @$_POST['sipk_ttl02_01'];
            $sipk_alamat_01 = @$sql_sl($_POST['sipk_alamat_01']);
            $sipk_str_01 = @$sql_sl($_POST['sipk_str_01']);
            $sipk_sip_01 = @$sql_sl($_POST['sipk_sip_01']);
            $sipk_str_01 = @$sql_sl($_POST['sipk_str_01']);
            $sipk_uji_01 = @$sql_sl($_POST['sipk_uji_01']);           
        #PROCCESSING INSERT
        if(isset($_POST['sip_simpan_nk_01'])){
                $sipk_save_sipk_01 = $ms_q("$in Citarum.dbo.tb_sipk_01 (idmain_sipk_01,idmain_kry_01,idmain_unit_01,sipk_nama_01,sipk_spes_01,sipk_ttl_01,sipk_ttl02_01,sipk_alamat_01,sipk_tglmasuk_01,sipk_str_01,sipk_sip_01,sipk_uji_01,sipk_status_01,sipk_ket_01,sipk_tlp_01,sipk_nik_01,sipk_status02_01,sipk_kode_01)VALUES('$IDMAIN','$idmain_kry_01','$idmain_unit_01','$sipk_nama_01','$sipk_spes_01','$sipk_ttl_01','$sipk_ttl02_01','$sipk_alamat_01','$sipk_tglmasuk_01','$sipk_str_01','$sipk_sip_01','$sipk_uji_01','1','0','$sipk_tlp_01','$sipk_nik_01','2','$sipk_kode_01')");
                if($sipk_save_sipk_01){
                    header("LOCATION:?HLM=SIP_HOME_01&SUB=SIP_MD_01&SUB_CHILD=SIP_MD_01_NK_VIEW");
                }else{
                        include"../sd/NOTIF_FAILED.php";
                }
        }
        #PROCCESSING UPDATE
        if(isset($_POST['sip_up_nk_01'])){
            $sipk_up_sipk_01 = $ms_q("$up Citarum.dbo.tb_sipk_01 SET idmain_kry_01='$idmain_kry_01',idmain_unit_01='$idmain_unit_01',sipk_nama_01='$sipk_nama_01',sipk_spes_01='$sipk_spes_01',sipk_ttl_01='$sipk_ttl_01',sipk_ttl02_01='$sipk_ttl02_01',sipk_alamat_01='$sipk_alamat_01',sipk_tglmasuk_01='$sipk_tglmasuk_01',sipk_str_01='$sipk_str_01',sipk_sip_01='$sipk_sip_01',sipk_uji_01='$sipk_uji_01',sipk_tlp_01='$sipk_tlp_01',sipk_nik_01='$sipk_nik_01',sipk_kode_01='$sipk_kode_01' WHERE idmain_sipk_01='$IDSIPK01'");
            if($sipk_up_sipk_01){
                header("LOCATION:?HLM=SIP_HOME_01&SUB=SIP_MD_01&SUB_CHILD=SIP_MD_01_NK_VIEW");
            }else{
                    include"../sd/NOTIF_FAILED.php";
            }
    }

    #SIP_MD_01_NK_IN_BRK
    $idmain_flag_01 = @$SQL_ESC($CONN01,$_POST['idmain_flag_01']);
    $kry_namaberkas_01 = @$SQL_ESC($CONN01,$_POST['kry_namaberkas_01']);
      $namaFile = @$_FILES['kry_file_01']['name'];
      $namaSementara = @$_FILES['kry_file_01']['tmp_name'];
      $imageFileType = strtolower(pathinfo($namaFile,PATHINFO_EXTENSION));
      $x = explode('.', $namaFile);
      $ekstensi = strtolower(end($x));
      $dirUpload = "../FL/";
      $ENFILE = md5("$namaFile$DATE_HTML5_SQL");
      $hit_ENFILE = "$IDMAIN.$ekstensi";
      if(isset($_POST['hr_simpan_kry_03'])){
      // pindahkan file
          $terupload = move_uploaded_file($namaSementara, $dirUpload.$hit_ENFILE); 
          $hr_save_sipbrk_01 = $ms_q("$in Citarum.dbo.tb_sipbrk_01(idmain_sipbrk_01,idmain_kry_01,sipbrk_kode_01,sipkbrk_file_01,sipk_tglinput_01)VALUES('$idmain_sipbrk_01','$idmain_kry_01','$sipbrk_kode_01','$sipkbrk_file_01','$DATE_HTML5_SQL')");
          
      if ($terupload) {
          echo "Upload berhasil!<br/>";
          echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
      } else {
          include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
      }

  }

?>