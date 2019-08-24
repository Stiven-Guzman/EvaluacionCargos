<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_ciudades extends CI_Controller {

  public function __construct()
  { 
    parent::__construct();
		$this->load->model('mod_select');
		$this->load->model('mod_ciudades');
  }	
	public function ciudades($id)
	{
		$data['IdEstado'] = $this->mod_select->ValidarEstado();

		$this->load->view('Header/header');

			if($id == 1)
				$this->load->view('Ciudades/RegistroCiudades', $data);
			else
				$this->load->view('Ciudades/BuscarCiudades', $data);

		$this->load->view('Footer/footer');
	}
	
	public function RegistrarCiudades()
	{
		$data['IdEstado'] = $this->mod_select->ValidarEstado();

    $descripcion = $this->input->post('descripcion'); 
    $abreviatura = $this->input->post('abreviatura');	
    $idestado	 = $this->input->post('idestado');

		$session_data = $this->session->userdata('nueva_session');
		$usuario=$session_data['idusuario'];

		$RegCargos = $this->mod_ciudades->RegistrarCiudades($descripcion, $abreviatura, $idestado, $usuario);    
		$this->load->view('Ciudades/RegistroCiudades', $data);
	}

	public function BuscarCiudades()
	{
    $descripcion = $this->input->post('descripcion'); 
    $abreviatura = $this->input->post('abreviatura');	
    $idestado	 = $this->input->post('idestado');

		$data['ConsulCiudades'] = $this->mod_ciudades->BuscarCiudades($descripcion, $abreviatura, $idestado);    

		$cargar_vista_crud = $this->load->view('Ciudades/CrudCiudades',$data, true);
		echo $cargar_vista_crud;
	}

	public function ModificarCiudad()
	{
    $idciudad=$this->input->post('idciudad');

    $data['ModifCiudades'] = $this->mod_ciudades->ModificarCiudad($idciudad);		

		$cargar_vista_crud = $this->load->view('Ciudades/BuscarCiudades',$data, true);
		echo $cargar_vista_crud;	
	}

	public function CrudActualizarCiudad()
	{
		$idciudad = $this->input->get('idciudad');
		$idestadociudad = $this->input->get('idestadociudad');

		$session_data = $this->session->userdata('nueva_session');
		$usuario=$session_data['idusuario'];

		$DatosCiudades=$this->mod_ciudades->CrudActualizarCiudad($idciudad, $idestadociudad, $usuario);
    print_r(json_encode($DatosCiudades));			
	}
}
