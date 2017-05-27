
angular.module("radiology", ['filters'])
    .controller('RadiologyCtrl', ['$scope', '$http', '$window', '$location', 'data',
        function($scope, $http, $window, $location, data) {
        console.log('inside radiology controller');


            $scope.imageUpload = function(event){
                var files = event.target.files;
                var file = files[files.length-1];
                $scope.file = file;
                var reader = new FileReader();
                reader.onload = $scope.imageIsLoaded;
                reader.readAsDataURL(file);
            }

            $scope.imageIsLoaded = function(e){
                $scope.$apply(function() {
                    $scope.step = e.target.result;
                });
            }


            $scope.isProcessing = false;
            $scope.upload = function(){
                $scope.isProcessing = true;
                var fd = new FormData();

                angular.forEach($scope.files, function(file){
                    fd.append('file', file);
                    fd.append('patient_id', 2);
                    fd.append('doctor_id', 2);
                });
                var request = $http({
                    method : 'POST',
                    url: configs.serviceBack + '/image_backend/upload_image',
                    data : fd,
                    transformRequest:angular.identity,
                    headers:{'Content-Type':undefined}
                });
                request.then(function(response){
                    $scope.read();
                    $scope.isProcessing = false;
                    $scope.msg = response.data;
                    $scope.alert();
                }, function(error){
                    $scope.msg = error.data;
                    $scope.isProcessing = false;
                    $scope.alert();
                });
            }

            $scope.alert = function(){
                $scope.showMsg = true;
            }

            $scope.read = function(){
                var request = $http({
                    method : 'GET',
                    url : configs.serviceBack + '/image_backend',
                });
                request.then(function(response){
                    $scope.pics = response.data;
                }, function(error){
                    alert(error.data);
                });
            }


            angular.element(document).ready(function(){
                $scope.read();
            });
    }
    ]);