<div ng-controller="studentController">
<nav class="navbar navbar-inverse" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">Online CICT Practicum Management System</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li><a href="<?= base_url('/') ?>">Home</a></li>
		<!-- 	<li><a href="#">Messages</a></li> -->
			
			<!-- <li><a href="#">About</a></li> -->

<div class="dropdown pull-left">
  <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html" style="color: white">
    Announcement <span class="badge" ng-show="announcements.length > 0">{{ announcements.length }}</span>
  </a>
  
  <ul class="dropdown-menu notifications" role="menu" aria-labelledby="dLabel">
    
    <div class="notification-heading"><h4 class="menu-title">Announcements</h4><!-- <h4 class="menu-title pull-right">View all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4> -->
    </div>
    <li class="divider"></li>
   <div class="notifications-wrapper">
     <a class="content" href="#" ng-repeat="announcement in announcements" ng-click="viewAnnouncement(announcement)">
      
       <div class="notification-item" style="background: #F2F2F2 !important">
        <b><h4 class="item-title">{{ announcement.title }}</h4></b>
        <!-- <p class="item-info">Marketing 101, Video Assignment</p> -->
      </div>
       </a>
    

   </div>
    <li class="divider"></li>
    <!-- <div class="notification-footer"><h4 class="menu-title">View all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4></div> -->
  </ul>
  
</div><!-- notification dropdown -->
				<li><a href="<?= base_url('student/forms') ?>">Forms</a></li>

			<!-- <li><a href="<?= base_url('student/announcements') ?>">Announcements</a></li> -->
			<!-- <li><a href="<?= base_url('student/company') ?>">Company</a></li> -->
		
		</ul><!-- navbar -->
		
		<ul class="nav navbar-nav navbar-right">
		
			<li><a href="<?= base_url('student/logout') ?>">Logout</a></li>
		</ul>
	</div><!-- /.navbar-collapse -->
</nav>




<div class="modal fade" id="announcementDialog" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">{{ title }}</h4>
        </div>
        <div class="modal-body">
             <div class="row">
				<div class="col-sm-12">
					<p>{{ content }}</p>
				</div>
             
             </div>
        </div>
   
      </div>
      
    </div>
  </div>