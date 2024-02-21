<?PHP 
    include"../../BJH12/config/connec_01_srv_pdo_open.php";
    header("Refresh:450; url=http://182.253.60.178/E-PWC-DEV/SU_ADMIN/API/API_SQLITE_ANTRI_01.php");
    $DATE_NOW = date("Y-m-d");
	class MyDB extends SQLite3 {
		function __construct() {
		   $this->open('//192.168.3.22/antrian/DATA.db');
		}
	 }
	 $db = new MyDB();
	 if(!$db) {
		echo "FAILED TO RETRIVING DB<br>";
	 } else {
		echo "Opened database successfully<br>";
	 }
     echo "<b>RETRIVING DATA</b><hr>";
	 $sql ="select * from ANTRI WHERE TANGGAL='$DATE_NOW' AND NOT LAYANAN='3' AND NOT LAYANAN='4' AND NOT LAYANAN='5' AND NOT TIMECALL='' ";
	 $ret = $db->query($sql);
  
	 while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
        $sqlite_hit_zero_02 = sprintf('%03d',$row['NO']);
         $txt_row = trim($row['KODE LAYANAN'].$sqlite_hit_zero_02);
        
        
        $open_ctr_antri01_sw = mssql_query("select KodeAntrian,TANGGAL FROM TWaktuTungguBPJS WHERE  KodeAntrian='$txt_row'  AND TANGGAL='$DATE_NOW'");
            $open_ctr_antri01_sww = mssql_num_rows($open_ctr_antri01_sw);
                if($open_ctr_antri01_sww > 0){
                    echo "<font color=orange><b>DATA SUDAH ADA</b><br>";
                }else{
            #PROCCESSING INSERT
            mssql_query("insert into Citarum.dbo.TWaktuTungguBPJS(NoReg,TransTgl,TaskID,StatusCode,Keterangan,UserID,UserDate,KodeAntrian,TANGGAL)VALUES('0','$DATE_NOW $row[TIMEIN]','1','000','','','','$txt_row','$DATE_NOW')");
            mssql_query("insert into Citarum.dbo.TWaktuTungguBPJS(NoReg,TransTgl,TaskID,StatusCode,Keterangan,UserID,UserDate,KodeAntrian,TANGGAL,TIMECALL)VALUES('0','$DATE_NOW $row[TIMECALL]','2','000','','','','$txt_row','$DATE_NOW','$row[TIMECALL]')");
            
            #PROCCESSING UPDATE   
            echo"<font color=green><b>";   
            echo $row['TANGGAL'];
            echo "-"; 
            echo  $txt_row;
            echo"</b></font>";
            echo"<br>";
                }
?>

    <?PHP } 
    