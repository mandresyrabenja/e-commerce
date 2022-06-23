<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('product_model', 'product');
        $this->load->model('customer_model', 'customer');
        $this->load->model('recipe_model', 'recipe');
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

        # Si l'achat a des recettes
        if(isset($_COOKIE['recipes']) && (json_decode($_COOKIE['recipes']) != null) && !empty(json_decode($_COOKIE['recipes'])) ) {
            $recipes = json_decode($_COOKIE['recipes']);
            foreach($recipes as $recipe) {
                $data = array(
                    'recipe_id' => $recipe,
                    'date' => date("Y-m-d")
                );
                $this->db->insert('order_recipe', $data);
            }
        }

        # Suppression du session de l'achat
        setcookie('carts', '[]',  time() + (86400 * 30), "/");
        setcookie('neededProducts', '[]',  time() + (86400 * 30), "/");
        setcookie('recipes', '[]',  time() + (86400 * 30), "/");

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
                    "unitQuantity" => $product->quantity,
                    "unit" => $product->unit,
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
        
        if( !isset($_COOKIE['carts']) || (json_decode($_COOKIE['carts']) == null) ) {
            setcookie('carts', '[]',  time() + (86400 * 30), "/");
        }
        if( !isset($_COOKIE['neededProducts']) || (json_decode($_COOKIE['neededProducts']) == null) ) {
            setcookie('neededProducts', '[]',  time() + (86400 * 30), "/");
        }
        if( !isset($_COOKIE['recipes']) || (json_decode($_COOKIE['recipes']) == null) ) {
            setcookie('recipes', '[]',  time() + (86400 * 30), "/");
        }

        $carts = json_decode($_COOKIE['carts']);
        if($carts == null)
            $carts = array();
        if($productId != null) {
            $newCart = new stdClass;
            $newCart->productId = $productId;
            $newCart->nb = $nb;
            $newCart->isRecipe = false;
            array_push($carts,$newCart);
        } else {
            $recipes = json_decode($_COOKIE['recipes']);
            if($recipes == null)
                $recipes = array();
            array_push($recipes, $this->input->post('recipeId'));
            setcookie('recipes', json_encode($recipes),  time() + (86400 * 30), "/");

            # Récuperation des ingrédient du recette
            $recipeDetails =$this->recipe->findDetails($this->input->post('recipeId'));
            $neededProducts = array();
            foreach($recipeDetails as $r) {
                array_push(
                    $neededProducts,
                    array(
                        "productId" => $r->product_id,
                        "quantity" => $nb * $r->quantity,
                        "unitQuantity" => $r->unitquantity
                    )
                );
            }
            
            # Récuperation des ingrédients des recettes du cookie
            $cookies = json_decode($_COOKIE['neededProducts']);
            if($cookies == null)
                $cookies = array();
            $cookiesSize = count($cookies);
            foreach($neededProducts as $neededProduct) {
                $isCookieContainsProduct = false;
                $cookieTableIndex = 0;

                for($i = 0; $i < $cookiesSize; $i++) {
                    if($cookies[$i]->productId == $neededProduct['productId']) {
                        $isCookieContainsProduct = true;
                        $cookieTableIndex = $i;
                        break;
                    }
                }

                if($isCookieContainsProduct) {
                    $cookies[$cookieTableIndex]->quantity += $neededProduct['quantity'];
                } else {
                    $cookieNewProduct = new stdClass;
                    $cookieNewProduct->productId = $neededProduct['productId'];
                    $cookieNewProduct->quantity = $neededProduct['quantity'];
                    $cookieNewProduct->unitQuantity = $neededProduct['unitQuantity'];
                    array_push($cookies, $cookieNewProduct);
                }
            }
            setcookie('neededProducts', json_encode($cookies),  time() + (86400 * 30), "/");
            
            # Suppression des anciennes données de panier de recette
            $newCartsData = array();
            for($i = 0; $i < count($carts); $i++) {
                if($carts[$i]->isRecipe == false) {
                    array_push($newCartsData, $carts[$i]);
                }
            }
            $carts = $newCartsData;

            # Ajout des nouvelles données dans le panier
            foreach($cookies as $cook) {
                if($cook->quantity < $cook->unitQuantity) {
                    $productNb = 1;
                } elseif($cook->quantity % $cook->unitQuantity == 0) {
                    $productNb = $cook->quantity / $cook->unitQuantity;
                } else {
                    $productNb = ((double)($cook->quantity - ($cook->quantity % $cook->unitQuantity)) / (double)$cook->unitQuantity) + 1;
                }

                $newCart = new stdClass;
                $newCart->productId = $cook->productId;
                $newCart->nb = $productNb;
                $newCart->isRecipe = true;
                array_push($carts,$newCart);
            }
        }       
        setcookie('carts', json_encode($carts),  time() + (86400 * 30), "/");

        redirect('cart/cart');
    }

    public function removeRecipeCart() {
        setcookie('neededProducts', '[]',  time() + (86400 * 30), "/");
        setcookie('recipes', '[]',  time() + (86400 * 30), "/");
        
        $carts = json_decode($_COOKIE['carts']);
        $newCartsData = array();
        for($i = 0; $i < count($carts); $i++) {
            if($carts[$i]->isRecipe == false) {
                array_push($newCartsData, $carts[$i]);
            }
        }
        $carts = $newCartsData;
        setcookie('carts', json_encode($carts),  time() + (86400 * 30), "/");

        redirect('cart/cart');
    }

}
