<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{

    public function list() {
        return $this->db->get('product_details')->result();
    }

    public function insert($name, $description, $price, $nb, $brand) {
        $data = array(
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'nb' => $nb,
            'brand' => $brand
        );

        $this->db->insert('product', $data);
    }

    public function findAllProductBrands() {
        return $this->db->get('brand')->result();
    }

}