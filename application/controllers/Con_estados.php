<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_estados extends CI_Controller {

  public function __construct()
  { 
    parent::__construct();
		$this->load->model('mod_estados');
  }	
	public function estados($id)
	{
		$this->load->view('Header/header');

			if($id == 1)
				$this->load->view('Estados/RegistroEstados');
			else
				$this->load->view('Estados/BuscarEstados');

		$this->load->view('Footer/footer');
	}
	
	public function RegistrarEstados()
	{
    $descripcion = $this->input->post('descripcion'); 
    $codigo = $this->input->post('codigo');	

		$session_data = $this->session->userdata('nueva_session');
		$usuario=$session_data['idusuario'];

		$RegCargos = $this->mod_estados->RegistrarEstados($descripcion, $codigo, $usuario);    
		$this->load->view('Estados/RegistroEstados');
	}

	public function BuscarEstados()
	{
    $descripcion = $this->input->post('descripcion'); 
    $codigo = $this->input->post('codigo');	

		$data['ConsulEstados'] = $this->mod_estados->BuscarEstados($descripcion, $codigo);    

		$cargar_vista_crud = $this->load->view('Estados/CrudEstados',$data, true);
		echo $cargar_vista_crud;
	}

	public function ModificarEstados()
	{
    $idestados=$this->input->post('idestados');

    $data['ModifEstado'] = $this->mod_estados->ModificarEstados($idestados);
		
		$cargar_vista_crud = $this->load->view('Estados/BuscarEstados',$data, true);
		echo $cargar_vista_crud;
	}

	public function CrudActualizarEstados()
	{
		$idestados = $this->input->get('idestados');
		$descripcionestado = $this->input->get('descripcionestado');
	 	$codigoestado = $this->input->get('codigoestado');
		
		$session_data = $this->session->userdata('nueva_session');
		$usuario=$session_data['idusuario'];

		$DatosEstados=$this->mod_estados->CrudActualizarEstados($idestados, $descripcionestado, $codigoestado, $usuario);
    print_r(json_encode($DatosEstados));			
	}
}
