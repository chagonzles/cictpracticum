<div ng-controller="evaluatorController">
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
			<li><a href="<?= base_url('evaluator/home') ?>">Home</a></li>
		</ul>
		<div class="dropdown pull-left" style="margin-left: -5px;margin-top:1px">
  <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html" style="color: white">
    Progress Reports <span class="badge" ng-show="weekly_progress_reports.length > 0">{{ weekly_progress_reports.length }}</span>
  </a>
  
  <ul class="dropdown-menu notifications" role="menu" aria-labelledby="dLabel">
    
    <div class="notification-heading"><h4 class="menu-title">Progress Reports</h4><!-- <h4 class="menu-title pull-right">View all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4> -->
    </div>
    <li class="divider"></li>
   <div class="notifications-wrapper">
     <a class="content" href="#" ng-repeat="wpr in weekly_progress_reports" ng-click="viewWeeklyProgressReport(wpr.weekly_report_id)">
      
       <div class="notification-item" style="background: #F2F2F2 !important">
        <b><h4 class="item-title"><b>{{ wpr.firstname +  ' ' + wpr.lastname }}</b> {{ ' submitted Weekly Progress Report' + ' (Wk No. ' + wpr.week_no + ')' }}</h4></b>
        <!-- <p class="item-info">Marketing 101, Video Assignment</p> -->
      </div>
       </a>
    

   </div>
    <li class="divider"></li>
    <!-- <div class="notification-footer"><h4 class="menu-title">View all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4></div> -->
  </ul>
  
</div><!-- notification dropdown -->
		<ul class="nav navbar-nav navbar-right">
		
			<li><a href="<?= base_url('evaluator/logout') ?>">Logout</a></li>
		</ul>
	</div><!-- /.navbar-collapse -->
</nav>