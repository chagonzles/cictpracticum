<div class="container" ng-controller="evaluatorController">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" type="POST" class="well" ng-submit="registerEvaluator()" name="frmRegisterEvaluator" novalidate>
			<h3 class="text-center">Student Evaluation</h3> 
		
			<h4>Student Information</h4>
			<hr>
			<div class="row">
				<div class="col-sm-7">
					<div class="form-group">
						<label for="username" class="control-label">Name</label>
						<input type="text" name="firstname" ng-model="firstname" class="form-control">

					
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<label for="age">Age</label>
						<input type="text" name="age" ng-model="age" class="form-control">
					</div>
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
		
			<div class="row">
				<div class="col-sm-7">
					<div class="form-group">
						<label for="permanent_address">Permanent Address</label>
						<input type="text" name="permanent_address" ng-model="permanent_address" class="form-control">
					</div>
				</div><!-- col-sm-7 -->

				<div class="col-sm-5">
						<div class="form-group">
							<label for="contact_no">Contact Number</label>
							<input type="text" name="contact_no" ng-model="contact_no" class="form-control">
						</div>
				</div><!-- col-sm-5 -->
			</div><!-- row -->

			<div class="row">
				<div class="col-sm-8">
					<div class="form-group">
						<label for="company_assigned">Company Assigned</label>
						<input type="text" name="company_assigned" ng-model="company_assigned" class="form-control">
					</div>
				</div><!-- col-sm-9 -->

				<div class="col-sm-4">
					<div class="form-group">
						<label for="no_of_training_hrs">No. of Training Hours</label>
						<input type="text" name="no_of_training_hrs" ng-model="no_of_training_hrs" class="form-control">
					</div>
				</div>
			</div><!-- row -->


			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="date_commenced">Date Commenced</label>
						<input type="text" name="date_commenced" ng-model="date_commenced" class="form-control">
					</div>
				</div><!-- col-sm-6 -->

				<div class="col-sm-6">
					<div class="form-group">
						<label for="date_completed">Date Completed</label>
						<input type="text" name="date_completed" ng-model="date_completed" class="form-control">
					</div>
				</div><!-- col-sm-6 -->
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th width="45%">Criteria</th>
									<th width="5%">Max Points</th>
									<th width="5%">Points Scored</th>
									<th width="45%">Remarks</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Knowledge of Work</td>
									<td>20</td>
									<td><input type="number" name="knowledge_pts" ng-model="knowledge_pts" min="0" max="20" style="width: 100%"></td>
									<td><textarea class="form-control" rows="1" name="knowledge_remarks" ng-model="knowledge_remarks"></textarea></td>
								</tr>
								<tr>
									<td>Productivity</td>
									<td>20</td>
									<td><input type="number" name="productivity_pts" ng-model="productivity_pts" min="0" max="20" style="width: 100%"></td>
									<td><textarea class="form-control" rows="1" name="productivity_remarks" ng-model="productivity_remarks"></textarea></td>
								</tr>
								<tr>
									<td>Initiative</td>
									<td>15</td>
									<td><input type="number" name="initiative_pts" ng-model="initiative_pts" min="0" max="15" style="width: 100%"></td>
									<td><textarea class="form-control" rows="1" name="initiative_remarks" ng-model="initiative_remarks"></textarea></td>
								</tr>
								<tr>
									<td>Dedication to Duty</td>
									<td>15</td>
									<td><input type="number" name="dedication_pts" ng-model="dedication_pts" min="0" max="15" style="width: 100%"></td>
									<td><textarea class="form-control" rows="1" name="dedication_remarks" ng-model="dedication_remarks"></textarea></td>
								</tr>
								<tr>
									<td>Cooperation</td>
									<td>10</td>
									<td><input type="number" name="cooperation_pts" ng-model="cooperation_pts" min="0" max="10" style="width: 100%"></td>
									<td><textarea class="form-control" rows="1" name="cooperation_remarks" ng-model="cooperation_remarks"></textarea></td>
								</tr>
								<tr>
									<td>Safety & Housekeeping</td>
									<td>10</td>
									<td><input type="number" name="safety_pts" ng-model="safety_pts" min="0" max="10" style="width: 100%"></td>
									<td><textarea class="form-control" rows="1" name="safety_remarks" ng-model="safety_remarks"></textarea></td>
								</tr>
								<tr>
									<td>Attendance & Punctuality</td>
									<td>10</td>
									<td><input type="number" name="attendance_pts" ng-model="attendance_pts" min="0" max="10" style="width: 100%"></td>
									<td><textarea class="form-control" rows="1" name="attendance_remarks" ng-model="attendance_remarks"></textarea></td>
								</tr>

								<tr>
									<td><b>Total</b></td>
									<td>100</td>
									<td>
										<b>{{ knowledge_pts + 
										productivity_pts + initiative_pts + dedication_pts 
										+ cooperation_pts + safety_pts + attendance_pts}}
										</b>
									</td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div><!-- table responsive -->
				</div><!-- col sm 12 -->
			</div><!-- row table -->

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="comments">Comments and Recommendations for the trainee's future growth</label>
						<textarea name="comments" class="form-control" rows="3"></textarea>
					</div>
				</div>
			</div><!-- row comments -->

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="evaluation_by">Evaluated By </label>
						<input type="text" name="evaluated_by" ng-model="evaluated_by" class="form-control">
					</div>
				</div><!-- col sm 6 -->
				<div class="col-sm-6">
					<div class="form-group">
						<label for="designation">Designation </label>
						<input type="text" name="designation" ng-model="designation" class="form-control">
					</div>
				</div>
			</div>

			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12"><input type="submit" value="Submit Evaluation" class="btn btn-primary btn-block btn-lg" tabindex="7" 
				ng-disabled="frmRegisterEvaluator.$invalid || !isuser_idAvailable"></div>
			</div>
		</form>
	</div>
</div>

</div>