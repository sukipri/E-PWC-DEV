<?php @ob_start();
		 @session_start(); ?>

<?php include"../DIST/DIST_GET.php";  ?>
<style>
.bg_img {
  background-image: url("https://pantiwilasa-citarum.co.id/WEB-PWC/OPT-03/IMG/HD/H4_new.jpg"); /* The image used */ /* Used if the image is unavailable */
  height: 100%; /* You must set a specified height */
  width:100% /* Do not repeat the image */ /* Resize the background image to cover the entire container */
}
</style>
	<?PHP  if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){ ?>
 <div class="bg_img">
 <div class="container">
<form method="post"> <!-- action="../LOGIC/ACS/ACS_LOGIN.php" -->
<div style="padding-top:20px;"></div>
<div class="card border-primary mb-3" style="max-width: 30rem;">
  <div class="card-header"><i class="fas fa-lock"></i>&nbsp;LOGIN E-PWC</div>
  <div class="card-body">
    <h4 class="card-title">Login Access</h4>
	   <input type="hidden"   class="form-control form-control-sm" value="<?php echo"$cpf_vquest_sww[qc_jawaban_01]"; ?>" name="tanya_us" readonly="readonly" />
       <input type="text" name="us_nama" class="form-control form-control-sm" style="max-width:15rem;" placeholder="Username....." required autocomplete="off" />
        <br />
         <input type="password" name="us_pass" class="form-control form-control-sm" style="max-width:15rem;" placeholder="password....." required autocomplete="off" />
         <br />
           <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><?php echo"<b>$cpf_vquest_sww[qc_pertanyaan_01]</b>"; ?></span>
          </div>
          <input autocomplete="off" type="text" required class="form-control" name="jawab_us"  style="max-width:6rem;" placeholder="Answer.." aria-label="Username" aria-describedby="basic-addon1">
        </div>

         <br />
         <button name="epwc_acs_login" class="btn btn-success"><i class="fas fa-sign-in-alt"></i>&nbsp;LOGIN</button>
       <?php include"../LOGIC/ACS/ACS_LOGIN.php"; ?> 
  </div>
</form>
  </div>
<?PHP }else{   ?>
<meta http-equiv="refresh" content="0; url=<?php echo"EPWC_HOME_01.php"; ?>">
<?PHP } ob_flush(); ?>
</div>