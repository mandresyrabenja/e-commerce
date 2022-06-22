<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model
{

    public function findById($id) {
        $this->db->where('id', $id);
        return $this->db->get('customer')->result();
    }

    public function findCustomer($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);

        return $this->db->get('customer')->result();
    }

    public function register($name, $email, $password) {
        $data = array(
            "name" => $name,
            "email" => $email,
            "password" => $password,
            "money" => 0
        );

        $this->db->insert('customer', $data);
    }

    public function isValidLogin($email, $password) : bool
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('customer');
        if($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

}