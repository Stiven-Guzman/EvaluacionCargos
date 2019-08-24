<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_dependencias extends CI_Controller {

  public function __construct()
  { 
    parent::__construct();
		$this->load->model('mod_select');
		$this->load->model('mod_dependencias');
  }	
	public function dependencias($id)
	{
		$data['IdEstado'] = $this->mod_select->ValidarEstado();

		$this->load->view('Header/header');

			if($id == 1)
				$this->load->view('Dependencias/RegistroDependencias', $data);
			else
				$this->load->view('Dependencias/BuscarDependencias', $data);

		$this->load->view('Footer/footer');
	}
	
	public function RegistrarDependencias()
	{
		$data['IdEstado'] = $this->mod_select->ValidarEstado();

    $descripcion = $this->input->post('descripcion'); 
    $idestado	 = $this->input->post('idestado');

		$session_data = $this->session->userdata('nueva_session');
		$usuario=$session_data['idusuario'];

		$RegCargos = $this->mod_dependencias->RegistrarDependencias($descripcion, $idestado, $usuario);    
		$this->load->view('Dependencias/RegistroDependencias', $data);
	}

	public function BuscarDependencias()
	{
    $descripcion = $this->input->post('descripcion'); 
    $idestado	 = $this->input->post('idestado');

		$data['ConsulDependencias'] = $this->mod_dependencias->BuscarDependencias($descripcion, $idestado);    

		$cargar_vista_crud = $this->load->view('Dependencias/CrudDependencias',$data, true);
		echo $cargar_vista_crud;
	}

	public function ModificarDependencias()
	{
    $iddepen=$this->input->post('iddepen');
    $data['ModifDependencias'] = $this->mod_dependencias->ModificarDependencias($iddepen);		
        
		$cargar_vista = $this->load->view('Dependencias/BuscarDependencias',$data, true);
		echo $cargar_vista;
	}

	public function CrudActualizarDependencias()
	{
		$iddepen = $this->input->get('iddepen');
		$idestadodepen = $this->input->get('idestadodepen');

		$session_data = $this->session->userdata('nueva_session');
		$usuario = $session_data['idusuario'];

		$DatosDependencia=$this->mod_dependencias->CrudActualizarDependencias($iddepen, $idestadodepen, $usuario);
    print_r(json_encode($DatosDependencia));			
	}
}
