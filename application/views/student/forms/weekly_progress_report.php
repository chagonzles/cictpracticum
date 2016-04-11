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
                  <?= $weekly_progress_report[0]->firstname . ' ' . $weekly_progress_report[0]->lastname ?>
                </div>

                <div class="col-sm-2">
                 <label for="" class="control-label"><b>Position</b></label>

               </div>
                <div class="col-sm-3">
                  <?= $weekly_progress_report[0]->evaluator_position ?>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-3">
                    <label for="" class="control-label"><b>Date</b></label>
                   
                </div>
                <div class="col-sm-4">
                   <?php if(isset($weekly_progress_report[0]->date_filled_up_by_eval)) {
                   $date_filled_up_by_eval = date_create($weekly_progress_report[0]->date_filled_up_by_eval);
                    echo date_format($date_filled_up_by_eval,'F j, Y');
                    }
                    else {
                      echo 'N/A';
                    }

                     ?>
                </div>
                <div class="col-sm-2">
                    <label for="" class="control-label"><b>Task Completed</b></label>
                </div>

                <div class="col-sm-3">
                   <?php if ($weekly_progress_report[0]->is_task_completed == 1) {
                     echo '<button class="btn btn-success btn-xs" ng-disabled="true"><i class="fa fa-check"></i> Task Completed</button>';
                  }  else if($weekly_progress_report[0]->is_task_completed == 0) {
                      echo '<button class="btn btn-primary btn-xs" ng-disabled="true"><i class="fa fa-times"></i> Task Not Completed</button>';

                  } else if($weekly_progress_report[0]->is_task_completed == 2)
                      echo '<button class="btn btn-default btn-xs" ng-disabled="true"><i class="fa fa-times"></i> Not Yet Evaluated</button>';
                  ?>
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm-12">
                  <label for="" class="control-label"><b>COMMENTS/RECOMMENDATIONS</b></label>
                  <br>
                  <?php if (isset($weekly_progress_report[0]->comments)) {
                     echo $weekly_progress_report[0]->comments;
                  }  else
                    echo 'N/A'

                  ?>
                  
                </div>
              </div>
                


                <!-- <h4>Student Information</h4>
                <hr> -->
              
                
               
              </form>
            </div>
          </div>

      
             
          </div><!-- modal body -->
   
      </div><!-- modal content -->
      
    </div><!-- modal dialog -->
 </div><!-- modal -->




  </div><!-- row -->
</div><!-- container -->