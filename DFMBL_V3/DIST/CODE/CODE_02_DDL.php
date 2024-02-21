<?php
/*-------------------------------------------------------*/
    /* Himpunan QL VARIABEL Fetching and DDL */
    /*-----------------------------------------------------*/

        /* SQL VARIABEL Fetching and DDL */
            
        //...DDL..//
        
            $CL_SL = "select * from";
            $CL_DL = "delete from";   
            $OB = "order by";
            $IN = "insert into";
            $SL = "select";
            $DL = "delete";
            $UP = "update";
        //............//

        //...MYSQLi.../    
        /*
            $CL_Q = @mysqli_query;
            $CL_FA = @mysqli_fetch_array;
            $CL_NR = @mysqli_num_rows;
            $CL_FR = @mysqli_fetch_row;
            $CL_FAS = @mysqli_fetch_assoc;
            $CL_OB = @mysqli_fetch_object;
    */
        //..MYSQL...//
        /*
            $CL_Q = @mysql_query;
            $CL_FA = @mysql_fetch_array;
            $CL_NR = @mysql_num_rows;
            $CL_FR = @mysql_fetch_row;
            $CL_FAS = @mysql_fetch_assoc;
            $CL_OB = @mysql_fetch_object;  
        */

        //..MSSQL...//
        /**/
            $CL_Q = @mssql_query;
            $CL_FA = @mssql_fetch_array;
            $CL_NR = @mssql_num_rows;
            $CL_FR = @mssql_fetch_row;
            $CL_FAS = @mssql_fetch_assoc;
            $CL_OB = @mssql_fetch_object;
        

        //..PGSQL...//
        /*
            $CL_Q = @pg_query;
            $CL_FA = @pg_fetch_array;
            $CL_NR = @pg_num_rows;
            $CL_FR = @pg_fetch_row;
            $CL_FAS = @pg_fetch_assoc;
            $CL_OB = @pg_fetch_object;
        */

         //..DBACCESS...//
        /*
            $CL_Q = @odbc_query;
            $CL_FA = @odbc_fetch_array;
            $CL_NR = @odbc_num_rows;
            $CL_FR = @odbc_fetch_row;
            $CL_FAS = @odbc_fetch_assoc;
            $CL_OB = @odbc_fetch_object;
        */
?>