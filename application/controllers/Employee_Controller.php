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
class Employee_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('employee');
        $this->load->model('user');
        $this->load->model('account');
        $this->load->model('projects');
    }

    public function Add_Employee()//For add new project
    {
        if(isset($_POST["employeeRegister"]))
        {
           $data = array();
           $data['Name'] = $this->input->post('employeeName');
           $data['Designation'] = $this->input->post('employeeDesignation');
           $data['Address'] = $this->input->post('employeeAddress');
           $data['DateOfBirth'] = $this->input->post('employeeDateOfBirth');
           $data['ContactNo'] = $this->input->post('employeeContact');
           $data['NID'] = $this->input->post('employeeNID');
           $target = "image/".basename($_FILES['image']['name']);
           $data['Image'] = $_FILES['image']['name'];
           $data['EmailAddress'] = $this->input->post('employeeEmail');
           $data['EmployeeType'] = $this->input->post('employeeType');
           /* $imageTmp = $_FILES["photo"]["tmp_name"];
           $imageName = $_FILES['photo']['name'];
           $image = "image/".$imageName; */
           $data['EmployeeID'] = $this->input->post('employeeID');
           $data['Password'] = $this->input->post('employeePassword');
           $msg = "";

           $result=$this->employee->Add_Employee($data);

           if (move_uploaded_file($_FILES['image']['tmp_name'], $target))
           {
                $msg = "Image uploaded successfully";
           }
           else
           {
                $msg = "Failed to upload image";
           }

           if($result)
           {
                echo "<script  type='text/javascript'>alert('Insert Successfully. Id=".$data['employeeID']."and Password=".$data['employeePassword'].".')</script>";
                redirect('Welcome/Add_New_Employee');
           }
       }
       elseif(isset($_POST["employeeRegisterCancel"]))
       {
            redirect('Admin_Controller/index');
       }
    }

    public function View_Specific_Employee($Id)//For retrieve the existing project for edit
    {
        $result = array();
        $result['result'] = $this->employee->View_Specific_Employee($Id);
        $this->load->view('edit_specific_employee',$result);
    }

    /*/ <textarea rows="2" cols="20" class="form-control" id="employeeAddress" name="employeeAddress" type="text" aria-describedby="nameHelp" value="<?php echo $result->Address;?>"></textarea> */

    public function Update_Employee() //For update project
    {
         if(isset($_POST["employeeInfoUpdate"]))
         {
            $data = array();
            $data['Name'] = $this->input->post('employeeName');
            $data['Designation'] = $this->input->post('employeeDesignation');
            $data['Address'] = $this->input->post('employeeAddress');
            $data['DateOfBirth'] = $this->input->post('employeeDateOfBirth');
            $data['ContactNo'] = $this->input->post('employeeContact');
            $data['NID'] = $this->input->post('employeeNID');
            $target = "image/".basename($_FILES['image']['name']);
            $data['Image'] = $_FILES['image']['name'];
            $data['EmailAddress'] = $this->input->post('employeeEmail');
            $data['EmployeeType'] = $this->input->post('employeeType');
            $data['EmployeeID'] = $this->input->post('employeeID');
            $data['Password'] = $this->input->post('employeePassword');
            $this->employee->Update_Employee_Info($data);

            redirect('Welcome/View_Employee_List');
        }
        elseif(isset($_POST["employeeInfoUpdateCancel"]))
        {
            redirect('Welcome/View_Employee_List');
        }
    }

    public function Delete_Employee($employeeId)
    {
           $this->employee->Delete_Specific_Employee($employeeId);
           redirect('Welcome/View_Employee_List');
    }

}
