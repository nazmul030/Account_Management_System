<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of projects
 *
 * @author User
 */

class projects extends CI_Model{

    public function __construct() {
        parent::__construct();
    }

    public function View_Running_Projects($limit,$offset) // *viewrunningproject*
    {
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('Status','Running');
        $this->db->order_by('Id', 'DESC');
         $this->db->limit($limit,$offset);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }

    public function View_Closed_Projects() // *viewclosedproject*
    {
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('Status','Closed');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }

    public function View_All_Projects() // *viewrunningproject*
    {
        $this->db->select('*');
        $this->db->from('projects');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }

    public function View_Expense_List_Of_A_Project($Id,$limit,$offset)//For view the running project *viewrunningproject*
    {
        $this->db->select('*');
        $this->db->from('expensehistory');
        $this->db->where('ProjectId',$Id);
        $this->db->order_by('Id', 'DESC');
        $this->db->limit($limit,$offset);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function Update_Expense_Of_A_Project($data)
    {
        $this->db->where('Id',$data['Id']);
        $this->db->update('expensehistory',$data);
    }

    public function View_Specific_Expense($Id)
    {
        $this->db->select('*');
        $this->db->from('expensehistory');
        $this->db->Where('Id',$Id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function Edit_Running_Project($Id) // *editrunningproject*
    {
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->Where('Id',$Id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }

    public function Update_Rrunning_Project($data) // *updaterunningproject*
    {
        $this->db->where('Id',$data['Id']);
        $this->db->update('projects',$data);
    }

    public function Close_Current_Project($Id) // *closecurrentproject*
    {
        $this->db->set('Status','Closed');
        $this->db->where('Id',$Id);
        $this->db->update('projects');
    }

    public function View_Total_Number_Of_Running_Projects() // For get total number of running project
    {
        $this->db->where('Status','Running');
        $this->db->from('projects');
        return $this->db->count_all_results();
    }

    public function Add_New_Asset($data) // To Add New Asset Of A Project
    {
        $result = $this->db->insert('assets',$data);
        return $result;
    }

    public function View_Specific_Asset($Id)
    {
      $this->db->select('assets.Id, assets.Name, assets.Date, assets.Price, assets.Quantity, projects.ProjectName, assets.Remark');
      $this->db->from('assets');
      $this->db->join('projects', 'assets.ProjectId = projects.Id','left');
      $this->db->where('assets.Id',$Id);
      $query_result=$this->db->get();
      $result=$query_result->row();
      return $result;
    }

    public function Update_Asset($data)
    {
        $this->db->where('Id',$data['Id']);
        $this->db->update('assets',$data);
    }

    public function View_All_Assets() // To View All The Assets
    {
        $this->db->select('assets.Id, assets.Name, assets.Date, assets.Price, assets.Quantity, projects.ProjectName, assets.Remark');
        $this->db->from('assets');
        $this->db->join('projects', 'assets.ProjectId = projects.Id','left');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
}
