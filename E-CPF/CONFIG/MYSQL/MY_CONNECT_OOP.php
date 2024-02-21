<?php
    class database{
 
        var $host = "localhost";
        var $uname = "root";
        var $pass = "holihks45";
        var $db = "na-mix-01";
     
        function CONN02_FS(){
            $CONN02 = mysqli_connect($this->host, $this->uname, $this->pass);
            mysqli_select_db($CONN02,$this->db);
     
            if($CONN02){
               // echo "<font color=green><b>Successs TO Connect</b></font>";
            }else{
               // echo "<font color=red><b>Failed To Connect</b></font>";
            }
               
        }
    } 

?>