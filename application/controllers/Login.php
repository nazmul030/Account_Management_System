<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
            $this->load->model('user');
            $this->load->library('session');
        }

        public function login_info()
        {
            $Username = $this->input->post('Username',true);
            $Password = $this->input->post('Password',true);
            $result = $this->user->Login_Info($Username,$Password);
            if($result)
            {
                $sdata=array();
                $sdata['UserName']=$result->Username;
                $sdata['Password']=$result->Password;
                $sdata['UserType']=$result->UserType;
                $this->session->set_userdata($sdata);


                if($result->UserType=='Admin')
                {
                    redirect('Welcome/Admin_Dashboard');
                }
            }

        }
        public function logout()
        {
              $this->session->unset_userdata('UserName');
            $this->session->unset_userdata('Password');
            $this->session->sess_destroy();
            redirect('welcome','refresh');
        }
}
