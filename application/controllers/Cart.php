<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('product_model', 'product');
        $this->load->model('customer_model', 'customer');
    }

    public function order() {
        # L'utilisateur doît être connecté
        if( !$this->session->has_userdata('customerId') ) {
            redirect('customer/loginForm');
        }

        # Montant total des paniers
        $carts = $this->sessionToCart();
        $amountTotal = 0;
        foreach($carts as $cart) {
            $amountTotal += $cart['amount'];
        }

        # L'utilisateur doît avoîr le montant necessaire sur son compte
        $customer = $this->customer->findById($this->session->userdata('customerId'))[0];
        if($amountTotal > $customer->money) {
            redirect("cart/cart?error=Votre argent est insuffisant pour cet achat. Veuillez recharger votre compte.");
        }

        # Vérification des articles disponibles en stocks
        foreach($carts as $cart) {
            $product = $this->product->findById($cart['productId']);
            if($product->nb < $cart['nb']) {
                redirect("cart/cart?error=Il ne reste plus que $product->nb $product->name disponible");
            }
        }

        # Insértion du commande
        $newOrder = array(
            'customer_id' => $customer->id,
            'date' => date("Y-m-d")
        );
        $this->db->insert('order', $newOrder);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $orderId = $this->db->get('order')->result()[0]->id;

        # Insertion des détails commande
        foreach($carts as $cart) {
            $newOrderDetails = array(
                'order_id' => $orderId,
                'product_id' => $cart['productId'],
                'unit_price' => $cart['unitPrice'],
                'nb' => $cart['nb']
            );
            $this->db->insert('order_details', $newOrderDetails);

            $nb = $cart['nb'];
            $this->db->set('nb', "nb-$nb", FALSE);
            $this->db->where('id', $cart['productId']);
            $this->db->update('product');
        }

        # Retrait de l'argent du compte du client
        $this->db->set('money', "money-$amountTotal", FALSE);
        $this->db->where('id', $customer->id);
        $this->db->update('customer');

        # Suppression du session de l'achat
        setcookie('carts', '[]',  time() + (86400 * 30), "/");

        redirect('product/listProductClient');
    }

    public function removeCartElement() {

        if( isset($_COOKIE['carts']) && ($this->input->get('index') != null) ) {
            $index = $this->input->get('index');

            $carts = json_decode($_COOKIE['carts']);
            array_splice($carts, $index, 1);
            setcookie('carts', json_encode($carts),  time() + (86400 * 30), "/");
        }

        redirect('cart/cart');
    }

    public function modifyNb() {

        if( isset($_COOKIE['carts']) && ($this->input->get('index') != null) && ($this->input->get('nb') != null)
            && ($this->input->get('nb') > 0) ) {
            $nb = $this->input->get('nb');
            $index = $this->input->get('index');

            $carts = json_decode($_COOKIE['carts']);
            $carts[$index]->nb = $nb;
            setcookie('carts', json_encode($carts),  time() + (86400 * 30), "/");
        }

        redirect('cart/cart');

    }

    public function cart() {
        if( isset($_COOKIE['carts']) ) {
            $data['carts'] =$this->sessionToCart();

            if($this->input->get('error') != null) {
                $data['error'] = $this->input->get('error');
            }
            
            $data['page'] = $this->load->view('order/cart', $data, true);
            $data['brands'] = $this->product->findAllProductBrands();
            $this->load->view('template', $data);
        } else {
            $data['carts'] = array();

            if($this->input->get('error') != null) {
                $data['error'] = $this->input->get('error');
            }
            
            $data['page'] = $this->load->view('order/cart', $data, true);
            $data['brands'] = $this->product->findAllProductBrands();
            $this->load->view('template', $data);
        }

    }

    public function sessionToCart() {
        $carts = array();
        $cookieCarts = json_decode($_COOKIE['carts']);

        foreach($cookieCarts as $cart) {
            $product = $this->product->findById($cart->productId);
            array_push(
                $carts,
                array(
                    "productId" => $product->id,
                    "productName" => $product->name,
                    "unitPrice" => $product->price,
                    "nb" => $cart->nb,
                    "amount" => $product->price * $cart->nb,
                    "isRecipe" => $cart->isRecipe,
                )
            );
        }

        return $carts;
    }

    public function addCart() {
        $productId = $this->input->post('productId');
        $nb = $this->input->post('nb');
        
        if( !isset($_COOKIE['carts']) ) {
            setcookie('carts', '[]',  time() + (86400 * 30), "/");
        }

        $carts = json_decode($_COOKIE['carts']);
        array_push(
            $carts,
            array(
                "productId" => $productId,
                "nb" => $nb,
                "isRecipe" => false
            )
        );
        setcookie('carts', json_encode($carts),  time() + (86400 * 30), "/");

        redirect('cart/cart');
    }

}
