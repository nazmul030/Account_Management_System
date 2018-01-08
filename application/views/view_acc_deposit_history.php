<?php
//include('admin_sidebar.php');

  ?>
   <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->

      <div class="row">
        <div class="col-12">
        <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Deposit History</div>
        <div class="card-body">
            <div class="table-responsive" id="deposit_table">
              

         </div>
            <div id="pagination_link"></div>
        </div>
      </div>
    </div>
      </div>
    </div>
   </div>


<script>
$(document).ready(function{
    
    function load_deposit_data(page)
    {
       $.ajax({
           url:"<?php echo base_url();?>Account_Controller/Get_Specific_Acc_Deposit_History"+page,
           method:"GET",
           dataType:"json",
           success.function() {
         $('#deposit_table').html(data.deposit_table);
         $('#pagination_link').html(data.pagination.link);
      }
       });
    }
   load_deposit_data(1);
   
 $(document).on("click", ".pagination li a", function(event){
  event.preventDefault();
  var page = $(this).data("ci-pagination-page");
   load_deposit_data(page);
 });
});

</script>
<?php

    include('logout_footer.php');

?>
