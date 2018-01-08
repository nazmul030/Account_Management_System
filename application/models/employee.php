<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author User
 */
class employee extends CI_Model {
    //put your code
    public function __construct()
    {
        parent::__construct();
    }

    public function Add_Employee($data)
    {
        $result = $this->db->insert('employees',$data);
        return $result;
    }

    public function View_Employees()
    {
        $this->db->select('*');
        $this->db->from('employees');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }

    public function View_Specific_Employee($Id) // *editrunningproject*
    {
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->Where('EmployeeID',$Id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }

    public function Update_Employee_Info($data) // *updaterunningproject*
    {
        $this->db->where('EmployeeID',$data['EmployeeID']);
        $this->db->update('employees',$data);
    }

    public function Delete_Specific_Employee($employeeId)
    {
        $this->db->where('EmployeeID',$employeeId);
        $this->db->delete('employees');
    }
    public function View_Total_Number_Of_Employees()//Get Number of total number of Employee
    {
        $this->db->select('*');
        $this->db->from('employees');
        return $this->db->count_all_results();
    }


  }
