<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_encuesta extends CI_Model
{
  public function __construct()
  {
      parent::__construct();
      //Do your magic here
  }

  public function UsuariosEncuesta($usuario, $califica)
  {
    $query = $this->db->query("
      SELECT EUSU.IDUSUARIOS, EUSU.NOMBREUSUARIO, EUSU.APELLIDOUSUARIO, EBIT.ANOBITACORA,
        ECAR.DESCRIPCIONCARGO, EUSU.CALIFICAUSUARIO
      FROM EVA_USUARIOS EUSU 
          INNER JOIN EVA_CARGOS ECAR ON EUSU.IDCARGO = ECAR.IDCARGO 
          LEFT JOIN EVA_BITACORAS EBIT ON EUSU.IDUSUARIOS = EBIT.IDUSUARIOS AND EBIT.USUARIOCREACION = $usuario
      WHERE EUSU.CALIFICAUSUARIO = $usuario
          OR EUSU.IDUSUARIOS = (SELECT IDUSUARIOS FROM EVA_USUARIOS WHERE IDUSUARIOS = $califica)");

    if ($query->num_rows() > 0)
    {
      return $query->result();      
    }
    else        
    {
      $query = $this->db->query("SELECT EUSU.IDUSUARIOS, EUSU.NOMBREUSUARIO, EUSU.APELLIDOUSUARIO, EBIT.ANOBITACORA,
                                  ECAR.DESCRIPCIONCARGO, EUSU.CALIFICAUSUARIO
                                  FROM EVA_USUARIOS EUSU 
                                  INNER JOIN EVA_CARGOS ECAR ON EUSU.IDCARGO = ECAR.IDCARGO 
                                  LEFT JOIN EVA_BITACORAS EBIT ON EUSU.IDUSUARIOS = EBIT.IDUSUARIOS AND EBIT.USUARIOCREACION = $usuario
                                  WHERE EUSU.IDUSUARIOS = $califica");   
      if ($query->num_rows() > 0)
      {
        return $query->result();      
      }
      else        
      {
        return false;
      }   
    }    
  }  

  public function DatosUsuario($idusuario, $usuario)
  {
    $query = $this->db->query("      
      SELECT EUSU.APELLIDOUSUARIO||' '||EUSU.NOMBREUSUARIO NOMBREUSUARIO, 
        CASE WHEN EUSU.PERFILUSUARIO = '1' THEN 'ADMINISTRADOR'
              WHEN  EUSU.PERFILUSUARIO = '2' THEN 'USUARIO' END PERFILUSUARIO,
        EUSU.IDUSUARIOS, ECAR.DESCRIPCIONCARGO, ECAT.DESCRIPCIONCATEGORIZACION,
        EDEP.DESCRIPCIONDEPENDENCIA,    ECIU.DESCRIPCIONCIUDAD, EEMP.NOMBREEMPRESA,
        EEST.DESCRIPCIONESTADO, EJEF.APELLIDOUSUARIO ||' '|| EJEF.NOMBREUSUARIO JEFE, 
        EJEF.CALIFICAUSUARIO, ECAR.OBJETIVOCARGO
      FROM EVA_USUARIOS EUSU
        INNER JOIN EVA_CARGOS ECAR ON EUSU.IDCARGO = ECAR.IDCARGO
        INNER JOIN EVA_CATEGORIZACIONES ECAT ON EUSU.IDCATEGORIZACION = ECAT.IDCATEGORIZACION
        INNER JOIN EVA_DEPENDENCIAS EDEP ON EUSU.IDDEPENDENCIA = EDEP.IDDEPENDENCIA
        INNER JOIN EVA_CIUDADES ECIU ON EUSU.IDCIUDAD = ECIU.IDCIUDAD
        INNER JOIN EVA_EMPRESA EEMP ON EUSU.IDEMPRESA = EEMP.IDEMPRESA
        INNER JOIN EVA_ESTADOS EEST ON EUSU.IDESTADO = EEST.IDESTADO
        INNER JOIN EVA_USUARIOS EJEF ON EUSU.CALIFICAUSUARIO = EJEF.IDUSUARIOS
      WHERE EUSU.IDUSUARIOS = $idusuario");

    if ($query->num_rows() > 0)
      return $query->result();      
    else        
      return false;   
  }

  public function ListarPreguntas($idusuario, $usuario, $esjefe)
  {
    $query = $this->db->query("
    	SELECT EUSU.ESJEFE, EPRE.DESCRIPCIONPREGUNTA, EPRE.PORCENTAJEPREGUNTA, 
        EPRE.IDPREGUNTA, ECAT.NUMPREGUNTASCATEGORIZA, EUSU.IDUSUARIOS
			FROM EVA_USUARIOS EUSU
				INNER JOIN EVA_PREGUNTAS EPRE ON EUSU.ESJEFE = EPRE.LIDERPREGUNTA
        INNER JOIN EVA_CATEGORIZACIONES ECAT ON EUSU.IDCATEGORIZACION = ECAT.IDCATEGORIZACION
			WHERE EUSU.IDUSUARIOS = $idusuario
				AND EPRE.IDESTADO = 1");

    if ($query->num_rows() > 0)
      return $query->result();      
    else        
      return false;   
  }

  public function GuardarBitacora($idusuarios, $sumaporcentaje, $fortaleza, $mejora, $propuesta, $observaciones, $usuario)
  {
    $query = $this->db->query("
      SELECT EBIT.ANOBITACORA
      FROM EVA_BITACORAS EBIT
      WHERE EBIT.IDUSUARIOS = $idusuarios
        AND EBIT.USUARIOCREACION = $usuario
        AND EBIT.ANOBITACORA = EXTRACT(YEAR FROM SYSDATE)");
 
    if ($query->num_rows() > 0)
    {
      return false;   
    }
    else
    {
      $sql_crear_bitacora = "INSERT INTO EVA_BITACORAS (IDUSUARIOS, PORCENTAJEBITACORA, FORTALEZASBITACORA, AMEJORARBITACORA, ACCIONESBITACORA, OBSERVACIONESBITACORA, ANOBITACORA, USUARIOCREACION, FECHACREACION) 
                  VALUES ($idusuarios, $sumaporcentaje,
                          ".$this->db->escape($fortaleza).",".$this->db->escape($mejora).",
                          ".$this->db->escape($propuesta).",".$this->db->escape($observaciones).",
                          EXTRACT(YEAR FROM SYSDATE),".$this->db->escape($usuario).", SYSDATE)";
      
      $this->db->query($sql_crear_bitacora);
      
      if($this->db->affected_rows() > 0){
        return true;
       } 
      else {        
        return false;
      }
    }
  }

  public function GuardarDetalleBitacora($idusuarios, $idpreguntas, $idvalorporcentaje, $usuario)
  {
    $query = $this->db->query("
      SELECT EBIT.IDBITACORA
      FROM EVA_BITACORAS EBIT
      WHERE EBIT.IDUSUARIOS = $idusuarios
        AND EBIT.USUARIOCREACION = $usuario
        AND EBIT.ANOBITACORA = EXTRACT(YEAR FROM SYSDATE)");

    if ($query->num_rows() > 0)
    {
      foreach ($query->result() as $row)
      {
         $idbitacora = $row->IDBITACORA;
      } 

      $query = $this->db->query("
        SELECT EDBI.IDBITACORA
        FROM EVA_BITACORAS EBIT
          INNER JOIN EVA_DETALLE_BITACORAS EDBI ON EBIT.IDBITACORA = EDBI.IDBITACORA
        WHERE EBIT.IDUSUARIOS = $idusuarios
          AND EBIT.USUARIOCREACION = $usuario
          AND EBIT.ANOBITACORA = EXTRACT(YEAR FROM SYSDATE)
          AND EDBI.IDPREGUNTA = $idpreguntas");

        if ($query->num_rows() == 0)
        {
          $sql_crear_detallebitacora = "
            INSERT INTO EVA_DETALLE_BITACORAS (IDBITACORA, IDPREGUNTA, VALORPORCENTAJEBITACORA, USUARIOCREACION, FECHACREACION) 
            VALUES ($idbitacora, $idpreguntas, $idvalorporcentaje,".$this->db->escape($usuario).", SYSDATE)";      
          $this->db->query($sql_crear_detallebitacora);

          if($this->db->affected_rows() > 0)
            return true;
          else        
            return false;
        }
        else
        {
          return false;
        }   
    }      
  }
}
