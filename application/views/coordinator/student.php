<div class="container">
	<div class="row">
			
		<table class="table table-hover" style="background: white">
			<thead>
				<tr>
					<th>
						<a href="<?= base_url() .'coordinator/generate_reports/' ?>" class="btn btn-default" ng-click="goToGenerateReportPreview()"><b>GENERATE REPORT</b></a>
					</th>
					<th></th>
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
					<th>Student Name</th>
					<th>Course and Major</th>
          <th>Company</th>
          <th>Company Address</th>
          <th>Evaluator</th>
          <th>Date Start/Finish</th>
          <th>Schedule</th>

				</tr>
		
			</thead>
			<tbody>
				<tr ng-repeat="student in acceptedStudents | filter: search" ng-click="goToStudentDetails(student.student_id,student.user_id)">
					<td>{{ student.student_id }}</td>
					<td>{{ student.firstname + ' ' + student.lastname }}</td>
					<td>{{ student.major + ' ' + student.course }}</td>
          <td>{{ student.company_name }}</td>
          <td>{{ student.company_address}}</td>
          <td>{{ student.evaluator_name }}</td>
          <td>
              {{ student.date_start | date:'MMMM d, yyyy' }}
              <span ng-show="student.date_finished != NULL || student.date_finished == ''">
              {{ '/' + student.date_finished | date:'MMMM d, yyyy'  }}
              </span>

              <span ng-hide="student.date_finished != NULL || student.date_finished == ''">
                / N/A
              </span>
          </td>
          <td>
              <div ng-repeat="sched in student.sched">
                      {{ sched.sched_day + ' ' + sched.sched_time }} 
              </div>
          </td>
				</tr>
			</tbody>

		</table>
	</div>








<div class="modal fade" id="addCompanyModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Company</h4>
        </div>
        <div class="modal-body">
             <div class="row">

                      <div class="col-sm-10 col-sm-offset-1">
                        <form role="form" type="POST" name="frmAddCompany" 
                        ng-submit="addCompany()" novalidate>
                           <div class="form-group">
                           <label for=""><b>Company Name</b></label>
                              <input type="text" class="form-control" ng-model="company_name" placeholder="Name of the Company" required>
                           </div>

                           <div class="form-group">
                           <label for=""><b>Company Address</b></label>
                              <input type="text" class="form-control" ng-model="company_address" placeholder="Address of the Company" required>
                           </div>

							
						  <div class="form-group">
                           <label for=""><b>Company Contact No</b></label>
                              <input type="tel" class="form-control" ng-model="company_contact_no" placeholder="Contact Number" ng-pattern="/^[-0-9+ ()]*$/" required>
      
                           </div>

                           <div class="form-group">
                           <label for=""><b>Company Email</b></label>
                              <input type="text" class="form-control" ng-model="company_email" placeholder="Company Email Address" required>
                           </div>

                          <div class="form-group">
                          <label for=""><b>Company Overview</b></label>
                              <textarea name="" id="input" class="form-control" rows="10" required="required" ng-model="company_overview"></textarea>
                          </div>
                          <input type="submit" value="Add Company"ng-disabled="frmAddCompany.$invalid" class="btn btn-primary">
                        </form>
                      </div>
                  </div>
        </div>
   
      </div>
      
    </div>
  </div>










</div>