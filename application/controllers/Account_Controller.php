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
class Account_Controller extends CI_Controller{
    //put your code here

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('account');
        $this->load->model('projects');
        $this->load->model('liability');
        $this->load->model('pagination_model');
        $this->load->library('pagination');
    }

    public function Add_New_Account()
    {
        if(isset($_POST["SaveAccount"]))
        {
           $data = array();
           $dataForBalance = array();
           $data['AccountName'] = $this->input->post('AccountName');
           $data['AccountNumber'] = $this->input->post('AccountNumber');
           $dataForBalance['AccountNumber'] = $this->input->post('AccountNumber');
           $data['BankName'] = $this->input->post('BankName');
           $data['Address'] = $this->input->post('Address');
           $dataForBalance['Amount'] = $this->input->post('InitialBalance');
           $data['ContactNo1'] = $this->input->post('ContactNo1');
           $data['ContactNo2'] = $this->input->post('ContactNo2');

           $result = $this->account->Add_New_Account($data,$dataForBalance);
           if($result)
           {
                echo "<script  type='text/javascript'>alert('Insert Successfully. Account name =".$data['AccountName']."')</script>";
                redirect('Account_Controller/View_Accounts');
           }
       }
       elseif(isset($_POST["AccountSaveCancel"]))
       {
            redirect('Account_Controller/View_Accounts');
       }
    }

    public function View_Accounts()
    {
        $result = array();
        $result['result'] = $this->account->View_Accounts();
        $this->load->view('view_all_accounts',$result);
    }

    public function View_Specific_Account($Id) // For retrieve the existing project for edit
    {
        $result = array();
        $result['result'] = $this->account->View_Specific_Account($Id);
        $this->load->view('edit_specific_account',$result);
    }

    public function Update_Account()
    {
        if(isset($_POST["UpdateAccount"]))
        {
           $data = array();
           $data['Id'] = $this->input->post('Id');
           $data['AccountName'] = $this->input->post('AccountName');
           $data['AccountNumber'] = $this->input->post('AccountNumber');
           $data['BankName'] = $this->input->post('BankName');
           $data['Address'] = $this->input->post('Address');
           $data['ContactNo1'] = $this->input->post('ContactNo1');
           $data['ContactNo2'] = $this->input->post('ContactNo2');

           $result = $this->account->Update_Account($data);
           if($result)
           {
                echo "<script  type='text/javascript'>alert('Update Successfully. Account Name =".$data['AccountName']."')</script>";
                redirect('Account_Controller/Account_Controller/View_Accounts');
           }
        }
        elseif(isset($_POST["CancelUpdate"]))
        {
            redirect('Account_Controller/View_Specific_Account/'.$data['Id']);
        }
    }

    //854646545646546546546546546546545645646545646546545646546545465448465465485
    public function Withdraw_From_Account_For_Project() // withdraw from account
    {
        if(isset($_POST["SaveWithdraw"]))
        {
           if($this->input->post('WithdrawForSelectBox')=="Project")
           {
            $expenseHistory = array();
           $transaction = array();
           $withdraw = array();
           $balance = array();
           $data = array();

           $expenseHistory['ProjectId'] = $this->input->post('ProjectId');
           $expenseHistory['ProjectExpense'] = $this->input->post('WithdrawAmount');
           $expenseHistory['WithdrawDate'] = $this->input->post('WithdrawDate');
           $expenseHistory['WithdrawType'] = $this->input->post('WithdrawType');
           $expenseHistory['WithdrawReason'] = $this->input->post('WithdrawReason');

           $transaction['AccountNumber'] = $this->input->post('AccountNumber');
           $transaction['TransactionDate'] = $this->input->post('WithdrawDate');
           $transaction['TransactionType'] = 'Withdraw';
           $transaction['TransactionAmount'] = $this->input->post('WithdrawAmount');

           $withdraw['AccountNumber'] = $this->input->post('AccountNumber');
           $withdraw['WithdrawDate'] = $this->input->post('WithdrawDate');
           $withdraw['WithdrawAmount'] = $this->input->post('WithdrawAmount');
           $withdraw['WithdrawType'] = $this->input->post('WithdrawType');
           $withdraw['ChequeNo'] = $this->input->post('ChequeNo');
           $withdraw['WithdrawReason'] = $this->input->post('WithdrawReason');

           $balance['AccountNumber'] = $this->input->post('AccountNumber');
           $balance['Amount'] = $this->input->post('WithdrawAmount');

           $data['ProjectId'] = $this->input->post('ProjectId');
           $data['ProjectExpense'] = $this->input->post('WithdrawAmount');

           if($expenseHistory['ProjectId'] != "Select Project")
           {
               $result = $this->account->Withdraw_From_Account_For_Project($expenseHistory,$transaction,$withdraw,$balance);
               $result += $this->account->Add_Expense_To_A_Project($data);
               redirect('Welcome/Withdraw');
           }
           else if($expenseHistory['ProjectId'] == "Select Project")
           {
              $result = $this->account->Withdraw_From_Account($transaction,$withdraw,$balance);
               redirect('Welcome/Withdraw');
           }
           if($result)
           {
                echo "<script  type='text/javascript'>alert('Update Successfully. Account Name =".$data['AccountName']."')</script>";
           }
           redirect('Welcome/Withdraw');
           }
           elseif($this->input->post('WithdrawForSelectBox')=="Liabilities")
           {
               $liabilityhistory = array();
                $liability = array();
                $transaction = array();
                $withdraw = array();
                $balance = array();

                $liabilityhistory['LiabilityId'] = $this->input->post('LiabilityId');
                $liabilityhistory['Amount'] = $this->input->post('WithdrawAmount');
                $liabilityhistory['TransactionType'] = 'Paid';
                $liabilityhistory['Date'] = $this->input->post('WithdrawDate');

                $liability['Id'] = $this->input->post('LiabilityId');
                $liability['Amount'] = $this->input->post('WithdrawAmount');

                $transaction['AccountNumber'] = $this->input->post('AccountNumber');
                $transaction['TransactionDate'] = $this->input->post('WithdrawDate');
                $transaction['TransactionType'] = 'Withdraw';
                $transaction['TransactionAmount'] = $this->input->post('WithdrawAmount');

                $withdraw['AccountNumber'] = $this->input->post('AccountNumber');
                $withdraw['WithdrawDate'] = $this->input->post('WithdrawDate');
                $withdraw['WithdrawAmount'] = $this->input->post('WithdrawAmount');
                $withdraw['WithdrawType'] = $this->input->post('WithdrawType');
                $withdraw['ChequeNo'] = $this->input->post('ChequeNo');
                $withdraw['WithdrawReason'] = $this->input->post('WithdrawReason');

                $balance['AccountNumber'] = $this->input->post('AccountNumber');
                $balance['Amount'] = $this->input->post('WithdrawAmount');

                if($liabilityhistory['LiabilityId'] != "Select Liability")
                {
                    $result = $this->account->Withdraw_From_Account_For_Liability($liabilityhistory,$liability,$transaction,$withdraw,$balance);
                        redirect('Welcome/Withdraw');
                }
                else if($liabilityhistory['LiabilityId'] == "Select Liability")
                {
                   $result = $this->account->Withdraw_From_Account($transaction,$withdraw,$balance);
                     redirect('Welcome/Withdraw');
                }

           }
         
       }
       elseif(isset($_POST["CancelWithdraw"]))
       {
           redirect('Welcome/Withdraw');
       }
    }

    public function Deposit_To_Acc_For_Project() // Save information for deposit to account for project
    {
        if(isset($_POST["SaveDeposit"]))
        {
           if($this->input->post('DepositForSelectBox')=="Project")
           {
               $incomeHistory = array();
           $transaction = array();
           $deposit = array();
           $balance = array();
           $data = array();

           $incomeHistory['ProjectId'] = $this->input->post('ProjectId');
           $incomeHistory['ProjectIncome'] = $this->input->post('DepositAmount');
           $incomeHistory['DepositDate'] = $this->input->post('DepositDate');
           $incomeHistory['DepositType'] = $this->input->post('DepositType');
           //$depositHistory['DepositSource'] = $this->input->post('DepositSource');

           $transaction['AccountNumber'] = $this->input->post('AccountNumber');
           $transaction['TransactionDate'] = $this->input->post('DepositDate');
           $transaction['TransactionType'] = 'Deposit';
           $transaction['TransactionAmount'] = $this->input->post('DepositAmount');

           $deposit['AccountNumber'] = $this->input->post('AccountNumber');
           $deposit['DepositDate'] = $this->input->post('DepositDate');
           $deposit['DepositAmount'] = $this->input->post('DepositAmount');
           $deposit['DepositType'] = $this->input->post('DepositType');
           $deposit['DepositSource'] = $this->input->post('DepositSource');

           $balance['AccountNumber'] = $this->input->post('AccountNumber');
           $balance['Amount'] = $this->input->post('DepositAmount');

           $data['ProjectId'] = $this->input->post('ProjectId');
           $data['ProjectIncome'] = $this->input->post('DepositAmount');

           if($incomeHistory['ProjectId'] != "Select Project")
           {
               $result = $this->account->Deposit_To_Acc_For_Project($incomeHistory,$transaction,$deposit,$balance);
               $result += $this->account->Add_Income_To_A_Project($data);
           }
           else if($incomeHistory['ProjectId'] == "Select Project")
           {
              $result = $this->account->Deposit_To_Acc($transaction,$deposit,$balance);
           }
           if($result)
           {
                echo "<script  type='text/javascript'>alert('Update Successfully. Account Name =".$data['AccountName']."')</script>";
           }
           redirect('Welcome/Deposit');
           }
           elseif($this->input->post('DepositForSelectBox')=="Liabilities")
           {
               $deposit = array();
       $balance = array();
       $transaction = array();
       $liabilityhistory = array();
       $liabilities = array();

       $deposit['AccountNumber'] = $this->input->post('AccountNumber');
       $deposit['DepositDate'] = $this->input->post('DepositDate');
       $deposit['DepositAmount'] = $this->input->post('DepositAmount');
       $deposit['DepositType'] = $this->input->post('DepositType');
       $deposit['DepositSource'] = $this->input->post('DepositSource');

       $balance['AccountNumber'] = $this->input->post('AccountNumber');
       $balance['Amount'] = $this->input->post('DepositAmount');

       $transaction['AccountNumber'] = $this->input->post('AccountNumber');
       $transaction['TransactionDate'] = $this->input->post('DepositDate');
       $transaction['TransactionType'] = 'Deposit';
       $transaction['TransactionAmount'] = $this->input->post('DepositAmount');

       $liabilityhistory['LiabilityId'] = $this->input->post('LiabilityId');
       $liabilityhistory['Amount'] = $this->input->post('DepositAmount');
       $liabilityhistory['TransactionType'] = 'Received';
       $liabilityhistory['Date'] = $this->input->post('DepositDate');

       $liabilities['Id'] = $this->input->post('LiabilityId');
       $liabilities['RemainingAmount'] = $this->input->post('DepositAmount');

       if(  $liabilityhistory['LiabilityId']  != "Select Liability")
       {
           $result = $this->account->Deposit_To_Acc_For_Liability($liabilityhistory,$liabilities,$transaction,$deposit,$balance);
       }
       elseif(  $liabilityhistory['LiabilityId']  == "Select Liability")
       {
          $result = $this->account->Deposit_To_Acc($transaction,$deposit,$balance);
       }
       if($result)
       {
            echo "<script  type='text/javascript'>alert('Update Successfully. Account Name =".$data['AccountName']."')</script>";
       }
       redirect('Welcome/Deposit');
     
       }
       
       }
       elseif(isset($_POST["CancelDeposit"]))
       {
           redirect('Welcome/Deposit');
       }
    }

    public function view_balance_status()
    {
        $data=array(
            "result"=>$this->account->Get_Last_Five_Deposite_In_Mother_Acc(),
            "withdraw_history"=>$this->account->Get_Last_Five_Withdraw_Of_Mother_Acc(),
        );
        $this->load->view('balance_sheet',$data);
    }

    public function Get_Mother_Acc_Deposit_History($offset=0) // Get the list of deposits in mother acc
    { 
        $this->load->library('pagination');
        $config=[
            'base_url' => base_url('Account_Controller/Get_Mother_Acc_Deposit_History'),
            'per_page' => 5,
            'total_rows' => $this->pagination_model->Get_Mother_Acc_Deposit_History_num_rows(),
        ];
        
        $this->pagination->initialize($config);
         $result = array();
         $result['result'] = $this->account->Get_Mother_Acc_Deposit_History($config['per_page'],$this->uri->segment(3));
         // $result['query_result'] = $this->projects->Edit_Running_Project($ProjectId),

         $this->load->view('view_mother_acc_deposit_history',$result);
    }

    public function Get_Specific_Acc_Deposit_History($offset=0)/// Get the list of deposit in mother acc
    {
        $this->load->library('pagination');
        $Account_Number=$this->input->get('acc_no');
        $config=[
            'base_url' => base_url('Account_Controller/Get_Specific_Acc_Deposit_History'),
            'reuse_query_string' => true,
            'per_page' => 5,
            'total_rows' => $this->pagination_model->Get_Specific_Acc_Deposit_History_num_rows($Account_Number),
        ];
        
        $this->pagination->initialize($config);
        $result = array();
        $result['result'] = $this->account->Get_Specific_Acc_Deposit_History($Account_Number,$config['per_page'],$this->uri->segment(3));
        $this->load->view('view_mother_acc_deposit_history',$result);
    }

    public function Get_Mother_Acc_Withdraw_History($offset=0) // Get the list of withdraws in mother acc
    {
        $this->load->library('pagination');
        $config=[
            'base_url' => base_url('Account_Controller/Get_Mother_Acc_Withdraw_History'),
            'per_page' => 5,
            'total_rows' => $this->pagination_model->Get_Mother_Acc_Withdraw_History_num_rows(),
        ];
        $this->pagination->initialize($config);
         $result = array();
         $result['result'] = $this->account->Get_Mother_Acc_Withdraw_History($config['per_page'],$this->uri->segment(3));
         // $result['query_result'] = $this->projects->Edit_Running_Project($ProjectId),

         $this->load->view('view_mother_acc_withdraw_history',$result);
    }

    public function Get_Specific_Acc_Withdraw_History()
    {
        $Account_Number=$this->input->get('acc_no');
        $config=[
            'base_url' => base_url('Account_Controller/Get_Specific_Acc_Withdraw_History'),
            'reuse_query_string' => true,
            'per_page' => 5,
            'total_rows' => $this->pagination_model->Get_Specific_Acc_Withdraw_History_num_rows($Account_Number),
        ];
         $this->pagination->initialize($config);
        $result = array();
         $result['result'] = $this->account->Get_Specific_Acc_Withdraw_History($Account_Number,$config['per_page'],$this->uri->segment(3));

         $this->load->view('view_mother_acc_withdraw_history',$result);
    }
    public function View_Account_info($Account_Number)//For get specific account for deposite
    {
        $data=array(
            "account_result"=>$this->account->View_Account_info($Account_Number),
            "last_five_deposite_history"=>$this->account->Get_Last_Five_Deposite_In_Mother_Acc($Account_Number),
           "account"=>$this->account->View_specific_Accounts($Account_Number),
            "projects"=>$this->projects->View_Running_Projects(0,0),
            "liabilities"=>$this->liability->View_Liabilities(),
        );
        $this->load->view('deposite_account',$data);        
        
    }
     public function View_Account_info_for_withdraw($Account_Number)//For get specific account update
    {
        $data=array(
            "account_result"=>$this->account->View_Account_info($Account_Number),
            "last_five_withdraw_history"=>$this->account->Get_Last_Five_Withdraw_Of_Mother_Acc($Account_Number),
           "account"=>$this->account->View_specific_Accounts($Account_Number),
            "projects"=>$this->projects->View_Running_Projects(0,0),
            "liabilities"=>$this->liability->View_Liabilities(),
        );
        $this->load->view('withdraw_account',$data);        
        
    }
    public function Search_Deposite_History()//For Get Specific dep[osite history
    {
        
       $result=array();
        if(isset($_POST['Search'])) 
        {
        if(!empty($data=$this->input->post('AccountNumber')))
        {
            $search_data=array();
        $search_data['From']=$this->input->post('SearchDateFrom');
        $search_data['To']=$this->input->post('SearchDateTo');
        $search_data['Text']=$this->input->post('SearchItem');
         $search_data['AccountNumber']=$this->input->post('AccountNumber');
         $result['result'] = $this->account->Search_individual_Deposite_History($search_data);
          $this->load->view('view_deposite_from_specific_account_search',$result);
        }
      else {
           
          $search_data=array();
        $search_data['From']=$this->input->post('SearchDateFrom');
        $search_data['To']=$this->input->post('SearchDateTo');
        $search_data['Text']=$this->input->post('SearchItem');
        $search_result=array(
          "result"=> $this->account->Search_Deposite_History($search_data),
            "search"=>"search_string_is_found",
        );
        $this->load->view('view_mother_acc_deposit_history',$search_result);
          }
          
        }
    }
    public function Search_Withdraw_History()//For Get Specific withdraw history
    {
        
        $result=array();
        if(isset($_POST['Search'])) 
        {
        if(!empty($data=$this->input->post('AccountNumber')))
        {
            $search_data=array();
        $search_data['From']=$this->input->post('SearchDateFrom');
        $search_data['To']=$this->input->post('SearchDateTo');
        $search_data['Text']=$this->input->post('SearchItem');
         $search_data['AccountNumber']=$this->input->post('AccountNumber');
         $result['result'] = $this->account->Search_individual_Withdraw_History($search_data);
          $this->load->view('view_withdraw_from_specific_account_search',$result);
        }
      else {
           
          $search_data=array();
        $search_data['From']=$this->input->post('SearchDateFrom');
        $search_data['To']=$this->input->post('SearchDateTo');
        $search_data['Text']=$this->input->post('SearchItem');
         $search_result=array(
          "result"=> $this->account->Search_Withdraw_History($search_data),
            "search"=>"search_string_is_found",
        );
          $this->load->view('view_mother_acc_withdraw_history',$search_result);
          }
          
        }
     
    }
}
