<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pagination_model
 *
 * @author User
 */
class pagination_model extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
    }
    public function Get_Mother_Acc_Deposit_History_num_rows()//get mother account deposit history for pagination
    {
        $this->db->select('*');
        $this->db->from('deposit');
        $this->db->order_by('Id','DESC');
        $result_query = $this->db->get();
        $result = $result_query->num_rows();
        return $result;
    }
     public function Get_Specific_Acc_Deposit_History_num_rows($Account_Number)//get specific account deposit history for pagination
    {
        $this->db->select('*');
        $this->db->from('deposit');
        $this->db->where('AccountNumber',$Account_Number);
        $this->db->order_by('Id','DESC');
        $result_query = $this->db->get();
        $result = $result_query->num_rows();
        return $result;
    }
    public function Get_Mother_Acc_Withdraw_History_num_rows()
    {
        $this->db->select('*');
        $this->db->from('withdraw');
        $this->db->order_by('Id','DESC');
        $result_query = $this->db->get();
        $result = $result_query->num_rows();
        return $result;
    }
    public function Get_Specific_Acc_Withdraw_History_num_rows($Account_Number)
    {
        $this->db->select('*');
        $this->db->from('withdraw');
        $this->db->where('AccountNumber',$Account_Number);
        $this->db->order_by('Id','DESC');
        $result_query = $this->db->get();
        $result = $result_query->num_rows();
        return $result;
    }
    public function View_Running_Projects_num_rows() // *viewrunningproject*
    {
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('Status','Running');
        $query_result=$this->db->get();
        $result=$query_result->num_rows();
        return $result;
    }
     public function View_Expense_List_Of_A_Project_num_rows($Id)//For view the running project *viewrunningproject*
    {
        $this->db->select('*');
        $this->db->from('expensehistory');
        $this->db->where('ProjectId',$Id);
        $this->db->order_by('Id', 'DESC');
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
    }
}
