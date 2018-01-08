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
          <i class="fa fa-table"></i>&nbsp;Deposit History</div>
        <div class="card-body">
          <div class="table-responsive">
            
                        
                         <?php if(!empty($result)){
                              ?>
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <div class="row margin-bottom">
                       <div class="col-md-11 offset-md-1">
                           <form method="post" action="<?php echo base_url(); ?>Account_Controller/Search_Deposite_History" enctype="multipart/form-data">
                       <div class="form-group">
                            <div class="form-row">
                            <div class="col-md-4">                              
                                <div class="dat-picker">
                                    <span><label>From</label> </span>
                                    <input id="datepicker" name="SearchDateFrom" class="form-control" type="date" > 
                                </div>
                           </div>
                          <div class="col-md-3">
                              <div class="dat-picker">
                                  <span>
                                      <label>To</label> </span>
                                      <input id="datepicker" name="SearchDateTo" class="form-control" type="date"  >
                                 
                              </div>
                                                                              
                     </div>
                      
                        <div class="col-md-3">
                         
                            <input id="datepicker" name="SearchItem" class="form-control" type="text" placeholder="Text">
                           
                        
                      </div>
                         <div class="col-md-1">
                              <?php
                          foreach($result as $results_account)
                          {  ?>
                          <input type="hidden" name="AccountNumber"  value="<?php echo $results_account->AccountNumber;?>">
                          <?php
                          }
                          ?>
                             <button class="btn btn-outline-info" name="Search"><i class="fa fa-search"></i>&nbsp;Search</button>
                         </div>
                     </div>
                  </div>
                           
                           </form>    
</form>
                       </div>
                   </div>
                   <thead  class="margin-top">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Deposit Date</th>
                              <th scope="col">Deposit Amount</th>
                              <th scope="col">Deposit Type</th>
                              <th scope="col">Deposit Source</th>
                            </tr>
                       </thead>
                        <?php

                        $i=0;

                        foreach($result as $results){
                            $i=$i+1;
                            ?>
              
                      <tbody>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $results->DepositDate;?></td>
                            <td><?php echo number_format($results->DepositAmount);?></td>
                            <td><?php echo $results->DepositType;?></td>
                            <td><?php echo $results->DepositSource;?></td>
                          <?php }
                          
                          ?>
                        <tr><td colspan="3"> <a href="<?php echo base_url(); ?>Account_Controller/Get_Specific_Acc_Deposit_History?acc_no=<?php echo $results->AccountNumber;?>"><< Back</a></td></tr>
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
      </div>
    </div>
   </div>


<?php

    include('logout_footer.php');

?>
