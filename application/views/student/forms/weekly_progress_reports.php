<div class="container">
	<div class="row">
		<div class="col-sm-12">
		
		

		<table class="table table-hover table-responsive" style="background: white">
			<thead>
				<tr>
					<th>
						<div class="form-group">
							<button type="button" class="btn btn-default" ng-click="showNewProgressReport()">Add New Report</button>

						</div>
					</th>
					<th>
		
					</th>
					<th></th>
					<th></th>
					<th>	</th>
				
					
					<th>
					<div class="form-group">
					<label for=""><b>Search By:</b> </label>
						<div class="input-group">
							
				            <input type="text" class="form-control" placeholder="Week No" ng-model="search.week_no">
				            <div class="input-group-btn">
				                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>

				            </div>
					
			        	</div>
					</div>
					
			        </th>
				</tr>
				<tr>
					<th>Week No</th>
					<th>Task Title</th>
					<th>Task Start/End Date</th>
					<th>Comments</th>
					<th>Task Completed</th>
					<th>Approved By Evaluator</th>
					
				</tr>
		
			</thead>
			<tbody ng-init="weekcount = 0">
				<tr ng-repeat="weekly_progress_report in weekly_progress_reports | filter: search" ng-click="goToWeeklyProgressReportForm(weekly_progress_report.weekly_report_id)">
					<td>{{ weekly_progress_report.week_no }}</td>
					<td>{{ weekly_progress_report.task_title }}</td>
					<td>{{ (weekly_progress_report.task_start_date  | date:'MMMM d, yyyy')  + ' - ' + (weekly_progress_report.task_end_date  | date:'MMMM d, yyyy')  }}</td>
					<td>
						<div ng-show="weekly_progress_report.comments == '' || weekly_progress_report.comments == NULL">
							N/A
						</div>
						<div ng-hide="weekly_progress_report.comments == '' || weekly_progress_report.comments == NULL">
							{{ weekly_progress_report.comments }}
						</div>
					</td>
					<td>
						<div ng-show="weekly_progress_report.is_task_completed == 1" >
							<button class="btn btn-success btn-xs" ng-disabled="true"><i class="fa fa-check"></i> Task Completed</button>
						</div>
						<div ng-show="weekly_progress_report.is_task_completed == 0">
							<button class="btn btn-primary btn-xs" ng-disabled="true"><i class="fa fa-times"></i> Task Not Completed</button>
						</div>
						<div ng-show="weekly_progress_report.is_task_completed == 2">
							<button class="btn btn-default btn-xs" ng-disabled="true"><i class="fa fa-times"></i> Not Yet Evaluated</button>
						</div>
					</td>
					<td>
						<div ng-show="weekly_progress_report.approved_by_evaluator == 1" >
							<button class="btn btn-success btn-xs" ng-disabled="true"><i class="fa fa-check"></i> Approved</button>
						</div>
						<div ng-show="weekly_progress_report.approved_by_evaluator == 0">
							<button class="btn btn-primary btn-xs" ng-disabled="true"><i class="fa fa-times"></i> Rejected </button>
						</div>
						<div ng-show="weekly_progress_report.approved_by_evaluator == 2">
							<button class="btn btn-default btn-xs" ng-disabled="true"><i class="fa fa-times"></i> Not Yet Approved </button>
						</div>

					</td>



				
				</tr>
			</tbody>

		</table>
















		</div><!-- row col-sm-12 -->
	</div><!-- row -->
