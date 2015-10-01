<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
		$this->load->model('project_model');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('Projects/project_view');
	}

	public function create_project()
	{
		$this->load->helper('url');
		$this->load->helper('form');
    	$this->load->library('form_validation');
    	
    	//set rules validation
    	

    	if ($this->form_validation->run() == FALSE)
        {
            //obtiene categoria
			$data['categories'] = $this->project_model->get_categories();
            $this->load->view('Projects/project_view', $data);
        }
        else
        {
            $tituloProyecto = $this->input->post('tituloProyecto');    
            $imagenProyecto = $this->input->post('imagenProyecto');
			$descripcionBreveProyecto = $this->input->post('descripcionBreveProyecto');
			$categoriaProyecto = $this->input->post('categoriaProyecto');
			$ubicacionProyecto = $this->input->post('ubicacionProyecto');
			$metaProyecto = $this->input->post('metaProyecto');
			$descripcionProyecto = $this->input->post('descripcionProyecto');
			//$this->load->model('project_model');
			$this->project_model->insert_project($tituloProyecto,$imagenProyecto,$descripcionBreveProyecto,$categoriaProyecto,$ubicacionProyecto,$metaProyecto,$descripcionProyecto);
            echo "Insertado Correctamente";
            //$this->load->view('formsuccess');
        }	
	}

	//
	public function checkIfExist()
  	{
    	// echo json_encode($this->m_usuario->checkIfExist($_POST['tableName'], $_POST['field'], $_POST['value']));
    	echo json_encode($this->project_model->checkIfExist());
  	}
}