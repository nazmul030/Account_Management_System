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
            <div class="card-header">Expense in the project</div>
            <div class="card-body">

                <form method="post" action="<?php echo base_url(); ?>Add_Project_Controller/Add_Expense_To_A_Project" enctype="multipart/form-data">
                    <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-12">
                           <label for="exampleConfirmPassword">Current Balance Of The Project Fund</label>
                           <input id="datepicker"  class="form-control" type="text" value="<?php echo number_format($query_result->ProjectBudget); ?>" readonly>
                        </div>
                     </div>
                   </div>
                   <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-12">
                           <label for="exampleConfirmPassword">Current Expense Amount in Project</label>
                           <input id="datepicker" name="CurrentExpense" class="form-control" type="text" value="<?php echo number_format($query_result->ProjectExpense); ?>" readonly>
                        </div>
                     </div>
                  </div> 
                    
                <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-12">
                           <label for="exampleInputLastName"> SeLect Account</label></br>
                           <select class="form-control" id="AccountNumber" name="AccountNumber" >
                             
                              <?php if(!empty($accounts)){?>
                                   <option name="">Select Account</option>
                                  <?php     foreach ($accounts as $account) { ?>
                              <option value="<?php echo $account->AccountNumber; ?>"><?php echo $account->BankName." - ".$account->AccountNumber." - ".$account->AccountName ?></option>
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
                           <label for="exampleConfirmPassword">Date</label>
                           <input id="datepicker" name="WithdrawDate" class="form-control" type="date" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-12">
                           <label for="exampleInputLastName">Amount</label>
                           <input class="form-control" id="ProjectExpense" name="ProjectExpense" type="text" aria-describedby="nameHelp" required>
                        </div>
                     </div>
                  </div>
                 <div class="form-group">
                   <div class="form-row">
                      <div class="col-md-12">
                         <label for="exampleInputName">Withdraw Type</label>
                         <select class="form-control" name="WithdrawType" id="ddlpaymenttype" >
                            <option value="">Select Type</option>
                            <option value="Cheque">Cheque</option>
                            <option value="Cash">Cash</option>
                         </select>
                      </div>
                   </div>
                </div>

                    <div class="form-group" id="dvcheck" style="display: none">
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
                           <textarea rows="2" cols="20" class="form-control" id="WithdrawReason" name="WithdrawReason" placeholder="Remark" required></textarea>
                        </div>
                     </div>
                  </div>

                  <input type="hidden" name="ProjectId" value="<?php echo $query_result->Id; ?>"></input>
                  <button class="btn btn-success btn-block" name="SaveWithdraw">Withdraw</button>
                  <button class="btn btn-danger btn-block" name="CancelWithdraw">Cancel</button>
               </form>
            </div>
         </div>
        </div>
        <div class="col-md-6">
        <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>&nbsp;Last Five Expense Withdraws</div>
        <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead >
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Date</th>
                              <th scope="col">Amount</th>
                              <th scope="col">Withdraw Type</th>
                            </tr>
                          </thead>

                        <tbody>
                         <?php if(!empty($result)){
                              ?>
                        <?php

                        $i=0;

                        foreach($result as $results){
                            $i = $i+1;
                            ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $results->WithdrawDate;?></td>
                            <td><?php echo number_format($results->ProjectExpense);?></td>
                            <td> <?php echo $results->WithdrawType;?></td>
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
                        <tr><td>
                                <a href="<?php echo base_url(); ?>Add_Project_Controller/View_Expense_List_Of_A_Project/<?php echo $query_result->Id;?>">View Details >></a>
                            </td></tr> </tr>
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
