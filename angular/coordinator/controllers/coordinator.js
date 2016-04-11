var coordinator = angular.module('coordinator',['coordinatorService','studentService']);

coordinator.controller('coordinatorController',function($scope,$rootScope,$window,coordinatorService,studentService){
	$scope.showEdit = false;
	$scope.browsedFile = false;

	$scope.showStudentProgEval = false;

	coordinatorService.getAnnouncements({}).$promise.then(function(res){
		console.log(res);
		$scope.announcements = res;
	});
	

	coordinatorService.companies({}).$promise.then(function(res){
		console.log(res);
		$scope.companies = res;
	});

	coordinatorService.studentAttachedFilesRequest({}).$promise.then(function(res){
		console.log(res);
		$scope.studentFileRequests = res;
	});

	coordinatorService.getAcceptedStudents({}).$promise.then(function(res){
			console.log(res);
			console.log('list of accepted students');
			$scope.acceptedStudents = res;
		

			angular.forEach(res, function(student,i){
				coordinatorService.getEvaluatorName({id: student.evaluator_id}).$promise.then(function(res){
					$scope.acceptedStudents[i].evaluator_name = res[0].firstname + ' ' + res[0].lastname;
				});
			});

			angular.forEach(res, function(student,i){
				coordinatorService.getStudentSched({id: student.student_id}).$promise.then(function(res){
					$scope.acceptedStudents[i].sched = res;
				});
			});
			 
	});
	//revision
	$scope.deleteAnnouncement = function(id) {
		message = 'Are you sure you want to delete this announcement?';
		if(confirm(message))
		{
			coordinatorService.deleteAnnouncement({id: id}).$promise.then(function(res){
				console.log(res);
				window.location = 'announcements';
			});
		}
	}
	
	$scope.checkFile = function(userfile) {
		console.log($scope.browsedFile);
		
			$scope.browsedFile = true;

			console.log($scope.browsedFile);
		
	}

	$scope.showFileApprovalModal = function() {
		$('#fileApprovalModal').modal();
	}
	
	$scope.approveFile = function(id) {
		var ans = confirm('Approve File?');
		if(ans == true) {
			console.log('approved');
			coordinatorService.approveStudentFile({id: id}).$promise.then(function(res){
				console.log(res);
				 $window.location.href = 'http://localhost/cictpracticum/coordinator/home';
			})
		} 
	}

	$scope.rejectFile = function(id) {
		var ans = confirm('Reject File?');
		if(ans == true) {
			console.log('rejects');
			coordinatorService.rejectStudentFile({id: id}).$promise.then(function(res){
				console.log(res);
				 $window.location.href = 'http://localhost/cictpracticum/coordinator/home';
			});
		} 
	}
	$scope.postAnnouncement = function(title,content) {
		
		$scope.announcement = {
			title: title,
			content: content,
			coordinator_id: 1	
		};
		console.log($scope.announcement);
		// alert('asd');
		coordinatorService.postAnnouncement({},$scope.announcement).$promise.then(function(res){
			if(res.response == 'Successfully posted announcement')
			{
				alert('Successfully added announcement');
			}
		

			coordinatorService.getAnnouncements({}).$promise.then(function(res){
				console.log(res);
				$scope.announcements = res;
				$window.location.href = 'http://localhost/cictpracticum/coordinator/announcements';
			});
	
		});
	};

	$scope.showEditAnnouncement = function(title,content,id) {
		$scope.edit_id = id;
		$("#myModal").modal();
		$scope.edited_title = title;
		$scope.edited_content = content;
	}

	$scope.goToCompanyDetails = function(id) {
		console.log(id);
		 $window.location.href = 'http://localhost/cictpracticum/coordinator/company/' + id;
	}	
	$scope.showAddCompany = function() {
		$('#addCompanyModal').modal();
	}

	$scope.addCompany = function() {
		$scope.company_info = {
			company_name: $scope.company_name,
			company_address: $scope.company_address,
			company_contact_no: $scope.company_contact_no,
			company_email: $scope.company_email,
			company_website_url: $scope.company_website_url,
			company_overview: $scope.company_overview
		};
		coordinatorService.addCompany({},$scope.company_info).$promise.then(function(res){
			if(res.response == 'Successfully added company')
			{
				alert('Successfully added company');
				$window.location.href = 'http://localhost/cictpracticum/coordinator/company';
			}
		});
	}

	$scope.updateAnnouncement = function(title,content) {
		$scope.editedAnnouncement = {
			title: title,
			content: content,
			coordinator_id: 1	
		}
		console.log($scope.edit_id);
		console.log($scope.editedAnnouncement);
		coordinatorService.updateAnnouncement({id: $scope.edit_id},$scope.editedAnnouncement).$promise.then(function(res){
			if(res.response == 'Successfully updated announcement')
			{
				alert('Successfully updated announcement');
			}
			studentService.announcements({}).$promise.then(function(res){
				$scope.announcements = res;
				$window.location.href = 'http://localhost/cictpracticum/coordinator/announcements';
			});
		});
		$scope.edit_id = '';
	}	


	$scope.goToStudentDetails = function(student_id,user_id) {
		console.log(student_id + ' ' + user_id);

		 $window.location.href = 'http://localhost/cictpracticum/coordinator/student/' + student_id + '/' + user_id;
	}	
	

	$scope.showEvaluatorName = function(evaluator_id) {
		coordinatorService.getEvaluatorName({id: evaluator_id}).$promise.then(function(res){
			$scope.evaluatorname = res[0].firstname + ' ' + res[0].lastname;
		});
	
	}	

	$scope.goToStudentProgramEvaluationInfo = function(student) {
		coordinatorService.getStudentProgramEvaluationInfo({id: student.student_id, params: student.birthday}).$promise.then(function(res){
			$scope.studentProgEval = res;
			$scope.gradesToBeUpdatedList = [];
			$scope.new_grade = '--';
			
			// $window.location.href = 'http://localhost/cictpracticum/coordinator/program_evaluation';
			$scope.showStudentProgEval = true;
			console.log('info ng student program evaluation');
			console.log(res[0].student_id);
			console.log($scope.showStudentProgEval);
			$scope.showEditGrade = false;
			coordinatorService.getStudentProgramEvaluationCourses({id: student.student_id, params: student.birthday}).$promise.then(function(res){
				$scope.studentProgEvalCourses = res;
				console.log('courses');
				console.log(res);

			});
		});
	}

	$scope.editGrade = function() {
		console.log('asdasd');
		$scope.showEditGrade = !$scope.showEditGrade;
	}

	$scope.addToChangedGrades = function(course,new_grade) {
		$scope.gradeInfo = {
			course_id: course.course_id,
			course_grade: new_grade
		};

		console.log(($scope.findIndex($scope.gradesToBeUpdatedList,'course_id',course.course_id)));
		
		
		
		// iadd since wala pa
		if(($scope.findIndex($scope.gradesToBeUpdatedList,'course_id',course.course_id) == null))
		{
			$scope.gradesToBeUpdatedList.push($scope.gradeInfo);
		}
		//if meron na kunin un index ng meron na irremove sya tapos iadd
		else
		{	
			$scope.indexNaRemove = ($scope.findIndex($scope.gradesToBeUpdatedList,'course_id',course.course_id));
			$scope.gradesToBeUpdatedList.splice($scope.gradesToBeUpdatedList.indexOf($scope.gradesToBeUpdatedList[$scope.indexNaRemove]),1);
			$scope.gradesToBeUpdatedList.push($scope.gradeInfo);
		}

		console.log($scope.gradesToBeUpdatedList);
	}

	//revision
	$scope.saveGrades = function(student) {
		angular.forEach($scope.gradesToBeUpdatedList, function(grades,i){
			coordinatorService.updateStudentProgEvalCourseGrades({id: student.student_id},grades).$promise.then(function(res){
				console.log(res);
				if(i >= ($scope.gradesToBeUpdatedList.length - 1))
				{
					coordinatorService.updateStudentProgEvalStatusAvg({id: student.student_id}).$promise.then(function(res){
						console.log('update student status avg test');
						console.log(res);

						if(res.response == 'Successfully updated status and average')
						{
							coordinatorService.getStudentProgramEvaluationCourses({id: student.student_id,params: student.birthday }).$promise.then(function(res){
									$scope.studentProgEvalCourses = res;
									$scope.showEditGrade = false;
									$scope.showStudentProgEval = true;
									alert("Succesfully updated student's program evaluation");
									$window.location.href = 'http://localhost/cictpracticum/coordinator/assessment';
							});
						}
						
					
					});
		
				}
			});
		});

		

		
	}

	$scope.findIndex = function(arraytosearch, key, valuetosearch) {
 		if(arraytosearch != undefined)
 		{
 			for (var i = 0; i < arraytosearch.length; i++) {
		 
			if (arraytosearch[i][key] == valuetosearch) {
				return i;
			}
			}
			return null;
	 	}
		
	}


	$scope.printReport = function() {
		window.print();
	}
	
});
