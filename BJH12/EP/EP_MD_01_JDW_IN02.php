<?php 

		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
		include"../LOGIC/PG/PG_H_LOCATION.php";
	} else {
        $open_tj_vkry01_sw = $ms_q("$sl ID,Per_Code,Per_Name FROM TJ_Main_Data.dbo.HR_Personnel WHERE Per_Code='$IDEMP01' ");
            $open_tj_vkry01_sww = $ms_fas($open_tj_vkry01_sw);
?>
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <strong class="me-auto">SETUP DATA > ENTRI JADWAl</strong>

  </div>
  <div class="toast-body">
    <b>ENTRI JADWAL</b>
  </div>
</div>
<br>
<form method="post">
<div style="max-width:20rem;" class="mx-2">
<div class="input-group input-group-sm mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1">Nama</span>
		</div>
		<input type="text" class="form-control form-control-sm" autocomplete="off" name="ep_cari_nama_01" readonly require value="<?PHP echo  $open_tj_vkry01_sww['Per_Name']; ?>">
	</div>
    
    <div class="input-group input-group-sm mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1">Tahun</span>
		</div>
        <input type="text" value="<?PHP echo"$YR$MH"; ?>" name="ep_bulan_01">
        <input type="hidden" value="<?PHP echo"$IDEMP01"; ?>" name="IDEMP02">

		
	</div>

      
                    <br>
                <button name="ep_btn_jdw_01" class="btn btn-success btn-sm"><i class="fas fa-cloud-upload-alt"></i>Unggah data</button>
				<br>
				<ol>
					<li>Masukan Jadwal Sesuai urutan Hari Dan shift</li>
					<li>Jika terjadi kesalahan entri bisa di update dengan cara yang sama , pilih hari dan shift lalu simpan</li>
					
				</ol>
    
    <!-- -->
    </div>
    </form>
            <?PHP include"../logic/EP_EXE_MIX.php"; ?>
            <hr>
              <?PHP include"EP_MD_01_JDW_VIEW.php"; ?>
                
            

    <?PHP } ob_start(); ?>