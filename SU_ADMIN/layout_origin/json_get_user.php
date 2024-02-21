<html>
    <body ng-app="myApp" ng-controller="mycontroller">
    	<?php include_once"online_json.php"; ?>
	<hr>
            <script>
                var myapp = angular.module('myApp',[]);
                myapp.controller('mycontroller',function($scope,$http){
                    $http.get('sd/json_user.json')
                    .success(function(response){
                        $scope.data = response.data;
                        });
                    });
                 </script>
            <div class="jumbotron">
                    <h3>VIA JSON (AngularJs)</h3>
                    <ul>
                        <li ng-repeat="tampil in data">
                            {{tampil.idmahasiswa}} - {{tampil.username}} - DECRIBE.BY.SALT - {{tampil.email}}
                        </li>
                        </ul>
                </div>     
				
                <?php include_once"sc/json_01_mhs.php"; ?>
        
    </body>
   </html>