<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{

    public function findAllProductBrands() {
        return $this->db->get('brand')->result();
    }

}