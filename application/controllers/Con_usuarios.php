<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_usuarios extends CI_Controller {

  public function __construct()
  { 
    parent::__construct();
		$this->load->model('mod_select');
		$this->load->model('mod_usuarios');
  }	

	public function usuarios($id)
	{
		$data['IdEstado'] = $this->mod_select->ValidarEstado();
		$data['idcargo'] = $this->mod_select->ValidarCargo();
		$data['idciudades'] = $this->mod_select->ValidarCiudades();
		$data['iddependencias'] = $this->mod_select->ValidarDependencias();
		$data['idempresas'] = $this->mod_select->ValidarEmpresas();
		$data['idniveles'] = $this->mod_select->ValidarNiveles();
		$data['idusu'] = $this->mod_select->ValidarUsuarios();

		$this->load->view('Header/header');

			if($id == 1)
				$this->load->view('Usuarios/RegistroUsuarios', $data);
			else
				$this->load->view('Usuarios/BuscarUsuarios', $data);

		$this->load->view('Footer/footer');
	}
	
	public function RegistrarUsuarios()
	{
		$data['IdEstado'] = $this->mod_select->ValidarEstado();
		$data['idcargo'] = $this->mod_select->ValidarCargo();
		$data['idciudades'] = $this->mod_select->ValidarCiudades();
		$data['iddependencias'] = $this->mod_select->ValidarDependencias();
		$data['idempresas'] = $this->mod_select->ValidarEmpresas();
		$data['idniveles'] = $this->mod_select->ValidarNiveles();
		$data['idusu'] = $this->mod_select->ValidarUsuarios();

    $idusuario = $this->input->post('idusuario'); 
    $nombreusuario = $this->input->post('nombreusuario');	
    $apellidosusuario	 = $this->input->post('apellidosusuario');
    $idjefe = $this->input->post('idjefe'); 
    $idniveles = $this->input->post('idniveles');	
    $idcargo	 = $this->input->post('idcargo');
    $iddependencia = $this->input->post('iddependencia'); 
    $idciudad = $this->input->post('idciudad');	
    $idempresa	 = $this->input->post('idempresa');
    $idestado = $this->input->post('idestado'); 
    $idperfil = $this->input->post('idperfil');	
    $idcontrasena	 = $this->input->post('idcontrasena');

		$session_data = $this->session->userdata('nueva_session');
		$usuario=$session_data['idusuario'];

		$RegCargos = $this->mod_usuarios->RegistrarUsuarios($idusuario, $nombreusuario, $apellidosusuario, $idjefe, $idniveles,
																									 $idcargo, $iddependencia, $idciudad, $idempresa, $idestado, 
																									 $idperfil, $idcontrasena, $usuario);    
		$this->load->view('Usuarios/RegistroUsuarios', $data);
	}

	public function BuscarUsuarios()
	{
		$data['IdEstado'] = $this->mod_select->ValidarEstado();
		$data['idcargo'] = $this->mod_select->ValidarCargo();
		$data['idciudades'] = $this->mod_select->ValidarCiudades();
		$data['iddependencias'] = $this->mod_select->ValidarDependencias();
		$data['idempresas'] = $this->mod_select->ValidarEmpresas();
		$data['idniveles'] = $this->mod_select->ValidarNiveles();
		$data['idusu'] = $this->mod_select->ValidarUsuarios();
		
    $idusuario = $this->input->post('idusuario'); 
    $nombreusuario = $this->input->post('nombreusuario');	
    $apellidosusuario	 = $this->input->post('apellidosusuario');
    $idjefe = $this->input->post('idjefe'); 
    $idniveles = $this->input->post('idniveles');	
    $idcargo	 = $this->input->post('idcargo');
    $iddependencia = $this->input->post('iddependencia'); 
    $idciudad = $this->input->post('idciudad');	
    $idempresa	 = $this->input->post('idempresa');
    $idestado = $this->input->post('idestado'); 
    $idperfil = $this->input->post('idperfil');	

		$session_data = $this->session->userdata('nueva_session');
		$usuario=$session_data['idusuario'];

		$data['ConsulUsuario'] = $this->mod_usuarios->BuscarUsuarios($idusuario, $nombreusuario, $apellidosusuario, 
																																	$idjefe, $idniveles, $idcargo, $iddependencia, 
																																	$idciudad, $idempresa, $idestado, $idperfil, 
																																	$usuario);    

		$cargar_vista_crud = $this->load->view('Usuarios/CrudUsuarios',$data, true);
		echo $cargar_vista_crud;
	}

	public function ModificarUsuarios()
	{
		$data['IdEstado'] = $this->mod_select->ValidarEstado();
		$data['idcargo'] = $this->mod_select->ValidarCargo();
		$data['idciudades'] = $this->mod_select->ValidarCiudades();
		$data['iddependencias'] = $this->mod_select->ValidarDependencias();
		$data['idempresas'] = $this->mod_select->ValidarEmpresas();
		$data['idniveles'] = $this->mod_select->ValidarNiveles();
		$data['idusu'] = $this->mod_select->ValidarUsuarios();
			
    $idusuarios=$this->input->post('idusuarios');

    $data['DatosUsuarios'] = $this->mod_usuarios->ModificarUsuarios($idusuarios);		

		$html = $this->load->view('Usuarios/BuscarUsuarios',$data, true);
		echo $html;
	}

	public function CrudActualizarUsuarios()
	{
		$nombreusuario = $this->input->get('nombreusuario');
		$apellidosusuario = $this->input->get('apellidosusuario');
	 	$idjefe = $this->input->get('idjefe');
		$idniveles = $this->input->get('idniveles');
		$idcargo = $this->input->get('idcargo');
		$iddependencia = $this->input->get('iddependencia');
	 	$idciudad = $this->input->get('idciudad');
		$idempresa = $this->input->get('idempresa');
		$idestado = $this->input->get('idestado');
		$idperfil = $this->input->get('idperfil');
	 	$idusuarios = $this->input->get('idusuarios');
	 	$idcontrasena = $this->input->get('idcontrasena');

		$session_data = $this->session->userdata('nueva_session');
		$usuario=$session_data['idusuario'];

		$DatosUsuarios=$this->mod_usuarios->CrudActualizarUsuarios($nombreusuario, $apellidosusuario, $idjefe, $idniveles, $idcargo, $iddependencia, $idciudad, $idempresa, $idestado, $idperfil, $idusuarios, $idcontrasena, $usuario);
    print_r(json_encode($DatosUsuarios));			
	}
}
