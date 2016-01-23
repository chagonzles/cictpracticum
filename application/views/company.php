<div class="container">
	<div class="row">
			
		<table class="table table-hover table-responsive" style="background: white">
			<thead>
				<tr>
					<th>
		
					</th>
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
					<th>Name</th>
					<th>Address</th>
					<th>Contact Number</th>
					<th>Email</th>
				</tr>
		
			</thead>
			<tbody>
				<tr ng-repeat="company in companies | filter: search" ng-click="goToCompanyDetails(company.company_id)">
					<td>{{ company.company_name }}</td>
					<td>{{ company.company_address}}</td>
					<td>{{ company.company_contact_no }}</td>
					<td>{{ company.company_email }}</td>
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
                              <input type="text" class="form-control" ng-model="company_contact_no" placeholder="Contact Number" required>
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