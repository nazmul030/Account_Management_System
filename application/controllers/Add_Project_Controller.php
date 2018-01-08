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
        $this->load->library('pagination');
    }

    public function Add_Project() //For add new project *addproject*
    {
        if(isset($_POST["projectSave"]))
        {
           $data=array();
           $data['ProjectName'] = $this->input->post('ProjectName');
           $data['ClientName'] = $this->input->post('ClientName');
           $data['ProjectExpense'] = $this->input->post('ProjectExpense');
           $data['StartDate'] = $this->input->post('StartDate');
           $data['EndDate'] = $this->input->post('EndDate');
           $data['ProjectCode'] = $this->input->post('ProjectCode');
           $data['Password'] = $this->input->post('Password');
           $data['ProjectBudget'] = $this->input->post('ProjectBudget');
           $data['ProjectRemark'] = $this->input->post('ProjectRemark');
           $data['Status'] = 'Running';

           $result=$this->user->Add_Project($data);
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
     public function Add_New_Asset()//For add new asset
    {
        if(isset($_POST["SaveAsset"]))
        {
           $data=array();
           $data['Name'] = $this->input->post('Name');
           $data['Date'] = $this->input->post('Date');
           $data['Price'] = $this->input->post('Price');
           $data['Quantity'] = $this->input->post('Quantity');
           $data['ProjectId'] = $this->input->post('ProjectId');
           $data['Remark'] = $this->input->post('Remark');

           $result = $this->projects->Add_New_Asset($data);

           redirect('Welcome/View_All_Assets');
       }
       elseif(isset($_POST["AssetSaveCancel"]))
       {
            redirect('Welcome/View_All_Assets');
       }
    }

    public function Edit_Specific_Asset($Id) // For retrieve the existing asset for edit
    {
        $result = array();
        $result['result'] = $this->projects->View_Specific_Asset($Id);
        $result['projects'] = $this->projects->View_All_Projects();
        $this->load->view('edit_specific_asset',$result);
    }

    public function Update_Asset()//update asset
    {
        if(isset($_POST["UpdateAsset"]))
        {
           $data=array();
           $data['Id'] = $this->input->post('Id');
           $data['Name'] = $this->input->post('Name');
           $data['Date'] = $this->input->post('Date');
           $data['Price'] = $this->input->post('Price');
           $data['Quantity'] = $this->input->post('Quantity');
           $data['ProjectId'] = $this->input->post('ProjectId');
           $data['Remark'] = $this->input->post('Remark');

           $result = $this->projects->Update_Asset($data);

           redirect('Welcome/View_All_Assets');
       }
       elseif(isset($_POST["AssetUpdateCancel"]))
       {
           redirect('Welcome/View_All_Assets');
       }
    }

    public function Deposit_To_Mother_Acc() // For deposite in the mother account *deposit*, *Deposit*
    {
        if(isset($_POST['SaveDeposit']))
        {
            $data=array();
            $data['DepositDate'] = $this->input->post('DepositDate');
            $data['DepositAmount'] = $this->input->post('DepositAmount');
            $data['DepositType'] = $this->input->post('DepositType');
            $data['DepositSource'] = $this->input->post('DepositSource');
            $get_currentbalance = $this->account->Current_Expense_Withdraw_Amount();
            $currentamount = $get_currentbalance->Amount + $data['DepositAmount'];
            $this->account->Update_Current_Mother_Acc_Balance($currentamount);
            $result = $this->account->Save_Mother_Acc_Deposit_History($data);

            if($result)
            {
                echo "<script type='text/javascript'>alert('Deposited ".$data['DepositAmount']."TK successfully')</script>";
                redirect('Welcome/Deposit');
            }
        }
        elseif (isset ($_POST['CancelDeposit']))
        {
            redirect('Welcome/Deposit');
        }
    }

    public function Withdraw_From_Mother_Acc() // For deposite in the mother account *withdraw*
    {
        if(isset($_POST['SaveWithdraw']))
        {
            $data=array();
            $data['WithdrawDate'] = $this->input->post('WithdrawDate');
            $data['WithdrawAmount'] = $this->input->post('WithdrawAmount');
            $data['WithdrawType'] = $this->input->post('WithdrawType');
            $data['WithdrawReason'] = $this->input->post('WithdrawReason');
            // $get_currentbalance = $this->account->Current_Expense_Withdraw_Amount();
            // $currentamount = $get_currentbalance->Amount - $data['WithdrawReason'];
            $this->account->Reduce_Mother_Account($data['WithdrawAmount']);
            $result = $this->account->Save_Mother_Acc_Withdraw_History($data);

            if($result)
            {
                echo "<script type='text/javascript'>alert('Withdrawed ".$data['WithdrawAmount']."TK successfully')</script>";
                redirect('Welcome/Withdraw');
            }
        }
        elseif (isset ($_POST['CancelWithdraw']))
        {
            redirect('Welcome/Admin_Dashboard');
        }
    }

    public function View_Running_Project() // For view the running project *viewrunningproject*
    {
         $result=$this->projects->View_Running_Projects();
    }

    public function View_Expense_List_Of_A_Project($offset=0) // For view the running project *viewrunningproject*
    {
        $Id=$this->input->get('pro_id'); 
        $config=array(
            'base_url' => base_url('Add_Project_Controller/View_Expense_List_Of_A_Project'),
            'reuse_query_string' => true,
            'per_page' => 5,
            'total_rows' => $this->pagination_model->View_Expense_List_Of_A_Project_num_rows($Id),
            
        );
        $this->pagination->initialize($config);
         $result = array();
         $result['result'] = $this->projects->View_Expense_List_Of_A_Project($Id,$config['per_page'],$this->uri->segment(3));
         $this->load->view('view_expense_list_of_a_project',$result);
    }

    public function Edit_Current_Project($Id) // For retrieve the existing project for edit
    {
        $result=array();
        $result['result'] = $this->projects->Edit_Running_Project($Id);
        $this->load->view('edit_running_project',$result);
    }

    public function Update_Project() // For update project *updateproject*
    {
         if(isset($_POST["updateproject"]))
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
            $data['ProjectRemark'] = $this->input->post('ProjectRemark');
            $data['Status'] = 'Running';
            $this->projects->Update_Rrunning_Project($data);
            redirect('Welcome/View_Running_Project');
        }
        elseif(isset($_POST["cancelproject"]))
        {
            redirect('Welcome/View_Running_Project');
        }
    }

    public function Close_Current_Project($Id) // For close the current project *closecurrentproject*
    {
        $this->projects->Close_Current_Project($Id);
        redirect('Welcome/View_Running_Project');
    }

    public function Withdraw_Expense_From_Current_Project($Id) // To withdraw expense of the current project
    {
        $data = array(
          "current_balance"=>$this->account->Current_Expense_Withdraw_Amount(),
          "query_result"=>$this->projects->Edit_Running_Project($Id),
          "accounts"=>$this->account->View_Accounts(),
          "result"=>$this->account->Latest_Expense_Withdraw_History($Id),
        );
        $this->load->view('withdraw_expense_from_current_project',$data);
    }

    public function Add_Expense_To_A_Project()  // For adding new expense of a project *updateExpense*
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

           $this->account->Add_Expense_To_A_Project($data); // For deposite in current project
           $this->account->Add_Expense_History($data); // For track deposite history
           // $this->account->Reduce_Mother_Account($data['ProjectExpense']);  // For Reduce from mother account.
           redirect('Welcome/View_Running_Project');
       }
    }

    public function View_Specific_Expense($Id)
    {
        $result = array();
        $result['result'] = $this->projects->View_Specific_Expense($Id);
        // $result['query_result'] = $this->projects->Edit_Running_Project($ProjectId),

        $this->load->view('edit_expense_of_a_project',$result);
    }

    public function Update_Expense_Of_A_Project() // Edit an expense of a project
    {
        if(isset($_POST["SaveUpdate"]))
        {
             $value = array();
             $data = array();
             $data['Id'] = $this->input->post('Id');
             $data['ProjectId'] = $this->input->post('ProjectId');
             $data['ProjectExpense'] = $this->input->post('ProjectExpense');
             $data['WithdrawDate'] = $this->input->post('WithdrawDate');
             $data['WithdrawType'] = $this->input->post('WithdrawType');
             $data['WithdrawReason'] = $this->input->post('WithdrawReason');

             $value['ProjectId'] = $this->input->post('ProjectId');
             $value['OldExpenseValue'] = $this->input->post('OldExpenseValue');

             $this->account->Adjust_Expense_And_Fund($value);
             $this->account->Add_Expense_To_A_Project($data);
             $this->account->Update_An_Expense_History_Of_A_Project($data);

             redirect('Add_Project_Controller/View_Expense_List_Of_A_Project/'.$data['ProjectId']);
         }
         elseif(isset($_POST["CancelUpdate"]))
         {
             redirect('Add_Project_Controller/View_Expense_List_Of_A_Project/'.$data['ProjectId']);
         }
    }


}
