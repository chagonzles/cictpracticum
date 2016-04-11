var app = angular.module('app',['student','ngResource','studentService','coordinator','coordinatorService',
								'evaluator','evaluatorService','cictPracticumService']);

var restUrl = 'http://localhost/cictpracticum/api/';
var student_id;
var user_id;
app.controller('cictPracticum',function($scope,$rootScope,$window,studentService,coordinatorService,cictPracticumService,evaluatorService){
	$scope.position = 'Student';
	$scope.invalidLogin = false;


	cictPracticumService.getStudentAssessment({}).$promise.then(function(res){
		console.log(res);
		$scope.student_assessment = res;
	});

	studentService.companies({}).$promise.then(function(res){
		console.log(res);
		$scope.companies = res;
	});

	coordinatorService.getStudentProgramEvaluationList({}).$promise.then(function(res){
		console.log('student program evaluation list');
		$scope.student_program_evaluation_list = res;
		console.log(res);
	});

	$scope.selectUser = function() {
		$("#selectUser").modal();
	}
	$scope.login = function() {
		$scope.accountInfo = {
			user_id: $scope.user_id,
			password: $scope.password
		};

		cictPracticumService.login_position({},$scope.accountInfo).$promise.then(function(res){
			console.log(res[0].position);
			if(res[0].position == 'Student')
			{
				studentService.login({},$scope.accountInfo).$promise.then(function(res){
					// if(res.response)
					if(res[0].student_id != undefined)
					{
						console.log(res);
						// userService.getStudentInfo({})
						$rootScope.loggedUser_id = $scope.accountInfo['user_id'];
						console.log($rootScope.loggedUser_id);
						$rootScope.loggedStudent_id = res[0].student_id;
						console.log($rootScope.loggedStudent_id);
						$window.location.href = 'http://localhost/cictpracticum/student/profile/' + res[0].student_id;
						$scope.invalidLogin = false;
					
					}
				
				});
			}

			else if(res[0].position == 'Coordinator')
			{
				coordinatorService.login({},$scope.accountInfo).$promise.then(function(res){
					if(res.coordinator_id != undefined)
					{
						$window.location.href = 'http://localhost/cictpracticum/coordinator/home/';
						$scope.invalidLogin = false;
					}// 
				});
			}

			else if(res[0].position == 'Evaluator')
			{

				evaluatorService.login({},$scope.accountInfo).$promise.then(function(res){
					console.log(res);
					if(res.evaluator_id != undefined)
					{
						$window.location.href = 'http://localhost/cictpracticum/evaluator/home/';
						$scope.invalidLogin = false;
						$rootScope.evaluatorId = res.evaluator_id;
						console.log('evaluator id ' + $rootscope.evaluatorId);
					}// 
				});
			}
			else if(res[0].response == 'Invalid username or password')
			{
				$scope.invalidLogin = true;
			}
		});
	}



	$scope.goToCompanyDetails = function(id) {
		console.log(id);
		$window.location.href = 'http://localhost/cictpracticum/main/company/' + id;
	}	


	$scope.showComposeInquiry = function() {
		$('#composeInquiry').modal();
	}

	//revision
	$scope.goToStudentProgramEvaluationInfo = function(student_id) {
		birthday = $scope.year + '-' + $scope.month + '-' + $scope.day;
		coordinatorService.getStudentProgramEvaluationInfo({id: student_id,params: birthday}).$promise.then(function(res){
			$scope.studentProgEval = res;
			$scope.gradesToBeUpdatedList = [];
			$scope.new_grade = '--';
			
			// $window.location.href = 'http://localhost/cictpracticum/coordinator/program_evaluation';
			if(res.length > 0)
				{
					$scope.showStudentProgEval = true;
					$scope.noStudentData = false;
					coordinatorService.getStudentProgramEvaluationCourses({id: student_id,'params': birthday}).$promise.then(function(res){
						$scope.studentProgEvalCourses = res;
						console.log('courses');
						console.log(res);
						
					});
				}
				else
				{
						console.log('info ng student program evaluation');
						// console.log(res[0].student_id);
						console.log($scope.showStudentProgEval);
						$scope.showEditGrade = false;
						console.log(student_id);
						$scope.noStudentData = true;
				}
		
			
		});
	}

	$scope.clearLogin = function() {
		$scope.student_id = '';
		$scope.month = '';
		$scope.day = '';
		$scope.year = '';
	}


});


