<div class="container">
	<div class="row">

	
	<div id="login-overlay" class="modal-dialog">
      <div class="row" style="background: #FFFFFF">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h3 class="modal-title" id="myModalLabel">
              	<b><?= $company[0]->company_name ?></b>

              </h3>
          </div>

           <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="/#home" aria-controls="home" role="tab" data-toggle="tab">Company Details</a></li>
    <li role="presentation"><a href="/#apply" aria-controls="profile" role="tab" data-toggle="tab">Apply</a></li>
    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
      <div class="modal-body">
            
            
              <div class="row">
                  <div class="col-xs-12">
                    <h4>
                      <b>Company Overview</b>
                    </h4>
                      <p><?= $company[0]->company_overview ?></p>
                  </div>
              </div>

              <div class="row">
                  <div class="col-xs-4">
                    <b>Company Contact No: </b>
                  </div>
                  <div class="col-xs-8">
                    <?= $company[0]->company_contact_no ?>
                  </div>
              </div>
              <div class="row">
                  <div class="col-xs-4">
                    <b>Company Email Address:</b>
                  </div>
                  <div class="col-xs-8">
                    <?= $company[0]->company_email ?>
                  </div>
              </div>
              
              <div class="row">
                <div class="col-sm-8">
                <h5><b>Company Location</b></h5>
                  <div id="map" style="height: 400px;width: 300px"></div>
                </div>
                <div class="col-sm-4">
                     <div id="panel" style="margin-left: -100px"></div> 
                </div>
              </div>
          </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="apply">
        <div class="modal-body">
        <h4><b>Apply for <?= $company[0]->company_name ?></b></h4>
              <div class="row">
                      <div class="col-xs-4">
                        <b>Company Contact No:</b>
                      </div>
                      <div class="col-xs-8">
                        <?= $company[0]->company_contact_no ?>
                      </div>
            </div> <!-- row -->

            <div class="row">
                <div class="col-xs-4">
                  <b>Company Email Address:</b>
                </div>
                <div class="col-xs-8">
                  <a ng-click='showComposeInquiry()'><?= $company[0]->company_email ?></a>
                </div>
            </div><!-- row -->

              <div class="row">
                        <div class="col-xs-4">
                          <b>Company Website URL:</b>
                        </div>
                        <div class="col-xs-8">
                        <a href=""><?= $company[0]->company_website_url?></a>
                        </div>
              </div> <!-- row -->
        </div><!-- modal body -->
    </div><!-- tab panel -->

  </div>








          
      </div>
  </div>

		



<div class="modal fade" id="composeInquiry" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Compose Inquiry</h4>
        </div>
        <div class="modal-body">
             <div class="row">

                <div class="col-sm-10 col-sm-offset-1">
                  <?php echo form_open_multipart('main/send_email');?>
                       

                 <div class="form-group">
                        <label for=""><b>Subject</b></label>
                        <input type="text" class="form-control" name="subject" ng-model="subject" placeholder="Department" >
                 </div>

                 <div class="form-group">
                        <label for=""><b>Message</b></label>
                        <textarea name="message" id="input" class="form-control" rows="3"  ng-model="message"></textarea>
                 </div>

                <!--   <div class="col-sm-3">
                                <input type="file" ng-model="userfile" name="userfile" class="btn btn-default btn-sm" size="200"
                                onchange="angular.element(this).scope().checkFile(userfile)"
                                />
                               
                  </div>
                            -->
                  <div class="col-sm-3">
                                 <input type="submit" class="btn btn-primary pull-right" 
                                 value="Send Email"></input>
                                 <!-- <button type="button" class="btn btn-primary pull-left">Attach</button> -->
                  </div>

                               
                         <br>
            
                        </form>
                    </div>
                </div>
        </div>
   
      </div>
      
    </div>
  </div>























	</div>
</div>



<script type="text/javascript"> 

     function initMap()
     {
      var directionsService = new google.maps.DirectionsService();
       var directionsDisplay = new google.maps.DirectionsRenderer();

       var map = new google.maps.Map(document.getElementById('map'), {
         zoom:8,
         mapTypeId: google.maps.MapTypeId.ROADMAP
       });

       directionsDisplay.setMap(map);
       directionsDisplay.setPanel(document.getElementById('panel'));

       var request = {
         origin: 'BPSU - Main Campus, City of Balanga, Bataan, Philippines', 
         destination: '<?= $company[0]->company_address ?>',
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




