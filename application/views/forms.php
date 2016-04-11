<div ng-controller="coordinatorController">
<div class="container">
	<div class="row">
  <br>
			<br>
		<div class="printSection">
        <div class="col-sm-6 col-sm-offset-3">
        <!-- <div class="img img-responsive" style="background: #a80000;width: 100%;height: 100px">
           <div class="row">
             <div class="col-sm-9 col-sm-offset-3">
                <h3 style="color: #fff;font-family: 'Cambria';">BATAAN PENINSULA STATE UNIVERSITY</h3>
             </div>

           </div>
        </div>
 -->
        <img ng-src="<?= base_url() . 'assets/img/cictpracticumheader_final.png' ?>" alt="" class="img img-responsive">
        <table class="table table-responsive" style="background: white">
          <thead>
            
            <tr>
              <th>Form Name </th>
              <th>Download </th>
             
       

            </tr>
        
          </thead>
          <tbody>
            <tr>
              <td>Approval Form</td>
              <td> <a href="<?= base_url() . 'uploads/approval_form.doc' ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-download-alt"></span></a></td>
            </tr>
            <tr>
              <td>Recommendation Letter</td>
              <td> <a href="<?= base_url() . 'uploads/recommendation_letter.doc' ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-download-alt"></span></a></td>
            </tr>
          </tbody>

        </table>  
        </div>
    </div>
	</div>













</div>