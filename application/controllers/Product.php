<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('product_model', 'product');
    }
    
    public function getProductPageClient() {

        # Récuperation du taille et numero de page actuelle
        $pageSize = $this->input->get('pageSize') != null ? $this->input->get('pageSize') : 6;
        $currPage = $this->input->get('currPage') != null ? $this->input->get('currPage') : 1;
        $data['currPage'] = $currPage;
        $data['prevPage'] = $currPage - 1;
        $data['nextPage'] = $currPage + 1;

        # Nombre des pages
        $nbProducts = $this->product->count();
        $data['nbPage'] = (( $nbProducts-($nbProducts%$pageSize) ) / $pageSize) + 1 ;

        $data['products'] = $this->product->listWithPage($pageSize, $pageSize*($currPage-1));
        
        $data['page'] = $this->load->view('product/list', $data, true);
		$this->load->view('template', $data);
    }
    
    public function listProductClient() {
        redirect('product/getProductPageClient');
    }

    public function list() {
        $data['products'] = $this->product->list();
        $data['page'] = $this->load->view('backoffice/listProduct', $data, true);
        
		$this->load->view('backoffice/template', $data);
    }

    public function createProduct() {
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $price = $this->input->post('price');
        $nb = $this->input->post('nb');
        $brand = $this->input->post('brand');

        $this->product->insert($name, $description, $price, $nb, $brand);
        redirect('product/list');
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
