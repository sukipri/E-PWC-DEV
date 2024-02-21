<?PHP include"../DIST/DIST_GET.php" ;
		$ec_vuser01_sw = mssql_query("select * from TBUser WHERE idmain='$IDUSER01'");
		$ec_vuser01_sww = mssql_fetch_assoc($ec_vuser01_sw);
	//Rec
	$ec_vttr01_sw = $CL_Q("$CL_SL tb_ec_titik_01_rec WHERE idmain_titik_01_rec='$IDMAIN01'");
		$ec_vttr01_sww = $CL_FAS($ec_vttr01_sw); ?>
      <body>
    <div class="alert alert-dismissible alert-success">
                <strong>Well done!</strong> Data berhasil dikirim.
    </div>
</body>
