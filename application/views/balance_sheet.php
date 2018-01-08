<?php
include('admin_sidebar.php');

  ?>
   <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->

      <div class="row">
        <div class="col-12">
             <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-usd" aria-hidden="true"></i>
              </div>

                <div class="mr-5"><p>Current Balance</p></div>
                <div class="mr-5"><?php echo $current_balance->Amount; ?>&nbsp;<a href="<?php echo base_url();?>Welcome/Deposite" >Deposit Now</a></div>
               <div class="mr-5">
                   <p> </p>
                </div>
            </div>

          </div>
        </div>
                  <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-usd" aria-hidden="true"></i>
              </div>

              <div class="mr-5"><p>Total Deposit</div>
              <div class="mr-5"><?php echo $total_deposite->DepositeAmount; ?></div>
               <div class="mr-5">
                <p></p>
                </div>
            </div>

          </div>
        </div>
                 <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-usd" aria-hidden="true"></i>
              </div>

              <div class="mr-5"><p>Total Withdraw</div>
              <div class="mr-5"><?php echo $total_withdraw->WithdrawAmount; ?></div>
               <div class="mr-5">
                <p></p>
                </div>
            </div>

          </div>
        </div>
      </div>
    <div class="row">

         <div class="col-md-6">
                     <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>All Deposit History</div>
        <div class="card-body">
          <div class="table-responsive">
              <div class="row">
                  <div class=" col-md-2">
                      <a class="btn btn-info"  href="#"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Print Excel</a>
                  </div>
                  <div class="col-sm-1">
                      &nbsp;
                  </div>
                  <div class="col-md-offset-2 col-md-2">
                      <a class="btn btn-dark"  href="#"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Print PDF</a>
                  </div>
              </div>
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead >
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Date</th>
                              <th scope="col">Amount</th>
                              <th scope="col">Deposit Type</th>
                            </tr>
                          </thead>


                        <tbody>
                         <?php if(!empty($result)){
                              ?>
                        <?php

                        $i = 0;

                        foreach($result as $results){
                            $i = $i+1;
                            ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $results->DepositDate;?></td>
                            <td><?php echo $results->DepositAmount;?></td>
                            <td> <?php echo $results->DepositType;?></td>
                          <?php }
                         }
 else {

     ?>
                        <tr>

                                No Data is available


                        </tr>
                  <?php
                         }
                         ?>


                        </tr>

                        </tbody>

             </table>

         </div>
        </div>
      </div>
                </div>
        <div class="col-md-6">
        <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>All Withdraw History</div>
        <div class="card-body">
          <div class="table-responsive">
              <div class="row">
                  <div class=" col-md-2">
                      <a class="btn btn-info"  href="#"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Print Excel</a>
                  </div>
                  <div class="col-sm-1">
                      &nbsp;
                  </div>
                  <div class="col-md-offset-2 col-md-2">
                      <a class="btn btn-dark"  href="#"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Print PDF</a>
                  </div>
              </div>
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead >
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Date</th>
                              <th scope="col">Amount</th>

                            </tr>
                          </thead>


                        <tbody>
                         <?php if(!empty($withdraw_history)){
                              ?>
                        <?php

                        $i=0;

                        foreach($withdraw_history as $results){
                            $i=$i+1;
                            ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $results->WithdrawDate;?></td>
                            <td><?php echo $results->WithdrawAmount;?></td>

                          <?php }
                         }
 else {

     ?>
                        <tr>

                                No Data is available


                        </tr>
                  <?php
                         }
                         ?>



                        </tbody>

             </table>

         </div>
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
