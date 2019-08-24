<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_preguntas extends CI_Model
{
  public function __construct()
  {
      parent::__construct();
      //Do your magic here
  }

  public function RegistrarPreguntas($descripcionpreg, $competencia, $lidpregunta, $idestado, $usuario)
  {
    $query = $this->db->query("
      SELECT * 
      FROM EVA_PREGUNTAS 
      WHERE DESCRIPCIONPREGUNTA = TRIM('$descripcionpreg') 
      AND IDESTADO = $idestado");

    if ($query->num_rows() > 0)
    {
      return $query->result();      
    }
    else        
    {
      $sql_crear_cargo = "
        INSERT INTO EVA_PREGUNTAS 
          (IDESTADO, DESCRIPCIONPREGUNTA, COMPETENCIA, LIDERPREGUNTA, USUARIOCREACION, FECHACREACION) 
                  VALUES ($idestado,".$this->db->escape($descripcionpreg).", ".$this->db->escape($competencia).",".$this->db->escape($lidpregunta).",
                          ".$this->db->escape($usuario).", SYSDATE)";
      $this->db->query($sql_crear_cargo);
      if($this->db->affected_rows() > 0){
        return true;
      }
      else{
        return false;
      }
    }
  } 

  public function BuscarPreguntas($descripcionpreg, $competencia, $lidpregunta, $idestado)
  {
    $QueryBuscar = $this->db->query("
      SELECT EPRE.IDESTADO, EPRE.DESCRIPCIONPREGUNTA, EPRE.PORCENTAJEPREGUNTA, 
        CASE WHEN EPRE.LIDERPREGUNTA = 'S' THEN 'SI'
             WHEN EPRE.LIDERPREGUNTA = 'N' THEN 'NO' END LIDERPREGUNTA, 
        EEST.DESCRIPCIONESTADO, EEST.IDESTADO, EPRE.IDPREGUNTA
      FROM EVA_PREGUNTAS EPRE
      INNER JOIN EVA_ESTADOS EEST ON EPRE.IDESTADO = EEST.IDESTADO 
      WHERE 
        EPRE.DESCRIPCIONPREGUNTA LIKE DECODE('%$descripcionpreg%', '', EPRE.DESCRIPCIONPREGUNTA, '%$descripcionpreg%')
          AND EPRE.LIDERPREGUNTA LIKE DECODE('%$lidpregunta%', '', EPRE.LIDERPREGUNTA, '%$lidpregunta%')
          AND EPRE.COMPETENCIA LIKE DECODE('%$competencia%', '', EPRE.COMPETENCIA, '%$competencia%')
          AND EPRE.IDESTADO = $idestado");
    
    if ($QueryBuscar->num_rows() > 0)
    {
      return $QueryBuscar->result(); 
    }     
  }

  public function ModificarPreguntas($idpreguntas)
  {
    $QueryBuscarId = $this->db->query("
      SELECT EPRE.IDESTADO, EPRE.DESCRIPCIONPREGUNTA, EPRE.PORCENTAJEPREGUNTA, EPRE.COMPETENCIA,
        CASE WHEN EPRE.LIDERPREGUNTA = 'S' THEN 'SI'
             WHEN EPRE.LIDERPREGUNTA = 'N' THEN 'NO' END LIDERPREGUNTA, 
        EEST.DESCRIPCIONESTADO, EEST.IDESTADO, EPRE.IDPREGUNTA, EPRE.LIDERPREGUNTA LIDERPREGUNTAID
      FROM EVA_PREGUNTAS EPRE
      INNER JOIN EVA_ESTADOS EEST ON EPRE.IDESTADO = EEST.IDESTADO 
      WHERE EPRE.IDPREGUNTA = $idpreguntas"); 

    if ($QueryBuscarId->num_rows() > 0)
    {
      return $QueryBuscarId->result(); 
    }     
  }

  public function CrudActualizarPreguntas($idpreguntas, $idestadopregunta, $usuario)
  {
    $this->db->query("UPDATE EVA_PREGUNTAS 
                      SET IDESTADO = $idestadopregunta,
                          USUARIOMODIFICA = '$usuario',
                          FECHAMODIFICA = SYSDATE
                      WHERE IDPREGUNTA = $idpreguntas");

    if($this->db->affected_rows() > 0)
      return true;
    else
      return false;    
  }
}   