<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{

    public function findById($id) {
        $this->db->where('id', $id);
        return $this->db->get('product_details')->result()[0];
    }
    
    public function listWithPage($pageSize, $startWith) {
        $this->db->order_by('id', 'ASC');
        return $this->db->get('product_details', $pageSize, $startWith)->result();
    }

    public function count() {
        return $this->db->count_all('product');
    }

    public function list() {
        return $this->db->get('product_details')->result();
    }

    public function insert($name, $description, $price, $nb, $brand, $unit, $quantity) {
        $data = array(
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'nb' => $nb,
            'brand' => $brand,
            'unit' => $unit,
            'quantity' => $quantity
        );

        $this->db->insert('product', $data);
    }

    public function findAllProductBrands() {
        return $this->db->get('brand')->result();
    }

}