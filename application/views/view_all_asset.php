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
            <i class="fa fa-table"></i> &nbsp; All Assets List</div>
        <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead >
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Date</th>
                              <th scope="col">Price</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Total Price</th>
                              <th scope="col">Project Name</th>
                              <th scope="col">Remark</th>
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
                            <td><?php echo $results->Name;?></td>
                            <td><?php echo $results->Date;?></td>
                            <td><?php echo number_format($results->Price);?></td>
                            <td><?php echo number_format($results->Quantity);?></td>
                            <td><?php echo number_format(($results->Price * $results->Quantity));?></td>
                            <td><?php echo $results->ProjectName;?></td>
                            <td><?php echo $results->Remark;?></td>
                            <td>
                              <a class="btn btn-outline-info" href="<?php echo base_url();?>Add_Project_Controller/Edit_Specific_Asset/<?php echo $results->Id;?>">Edit</a>
                              <a class="btn btn-outline-danger margin-top" href="<?php echo base_url();?>Add_Project_Controller/Close_Current_Asset/<?php echo $results->Id;?>" onclick="ConfirmClose()">Delete</a>
                            </td>
                          <?php
                              }
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
