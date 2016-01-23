<div class="container">
<div class="row">
                    <div class="col-md-12" data-wow-delay="0.2s">
                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                            <!-- Bottom Carousel Indicators -->
                           

                            <!-- Carousel Slides / Quotes -->
                            <div class="carousel-inner text-center">

                                <!-- Quote 1 -->
                                <div class="item active">
                        
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2">
                                                <h4>{{ announcements[0].title }}</h4>
                                                <p>{{ announcements[0].content }}</p>
                                            </div>
                                        </div>
                               
                                </div>
                                <!-- Quote 2 -->


                                <div class="item" ng-if="announcement.announcement_id != 1" ng-repeat="announcement in announcements">
                           
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2">
                                                    <h4>{{ announcement.title }}</h4>
                                                    <p>{{ announcement.content }}</p>
                                           
                                            </div>
                                        </div>
                                  
                                </div>


                                
                            </div>

                            <!-- Carousel Buttons Next/Prev -->
                            <div style="margin-top: -200px">
                                <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="glyphicon glyphicon-chevron-left"></i></a>
                            <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="glyphicon glyphicon-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
</div>



<div id="login-overlay" class="modal-dialog" style="margin-top: 150px">
      <div class="modal-content">
          
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-12">
          
                  <form role="form" type="POST" name="frmPostAnnouncement" ng-submit="postAnnouncement(title,content)" novalidate>

                        <legend>Add New Announcement</legend>
                        
                        <div class="form-group">

                          <label for=""><b>Title</b></label>
                          <input type="text" class="form-control" ng-model="title" placeholder="Title" required>
                        </div>
                        <div class="form-group">
                          <div class="form-group">
                            <label for=""><b>Content</b></label>
                            <textarea  class="form-control" rows="5" ng-model="content" placeholder="Write an announcement here" required></textarea>
                          </div>

                          
                        </div>

                        
                        <input type="submit" value="Post Announcement"ng-disabled="frmPostAnnouncement.$invalid" class="btn btn-primary btn-block btn-lg">
                  </form>
                  </div>
                  
              </div>
          </div>
      </div>
  </div>


<div class="container">
  <div class="row">
     
   <div class="col-sm-offset-2 col-sm-8">
        <div ng-repeat="announcement in announcements">
          
            <div class="panel panel-default">
            <div class="panel-heading">
            <strong>Coordinator</strong> <span class="text-muted">posted</span><span class="glyphicon glyphicon-pencil pull-right" 
            ng-click="showEditAnnouncement(announcement.title,announcement.content,announcement.announcement_id)"></span>
            </div>
            <div class="panel-body">
              <div class="text-center">
                  <div ng-hide="showEdit">
                      <h5><b>{{ announcement.title }}</b></h5>
                      <p>{{ announcement.content }}</p>
                  </div>

                  <div class="row" ng-show="showEdit">

                      <div class="col-sm-10 col-sm-offset-1">
                        <form role="form" type="POST" name="frmUpdateAnnouncement" 
                        ng-submit="updateAnnouncement(edited_title,edited_content,announcement.announcement_id)" novalidate>
                           <input type="text" class="form-control" ng-model="edited_title" placeholder="Title" required>
                           <textarea name="" id="input" class="form-control" rows="3" required="required" ng-model="edited_content"></textarea>
                          <input type="submit" value="Update Announcement"ng-disabled="frmUpdateAnnouncement.$invalid" class="btn btn-primary">
                        </form>
                      </div>
                  </div>
              </div>


            </div><!-- /panel-body -->
            </div><!-- /panel panel-default -->

        </div>     

  
   </div><!-- /col-sm-5 -->


   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Announcement</h4>
        </div>
        <div class="modal-body">
             <div class="row">

                      <div class="col-sm-10 col-sm-offset-1">
                        <form role="form" type="POST" name="frmUpdateAnnouncement" 
                        ng-submit="updateAnnouncement(edited_title,edited_content)" novalidate>
                           <div class="form-group">
                           <label for=""><b>Title</b></label>
                              <input type="text" class="form-control" ng-model="edited_title" placeholder="Title" required>
                           </div>
                          <div class="form-group">
                          <label for=""><b>Content</b></label>
                              <textarea name="" id="input" class="form-control" rows="3" required="required" ng-model="edited_content"></textarea>
                          </div>
                          <input type="submit" value="Update Announcement"ng-disabled="frmUpdateAnnouncement.$invalid" class="btn btn-primary">
                        </form>
                      </div>
                  </div>
        </div>
   
      </div>
      
    </div>
  </div>



  </div>
</div>