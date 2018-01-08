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
class user extends CI_Model {
    //put your code
    public function __construct()
    {
        parent::__construct();
    }

    public function Login_Info($Username,$Password)
    {
      $Username = $this->input->post('Username',true);
      $Password = $this->input->post('Password',true);
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('Username',$Username);
      $this->db->where('Password',$Password);
      $query_result = $this->db->get();
      $result = $query_result->row();
      return $result;
    }

    public function Add_Project($data)
    {
        $result = $this->db->insert('projects',$data);
        $sdata = array();
        $sdata['Username'] = $data['ProjectCode'];
        $sdata['Password'] = $data['Password'];
        $sdata['UserType'] = 'User';
       if($result)
       {
           $this->db->insert('user',$sdata);
       }
       return $result;
    }

    public function Add_Employee($data)
    {
        $result = $this->db->insert('employees',$data);
        return $result;
    }

    public function deposite($data)
    {
        $result = $this->db->insert('deposit',$data);
        return $result;
    }
}
