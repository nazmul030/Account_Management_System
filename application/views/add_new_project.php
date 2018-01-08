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
                        <div class="card-header">Add New Project</div>
                        <div class="card-body">
                           <form method="post" action="<?php echo base_url(); ?>Add_Project_Controller/Add_Project" enctype="multipart/form-data">
                              <div class="form-group">
                                 <div class="form-row">
                                    <div class="col-md-6 ">
                                       <label for="exampleInputName">Name</label>
                                       <input class="form-control" id="projectName" name="ProjectName" type="text" aria-describedby="nameHelp" required>
                                    </div>
                                    <div class="col-md-6">
                                       <label for="exampleInputLastName">Client Name</label>
                                       <input class="form-control" id="clientName" name="ClientName" type="text" aria-describedby="nameHelp" required>
                                    </div>
                                 </div>
                              </div>
                                <div class="form-group">
                                 <div class="form-row">
                                    <div class="col-md-6">
                                       <label for="exampleConfirmPassword">Starting Date</label>
                                       <input id="datepicker" name="StartDate" class="form-control" type="date" required>
                                    </div>
                                    <div class="col-md-6">
                                       <label for="exampleConfirmPassword">Deadline</label>
                                       <input id="datepicker" name="EndDate" class="form-control" type="date" required>
                                      </div>
                                 </div>
                              </div>
                                <div class="form-group">
                                 <div class="form-row">
                                    <div class="col-md-6">
                                       <label for="exampleInputLastName">Project Code</label>
                                       <input class="form-control" id="projectCode" name="ProjectCode" type="text" aria-describedby="nameHelp" required>
                                    </div>
                                    <div class="col-md-6">
                                       <label for="exampleConfirmPassword">Password</label>
                                       <input class="form-control" id="projectPassword" name="Password" type="password" required>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="form-row">
                                    <div class="col-md-6">
                                       <label for="exampleInputName">Budget</label>
                                       <input class="form-control" id="projectBudget" name="ProjectBudget" type="text" aria-describedby="nameHelp" required>
                                    </div>
                                    <div class="col-md-6">
                                       <label for="exampleInputEmail1">Expense</label>
                                       <input class="form-control" id="projectExpense" name="ProjectExpense" type="text" aria-describedby="emailHelp" required>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="form-row">
                                    <div class="col-md-12">
                                       <label for="exampleInputLastName">Remark</label>
                                       <textarea rows="2" cols="20" class="form-control" id="projectRemark" name="ProjectRemark" placeholder="Remark" required></textarea>
                                    </div>
                                 </div>
                              </div>
                              <button class="btn btn-success btn-block" name="projectSave">Add</button>
                              <button class="btn btn-danger btn-block" name="projectRegisterCancel">Cancel</button>
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
