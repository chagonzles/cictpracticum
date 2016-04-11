<!--
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->

<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img ng-src="<?= base_url(); ?>/assets/img/user_icon.png" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?= $account[0]->firstname . ' '. $account[0]->lastname  ?>
					</div>
					<div class="profile-usertitle-job">
						<?= $evaluator[0]->evaluator_position ?>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<!-- <div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div> -->
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
					
						<!-- <li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li> -->
						<div class="col-md-12" >
			        		
		                	<h4><b>Company Information</b></h4>
		                	<h5><span><b>Name:</b>  <?= $company[0]->company_name ?></span> </h5>
		                 	<h5><span><b>Address:</b>  <?= $company[0]->company_address ?></span> </h5>
		                 	<h5><span><b>Email:</b>  <?= $company[0]->company_email ?></span> </h5>
		                	<h5><span><b>Email:</b>  <?= $company[0]->company_contact_no ?></span> </h5>
		                	
								
			            
								
 
						</div>
					</ul>


				</div>
				<!-- END MENU -->

				


			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
				<div class="row">
					<div class="col-md-12">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<b>OJT Student List<span class="badge">{{ studentFileRequests.length }}</span> </b>
						</div><!-- panel heading -->
						<div class="panel-body">
							<table class="table table-hover table-responsive" style="background: white">
									<thead>
										<tr>
											<th>
												<button type="button" class="btn btn-default" ng-click="showAddStudent()">Add New Student</button>
											</th>
											<th></th>
											<th></th>
											<th>
												

											</th>
											<th>
											<div class="input-group">
									            <input type="text" class="form-control" placeholder="Search" ng-model="search">
										            <div class="input-group-btn">
										                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
										            </div>
									        	</div>
									        </th>
										</tr>
										<tr>
											<th>Student Name</th>
											<th>Department</th>
											<th>Date Start</th>
											<th>Schedule</th>
											<th></th>
										</tr>
								
									</thead>
									<tbody>
										<tr ng-repeat="student_ojt in students_ojt | filter: search" ng-show="students_ojt.length > 0">
											<td>{{ student_ojt.firstname + ' ' + student_ojt.lastname }}</td>
											<td>{{ student_ojt.division_dept }}</td>
											<td>{{ student_ojt.date_start }}</td>
											<td>
												<div ng-repeat="sched in student_ojt.sched">
													{{ sched.sched_day + ' ' + sched.sched_time }} 
												</div>
											</td>
											<td ng-hide="student_ojt.alreadyEvaluated">
												<button type="button" class="btn btn-primary" ng-click="showEvaluationForm(student_ojt)">Evaluate</button>
											</td>
										
										</tr>
										<tr ng-show="students_ojt.length == 0">
											<td><p>No current OJT Student</p></td>
										</tr>
									</tbody>

								</table>


					    </div><!-- panel body -->
					</div><!-- panel primary -->
				</div><!-- col md 7 -->

			</div><!-- row -->


            </div>
		</div>
	</div>
</div>

<br>
<br>


