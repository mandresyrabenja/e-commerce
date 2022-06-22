<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('product_model', 'product');
    }
    
    public function createProduct() {
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $price = $this->input->post('price');
        $nb = $this->input->post('nb');
        $brand = $this->input->post('brand');

        $this->product->insert($name, $description, $price, $nb, $brand);
    }

    public function createProductForm()
	{
        if($this->session->userdata('adminId') == null) {
            redirect('admin/login');
        }
        $data['brands'] = $this->product->findAllProductBrands();
        $data['page'] = $this->load->view('backoffice/createProduct', $data, true);
        
		$this->load->view('backoffice/template', $data);
	}
}
