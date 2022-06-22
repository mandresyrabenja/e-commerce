<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model', 'admin');
    }
    
    public function deleteRecharge() {
        $rechargeId = $this->input->get('rechargeId');
        
        $this->db->where('id', $rechargeId);
        $this->db->delete('recharge');
        
        redirect('admin/listRecharge');
    }

    public function validateRecharge() {
        $rechargeId = $this->input->get('rechargeId');
        $customerId = $this->input->get('customerId');
        $amount = $this->input->get('amount');

        $this->db->set('money', "money+$amount", FALSE);
        $this->db->where('id', $customerId);
        $this->db->update('customer');

        $this->db->set('is_valid', true);
        $this->db->where('id', $rechargeId);
        $this->db->update('recharge');

        redirect('admin/listRecharge');
    }

    public function index()
    {
        $this->load->view('backoffice/login');
    }
    
    public function listRecharge() {
        $this->db->where('is_valid', false);
        $data['recharges'] = $this->db->get('recharge_details')->result();
        
        $data['page'] = $this->load->view('backoffice/listRecharge', $data, true);
		$this->load->view('backoffice/template', $data);
    }

    public function login()
	{
		
		if($this->admin->isValidLogin($this->input->post('login'), $this->input->post('password'))) {
            $adminId = $this->admin->getAdminId($this->input->post('login'))[0]->id;
            $this->session->set_userdata('adminId', $adminId);
            redirect('product/createProductForm');
        } else {
            $data['error'] = true;
            $this->load->view('backoffice/login', $data);
        }
	}
}
