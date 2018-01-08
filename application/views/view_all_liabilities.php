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
          <i class="fa fa-table"></i>&nbsp; Liability List</div>
        <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead >
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Date</th>
                              <th scope="col">Amount</th>
                              <th scope="col">Interest Rate</th>
                              <th scope="col">Interest Amount</th>
                              <th scope="col">Contact Number</th>
                              <th scope="col">Address</th>
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
                            <td><?php echo $results->Amount;?></td>
                            <td><?php echo $results->InterestRate;?>%</td>
                            <td><?php echo number_format($results->InterestAmount/12);?></td>
                            <td><?php echo $results->ContactNumber;?></td>
                            <td><?php echo $results->Address;?></td>
                            <td><?php echo $results->Remark;?></td>
                            <td>
                                <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-info btn-sm" href="<?php echo base_url();?>Liability_Controller/View_Specific_Liability/<?php echo $results->Id;?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                <a data-toggle="tooltip" data-placement="top" title="Close" class="btn btn-danger btn-sm" href="<?php echo base_url();?>Liability_Controller/Close_Current_Liability/<?php echo $results->Id;?>"><i class="fa fa-times-circle" aria-hidden="true"></i>
</a>
                              <a data-toggle="tooltip" data-placement="top" title="Paid Back List" class="btn btn-info btn-sm margin-top" href="<?php echo base_url();?>Liability_Controller/Get_Paidback_List_Of_A_Liability/<?php echo $results->Id;?>"><i class="fa fa-list-alt" aria-hidden="true"></i>
</a>
                              <a data-toggle="tooltip" data-placement="top" title="Recieved List" class="btn btn-success btn-sm margin-top" href="<?php echo base_url();?>Liability_Controller/Get_Received_List_Of_A_Liability/<?php echo $results->Id;?>"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
                            
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
