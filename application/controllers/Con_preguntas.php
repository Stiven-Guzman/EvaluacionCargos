<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_preguntas extends CI_Controller {

  public function __construct()
  { 
    parent::__construct();
		$this->load->model('mod_select');
		$this->load->model('mod_preguntas');
  }	
	public function preguntas($id)
	{
		$data['IdEstado'] = $this->mod_select->ValidarEstado();

		$this->load->view('Header/header');

			if($id == 1)
				$this->load->view('Preguntas/RegistroPreguntas', $data);
			else
				$this->load->view('Preguntas/BuscarPreguntas', $data);

		$this->load->view('Footer/footer');
	}
	
	public function RegistrarPreguntas()
	{
		$data['IdEstado'] = $this->mod_select->ValidarEstado();

    $descripcionpreg = $this->input->post('descripcionpreg'); 
    $competencia = $this->input->post('competencia');	
    $lidpregunta	 = $this->input->post('lidpregunta');
    $idestado	 = $this->input->post('idestado');

		$session_data = $this->session->userdata('nueva_session');
		$usuario=$session_data['idusuario'];

		$RegCargos = $this->mod_preguntas->RegistrarPreguntas($descripcionpreg, $competencia, $lidpregunta, $idestado, $usuario);
		$this->load->view('Preguntas/RegistroPreguntas', $data);		    
	}

	public function BuscarPreguntas()
	{
    $descripcionpreg = $this->input->post('descripcionpreg'); 
    $competencia = $this->input->post('competencia');	
    $lidpregunta	 = $this->input->post('lidpregunta');
    $idestado	 = $this->input->post('idestado');

		$data['ConsulPreguntas'] = $this->mod_preguntas->BuscarPreguntas($descripcionpreg, $competencia, $lidpregunta, $idestado);    

		$cargar_vista_crud = $this->load->view('Preguntas/CrudPreguntas',$data, true);
		echo $cargar_vista_crud;
	}

	public function ModificarPreguntas()
	{
    $idpreguntas=$this->input->post('idpreguntas');
    $data['ModifPregunta'] = $this->mod_preguntas->ModificarPreguntas($idpreguntas);		

		$cargar_vista_crud = $this->load->view('Preguntas/BuscarPreguntas',$data, true);
		echo $cargar_vista_crud;		
	}

	public function CrudActualizarPreguntas()
	{
		$idpreguntas = $this->input->get('idpreguntas');
		$idestadopregunta = $this->input->get('idestadopregunta');

		$session_data = $this->session->userdata('nueva_session');
		$usuario=$session_data['idusuario'];

		$DatosPreguntas=$this->mod_preguntas->CrudActualizarPreguntas($idpreguntas, $idestadopregunta, $usuario);
    print_r(json_encode($DatosPreguntas));			
	}
}
