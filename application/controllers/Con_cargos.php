<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_cargos extends CI_Controller {

  public function __construct()
  { 
    parent::__construct();
		$this->load->model('mod_select');
		$this->load->model('mod_cargos');
  }	
	public function cargos($id)
	{
		$data['IdEstado'] = $this->mod_select->ValidarEstado();

		$this->load->view('Header/header');

			if($id == 1)
				$this->load->view('Cargos/RegistroCargos', $data);
			else
				$this->load->view('Cargos/BuscarCargos', $data);

		$this->load->view('Footer/footer');
	}
	
	public function RegistrarCargo()
	{
		$data['IdEstado'] = $this->mod_select->ValidarEstado();

    $descripcion = $this->input->post('descripcion'); 
    $objetivo	 = $this->input->post('objetivo');
    $idestado	 = $this->input->post('idestado');

		$session_data = $this->session->userdata('nueva_session');
		$usuario=$session_data['idusuario'];

		$RegCargos = $this->mod_cargos->RegistrarCargo($descripcion, $idestado, $objetivo, $usuario );    
		$this->load->view('Cargos/RegistroCargos', $data);		
	}

	public function BuscarCargo()
	{
    $descripcion = $this->input->post('descripcion'); 
    $objetivo	 = $this->input->post('objetivo');
    $idestado	 = $this->input->post('idestado');

		$data['ConsulCargo'] = $this->mod_cargos->BuscarCargo($descripcion, $objetivo, $idestado);    

		$cargar_vista_crud = $this->load->view('Cargos/CrudCargos',$data, true);
		echo $cargar_vista_crud;
	}

	public function ModificarCargo()
	{
    $idcargos=$this->input->post('idcargos');
    $data['ModifCargo'] = $this->mod_cargos->ModificarCargo($idcargos);	

		$cargar_vista_modal = $this->load->view('Cargos/BuscarCargos',$data, true);
		echo $cargar_vista_modal;
	}

	public function CrudActualizarCargo()
	{
		$idcargo = $this->input->get('idcargos');
		$idestado = $this->input->get('idestado');

		$session_data = $this->session->userdata('nueva_session');
		$usuario=$session_data['idusuario'];

		$DatosCargo=$this->mod_cargos->CrudActualizarCargo($idcargo, $idestado, $usuario);
    print_r(json_encode($DatosCargo));			
	}
}
