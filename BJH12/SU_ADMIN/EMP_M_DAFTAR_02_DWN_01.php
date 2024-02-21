<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
    <h3>Download Data Karyawan</h3>
    <div style="overflow:auto;width:auto;;height:400px;padding:2px;border:1px solid #eee">
<table width="100%" class="table table-bordered" border="0">
	<?php 
		$open_tj_vun = $ms_q("$call_sel TJ_Main_Data.dbo.HR_Dept order by Dept_name asc");
			while($open_tj_vunn = $ms_fas($open_tj_vun)){
	?>
	  <tr class="table-info">
	    <td width="91%"><?php echo"$open_tj_vunn[Dept_Name]"; ?></td>
        <td width="9%"><a href="<?PHP echo"EMP_M_DAFTAR_02_DWN_01_REDI02_XLS.php?IDBG01=$open_tj_vunn[ID]"; ?>" target="_blank" class="btn btn-primary btn-sm">Download Per Bag</a></td>
  </tr>
	  <tr>
	 
	    <td height="33" colspan="2">
        <?php 
			$open_tj_vkry_up = $ms_q("$sl ID,Per_Code,Dept_ID,Per_Name FROM TJ_Main_Data.dbo.HR_Personnel WHERE Dept_ID='$open_tj_vunn[ID]' "); 
			$no = 1;    
				while($open_tj_vkryy_up = $ms_fas($open_tj_vkry_up)){  
			?>
        	<?PHP
                echo $open_tj_vkryy_up['Per_Name'];
                echo"<br>";
                echo $open_tj_vkryy_up['Per_Code'];
                echo"<br>";
            ?>
                <hr>
        <?php } ?>
        </td>
  </tr>
  <?php } ?>
</table>
</div> 
        <a href="EMP_M_DAFTAR_02_DWN_01_REDI_XLS.php" class="btn btn-success btn-sm" target="_blank">Download</a>
</body>
<?php } ?>