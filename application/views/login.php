
	<div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h5 class="modal-title" id="myModalLabel">
              	Online CICT Practicum Management System	

              </h5>
          </div>
          <div class="modal-body">
              <div class="row">
              	  <div class="col-sm-6">
                      <img src="<?= base_url(); ?>assets/img/logo-cict.png" alt="" class="img img-responsive">
                  </div>
                  <div class="col-sm-6">
                      <div class="well">
                      <h6>Be part of Online CICT Practicum Management System</h6>
                      <hr>
                          <form method="POST" ng-submit="login()" novalidate>
                              <div class="form-group">
                                  <label for="username" class="control-label">User ID</label>
                                  <input type="text" class="form-control" name="user_id" value="" 
                                  required="" title="Please enter you User ID" placeholder="example"
                                  ng-model="user_id"
                                  >
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" name="password" value="" 
                                  required="" title="Please enter your password" placeholder="*********"
                                  ng-model="password"
                                  >
                                  <span class="help-block"></span>
                              </div>

                             <!--  <div class="form-group">  
                              		<label for="position" class="control-label">Position</label>                           
                                	<select ng-model="position" class="form-control">
                                    <option value="Student">Student</option>
                                		<option value="Coordinator">Coordinator</option>
                                    <option value="Evaluator">Evaluator</option>
                                		
                                	</select>
                                  <span class="help-block"></span>
                              </div> -->
                              <p ng-show="invalidLogin" class="bg-danger">Wrong username or password</p>
                              <button type="submit" class="btn btn-primary btn-block">Login</button>
                              <a href="<?= base_url('main/register') ?>" class="btn btn-default btn-block" ng-hide="true">Register</a>
                              <a class="btn btn-default btn-block" ng-click="selectUser()">Register</a>
                          </form>
                      </div>
                  </div>
                  
              </div>
          </div>
      </div>
  </div>


  <div class="modal fade" id="selectUser" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Register As</h4>
        </div>
        <div class="modal-body">
            <div class="row">
              <div class="col-sm-6">
          
                <a href="<?= base_url('main/register') ?>" class="btn btn-primary btn-block">Student</a>
              </div>
              <div class="col-sm-6">
                <a href="<?= base_url('evaluator/register') ?>" class="btn btn-default btn-block">Evaluator</a>
              </div>
            </div>
        </div>
   
      </div>
      
    </div>
  </div>


		

