<div class="container">
	<div class="row">
		<div class="col-sm-offset-2 col-sm-8">

			<div class="alert alert-danger fade in">
				<p ng-repeat="studentFileRequest in studentFileRequests">
					{{ studentFileRequest.user_id }} requested {{ studentFileRequest.file_name }}
				</p>
		    </div>
				
		</div>
	</div>
</div>