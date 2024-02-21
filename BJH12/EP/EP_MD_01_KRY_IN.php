<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <strong class="me-auto">SETUP DATA > ENTRI KRYWAN</strong>

  </div>
  <div class="toast-body">
    <b>ENTRI DATA KRY</b>
  </div>
</div>
<br>
<form method="post">
#DEPT
<select class="form-control form-control-sm" name="ep_dept_01" style="max-width:20rem;">
<?PHP 
    echo"<option value=>-</option>";
    $ep_vdept01_sw = $ms_q("$sl ID,Dept_Name FROM TJ_Main_Data.dbo.HR_Dept order by Dept_Name asc ");
        while($ep_vdept01_sww = $ms_fas($ep_vdept01_sw)){
            echo"<option value=$ep_vdept01_sww[ID]>$ep_vdept01_sww[Dept_Name]</option>";
        }
?>
</select>
#NIP
<input type="text" class="form-control form-control-sm" required name="ep_nip_01" style="max-width:20rem;">
#NAMA KRY
<input type="text" class="form-control form-control-sm" required name="ep_nama_01" style="max-width:20rem;">
<br>
<button class="btn btn-success btn-sm" name="ep_simpan_kry_01">SIMPAN DATA</button>
</form>
<?PHP include"../LOGIC/EP_EXE_MIX.php";  ?>
<?PHP } ?>