</div><!-- container -->





























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
							<form role="form" type="POST" class="well" ng-submit="submitProgressReport()" name="frmProgressReport" novalidate>
							<h4><b>Task Report Form </b></h4>
							<hr>
								<div class="row">
									<div class="col-sm-4">
										<b>Company Name</b>
									</div>
									<div class="col-sm-8">
										{{ studentInfo[0].company_name }}
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-sm-4">
										<b>Company Address</b>
									</div>
									<div class="col-sm-8">
										{{ studentInfo[0].company_address }}
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for=""><b>Task Title</b></label>
											<input type="text" name="" class="form-control" value="" placeholder="Task Title" ng-model="task_title">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-12">
										<label for="username" class="control-label"><b>Start Date</b></label>
										 <div class="row">
										 	<div class="col-xs-4">
										 		<select name="start_month" ng-model="start_month" class="form-control" required>
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
										 		<select name="start_day" ng-model="start_day" id="position" class="form-control" required>
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
										 		<select name="start_year" ng-model="start_year" id="position" class="form-control" required>
									            	<?php for($yr = 2030; $yr > 2015; $yr--):?>
										                <option value="<?= $yr;?>"><?= $yr ?></li>
										        	<?php endfor;?>
						            			</select>
										 	</div>
										 </div>
										
										
									</div>

	

								</div><!-- row start date -->


								


								<div class="row">
									<div class="col-sm-12">
										<label for="username" class="control-label"><b>End Date</b></label>
										 <div class="row">
										 	<div class="col-xs-4">
										 		<select name="end_month" ng-model="end_month" class="form-control" required>
							            		<!-- <option value="2nd Sem">Jan</option>
							            		<option value="Summer">Feb</option>
							            		<option value="Summer">Mar</option> -->
							            		<?php $monthno = 1 ?>
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
										 		<select name="end_day" ng-model="end_day" id="position" class="form-control" required>
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
										 		<select name="end_year" ng-model="end_year" id="position" class="form-control" required>
									            	<?php for($yr = 2030; $yr > 2015; $yr--):?>
										                <option value="<?= $yr;?>"><?= $yr ?></li>
										        	<?php endfor;?>
						            			</select>
										 	</div>
										 </div>
										
										
									</div>

	

								</div><!-- row end date -->



								<!--  <div class="form-group">
										
										 <div class="row">
										 	

										 	<div class="col-sm-5">
										 	<label for="username" class="control-label"><b>Start Time</b></label>
										 		<div class="input-group">
													<input type="text" name="sched_time_start" ng-model="sched_time_start" class="form-control" placeholder="Start Time"
													required ng-minlength="3" maxlength="5" ng-pattern="/^[0-9 :]*$/">
													<div class="input-group-addon">AM</div>
												</div>
						            				
										 	</div>

										 	<div class="col-sm-2">
										 		
										 	</div>
								
										 	<div class="col-sm-5">
										 	<label for="username" class="control-label"><b>End Time</b></label>
										 		<div class="input-group">
													<input type="text" name="sched_time_end" ng-model="sched_time_end" class="form-control" placeholder="End Time"
													required ng-minlength="3" maxlength="5" ng-pattern="/^[0-9 :]*$/">
													<div class="input-group-addon">PM</div>
												</div>
										 	</div>
												

											
										 		
										 	
										 </div>

										 <!-- <p class="bg-danger" ng-show="frmAddStudent.sched_day_start.$error.required || 
										 frmAddStudent.sched_day_end.$error.required">
										 <b>Schedule Day is required</b>
										 </p> -->
							<!-- </div> -->

							
							<div class="row">
							<br>
								<div class="col-sm-4">
									<label for="" class="control-label"><b>Trainee Name</b></label>
								</div>
								<div class="col-sm-8">
									{{ studentInfo[0].firstname + ' ' + studentInfo[0].lastname }}
								</div>
							</div>


							<div class="row">
					
								<div class="col-sm-4">
									<label for="" class="control-label"><b>Course and Major</b></label>
								</div>
								<div class="col-sm-8">
									{{ studentInfo[0].course + ' ' + studentInfo[0].major }}
								</div>
							</div>

							<h4><b>Details of Task </b></h4>
							<hr>
							<div class="row">
								<div class="col-sm-12">
									<textarea name="" id="input" class="form-control" rows="3" required="required" ng-model="task_details"></textarea>
								</div>
							</div>
							
							<br>

							<h4><b>Equipment to be use </b></h4>
							<hr>
							<div class="row">
								<div class="col-sm-12">
									<textarea name="" id="input" class="form-control" rows="3" required="required" ng-model="task_equipped"></textarea>
								</div>
							</div>
								
								



								<!-- <h4>Student Information</h4>
								<hr> -->
							
								
								<hr class="colorgraph">
								<div class="row">
									<div class="col-xs-12"><input type="submit" value="Submit Progress Report" class="btn btn-primary btn-block btn-lg" tabindex="7" 
									ng-disabled="frmProgressReport.$invalid"></div>
								</div>
							</form>
						</div>
					</div>

			
	           
	        </div><!-- modal body -->
   
      </div><!-- modal content -->
      
    </div><!-- modal dialog -->
 </div><!-- modal -->








