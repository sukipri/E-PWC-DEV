<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			//error_reporting(0);

                #DATA KARYWAN TJ MAIN DATA
                $open_tj_vkry01_sw = $CL_Q("$SL ID,Per_Code,Per_Name FROM TJ_Main_Data.dbo.HR_Personnel WHERE Per_Code='$IDEMP02'");
                    $open_tj_vkry01_sww = $CL_FAS($open_tj_vkry01_sw);
?>
<form method="post">
<div class="mx-2">
    <b>#ENTRI LEMBUR</b>
    <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">@</span>
    </div>
    <input type="text" class="form-control form-control-sm" style="max-width:17rem;" name="ep_plbr_kode_01" required autocomplete="off" value="<?PHP echo"LBR-$IDMAIN"; ?>">
    </div>

    <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">@</span>
    </div>
    <input type="text" class="form-control form-control-sm" style="max-width:17rem;" readonly name="##" required autocomplete="off" value="<?PHP echo"$open_tj_vkry01_sww[Per_Name]"; ?>">
    </div>
    
    <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Keterangan</span>
    </div>
    <textarea name="ep_plbr_ket_01" class="form-control" required style="max-width:20rem;"></textarea>
    </div>

    <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Tanggal Lembur</span>
    </div>
     <input type="date" class="form-control form-control-sm" style="max-width:17rem;" name="ep_plbr_tglmasuk_01" required autocomplete="off">
    </div>

    <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Jumlah Jam Lembur</span>
    </div>
     <input type="number" class="form-control form-control-sm" style="max-width:7rem;" name="ep_plbr_jmljam_01" required autocomplete="off">
    </div>
            <button name="ep_save_plbr_01" class="btn btn-success btn">SIMPAN DATA</button>
</div>
    </form>
            <?PHP include"../LOGIC/PRC/EXE_MIX.php"; ?>
            
            <?PHP include"WS-EPWC_EP_APP_JDW_LBR_VIEW.php" ?>
<?PHP } ?>