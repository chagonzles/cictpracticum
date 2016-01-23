<div class="container" ng-controller="studentController">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" type="POST" class="well" ng-submit="register()" name="frmRegister" novalidate>
			<h3 class="text-center">Student Registration</h3> 
			
			<h4>Student Status</h4>
			<hr>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="" class="control-label">Student ID</label>
                        <input type="text" name="student_id" class="form-control" placeholder="13-02345" value="13-02345"
                        ng-model="student_id" tabindex="1" ng-minlength="8"
                        maxlength="8" ng-pattern="/^[0-9-]*$/" ng-change="checkStudent_ID(student_id)" required>
						<p class="bg-danger" ng-show="frmRegister.student_id.$error.required"><b>Student ID is required</b></p>
						<p class="bg-danger" ng-show="(frmRegister.student_id.$error.minlength || 
						frmRegister.student_id.$error.pattern || !(student_id.lastIndexOf('-') === 2)) && (frmRegister.student_id.$dirty)"><b>Not a valid student id</b></p>
						<p ng-show="frmRegister.student_id.$dirty && frmRegister.student_id.$valid && isstudent_idAvailable && studentCanRegister && !student_idChecking" class="bg-success">
	                      <b>You are qualified to take your OJT.</b>
	                    </p>
	                    <p ng-show="frmRegister.student_id.$dirty && frmRegister.student_id.$valid && !isstudent_idAvailable && !student_idChecking" class="bg-danger">
	                      <b>Already registered</b>
	                    </p>

	                    <p ng-show="frmRegister.student_id.$dirty && frmRegister.student_id.$valid && isstudent_idAvailable  && !studentCanRegister && !student_idChecking" class="bg-danger">
	                      <b>You are not qualified yet to take OJT</b>
	                    </p>
	                    <p ng-show="student_idChecking" class="bg-warning">
	                      <b>Checking Student ID</b>
	                     </p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label for="academic_year" class="control-label">Academic Year</label>
						<!-- <input type="text" name="academic_year" ng-model="academic_year" class="form-control"
						 placeholder="Academic Year" tabindex="2" ng-pattern="/^[0-9-]*$/"  required> -->

						<select name="academic_year"  class="form-control"  tabindex="2" ng-model="academic_year" class="form-control" required>
		            		<option value="2020-2021">2020-2021</option>
		            		<option value="2018-2019">2018-2019</option>
		            		<option value="2017-2018">2017-2018</option>
		            		<option value="2016-2017">2016-2017</option>
		            		<option value="2015-2016">2015-2016</option>
            			</select>
						<!-- <p class="bg-danger" ng-show="frmRegister.academic_year.$error.required"><b>AY is required</b></p>
						<p class="bg-danger" ng-show="(frmRegister.academic_year.$error.minlength || 
						frmRegister.academic_year.$error.pattern || !(academic_year.lastIndexOf('-') === 4)) && (frmRegister.academic_year.$dirty)"><b>Not a valid AY</b></p> -->
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label for="semester" class="control-label">Semester</label>              
	            		<select name="semester" ng-model="semester" id="semester" class="form-control" required>
	            			<option value="1st Semester">1st Semester</option>
		            		<option value="2nd Semester">2nd Semester</option>
		            		<option value="Summer">Summer</option>
	            		</select>
              			
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-7">
					<div class="form-group">
					<label for="course" class="control-label">Course</label>
						<select name="course" ng-model="course" class="form-control" required ng-change="changeMajor(course)">
	            		<option value="Bachelor of Science in Computer Science">Bachelor of Science in Computer Science</option>
	            		<option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
	            		<option value="Associate in Technical Graphics">Associate in Technical Graphics</option>
            			</select>
            			
					</div>
			
				</div>
				<div class="col-sm-5">
						<div class="form-group">
						<label for="major" class="control-label">Major</label>
						<select name="major" ng-model="major" class="form-control" required ng-disabled="notCS">
						<option value="N/A" ng-show="notCS">N/A</option>
	            		<option value="Software Development">Software Development</option>
	            		<option value="Network and Data Communications">Network and Data Communications</option>
	            		<option value="Net and Web Application" ng-show="notCS">Net and Web Application</option>

            			</select>
            		
					</div>
				</div>
			</div>
			
			<h4>Personal Information</h4>
			<hr>
			<div class="row">
				<div class="col-sm-5">
					<div class="form-group">
						<label for="username" class="control-label">First Name</label>
						<input type="text" name="firstname" ng-model="firstname" class="form-control" 
						placeholder="First Name" tabindex="5" required
						ng-minlength="2" ng-pattern="/^[ a-zA-Z.-]*$/" 
						>

						<p class="bg-danger" ng-show="frmRegister.firstname.$error.required"><b>First Name is required</b></p>
						<p class="bg-danger" ng-show="(frmRegister.firstname.$error.minlength || 
						frmRegister.firstname.$error.pattern) && (frmRegister.firstname.$dirty)"><b>Not a valid first name</b></p>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="form-group">
						<label for="username" class="control-label">Last Name</label>
						<input type="text" name="lastname" ng-model="lastname" class="form-control" placeholder="Last Name" tabindex="6"
						ng-minlength="2" ng-pattern="/^[ a-zA-Z.-]*$/" 
						 required>
						<p class="bg-danger" ng-show="frmRegister.lastname.$error.required"><b>Last Name is required</b></p>
						<p class="bg-danger" ng-show="(frmRegister.lastname.$error.minlength || 
						frmRegister.lastname.$error.pattern) && (frmRegister.lastname.$dirty)"><b>Not a valid last name</b></p>
					
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<label for="username" class="control-label">M. I.</label>
						<input type="text" name="middle_initial" ng-model="middle_initial" class="form-control" 
						placeholder="M.I." tabindex="6" ng-minlength="1" maxlength="4" required
						ng-pattern="/^[ a-zA-Z.-]*$/" >
						<p class="bg-danger" ng-show="frmRegister.middle_initial.$error.required"><b>M.I. is required</b></p>
						<p class="bg-danger" ng-show="(frmRegister.middle_initial.$error.minlength || 
						frmRegister.middle_initial.$error.pattern) && (frmRegister.middle_initial.$dirty)"><b>Not a valid middle initial</b></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-9">
					<label for="username" class="control-label">Birthday</label>
					 <div class="row">
					 	<div class="col-xs-4">
					 		<select name="month" ng-model="month" class="form-control" required>
		            		<!-- <option value="2nd Sem">Jan</option>
		            		<option value="Summer">Feb</option>
		            		<option value="Summer">Mar</option> -->
		            		<?php foreach ($months as $month):?>

									<?php if($monthno < 10): ?>
					                	<option value="<?= '0'. $monthno;?>"><?= $month ?></li>
					            	<?php else: ?>
					            		<option value="<?= $monthno;?>"><?= $month ?></li>
					            	<?php endif ?>
					               
									<?php $monthno = $monthno + 1 ?>
					        <?php endforeach;?>
	            			</select>
	            			
					 	</div>
					 	<div class="col-xs-4">
					 		<select name="day" ng-model="day" id="position" class="form-control" required>
		            			<?php for($i = 1; $i < 32; $i++):?>
		            				<?php if($i < 10): ?>
					                <option value="<?= '0'. $i;?>"><?= $i ?></li>
					            	<?php else: ?>
					            	<option value="<?= $i;?>"><?= $i ?></li>
					            	<?php endif ?>
					            	
					        	<?php endfor;?>
	            			</select>
					 	</div>
					 	<div class="col-xs-4">
					 		<select name="year" ng-model="year" id="position" class="form-control" required>
				            	<?php for($yr = 1996; $yr > 1989; $yr--):?>
					                <option value="<?= $yr;?>"><?= $yr ?></li>
					        	<?php endfor;?>
	            			</select>
					 	</div>
					 </div>
					 <p class="bg-danger" ng-show="frmRegister.month.$error.required || 
					 frmRegister.day.$error.required || frmRegister.year.$error.required">
					 <b>Birthday is required</b>
					 </p>
				</div>
				
				<div class="col-sm-3">
					<label for="username" class="control-label">Gender</label>
					<br>
					 <select class="form-control" name="gender" ng-model="gender" style="margin-bottom: 10px" required>
	                    <option value="Male">Male</option>
	                    <option value="Female">Female</option>
	                  </select>
				</div>
				
			</div>

			<h4>Contact Information</h4>
			<hr>
			<div class="form-group">
					<label for="" class="control-label">Address</label>
					<input type="text" name="address" ng-model="address" id="" class="form-control" placeholder="Address" required>
					<p class="bg-danger" ng-show="frmRegister.address.$error.required"><b>Address is required</b></p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<label for="">Email Address</label>
					<input type="email" name="email" ng-model="email" id="input" class="form-control" 
					placeholder="Email Address" required ng-change="checkEmail(email)">
                  	<p class="bg-danger" ng-show="frmRegister.email.$error.required"><b>Email is required</b></p>
                  	<p class="bg-danger" ng-show="frmRegister.email.$invalid && frmRegister.email.$dirty"><b>Not a valid email address</b></p>
                  	<p ng-show="frmRegister.email.$dirty && frmRegister.email.$valid && isEmailAvailable && !emailChecking" class="bg-success">
                     Email address is available
                  	</p>
                  	<p ng-show="frmRegister.email.$dirty && frmRegister.email.$valid && !isEmailAvailable && !emailChecking" class="bg-error">
                      Email address is not available
                  	</p>
                  	<p ng-show="emailChecking" class="bg-warning">
                      Checking email
                    </p>
				</div>

				<div class="col-sm-6">
					<label for="">Contact Number</label>
					<div class="input-group">
						<div class="input-group-addon">+63</div>
						<input type="tel" name="contact_number" ng-model="contact_number" class="form-control" placeholder="Mobile Number"
						required ng-minlength="10" maxlength="10" ng-pattern="/^[-0-9+]*$/">
					</div>
					<p class="bg-danger" ng-show="frmRegister.contact_number.$error.required"><b>Contact No is required</b></p>
					<p class="bg-danger" ng-show="frmRegister.contact_number.$error.pattern || frmRegister.contact_number.$error.minlength
					 && frmRegister.contact_number.$dirty"><b>Not a valid contact number</b></p>
                  	
				</div>
			</div>

			<h4>Account Information</h4>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					<label for="">UserID</label>
					<input type="text" name="user_id" ng-model="user_id" class="form-control" 
					placeholder="User ID"minlength="4" maxlength="20" ng-pattern="/^[a-zA-Z0-9-._ ]*$/" required ng-change="checkUser_ID(user_id)">
					<p class="bg-danger" ng-show="frmRegister.user_id.$error.required"><b>UserID is required</b></p>
					<p class="bg-danger" ng-show="frmRegister.user_id.$error.minlength"><b>Minimum of 4 characters only</b></p>
					<p class="bg-danger" ng-show="frmRegister.user_id.$error.pattern"><b>Alphanumeric, space,dash, period and underscore is only allowed</b></p>
					<p ng-show="frmRegister.user_id.$dirty && frmRegister.user_id.$valid && isuser_idAvailable && !user_idChecking" class="bg-success">
	                      <b>User ID is available</b>
	                 </p>
	                    <p ng-show="frmRegister.user_id.$dirty && frmRegister.user_id.$valid && !isuser_idAvailable && !user_idChecking" class="bg-danger">
	                      <b>Already registered</b>
	                    </p>
	                    <p ng-show="user_idChecking" class="bg-warning">
	                      <b>Checking User ID</b>
	                    </p>
				</div>

				<div class="col-sm-6">
				<div class="form-group">
					<label for="">Password</label>
					<div class="input-group">
						<input type="{{ inputType }}" name="password" ng-model="password" maxlength="15" class="form-control" placeholder="Password" required>
					<div class="input-group-addon" ng-click="checkPassword(inputType)">{{ toggle }}</div>
					</div>
					</div>
				</div>
			</div>
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7" 
				ng-disabled="frmRegister.$invalid || !isstudent_idAvailable 
				|| !(academic_year.lastIndexOf('-') === 4) || age < 18
				|| !isEmailAvailable || !isuser_idAvailable || !studentCanRegister"
				></div>
			</div>
		</form>
	</div>
</div>

</div>