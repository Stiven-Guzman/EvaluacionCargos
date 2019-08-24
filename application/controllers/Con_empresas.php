<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_empresas extends CI_Controller {

  public function __construct()
  { 
    parent::__construct();
		$this->load->model('mod_select');
		$this->load->model('mod_empresas');
  }	
	public function empresa($id)
	{
		$data['IdEstado'] = $this->mod_select->ValidarEstado();

		$this->load->view('Header/header');

			if($id == 1)
				$this->load->view('Empresas/RegistroEmpresa', $data);
			else
				$this->load->view('Empresas/BuscarEmpresa', $data);

		$this->load->view('Footer/footer');
	}
	
	public function RegistrarEmpresas()
	{
		$data['IdEstado'] = $this->mod_select->ValidarEstado();

    $nitempresa = $this->input->post('nitempresa'); 
    $descripcionempresa = $this->input->post('descripcionempresa');	
    $idestado	 = $this->input->post('idestado');

		$session_data = $this->session->userdata('nueva_session');
		$usuario=$session_data['idusuario'];

		$RegCargos = $this->mod_empresas->RegistrarEmpresas($nitempresa, $descripcionempresa, $idestado, $usuario);    
		$this->load->view('Empresas/RegistroEmpresa', $data);
	}

	public function BuscarEmpresas()
	{
    $nitempresa = $this->input->post('nitempresa'); 
    $descripcionempresa = $this->input->post('descripcionempresa');	
    $idestado	 = $this->input->post('idestado');

		$data['ConsulEmpresas'] = $this->mod_empresas->BuscarEmpresas($nitempresa, $descripcionempresa, $idestado);    

		$cargar_vista_crud = $this->load->view('Empresas/CrudEmpresa',$data, true);
		echo $cargar_vista_crud;
	}

	public function ModificarEmpresas()
	{
    $idempresa=$this->input->post('idempresa');

    $data['ModifEmpresa'] = $this->mod_empresas->ModificarEmpresas($idempresa);		
        
		$cargar_vista_crud = $this->load->view('Empresas/BuscarEmpresa',$data, true);
		echo $cargar_vista_crud;			
	}

	public function CrudActualizarEmpresa()
	{
		$idempresa = $this->input->get('idempresa');
		$idestadoempresa = $this->input->get('idestadoempresa');

		$session_data = $this->session->userdata('nueva_session');
		$usuario=$session_data['idusuario'];

		$DatosEmpresa=$this->mod_empresas->CrudActualizarEmpresa($idempresa, $idestadoempresa, $usuario);
        print_r(json_encode($DatosEmpresa));			
	}
}
