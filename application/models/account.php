<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of account
 *
 * @author User
 */
class account extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function Save_Mother_Acc_Deposit_History($data) //For deposite in main account. //deposit *Deposit_To_Mother_Acc*
    {
        $result = $this->db->insert('deposit',$data);
        return $result;
    }

    public function Withdraw_From_Account_For_Project($expenseHistory,$transaction,$withdraw,$balance) // Save information for withdrawal from account for a project
    {
        $result = $this->db->insert('expenseHistory',$expenseHistory);
        $result += $this->db->insert('transaction',$transaction);
        $result += $this->db->insert('withdraw',$withdraw);

        $this->db->set('Amount', 'Amount - ' . (int)$balance['Amount'], FALSE);
        $this->db->where('AccountNumber', $balance['AccountNumber']);
        $this->db->update('totalbalance');
    }

    public function Withdraw_From_Account($transaction,$withdraw,$balance) // Save information about withdrawl from account without project
    {
        $result = $this->db->insert('transaction',$transaction);
        $result += $this->db->insert('withdraw',$withdraw);

        $this->db->set('Amount', 'Amount - ' . (int)$balance['Amount'], FALSE);
        $this->db->where('AccountNumber', $balance['AccountNumber']);
        $this->db->update('totalbalance');
    }

    public function Deposit_To_Acc_For_Project($incomeHistory,$transaction,$deposit,$balance)
    {
        $result = $this->db->insert('projectincomehistory',$incomeHistory);
        $result += $this->db->insert('transaction',$transaction);
        $result += $this->db->insert('deposit',$deposit);

        $this->db->set('Amount', 'Amount + ' . (int)$balance['Amount'], FALSE);
        $this->db->where('AccountNumber', $balance['AccountNumber']);
        $this->db->update('totalbalance');
    }

    public function Deposit_To_Acc($transaction,$deposit,$balance)
    {
        $result = $this->db->insert('transaction',$transaction);
        $result += $this->db->insert('deposit',$deposit);

        $this->db->set('Amount', 'Amount + ' . (int)$balance['Amount'], FALSE);
        $this->db->where('AccountNumber', $balance['AccountNumber']);
        $this->db->update('totalbalance');
    }

    public function Add_Income_To_A_Project($data)
    {
        $this->db->set('ProjectIncome', 'ProjectIncome + ' . (int)$data['ProjectIncome'], FALSE);
        $this->db->where('Id', $data['ProjectId']);
        $this->db->update('projects');
    }

    public function Add_New_Account($data, $dataForBalance)
    {
        $result = $this->db->insert('accounts',$data);

        $result += $this->db->insert('totalbalance',$dataForBalance);
        return $result;
    }

    public function View_Accounts() // Get all the accounts information
    {
        $this->db->select('*');
        $this->db->from('accounts');
        $this->db->join('totalbalance', 'accounts.AccountNumber = totalbalance.AccountNumber','left');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }

    public function View_Specific_Account($id) // Get a specific account information by id
    {
        $this->db->select('*');
        $this->db->from('accounts');
        $this->db->Where('Id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function Update_Account($data) // Update account information
    {
        $this->db->where('Id',$data['Id']);
        $this->db->update('accounts',$data);
    }

    public function Adjust_Expense_And_Fund($value) // Adjust fund and expense of a project on updating a certain expense information
    {
        $this->db->set('ProjectExpense', 'ProjectExpense - ' . (int)$value['OldExpenseValue'], FALSE);
        $this->db->where('Id', $value['ProjectId']);
        $this->db->update('projects');
    }

   public function Add_Expense_To_A_Project($expenseHistory,$transaction,$withdraw,$balance) // Add an expense of a project
    {
        $this->db->set('ProjectExpense', 'ProjectExpense + ' . (int)$expenseHistory['ProjectExpense'], FALSE);
        $this->db->where('Id', $expenseHistory['ProjectId']);
        $this->db->update('projects');

        $result = $this->db->insert('expensehistory',$expenseHistory);
        $result += $this->db->insert('transaction',$transaction);
        $result += $this->db->insert('withdraw',$withdraw);

        $this->db->set('Amount', 'Amount - ' . (int)$balance['Amount'], FALSE);
        $this->db->where('AccountNumber', $balance['AccountNumber']);
        $this->db->update('totalbalance');
    }

    public function Add_Expense_History($data) // Add expense history to track expense history of a project *depositehistory*
    {
         $this->db->insert('expensehistory',$data);
    }

    public function Update_An_Expense_History_Of_A_Project($data)
    {
        $this->db->where('Id', $data['Id']);
        $this->db->update('expensehistory',$data);
    }

    public function Latest_Expense_Withdraw_History($Id) //for last five deposite history in a project *latestdepositehistory*
    {
        $this->db->select('*');
        $this->db->from('expensehistory');
        $this->db->where('ProjectId',$Id);
        $this->db->order_by('WithdrawDate','DESC');
        $this->db->limit(5);
        $result_query = $this->db->get();
        $result = $result_query->result();
        return $result;
    }

    public function Current_Expense_Withdraw_Amount() //for retrieve total balanace( deposite amount *currentdepositeamount*)
    {
        $this->db->select_sum('Amount');
        $query_result = $this->db->get('totalbalance');
        $result = $query_result->row();
        return $result;
    }

    public function Get_All_Deposit_History_Of_Mother_Acc() //For get all Withdraw history *get_all_withdrawhistory*
    {
        $this->db->select('*');
        $this->db->from('deposit');
        $this->db->order_by('DepositDate','DESC');
        $result_query = $this->db->get();
        $result = $result_query->result();
        return $result;
    }
   public function Get_Last_Five_Overall_Deposite_Acc() //For get last five overall deposite history
    {
        $this->db->select('*');
        $this->db->from('deposit');
        $this->db->order_by('DepositDate','DESC');
        $this->db->limit(5);
        $result_query = $this->db->get();
        $result = $result_query->result();
        return $result;
    }
    public function Get_Last_Five_Deposite_In_Mother_Acc($AccountNo) //For get last five deposite history of individual bank account *getlastfivedepositeinmotheracc*
    {
        $this->db->select('*');
        $this->db->from('deposit');
         $this->db->where('AccountNumber',$AccountNo);
        $this->db->order_by('DepositDate','DESC');
        $this->db->limit(5);
        $result_query = $this->db->get();
        $result = $result_query->result();
        return $result;
    }

    public function Get_All_Expense_Withdraw_History() //For get all deposite histrory of main account *get_all_depositehistory*
    {
        $this->db->select('*');
        $this->db->from('expensehistory');
        $this->db->order_by('WithdrawDate','DESC');
        $result_query = $this->db->get();
        $result = $result_query->result();
        return $result;
    }
    public function Get_Last_Five_Expense_Withdraw_History()//For retgrive last five withdraw history from total balance
    {
        $this->db->select('*');
        $this->db->from('withdraw');
        $this->db->order_by('Withdrawdate DESC','Id DESC');
        $this->db->limit(5);
        $result_query=$this->db->get();
        $result = $result_query->result();
        return $result;
    }

    public function Get_All_Withdraw_History_Of_Mother_Acc() //For get all Withdraw history *get_all_withdrawhistory*
    {
        $this->db->select('*');
        $this->db->from('withdraw');
        $this->db->order_by('WithdrawDate DESC','Id DESC');
        $result_query = $this->db->get();
        $result = $result_query->result();
        return $result;
    }
   public function Get_Last_Five_Withdraw_Of_all_Acc() //For get last five withdraw of all  bank account *getlastfivewithdraw*
    {
        $this->db->select('*');
        $this->db->from('withdraw');
        $this->db->order_by('Withdrawdate DESC','Id DESC');
        $this->db->limit(5);
        $result_query=$this->db->get();
        $result = $result_query->result();
        return $result;
    }
    public function Get_Last_Five_Withdraw_Of_Mother_Acc($AccountNo) //For get last five withdraw for individual bank account *getlastfivewithdraw*
    {
        $this->db->select('*');
        $this->db->from('withdraw');
        $this->db->where('AccountNumber',$AccountNo);
        $this->db->order_by('Withdrawdate DESC','Id DESC');
        $this->db->limit(5);
        $result_query=$this->db->get();
        $result = $result_query->result();
        return $result;
    }

    public function Get_Sum_Of_Withdraw_From_Mother_Acc() //For get total withdraw balance *get_sum_of_withdraw*
    {
        $this->db->select_sum('WithdrawAmount');
        $query_result = $this->db->get('withdraw');
        $result = $query_result->row();
        return $result;
    }

    public function Get_Sum_Of_Deposit_To_Mother_Acc() //For get total deposit amount *get_sum_of_deposite*
    {
        $this->db->select_sum('DepositAmount');
        $query_result=$this->db->get('deposit');
        $result = $query_result->row();
        return $result;
    }

    public function Get_Mother_Acc_Deposit_History($limit,$offset)//get mother account deposit history
    {
        $this->db->select('*');
        $this->db->from('deposit');
        $this->db->order_by('Id','DESC');
        $this->db->limit($limit,$offset);
        $result_query = $this->db->get();
        $result = $result_query->result();
        return $result;
    }
    
    public function Get_Specific_Acc_Deposit_History($Account_Number,$limit,$offset)
    {
        $this->db->select('*');
        $this->db->from('deposit');
        $this->db->where('AccountNumber',$Account_Number);
        $this->db->order_by('Id','DESC');
         $this->db->limit($limit,$offset);
        $result_query = $this->db->get();
        $result = $result_query->result();
        return $result;
    }

    public function Get_Mother_Acc_Withdraw_History($limit,$offset)
    {
        $this->db->select('*');
        $this->db->from('withdraw');
        $this->db->order_by('Id','DESC');
        $this->db->limit($limit,$offset);
        $result_query = $this->db->get();
        $result = $result_query->result();
        return $result;
    }

    public function Get_Specific_Acc_Withdraw_History($Account_Number,$limit,$offset)
    {
        $this->db->select('*');
        $this->db->from('withdraw');
        $this->db->where('AccountNumber',$Account_Number);
        $this->db->order_by('Id','DESC');
        $this->db->limit($limit,$offset);
        $result_query = $this->db->get();
        $result = $result_query->result();
        return $result;
    }
    public function View_Account_info($Account_Number)//for get specific account info
    {
        $this->db->select('*');
        $this->db->from('totalbalance');
        $this->db->where('AccountNumber',$Account_Number);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function View_specific_Accounts($Account_Number)//for get specific account info
    {
        $this->db->select('*');
        $this->db->from('accounts');
        $this->db->join('totalbalance', 'accounts.AccountNumber = totalbalance.AccountNumber','left');
        $this->db->where('accounts.AccountNumber',$Account_Number);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
  public function Get_Sum_Of_All_Accounts()//lfor get Number of account No.
    {
      $this->db->select_sum('Amount');
      $result = $this->db->get('totalbalance')->row();
      return $result->Amount;
    }
  
    public function Search_Withdraw_History($data)// For retrive the withdraw history by user search
    {
     
        
         if(!empty($data['From']) && !empty($data['To']) && !empty($data['Text']))
        {
            $this->db->select('*');
            $this->db->from('withdraw');
            $this->db->where('WithdrawDate >=',$data['From']);
            $this->db->where('WithdrawDate <=',$data['To']);
            $this->db->like('WithdrawReason',$data['Text']);
            $query_result=$this->db->get();
            $result=$query_result->result();
            return $result;
        }
        elseif(!empty($data['From']) && !empty($data['To']))
        {
            $this->db->select('*');
            $this->db->from('withdraw');
            $this->db->where('WithdrawDate >=',$data['From']);
            $this->db->where('WithdrawDate <=',$data['To']);
            $query_result = $this->db->get();
            $result = $query_result->result();
            return $result;
        }
        elseif(!empty($data['Text']))
        {
            $this->db->select('*');
            $this->db->from('withdraw');
            $this->db->like('WithdrawReason',$data['Text']);
            $query_result = $this->db->get();
            $result = $query_result->result();
            return $result;
        }
        elseif(!empty($data['From']))
        {
            $this->db->select('*');
            $this->db->from('withdraw');
            $this->db->where('WithdrawDate >=',$data['From']);
            $query_result = $this->db->get();
            $result = $query_result->result();
            return $result;
        }
        elseif(!empty($data['To']))
        {
            $this->db->select('*');
            $this->db->from('withdraw');
            $this->db->where('WithdrawDate <=',$data['To']);
            $query_result = $this->db->get();
            $result = $query_result->result();
            return $result;
        }
        elseif(!empty($data['From']) && !empty($data['Text']))
        {
            $this->db->select('*');
            $this->db->from('withdraw');
            $this->db->where('WithdrawDate >=',$data['From']);
            $this->db->like('WithdrawReason',$data['Text']);
            $query_result=$this->db->get();
            $result=$query_result->result();
            return $result;
        }
        elseif(!empty($data['To']) && !empty($data['Text']))
        {
            $this->db->select('*');
            $this->db->from('withdraw');
            $this->db->where('WithdrawDate <=',$data['To']);
            $this->db->like('WithdrawReason',$data['Text']);
            $query_result=$this->db->get();
            $result=$query_result->result();
            return $result;
        }
    }
    public function Search_individual_Withdraw_History($data)//search by individual account
    {
         if(!empty($data['From']) && !empty($data['To']) && !empty($data['Text']))
        {
            $this->db->select('*');
            $this->db->from('withdraw');
            $this->db->where('AccountNumber =',$data['AccountNumber']);
            $this->db->where('WithdrawDate >=',$data['From']);
            $this->db->where('WithdrawDate <=',$data['To']);
            $this->db->like('WithdrawReason',$data['Text']);
            $query_result=$this->db->get();
            $result=$query_result->result();
            return $result;
        }
        elseif(!empty($data['From']) && !empty($data['To']))
        {
            $this->db->select('*');
            $this->db->from('withdraw');
            $this->db->where('AccountNumber =',$data['AccountNumber']);
            $this->db->where('WithdrawDate >=',$data['From']);
            $this->db->where('WithdrawDate <=',$data['To']);
            $query_result = $this->db->get();
            $result = $query_result->result();
            return $result;
        }
        elseif(!empty($data['Text']))
        {
            $this->db->select('*');
            $this->db->from('withdraw');
            $this->db->where('AccountNumber=',$data['AccountNumber']);
            $this->db->like('WithdrawReason',$data['Text']);
            $query_result = $this->db->get();
            $result = $query_result->result();
            return $result;
        }
        elseif(!empty($data['From']))
        {
            $this->db->select('*');
            $this->db->from('withdraw');
             $this->db->where('AccountNumber =',$data['AccountNumber']);
            $this->db->where('WithdrawDate >=',$data['From']);
            $query_result = $this->db->get();
            $result = $query_result->result();
            return $result;
        }
        elseif(!empty($data['To']))
        {
            $this->db->select('*');
            $this->db->from('withdraw');
             $this->db->where('AccountNumber =',$data['AccountNumber']);
            $this->db->where('WithdrawDate <=',$data['To']);
            $query_result = $this->db->get();
            $result = $query_result->result();
            return $result;
        }
        elseif(!empty($data['From']) && !empty($data['Text']))
        {
            $this->db->select('*');
            $this->db->from('withdraw');
             $this->db->where('AccountNumber =',$data['AccountNumber']);
            $this->db->where('WithdrawDate >=',$data['From']);
            $this->db->like('WithdrawReason',$data['Text']);
            $query_result=$this->db->get();
            $result=$query_result->result();
            return $result;
        }
        elseif(!empty($data['To']) && !empty($data['Text']))
        {
            $this->db->select('*');
            $this->db->from('withdraw');
             $this->db->where('AccountNumber =',$data['AccountNumber']);
            $this->db->where('WithdrawDate <=',$data['To']);
            $this->db->like('WithdrawReason',$data['Text']);
            $query_result=$this->db->get();
            $result=$query_result->result();
            return $result;
        }
      
    }

    public function Search_Deposite_History($data)// For retrive the deposite history by user search
    {
     
        
         if(!empty($data['From']) && !empty($data['To']) && !empty($data['Text']))
        {
            $this->db->select('*');
            $this->db->from('deposit');
            $this->db->where('DepositDate >=',$data['From']);
            $this->db->where('DepositDate <=',$data['To']);
            $this->db->like('DepositSource',$data['Text']);
            $query_result=$this->db->get();
            $result=$query_result->result();
            return $result;
        }
        elseif(!empty($data['From']) && !empty($data['To']))
        {
            $this->db->select('*');
            $this->db->from('deposit');
            $this->db->where('DepositDate >=',$data['From']);
            $this->db->where('DepositDate <=',$data['To']);
            $query_result = $this->db->get();
            $result = $query_result->result();
            return $result;
        }
        elseif(!empty($data['Text']))
        {
            $this->db->select('*');
            $this->db->from('deposit');
            $this->db->like('DepositSource',$data['Text']);
            $query_result = $this->db->get();
            $result = $query_result->result();
            return $result;
        }
        elseif(!empty($data['From']))
        {
            $this->db->select('*');
            $this->db->from('deposit');
            $this->db->where('DepositDate >=',$data['From']);
            $query_result = $this->db->get();
            $result = $query_result->result();
            return $result;
        }
        elseif(!empty($data['To']))
        {
            $this->db->select('*');
            $this->db->from('deposit');
            $this->db->where('DepositDate <=',$data['To']);
            $query_result = $this->db->get();
            $result = $query_result->result();
            return $result;
        }
        elseif(!empty($data['From']) && !empty($data['Text']))
        {
            $this->db->select('*');
            $this->db->from('deposit');
            $this->db->where('DepositDate >=',$data['From']);
            $this->db->like('DepositSource',$data['Text']);
            $query_result=$this->db->get();
            $result=$query_result->result();
            return $result;
        }
        elseif(!empty($data['To']) && !empty($data['Text']))
        {
            $this->db->select('*');
            $this->db->from('deposit');
            $this->db->where('DepositDate <=',$data['To']);
            $this->db->like('DepositSource',$data['Text']);
            $query_result=$this->db->get();
            $result=$query_result->result();
            return $result;
        }
      
          

       

    }
    public function Search_individual_Deposite_History($data)// For retrive the deposite history by user search
    {
     
        
         if(!empty($data['From']) && !empty($data['To']) && !empty($data['Text']))
        {
            $this->db->select('*');
            $this->db->from('deposit');
            $this->db->where('DepositDate >=',$data['From']);
            $this->db->where('DepositDate <=',$data['To']);
            $this->db->like('DepositSource',$data['Text']);
            $query_result=$this->db->get();
            $result=$query_result->result();
            return $result;
        }
        elseif(!empty($data['From']) && !empty($data['To']))
        {
            $this->db->select('*');
            $this->db->from('deposit');
            $this->db->where('DepositDate >=',$data['From']);
            $this->db->where('DepositDate <=',$data['To']);
            $query_result = $this->db->get();
            $result = $query_result->result();
            return $result;
        }
        elseif(!empty($data['Text']))
        {
            $this->db->select('*');
            $this->db->from('deposit');
            $this->db->like('DepositSource',$data['Text']);
            $query_result = $this->db->get();
            $result = $query_result->result();
            return $result;
        }
        elseif(!empty($data['From']))
        {
            $this->db->select('*');
            $this->db->from('deposit');
            $this->db->where('DepositDate >=',$data['From']);
            $query_result = $this->db->get();
            $result = $query_result->result();
            return $result;
        }
        elseif(!empty($data['To']))
        {
            $this->db->select('*');
            $this->db->from('deposit');
            $this->db->where('DepositDate <=',$data['To']);
            $query_result = $this->db->get();
            $result = $query_result->result();
            return $result;
        }
        elseif(!empty($data['From']) && !empty($data['Text']))
        {
            $this->db->select('*');
            $this->db->from('deposit');
            $this->db->where('DepositDate >=',$data['From']);
            $this->db->like('DepositSource',$data['Text']);
            $query_result=$this->db->get();
            $result=$query_result->result();
            return $result;
        }
        elseif(!empty($data['To']) && !empty($data['Text']))
        {
            $this->db->select('*');
            $this->db->from('deposit');
            $this->db->where('DepositDate <=',$data['To']);
            $this->db->like('DepositSource',$data['Text']);
            $query_result=$this->db->get();
            $result=$query_result->result();
            return $result;
        }
      
          

       

    }
    public function Withdraw_From_Account_For_Liability($liabilityhistory,$liability,$transaction,$withdraw,$balance) // For paid liability in withdraw
    {
        $result = $this->db->insert('liabilityhistory',$liabilityhistory);
        $result += $this->db->insert('transaction',$transaction);
        $result += $this->db->insert('withdraw',$withdraw);

        $this->db->set('RemainingAmount', 'RemainingAmount - ' . (int)$liability['Amount'], FALSE);
        $this->db->where('Id', $liability['Id']);
        $this->db->update('liabilities');

        $this->db->set('Amount', 'Amount - ' . (int)$balance['Amount'], FALSE);
        $this->db->where('AccountNumber', $balance['AccountNumber']);
        $this->db->update('totalbalance');
    }

   public function Deposit_To_Acc_For_Liability($liabilityhistory,$liabilities,$transaction,$deposit,$balance) // For received liability in deposit
    {
        $result = $this->db->insert('liabilityhistory',$liabilityhistory);
        $result += $this->db->insert('transaction',$transaction);
        $result += $this->db->insert('deposit',$deposit);

        $this->db->set('Amount', 'Amount + ' . (int)$balance['Amount'], FALSE);
        $this->db->where('AccountNumber', $balance['AccountNumber']);
        $this->db->update('totalbalance');
         $this->db->set('RemainingAmount', 'RemainingAmount + ' . (int)$liabilities['RemainingAmount'], FALSE);
        $this->db->where('Id', $liabilities['Id']);
        $this->db->update('liabilities');
    }






















}
