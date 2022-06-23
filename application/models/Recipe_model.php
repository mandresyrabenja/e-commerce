<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipe_model extends CI_Model
{

    public function findDetails($id) {
        $this->db->where('recipe_id', $id);
        return $this->db->get('recipe_details_details')->result();
    }

    public function findById($id) {
        $this->db->where('id', $id);
        return $this->db->get('recipe')->result()[0];
    }

    public function findAll() {
        return $this->db->get('recipe')->result();
    }

    public function create($name) {
        $data = array('name' => $name);
        $this->db->insert('recipe', $data);
    }

}