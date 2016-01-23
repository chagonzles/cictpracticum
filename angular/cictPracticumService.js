var cictPracticumService = angular.module('cictPracticumService',[]);
cictPracticumService.factory('cictPracticumService',['$resource',function($resource) {
return $resource(restUrl + 'Cictpracticum/:action/:id/:params/:params2',{action: '@action', id:'@id',params:'@params',params2:'@params2'},
    {
    	'login_position': {method: 'POST', params: {action: 'login'},isArray: true},
    	'getStudentAssessment': {method: 'GET', params: {action: 'student_assessment'},isArray: true}
    });
}]);

