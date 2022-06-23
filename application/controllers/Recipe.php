<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipe extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('recipe_model', 'recipe');
    }

    public function recipeDetails() {
        $data['recipe'] =$this->recipe->findById($this->input->get('id'));
        $data['recipeDetails'] =$this->recipe->findDetails($this->input->get('id'));
        
        $data['page'] = $this->load->view('recipe/details', $data, true);
		$this->load->view('backoffice/template', $data);
    }

    public function list() {
        $data['recipes'] = $this->recipe->findAll();
        
        $data['page'] = $this->load->view('recipe/list', $data, true);
		$this->load->view('backoffice/template', $data);
    }

    public function create() {
        $this->recipe->create($this->input->post('name'));

        redirect('recipe/list');
    }

    public function createRecipeForm() {
        $data['page'] = $this->load->view('recipe/create', [], true);
		$this->load->view('backoffice/template', $data);
    }
}
