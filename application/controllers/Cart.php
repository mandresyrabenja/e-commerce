<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('product_model', 'product');
    }

    public function modifyNb() {

        if( $this->session->has_userdata('carts') && ($this->input->get('index') != null) && ($this->input->get('nb') != null) ) {
            $nb = $this->input->get('nb');
            $index = $this->input->get('index');

            $carts = $this->session->userdata('carts');
            $carts[$index]['nb'] = $nb;
            $this->session->set_userdata('carts', $carts);
        }

        redirect('cart/cart');

    }

    public function cart() {
        if( $this->session->has_userdata('carts') ) {
            $data['carts'] =$this->sessionToCart();
            
            $data['page'] = $this->load->view('order/cart', $data, true);
            $data['brands'] = $this->product->findAllProductBrands();
            $this->load->view('template', $data);
        }

    }

    public function sessionToCart() {
        $carts = array();

        foreach($this->session->userdata('carts') as $cart) {
            $product = $this->product->findById($cart["productId"]);
            array_push(
                $carts,
                array(
                    "productId" => $product->id,
                    "productName" => $product->name,
                    "unitPrice" => $product->price,
                    "nb" => $cart["nb"],
                    "amount" => $product->price * $cart["nb"],
                )
            );
        }

        return $carts;
    }

    public function addCart() {
        $productId = $this->input->post('productId');
        $nb = $this->input->post('nb');
        
        if( !$this->session->has_userdata('carts') ) {
            $this->session->set_userdata('carts', array());
        }

        $carts = $this->session->userdata('carts');
        array_push(
            $carts,
            array(
                "productId" => $productId,
                "nb" => $nb
            )
        );
        $this->session->set_userdata('carts', $carts);

        redirect('cart/cart');
    }

}
