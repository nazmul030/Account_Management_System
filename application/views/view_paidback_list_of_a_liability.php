<?php
include('admin_sidebar.php');

  ?>
   <div class="content-wrapper">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
        <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>PAID BACK LIST OF LIABILITY</div>
        <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead >
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Amount</th>
                              <th scope="col">Date</th>
                            </tr>
                      </thead>

                      <tbody>
                         <?php if(!empty($result)){
                              ?>
                        <?php
                        $Total_Amount = 0;
                        $i = 0;

                        foreach($result as $results){
                            $i=$i+1;
                            ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo number_format($results->Amount); $Total_Amount+=$results->Amount; ?></td>
                            <td><?php echo $results->Date;?></td>
                        </tr>
                         <?php
                        }
                         }
                         ?>
                        </tbody>

             </table>
             <h5>Total Paid Amount = <?php echo number_format($Total_Amount) ?>/= Tk</h5>
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
