	<?php 
			//All fuction must in here
       		include_once"config/connec_01_srv.php";
				include"secure/GR_01.php"; //security enggine
				 include"sc/ID_IDF.php";  //Identifer ID PAGE
				include"css.php";   //style and control title meta
       			 include"sc/stack_Q.php"; //Query SQL
				  include"sc/code_rand.php";
				   include"config/connec_01_pg.php";
				 include"config/connec_01_mysql.php";
			 	 include"config/connec_01_mysql_oop.php";
				 include"config/connec_01_access.php";
			$get_db = new database();
			$get_db->conek();
			?>