<div class="container">
	<div class="row">
		<div class="col-sm-12">
			
			<div class="row">
				<div class="col-sm-6">
					<h4>Student Name: 
				{{ studentProgEval[0].student_lname + ',' 
				 + studentProgEval[0].student_fname + ' ' + studentProgEval[0].student_mname
				 + '[' + studentProgEval[0].student_id + ']'
				 }}</h4> 
				</div><!-- left col 6 student info -->
				<div class="col-sm-6">
					<button type="button" class="btn btn-primary pull-right">Edit</button>
					<button type="button" class="btn btn-default pull-right">Save</button>
				</div>
			</div><!-- row student info -->

		</div><!-- col entire page -->
	</div><!-- row entire page -->
</div>