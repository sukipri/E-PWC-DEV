<?php  //if(!file_exists("layout/$GL.php")) {  /*include"layout/first_page.php";  */ echo"<h2>Halaman ADmin</h2>";} else {  include"layout/$GL.php";} ?> 

<?PHP 
        switch(@$_GET['HLM']){
			#PEDF
            case'LIST_DAFTAR_TODAY':
                include"layout/LIST_DAFTAR_TODAY.php";
            break;
            case'LIST_DAFTAR_TODAY_APP':
                include"layout/LIST_DAFTAR_TODAY_APP.php";
            break;
            case'LIST_DETAIL_DAFTAR':
                include"layout/LIST_DETAIL_DAFTAR.php";
            break;
            case'LIST_DAFTAR_BATAL':
                include"layout/LIST_DAFTAR_BATAL.php";
            break;
            case'LIST_DAFTAR_ONLINE':
                include"layout/LIST_DAFTAR_ONLINE.php";
            break;
            case'LIST_DAFTAR_MJKN':
                include"layout/LIST_DAFTAR_MJKN.php";
            break;
            case'LIST_DAFTAR_APM':
                include"layout/LIST_DAFTAR_APM.php";
            break;
            case'LIST_DAFTAR':
                include"layout/LIST_DAFTAR.php";
            break;
            case'INPUT_JADWAL_DOKTER':
                include"layout/INPUT_JADWAL_DOKTER.php";
            break;
            case'DAFTAR_DOKTER':
                include"layout/DAFTAR_DOKTER.php";
            break;
            case'EDIT_JADWAL_DOKTER':
                include"layout/EDIT_JADWAL_DOKTER.php";
            break;
			case'KS_PWC_VIEW_01':
				include"layout/KS_PWC_VIEW_01.php";
			break;
			case'KS_PWC_VIEW_01_RP':
				include"layout/KS_PWC_VIEW_01_RP.php";
			break;
            #DATA PASIEN
            case'DATA_PASIEN':
                include"layout/DATA_PASIEN.php";
            break;
            case'DATA_PASIEN_TGL':
                include"layout/DATA_PASIEN_TGL.php";
            break;

            case'DAFTAR_DETAIL_DOKTER':
                include"layout/DAFTAR_DETAIL_DOKTER.php";
            break;
            case'DAFTAR_DETAIL_DOKTER':
                include"layout/DAFTAR_DETAIL_DOKTER.php";
            break;
            case'LIST_DAFTAR_CARI':
                include"layout/LIST_DAFTAR_CARI.php"; #CARI DAFTAR ONLINE PASIEN
            break;
            case'DAFTAR_ACC':
                include"layout/DAFTAR_ACC.php"; #ACC BPJS
            break;
            case'DAFTAR_BATAL':
                include"layout/DAFTAR_BATAL.php"; #TLAK PASIEN
            break;
            case'DATA_PASIEN_LAB':
                include"layout/DATA_PASIEN_LAB.php"; #HASIL LAB LIST
            break;
            case'DATA_PASIEN_LAB_CARI':
                include"layout/DATA_PASIEN_LAB_CARI.php"; #HASIL LAB CARI
            break;
            case'DATA_PASIEN_LAB_PASIEN':
                include"layout/DATA_PASIEN_LAB_PASIEN.php"; #HASIL LAB DATA_PASIEN_LAB_PASIEN 
            break;
            case'DATA_PASIEN_LAB_DETAIL':
                include"layout/DATA_PASIEN_LAB_DETAIL.php"; #HASIL LAB DATA_PASIEN_LAB_DETAIL
            break;
            case'RIWAYAT_RAWAT':
                include"layout/RIWAYAT_RAWAT.php"; #DATA PASIEN
            break;
            case'DETAIL_RIWAYAT_RAWAT':
                include"layout/DETAIL_RIWAYAT_RAWAT.php"; #DATA PASIEN
            break;
            case'HAPUS_SAMPAH':
                include"layout/HAPUS_SAMPAH.php"; #TLAK PASIEN
            break;
                #CPF
                case'CPF_LIST_01':
                    include"layout/CPF_LIST_01.php";
                break;
                case'CPF_LIST_01_STK':
                    include"layout/CPF_LIST_01_STK.php";
                break;
                case'CPF_LIST_01_STK02':
                    include"layout/CPF_LIST_01_STK02.php";
                break;
                case'CPF_LIST_01_STK03':
                    include"layout/CPF_LIST_01_STK03.php";
                break;
                case'CPF_LIST_01_STK04_DATE':
                    include"layout/CPF_LIST_01_STK04_DATE.php";
                break;
                case'CPF_LIST_01_STK03_DATE':
                    include"layout/CPF_LIST_01_STK03_DATE.php";
                break;
                #VK KODE REGISTRATION
                case'KR_VK_01_IN':
                    include"layout/KR_VK_01_IN.php";
                break;
                case'KR_VK_01_IN02':
                    include"layout/KR_VK_01_IN02.php";
                break;
                case'KR_VK_01_IN03':
                    include"layout/KR_VK_01_IN03.php";
                break;
                case'KR_VK_01_UP':
                    include"layout/KR_VK_01_UP.php";
                break;
                case'KR_VK_01_VIEW':
                    include"layout/KR_VK_01_VIEW.php";
                break;
                case'KR_VK_01_VIEW02':
                    include"layout/KR_VK_01_VIEW02.php";
                break;
                case'KR_VK_01_VIEW03':
                    include"layout/KR_VK_01_VIEW03.php";
                break;
                        
        }

?>