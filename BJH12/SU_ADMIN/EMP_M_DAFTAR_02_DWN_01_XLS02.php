<?php 
       include"../secure/GR_01.php"; //security enggine
       include"../sc/ID_IDF.php";  //Identifer ID PAGE
       //include"../css.php";   //style and control title meta
           include"../sc/stack_Q.php"; //Query SQL
       include"../sc/code_rand.php";
        include"../config/connec_01_srv.php";
        include"../config/connec_01_srv_pdo_open.php";
        include"../sc/CODE_GET.php";

        ob_start();
        session_start();
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
<h3>Data Karyawan / BAGIAN</h3>
<table width="100%" class="table table-bordered" border="1">
	<?php 
		$open_tj_vun = $ms_q("$call_sel TJ_Main_Data.dbo.HR_Dept WHERE  ID='$IDBG01'");
			while($open_tj_vunn = $ms_fas($open_tj_vun)){
	?>
	  <tr >
	    <td bgcolor="orange"><b><?php echo"$open_tj_vunn[Dept_Name]"; ?></b></td>
        <td width="9%">-</td>
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
            ?>
                <hr>
        <?php } ?>
        </td>
  </tr>
  <?php } ?>
</table>
</body>
<?php } ob_end_flush(); ?>