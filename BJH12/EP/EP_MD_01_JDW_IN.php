<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
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
<div class="input-group input-group-sm mb-3" style="max-width:20rem;">
  <input type="text" class="form-control form-control-sm" required autocomplete="off" name="ep_txt_jdw_01" placeholder="Cari Nama..">
  <div class="input-group-append">
  <button name="ep_btn_jdw_cari_01" class="btn btn-success btn-sm"><i class="fas fa-search"></i>Cari Data</button>
  </div>
</div>
</form>
<br>
<?PHP 
    if(isset($_POST['ep_btn_jdw_cari_01'])){
    $ep_txt_jdw_01 = @$sql_sl($_POST['ep_txt_jdw_01']);
    
    $open_tj_vkry01_sw = $ms_q("$sl ID,Per_Code,Per_Name FROM TJ_Main_Data.dbo.HR_Personnel WHERE Per_Name LIKE '%$ep_txt_jdw_01%' ");
        while($open_tj_vkry01_sww = $ms_fas($open_tj_vkry01_sw)){
?>
<div class="alert alert-dismissible alert-secondary" style="max-width:20rem;">
        <i><?PHP echo $open_tj_vkry01_sww['Per_Code'] ?> </i>
        <br>
        <strong><?PHP echo $open_tj_vkry01_sww['Per_Name'] ?> </strong>
        <br>
        <a href="<?PHP echo"?HLM=EP_HOME_01&SUB=EP_MD_01&SUB_CHILD=EP_MD_01_SD&SUB_CHILD02=EP_MD_01_JDW_IN02&IDEMP01=$open_tj_vkry01_sww[Per_Code]"; ?>"><span class="badge bg-primary">Entri Jadwal >></span></a>
</div>
<?PHP }} ?>

<?PHP } ?>