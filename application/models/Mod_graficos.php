<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_graficos extends CI_Model
{
  public function __construct()
  {
      parent::__construct();
      //Do your magic here
  }

  public function GraficoDatosPersona($ididentificacion, $usuario)
  {
    $datosUsuario = $this->db->query("
      SELECT EUSU.NOMBREUSUARIO, EUSU.APELLIDOUSUARIO, ECAT.NUMPREGUNTASCATEGORIZA, EBIT.PORCENTAJEBITACORA,
        EBIT.FORTALEZASBITACORA, EBIT.AMEJORARBITACORA, EBIT.ACCIONESBITACORA, EBIT.OBSERVACIONESBITACORA, 
        ROUND(EBIT.PORCENTAJEBITACORA) PORCENTAJE, ROUND((100/ECAT.NUMPREGUNTASCATEGORIZA), 2) PORCENTAJEXPREGUNTA, 
        CASE 
          WHEN EBIT.PORCENTAJEBITACORA < 60 THEN 'Por-Mejorar' 
          WHEN EBIT.PORCENTAJEBITACORA > 59 AND EBIT.PORCENTAJEBITACORA < 81 THEN 'Satisfactorio' 
          WHEN EBIT.PORCENTAJEBITACORA > 80 THEN 'Sobresaliente'
        END CALIFICACION, EUSu.IDUSUARIOS
      FROM EVA_USUARIOS EUSU
        INNER JOIN EVA_CATEGORIZACIONES ECAT ON EUSU.IDCATEGORIZACION = ECAT.IDCATEGORIZACION
        INNER JOIN EVA_BITACORAS EBIT ON EUSU.IDUSUARIOS = EBIT.IDUSUARIOS
      WHERE EUSU.IDUSUARIOS = $ididentificacion AND EBIT.USUARIOCREACION = $usuario");
    
    if ($datosUsuario->num_rows() > 0)
    {
      return $datosUsuario->result(); 
    }     
  }  

  public function GraficoBarrasPorcentaje($ididentificacion, $usuario)
  {
  	$datosgrafica = $this->db->query("
      SELECT EDBI.VALORPORCENTAJEBITACORA
      FROM EVA_BITACORAS EBIT
        INNER JOIN EVA_DETALLE_BITACORAS EDBI ON EBIT.IDBITACORA = EDBI.IDBITACORA
        INNER JOIN EVA_PREGUNTAS EPRE ON EDBI.IDPREGUNTA = EPRE.IDPREGUNTA AND EPRE.IDESTADO = 1
      WHERE EBIT.IDUSUARIOS = $ididentificacion AND EBIT.USUARIOCREACION = $usuario ORDER BY EDBI.IDPREGUNTA ASC ");
    
    if ($datosgrafica->num_rows() > 0)
    {
      return $datosgrafica->result(); 
    }     
  }

  public function GraficoBarrasCompetencia($ididentificacion, $usuario)
  {
    $datosgrafica = $this->db->query("
      SELECT EPRE.COMPETENCIA
      FROM EVA_BITACORAS EBIT
        INNER JOIN EVA_DETALLE_BITACORAS EDBI ON EBIT.IDBITACORA = EDBI.IDBITACORA
        INNER JOIN EVA_PREGUNTAS EPRE ON EDBI.IDPREGUNTA = EPRE.IDPREGUNTA AND EPRE.IDESTADO = 1
      WHERE EBIT.IDUSUARIOS = $ididentificacion AND EBIT.USUARIOCREACION = $usuario ORDER BY EDBI.IDPREGUNTA ASC");
    
    if ($datosgrafica->num_rows() > 0)
    {
      return $datosgrafica->result(); 
    }     
  }

}