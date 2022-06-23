<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipe extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('recipe_model', 'recipe');
    }

    function create() {
        $this->recipe->create($this->input->post('name'));
    }

    function createRecipeForm() {
        $data['page'] = $this->load->view('recipe/create', [], true);
		$this->load->view('backoffice/template', $data);
    }
}
