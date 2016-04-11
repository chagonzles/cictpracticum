<div class="container">
  <div class="row">
    
<div>
    <div id="login-overlay" class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>WEEKLY PROGRESS REPORT (Week No <?= $weekly_progress_report[0]->week_no ?>)</b></h4>
          </div><!-- modal header -->


          <div class="modal-body">
      

          <div class="row">
              <div class="col-xs-12">
              <form role="form" type="POST" ng-submit="submitProgressReport()" name="frmProgressReport" novalidate>
              <h5><b>TASK REPORT FORM  </b></h5>
              <hr>
                <div class="row">
                  <div class="col-sm-4">
                    <b>Company Name</b>
                  </div>
                  <div class="col-sm-8">
                    <?= $company[0]->company_name ?>
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-sm-4">
                    <b>Company Address</b>
                  </div>
                  <div class="col-sm-8">
                    <?= $company[0]->company_address ?>
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-sm-4">
                    <b>Task Title</b>
                  </div>
                  <div class="col-sm-8">
                    <?= $weekly_progress_report[0]->task_title ?>
                  </div>
                </div>
                <br>

               <div class="row">
                 <div class="col-sm-4">
                   <b>Start Date</b>
                 </div>
                 <div class="col-sm-8">
                 <?php $start_date = date_create($weekly_progress_report[0]->task_start_date) ?>
                  <?= date_format($start_date,'F j, Y') ?>
                 </div>
               </div>
                <br>

               <div class="row">
                 <div class="col-sm-4">
                   <b>End Date</b>
                 </div>
                 <div class="col-sm-8">
                  <?php $end_date = date_create($weekly_progress_report[0]->task_end_date) ?>
                  <?= date_format($end_date,'F j, Y') ?>
                 </div>
               </div>
              
              <div class="row">
              <br>
                <div class="col-sm-4">
                  <label for="" class="control-label"><b>Trainee Name</b></label>
                </div>
                <div class="col-sm-8">
                   <?= $weekly_progress_report[0]->firstname . ' ' . $weekly_progress_report[0]->lastname ?>
                </div>
              </div>


              <div class="row">
          
                <div class="col-sm-4">
                  <label for="" class="control-label"><b>Course and Major</b></label>
                </div>
                <div class="col-sm-8">
                   <?= $weekly_progress_report[0]->course . ' Major in ' . $weekly_progress_report[0]->major  ?>
                </div>
              </div>
              <br><br>

              <h5><b>DETAILS OF TASK </b></h5>
              <hr>
              <div class="row">
                <div class="col-sm-12">
                  <?= $weekly_progress_report[0]->task_details ?>
                </div>
              </div>
              
              <br>  
              <br>
  
              <h5><b>EQUIPMENT TO BE USE</b></h5>
              <hr>
              <div class="row">
                <div class="col-sm-12">
                  <?= $weekly_progress_report[0]->task_equipped ?>
                </div>
              </div>
              

              <br><br><br>
              
              <h5><b>FILLED UP BY THE COMPANY REPRESENTATIVE </b></h5>
              <hr>
              <div class="row">
               <div class="col-sm-3">
                 <label for="" class="control-label"><b>Evaluator Name</b></label>

               </div>
                <div class="col-sm-4">
                  <?= $account[0]->firstname . ' ' . $account[0]->lastname ?>
                </div>

                <div class="col-sm-2">
                 <label for="" class="control-label"><b>Position</b></label>

               </div>
                <div class="col-sm-3">
                  <?= $evaluator[0]->evaluator_position ?>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-3">
                    <label for="" class="control-label"><b>Task Completed</b></label>
                </div>

                <div class="col-sm-4">
                    <label class="radio-inline"><input type="radio" name="task_completed" value="1" ng-model="task_completed" required>Yes</label>
                    <label class="radio-inline"><input type="radio" name="task_completed" value="0" ng-model="task_completed" required>No</label>
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm-12">
                  <label for="" class="control-label"><b>COMMENTS/RECOMMENDATIONS</b></label>
                  <br>
                    
                  <textarea name="comments" ng-model="comments" id="inputComments" class="form-control" rows="3"></textarea>
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




  </div><!-- row -->
</div><!-- container -->