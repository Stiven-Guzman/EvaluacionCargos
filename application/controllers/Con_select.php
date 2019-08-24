<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_select extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function ValidarEstado()
	{
		$data['IdEstado'] = $this->mod_select->ValidarEstado();
	}

	public function ValidarCargo()
	{
		$data['idcargo'] = $this->mod_select->ValidarCargo();
	}

	public function ValidarCiudades()
	{
		$data['idciudades'] = $this->mod_select->ValidarCiudades();
	}

	public function ValidarDependencias()
	{
		$data['iddependencias'] = $this->mod_select->ValidarDependencias();
	}
	
	public function ValidarEmpresas()
	{
		$data['idempresas'] = $this->mod_select->ValidarEmpresas();
	}
	
	public function ValidarNiveles()
	{
		$data['idniveles'] = $this->mod_select->ValidarNiveles();
	}
	
	public function ValidarUsuarios()
	{
		$data['idusu'] = $this->mod_select->ValidarUsuarios();
	}
	
	public function PreguntasEncuesta()
	{
		$session_data = $this->session->userdata('nueva_session');
		$usuario = $session_data['idusuario'];
		$idperfil = $session_data['perfil'];	
		$califica = $session_data['califica'];	


		$data['PreEncuesta'] = $this->mod_select->PreguntasEncuesta($usuario, $idperfil, $califica);
	}

	public function UsuariosEncuesta()
	{
		$session_data = $this->session->userdata('nueva_session');
		$usuario = $session_data['idusuario'];
		$califica = $session_data['califica'];	


		$data['UsuEncuesta'] = $this->mod_select->UsuariosEncuesta($usuario, $califica);
	}

}
