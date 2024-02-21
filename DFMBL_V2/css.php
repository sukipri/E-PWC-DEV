
<head>  
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="../SU_ADMIN/sd/LOAD_BODY.css" rel="stylesheet" type="text/css" />
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="sd/css/materialize.css"  media="screen,projection"/>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="../SU_admin/sd/angular.js"></script>
		<script src="../SU_ADMIN/sd/LOAD_BODY.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title><?php echo "RSPWC"; ?></title>
	<style>
			.pd{padding:1em; position:center;}
			.pdt{padding-top:2em;}
			
		.bgfrst {
		  /* The image used */
		  background-image: url("../../images/H4_new.jpg");

		  /* Full height */
		  height: 100%;

		  /* Center and scale the image nicely */
		  background-position: center;
		  background-repeat: no-repeat;
		  background-size: cover;
		}
	</style>
	<?php include"js_foot.php"; ?>
	<script type="text/javascript" language="JavaScript">
 	function konfirmasi()
	 {
	 	tanya = confirm("Anda yakin ingin membatalkan ?");
	 if (tanya == true) return true;
	 else return false;
 }

 </script>
<script>
 document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('select').formSelect();
  });
      
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.datepicker').datepicker();
  });
</script>
<script> 
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.carousel').carousel();
  });
</script>
<!--Start of Tawk.to Script -->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b500a32df040c3e9e0bb86a/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.collapsible').collapsible();
  });
</script>

</head>
<div class="preloader" style="text-align:center">
                <div class="loading">
                    <img src="../../images/logo_new.png" width="80">
                    <p>Sabar Kunci Kesuksesan.....</p>
                </div>
            </div>