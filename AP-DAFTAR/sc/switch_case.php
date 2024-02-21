<?php
                   
            switch(@$sql_escape($_GET['page'])){
                    
            default:
                include"sc/page_01.php";
            break;
                    $cs = @$sql_escape($_GET['page']);
                    $fl = @$sql_escape($_GET['fl']);
            case'$cs':
                include"sc/$fl";
            break;
            
                
        }

?> 