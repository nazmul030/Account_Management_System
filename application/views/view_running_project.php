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
            <i class="fa fa-table"></i> &nbsp; Running Project's List</div>
        <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead >
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Project Name</th>
                              <th scope="col">Client</th>
                              <th scope="col">Starting Date</th>
                              <th scope="col">Deadline</th>
                              <th scope="col">Budget</th>
                              <th scope="col">Expense</th>
                              <th scope="col">Income</th>
                              <th scope="col">Loss/Profit</th>
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
                            <td><?php echo $results->ProjectName;?></td>
                            <td><?php echo $results->ClientName;?></td>
                            <td><?php echo $results->StartDate;?></td>
                            <td><?php echo $results->EndDate;?></td>
                            <td><?php echo number_format($results->ProjectBudget);?></td>
                            <td><?php echo number_format($results->ProjectExpense);?></td>
                            <td><?php echo number_format($results->ProjectIncome);?></td>
                            <td><?php echo number_format($results->ProjectIncome - $results->ProjectExpense);?></td>
                            <td>
                              <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-info btn-sm" href="<?php echo base_url();?>Add_Project_Controller/Edit_Current_Project/<?php echo $results->Id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a>
                              <a class="btn btn-outline-danger " href="<?php echo base_url();?>Add_Project_Controller/Close_Current_Project/<?php echo $results->Id;?>" onclick="ConfirmClose()">Close</a>
                               <a class="btn btn-outline-dark margin-top" href="<?php echo base_url();?>Add_Project_Controller/Withdraw_Expense_From_Current_Project/<?php echo $results->Id;?>">Expense</a>
                                <a class="btn btn-outline-secondary margin-top" href="<?php echo base_url(); ?>Add_Project_Controller/View_Expense_List_Of_A_Project?pro_id=<?php echo $results->Id;?>">Expense History</a>
 
                            </td>
                          <?php }
                         }

                         ?>


                        </tr>
                        <tr >
                            <td colspan="3">
                                <?php echo $this->pagination->create_links();?>
                            </td>
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
