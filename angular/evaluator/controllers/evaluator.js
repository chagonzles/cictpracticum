var evaluator = angular.module('evaluator',['evaluatorService']);

evaluator.controller('evaluatorController',function($scope,$rootScope,$window,$location,evaluatorService,$interval){
	$scope.account = {};
	$scope.inputType = 'password';
	$scope.toggle = 'Show';
	$scope.gender = "Male";
	$scope.clicked = false;
	$scope.studentSched = [];
	$scope.alreadyEvaluated = false;

	console.log($scope.inputType);


	evaluatorService.getEvaluatorInfo().$promise.then(function(res){
		$scope.designation = res[0].evaluator_position;
		$scope.evaluated_by = res[0].firstname + ' ' + res[0].lastname;
	});

	evaluatorService.companies({}).$promise.then(function(res){
		$scope.companies = res;
	});

	evaluatorService.getAllStudents({}).$promise.then(function(res){
		$scope.students = res;
	});

	evaluatorService.getStudentOjt({}).$promise.then(function(res){
		console.log(res);
		$scope.students_ojt = res;
		angular.forEach(res, function(student,i){
			evaluatorService.getStudentSched({id: student.student_id}).$promise.then(function(res){
				$scope.students_ojt[i].sched = res;
			});
		});

		angular.forEach(res, function(student,i){
			evaluatorService.checkIfEvaluated({id: student.student_id}).$promise.then(function(res){
				if(res.response == 'Already evaluated')
				{
					$scope.students_ojt[i].alreadyEvaluated = true;
				}
				else
				{
					$scope.students_ojt[i].alreadyEvaluated = false;
				}
			});	
		})

	});

	

	$scope.selectCompany = function(company) {
		$scope.company_id = company.company_id;
		$scope.company_name = company.company_name;
		$scope.company_address = company.company_address;
		$scope.company_email = company.company_email;
		$scope.company_contact_no = company.company_contact_no;
		$scope.company_overview = company.company_overview;
		$scope.company_website_url = company.company_website_url;
		$scope.clicked = true;
	};

	$scope.clearCompanyName = function() {
		$scope.company_name = '';
		$scope.company_id = '';
	}

	


	function getStudentOjt()
	{
		evaluatorService.getStudentOjt({}).$promise.then(function(res){
		console.log(res);
		$scope.students_ojt = res;
			angular.forEach(res, function(student,i){
				evaluatorService.getStudentSched({id: student.student_id}).$promise.then(function(res){
					$scope.students_ojt[i].sched = res;
				});
			});

		});
	}

	$scope.showAddStudent = function() {
		$scope.studentSched = [];
		$scope.studentSchedNo = 0;
		if($scope.students.length > 0 && angular.isArray($scope.students))
		{

			$('#addStudentModal').modal();
		}
		else
		{
			alert("There's no available student for OJT");
		}
		
	}

	$scope.selectStudent = function(student) {
		$scope.student_id  = student.student_id;
		$scope.student_name = student.firstname + ' ' + student.lastname + ' (' + student.student_id + ')';
		$scope.clicked = true;
		console.log($scope.student_id);
	};

	$scope.addStudent = function() {
		$scope.student_info = {
			division_dept: $scope.division_dept,
			date_start: $scope.year + '-' + $scope.month + '-' + $scope.day,
			sched_day: $scope.sched_day_start + ' - ' + $scope.sched_day_end,
			sched_time: $scope.sched_time_start + ' AM ' + ' - ' + $scope.sched_time_end + ' PM',
			student_id: $scope.student_id
		};
		console.log($scope.student_info);
		evaluatorService.addStudent({},$scope.student_info).$promise.then(function(res){
			if(res.response == 'Successfully added new student')
			{
				angular.forEach($scope.studentSched, function(sched,i){
					evaluatorService.addStudentSched({id: $scope.student_id},sched).$promise.then(function(res){
						console.log(res);
					});
				});
				alert('Successfully added new student');
				getStudentOjt();
				$('#addStudentModal').modal('hide');
				$scope.student_id = '';
			}
		});
		
	}

	$scope.clearAll = function() {

		if($scope.student_name == undefined || $scope.student_name == '')
		{
			$scope.student_name = '';
		}
	}

	$scope.clearStudentName = function()
	{
		$scope.student_name = '';
	}

	$scope.calculateAge = function(birthMonth, birthDay, birthYear) {
	   var currentDate = new Date();
	   var currentYear = currentDate.getFullYear();
	   var currentMonth = currentDate.getMonth();
	   var currentDay = currentDate.getDate();  
	   age = currentYear - birthYear;

	   if (currentMonth < birthMonth - 1) {
	      age--;
	   }
	   if (birthMonth - 1 == currentMonth && currentDay < birthDay) {
	      age--;
	   }
	   return age;
	}



	$scope.registerEvaluator = function() {
		// console.log($scope.calculateAge($scope.month,$scope.day,$scope.year));
		console.log($scope.company_website_url);
		if($scope.clicked == false)
		{
			$scope.company_id = '';
		}
		$scope.evaluator_account = {
			firstname: $scope.firstname,
			lastname: $scope.lastname,
			middle_initial: $scope.middle_initial,
			birthday: $scope.year + '-' + $scope.month + '-' + $scope.day,
			gender: $scope.gender,
			user_id: $scope.user_id,
			password: $scope.password,
			evaluator_position: $scope.evaluator_position,
			position: 'Evaluator'
		};

		if($scope.company_id == undefined || $scope.company_id == '')
		{
			$scope.evaluator_company = {
				company_name: $scope.company_name,
				company_address: $scope.company_address,
				company_contact_no: $scope.company_contact_no,
				company_email: $scope.company_email,
				company_website_url: $scope.company_website_url,
				company_overview: $scope.company_overview
			};
			evaluatorService.addCompany({},$scope.evaluator_company).$promise.then(function(res){
		
				$scope.evaluator_account.company_id = res.company_id;
				console.log($scope.evaluator_account.company_id);

					evaluatorService.register({},$scope.evaluator_account).$promise.then(function(res){
						console.log(res.response);
						if(res.response == 'Successfully added new evaluator')
						{
							alert('Successfully registered account');
							$window.location.href = 'http://localhost/cictpracticum/evaluator/home';
						}
					});

			});
		}
		//ok
		else
		{
			console.log('company_id' + $scope.company_id);
			$scope.evaluator_account.company_id = $scope.company_id;

			evaluatorService.register({},$scope.evaluator_account).$promise.then(function(res){
					console.log(res.response);
					if(res.response == 'Successfully added new evaluator')
					{
						alert('Successfully registered account');
						$window.location.href = 'http://localhost/cictpracticum/evaluator/home';
					}
			});
		}
		console.log($scope.company_id);




	};



	$scope.checkPassword = function() {
		if($scope.inputType == 'text')
		{
			$scope.inputType = 'password';
			$scope.toggle = 'Show';
			
		} 
		else if($scope.inputType == 'password')
		{
			$scope.inputType = 'text';
			$scope.toggle = 'Hide';

		}
		console.log($scope.inputType);
	}



	$scope.checkUser_ID = function(user_id) {
		$scope.user_idChecking = true;
		$scope.submittedUser_id = {
			user_id: user_id
		};
		evaluatorService.checkUser_id({},$scope.submittedUser_id).$promise.then(function(res){
			if(res[0] == 1)
			{
				$scope.isuser_idAvailable = false;
			}
			else
			{
				$scope.isuser_idAvailable = true;
			}
			$scope.user_idChecking = false;
		});
	};

	
	$scope.addToSched = function(day,start_time,end_time) {
		// $scope.studentSchedNo += 1;
		end_time_una = parseInt(String(end_time).substr(16,2)) - 12;
		if(end_time_una < 10)
		{
			end_time_una = '0' + end_time_una;
		}
		$scope.sched = {
			day: day,
			time: String(start_time).substr(16,5) + 'AM' + ' - ' + end_time_una + String(end_time).substr(18,3) + 'PM'
		};
		$scope.studentSched.push($scope.sched);
		console.log($scope.studentSched);
	}

	// $scope.removeToSched = function(day,time,index) {
	// 	console.log(day + ' ' + time);
	// 	$scope.studentSched.splice($scope.studentSched.indexOf(index),1); 
	// }

	$scope.course = "Bachelor of Science in Computer Science";
	$scope.major = "Software Development";
	$scope.gender = "Male";


	$scope.changeMajor = function(course) {
		if(course == "Bachelor of Science in Information Technology")
		{
			$scope.major = "Net and Web Application";
			$scope.notCS = true;
		}
		else if(course == "Bachelor of Science in Computer Science")
		{
			$scope.major = "Software Development";
			$scope.notCS = false;
		}
		else if(course == "Associate in Technical Graphics")
		{
			$scope.major = "N/A";
			$scope.notCS = true;
		}
	}


	$scope.showEvaluationForm = function(student) {
		$('#evaluateStudentModal').modal();
		$scope.student_name = student.firstname + ' ' + student.lastname;
		$scope.student_id = student.student_id;
		$scope.gender = student.gender;
		$scope.course = student.course;
		$scope.major = student.major;
		$scope.permanent_address = student.address;
		$scope.contact_no = student.contact_number;
		$scope.company_assigned = student.company_name;
		$scope.no_of_training_hrs = student.no_of_remaining_hours;
		$scope.date_commenced = student.date_start;
		$scope.age = student.age;
		$scope.knowledge_pts = 0;
		$scope.productivity_pts = 0;
		$scope.initiative_pts = 0;
		$scope.dedication_pts = 0;
		$scope.cooperation_pts = 0;
		$scope.safety_pts = 0;
		$scope.attendance_pts = 0;
	}
	

	$scope.getEquivalentGrade = function() {
		$scope.total = $scope.knowledge_pts + $scope.productivity_pts + $scope.initiative_pts +
						 $scope.dedication_pts + $scope.cooperation_pts + 
						 $scope.safety_pts + $scope.attendance_pts;

		if($scope.total >= 98)
		{
			$scope.equivalent_grade = 1.00;
			$scope.grade_remarks = 'Excellent';
			return '1.00';
		}
		else if($scope.total <= 97 && $scope.total >= 95)
		{
			$scope.equivalent_grade = 1.25;
			$scope.grade_remarks = 'Very Good';
			return '1.25';
		}
		else if($scope.total <= 94 && $scope.total >= 92)
		{
			$scope.equivalent_grade = 1.50;
			$scope.grade_remarks = 'Very Good';
			return '1.50';
		}
		else if($scope.total <= 91 && $scope.total >= 89)
		{
			$scope.equivalent_grade = 1.75;
			$scope.grade_remarks = 'Very Good';
			return '1.75';
		}
		else if($scope.total <= 88 && $scope.total >= 86)
		{
			$scope.equivalent_grade = 2.00;
			$scope.grade_remarks = 'Good';
			return '2.00';
		}
		else if($scope.total <= 85 && $scope.total >= 83)
		{
			$scope.equivalent_grade = 2.25;
			$scope.grade_remarks = 'Good';
			return '2.25';
		}
		else if($scope.total <= 82 && $scope.total >= 80)
		{
			$scope.equivalent_grade = 2.50;
			$scope.grade_remarks = 'Fair';
			return '2.50';
		}
		else if($scope.total <= 79 && $scope.total >= 77)
		{
			$scope.equivalent_grade = 2.75;
			$scope.grade_remarks = 'Passed';
			return '2.75';
		}
		else if($scope.total <= 76 && $scope.total >= 75)
		{
			$scope.equivalent_grade = 3.00;
			$scope.grade_remarks = 'Passed';
			return '3.00';
		}
		else if($scope.total <= 74 && $scope.total >= 72)
		{
			$scope.equivalent_grade = 4.00;
			$scope.grade_remarks = 'Conditional';
			return '4.00';
		}
		else if($scope.total <= 71)
		{
			$scope.equivalent_grade = 5.00;
			$scope.grade_remarks = 'Failed';
			return '5.00';
		}
	
	}


	$scope.evaluateStudent = function() {
		$scope.coa = {
			date_completed: $scope.date_completed_year + '-' + ($scope.date_completed_month - 12) + '-' + $scope.date_completed_day
		}

		$scope.criteria = [
			{
				criteria_name: 'Knowledge of Work',
				points_scored: $scope.knowledge_pts,
				remarks: $scope.knowledge_remarks
			},
			{
				criteria_name: 'Productivity',
				points_scored: $scope.productivity_pts,
				remarks: $scope.productivity_remarks
			},
			{
				criteria_name: 'Initiative',
				points_scored: $scope.initiative_pts,
				remarks: $scope.initiative_remarks
			},
			{
				criteria_name: 'Dedication to Duty',
				points_scored: $scope.dedication_pts,
				remarks: $scope.dedication_remarks
			},
			{
				criteria_name: 'Cooperation',
				points_scored: $scope.cooperation_pts,
				remarks: $scope.cooperation_remarks
			},
			{
				criteria_name: 'Safety & Housekeeping',
				points_scored: $scope.safety_pts,
				remarks: $scope.safety_remarks
			},
			{
				criteria_name: 'Attendance & Punctuality',
				points_scored: $scope.attendance_pts,
				remarks: $scope.attendance_remarks
			}

		];

		$scope.total_pts = $scope.knowledge_pts + $scope.productivity_pts + $scope.initiative_pts +
						 $scope.dedication_pts + $scope.cooperation_pts + 
						 $scope.safety_pts + $scope.attendance_pts;
		console.log($scope.equ)

		$scope.evaluation = {
			student_id: $scope.student_id,
			date_commenced: $scope.date_commenced,
			date_completed: $scope.coa['date_completed'],
			comments: $scope.comments,
			total_points: $scope.total_pts,
			grade: $scope.equivalent_grade,
			equivalent: $scope.grade_remarks
		};

		evaluatorService.addEvaluation({},$scope.evaluation).$promise.then(function(res){
			console.log('successfully evaluated')
			console.log(res);
			angular.forEach($scope.criteria, function(criteria,index){
				evaluatorService.addCriteria({id: res.evaluation_id},criteria).$promise.then(function(res){
					console.log(res);
				});
				
			});

			alert('Successfully evaluated student');
			$('#evaluateStudentModal').modal('hide');

		});

	};

	refreshProgressReportNotifs();

	$interval(function(){
		refreshProgressReportNotifs();
	},5000);

	function refreshProgressReportNotifs()
	{
		evaluatorService.getWeeklyProgressReports({}).$promise.then(function(res){
			$scope.weekly_progress_reports = res;
		});
	}

	$scope.viewWeeklyProgressReport = function(id) {
		$window.location.href = 'http://localhost/cictpracticum/evaluator/weekly_progress_reports/' + id;
	}

	$scope.submitProgressReport = function() {
		$scope.url = $window.location.href;
		$scope.weekly_report_id = $scope.url.substr($scope.url.lastIndexOf('/') + 1);
		$scope.progress_report = {
			comments: $scope.comments,
			task_completed: $scope.task_completed,
			date_filled_up_by_eval: moment().format('YYYY-MM-DD'),
			approved_by_evaluator: 1,
			seen_by_evaluator: 1
		};
		console.log($scope.progress_report);
		console.log($scope.weekly_report_id);
		evaluatorService.updateWeeklyProgressReport({id: $scope.weekly_report_id },$scope.progress_report).$promise.then(function(res){
			if(res.response == 'Successfully updated progress report')
			{
				alert('Successfully submitted progress report');
				$window.location.href = 'http://localhost/cictpracticum/evaluator/home';
			}
		});
	}

});
