<?php
include('admin_sidebar.php');
?>
<div class="container">
         <div class="card card-register mx-auto mt-5">
            <div class="card-header">Update Employee Information</div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url(); ?>Employee_Controller/Update_Employee" enctype="multipart/form-data">
                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-6">
                           <label for="exampleInputName">Name</label>
                           <input class="form-control" id="employeeName" name="employeeName" type="text" aria-describedby="nameHelp" value="<?php echo $result->Name;?>" required>
                        </div>
                        <div class="col-md-6">
                           <label for="exampleInputLastName">Designation</label>
                           <input class="form-control" id="employeeDesignation" name="employeeDesignation" type="text" aria-describedby="nameHelp" value="<?php echo $result->Designation;?>" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-12">
                           <label for="exampleInputLastName">Address</label>
                           <input class="form-control" id="employeeAddress" name="employeeAddress" type="text" aria-describedby="nameHelp" value="<?php echo $result->Address;?>" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-6">
                           <label for="exampleConfirmPassword">Date Of Birth</label>
                           <input id="datepicker" name="employeeDateOfBirth" class="form-control" value="<?php echo $result->DateOfBirth;?>" required>
                        </div>
                        <div class="col-md-6">
                           <label for="exampleInputName">Contact No.</label>
                           <input class="form-control" id="employeeContact" name="employeeContact" type="text" aria-describedby="nameHelp" value="<?php echo $result->ContactNo;?>" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-row">
                       <div class="col-md-6">
                          <label for="exampleConfirmPassword">NID Number</label>
                          <input id="nID" name="employeeNID" class="form-control" value="<?php echo $result->NID;?>" required>
                       </div>
                       <div class="col-md-6">
                          <label for="exampleInputEmail">Email Address</label>
                          <input class="form-control" id="employeeEmail" name="employeeEmail" type="email" aria-describedby="emailHelp" value="<?php echo $result->EmailAddress;?>" required>
                       </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-6">
                           <label for="exampleInputEmail1">Employee Type</label>
                           <select class="form-control" name="employeeType" required>
                              <option value="Admin" <?php if($result->EmployeeType=="Admin") echo "selected=\"selected\""; ?>>Admin</option>
                              <option value="Manager" <?php if($result->EmployeeType=="Manager") echo "selected=\"selected\""; ?>>Manager</option>
                              <option value="Visitor" <?php if($result->EmployeeType=="Visitor") echo "selected=\"selected\""; ?>>Visitor</option>
                           </select>
                        </div>
                        <div class="col-md-6">
                           <label for="exampleConfirmPassword">Image</label>
                           <input type="file" name="image">
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-6">
                           <label>Employee ID</label>
                           <input class="form-control" id="employeeID" name="employeeID" type="text" value="<?php echo $result->EmployeeId;?>">
                        </div>
                        <div class="col-md-6">
                           <label for="exampleConfirmPassword">Password</label>
                           <input class="form-control" id="employeePassword" name="employeePassword" type="text" value="<?php echo $result->Password;?>">
                        </div>
                     </div>
                  </div>
                  <button class="btn btn-success btn-block" name="employeeInfoUpdate">Update</button>
                  <button class="btn btn-danger btn-block" name="employeeInfoUpdateCancel">Cancel</button>
               </form>
            </div>
         </div>
      </div>
<?php
include ('logout_footer.php');
?>
