<div class="container" ng-controller="studentController">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2" style="background: white">
		<form role="form" type="POST" ng-submit="updateSheetB()" name="frmSheetB" novalidate>
			<h3 class="text-center">APPLICATION FOR ON-THE-JOB TRAINING
				<br>
				<small>Sheet - B</small>
			</h3>
			
			<h4>A. Personal Data</h4>
			<hr>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="lastname" class="control-label">Last Name</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Last Name" 
                        name="lastname"  tabindex="1" ng-minlength="2"
                        ng-pattern="/^[A-Za-z- .]*$/" value="<?= $account[0]->lastname ?>" disabled required>
						
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label for="firstname" class="control-label">First Name</label>
						<input type="text" name="firstname" class="form-control"
						 placeholder="First Name" tabindex="2"  value="<?= $account[0]->firstname ?>"
						 ng-pattern="/^[A-Za-z- .]*$/" disabled required>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label for="middlename" class="control-label">Middle Initial</label>
						<input type="text" name="middle_initial" class="form-control"
						 placeholder="Middle Initial" tabindex="3" ng-pattern="/^[A-Za-z- .]*$/" 
						 value="<?= $account[0]->middle_initial ?>" disabled>
						
					</div>
				</div>
			</div>
				

			<div class="row">
				<div class="col-sm-2">
					<label for="username" class="control-label">Birthday</label>
					 <div class="row">
					 	<div class="col-xs-12">
					 		<p><?= $account[0]->birthday ?></p>
		            		<!-- <option value="2nd Sem">Jan</option>
		            		<option value="Summer">Feb</option>
		            		<option value="Summer">Mar</option> -->
		            		
	            			</select>
	            			
					 	</div>
					 
					 </div>
				</div>
				<div class="col-sm-4">
					<label for="Place of Birth" class="control-label">Place of Birth</label>
					<br>
					
					<input type="text" name="place_of_birth" ng-model="place_of_birth" class="form-control"
					placeholder="Place of Birth" tabindex="7" required>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
					<label for="address" class="control-label">Address</label>
					<input type="text" name="address" value="<?= $account[0]->address ?>" id="" class="form-control" placeholder="Address" disabled>
					</div>
				</div>
				
			</div>
			

		
			<div class="row">
				<div class="col-sm-3">
					<label for="gender" class="control-label">Gender</label>
					<br>
					 <select class="form-control" name="gender" style="margin-bottom: 10px" disabled>
	                   	<option value="<?= $account[0]->gender ?>"><?= $account[0]->gender ?></option>
	                  </select>
				</div>
				<div class="col-sm-3">
					<label for="age" class="control-label">Age</label>
					<br>
					<input type="text" name="age" value="<?= $student[0]->age ?>" class="form-control" placeholder="Age" ng-minlength="2" disabled maxlength="2" required ng-pattern="/^[0-9]*$/">
					
				</div>
				<div class="col-sm-3">
					<label for="height" class="control-label">Height</label>
					<br>
					<div class="input-group">
							<input type="text" name="height" ng-model="height" class="form-control" placeholder="Height" maxlength="4">
							<div class="input-group-addon">m</div>
					</div>
				</div>
				<div class="col-sm-3">
					<label for="weight" class="control-label">Weight</label>
					<br>
					<div class="input-group">
							<input type="text" name="weight" ng-model="weight" class="form-control" placeholder="Weight" ng-minlength="2" maxlength="3" required ng-pattern="/^[0-9]*$/">
							<div class="input-group-addon">kgs</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
					<label for="civil_status" class="control-label">Civil Status</label>
						<select name="civil_status" class="form-control" ng-model="civil_status" required>
	            		<option value="Single">Single</option>
	            		<option value="Married">Married</option>
	            		<option value="Widowed">Widowed</option>
            			</select>
            			
					</div>
			
				</div>
				<div class="col-sm-4">
						<div class="form-group">
						<label for="">Email Address</label>
							<input type="email" name="email" value="<?= $account[0]->email ?>" id="input" class="form-control" 
							placeholder="Email Address" disabled>
						</div>
				</div>

				<div class="col-sm-4">
					<label for="contact_number">Contact Number</label>
					<!-- <div class="input-group">
						<div class="input-group-addon">+639</div>
						<input type="text" name="contact_no" ng-model="contact_no" class="form-control" placeholder="Mobile Number">
					</div> -->
					<input type="tel" name="contact_number" value="<?= $account[0]->contact_number ?>" class="form-control" placeholder="Contact Number" 
					required ng-minlength="8" maxlength="13" ng-pattern="/^[-0-9+]*$/" disabled>
					<!-- <p class="bg-danger" ng-show="frmRegister.contact_number.$error.required"><b>Contact No is required</b></p>
					<p class="bg-danger" ng-show="frmRegister.contact_number.$error.pattern || frmRegister.contact_number.$error.minlength
					 && frmRegister.contact_number.$dirty"><b>Not a valid contact number</b></p> -->
                  	
				</div>
			</div>
			
			<h4>B. Family Background</h4>
			<hr>
			<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
						<label for="guardian_name" class="control-label">Guardian's Name</label>
						<input type="text" name="guardian_name" ng-model="guardian_name" class="form-control" 
						placeholder="Guardian's Name" tabindex="5" required>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<label for="age" class="control-label">Age</label>
						<br>
						<input type="text" name="guardian_age" ng-model="guardian_age" class="form-control" placeholder="Age" ng-minlength="2" maxlength="2" required ng-pattern="/^[0-9]*$/">
				
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<label for="age" class="control-label">Relationship</label>
						<select name="relationship" class="form-control" ng-model="guardian_relationship" required>
	            		<option value="Father">Father</option>
	            		<option value="Mother">Mother</option>
	            		<option value="Guardian">Guardian</option>
            			</select>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label for="occupation" class="control-label">Occupation</label>
						<input type="text" name="guardian_occupation" ng-model="guardian_occupation" class="form-control" 
						placeholder="Occupation" tabindex="6" ng-minlength="2" maxlength="50" required>
						
					</div>
				</div>
				
				

				
			</div>

			<div class="row">
				
				<div class="col-sm-6">
					<div class="form-group">
					<label for="address" class="control-label">Address</label>
					<input type="text" name="guardian_address" ng-model="guardian_address" id="" class="form-control" placeholder="Address" required>
					</div>
				</div>
				<div class="col-sm-6">
					<label for="contact_number">Contact Number</label>
					<!-- <div class="input-group">
						<div class="input-group-addon">+639</div>
						<input type="text" name="contact_no" ng-model="contact_no" class="form-control" placeholder="Mobile Number">
					</div> -->
					<input type="tel" name="guardian_contact_number" class="form-control"  ng-model="guardian_contact_number" placeholder="Contact Number" 
					required ng-minlength="8" maxlength="13" >
					<!-- <p class="bg-danger" ng-show="frmRegister.contact_number.$error.required"><b>Contact No is required</b></p>
					<p class="bg-danger" ng-show="frmRegister.contact_number.$error.pattern || frmRegister.contact_number.$error.minlength
					 && frmRegister.contact_number.$dirty"><b>Not a valid contact number</b></p> -->
                  	
				</div>
			</div>

			





			<h4>C. School Data</h4>
			<hr>
			
			<div class="row">
				<div class="col-sm-6">
					<label for="">Elementary</label>
					<input type="text" name="elementary_name" ng-model="elementary_name" id="input" class="form-control" 
					placeholder="School Name">
				</div>

				<div class="col-sm-6">
					<label for="username" class="control-label">Date Graduated</label>
					 <div class="row">
					 	<div class="col-xs-4">
					 		<select name="month" ng-model="month_elementary" class="form-control" required>
		            		<!-- <option value="2nd Sem">Jan</option>
		            		<option value="Summer">Feb</option>
		            		<option value="Summer">Mar</option> -->
		            		<?php foreach ($months as $month):?>
									
					                <option value="<?= $monthno ?>"><?= $month ?></li>
									<?php $monthno = $monthno + 1 ?>
					        <?php endforeach;?>
	            			</select>
	            			
					 	</div>
					 	<div class="col-xs-4">
					 		<select name="day" ng-model="day_elementary" id="position" class="form-control" required>
		            			<?php for($i = 1; $i < 32; $i++):?>
					                <option value="<?= $i;?>"><?= $i ?></li>
					        	<?php endfor;?>
	            			</select>
					 	</div>
					 	<div class="col-xs-4">
					 		<select name="year" ng-model="year_elementary" id="position" class="form-control" required>
				            	<?php for($yr = 2010; $yr > 2004; $yr--):?>
					                <option value="<?= $yr;?>"><?= $yr ?></li>
					        	<?php endfor;?>
	            			</select>
					 	</div>
					 </div>
				</div>
			</div>


			<div class="row">
				<div class="col-sm-6">
					<label for="">High School</label>
					<input type="text" name="high_school_name" ng-model="high_school_name" id="input" class="form-control" 
					placeholder="School Name">
				</div>

				<div class="col-sm-6">
					<label for="date_graduated" class="control-label">Date Graduated</label>
					 <div class="row">
					 	<div class="col-xs-4">
					 		<select name="month" ng-model="month_high_school" class="form-control" required>
		            		<!-- <option value="2nd Sem">Jan</option>
		            		<option value="Summer">Feb</option>
		            		<option value="Summer">Mar</option> -->
		            		<?php foreach ($months as $month):?>
									
					                <option value="<?= $monthno ?>"><?= $month ?></li>
									<?php $monthno = $monthno + 1 ?>
					        <?php endforeach;?>
	            			</select>
	            			
					 	</div>
					 	<div class="col-xs-4">
					 		<select name="day" ng-model="day_high_school" class="form-control" required>
		            			<?php for($i = 1; $i < 32; $i++):?>
					                <option value="<?= $i;?>"><?= $i ?></li>
					        	<?php endfor;?>
	            			</select>
					 	</div>
					 	<div class="col-xs-4">
					 		<select name="year" ng-model="year_high_school" id="position" class="form-control" required>
				            	<?php for($yr = 2013; $yr > 2008; $yr--):?>
					                <option value="<?= $yr;?>"><?= $yr ?></li>
					        	<?php endfor;?>
	            			</select>
					 	</div>
					 </div>
				</div>
			</div>


			<div class="row">
				<div class="col-sm-6">
					<label for="">Vocational</label>
					<input type="text" name="vocational_name" ng-model="vocational_name" id="input" class="form-control" 
					placeholder="School Name">
				</div>

				<div class="col-sm-6">
					<label for="username" class="control-label">Date Graduated</label>
					 <div class="row">
					 	<div class="col-xs-4">
					 		<select name="month" ng-model="month_vocational" class="form-control" required>
		            		<!-- <option value="2nd Sem">Jan</option>
		            		<option value="Summer">Feb</option>
		            		<option value="Summer">Mar</option> -->
		            		<?php foreach ($months as $month):?>
									
					                <option value="<?= $monthno ?>"><?= $month ?></li>
									<?php $monthno = $monthno + 1 ?>
					        <?php endforeach;?>
	            			</select>
	            			
					 	</div>
					 	<div class="col-xs-4">
					 		<select name="day" ng-model="day_vocational" id="position" class="form-control" required>
		            			<?php for($i = 1; $i < 32; $i++):?>
					                <option value="<?= $i;?>"><?= $i ?></li>
					        	<?php endfor;?>
	            			</select>
					 	</div>
					 	<div class="col-xs-4">
					 		<select name="year" ng-model="year_vocational" id="position" class="form-control" required>
				            	<?php for($yr = 2014; $yr > 2005; $yr--):?>
					                <option value="<?= $yr;?>"><?= $yr ?></li>
					        	<?php endfor;?>
	            			</select>
					 	</div>
					 </div>
				</div>
			</div>


			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-6">
					<input type="submit" value="Save" class="btn btn-primary btn-block btn-lg" tabindex="7" >
				</div>
				<div class="col-xs-6">
					<input type="reset" value="Reset" class="btn btn-danger btn-block btn-lg" tabindex="7">
				</div>
			</div>
		</form>
	</div>
</div>

</div>