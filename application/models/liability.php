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
class liability extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function Add_New_Liability($data) // To Add New Liability
    {
        $result = $this->db->insert('liabilities',$data);
        return $result;
    }

    public function View_Liabilities() // Get all the liability information
    {
        $this->db->select('*');
        $this->db->from('liabilities');

        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }

    public function View_Specific_Liability($id) // Get a specific liability information by id
    {
        $this->db->select('*');
        $this->db->from('liabilities');
        $this->db->Where('Id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function Update_Liability($data) // Update liability information
    {
        $this->db->where('Id',$data['Id']);
        $result = $this->db->update('liabilities',$data);
        return $result;
    }
    public function PaidBack_Liability($data) // Paid back taken liability
    {
        $this->db->insert('liabilityhistory',$data);

        $this->db->set('RemainingAmount', 'RemainingAmount - ' . (int)$data['Amount'], FALSE);
        $this->db->where('Id',$data['LiabilityId']);
        $result = $this->db->update('liabilities');
    }

    public function Received_Liability($data) // Take more amount as liability
    {
        $this->db->insert('liabilityhistory',$data);

        $this->db->set('RemainingAmount', 'RemainingAmount + ' . (int)$data['Amount'], FALSE);
        $this->db->where('Id',$data['LiabilityId']);
        $result = $this->db->update('liabilities');
    }

    public function Get_Paidback_List_Of_A_Liability($Id) // Get the list of the paid history of a laibility
    {
        $this->db->select('*');
        $this->db->from('liabilityhistory');
        $this->db->Where('TransactionType','Paid');
        $this->db->Where('LiabilityId',$Id);
        $query_result=$this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function Get_Received_List_Of_A_Liability($Id) // Get the list of the received history of a laibility
    {
        $this->db->select('*');
        $this->db->from('liabilityhistory');
        $this->db->Where('TransactionType','Received');
        $this->db->Where('LiabilityId',$Id);
        $query_result=$this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function Get_Sum_Of_All_Liability() // Get The Remaining Ammount Of All The Liability
    {
        $this->db->select_sum('RemainingAmount');
        $result = $this->db->get('liabilities')->row();
        return $result->RemainingAmount;
    }
}

?>
