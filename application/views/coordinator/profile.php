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
						Coordinator
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
			        		
		                	<h4>Personal Information</h4>
		                	<h5><span class="text-info">Name:</span> <?= $account[0]->firstname . ' ' . $account[0]->lastname ?></h5> 
		                	<h5><span class="text-info">Gender:</span> <?= $account[0]->gender ?></h5> 
		                	<h5><span class="text-info">Address:</span> <?= $account[0]->address ?></h5> 
		                	<h5><span class="text-info">Contact No:</span> <?= $account[0]->contact_number ?></h5> 
		                	
								
			            
								
 
						</div>
					</ul>


				</div>
				<!-- END MENU -->

				


			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
				<div class="row">
					<div class="col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<b>Submmited Forms of Students <span class="badge">{{ studentFileRequests.length }}</span> </b>
						</div><!-- panel heading -->
						<div class="panel-body">
							<ul class="list-group">
								<li class="list-group-item" ng-repeat="studentFileRequest in studentFileRequests" ng-click="showFileApprovalModal(studentFileRequest)">
									<div class="row">
										<div class="col-sm-6">
											<p style="overflow: hidden">
													<b>{{ studentFileRequest.user_id }}</b> requested {{ studentFileRequest.file_name }} ({{ studentFileRequest.form_type }})
											</p>
													
										</div><!-- file request name -->
											
										<div class="col-sm-5 pull-right">
											<div>
												<a href="{{ studentFileRequest.file_path }}" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-download-alt"></span></a>
												<button type="button" class="btn btn-success btn-xs" ng-click="approveFile(studentFileRequest.attached_file_id)">Approve</button>
												<button type="button" class="btn btn-primary btn-xs" ng-click="rejectFile(studentFileRequest.attached_file_id)">Reject</button>
											</div>
										</div><!-- pull right -->
									</div>
					    		</li><!-- whole -->
							</ul>


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






