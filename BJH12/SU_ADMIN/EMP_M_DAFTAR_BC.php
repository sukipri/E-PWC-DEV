
<body>
 <div ng-app="myApp" ng-controller="customersCtrl">
    <table  class="table table-striped" width="100%">
      <tr class="table-info">
        <td width="60" align="left">#</td>  
        <td width="260">Nomor</td>
 		<td width="487">Name</td>
        <td width="75">##</td>
      </tr>
      <tr ng-repeat="x in names">
      <td align="left">{{ x.No }}</td>  
      <td align="left">{{ x.Nomor }}</td>  
      <td align="left">{{ x.Nama }}</td>  
      <td align="left">
      	<a href="<?php echo"##?HLM=EMP_M&SUB=EMP_M_EMP&IDEMP={{ x.Nomor }}"; ?>" class="btn btn-danger">Import Data</a>
      </td>
      </tr>

    </table>
     
</div>
 
<script>
var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
   $http.get("GET_EMP.php")
   .then(function (response) {$scope.names = response.data.karyawan;});
});
</script>
</body>

