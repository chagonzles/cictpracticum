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
				    <div class="row">
				    	<div class="col-sm-10 col-sm-offset-1">
				    		<div class="progress">
							    <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
							      60% Complete (warning)
							    </div>
		  					</div>
				    	</div>
				    </div>
					<div class="profile-usertitle-name">
						<?= $account[0]->firstname . ' '. $account[0]->lastname  ?>
					</div>
					<div class="profile-usertitle-job">
						<?= $student[0]->student_id ?>
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
						<li style="margin: 10px">
							<h4><b>Personal Information</b></h4>
		                	<h5><span class="text-info">Name:</span> <?= $account[0]->firstname . ' ' . $account[0]->lastname ?></h5> 
		                	<h5><span class="text-info">Gender:</span> <?= $account[0]->gender ?></h5> 
		                	<h5><span class="text-info">Age:</span> <?= $student[0]->age ?></h5> 
		                	<h5><span class="text-info">Address:</span> <?= $account[0]->address ?></h5> 
		                	<h5><span class="text-info">Contact No:</span> <?= $account[0]->contact_number ?></h5>
		                	<h5><span class="text-info">Email Address:</span> <?= $account[0]->email ?></h5>
						</li>
					</ul>
					<button type="button" class="btn btn-default" ng-click="showEditProfile()">Edit Profile</button>
				</div>
				<!-- END MENU -->
			</div>
		</div>






<div class="modal fade" id="editProfileModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Profile</h4>
        </div>
        <div class="modal-body">
             <div class="row">

                      <div class="col-sm-10 col-sm-offset-1">
                        <form role="form" type="POST" name="frmEditProfile" 
                        ng-submit="editProfile()" novalidate>
                          

                           <div class="form-group">
                           <label for=""><b>Address</b></label>
                              <input type="text" class="form-control" ng-model="address" placeholder="Address of the Company" required>
                           </div>

							
						  <div class="form-group">
                           <label for=""><b>Contact No</b></label>
                              <input type="tel" class="form-control" ng-model="contact_no" placeholder="Contact Number" ng-pattern="/^[-0-9+ ()]*$/" required>
      
                           </div>

                           <div class="form-group">
                           <label for=""><b>Email</b></label>
                              <input type="text" class="form-control" ng-model="email" placeholder="Company Email Address" required>
                           </div>

                         

                          <input type="submit" value="Edit Profile"ng-disabled="frmEditProfile.$invalid" class="btn btn-primary">
                        </form>
                      </div>
                  </div>
        </div>
   
      </div>
      
    </div>
  </div>































