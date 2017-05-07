
angular.module("consultation", ['ui.bootstrap.datetimepicker'])
    .controller('ConsultationCtrl', ['$scope', '$http', 'data', function($scope, $http, data) {
        console.log('inside consultation controller');
        data.getData('meeting_backend/').then(function(data){
            $scope.meetings = data.data;
            console.log($scope.meetings);
        });

        $scope.createMeeting = function(meeting) {
            console.log('create');
            data.postData('meeting_backend/create/', meeting).then(function () {
                console.log('createdddd');
            })
        };

        $scope.onTimeSet = function (newDate, oldDate) {
            console.log(newDate);
            console.log(oldDate);
        }


        $scope.endDateBeforeRender = endDateBeforeRender
        $scope.endDateOnSetTime = endDateOnSetTime
        $scope.startDateBeforeRender = startDateBeforeRender
        $scope.startDateOnSetTime = startDateOnSetTime

        function startDateOnSetTime () {
            $scope.$broadcast('start-date-changed');
        }

        function endDateOnSetTime () {
            $scope.$broadcast('end-date-changed');
        }

        function startDateBeforeRender ($dates) {
            if ($scope.dateRangeEnd) {
                var activeDate = moment($scope.dateRangeEnd);

                $dates.filter(function (date) {
                    return date.localDateValue() >= activeDate.valueOf()
                }).forEach(function (date) {
                    date.selectable = false;
                })
            }
        }

        function endDateBeforeRender ($view, $dates) {
            if ($scope.dateRangeStart) {
                var activeDate = moment($scope.dateRangeStart).subtract(1, $view).add(1, 'minute');

                $dates.filter(function (date) {
                    return date.localDateValue() <= activeDate.valueOf()
                }).forEach(function (date) {
                    date.selectable = false;
                })
            }
        }


    }]);