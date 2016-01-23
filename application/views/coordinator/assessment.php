<div class="container" ng-show="!showStudentProgEval">
	<div class="row">
		<h1>Assessment</h1>

		<!--  <?php echo form_open_multipart('coordinator/do_upload');?> -->
		<!--  <div class="col-sm-3">
		 	
              <input type="text" name="student_id" class="form-control" ng-model="student_id" placeholder="Student ID of the student">

		 </div> -->
                       <!--      <div class="col-sm-3">
                                <input type="file" ng-model="userfile" name="userfile" class="btn btn-default btn-sm" size="200"
                                onchange="angular.element(this).scope().checkFile(userfile)"
                                />
                                <p class="form-error">.xls file is only allowed</p>
                            </div>
                           
                            <div class="col-sm-3">
                                 <input type="submit" class="btn btn-primary pull-right" 
                                 value="Upload Form" ng-disabled="!browsedFile"></input>
                                 <input type="submit" class="btn btn-primary pull-left" 
                                 value="Upload Assessment"></input>
                            </div>

                            </form> -->

	<table class="table table-hover table-responsive" style="background: white">
			<thead>
				<tr>
					<th>
		
					</th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
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
					<th>Student ID</th>
					<th>Last Name</th>
					<th>First Name</th>
					<th>Middle Name</th>
					<th>Year and Section</th>
					<th>Average</th>
					<th>Status</th>
				</tr>
		
			</thead>
			<tbody>
				<tr ng-repeat="s in student_program_evaluation_list | filter: search" ng-click="goToStudentProgramEvaluationInfo(s)">
					<td>{{ s.student_id }}</td>
					<td>{{ s.student_lname }}</td>
					<td>{{ s.student_fname }}</td>
					<td>{{ s.student_mname }}</td>
					<td>{{ s.yr_section }}</td>
					<td>{{ s.avg_grade }}</td>
					<td>{{ s.status }}</td>
				</tr>
			</tbody>

		</table>






















	</div>
</div>

<!-- student program evaluation form -->
<div class="container" ng-show="showStudentProgEval">

