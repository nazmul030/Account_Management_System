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
  
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>


<body class="fixed-nav sticky-footer bg-dark" id="page-top">
 <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Sale Management</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li  class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="<?php echo base_url();?>welcome/admindashboard">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
           <i class="fa fa-users" aria-hidden="true"></i>

            <span class="nav-link-text">Project</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
                <a href="<?php echo base_url();?>Welcome/addproject">Add Project</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>Welcome/viewrunningproject">View running projects</a> 
            </li>
            <li>
                <a href="<?php echo base_url();?>Welcome/viewclosedproject">View closed projects</a> 
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
                <a href="<?php echo base_url();?>Welcome/deposite">Deposit</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>Welcome/withdraw">Withdraw</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>Welcome/balancesheet">Balance Status</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-usd" aria-hidden="true"></i>

            <span class="nav-link-text">Collection</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="collectionbyemployee.php">Collections List By Employee</a>
            </li>
            <li>
              <a href="collectionlistbyagency.php">Collections List By Agency</a>
            </li>
            <li>
              <a href="monthwisecollection.php">Monthly Collection</a>
            </li>
            <li>
              <a href="totalcollectionbyyearly.php">Total Collection</a>
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