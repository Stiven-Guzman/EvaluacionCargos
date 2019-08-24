<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_niveles extends CI_Controller {

  public function __construct()
  { 
    parent::__construct();
		$this->load->model('mod_select');
		$this->load->model('mod_niveles');
  }	

	public function niveles($id)
	{
		$data['IdEstado'] = $this->mod_select->ValidarEstado();

		$this->load->view('Header/header');

		if($id == 1)
			$this->load->view('Niveles/RegistroNiveles', $data);
		else
			$this->load->view('Niveles/BuscarNiveles', $data);

		$this->load->view('Footer/footer');
	}
	
	public function RegistrarNiveles()
	{
		$data['IdEstado'] = $this->mod_select->ValidarEstado();
		
    $descripcion = $this->input->post('descripcion'); 
    $npreguntas = $this->input->post('npreguntas');	
    $idestado	 = $this->input->post('idestado');

		$session_data = $this->session->userdata('nueva_session');
		$usuario=$session_data['idusuario'];

		$RegCargos = $this->mod_niveles->RegistrarNiveles($descripcion, $npreguntas, $idestado, $usuario);    
		$this->load->view('Niveles/RegistroNiveles', $data);
	}

	public function BuscarNiveles()
	{
    $descripcion = $this->input->post('descripcion'); 
    $npreguntas = $this->input->post('npreguntas');	
    $idestado	 = $this->input->post('idestado');

		$data['ConsulNiveles'] = $this->mod_niveles->BuscarNiveles($descripcion, $npreguntas, $idestado);    

		$cargar_vista_crud = $this->load->view('Niveles/CrudNiveles',$data, true);
		echo $cargar_vista_crud;
	}

	public function ModificarNiveles()
	{
    $idniveles=$this->input->post('idniveles');

    $data['ModifNiveles']=$this->mod_niveles->ModificarNiveles($idniveles);	
		$cargar_vista = $this->load->view('Niveles/BuscarNiveles',$data, true);
		echo $cargar_vista;    	
        
  	//print_r(json_encode($DatosNiveles));			
	}

	public function CrudActualizarNivel()
	{
		$idniveles = $this->input->get('idniveles');
		$descripniveles = $this->input->get('descripcion');
	 	$npreguntas = $this->input->get('npreguntas');
		$idestado = $this->input->get('idestado');

		$session_data = $this->session->userdata('nueva_session');
		$usuario=$session_data['idusuario'];

		$datos=$this->mod_niveles->CrudActualizarNivel($idniveles, $descripniveles, $npreguntas, $idestado, $usuario);
    print_r(json_encode($datos));			
	}
}
