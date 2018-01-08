<?php
include('admin_sidebar.php');

  ?>
   <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->

      <div class="row">
        <div class="col-12">
        <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Employee List</div>
        <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead >
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Image</th>
                              <th scope="col">Employee Name</th>
                              <th scope="col">Designation</th>
                              <th scope="col">Address</th>
                              <th scope="col">Date of Birth</th>
                              <th scope="col">Contact No.</th>
                              <th scope="col">NID</th>
                              <th scope="col">Email Address</th>
                              <th scope="col">Employee Type</th>
                              <th scope="col">Employee Id</th>
                              <th scope="col">Password</th>
                              <th scope="col">Action</th>
                            </tr>
                      </thead>

                      <tbody>
                         <?php if(!empty($result)){
                              ?>
                        <?php

                        $i=0;

                        foreach($result as $results){
                            $i=$i+1;
                            ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><img src="<?php echo base_url('.image/$results->Images');?>"></td>
                            <td><?php echo $results->Name;?></td>
                            <td><?php echo $results->Designation;?></td>
                            <td><?php echo $results->Address;?></td>
                            <td><?php echo $results->DateOfBirth;?></td>
                            <td><?php echo $results->ContactNo;?></td>
                            <td><?php echo $results->NID;?></td>
                            <td><?php echo $results->EmailAddress;?></td>
                            <td><?php echo $results->EmployeeType;?></td>
                            <td><?php echo $results->EmployeeId;?></td>
                            <td><?php echo $results->Password;?></td>
                            <td><a class="btn btn-info" href="<?php echo base_url();?>Employee_Controller/View_Specific_Employee/<?php echo $results->EmployeeId;?>">Edit</a>
                                <a class="btn btn-danger margin-top" href="<?php echo base_url();?>Employee_Controller/Delete_Employee/<?php echo $results->EmployeeId;?>">Delete</a>
                            </td>
                          <?php }
                         }

                         ?>


                        </tr>

                        </tbody>

             </table>

         </div>
        </div>
      </div>
    </div>
      </div>
    </div>
   </div>


<?php
          include('logout_footer.php');


?>
