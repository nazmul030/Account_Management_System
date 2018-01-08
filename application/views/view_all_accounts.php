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
          <i class="fa fa-table"></i>Information of all the accounts</div>
        <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead >
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Account Name</th>
                              <th scope="col">Account Number</th>
                              <th scope="col">Bank Name</th>
                              <th scope="col">Current Balance</th>
                              <th scope="col">Address</th>
                              <th scope="col">Contact No 1</th>
                              <th scope="col">Contact No 2</th>
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
                            <td><?php echo $results->AccountName;?></td>
                            <td><?php echo $results->AccountNumber;?></td>
                            <td><?php echo $results->BankName;?></td>
                            <td><?php echo number_format($results->Amount);?></td>
                            <td><?php echo $results->Address;?></td>
                            <td><?php echo $results->ContactNo1;?></td>
                            <td><?php echo $results->ContactNo2;?></td>
                            <td>
                              <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-info btn-sm" href="<?php echo base_url();?>Account_Controller/View_Specific_Account/<?php echo $results->Id;?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                              <a data-toggle="tooltip" data-placement="top" title="Deposit History" class="btn btn-info btn-sm" href="<?php echo base_url();?>Account_Controller/Get_Specific_Acc_Deposit_History?acc_no=<?php echo $results->AccountNumber;?>"><i class="fa fa-history" aria-hidden="true"></i>
</a>
                              <a data-toggle="tooltip" data-placement="top" title="Withdraw History" class="btn btn-success btn-sm margin-top" href="<?php echo base_url();?>Account_Controller/Get_Specific_Acc_Withdraw_History?acc_no=<?php echo $results->AccountNumber;?>"><i class="fa fa-history" aria-hidden="true"></i>
</a>
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
