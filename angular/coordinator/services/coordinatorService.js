var coordinatorService = angular.module('coordinatorService',[]);
coordinatorService.factory('coordinatorService',['$resource',function($resource) {
return $resource(restUrl + 'coordinator/:action/:id/:params',{id:'@id',params:'@params'},
    {
    	'login': {method: 'POST', params: {action: 'login'}},
        'getAnnouncements': {method: 'GET', params: {action: 'announcements'},isArray: true},
    	'postAnnouncement': {method: 'POST', params: {action: 'announcement'}},
    	'updateAnnouncement': {method: 'PUT', params: {action: 'announcement'}},
        //revision
        'deleteAnnouncement': {method: 'DELETE', params: {action: 'announcement'}},

    	'company': {method: 'GET', params: {action: 'company'}, isArray: true},
    	'companies': {method: 'GET', params: {action: 'companies'},isArray: true},

        'getNewCompanies': {method: 'GET', params: {action: 'new_companies'},isArray: true},
        
    	'addCompany': {method: 'POST', params: {action: 'company'}},
    	'checkEmail': {method: 'POST', params: {action: 'check_email'}},
    	'checkUser_id': {method: 'POST', params: {action: 'check_user_id'}},
    	'register': {method: 'POST', params: {action: 'index'}},
    	'get': {method: 'GET', params: {action: 'index'}, isArray: true},

        'studentAttachedFilesRequest': {method: 'GET', params: {action: 'student_attached_file'}, isArray: true},
        'approveStudentFile': {method: 'PUT', params: {action: 'approveStudentFile'}},
        'rejectStudentFile': {method: 'PUT', params: {action: 'rejectStudentFile'}},

        'getAcceptedStudents': {method: 'GET', params: {action: 'acceptedstudents'}, isArray: true},
        'getEvaluatorName': {method: 'GET', params: {action: 'evaluator'}, isArray: true},
        'getStudentSched': {method: 'GET', params: {action: 'student_sched'}, isArray: true},


        'getStudentProgramEvaluationList': {method: 'GET', params: {action: 'student_program_evaluation_list'}, isArray: true},
        'getStudentProgramEvaluationInfo': {method: 'GET', params: {action: 'student_program_evaluation_info'}, isArray: true},
        'getStudentProgramEvaluationCourses': {method: 'GET', params: {action: 'student_program_evaluation_courses'}, isArray: true},
        'updateStudentProgEvalCourseGrades': {method: 'PUT', params: {action: 'student_program_evaluation_course_grade'}},
        'updateStudentProgEvalStatusAvg': {method: 'PUT',params: {action: 'student_prog_eval_status_avg'}}
    });
}]);

