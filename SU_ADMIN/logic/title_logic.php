<?php
		//title
		  $fill = @$sql_escape($_GET['page']);
		   function judul(){
                if(empty($fill)){
                    return"E-PWC";
                }else{
                    
                    return"E-PWC-$fill";
                }
		}
			

?>
