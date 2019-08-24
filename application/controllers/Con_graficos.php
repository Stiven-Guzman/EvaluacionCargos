<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_graficos extends CI_Controller {
  
  public function __construct()
  { 
    parent::__construct();
		$this->load->model('mod_graficos');
  }	

	public function index()
	{
		$this->load->view('Header/header');
		$this->load->view('Graficos/GraficoBarras');
		$this->load->view('Footer/footer');
	}

	public function GraficoEncuesta()
	{
    $ididentificacion = $this->input->get('idusuario'); 	

		$session_data = $this->session->userdata('nueva_session');
		$usuario = $session_data['idusuario'];

		$DatosGrafica = $this->mod_graficos->GraficoDatosPersona($ididentificacion, $usuario); 
		$DatosPorcentajeGrafica = $this->mod_graficos->GraficoBarrasPorcentaje($ididentificacion, $usuario); 
		$DatosCompetenciasGrafica = $this->mod_graficos->GraficoBarrasCompetencia($ididentificacion, $usuario); 

		$cargo_array = array(
			"NOMBREUSUARIO"=>$DatosGrafica[0]->NOMBREUSUARIO,
			"APELLIDOUSUARIO"=>$DatosGrafica[0]->APELLIDOUSUARIO,
			"NUMPREGUNTASCATEGORIZA"=>$DatosGrafica[0]->NUMPREGUNTASCATEGORIZA,
			"PORCENTAJEBITACORA"=>$DatosGrafica[0]->PORCENTAJEBITACORA,
			"FORTALEZASBITACORA"=>$DatosGrafica[0]->FORTALEZASBITACORA,
			"AMEJORARBITACORA"=>$DatosGrafica[0]->AMEJORARBITACORA,
			"ACCIONESBITACORA"=>$DatosGrafica[0]->ACCIONESBITACORA,
			"OBSERVACIONESBITACORA"=>$DatosGrafica[0]->OBSERVACIONESBITACORA,			
			"PORCENTAJE"=>$DatosGrafica[0]->PORCENTAJE,			
			"PORCENTAJEXPREGUNTA"=>$DatosGrafica[0]->PORCENTAJEXPREGUNTA,			
			"CALIFICACION"=>$DatosGrafica[0]->CALIFICACION,			
			"IDUSUARIOS"=>$DatosGrafica[0]->IDUSUARIOS			
		);
  	print_r(json_encode(array($cargo_array, $DatosPorcentajeGrafica, $DatosCompetenciasGrafica)));	
	}
}