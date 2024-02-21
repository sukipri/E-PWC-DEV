<?php header("location:../DFMBL_V2/HOME.php"); ?>
<html>
<head>
<title>Pendaftaran Inden Rawat Jalan</title>
<link rel = "stylesheet"
         href = "https://fonts.googleapis.com/icon?family=Material+Icons">
		<link type="text/css" rel="stylesheet" href="css_cv/css/matigo.css"  media="screen,projection"/>
      <script type = "text/javascript"
         src = "two.js"></script>           
      <script src = "three.js">
	   </script> 
      <script type="text/javascript" src="one.js"></script>
      <script>
         $(document).ready(function() {
            $('select').material_select();
         });
      </script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
<style>
html {
    font-family: GillSans, Calibri, Trebuchet, sans-serif;
  }
  .ungu{
	  background-color:#512DA8;
	  
  }
   .indigo{
	  background-color:#212780;
	  
  }
	.txt{ color:#000000;}
	.pdt{padding-top:2em;}
</style>
<script>
$(document).ready(function() {
    M.updateTextFields();
  });
      
</script>

<script type="text/javascript" language="JavaScript">
 	function konfirmasi()
	 {
	 	tanya = confirm("Anda yakin ingin membatalkan ?");
	 if (tanya == true) return true;
	 else return false;
 }

 </script>
</body>
</html>
