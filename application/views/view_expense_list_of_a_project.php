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
            <i class="fa fa-table"></i>&nbsp;Expense List</div>
        <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead >
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Expense Amount</th>
                              <th scope="col">Withdraw Date</th>
                              <th scope="col">Withdraw Type</th>
                              <th scope="col">Reason</th>
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
                            <td><?php echo number_format($results->ProjectExpense);?></td>
                            <td><?php echo $results->WithdrawDate;?></td>
                            <td><?php echo $results->WithdrawType;?></td>
                            <td><?php echo $results->WithdrawReason;?></td>
                            <td>
                              <a class="btn btn-info" href="<?php echo base_url();?>Add_Project_Controller/View_Specific_Expense/<?php echo $results->Id;?>">Edit</a>
                            </td>
                          <?php }
                         }

                         ?>
                        </tr>
                        <tr>
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
