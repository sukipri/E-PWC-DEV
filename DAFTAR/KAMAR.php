
 <?php
	include"config.php"; 
	include"css.php"; 
	?>
	<head>
	</head>
	<body>
	<?php include"MENU.php"; ?>
	<br><br><br>
	<div class="container">
	<ol class="breadcrumb">
  <li class="breadcrumb-item"><i class="fa fa-window-maximize"></i>&nbsp;Info Kamar</li>
</ol>
<div ng-app="myApp" ng-controller="customersCtrl">
<table  class="table table-bordered" width="100%">
	<tr class="info">
	<td width="361">Kamar</td>
	<td width="247">Jumlah</td>
	<td width="221">Terisi</td>
	<td width="241">Kosong</td>
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
   $http.get("GET_ROOM.php")
   .then(function (response) {$scope.names = response.data.daftar;});
});
</script>
<!--  $http.get("layout/gethint_src.php?ID=1004") -->
 </div>
</body>