<div class="modal fade" id="addStudentModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Student</h4>
        </div>
        <div class="modal-body">
             <div class="row">

                      <div class="col-sm-10 col-sm-offset-1">
                        <form role="form" type="POST" name="frmAddStudent" 
                        ng-submit="addStudent()" novalidate>
                           <div class="form-group">
									<label for="" class="control-label"><b>Student Name</b></label>
									<div class="input-group">
										<input type="text" name="student_name" ng-model="student_name" id="" 
										class="form-control" placeholder="Name of the Student" ng-change="clicked = false;clearAll()" 
										autocomplete="off" autocorrect="off" spellcheck="false" required>
										<div class="input-group-addon" ng-click="clearStudentName()"><i class="glyphicon glyphicon-remove"></i></div>
									</div>



									<p class="bg-danger" ng-show="frmAddStudent.student_name.$error.required"><b>Student is required</b></p>
									<p class="bg-danger" ng-show="clicked == false && students.length > 0"><b>You can only add student that are on the list</b></p>
									<p class="bg-danger" ng-show="students.length == 0"><b>No current available ojt student</b></p>
									<div style="background: #F3F3F3">
										<p style="padding: 5px" ng-repeat="student in students | filter: student_name" ng-click="selectStudent(student)" ng-show="student_name.length > 0 && !clicked">
											<b>{{ student.firstname + ' ' + student.lastname }} </b> {{ '(' + student.student_id + ')' }}						
										</p>
									</div>

							</div>

						   <div class="form-group">
                           <label for=""><b>Department</b></label>
                              <input type="text" class="form-control" name="division_dept" ng-model="division_dept" placeholder="Department" required>
                           </div>

                             		<div class="form-group">
										<label for="username" class="control-label"><b>Date Started</b></label>
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
									            	<?php for($yr = 2030; $yr >= 2015; $yr--):?>
										                <option value="<?= $yr;?>"><?= $yr ?></li>
										        	<?php endfor;?>
						            			</select>
										 	</div>
										 </div>
										 <p class="bg-danger" ng-show="frmAddStudent.month.$error.required || 
										 frmAddStudent.day.$error.required || frmAddStudent.year.$error.required">
										 <b>Start Date is required</b>
										 </p>
									</div>
                        
						

                          <div class="form-group">
										<label for="username" class="control-label"><b>Schedule</b></label>
										 <div class="row">
										 	<div class="col-sm-3">
										 		<select name="sched_day" ng-model="sched_day" id="position" class="form-control" required>
									            	<?php foreach ($day_names as $day_name):?>
														<option value="<?= $day_name;?>"><?= $day_name ?></li>
											        <?php endforeach;?>
						            			</select>
										 	</div>

										 	<div class="col-sm-4">
										 		<div class="input-group">
													<input type="time" name="sched_time_start" ng-model="sched_time_start" class="form-control" placeholder="Start Time"
													required >
													
												</div>
						            				
										 	</div>
								
										 	<div class="col-sm-4">
										 		<div class="input-group">
													<input type="time" name="sched_time_end" ng-model="sched_time_end" class="form-control" placeholder="End Time"
													required >
												<!-- 	<div class="input-group-addon">PM</div> -->
												</div>
										 	</div>
												

											<div class="col-sm-1">
												<button type="button" class="btn btn-default" ng-click="addToSched(sched_day,sched_time_start,sched_time_end)">Add</button>
											</div>
										 		
										 	
										 </div>
										 <!-- <p class="bg-danger" ng-show="frmAddStudent.sched_day_start.$error.required || 
										 frmAddStudent.sched_day_end.$error.required">
										 <b>Schedule Day is required</b>
										 </p> -->
							</div>
                        	<div class="row">
                        		<div class="col-sm-12">
                        		<h5>Schedule List</h5>
                        			<div ng-repeat="sched in studentSched">
                        				<b>{{ sched.day }}</b> {{ sched.time }} 
                        				<!-- <button type="button" class="btn btn-primary btn-xs" ng-click="removeToSched(sched.)">Remove</button> -->
                        				<br/> 
                        			</div>
                        		</div>
                        	</div>
                        	
                         
                          <input type="submit" value="Add Student" ng-disabled="frmAddStudent.$invalid || student_id == null || student_id == undefined || student_id == '' || clicked == false" class="btn btn-primary">
                        </form>
                      </div>
                  </div>
        </div>
   
      </div>
      
    </div>
  </div>


























