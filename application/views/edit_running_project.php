<?php
include('admin_sidebar.php');
?>
<div class="container">
         <div class="card card-register mx-auto mt-5">
            <div class="card-header">Edit project information</div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url(); ?>Add_Project_Controller/Update_Project" enctype="multipart/form-data">
                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-6">
                           <label for="exampleInputName">Name</label>
                           <input class="form-control" id="projectName" name="ProjectName" type="text" aria-describedby="nameHelp" value="<?php echo $result->ProjectName;?>" required>
                        </div>
                        <div class="col-md-6">
                           <label for="exampleInputLastName">Client Name</label>
                           <input class="form-control" id="clientCode" name="ClientName" type="text" aria-describedby="nameHelp" value="<?php echo $result->ClientName;?>" required>
                        </div>
                     </div>
                  </div>
                    <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-6">
                           <label for="exampleConfirmPassword">Starting Date</label>
                           <input id="datepicker" name="StartDate" class="form-control" type="date" value="<?php echo $result->StartDate; ?>" required>
                        </div>
                        <div class="col-md-6">
                           <label for="exampleConfirmPassword">Deadline</label>
                           <input id="datepicker" name="EndDate" class="form-control" type="date" value="<?php echo $result->EndDate; ?>" required>
                          </div>
                     </div>
                  </div>
                    <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-6">
                           <label for="exampleInputLastName">Project Code</label>
                           <input class="form-control" id="projectCode" name="ProjectCode" type="text" aria-describedby="nameHelp" value="<?php echo $result->ProjectCode; ?>" required>
                        </div>
                        <div class="col-md-6">
                           <label for="exampleConfirmPassword">Password</label>
                           <input class="form-control" id="projectPassword" name="Password" type="text" value="<?php echo $result->Password; ?>" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-6">
                           <label for="exampleInputName">Budget</label>
                           <input class="form-control" id="projectBudget" name="ProjectBudget" type="text" aria-describedby="nameHelp" value="<?php echo $result->ProjectBudget;?>" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-6">
                           <label for="exampleInputEmail1">Expense</label>
                           <input class="form-control" id="projectExpense" name="ProjectExpense" type="text" aria-describedby="emailHelp" value="<?php echo $result->ProjectExpense;?>" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-12">
                           <label for="exampleInputLastName">Remark</label>
                           <textarea rows="2" cols="20" class="form-control" id="ProjectRemark" name="ProjectRemark" placeholder="Remark" required><?php echo $result->ProjectRemark; ?></textarea>
                        </div>
                     </div>
                  </div>
                       <input id="datepicker" name="ProjectId" class="form-control" type="hidden" value="<?php echo $result->Id; ?>" >
                  <button class="btn btn-success btn-block" name="updateproject">Update</button>
                  <button class="btn btn-danger btn-block" name="cancelproject">Cancel</button>
               </form>
            </div>
         </div>
      </div>
<?php
include ('logout_footer.php');
?>
