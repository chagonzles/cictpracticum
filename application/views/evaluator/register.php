<div class="container" ng-controller="evaluatorController">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" type="POST" class="well" ng-submit="registerEvaluator()" name="frmRegisterEvaluator" novalidate>
			<h3 class="text-center">Evaluator Regisstration</h3> 
		
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

						<p class="bg-danger" ng-show="frmRegisterEvaluator.firstname.$error.required"><b>First Name is required</b></p>
						<p class="bg-danger" ng-show="(frmRegisterEvaluator.firstname.$error.minlength || 
						frmRegisterEvaluator.firstname.$error.pattern) && (frmRegisterEvaluator.firstname.$dirty)"><b>Not a valid first name</b></p>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="form-group">
						<label for="username" class="control-label">Last Name</label>
						<input type="text" name="lastname" ng-model="lastname" class="form-control" placeholder="Last Name" tabindex="6"
						ng-minlength="2" ng-pattern="/^[ a-zA-Z.-]*$/" 
						 required>
						<p class="bg-danger" ng-show="frmRegisterEvaluator.lastname.$error.required"><b>Last Name is required</b></p>
						<p class="bg-danger" ng-show="(frmRegisterEvaluator.lastname.$error.minlength || 
						frmRegisterEvaluator.lastname.$error.pattern) && (frmRegisterEvaluator.lastname.$dirty)"><b>Not a valid last name</b></p>
					
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<label for="username" class="control-label">M. I.</label>
						<input type="text" name="middle_initial" ng-model="middle_initial" class="form-control" 
						placeholder="M.I." tabindex="6" ng-minlength="1" maxlength="4" required
						ng-pattern="/^[ a-zA-Z.-]*$/" >
						<p class="bg-danger" ng-show="frmRegisterEvaluator.middle_initial.$error.required"><b>M.I. is required</b></p>
						<p class="bg-danger" ng-show="(frmRegisterEvaluator.middle_initial.$error.minlength || 
						frmRegisterEvaluator.middle_initial.$error.pattern) && (frmRegisterEvaluator.middle_initial.$dirty)"><b>Not a valid middle initial</b></p>
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
				            	<?php for($yr = 1993; $yr > 1950; $yr--):?>
					                <option value="<?= $yr;?>"><?= $yr ?></li>
					        	<?php endfor;?>
	            			</select>
					 	</div>
					 </div>
					 <p class="bg-danger" ng-show="frmRegisterEvaluator.month.$error.required || 
					 frmRegisterEvaluator.day.$error.required || frmRegisterEvaluator.year.$error.required">
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

			<h4>Company Information</h4>
			<hr>

			<div class="form-group">
					<label for="" class="control-label">Position in Company</label>
					<input type="text" name="evaluator_position" ng-model="evaluator_position" id="" class="form-control" placeholder="Position" required>
					<p class="bg-danger" ng-show="frmRegisterEvaluator.evaluator_position.$error.required"><b>Position is required</b></p>
			</div>
			<div class="form-group">
					<label for="" class="control-label"> Company Name</label>
					<div class="input-group">
						<input type="text" name="company_name" ng-model="company_name" id="" class="form-control" placeholder="Name of the Company" ng-change="clicked = false;" autocomplete="off" required>
						<div class="input-group-addon" ng-click="clearCompanyName()"><i class="glyphicon glyphicon-remove"></i></div>
					</div>

					<p class="bg-danger" ng-show="frmRegisterEvaluator.company_name.$error.required"><b>Company Name is required</b></p>
					<div style="background: white">
						<p style="padding: 5px" ng-repeat="company in companies | filter: company_name" ng-click="selectCompany(company)" ng-show="company_name.length > 0 && !clicked">
							<b>{{ company.company_name }} </b> {{ '(' + company.company_address + ')' }}						
						</p>
					</div>

			</div>
			<div class="form-group">
					<label for="" class="control-label"> Company Address</label>
					<input type="text" name="company_address" ng-model="company_address" id="" class="form-control" placeholder="Address" required>
					<p class="bg-danger" ng-show="frmRegisterEvaluator.company_address.$error.required"><b>Company Address is required</b></p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<label for="">Company Email Address</label>
					<input type="email" name="company_email" ng-model="company_email" class="form-control" placeholder="Company Email Address" required>
                  	<p class="bg-danger" ng-show="frmRegisterEvaluator.company_email.$error.required"><b>Email is required</b></p>
                  	<p class="bg-danger" ng-show="frmRegisterEvaluator.company_email.$invalid && frmRegisterEvaluator.company_email.$dirty"><b>Not a valid email address</b></p>
              
                  
				</div>


				<div class="col-sm-6">
					<label for="">Company Website URL</label>
					<input type="url" name="company_website_url" ng-model="company_website_url" class="form-control" placeholder="Company Website URL" required>
                  	<p class="bg-danger" ng-show="frmRegisterEvaluator.company_website_url.$error.required"><b>Company Website is required</b></p>
                  	<p class="bg-danger" ng-show="frmRegisterEvaluator.company_website_url.$invalid && frmRegisterEvaluator.company_website_url.$dirty"><b>Not a valid url</b></p>
				</div>


				<div class="col-sm-6">
					<label for="">Company Contact Number</label>
					<input type="tel" name="company_contact_no" ng-model="company_contact_no" class="form-control" placeholder="Company Contact Number"
					required ng-minlength="8" maxlength="20" ng-pattern="/^[-0-9+ ()]*$/">
				
					<p class="bg-danger" ng-show="frmRegisterEvaluator.company_contact_no.$error.required"><b>Contact Number is required</b></p>
					<p class="bg-danger" ng-show="frmRegisterEvaluator.company_contact_no.$error.pattern || frmRegisterEvaluator.company_contact_no.$error.minlength
					 && frmRegisterEvaluator.company_contact_no.$dirty"><b>Not a valid contact number</b></p>
                  	
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
						<label for="">Company Overview</label>
						<textarea class="form-control" rows="10" name="company_overview" ng-model="company_overview" required="required"></textarea>
						<p class="bg-danger" ng-show="frmRegisterEvaluator.company_overview.$error.required"><b>Overview/Background of the Company is required</b></p>
				</div>
			</div>

			<h4>Account Information</h4>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					<label for="">UserID</label>
					<input type="text" name="user_id" ng-model="user_id" class="form-control" 
					placeholder="User ID"minlength="4" maxlength="20" ng-pattern="/^[a-zA-Z0-9-._ ]*$/" required ng-change="checkUser_ID(user_id)">
					<p class="bg-danger" ng-show="frmRegisterEvaluator.user_id.$error.required"><b>UserID is required</b></p>
					<p class="bg-danger" ng-show="frmRegisterEvaluator.user_id.$error.minlength"><b>Minimum of 4 characters only</b></p>
					<p class="bg-danger" ng-show="frmRegisterEvaluator.user_id.$error.pattern"><b>Alphanumeric, space,dash, period and underscore is only allowed</b></p>
					<p ng-show="frmRegisterEvaluator.user_id.$dirty && frmRegisterEvaluator.user_id.$valid && isuser_idAvailable && !user_idChecking" class="bg-success">
	                      <b>User ID is available</b>
	                 </p>
	                    <p ng-show="frmRegisterEvaluator.user_id.$dirty && frmRegisterEvaluator.user_id.$valid && !isuser_idAvailable && !user_idChecking" class="bg-danger">
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
				ng-disabled="frmRegisterEvaluator.$invalid || !isuser_idAvailable"></div>
			</div>
		</form>
	</div>
</div>

</div>