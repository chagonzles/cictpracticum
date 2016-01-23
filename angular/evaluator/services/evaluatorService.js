var evaluatorService = angular.module('evaluatorService',[]);
evaluatorService.factory('evaluatorService',['$resource',function($resource) {
return $resource(restUrl + 'evaluator/:action/:id/:params/:params2',{action: '@action', id:'@id',params:'@params',params2:'@params2'},
    {
    	'login': {method: 'POST', params: {action: 'login'}},
    	'checkStudent_id': {method: 'GET', params: {action: 'check_student_id'}},
    	'checkEmail': {method: 'POST', params: {action: 'check_email'}},
    	'checkUser_id': {method: 'POST', params: {action: 'check_user_id'}},


        'getAllStudents': {method: 'GET', params: {action: 'student_all'},isArray: true},
        'addStudent': {method: 'POST', params: {action: 'add_student'}},
        'getStudentOjt': {method: 'GET', params: {action: 'student_ojt'},isArray: true},
    	
    	'get': {method: 'GET', params: {action: 'index'}, isArray: true},
    	'announcements': {method: 'GET', params: {action: 'announcements'}, isArray: true},
    	'account': {method: 'POST', params: {action: 'account'}, isArray: true},
    	'student': {method: 'GET', params: {action: 'info'}, isArray: true},

        'register': {method: 'POST', params: {action: 'index'}},
        'company': {method: 'GET', params: {action: 'company'}, isArray: true},
        'companies': {method: 'GET', params: {action: 'companies'},isArray: true},
        'addCompany': {method: 'POST', params: {action: 'company'}},

        'addStudentSched': {method: 'POST', params: {action: 'student_sched'}},
        'getStudentSched': {method: 'GET', params: {action: 'student_sched'},isArray: true},

        'getEvaluatorInfo': {method: 'GET', params: {action: 'evaluator'},isArray: true},

        'addEvaluation': {method: 'POST', params: {action: 'evaluation'}},
        'addCriteria': {method: 'POST', params: {action: 'criteria'}},

        'checkIfEvaluated': {method: 'GET',params: {action: 'evaluation'}}
       
    });
}]);

