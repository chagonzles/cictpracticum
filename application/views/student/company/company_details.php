<div class="container">
	<div class="row">

	
	<div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h3 class="modal-title" id="myModalLabel">
              	<b><?= $company[0]->company_name ?></b>

              </h3>
          </div>

           <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="/#home" aria-controls="home" role="tab" data-toggle="tab">Company Details</a></li>
    <li role="presentation"><a href="/#apply" aria-controls="profile" role="tab" data-toggle="tab">Apply</a></li>
    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
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
                  <b>Company Email Address:</b>
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
    <div role="tabpanel" class="tab-pane" id="apply">
        <div class="modal-body">
        <h4><b>Apply for <?= $company[0]->company_name ?></b></h4>
              <div class="row">
                      <div class="col-xs-4">
                        <b>Company Contact No:</b>
                      </div>
                      <div class="col-xs-8">
                        <?= $company[0]->company_contact_no ?>
                      </div>
            </div> <!-- row -->

            <div class="row">
                <div class="col-xs-4">
                  <b>Company Email Address:</b>
                </div>
                <div class="col-xs-8">
                  <?= $company[0]->company_email ?>
                </div>
            </div><!-- row -->

              <div class="row">
                        <div class="col-xs-4">
                          <b>Company Website URL:</b>
                        </div>
                        <div class="col-xs-8">
                        <a href=""><?= $company[0]->company_website_url?></a>
                        </div>
              </div> <!-- row -->
        </div><!-- modal body -->
    </div><!-- tab panel -->

  </div>








          
      </div>
  </div>

		
















	</div>
</div>