<?php
include ('admin_sidebar.php');
?>

<div class="container">
         <div class="card card-register mx-auto mt-5">
            <div class="card-header">Add new employee</div>
            <div class="card-body">
               <form method="post" action="<?php echo base_url(); ?>Employee_Controller/Add_Employee" enctype="multipart/form-data">
                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-6">
                           <label for="exampleInputName">Name</label>
                           <input class="form-control" id="employeeName" name="employeeName" type="text" aria-describedby="nameHelp" placeholder="Employee Name" required>
                        </div>
                        <div class="col-md-6">
                           <label for="exampleInputLastName">Designation</label>
                           <input class="form-control" id="employeeDesignation" name="employeeDesignation" type="text" aria-describedby="nameHelp" placeholder="Designation" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-12">
                           <label for="exampleInputLastName">Address</label>
                           <textarea rows="2" cols="20" class="form-control" id="employeeAddress" name="employeeAddress" placeholder="Address" required></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-6">
                           <label for="exampleConfirmPassword">Date Of Birth</label>
                           <input id="datepicker" name="employeeDateOfBirth" class="form-control" placeholder="Date Of Birth" required>
                        </div>
                        <div class="col-md-6">
                           <label for="exampleInputName">Contact No.</label>
                           <input class="form-control" id="employeeContact" name="employeeContact" type="text" aria-describedby="nameHelp" placeholder="Contact" required>                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-row">
                       <div class="col-md-6">
                          <label for="exampleConfirmPassword">NID Number</label>
                          <input id="nID" name="employeeNID" class="form-control" placeholder="NID NO." required>
                       </div>
                       <div class="col-md-6">
                          <label for="exampleInputEmail">Email Address</label>
                          <input class="form-control" id="employeeEmail" name="employeeEmail" type="email" aria-describedby="emailHelp" placeholder="Enter Email Address" required>
                       </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-6">
                           <label for="exampleInputEmail1">Employee Type</label>
                           <select class="form-control" name="employeeType" required>
                              <option value="">Select Employee Type</option>
                              <option value="Admin">Admin</option>
                              <option value="Manager">Manager</option>
                              <option value="Visitor">Visitor</option>
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
                           <input class="form-control" id="employeeID" name="employeeID" type="text" placeholder="Employee ID" required>
                        </div>
                        <div class="col-md-6">
                           <label for="exampleConfirmPassword">Password</label>
                           <input class="form-control" id="employeePassword" name="employeePassword" type="text" placeholder="Employee Password" required>
                        </div>
                     </div>
                  </div>
                  <button class="btn btn-success btn-block" name="employeeRegister">Register</button>
                  <button class="btn btn-danger btn-block" name="employeeRegisterCancel">Cancel</button>
               </form>
            </div>
         </div>
      </div>
<?php
include('logout_footer.php');
?>
