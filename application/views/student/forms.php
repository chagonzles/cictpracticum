<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list"></span>On-the-Job-Training Forms
                    <div class="pull-right action-buttons">
                        <div class="btn-group pull-right">
                           
                            <ul class="dropdown-menu slidedown">
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span>Edit</a></li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-trash"></span>Delete</a></li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-flag"></span>Flag</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            Application Form - Sheet A
                            <div class="pull-right action-buttons">
                                <a href="<?= base_url('student/forms/sheet_a') ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                            </div>
                        </li>

                        <li class="list-group-item">
                            Application Form - Sheet B
                            <div class="pull-right action-buttons">
                                <a href="<?= base_url('student/forms/sheet_b/' . $this->session->userdata('student_id')) ?>" ng-click="getSheetBData()"><span class="glyphicon glyphicon-pencil"></span></a>
                            </div>
                        </li>

                        <li class="list-group-item">
                            Waiver Form
                            <div class="pull-right action-buttons">
                                <a href="<?= base_url('student/forms/waiver') ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                            </div>
                        </li>


                        <li class="list-group-item">
                            Weekly Progress Reports
                            <div class="pull-right action-buttons">
                                <a href="<?= base_url('student/forms/weekly_progress_reports') ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                            </div>
                        </li>

                    </ul>

    
                </div>
                
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list"></span>Attached Files
                    <div class="pull-right action-buttons">
                        <div class="btn-group pull-right">
                           
                            <ul class="dropdown-menu slidedown">
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span>Edit</a></li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-trash"></span>Delete</a></li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-flag"></span>Flag</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm-4">File</div>
                                <div class="col-sm-3">Form Type</div>
                                <div class="col-sm-3">Status</div>
                                <div class="col-sm-2">Options</div>
                            </div>
                        </li>
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item" ng-repeat="attachedfile in attachedfiles">
                        <div class="row">
                            <div class="col-sm-4">{{ attachedfile.file_name }}</div>
                            <div class="col-sm-3">
                                 {{ attachedfile.form_type }}
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-default btn-xs" ng-show="attachedfile.status == 'pending'">Pending</button>
                                <button type="button" class="btn btn-success btn-xs" ng-show="attachedfile.status == 'approved'">Approved</button>
                                <button type="button" class="btn btn-primary btn-xs" ng-show="attachedfile.status == 'rejected'">Rejected</button>
                            </div>
                            <div class="col-sm-2">
                                <a href="{{ attachedfile.file_path }}" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-download-alt"></span></a>

                                <button type="button" class="btn btn-primary btn-xs" ng-click="deleteAttachedFile(attachedfile.attached_file_id)">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                             
                            </div>
                        </div>
                            
                            
                      

                           
                        </li>

                        <li class="list-group-item" ng-show="attachedfiles.length == 0">
                            No attached file
                            
                        </li>
                        <br>
                        <div class="row" ng-show="attachedfiles.length < 3">
                                <?php echo form_open_multipart('student/do_upload');?>
                            <div class="col-sm-6">
                                <input type="file" ng-model="userfile" name="userfile" class="btn btn-default btn-sm" size="200"
                                onchange="angular.element(this).scope().checkFile(userfile)"
                                />
                            </div>
                            <div class="col-sm-3">
                                <select name="form_type" class="form-control" required="required" ng-model="form_type">
                                    <option value=""></option>
                                    <option value="Resume" ng-hide="findIndex(attachedfiles,'form_type','Resume') != null">Resume</option>
                                    <option value="Medical Certificate" ng-hide="findIndex(attachedfiles,'form_type','Medical Certificate') != null">Medical Certificate</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                 <input type="submit" class="btn btn-primary pull-right" 
                                 value="Upload Form" ng-disabled="browsedFile == false || form_type == '' 
                                                                  || form_type == null || form_type == undefined"></input>
                            </div>

                            </form>
                            <br>
                        </div>
                       
                        
                       


                    </ul>
                    
                </div>

            </div>
        </div>

       
    
    </div>
</div>


<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

