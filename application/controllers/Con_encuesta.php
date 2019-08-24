<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_encuesta extends CI_Controller {

  public function __construct()
  { 
    parent::__construct();
		$this->load->model('mod_encuesta');
  }	

	public function encuesta()
	{
		$session_data = $this->session->userdata('nueva_session');
		$esjefe=$session_data['esjefe'];
		$usuario = $session_data['idusuario'];
		$califica = $session_data['califica'];			

		$data['UsuEncuesta'] = $this->mod_encuesta->UsuariosEncuesta($usuario, $califica);

		$this->load->view('Header/header');
		$this->load->view('Encuestas/EncuestaGeneral', $data);
		$this->load->view('Footer/footer');
	}

	public function ListarPreguntas()
	{
    $idusuario = $this->input->post('idusuario'); 

		$session_data = $this->session->userdata('nueva_session');
		$usuario = $session_data['idusuario'];
		$esjefe = $session_data['esjefe'];

		$data['DatosUsuPre'] = $this->mod_encuesta->DatosUsuario($idusuario, $usuario);
		$data['ListaPre'] = $this->mod_encuesta->ListarPreguntas($idusuario, $usuario, $esjefe);

		$DatosLista = $this->load->view('Encuestas/FormatoEncuesta',$data, true);
		echo $DatosLista;
	}

	public function GuardarBitacora()
	{
    $idusuarios = $this->input->post('idusuarios'); 
    $sumaporcentaje = $this->input->post('sumaporcentaje'); 
    $fortaleza = $this->input->post('fortaleza'); 
    $mejora = $this->input->post('mejora'); 
    $propuesta = $this->input->post('propuesta'); 
    $observaciones = $this->input->post('observaciones'); 

		$session_data = $this->session->userdata('nueva_session');
		$usuario = $session_data['idusuario'];

		$DatosBitacora = $this->mod_encuesta->GuardarBitacora($idusuarios, $sumaporcentaje, $fortaleza, $mejora,
																															$propuesta, $observaciones, $usuario);
		echo $DatosBitacora;
	}

	public function GuardarDetalleBitacora()
	{
    $idusuarios = $this->input->post('idusuarios'); 
    $idpreguntas = $this->input->post('idpreguntas'); 
    $idvalorporcentaje = $this->input->post('idvalorporcentaje'); 

		$session_data = $this->session->userdata('nueva_session');
		$usuario = $session_data['idusuario'];

		$DatosDetalleBitacora = $this->mod_encuesta->GuardarDetalleBitacora($idusuarios, $idpreguntas, $idvalorporcentaje, $usuario);
	}
}