	<?php 
		
			include"config02.php";
			include"css.php";
	?>
<body>
		<?php include"MENU.php"; ?>
		 <nav>
    <div class="nav-wrapper blue accent-2">
	   <ul>
      <li><a href="#!!"><b>Info Kamar</b></a></li>
      </ul>
	  </div>
  </nav>
<div ng-app="myApp" ng-controller="customersCtrl">
<table  class="striped" width="100%">
	<tr>
	<td  bgcolor="#9DDFFF" width="730">Kamar</td>
	<td width="138" bgcolor="#9DDFFF">Tmp</td>
	<td width="90" bgcolor="#9DDFFF">Isi</td>
	<td width="108" bgcolor="#9DDFFF">Ksg</td>
	</tr>
  <tr ng-repeat="x in names">
    <td>{{ x.Kamar }}</td>
    <td align="center">{{ x.Tampung }}</td>  
	<td align="center">{{ x.Terisi }}</td> 
	<td align="center">{{ x.Kosong }}</td> 
  </tr>
</table>
 
</div>
 
<script>
var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
   $http.get("../DAFTAR/GET_ROOM.php")
   .then(function (response) {$scope.names = response.data.daftar;});
});
</script>
<!--  $http.get("layout/gethint_src.php?ID=1004") -->
 </div>
</body>
