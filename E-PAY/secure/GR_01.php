<?php
/* MYSQL */
	//SQL INJECTION DEFFENDER->
        //$sql_escape = @mysql_real_escape_string;
        $sql_tag = @strip_tags;
        $sql_slash = @addslashes;
		$sql_trim = @trim;
		$sql_html = @htmlentities;
		$sql_char = @htmlspecialchars;
			//full anti injection
			/*
		function sql_full($inject){
			$sql_in = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($inject))));
				return $sql_in;
		}
	
	//ENCRIPTIONS HASHING->
		/* add , ENT_QUOTES to more secure */
		function hs($data_hs){
		$filter_hs = sha1($data_hs); 
		return $filter_hs; 
			} 
			function md($data_md){
		$filter_md = md5($data_md); 
		return $filter_md; 
			} 
		function cr($data_cr){
		$filter_cr = crc32($data_cr); 
		return $filter_cr; 
			} 
		
?>