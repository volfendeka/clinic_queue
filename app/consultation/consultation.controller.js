
angular.module("consultation", ['ui.bootstrap.datetimepicker'])
    .controller('ConsultationCtrl', ['$scope', '$http', 'data', function($scope, $http, data) {
        console.log(moment().format('HH:mm'))
        var urls = {
                get_doctors: 'meeting_backend/doctors/',
            get_specialists: 'meeting_backend/specialists/',
            create_meeting: 'meeting_backend/create/',
        }

        data.getData(urls.get_specialists).then(function(data){
            $scope.profecionals = data.data;
            console.log($scope.profecionals);
        });

        data.getData(urls.get_doctors).then(function(data){
            $scope.doctors = data.data;
            console.log($scope.doctors);
        });

        $scope.onSpecialistSet = function(){
            data.getData(urls.get_doctors, {params:{specialist:$scope.specialist}}).then(function(data){
                $scope.doctors = data.data;
                dateOnSetTime();
            });
        }

        $scope.onDoctortSet = function(){
            console.log($scope.doctor);
        }

        $scope.createMeeting = function(meeting) {
            data.postData(urls.create_meeting, meeting).then(function () {
                console.log('createdddd');
            })
        };




        $scope.dateBeforeRender = dateBeforeRender

        function dateOnSetTime () {
            $scope.$broadcast('date-changed');
        }

        function dateBeforeRender ($dates) {
            var url = 'meeting_backend/doctor_times/?id=1';
            data.getData(url).then(function(data){
                //console.log(data.data);
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
        }
    }]);