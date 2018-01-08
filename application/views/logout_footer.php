 
 <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © LLC 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
<div class="modal-footer">

            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href='<?php echo base_url();?>Login/logout'>Logout</a>
          </div>
    </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('resource/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('resource/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('resource/vendor/jquery-easing/jquery.easing.min.js');?>"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?php echo  base_url('resource/vendor/chart.js/Chart.min.js');?>"></script>
    <script src="<?php echo base_url('resource/vendor/datatables/jquery.dataTables.js')?>"></script>
    <script src="<?php echo base_url('resource/vendor/datatables/dataTables.bootstrap4.js');?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('resource/js/sb-admin.min.js');?>"></script>
    
    <!-- Custom scripts for this page-->
    <script src="<?php echo base_url('resource/js/sb-admin-datatables.min.js')?>"></script>
    <script src="<?php echo base_url('resource/js/sb-admin-charts.js');?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script  src="<?php echo  base_url('resource/js/active.js');?>"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script>
      $( function() {
        $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
      } );
      $(document).ready(function(){
         $('#pupup').click(function(){
            $('#open-tab').slideToggle(); 
             return false;
         }); 
      });
      Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'Month',
 ykeys:'Ammount_Collected',
 labels:'Ammount_Collected',
 hideHover:'auto',
 stacked:true
});

    </script>
  </div>
</body>

</html>       