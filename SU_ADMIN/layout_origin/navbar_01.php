<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="?">MIX-CODE {B.S}</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-hashtag"></i>&nbsp;Encryption<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		  <!-- ?HLM=[sesuaikan dengan nama file yang disimpan di Layout -->
     <li><a href="<?php echo"?HLM=encrypt"; ?>"><i class="fa fa-terminal"></i>&nbsp;List Encrypt</a></li>
	   </ul>
        </li>
		<!-- second dropdown -->
		       <li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-hashtag"></i>&nbsp;Database<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		  <!-- ?HLM=[sesuaikan dengan nama file yang disimpan di Layout -->
     <li><a href="<?php echo"?HLM=show_mysql"; ?>"><i class="fa fa-terminal"></i>&nbsp;MySQL</a></li>
	 <li><a href="<?php echo"?HLM=pg_query"; ?>"><i class="fa fa-terminal"></i>&nbsp;PostGreSQL</a></li>
	 <li><a href="<?php echo"?HLM=show_sql"; ?>"><i class="fa fa-terminal"></i>&nbsp;SQL SERVER</a></li>
      <li><a href="<?php echo"?HLM=show_access"; ?>"><i class="fa fa-terminal"></i>&nbsp;DbAccess</a></li>
		</ul>
        </li>
		
		<!-- third dropdown -->
		       <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-hashtag"></i>&nbsp;Web Service<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		  <!-- ?HLM=[sesuaikan dengan nama file yang disimpan di Layout -->
	 <li><a href="<?php echo"?HLM=json_get_user"; ?>"><i class="fa fa-terminal"></i>&nbsp;REst</a></li>
	 	 <li><a href="<?php echo"?HLM=rajaongkir"; ?>"><i class="fa fa-terminal"></i>&nbsp;RAJAONGKIR</a></li>

          </ul>
        </li>
		 <!-- fourth -->
               <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-hashtag"></i>&nbsp;SSS(PDO)<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		  <!-- ?HLM=[sesuaikan dengan nama file yang disimpan di Layout -->
     <li><a href="<?php echo"?HLM=view_data_pdo"; ?>"><i class="fa fa-terminal"></i>&nbsp;PDO Mysql</a></li>
      <li><a href="<?php echo"?HLM=view_data_pdo_srv"; ?>"><i class="fa fa-terminal"></i>&nbsp;PDO SQlServer</a></li>
        <li><a href="<?php echo"?HLM=view_data_pdo_pg"; ?>"><i class="fa fa-terminal"></i>&nbsp;PDO PostgreSQL</a></li>
          <li><a href="<?php echo"?HLM=show_S_PRD_srv"; ?>"><i class="fa fa-terminal"></i>&nbsp;S.Procedure SQL SERVER (PDO)</a></li>
           <li><a href="<?php echo"?HLM=show_S_PRD_mysql"; ?>"><i class="fa fa-terminal"></i>&nbsp;S.Procedure MySQL (PDO)</a></li>
		     <li class="divider"></li>
		<li><a href="<?php echo"?HLM=show_OOP_mysql"; ?>"><i class="fa fa-terminal"></i>&nbsp;Input 01(OOP-Mysql)</a></li>
	 </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-hashtag"></i>&nbsp;AI<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		  <!-- ?HLM=[sesuaikan dengan nama file yang disimpan di Layout 
     <li><a href="<?php echo"?HLM=show_js_01"; ?>"><i class="fa fa-terminal"></i>&nbsp;Javascript</a></li>
     <li><a href="<?php echo"?HLM=##"; ?>"><i class="fa fa-terminal"></i>&nbsp;Angular js</a></li>
	 -->
 </ul>
        </li>
        </ul>
         <?php 
			if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){ ?>
         <ul class="nav navbar-nav navbar-right">
        <li><a href="logic/#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-exclamation-circle"></i>&nbsp;Login Access</a>
        <ul class="dropdown-menu" role="menu">
		  <!-- ?HLM=[sesuaikan dengan nama file yang disimpan di Layout -->
     <li><a href="<?php echo"?HLM=s#"; ?>"><i class="fa fa-terminal"></i>&nbsp;Mysql Login</a></li>
     <li><a href="<?php echo"?HLM=SQL_LOGIN"; ?>"><i class="fa fa-terminal"></i>&nbsp;SQL Server Login</a></li>
     <li><a href="<?php echo"?HLM=##"; ?>"><i class="fa fa-terminal"></i>&nbsp;PostGreSQL Login</a></li>
     <li><a href="<?php echo"?HLM=##"; ?>"><i class="fa fa-terminal"></i>&nbsp;DBAccess Login</a></li>
	  <li class="divider"></li>
	   <li><a href="<?php echo"?HLM=ADD_USER_MYSQL"; ?>"><i class="fa fa-terminal"></i>&nbsp;Add User Mysql</a></li>
	   <li><a href="<?php echo"?HLM=ADD_USER_SRV"; ?>"><i class="fa fa-terminal"></i>&nbsp;Add User SQLServer</a></li>
     </ul>
         </li>
      </ul> 
        <?php } else { ?>
         <ul class="nav navbar-nav navbar-right">
        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-exclamation-circle"></i>&nbsp;<?php echo"$_SESSION[namauser]"; ?></a><ul class="dropdown-menu" role="menu">
		  <!-- ?HLM=[sesuaikan dengan nama file yang disimpan di Layout -->
     <li><a href="<?php echo"logic/LOGOUT.php"; ?>"><i class="fa fa-terminal"></i>&nbsp;Log Out</a></li>
    
     </ul>
         </li>
      </ul> 
       <?php } ?>
      
      </ul>
      </div>
  </div>
</nav>