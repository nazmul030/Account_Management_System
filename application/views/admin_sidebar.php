<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Bootstrap core CSS-->
   <link href="<?php echo base_url('resource/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css"/>
  <!-- Custom fonts for this template-->
 <link href="<?php echo base_url('resource/vendor/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css"/>
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('resource/css/sb-admin.min.css');?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url('resource/css/style.css');?>" rel="stylesheet" type="text/css"/>

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>


<body class="fixed-nav sticky-footer bg-dark" id="page-top">
 <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Account Management System</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li  class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="<?php echo base_url();?>welcome/admin_dashboard">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">

           <i class="fa fa-th" aria-hidden="true"></i>

            <span class="nav-link-text">Project</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
                <a href="<?php echo base_url();?>Welcome/Add_Project">Add Project</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>Welcome/View_Running_Project">View running projects</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>Welcome/View_Closed_Project">View closed projects</a>
            </li>
          </ul>


        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Accounts</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
                <a href="<?php echo base_url();?>Welcome/Add_New_Account">Add New Account</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>Account_Controller/View_Accounts">View All Accounts</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>Welcome/Deposit">Deposit</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>Welcome/Withdraw">Withdraw</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>Welcome/Balance_Sheet">Balance Status</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseAsset" data-parent="#exampleAccordion">
                <i class="fa fa-buysellads" aria-hidden="true"></i>




           <span class="nav-link-text">Asset</span>
         </a>
          <ul class="sidenav-second-level collapse" id="collapseAsset">
            <li>
                <a href="<?php echo base_url();?>Welcome/Add_New_Asset">Add New Asset</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>Welcome/View_All_Assets">View All Assets</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseLiability" data-parent="#exampleAccordion">
         <i class="fa fa-list" aria-hidden="true"></i>


           <span class="nav-link-text">Liability</span>
         </a>
          <ul class="sidenav-second-level collapse" id="collapseLiability">
            <li>
                <a href="<?php echo base_url();?>Welcome/Add_New_Liability">Add New Liability</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>Liability_Controller/View_Liabilities">View All Liabilities</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-users" aria-hidden="true"></i>

            <span class="nav-link-text">Employee</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
                <a href="<?php echo base_url(); ?>Welcome/Add_New_Employee">Add New Employee</a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>Welcome/View_Employee_List">View Employees</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-link"></i>

            <span class="nav-link-text">Setting</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="collectionbyemployee.php">General Setting</a>
            </li>

          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
