<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model', 'customer');
        $this->load->model('product_model', 'product');
    }

    public function logout() {
        if($this->session->has_userdata('customerId'))
           $this->session->unset_userdata('customerId');
        
        redirect('product/listProductClient');
    }

    public function loginForm() {
        $data['page'] = $this->load->view('customer/login', [], true);
        $data['brands'] = $this->product->findAllProductBrands();
        $this->load->view('template', $data);
    }
    
    public function register() {
        
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->customer->register($name, $email, $password);
        $customerId = $this->customer->findCustomer($email, $password)[0]->id;
        $this->session->set_userdata('customerId', $customerId);
        
        redirect('product/listProductClient');
    }

    public function login()
	{
        $email = $this->input->post('email');
		$password = $this->input->post('password');

		if( $this->customer->isValidLogin($email, $password) ) {
            $customerId = $this->customer->findCustomer($email, $password)[0]->id;
            $this->session->set_userdata('customerId', $customerId);
            
            redirect('product/listProductClient');
        } else {
            $data['error'] = true;

            $data['page'] = $this->load->view('customer/login', $data, true);
            $data['brands'] = $this->product->findAllProductBrands();
            $this->load->view('template', $data);
        }
	}
}
