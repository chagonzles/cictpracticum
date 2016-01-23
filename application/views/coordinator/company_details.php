<div class="container">
	<div class="row">

	
	<div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">
              	<b><?= $company[0]->company_name ?></b>

              </h4>
          </div>
          <div class="modal-body">
         	  <div class="row">
         	  		<div class="col-xs-4">
         	  			<b>Company Address: </b>
         	  		</div>
         	  		<div class="col-xs-8">
         	  			<?= $company[0]->company_address ?>
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
         	  			<b>Company Email </b>
         	  		</div>
         	  		<div class="col-xs-8">
         	  			<?= $company[0]->company_email ?>
         	  		</div>
         	  </div>
              <div class="row">
              	  <div class="col-xs-12">
              	  	<h4>
              	  		<b>Company Overview</b>
              	  	</h4>
                      <p><?= $company[0]->company_overview ?></p>
                  </div>
              </div>
          </div>
      </div>
  </div>

		
















	</div>
</div>