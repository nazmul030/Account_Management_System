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
                        <div class="card-header">Add New Account</div>
                        <div class="card-body">
                           <form method="post" action="<?php echo base_url(); ?>Account_Controller/Add_New_Account" enctype="multipart/form-data">
                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-6">
                           <label for="exampleInputName">Account Name</label>
                           <input class="form-control" id="AccountName" name="AccountName" type="text" aria-describedby="nameHelp" required>
                        </div>
                        <div class="col-md-6">
                           <label for="exampleInputLastName">Account Number</label>
                           <input class="form-control" id="AccountNumber" name="AccountNumber" type="text" aria-describedby="nameHelp" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                   <div class="form-row">
                     <div class="col-md-6">
                        <label for="exampleConfirmPassword">Bank Name</label>
                        <input class="form-control" id="BankName" name="BankName" type="text" aria-describedby="nameHelp" required>
                     </div>
                     <div class="col-md-6">
                        <label for="exampleConfirmPassword">Address</label>
                        <input class="form-control" id="Address" name="Address" type="text" aria-describedby="nameHelp">
                     </div>
                   </div>
                 </div>
                 <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6">
                       <label for="exampleConfirmPassword">Initial Balance</label>
                       <input class="form-control" id="InitialBalance" name="InitialBalance" type="text" aria-describedby="nameHelp">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                   <div class="form-row">
                      <div class="col-md-6">
                         <label for="exampleInputLastName">Contact Number 1</label>
                         <input class="form-control" id="ContactNo1" name="ContactNo1" type="text" aria-describedby="nameHelp">
                      </div>
                      <div class="col-md-6">
                         <label for="exampleConfirmPassword">Contact Number 2</label>
                         <input class="form-control" id="ContactNo2" name="ContactNo2" type="text" aria-describedby="nameHelp">
                     </div>
                   </div>
                </div>
                  <button class="btn btn-success btn-block" name="SaveAccount">Add</button>
                  <button class="btn btn-danger btn-block" name="AccountSaveCancel">Cancel</button>
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
