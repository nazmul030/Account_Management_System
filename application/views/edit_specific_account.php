<?php
include('admin_sidebar.php');
?>
<div class="container">
         <div class="card card-register mx-auto mt-5">
            <div class="card-header">Edit project information</div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url(); ?>Account_Controller/Update_Account" enctype="multipart/form-data">
                    <div class="form-group">
                       <div class="form-row">
                          <div class="col-md-6">
                             <label for="exampleInputName">Account Name</label>
                             <input class="form-control" id="AccountName" name="AccountName" type="text" aria-describedby="nameHelp" value="<?php echo $result->AccountName; ?>" required>
                          </div>
                          <div class="col-md-6">
                             <label for="exampleInputLastName">Account Number</label>
                             <input class="form-control" id="AccountNumber" name="AccountNumber" type="text" aria-describedby="nameHelp" value="<?php echo $result->AccountNumber; ?>" required>
                          </div>
                       </div>
                    </div>
                    <div class="form-group">
                     <div class="form-row">
                       <div class="col-md-6">
                          <label for="exampleConfirmPassword">Bank Name</label>
                          <input class="form-control" id="BankName" name="BankName" type="text" aria-describedby="nameHelp" value="<?php echo $result->BankName; ?>" required>
                       </div>
                       <div class="col-md-6">
                          <label for="exampleConfirmPassword">Address</label>
                          <input class="form-control" id="Address" name="Address" type="text" aria-describedby="nameHelp" value="<?php echo $result->Address; ?>">
                       </div>
                     </div>
                   </div>
                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-6">
                           <label for="exampleInputLastName">Contact Number 1</label>
                           <input class="form-control" id="ContactNo1" name="ContactNo1" type="text" aria-describedby="nameHelp" value="<?php echo $result->ContactNo1; ?>">
                        </div>
                        <div class="col-md-6">
                           <label for="exampleConfirmPassword">Contact Number 2</label>
                           <input class="form-control" id="ContactNo2" name="ContactNo2" type="text" aria-describedby="nameHelp" value="<?php echo $result->ContactNo2; ?>">
                       </div>
                     </div>
                  </div>
                  <input id="datepicker" name="Id" class="form-control" type="hidden" value="<?php echo $result->Id; ?>">
                  <button class="btn btn-success btn-block" name="UpdateAccount">Update</button>
                  <button class="btn btn-danger btn-block" name="CancelUpdate">Cancel</button>
               </form>
            </div>
         </div>
      </div>
<?php
include ('logout_footer.php');
?>
