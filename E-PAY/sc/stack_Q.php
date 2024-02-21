		<?php
	//List query fuction DML AND DDL
        //List Call Syntax
        	$call_sel = "select * from";
			$call_del = "delete from";   
			$ob = "order by";
			$in = "insert into";
			$sl = "select";
			$dl = "delete";
			$up = "update";
			 /* MYSQL QUERYING 
     		 $call_q = @mysql_query;
       		 $call_fa = @mysql_fetch_array;
       		 $call_nr = @mysql_num_rows;
       		 $call_fr = @mysql_fetch_row;
			$call_fas = @mysql_fetch_assoc;
			$call_fob = @mysql_fetch_object;
			*/
			//$call_c = @mysql_close($con);
			
			
			 /*MYSQLi QUERYING 
     		 $calli_q = @mysqli_query;
       		 $calli_fa = @mysqli_fetch_array;
       		 $calli_nr = @mysqli_num_rows;
       		 $calli_fr = @mysqli_fetch_row;
			$calli_fas = @mysqli_fetch_assoc;
			$calli_fob = @mysqli_fetch_object;
			$calli_c = @mysqli_close($con);
			*/
			
			/*PostgreSQL 
			$pg_q = @pg_query;
       		 $pg_fa = @pg_fetch_array;
       		 $pg_nr = @pg_num_rows;
       		 $pg_fr = @pg_fetch_row;
			$pg_fas = @pg_fetch_assoc;
			$pg_fob = @pg_fetch_object;
		*/
			
		/* SQL SERVER*/
		 	$ms_q = @mssql_query;
       		 $ms_fa = @mssql_fetch_array;
       		 $ms_nr = @mssql_num_rows;
			 
       		 $ms_fr = @mssql_fetch_row;
			$ms_fas = @mssql_fetch_assoc;
			$ms_fob = @mssql_fetch_object;
			
			
		/* DBAccess
		 	$ac_q = @odbc_exec;
       		 $ac_fa = @odbc_fetch_array;
       		 $ac_nr = @odbc_num_rows;
       		 $ac_fr = @odbc_fetch_row;
			$ac_fob = @odbc_fetch_object;
			*/
		?>
			 
			 