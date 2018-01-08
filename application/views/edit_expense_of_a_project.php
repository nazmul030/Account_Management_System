<?php
include('admin_sidebar.php');
?>
<div class="container">
         <div class="card card-register mx-auto mt-5">
            <div class="card-header">Edit expense of a project</div>
            <div class="card-body">
              <form method="post" action="<?php echo base_url(); ?>Add_Project_Controller/Update_Expense_Of_A_Project" enctype="multipart/form-data">
                  <div class="form-group">
                   <div class="form-row">
                      <div class="col-md-12">
                         <label for="exampleConfirmPassword">Date</label>
                         <input id="datepicker" name="WithdrawDate" class="form-control" type="date" value="<?php echo $result->WithdrawDate;?>" required>
                      </div>
                   </div>
                  </div>
                  <div class="form-group">
                   <div class="form-row">
                      <div class="col-md-12">
                         <label for="exampleInputLastName">Previous Amount</label>
                         <input id="OldExpenseValue" name="OldExpenseValue" value="<?php echo $result->ProjectExpense;?>" readonly></input>
                      </div>
                   </div>
                </div>
                <div class="form-group">
                 <div class="form-row">
                    <div class="col-md-12">
                       <label for="exampleInputLastName">New Amount</label>
                       <input class="form-control" id="ProjectExpense" name="ProjectExpense" type="text" aria-describedby="nameHelp" value="<?php echo $result->ProjectExpense;?>" required>
                    </div>
                 </div>
               </div>
               <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-12">
                       <label for="exampleInputName">Withdraw Type</label>
                       <select class="form-control" name="WithdrawType" required>
                           <option value="Check" <?php if($result->WithdrawType=="Check") echo "selected=\"selected\""; ?>>Check</option>
                           <option value="Cash" <?php if($result->WithdrawType=="Cash") echo "selected=\"selected\""; ?>>Cash</option>
                       </select>
                    </div>
                 </div>
              </div>
              <div class="form-group">
                 <div class="form-row">
                  <div class="col-md-12">
                       <label for="exampleInputLastName">Withdraw Reason</label>
                       <textarea rows="2" cols="20" class="form-control" id="WithdrawReason" name="WithdrawReason" placeholder="Remark" required><?php echo $result->WithdrawReason;?></textarea>
                    </div>
               </div>
            </div>

            <input type="hidden" name="Id" value="<?php echo $result->Id;?>"></input>
            <input type="hidden" name="ProjectId" value="<?php echo $result->ProjectId;?>"></input>
            <button class="btn btn-success btn-block" name="SaveUpdate">Save</button>
            <button class="btn btn-danger btn-block" name="CancelUpdate">Cancel</button>
         </form>
        </div>
      </div>
   </div>
<?php
include ('logout_footer.php');
?>
