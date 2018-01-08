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
            <div class="card-header">Withdraw From Account</div>
            <div class="card-body">
              <form method="post" action="<?php echo base_url(); ?>Account_Controller/Withdraw_From_Account_For_Project" enctype="multipart/form-data">
                   <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-12">
                           <label for="exampleConfirmPassword">Current Balance in Mother Account</label>
                           <input id="datepicker" name="CurrentDeposite" class="form-control" type="text" value="<?php if(!empty($query_result)){ echo number_format($query_result->Amount);} if(!empty($account_result)){ echo number_format($account_result->Amount);}?>" readonly>
                        </div>
                     </div>
                   </div>

                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-12">
                           <label for="exampleConfirmPassword">Date</label>
                           <input id="datepicker" name="WithdrawDate" class="form-control" type="date" required>
                        </div>
                     </div>
                  </div>
  
                  <div class="form-group">
                     <div class="form-row"> 
                        <div class="col-md-12">
                           <label for="exampleInputLastName">Account</label></br>
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
                    <div class="form-group" >
                     <div class="form-row">
                        <div class="col-md-12">
                          <label for="exampleConfirmPassword">Withdraw For</label></br>
                          <select class="form-control" id="selectboxforselectliabilities" name="WithdrawForSelectBox" onchange="ShowHideDiv()">
                               <option value="">Withdraw For</option>
                              <option value="Project">Project</option>
                              <option value="Liabilities">Liabilities</option>                                               
                         </select>
                        </div>
                     </div>
                 </div>
                  <div class="form-group" id="projectdiv" style="display: none" >
                     <div class="form-row">
                        <div class="col-md-12">
                          <label for="exampleConfirmPassword">Project Name</label></br>
                          <select class="form-control" id="ProjectId" name="ProjectId" required="required">
                             <option value="Select Project">Select Project</option>
                             <?php if(!empty($projects)){
                                     foreach ($projects as $project) { ?>
                                         <option value="<?php echo $project->Id ?>"><?php echo $project->ProjectName ?></option>
                             <?php
                                     }
                                   } 
                                   
                                   ?>
                                         
                          </select>
                        </div>
                     </div>
                 </div>
                  <div class="form-group" id="liabilitiesdiv" style="display: none">
                     <div class="form-row">
                        <div class="col-md-12">
                          <label for="exampleConfirmPassword">Liabilities Name</label></br>
                          <select class="form-control" id="ProjectId" name="LiabilityId" required="required">
                             <option value="Select Liability">Select Liability</option>
                             <?php if(!empty($liabilities)){
                                     foreach ($liabilities as $liabilities) { ?>
                                         <option value="<?php echo $liabilities->Id ?>"><?php echo $liabilities->Name ?></option>
                             <?php
                                     }
                                   } 
                                   
                                   ?>
                                         
                          </select>
                        </div>
                     </div>
                 </div>
                   <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-12">
                           <label for="exampleInputLastName">Withdraw Amount</label>
                           <input class="form-control" id="WithdrawAmount" name="WithdrawAmount" type="text" aria-describedby="nameHelp" required>
                        </div>
                     </div>
                  </div>

                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-12">
                           <label for="exampleInputName">Withdraw Type</label>
                           <select class="form-control" name="WithdrawType" required>
                              <option value="">Select Type</option>
                              <option value="Check">Cheque</option>
                              <option value="Cash">Cash</option>
                           </select>
                        </div>
                     </div>
                  </div>

                  <div class="form-group">
                    <div class="form-row">
                       <div class="col-md-12">
                          <label for="exampleInputLastName">Cheque No.</label>
                          <input class="form-control" id="ChequeNo" name="ChequeNo" type="text" aria-describedby="nameHelp" >
                       </div>
                    </div>
                 </div>

                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-12">
                          <label for="exampleInputLastName">Withdraw Reason</label>
                          <input class="form-control" id="WithdrawReason" name="WithdrawReason" type="text" aria-describedby="nameHelp" required>
                        </div>
                     </div>
                  </div>

                  <button class="btn btn-success btn-block" name="SaveWithdraw">Withdraw</button>
                  <button class="btn btn-danger btn-block" name="CancelWithdraw">Cancel</button>
           </form>
         </div>
       </div>
     </div>
                <div class="col-md-6">
                     <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i>&nbsp; Last Five Withdraw</div>
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
                        
                         
                         
                         elseif (!empty ($last_five_withdraw_history)) 
                         {

     ?>
                       <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Date</th>
                              <th scope="col">Amount</th>
                              <th scope="col">Withdraw Type</th>
                              <th scope="col">Reason of Withdraw</th>
                                  
                            </tr>
                          </thead>
                      <?php 
                      $i=0;

                        foreach($last_five_withdraw_history as $last_five_withdraw_history){
                            $i=$i+1;
                      ?>
                      <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $last_five_withdraw_history->WithdrawDate;?></td>
                            <td><?php echo number_format($last_five_withdraw_history->WithdrawAmount);?></td>
                            <td><?php echo $last_five_withdraw_history->WithdrawType;?></td>
                            <td><?php echo $last_five_withdraw_history->WithdrawReason;?></td>
                            
                        </tr>
                      
                     
                  <?php
                         
                        }
                    }
 else
 {
   ?>
                        <tr> <td>No Data</td></tr>
       <?php
 }
                         ?>

                        </tr>
                       <tr> <td colspan="3"><a href="<?php echo base_url(); ?>Account_Controller/Get_Specific_Acc_Withdraw_History?acc_no=<?php echo $account->AccountNumber;?>">View Details >></a></td></tr>
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
