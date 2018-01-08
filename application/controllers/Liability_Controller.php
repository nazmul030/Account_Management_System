<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Account_Controller
 *
 * @author User
 */
class Liability_Controller extends CI_Controller{
    //put your code here

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('account');
        $this->load->model('projects');
        $this->load->model('liability');
    }

    public function Add_New_Liability()
    {
        if(isset($_POST["SaveLiability"]))
        {
            $data = array();
            $data['Name'] = $this->input->post('Name');
            $data['Date'] = $this->input->post('Date');
            $data['Amount'] = $this->input->post('Amount');
            $data['InterestRate'] = $this->input->post('InterestRate');
            $data['InterestAmount'] = $this->input->post('InterestAmount');
            $data['RemainingAmount'] = $this->input->post('Amount');
            $data['ContactNumber'] = $this->input->post('ContactNumber');
            $data['Address'] = $this->input->post('Address');
            $data['Remark'] = $this->input->post('Remark');
            $data['Status'] = 'Running';

            $result = $this->liability->Add_New_Liability($data);
            if($result)
            {
                // echo "<script  type='text/javascript'>alert('Insert Successfully. Account name =".$data['AccountName']."')</script>";
                 redirect('Liability_Controller/View_Liabilities');
            }
        }
        elseif(isset($_POST["LiabilitySaveCancel"]))
        {
             redirect('Liability_Controller/View_Liabilities');
        }
    }

    public function View_Liabilities()
    {
        $result = array();
        $result['result'] = $this->liability->View_Liabilities();
        $this->load->view('view_all_liabilities',$result);
    }

    public function View_Specific_Liability($Id) // For retrieve the existing project for edit
    {
        $result = array();
        $result['result'] = $this->liability->View_Specific_Liability($Id);
        $this->load->view('edit_specific_liability',$result);
    }

    public function Update_Liability()
    {
        if(isset($_POST["UpdateLiability"]))
        {
           $data = array();
           $data['Id'] = $this->input->post('Id');
           $data['Name'] = $this->input->post('Name');
           $data['Date'] = $this->input->post('Date');
           $data['InterestRate'] = $this->input->post('InterestRate');
           $data['InterestAmount'] = $this->input->post('InterestAmount');
           $data['ContactNumber'] = $this->input->post('ContactNumber');
           $data['Address'] = $this->input->post('Address');
           $data['Remark'] = $this->input->post('Remark');
           $data['Status'] = 'Running';

           $result = $this->liability->Update_Liability($data);
           if($result)
           {
              redirect('Liability_Controller/View_Liabilities');
           }
        }
        elseif(isset($_POST["LiabilityUpdateCancel"]))
        {
            redirect('Liability_Controller/View_Liabilities');
        }
    }
    //riasad vai, [02.01.18 16:40]
    public function PaidBack_Liability()
    {
        if(isset($_POST[""]))
        {
          $data = array();
          $data['LiabilityId'] = $this->input->post('Id');
          $data['Amount'] = $this->input->post('Amount');
          $data['TransactionType'] = 'Paid';
          $data['Date'] = $this->input->post('Date');

          $result = $this->liability->PaidBack_Liability($data);
          if($result)
          {
             redirect('Liability_Controller/View_Liabilities');
          }
        }
        elseif(isset($_POST[""]))
        {
          redirect('Liability_Controller/View_Liabilities');
        }
    }

    public function Received_Liability()
    {
        if(isset($_POST[""]))
        {
          $data = array();
          $data['LiabilityId'] = $this->input->post('Id');
          $data['Amount'] = $this->input->post('Amount');
          $data['TransactionType'] = 'Received';
          $data['Date'] = $this->input->post('Date');

          $result = $this->liability->Received_Liability($data);
          if($result)
          {
             redirect('Liability_Controller/View_Liabilities');
          }
        }
        elseif(isset($_POST[""]))
        {
          redirect('Liability_Controller/View_Liabilities');
        }
    }

    public function Get_Paidback_List_Of_A_Liability($Id) // Get the list of the paid history of a laibility
    {
        $result = array();
        $result['result'] = $this->liability->Get_Paidback_List_Of_A_Liability($Id);
        $this->load->view('view_paidback_list_of_a_liability',$result);
    }

    public function Get_Received_List_Of_A_Liability($Id) // Get the list of the received history of a laibility
    {
        $result = array();
        $result['result'] = $this->liability->Get_Received_List_Of_A_Liability($Id);
        $this->load->view('view_received_list_of_a_liability',$result);
    }
}
?>