<br>
	<div class="row">
		<div class="col-sm-12">
			<button type="button" class="btn btn-default" ng-click="showStudentProgEval = false">
				<span class="glyphicon glyphicon-arrow-left"></span>  Back to List
			</button>

			<div class="pull-right">
				<button type="button" class="btn btn-primary" ng-click="editGrade()">
					<span ng-if="!showEditGrade"><span class="glyphicon glyphicon-pencil"></span> Edit</span>
					<span ng-if="showEditGrade"><span class=" glyphicon glyphicon-remove"></span> Cancel</span>
				</button>
				<button type="button" class="btn btn-default" ng-disabled="!showEditGrade" ng-click="saveGrades(studentProgEval[0].student_id)">
					<span class="glyphicon glyphicon-floppy-disk"></span> Save
				</button>
						
			</div>

		</div>
	</div>
	<br>
	<div class="row" style="background: #ffffff">

		<div class="col-sm-12">
			<br>

			<div class="row">

				<div class="col-sm-6">
					
						<h4><b>Student Name: </b>
						{{ studentProgEval[0].student_lname + ', ' 
						 + studentProgEval[0].student_fname + ' ' + studentProgEval[0].student_mname
						 + ' [' + studentProgEval[0].student_id + ']'
						 }}

						</h4> 
					 <h4>
						 <b>Year & Section: </b>
						 {{ studentProgEval[0].yr_section }} 
					 </h4>
				</div><!-- left col 6 student info -->
				<div class="col-sm-6">
					<div class="pull-left">
						<h4><b>Average Grade: </b>
						{{ studentProgEval[0].avg_grade }}
						</h4>

						<h4><b>Status: </b>
						{{ studentProgEval[0].status }}
						</h4>
					</div>
					
					
				</div>
			</div><!-- row student info -->
		

			<div class="row">
				<div class="col-md-6">
					<table class="table table-striped">
						<h5 class="text-center programEvalHeading"><b>1st Year - 1st Semester</b></h5>
						<thead>
							<tr>
								<th>Grade</th>
								<th>Course Code</th>
								<th>Couse Title</th>
								<th>Lec</th>
								<th>Lab</th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="course in studentProgEvalCourses | limitTo: 10">
								<td>
									
									<b ng-hide="course.course_grade == 'INC' || course.course_grade == 'DRP' || course.course_grade == '5.00'">{{ course.course_grade }}</b>
									<b ng-show="(course.course_grade == 'INC' || course.course_grade == 'DRP' || course.course_grade == '5.00')" style="color: red">
										{{ course.course_grade }}
									</b>
								
										<select name="new_grade" ng-model="new_grade" 
										ng-show="showEditGrade && (course.course_grade == 'INC' || course.course_grade == 'DRP' || course.course_grade == '5.00')" 
										ng-change="addToChangedGrades(course,new_grade)">
											<option value="{{ course.course_grade }}">{{ course.course_grade }}</option>
											<option value="1.00">1.00</option>
											<option value="1.25">1.25</option>
											<option value="1.50">1.50</option>
											<option value="1.75">1.75</option>
											<option value="2.00">2.00</option>
											<option value="2.25">2.25</option>
											<option value="2.50">2.50</option>
											<option value="2.75">2.75</option>
											<option value="3.00">3.00</option>
										</select>
								
									
								</td>
								<td>{{ course.course_code }}</td>
								<td>{{ course.course_title }}</td>
								<td>{{ course.course_unit_lec }}</td>
								<td>{{ course.course_unit_lab }}</td>
							</tr>
						</tbody>
					</table>
				</div><!-- 1st sem -->


				<div class="col-md-6">
					<table class="table table-striped">
						<h5 class="text-center programEvalHeading"><b>1st Year - 2nd Semester</b></h5>
						<thead>
							<tr>
								<th>Grade</th>
								<th>Course Code</th>
								<th>Couse Title</th>
								<th>Unit (Lec)</th>
								<th>Unit (Lab)</th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="course in studentProgEvalCourses | limitTo: 19" ng-if="$index > 9">
								<td>
									
									<b ng-hide="course.course_grade == 'INC' || course.course_grade == 'DRP' || course.course_grade == '5.00'">{{ course.course_grade }}</b>
									<b ng-show="(course.course_grade == 'INC' || course.course_grade == 'DRP' || course.course_grade == '5.00')" style="color: red">
										{{ course.course_grade }}
									</b>
								
										<select name="new_grade" ng-model="new_grade" 
										ng-show="showEditGrade && (course.course_grade == 'INC' || course.course_grade == 'DRP' || course.course_grade == '5.00')" 
										ng-change="addToChangedGrades(course,new_grade)">
											<option value="{{ course.course_grade }}">{{ course.course_grade }}</option>
											<option value="1.00">1.00</option>
											<option value="1.25">1.25</option>
											<option value="1.50">1.50</option>
											<option value="1.75">1.75</option>
											<option value="2.00">2.00</option>
											<option value="2.25">2.25</option>
											<option value="2.50">2.50</option>
											<option value="2.75">2.75</option>
											<option value="3.00">3.00</option>
										</select>
								
									
								</td>
								<td>{{ course.course_code }}</td>
								<td>{{ course.course_title }}</td>
								<td>{{ course.course_unit_lec }}</td>
								<td>{{ course.course_unit_lab }}</td>
							</tr>
						</tbody>
					</table>
				</div><!-- 2nd sem -->
			</div><!-- row 1st year -->





			<div class="row">
				<div class="col-md-6">
					<table class="table table-striped">
						<h5 class="text-center programEvalHeading"><b>2nd Year - 1st Semester</b></h5>
						<thead>
							<tr>
								<th>Grade</th>
								<th>Course Code</th>
								<th>Couse Title</th>
								<th>Unit (Lec)</th>
								<th>Unit (Lab)</th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="course in studentProgEvalCourses | limitTo: 28" ng-if="$index > 18">
								<td>
									
									<b ng-hide="course.course_grade == 'INC' || course.course_grade == 'DRP' || course.course_grade == '5.00'">{{ course.course_grade }}</b>
									<b ng-show="(course.course_grade == 'INC' || course.course_grade == 'DRP' || course.course_grade == '5.00')" style="color: red">
										{{ course.course_grade }}
									</b>
								
										<select name="new_grade" ng-model="new_grade" 
										ng-show="showEditGrade && (course.course_grade == 'INC' || course.course_grade == 'DRP' || course.course_grade == '5.00')" 
										ng-change="addToChangedGrades(course,new_grade)">
											<option value="{{ course.course_grade }}">{{ course.course_grade }}</option>
											<option value="1.00">1.00</option>
											<option value="1.25">1.25</option>
											<option value="1.50">1.50</option>
											<option value="1.75">1.75</option>
											<option value="2.00">2.00</option>
											<option value="2.25">2.25</option>
											<option value="2.50">2.50</option>
											<option value="2.75">2.75</option>
											<option value="3.00">3.00</option>
										</select>
								
									
								</td>
								<td>{{ course.course_code }}</td>
								<td>{{ course.course_title }}</td>
								<td>{{ course.course_unit_lec }}</td>
								<td>{{ course.course_unit_lab }}</td>
							</tr>
						</tbody>
					</table>
				</div><!-- 1st sem -->


				<div class="col-md-6">
					<table class="table table-striped">
						<h5 class="text-center programEvalHeading"><b>2nd Year - 2nd Semester</b></h5>
						<thead>
							<!-- <tr><th width="100%">1st Year - 1st Semester</th></tr> -->
							<tr>
								<th>Grade</th>
								<th>Course Code</th>
								<th>Couse Title</th>
								<th>Unit (Lec)</th>
								<th>Unit (Lab)</th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="course in studentProgEvalCourses | limitTo: 36" ng-if="$index > 27">
								<td>
									
									<b ng-hide="course.course_grade == 'INC' || course.course_grade == 'DRP' || course.course_grade == '5.00'">{{ course.course_grade }}</b>
									<b ng-show="(course.course_grade == 'INC' || course.course_grade == 'DRP' || course.course_grade == '5.00')" style="color: red">
										{{ course.course_grade }}
									</b>
								
										<select name="new_grade" ng-model="new_grade" 
										ng-show="showEditGrade && (course.course_grade == 'INC' || course.course_grade == 'DRP' || course.course_grade == '5.00')" 
										ng-change="addToChangedGrades(course,new_grade)">
											<option value="{{ course.course_grade }}">{{ course.course_grade }}</option>
											<option value="1.00">1.00</option>
											<option value="1.25">1.25</option>
											<option value="1.50">1.50</option>
											<option value="1.75">1.75</option>
											<option value="2.00">2.00</option>
											<option value="2.25">2.25</option>
											<option value="2.50">2.50</option>
											<option value="2.75">2.75</option>
											<option value="3.00">3.00</option>
										</select>
								
									
								</td>
								<td>{{ course.course_code }}</td>
								<td>{{ course.course_title }}</td>
								<td>{{ course.course_unit_lec }}</td>
								<td>{{ course.course_unit_lab }}</td>
							</tr>
						</tbody>
					</table>
				</div><!-- 2nd sem -->
			</div><!-- row 2nd year -->


			<div class="row">
				<div class="col-md-6">
					<table class="table table-striped">
						<h5 class="text-center programEvalHeading"><b>3rd Year - 1st Semester</b></h5>
						<thead>
							<tr>
								<th>Grade</th>
								<th>Course Code</th>
								<th>Couse Title</th>
								<th>Unit (Lec)</th>
								<th>Unit (Lab)</th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="course in studentProgEvalCourses | limitTo: 45" ng-if="$index > 35">
								<td>
									
									<b ng-hide="course.course_grade == 'INC' || course.course_grade == 'DRP' || course.course_grade == '5.00'">{{ course.course_grade }}</b>
									<b ng-show="(course.course_grade == 'INC' || course.course_grade == 'DRP' || course.course_grade == '5.00')" style="color: red">
										{{ course.course_grade }}
									</b>
								
										<select name="new_grade" ng-model="new_grade" 
										ng-show="showEditGrade && (course.course_grade == 'INC' || course.course_grade == 'DRP' || course.course_grade == '5.00')" 
										ng-change="addToChangedGrades(course,new_grade)">
											<option value="{{ course.course_grade }}">{{ course.course_grade }}</option>
											<option value="1.00">1.00</option>
											<option value="1.25">1.25</option>
											<option value="1.50">1.50</option>
											<option value="1.75">1.75</option>
											<option value="2.00">2.00</option>
											<option value="2.25">2.25</option>
											<option value="2.50">2.50</option>
											<option value="2.75">2.75</option>
											<option value="3.00">3.00</option>
										</select>
								
									
								</td>
								<td>{{ course.course_code }}</td>
								<td>{{ course.course_title }}</td>
								<td>{{ course.course_unit_lec }}</td>
								<td>{{ course.course_unit_lab }}</td>
							</tr>
						</tbody>
					</table>
				</div><!-- 1st sem -->


				<div class="col-md-6">
					<table class="table table-striped">
						<h5 class="text-center programEvalHeading"><b>3rd Year - 2nd Semester</b></h5>
						<thead>
							<!-- <tr><th width="100%">1st Year - 1st Semester</th></tr> -->
							<tr>
								<th>Grade</th>
								<th>Course Code</th>
								<th>Couse Title</th>
								<th>Unit (Lec)</th>
								<th>Unit (Lab)</th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="course in studentProgEvalCourses | limitTo: 52" ng-if="$index > 44">
								<td>
									
									<b ng-hide="course.course_grade == 'INC' || course.course_grade == 'DRP' || course.course_grade == '5.00'">{{ course.course_grade }}</b>
									<b ng-show="(course.course_grade == 'INC' || course.course_grade == 'DRP' || course.course_grade == '5.00')" style="color: red">
										{{ course.course_grade }}
									</b>
								
										<select name="new_grade" ng-model="new_grade" 
										ng-show="showEditGrade && (course.course_grade == 'INC' || course.course_grade == 'DRP' || course.course_grade == '5.00')" 
										ng-change="addToChangedGrades(course,new_grade)">
											<option value="{{ course.course_grade }}">{{ course.course_grade }}</option>
											<option value="1.00">1.00</option>
											<option value="1.25">1.25</option>
											<option value="1.50">1.50</option>
											<option value="1.75">1.75</option>
											<option value="2.00">2.00</option>
											<option value="2.25">2.25</option>
											<option value="2.50">2.50</option>
											<option value="2.75">2.75</option>
											<option value="3.00">3.00</option>
										</select>
								
									
								</td>
								<td>{{ course.course_code }}</td>
								<td>{{ course.course_title }}</td>
								<td>{{ course.course_unit_lec }}</td>
								<td>{{ course.course_unit_lab }}</td>
							</tr>
						</tbody>
					</table>
				</div><!-- 2nd sem -->
			</div><!-- row 3rd year -->





	










		</div><!-- col entire page -->
	</div><!-- row entire page -->
</div>