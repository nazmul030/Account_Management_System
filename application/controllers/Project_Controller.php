<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Add_Project_Controller
 *
 * @author User
 */
class Add_Project_Controller extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('account');
        $this->load->model('projects');
    }

    public function Add_Project() //For add new project *addproject*
    {
        if(isset($_POST["projectSave"]))
        {
           $data = array();
           $data['ProjectName'] = $this->input->post('ProjectName');
           $data['ClientName'] = $this->input->post('ClientName');
           $data['ProjectExpense'] = $this->input->post('ProjectExpense');
           $data['StartDate'] = $this->input->post('StartDate');
           $data['EndDate'] = $this->input->post('EndDate');
           $data['ProjectCode'] = $this->input->post('ProjectCode');
           $data['Password'] = $this->input->post('Password');
           $data['ProjectBudget'] = $this->input->post('ProjectBudget');
           $data['ProjectFund'] = $this->input->post('ProjectFund');
           $data['ProjectRemark'] = $this->input->post('ProjectRemark');
           $data['Status'] = 'Running';

           $result = $this->user->Add_Project($data);
           if($result)
           {
                echo "<script  type='text/javascript'>alert('Insert Successfully.Id=".$data['ProjectCode']."and Password=".$data['Password'].".')</script>";
                redirect('Welcome/View_Running_Project');
           }
       }
       elseif(isset($_POST["projectRegisterCancel"]))
       {
            redirect('Welcome/View_Running_Project');
       }
    }

    public function Deposit() //For deposite in the mother account *deposit*
    {
        if(isset($_POST['DepositSave']))
        {
            $data = array();
            $data['DepositDate'] = $this->input->post('DepositDate');
            $data['DepositAmount'] = $this->input->post('DepositAmount');
            $data['DepositType'] = $this->input->post('DepositType');
            $get_currentbalance = $this->account->Current_Expense_Withdraw_Amount();
            $currentamount = $get_currentbalance->Amount+ $data['DepositAmount'];
            $this->account->Update_Current_Mother_Acc_Balance($currentamount);
            $result=$this->account->Deposit_To_Mother_Acc($data);

            if($result)
            {
                echo "<script type='text/javascript'>alert('Deposited ".$data['DepositeAmount']."TK successfully')</script>";
                redirect('Welcome/Deposite');
            }
        }
        elseif (isset ($_POST['DepositCancel']))
        {
            redirect('Welcome/Deposite');
        }
    }

    public function View_Running_Project()//For view the running project *viewrunningproject*
    {
         $result=$this->projects->View_Running_Projects();
    }

    public function Edit_Current_Project($Id)//For retrieve the existing project for edit
    {
        $result=array();
        $result['result'] = $this->projects->Edit_Running_Project($Id);
        $this->load->view('edit_running_project',$result);
    }

    public function Update_Project()//For update project *updateproject*
    {
         if(isset($_POST["updateProject"]))
         {
            $data=array();
            $data['Id'] = $this->input->post('ProjectId');
            $data['ProjectName'] = $this->input->post('ProjectName');
            $data['ClientName'] = $this->input->post('ClientName');
            $data['ProjectExpense'] = $this->input->post('ProjectExpense');
            $data['StartDate'] = $this->input->post('StartDate');
            $data['EndDate'] = $this->input->post('EndDate');
            $data['ProjectCode'] = $this->input->post('ProjectCode');
            $data['Password'] = $this->input->post('Password');
            $data['ProjectBudget'] = $this->input->post('ProjectBudget');
            $data['ProjectFund'] = $this->input->post('ProjectFund');
            $data['ProjectRemark'] = $this->input->post('ProjectRemark');
            $data['Status'] = 'Running';
            $this->projects->Update_Rrunning_Project($data);
            redirect('Welcome/View_Running_Project');
        }
        elseif(isset($_POST["cancelProject"]))
        {
            redirect('Welcome/View_Running_Project');
        }
    }

    public function Close_Current_Project($Id)//For close the current project *closecurrentproject*
    {
        $this->projects->Close_Current_Project($Id);
        redirect('Welcome/View_Running_Project');
    }

    public function Withdraw_Expense_From_Current_Project($Id) //For  deposite in current project
    {
        $data = array(
          "current_balance"=>$this->account->Current_Expense_Withdraw_Amount(),
          "query_result"=>$this->projects->Edit_Running_Project($Id),
          "result"=>$this->account->Latest_Expense_Withdraw_History($Id),
        );
        $this->load->view('withdraw_expense_from_current_project',$data);
    }

    public function Update_Expense()  // For new deposite in the project *updateExpense*
    {
        if(isset($_POST["SaveWithdraw"]))
        {
           $data = array();
           $value = array();

           $data['ProjectId'] = $this->input->post('ProjectId');
           $data['ProjectExpense'] = $this->input->post('ProjectExpense');
           $data['WithdrawDate'] = $this->input->post('WithdrawDate');
           $data['WithdrawType'] = $this->input->post('WithdrawType');
           $data['WithdrawReason'] = $this->input->post('WithdrawReason');

           $totalAmmount = $data['ProjectExpense'] + $this->input->post('CurrentDeposite');

           $value['Id'] = $this->input->post('ProjectId');
           $value['ProjectExpense'] = $this->input->post('ProjectExpense');
           $value['TotalAmmount'] = $totalAmmount;

           $this->account->Expense_Of_Current_Project($value);  // For deposite in current project
           $this->account->Expense_History($data);  // For track deposite history

           // $this->account->Reduce_Mother_Account($data['ProjectExpense']);  // For Reduce from mother account.

           redirect('Welcome/View_Running_Project');
       }
    }
}
