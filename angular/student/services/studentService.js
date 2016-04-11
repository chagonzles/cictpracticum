var studentService = angular.module('studentService',[]);
studentService.factory('studentService',['$resource',function($resource) {
return $resource(restUrl + 'student/:action/:id/:params/:params2',{action: '@action', id:'@id',params:'@params',params2:'@params2'},
    {
    	'login': {method: 'POST', params: {action: 'login'},isArray: true},
    	'checkStudent_id': {method: 'GET', params: {action: 'check_student_id'}},
        'checkAssessedStudentID': {method: 'GET',params: {action: 'check_assessed_student_id'}},
    	'checkEmail': {method: 'POST', params: {action: 'check_email'}},
    	'checkUser_id': {method: 'POST', params: {action: 'check_user_id'}},
    	'register': {method: 'POST', params: {action: 'index'}},
    	'get': {method: 'GET', params: {action: 'index'}, isArray: true},

    	'announcements': {method: 'GET', params: {action: 'announcements'}, isArray: true},
        'seenAnnouncement': {method: 'PUT', params: {action: 'announcement'}},
        
    	'account': {method: 'POST', params: {action: 'account'}, isArray: true},
    	'student': {method: 'GET', params: {action: 'info'}, isArray: true},

        'company': {method: 'GET', params: {action: 'company'}, isArray: true},
        'companies': {method: 'GET', params: {action: 'companies'},isArray: true},

        'attachedFiles': {method: 'GET', params: {action: 'attached_files'}, isArray: true},
        'deleteAttachedFile': {method: 'DELETE', params: {action: 'attached_file'},isArray: true},

        'personalInfo': {method: 'GET', params: {action: 'view', id: 'sheet_b', params: 'personal_information'}, isArray: true},
        'familyBackground': {method: 'GET', params: {action: 'view', id: 'sheet_b', params: 'family_background'}, isArray: true},
        'schoolData': {method: 'GET', params: {action: 'view', id: 'school_data', params: 'school_data'}, isArray: true},
    	'location': {method: 'POST', params: {action: 'location'}},
        'addPersonalInfo': {method: 'POST', params: {action: 'personal_info'}},
        'addFamilyBackground': {method: 'POST', params: {action: 'family_background'}},

        'getStudentLoggedIn': {method: 'GET', params: {action: 'student_logged_in'}},
        'getStudentLoggedInUserId': {method: 'GET', params: {action: 'student_user_id'}},

        'getStudentInfo': {method: 'GET', params: {action: 'student_info'},isArray: true},
        'submitProgressReport': {method: 'POST', params: {action: 'weekly_progress_report'}},
        'getWeeklyProgressReports': {method: 'GET', params: {action: 'weekly_progress_reports'},isArray: true},


        'editProfile': {method: 'PUT', params: {action: 'student_edit_profile'}}
    });
}]);

