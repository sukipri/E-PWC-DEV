
<body>
		<h4><i class="fa fa-bars"></i>&nbsp;List Pendaftar dengan APM</h4>
		<form method="post" action="">
		<table width="100%" border="0" class="table">
  <tr>
    <td><input type="date" name="tg1" class="form-control"></td>
    <td><input type="date" name="tg2" class="form-control"></td>
    <td><button name="cari" class="btn btn-info">Cari Data</button> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
  </form>
        <?PHP 
            if(isset($_POST['cari'])){
                $tg1 = @$_POST['tg1'];
                $tg2 = @$_POST['tg2'];
                echo"<b>INTERVAL</b> $tg1 <> $tg2";
                echo"<br>";
                
                #DATA APM
                $pwc_vapm01_sw = @$ms_q("SELECT SEPNomor FROM TSEP WHERE UserID='APM' AND SEPTanggal BETWEEN '$tg1' AND '$tg2' order by SEPTanggal desc");
                $pwc_nr_vapm01_sww = $ms_nr($pwc_vapm01_sw);
?>
<div class="alert alert-dismissible alert-success">
			 <i class="fas fa-info	"></i>
				<b>Informasi Pemakai APM</b><br>
				<?PHP 
					echo $pwc_nr_vapm01_sww;
				
				?>
				
			</div>

           

                <?PHP } ?>

</body>

