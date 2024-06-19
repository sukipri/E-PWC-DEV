<?php //session_start(); ?>
<div class="bg_img">
<div style="padding-top:20px;"></div>

<?php include"../DIST/DIST_GET.php";  ?>
<style>
.bg_img {
  background-image: url("../IMG/HD/IMGLOGIN.png"); /* The image used */ /* Used if the image is unavailable */
  background-color: #cccccc; /* Used if the image is unavailable */
  height: 100%; /* You must set a specified height */
  width:auto;
  background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
}
</style>

<form method="post"> <!-- action="../LOGIC/ACS/ACS_LOGIN.php" -->
<div class="card border-primary mb-3 mx-2" style="max-width: 30rem;">
  <div class="card-header"><i class="fas fa-lock"></i>&nbsp;LOGIN E-CPF</div>
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
         <button name="cpf_acs_login" class="btn btn-success"><i class="fas fa-sign-in-alt"></i>&nbsp;LOGIN</button>
       <?php include"../LOGIC/ACS/ACS_LOGIN.php"; ?> 
  </div>
</form>
</div>