<div class="col-md-9">
	

  <div class="profile-content">     
        <div class="col-md-12 toppad" >
   
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><b>Student Information</b></h3>
            </div>
            <div class="panel-body">
              <div class="row" style="margin: 10px">
                
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class="col-md-12">
             
					<div class="row">
						<div class="col-sm-6">
							<h4><b>Student Status</b></h4>
		                	<div class="col-sm-12">
		                		<h5><span class="text-info">Student ID: </span> <?= $student[0]->student_id ?></h5> 
			                	<h5><span class="text-info">Course</span> <?= $student[0]->course ?></h5> 
			                	<h5><span class="text-info">Major</span> <?= $student[0]->major ?></h5> 
			                	<h5><span class="text-info">Semester</span> <?= $status[0]->semester ?></h5> 
			                	<h5><span class="text-info">Academic Year</span> <?= $status[0]->academic_year ?></h5> 
			                	<h5><span class="text-info">No of Required OJT Hours: </span> <?= $status[0]->no_of_required_hours ?> hours</h5> 
		                	</div>
						</div>
						<div class="col-sm-6">
								<?php if(!empty($coa[0]->company_address)): ?>
			                	<h4><b>Company Information</b></h4>
			                	<div class="col-sm-12">
			                				<h5><span class="text-info">Company Name: </span> <?= $coa[0]->company_name ?></h5>
				                			<h5><span class="text-info">Company Address: </span> <?= $coa[0]->company_address ?></h5> 
				                			<h5><span class="text-info">Company Email: </span> <?= $coa[0]->company_email ?></h5>
			                	</div>
			                		
			                	<?php endif; ?>
						</div>
					</div>
                

                
					
					<?php if(!empty($evaluation[0]->evaluation_id)): ?>
                	
                	<div class="row">
                		<div class="col-md-12">
                		<h4><b>Evaluation</b></h4>
                			<div class="col-sm-6">

                				<h5><span class="text-info">Date Commenced: </span> <?= $evaluation[0]->date_commenced ?></h5>
								<h5><span class="text-info">Date Completed: </span><?= $evaluation[0]->date_completed ?> </h5>
								<h5><span class="text-info">Evaluated By: </span> <?= $evaluation[0]->firstname . ' ' . $evaluation[0]->lastname ?> 

								(<?= $evaluation[0]->evaluator_position ?>)

								</h5>
                				<h5><span class="text-info">Comments/Recommendations: </span><br> <?= $evaluation[0]->comments ?></h5>
                			</div>
                			<div class="col-sm-6">
                				<h5><span class="text-info">Total Points: </span> <?= $evaluation[0]->total_points ?></h5>
								<h5><span class="text-info">Grade: </span> <?= $evaluation[0]->grade ?></h5>
								<h5><span class="text-info">Equivalent: </span> <?= $evaluation[0]->equivalent ?></h5>
    
                			</div>	
	                			
								
                		</div>
                	</div><!-- row -->
					
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th width="45%">Criteria</th>
							
														<th width="5%">Points Scored</th>
														<th width="45%">Remarks</th>
													</tr>
												</thead>
												<tbody>
												<?php foreach ($evaluation as $key => $value): ?>
													<tr>
														<td><?= $value->criteria_name; ?></td>
														<td><?= $value->points_scored ?></td>
														<td><?= $value->remarks ?></td>

													</tr>
													
												<?php endforeach; ?>
													
													<tr>
														<td><b>Total</b></td>
														<td>
															<b>
															<?= $evaluation[0]->total_points ?>
															</b>
														</td>
														<td></td>
													</tr>	

												</tbody>
											</table>
										</div><!-- table responsive -->                			
	


                	<?php endif; ?>





                	<div>
                		
                	</div>
                
                	

                </div>



            


            

              </div>


            </div>
             
            
          </div>
      
		









</div>

<?php if(!empty($coa[0]->company_address)): ?>
<div class="row">

	<div class="col-sm-8">
	<h5><b>Company Location</b></h5>
		<div id="map" style="height: 400px;width: 400px"></div>
	</div>
	<div class="col-sm-4">
	     <div id="panel" style="margin-left: -100px"></div> 
	</div>
</div>




 <script>

// 					var map;
// 					function initMap() {
// 					  var myLatLng = {lat: -25.363, lng: 131.044};
// 					  map = new google.maps.Map(document.getElementById('map'), {
// 					    center: myLatLng,
// 					    zoom: 8
// 					  });

// 					  var infoWindow = new google.maps.InfoWindow({map: map});

// 					  var pos = {
// 					        lat: <?= $lat ?>,
// 					        lng: <?= $long ?>
// 					      };

// 					      infoWindow.setPosition(pos);
// 					      infoWindow.setContent('<?= $formatted_address ?>');
// 					      map.setCenter(pos);

// 					      var marker = new google.maps.Marker({
// 						    position: pos,
// 						    map: map,
// 						    title: 'Hello World!'
// 						  });

// 						  marker.setMap(map);
// 					}

				

</script>

<script type="text/javascript"> 

     function initMap()
     {
     	var directionsService = new google.maps.DirectionsService();
	     var directionsDisplay = new google.maps.DirectionsRenderer();

	     var map = new google.maps.Map(document.getElementById('map'), {
	       zoom:7,
	       mapTypeId: google.maps.MapTypeId.ROADMAP
	     });

	     directionsDisplay.setMap(map);
	     directionsDisplay.setPanel(document.getElementById('panel'));

	     var request = {
	       origin: 'BPSU - Main Campus, City of Balanga, Bataan, Philippines', 
	       destination: '<?= $company_address ?>',
	       travelMode: google.maps.DirectionsTravelMode.DRIVING
	     };

	     directionsService.route(request, function(response, status) {
	       if (status == google.maps.DirectionsStatus.OK) {
	         directionsDisplay.setDirections(response);
	       }
	     });
     }
   </script> 

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB80ok1kdISiT-NTApqD6iqaC3Wezpm2Cw&callback=initMap"
        async defer></script>

<?php endif; ?>






























































            </div>
		</div>
	</div>
</div>

<br>
<br>