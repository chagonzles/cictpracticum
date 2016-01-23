<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<button type="button" class="btn btn-default" ng-click="showNewProgressReport()">Add New</button>
		</div>
	</div>
</div>





























<div class="modal fade" id="newProgressReportModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title"><b>Weekly Progress Report</b></h4>
	        </div><!-- modal header -->


	        <div class="modal-body">
			

					<div class="row">
					    <div class="col-xs-12">
							<form role="form" type="POST" class="well" ng-submit="evaluateStudent()" name="frmEvaluateStudent" novalidate>
							<h4><b>Task Report Form </b></h4>
							<hr>
								<div class="row">
									<div class="col-sm-4">
										<b>Company Name</b>
									</div>
									<div class="col-sm-8">
										
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-sm-4">
										<b>Company Address</b>
									</div>
									<div class="col-sm-8">
										
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for=""><b>Task Title</b></label>
											<input type="text" name="" class="form-control" value="" placeholder="Task Title">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-12">
										<label for="username" class="control-label">Task Start Date</label>
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
										
										
									</div>

	

								</div><!-- row start date -->


								


								<div class="row">
									<div class="col-sm-12">
										<label for="username" class="control-label">Task Start Date</label>
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
										
										
									</div>

	

								</div><!-- row end date -->



								
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<div class="col-sm-6">
												<input type="number" class="form-control" value="" min="0" max="12">
											</div>
											<div class="col-sm-6">
												<input type="number" class="form-control" value="" min="0" max="12">
											</div>
										</div>
									</div>
								</div>









								<!-- <h4>Student Information</h4>
								<hr> -->
							
								
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








