
<form method="post">
	
    <table width="100%" style="max-width:25rem;" class="table table-bordered table-sm table-striped">
		<tr>
        	<td>
            <h5><b><i class="fas fa-id-card"></i>&nbsp;Add Account</b></h5>
            <!-- -->
            	<br />
                <input type="hidden"   class="form-control form-control-sm" value="<?php echo"$cq_vus01_sw"; ?>" name="kode_us" readonly="readonly" />
                 <input type="hidden"   class="form-control form-control-sm" value="<?php echo"$vqa01_sww[qa_02]"; ?>" name="tanya_us" readonly="readonly" />
                <input type="text" autocomplete="off" style="max-width:20rem;" class="form-control form-control-sm" name="nama_us" required placeholder="Typing Your Account Name..." />
                <br />
                <input type="password" autocomplete="off" style="max-width:15rem;" class="form-control form-control-sm" name="pass_us" required placeholder="Typing Your Account Password..." />
                <br />
                <input type="password" autocomplete="off" style="max-width:15rem;" class="form-control form-control-sm" name="pass_us" required placeholder="Repeat Your Account Password..." />
           		<br />
               
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><?php echo"<b>$vqa01_sww[qa_01]</b>"; ?></span>
                  </div>
                  <input autocomplete="off" type="text" required class="form-control" name="jawab_us"  style="max-width:6rem;" placeholder="Answer.." aria-label="Username" aria-describedby="basic-addon1">
                </div>
			<!--BUTOON EXECUTE -->
            <button name="save_acc_01" class="btn btn-success"><i class="far fa-save"></i>&nbsp;SAVE ACCOUNT</button>
            
            <!-- -->
            
            <!-- -->
            </td>
        </tr>        
    
    </table>
</form>

	<!-- -->
		<?php include"../LOGIC/PRC/EXE_IN.php"; ?>
	<!-- -->