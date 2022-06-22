<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model', 'admin');
    }
    /**
     * @return void
     */
    public function index()
    {
        $this->load->view('backoffice/login');
    }
    
    public function login()
	{
		
		if($this->admin->isValidLogin($this->input->post('login'), $this->input->post('password'))) {
            $adminId = $this->admin->getAdminId($this->input->post('login'))[0]->id;
            $this->session->set_userdata('adminId', $adminId);
            redirect('createArticleForm');
        } else {
            $data['error'] = true;
            $this->load->view('backoffice/login', $data);
        }
	}
}
