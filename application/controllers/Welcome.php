<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
        public function __construct() {
            parent::__construct();
            $this->load->model('projects');
            $this->load->model('employee');
            $this->load->model('account');
             $this->load->model('liability');
             $this->load->model('pagination_model');
             $this->load->library('pagination');
        }


        public function index()
      	{
      		  $this->load->view('register');
      	}

       public function Admin_Dashboard()
        {
            $result = array();
            $result['employees'] = $this->employee->View_Employees();
            $result['totalProjects'] = $this->projects->View_Total_Number_Of_Running_Projects();
            $result['totalEmployees'] = $this->employee->View_Total_Number_Of_Employees();
            $result['totalBalance'] = $this->account->Get_Sum_Of_All_Accounts();
             $result['totalLiability'] = $this->liability->Get_Sum_Of_All_Liability();
            $this->load->view('admin_dashboard',$result);
        }

        public function Add_Project()
        {
            $this->load->view('add_new_project');
        }

        public function View_Running_Project($offset=0)
        {
            $config=array(
                'base_url' => 'View_Running_Project',
                'per_page' => 3,
                'total_rows' => $this->pagination_model->View_Running_Projects_num_rows(),
            );
            $this->pagination->initialize($config);
            $result = array();
            $result['result'] = $this->projects->View_Running_Projects($config['per_page'],$this->uri->segment(3));
            $this->load->view('view_running_project', $result);
        }

        public function View_Closed_Project()
        {
            $result = array();
            $result['result'] = $this->projects->View_Closed_Projects();
            $this->load->view('view_closed_project', $result);
        }

        public function Add_New_Employee()
        {
            $this->load->view('add_new_employee');
        }

        public function View_Employee_List()
        {
            $result = array();
            $result['result'] = $this->employee->View_Employees();
            $this->load->view('view_employee_list', $result);
        }

        public function Add_New_Account()
        {
            $this->load->view('add_new_account');
        }

        public function Deposit()//For deposite view
        {
            $data = array(
                "query_result"=>$this->account->Current_Expense_Withdraw_Amount(),
                "result"=>$this->account->Get_Last_Five_Overall_Deposite_Acc(),
                "accounts"=>$this->account->View_Accounts(),

            );
            $this->load->view('deposit', $data);
        }

        public function Withdraw()
        {
            $data = array(
                "query_result"=>$this->account->Current_Expense_Withdraw_Amount(),
                "result"=>$this->account->Get_Last_Five_Withdraw_Of_all_Acc(),
                "accounts"=>$this->account->View_Accounts(),
                "projects"=>$this->projects->View_All_Projects(),
            );
            $this->load->view('withdraw', $data);
        }
        public function View_Withdraw_History()
        {
            $this->load->view('view_mother_acc_withdraw_history');
        }

        public function Balance_Sheet()
        {
            $data = array(
              "current_balance"=>$this->account->Current_Expense_Withdraw_Amount(),
              "total_deposite"=>$this->account->Get_Sum_Of_Deposit_To_Mother_Acc(),
              "total_withdraw"=>$this->account->Get_Sum_Of_Withdraw_From_Mother_Acc(),
              "result"=>$this->account->Get_All_Expense_Withdraw_History(),
              "withdraw_history"=>$this->account->Get_All_Withdraw_History_Of_Mother_Acc(),
            );
            $this->load->view('balance_sheet', $data);
        }

        public function Add_New_Liability()
        {
            $this->load->view('add_new_liability');
        }

        public function Add_New_Asset()
        {
            $data = array();
            $data['projects'] = $this->projects->View_All_Projects();
            $this->load->view('add_new_asset', $data);
        }

        public function View_All_Assets()
        {
            $result = array();
            $result['result'] = $this->projects->View_All_Assets();
            $this->load->view('view_all_asset', $result);
        }

}
