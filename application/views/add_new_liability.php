<?php
include('admin_sidebar.php');

  ?>
   <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->

      <div class="row">
        <div class="col-12">
            <div class="row">
                <div></div>
                <div class="col-md-8 offset-md-2">
                    <div class="card mb-3">
                        <div class="card-header">ADD LIABILITY </div>
                        <div class="card-body">
                           <form method="post" action="<?php echo base_url(); ?>Liability_Controller/Add_New_Liability" enctype="multipart/form-data">
                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-6">
                           <label for="exampleInputName">Name</label>
                           <input class="form-control" id="Name" name="Name" type="text" aria-describedby="nameHelp" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-6">
                           <label for="exampleInputName">Amount</label>
                           <input class="form-control" id="Amount" name="Amount" type="text" aria-describedby="nameHelp" required>
                        </div>
                        <div class="col-md-6">
                           <label for="exampleConfirmPassword">Date</label>
                           <input id="datepicker" name="Date" class="form-control" type="date" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-6">
                           <label for="exampleInputLastName">Interest Rate</label>
                           <input class="form-control" id="InterestRate" name="InterestRate" type="text" aria-describedby="nameHelp" required>
                        </div>
                        <div class="col-md-6">
                           <label for="exampleConfirmPassword">Interest Amount</label>
                           <input class="form-control" id="InterestAmount" name="InterestAmount" type="text" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-6">
                           <label for="exampleInputName">Contact Number</label>
                           <input class="form-control" id="ContactNumber" name="ContactNumber" type="text" aria-describedby="nameHelp" required>
                        </div>
                        <div class="col-md-6">
                           <label for="exampleInputEmail1">Address</label>
                           <input class="form-control" id="Address" name="Address" type="text" aria-describedby="emailHelp" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-12">
                           <label for="exampleInputLastName">Remark</label>
                           <textarea rows="2" cols="20" class="form-control" id="Remark" name="Remark" placeholder="Remark"></textarea>
                        </div>
                     </div>
                  </div>
                  <button class="btn btn-success btn-block" name="SaveLiability">Add</button>
                  <button class="btn btn-danger btn-block" name="LiabilitySaveCancel">Cancel</button>
               </form>

                     </div>
                   </div>
     </div>
               

      </div>
    </div>
   </div>

<?php
          include('logout_footer.php');

?>
