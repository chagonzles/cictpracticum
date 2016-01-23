var student = angular.module('student',['studentService']);

student.controller('studentController',function($scope,$rootScope,$window,$location,studentService,$interval){
	$scope.student = {};
	$scope.account = {};
	$scope.status = {};
	$scope.notCS = false;
	$scope.inputType = 'password';
	$scope.toggle = 'Show';
	$scope.civil_status = 'Single';
	$scope.guardian_relationship = 'Father';
	$scope.browsedFile = false;
	$scope.studentCanRegister = true;

	$scope.sheetB = {};
	console.log($scope.inputType);
	$scope.url = $window.location.href;
	$scope.student_id = $scope.url.substr($scope.url.lastIndexOf('/') + 1);

	studentService.getStudentLoggedIn({}).$promise.then(function(res){
			$scope.studentLoggedIn = res.student_id;
			console.log('nakalogin na student ' + $scope.studentLoggedIn);
	});

	studentService.getStudentLoggedInUserId({}).$promise.then(function(res){
			$scope.studentLoggedInUserId = res.user_id;
			console.log('nakalogin na student ' + $scope.studentLoggedInUserId);
	});
	function refreshAnnouncementNotifs()
	{
		studentService.announcements({id: $scope.studentLoggedIn}).$promise.then(function(res){
			console.log(res);
			$scope.announcements = res;
		});
	}	

	$interval(function(){
		refreshAnnouncementNotifs();
	},5000);
	$scope.viewAnnouncement = function(announcement) {
		console.log(announcement);
		$rootScope.title = announcement.title;
		$rootScope.content = announcement.content;
		$scope.url = $window.location.href;
		

		
		// $scope.student_id = $scope.url.substr($scope.url.lastIndexOf('/') + 1);
		$scope.studenta = {
			student_id: $scope.studentLoggedIn
		};
		studentService.seenAnnouncement({id: announcement.announcement_id},$scope.studenta).$promise.then(function(res){
			console.log(res);

			studentService.announcements({id: $scope.studentLoggedIn}).$promise.then(function(res){
				console.log(res);
				$scope.announcements = res;
			});
		});
		$('#announcementDialog').modal();
	}

	studentService.companies({}).$promise.then(function(res){
		console.log(res);
		$scope.companies = res;
	});

	function getAttachedFiles()
	{
		studentService.attachedFiles({id: $scope.studentLoggedInUserId}).$promise.then(function(res){
			console.log(res);
			$scope.attachedfiles = res;
			// console.log($scope.findIndex($scope.attachedfiles,'form_type','Medical Certificate'));
		});
	}
	
	getAttachedFiles();

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

	$scope.checkFile = function(userfile) {
		if(userfile != '')
		{
			$scope.browsedFile = true;
		}
		
	}

	$scope.deleteAttachedFile = function(id) {
		console.log(id);
		var ans = confirm('Delete File?');
		if(ans == true) {
			studentService.deleteAttachedFile({id:id}).$promise.then(function(res){
				console.log(res);
				getAttachedFiles();
			});
		};
		
	}

	// studentService.student({id: })
	// studentService.account({},)

	$scope.url = $window.location.href;
	
	// $scope.student_id = $scope.url.substr($scope.url.lastIndexOf('/') + 1);
	// console.log($scope.student_id);


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

	function formatContactNumber(contact_number)
	{
		formattedContactNo = "(" + contact_number.slice(0,3) + ") " + contact_number.slice(3,6) + "-" + contact_number.slice(6);
		return '+63 ' + formattedContactNo;
	}

	$scope.register = function() {
		console.log($scope.calculateAge($scope.month,$scope.day,$scope.year));
		console.log(formatContactNumber($scope.contact_number));
		if($scope.course == 'Bachelor of Science in Computer Science' && $scope.major == 'Network and Data Communications')
		{
			$scope.no_of_required_hours = 240;
		}
		else if($scope.course == 'Bachelor of Science in Computer Science' && $scope.major == 'Software Development')
		{
			$scope.no_of_required_hours = 360;
		}
		else if($scope.course == 'Bachelor of Science in Information Technology' && $scope.major == 'Net and Web Application')
		{
			$scope.no_of_required_hours = 360;
		}
		else if($scope.course == 'Associate in Technical Graphics')
		{
			$scope.no_of_required_hours = 200;
		}
		
		$scope.student = {
			student_id: $scope.student_id,
			academic_year: $scope.academic_year,
			semester: $scope.semester,
			course: $scope.course,
			major: $scope.major,
			firstname: $scope.firstname,
			lastname: $scope.lastname,
			middle_initial: $scope.middle_initial,
			birthday: $scope.year + '-' + $scope.month + '-' + $scope.day,
			gender: $scope.gender,
			age: $scope.calculateAge($scope.month,$scope.day,$scope.year),
			address: $scope.address,
			email: $scope.email,
			contact_number: formatContactNumber($scope.contact_number),
			user_id: $scope.user_id,
			password: $scope.password,
			no_of_required_hours: $scope.no_of_required_hours,
			no_of_remaining_hours: $scope.no_of_required_hours
		};
		console.log($scope.student);
		studentService.register({},$scope.student).$promise.then(function(res){
			console.log(res.response);
			if(res.response == 'Successfully added new account')
			{
				alert('Successfully registered account');
				$window.location.href = 'http://localhost/cictpracticum/student/profile/' +  $scope.student['student_id'];
			}
		});
	};


	$scope.semester = "2nd Semester";
	$scope.course = "Bachelor of Science in Computer Science";
	$scope.major = "Software Development";
	$scope.gender = "Male";
	$scope.academic_year = "2015-2016";

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

	$scope.checkStudent_ID = function(student_id) {
		$scope.student_idChecking = true;
		studentService.checkStudent_id({id: student_id}).$promise.then(function(res){
			if(res[0] == 1)
			{
				$scope.isstudent_idAvailable = false;
			}
			else
			{
				$scope.isstudent_idAvailable = true;
				studentService.checkAssessedStudentID({id: student_id}).$promise.then(function(res){
					//pwede magregister dahil assessed at ok status
					if(res[0] == 1)
					{
						$scope.studentCanRegister = true;
					}
					//di pwede magregister
					else
					{
						$scope.studentCanRegister = false;
					}
					$scope.student_idChecking = false;
				});
			}
			$scope.student_idChecking = false;
		});


	};

	$scope.checkUser_ID = function(user_id) {
		$scope.user_idChecking = true;
		$scope.submittedUser_id = {
			user_id: user_id
		};
		studentService.checkUser_id({},$scope.submittedUser_id).$promise.then(function(res){
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

	$scope.checkEmail = function(email) {
		$scope.emailChecking = true;
		$scope.submittedEmail  = {
			email: email
		}
		studentService.checkEmail({},$scope.submittedEmail).$promise.then(function(res){
			if(res[0] == 1)
			{
				$scope.isEmailAvailable = false;
			}
			else
			{
				$scope.isEmailAvailable = true;
			}
			$scope.emailChecking = false;
		});
	};


	$scope.goToCompanyDetails = function(id) {
		console.log(id);
		$window.location.href = 'http://localhost/cictpracticum/student/company/' + id;
	}	


	function getSheetBData()
	{
			studentService.personalInfo({}).$promise.then(function(res){
				$scope.sheetB['personal_information'] = res[0];

				$scope.place_of_birth = res[0].place_of_birth;
				$scope.height = res[0].height;
				$scope.weight = res[0].weight;
				
				studentService.familyBackground({}).$promise.then(function(res){
					$scope.sheetB['family_background'] = res;
					studentService.schoolData({}).$promise.then(function(res){
						$scope.sheetB['school_data'] = res;
						console.log($scope.sheetB);
					});
				});
			});
	};

	getSheetBData();
	$scope.getSheetBData = function() {
		getSheetBData();
		console.log('asdasd');
	}
	$scope.updateSheetB = function() {
		
		$scope.personalInfo = {
			height: $scope.height + ' m',
			weight: $scope.weight + ' kg',
			civil_status: $scope.civil_status,
			place_of_birth: $scope.place_of_birth,
			student_id: $scope.student_id
		};
		console.log($scope.student_id);

		$scope.familyBackground = {
			guardian_name: $scope.guardian_name,
			guardian_age: $scope.guardian_age,
			guardian_address: $scope.guardian_address,
			guardian_occupation: $scope.guardian_occupation,
			guardian_relationship: $scope.guardian_relationship,
			guardian_contact_number: $scope.guardian_contact_number
		};
		console.log($scope.personalInfo);
		console.log($scope.familyBackground);
		studentService.addPersonalInfo({},$scope.personalInfo).$promise.then(function(res){
			console.log(res);
			studentService.addFamilyBackground({},$scope.familyBackground).$promise.then(function(res){
				console.log(res);
				alert('Successfully updated');
			});
		});

		
		



	}


	$scope.showNewProgressReport = function() {
		$('#newProgressReportModal').modal();
	}

	



	
});
