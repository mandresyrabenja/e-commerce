<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipe_model extends CI_Model
{

    public function findAll() {
        return $this->db->get('recipe')->result();
    }

    public function create($name) {
        $data = array('name' => $name);
        $this->db->insert('recipe', $data);
    }

}