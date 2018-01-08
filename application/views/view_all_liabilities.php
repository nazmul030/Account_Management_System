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
                              <a class="btn btn-outline-info " href="<?php echo base_url();?>Liability_Controller/View_Specific_Liability/<?php echo $results->Id;?>">Edit</a>
                                <a class="btn btn-danger " href="<?php echo base_url();?>Liability_Controller/Close_Current_Liability/<?php echo $results->Id;?>">Close</a>
                              <a class="btn btn-outline-secondary margin-top" href="<?php echo base_url();?>Liability_Controller/Get_Paidback_List_Of_A_Liability/<?php echo $results->Id;?>">Paid Back List</a>
                              <a class="btn btn-outline-success margin-top" href="<?php echo base_url();?>Liability_Controller/Get_Received_List_Of_A_Liability/<?php echo $results->Id;?>">Received List</a>
                            
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