<div class="modal fade" id="evaluateStudentModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Evaluate Student</h4>
	        </div><!-- modal header -->


	        <div class="modal-body">
			

					<div class="row">
					    <div class="col-xs-12">
							<form role="form" type="POST" class="well" ng-submit="evaluateStudent()" name="frmEvaluateStudent" novalidate>
							
							
								<h4>Student Information</h4>
								<hr>
								<div class="row">
									<div class="col-sm-7">
										<div class="form-group">
											<label for="student_name" class="control-label">
												<b>Name</b>
											</label>
											<input type="text" name="student_name" ng-model="student_name" class="form-control" disabled>

										
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-group">
											<label for="age">
												<b>Age</b>
											</label>
											<input type="text" name="age" ng-model="age" class="form-control" disabled>
										</div>
									</div>

									<div class="col-sm-3">
										<label for="gender" class="control-label">
											<b>Gender</b>
										</label>
										<br>
										 <select class="form-control" name="gender" ng-model="gender" style="margin-bottom: 10px" required disabled>
						                    <option value="Male">Male</option>
						                    <option value="Female">Female</option>
						                  </select>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-7">
										<div class="form-group">
										<label for="course" class="control-label">
											<b>Course</b>
										</label>
											<select name="course" ng-model="course" class="form-control" required ng-change="changeMajor(course)" disabled>
						            		<option value="Bachelor of Science in Computer Science">Bachelor of Science in Computer Science</option>
						            		<option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
						            		<option value="Associate in Technical Graphics">Associate in Technical Graphics</option>
					            			</select>
					            			
										</div>
								
									</div>
									<div class="col-sm-5">
											<div class="form-group">
											<label for="major" class="control-label">
												<b>Major</b>
											</label>
											<select name="major" ng-model="major" class="form-control" required disabled>
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
											<label for="permanent_address">
												<b>Permanent Address</b>
											</label>
											<input type="text" name="permanent_address" ng-model="permanent_address" class="form-control" disabled>
										</div>
									</div><!-- col-sm-7 -->

									<div class="col-sm-5">
											<div class="form-group">
												<label for="contact_no">
													<b>Contact Number</b>
												</label>
												<input type="text" name="contact_no" ng-model="contact_no" class="form-control" disabled>
											</div>
									</div><!-- col-sm-5 -->
								</div><!-- row -->

								<div class="row">
									<div class="col-sm-8">
										<div class="form-group">
											<label for="company_assigned">
												<b>Company Assigned</b>
											</label>
											<input type="text" name="company_assigned" ng-model="company_assigned" class="form-control" disabled>
										</div>
									</div><!-- col-sm-9 -->

									<div class="col-sm-4">
										<div class="form-group">
											<label for="no_of_training_hrs">
												<b>No. of Training Hours</b>
											</label>
											<input type="text" name="no_of_training_hrs" ng-model="no_of_training_hrs" class="form-control" disabled>
										</div>
									</div>
								</div><!-- row -->


								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<label for="date_commenced">
												<b>Date Commenced</b>
											</label>
											<input type="text" name="date_commenced" ng-model="date_commenced | date:'MMMM d, yyyy'" class="form-control" disabled>
										</div>
									</div><!-- col-sm-6 -->

									<div class="col-sm-8">
										<div class="form-group">
											<label for="date_completed">
												<b>Date Completed</b>
											</label>
										 	<div class="row">
										 	<div class="col-xs-4">
										 		<select name="date_completed_month" ng-model="date_completed_month" class="form-control" required>
							         
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
										 		<select name="date_completed_day" ng-model="date_completed_day" id="position" class="form-control" required>
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
										 		<select name="date_completed_year" ng-model="date_completed_year" id="position" class="form-control" required>
									            	<?php for($yr = 2030; $yr >= 2015; $yr--):?>
										                <option value="<?= $yr;?>"><?= $yr ?></li>
										        	<?php endfor;?>
						            			</select>
										 	</div>
										 </div>
										 <p class="bg-danger" ng-show="frmEvaluateStudent.date_completed_month.$error.required || 
										 frmEvaluateStudent.date_completed_day.$error.required || frmEvaluateStudent.date_completed_year.$error.required">
										 <b>Date finished is required</b>
										 </p>
									</div>
                        
						
									</div><!-- col-sm-6 -->
								</div><!-- row -->

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
														<td><input type="number" name="knowledge_pts" ng-model="knowledge_pts" min="0" max="20" style="width: 100%" ng-required="true" value="0"></td>
														<td><textarea class="form-control" rows="1" name="knowledge_remarks" ng-model="knowledge_remarks"></textarea></td>
													</tr>
													<tr>
														<td>Productivity</td>
														<td>20</td>
														<td><input type="number" name="productivity_pts" ng-model="productivity_pts" min="0" max="20" style="width: 100%" required></td>
														<td><textarea class="form-control" rows="1" name="productivity_remarks" ng-model="productivity_remarks"></textarea></td>
													</tr>
													<tr>
														<td>Initiative</td>
														<td>15</td>
														<td><input type="number" name="initiative_pts" ng-model="initiative_pts" min="0" max="15" style="width: 100%" required></td>
														<td><textarea class="form-control" rows="1" name="initiative_remarks" ng-model="initiative_remarks"></textarea></td>
													</tr>
													<tr>
														<td>Dedication to Duty</td>
														<td>15</td>
														<td><input type="number" name="dedication_pts" ng-model="dedication_pts" min="0" max="15" style="width: 100%" required></td>
														<td><textarea class="form-control" rows="1" name="dedication_remarks" ng-model="dedication_remarks"></textarea></td>
													</tr>
													<tr>
														<td>Cooperation</td>
														<td>10</td>
														<td><input type="number" name="cooperation_pts" ng-model="cooperation_pts" min="0" max="10" style="width: 100%" required></td>
														<td><textarea class="form-control" rows="1" name="cooperation_remarks" ng-model="cooperation_remarks"></textarea></td>
													</tr>
													<tr>
														<td>Safety & Housekeeping</td>
														<td>10</td>
														<td><input type="number" name="safety_pts" ng-model="safety_pts" min="0" max="10" style="width: 100%" required></td>
														<td><textarea class="form-control" rows="1" name="safety_remarks" ng-model="safety_remarks"></textarea></td>
													</tr>
													<tr>
														<td>Attendance & Punctuality</td>
														<td>10</td>
														<td><input type="number" name="attendance_pts" ng-model="attendance_pts" min="0" max="10" style="width: 100%" required></td>
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
									<div class="col-sm-4">
										<h5><b>Total Points</b></h5>
										<p>{{ knowledge_pts + 
															productivity_pts + initiative_pts + dedication_pts 
															+ cooperation_pts + safety_pts + attendance_pts}}</p>
									</div>
									<div class="col-sm-4">
										<h5><b>Equivalent Grade</b></h5>
										<p>
											{{ getEquivalentGrade() }}
										</p>
									</div>
									<div class="col-sm-4">
										<h5><b>Grade Remarks</b></h5>
										<p>{{ grade_remarks }}</p>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for="comments">Comments and Recommendations for the trainee's future growth</label>
											<textarea name="comments" ng-model="comments" class="form-control" rows="3"></textarea>
										</div>
									</div>
								</div><!-- row comments -->
					
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for="evaluation_by">Evaluated By </label>
											<input type="text" name="evaluated_by" ng-model="evaluated_by" class="form-control" disabled>
										</div>
									</div><!-- col sm 6 -->
									<div class="col-sm-6">
										<div class="form-group">
											<label for="designation">Designation </label>
											<input type="text" name="designation" ng-model="designation" class="form-control" disabled>
										</div>
									</div>
								</div>

								<hr class="colorgraph">
								<div class="row">
									<div class="col-xs-12"><input type="submit" value="Submit Evaluation" class="btn btn-primary btn-block btn-lg" tabindex="7" 
									ng-disabled="frmEvaluateStudent.$invalid"></div>
								</div>
							</form>
						</div>
					</div>

			
	           
	        </div><!-- modal body -->
   
      </div><!-- modal content -->
      
    </div><!-- modal dialog -->
 </div><!-- modal -->








