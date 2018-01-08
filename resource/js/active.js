$('ul.navbar-nav li').click(function(){
      $('ul.navbar-nav li').removeClass('active');
      $(this).addClass('active');
    });
    
$(document).ready(function(){
   $("#search").keyup(function(){
       var str=  $("#search").val();
       if(str == "") {
               $( "#txtHint" ).html("<b>Book information will be listed here...</b>"); 
       }else {
               $.get( "<?php echo base_url();?>home/ajaxsearch?id="+str, function( data ){
                   $( "#txtHint" ).html( data );  
            });
       }
   });  
});  
  function ShowHideDiv() {
        var project = document.getElementById("projectdiv");
        var liabilities = document.getElementById("liabilitiesdiv");
        projectdiv.style.display = selectboxforselectliabilities.value == "Project" ? "block" : "none";
        liabilitiesdiv.style.display = selectboxforselectliabilities.value == "Liabilities" ? "block" : "none";
    }
   $(document).ready( function () {
        $("#ddlpaymenttype").change(function () {
            if ($(this).val() == "Cheque") {
                $("#dvcheck").show();
            } else {
                $("#dvcheck").hide();
            }
        });
    });
  function ConfirmClose()
  {
      confirm("Are want to close?");
  }