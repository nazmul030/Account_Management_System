<?php
include('admin_sidebar.php');

  ?>
   <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->

      <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
            <div class="card-header">Deposit In Mother Account</div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url(); ?>Account_Controller/Deposit_To_Acc_For_Project" enctype="multipart/form-data">

                   <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-12">
                           <label for="exampleConfirmPassword">Total Balance In All Accounts</label>
                           <input id="datepicker" name="CurrentDeposite" class="form-control" type="text" value="<?php if(!empty($query_result)){ echo number_format($query_result->Amount);} if(!empty($account_result)){ echo number_format($account_result->Amount);}?>" readonly>
                        </div>
                     </div>
                   </div>


                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-12">
                           <label for="exampleInputLastName"> SeLect Account</label></br>
                           <select class="form-control" id="AccountNumber" name="AccountNumber" onchange="location=this.value;">
                             
                              <?php if(!empty($accounts)){?>
                                   <option name="">Select Account</option>
                                  <?php     foreach ($accounts as $account) { ?>
                              <option value="<?php echo base_url();?>Account_Controller/View_Account_info/<?php echo $account->AccountNumber; ?>"><?php echo $account->BankName." - ".$account->AccountNumber." - ".$account->AccountName ?></option>
                                 <?php
                                       }
                                   }
                                   elseif(!empty($account)){
                                  
                                    foreach ($account as $account) { ?>
                              <option value="<?php echo $account->AccountNumber; ?>"><?php echo $account->BankName." - ".$account->AccountNumber." - ".$account->AccountName ?></option>
                                 <?php
                                       }
                                   }?>
                           </select>
                        </div>
                     </div>
                  </div>
           </form>
         </div>
       </div>
                <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i>&nbsp;Current Balance In Accounts</div>
        <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        

                        <tbody>
                         <?php if(!empty($accounts)){
                             
                              ?>
                            <thead >
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Account</th>
                              <th scope="col">Amount</th>
                                  
                            </tr>
                          </thead>
                        <?php

                        $i=0;

                        foreach($accounts as $account){
                            $i=$i+1;
                            ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $account->BankName." - ".$account->AccountNumber." - ".$account->AccountName ?></td>
                            <td><?php echo number_format($account->Amount);?></td>
                            
                        </tr>
                          <?php }
                         }
   
 else
 {
   ?>
                        <tr> <td>No Data</td></tr>
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
            <i class="fa fa-table"></i>&nbsp;Last Five Deposit</div>
        <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        

                        <tbody>
                         <?php if(!empty($result)){
                             
                              ?>
                            <thead >
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Date</th>
                              <th scope="col">Amount</th>
                              <th scope="col">Deposit Type</th>
                              <th scope="col">Account Number</th>
                                  
                            </tr>
                          </thead>
                        <?php

                        $i=0;

                        foreach($result as $results){
                            $i=$i+1;
                            ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $results->DepositDate;?></td>
                            <td><?php echo number_format($results->DepositAmount);?></td>
                            <td><?php echo $results->DepositType;?></td>
                            <td><?php echo $results->AccountNumber;?></td>
                        </tr>
                          <?php }
                         }
 else
 {
   ?>
                        <tr> <td>No Data</td></tr>
       <?php
 }
                         ?>

                        </tr>
                         <tr> <td colspan="3"><a href="<?php echo base_url(); ?>Account_Controller/Get_Mother_Acc_Deposit_History">View Details >></a></td></tr>
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
