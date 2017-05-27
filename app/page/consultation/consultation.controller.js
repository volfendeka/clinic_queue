
angular.module("consultation", ['ui.bootstrap.datetimepicker'])
    .controller('ConsultationCtrl', ['$scope', '$http', '$window', 'data',
        function($scope, $http, $window, data) {
            var urls = {
                get_doctors: 'meeting_backend/doctors/',
                get_specialists: 'meeting_backend/specialists/',
                create_meeting: 'meeting_backend/create/',
                before_render: 'meeting_backend/doctor_times/?id=',
            };

            data.getData(urls.get_specialists).then(function(data){
                $scope.profecionals = data.data;
            });

            data.getData(urls.get_doctors).then(function(data){
                $scope.doctors = data.data;
            });

            $scope.onSpecialistSet = function(){
                data.getData(urls.get_doctors, {params:{specialist:$scope.specialist}}).then(function(data){
                    $scope.doctors = data.data;
                    dateOnSetTime();
                });
            };

            $scope.onDoctorSet = function(){
                //$scope.meeting.patient_id = $window.sessionStorage.user_id;
            };

            $scope.createMeeting = function(meeting) {
                meeting.patient_id = $window.sessionStorage.user_id;
                data.postData(urls.create_meeting, meeting).then(function () {
                    console.log('createdddd');
                })
            };




            $scope.dateBeforeRender = dateBeforeRender

            function dateOnSetTime () {
                $scope.$broadcast('date-changed');
            }

            function dateBeforeRender ($dates) {
                data.getData($scope.meeting?urls.before_render+$scope.meeting.doctor_id:urls.before_render).then(function(data){
                    var booked_dates = data.data;
                    if (booked_dates) {
                        var booked_times = [];
                        booked_dates.forEach(function (single_date) {
                            booked_times.push(moment(single_date.date_time_meeting))
                        })
                        disable($dates, booked_times)
                    }
                });

            }
            function disable($dates, booked_time) {
                for (var i = 0; i < booked_time.length; i++) {
                    $dates.filter(function (date) {
                        return date.localDateValue() ==  booked_time[i].valueOf()
                    }).forEach(function (date) {
                        date.selectable = false;
                    })
                }
                const todaySinceMidnight = new Date();
                todaySinceMidnight.setUTCHours(0,0,0,0);
                $dates.filter(function (date) {
                    return date.utcDateValue < todaySinceMidnight.getTime();
                }).forEach(function (date) {
                    date.selectable = false;
                });

                $dates.filter(function (date) {
                    return (date.dayOfWeek == 6) || (date.dayOfWeek == 0);
                }).forEach(function (date) {
                    date.selectable = false;
                });
            }
    }]);


