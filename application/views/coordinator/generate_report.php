<div ng-controller="coordinatorController">
<div class="container">
	<div class="row">
  <br>
   <div> <button class="btn btn-default" ng-click="printReport()"><b>PRINT REPORT</b></button></div>
			<br>
		<div class="printSection">
        <div class="col-sm-12">
        <!-- <div class="img img-responsive" style="background: #a80000;width: 100%;height: 100px">
           <div class="row">
             <div class="col-sm-9 col-sm-offset-3">
                <h3 style="color: #fff;font-family: 'Cambria';">BATAAN PENINSULA STATE UNIVERSITY</h3>
             </div>

           </div>
        </div>
 -->
        <img ng-src="<?= base_url() . 'assets/img/cictpracticumheader_final.png' ?>" alt="" class="img img-responsive">
        <table class="table table-hover" style="background: white">
          <thead>
            
            <tr>
              <th>Student ID   </th>
              <th>Student Name</th>
              <th>Course and Major</th>
              <th>Company Name </th>
              <th>Company Address</th>
              <th>Grade</th>
              <th>Remarks</th>
       

            </tr>
        
          </thead>
          <tbody>
            <tr ng-repeat="student in acceptedStudents | filter: search" ng-click="goToStudentDetails(student.student_id,student.user_id)">
              <td>{{ student.student_id }}</td>
              <td>{{ student.firstname + ' ' + student.lastname }}</td>
              <td>{{ student.course + ' Major in ' + student.major }}</td>
              <td>{{ student.company_name }}</td>
              <td>{{ student.company_address }}</td>
              <td>
                <div ng-show="student.grade == NULL || student.grade == undefined || student.grade == ''">
                  Not yet evaluated
                </div>
                <div ng-hide="student.grade == NULL || student.grade == undefined || student.grade == ''">
                  {{ student.grade }}
                </div>
              </td>
              <td>
                <div ng-show="student.equivalent == NULL || student.equivalent == undefined || student.equivalent == ''">
                  Not yet evaluated
                </div>
                <div ng-hide="student.equivalent == NULL || student.equivalent == undefined || student.equivalent == ''">
                  {{ student.equivalent }}
                </div>
              </td>
            </tr>
          </tbody>

        </table>  
        </div>
    </div>
	</div>













</div>