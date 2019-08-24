<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_niveles extends CI_Model
{
  public function __construct()
  {
      parent::__construct();
      //Do your magic here
  }

  public function BuscarNiveles($descripcion, $npreguntas, $idestado)
  {
    $QueryBuscar = $this->db->query("
      SELECT 
        ECAT.DESCRIPCIONCATEGORIZACION, ECAT.NUMPREGUNTASCATEGORIZA, 
        ECAT.IDCATEGORIZACION, EEST.DESCRIPCIONESTADO
      FROM EVA_CATEGORIZACIONES ECAT
      INNER JOIN EVA_ESTADOS EEST ON ECAT.IDESTADO = EEST.IDESTADO 
      WHERE 
        ECAT.DESCRIPCIONCATEGORIZACION LIKE DECODE('%$descripcion%', '', ECAT.DESCRIPCIONCATEGORIZACION, '%$descripcion%')
        AND ECAT.NUMPREGUNTASCATEGORIZA = NVL('$npreguntas', ECAT.NUMPREGUNTASCATEGORIZA)
        AND ECAT.IDESTADO = $idestado");
    
    if ($QueryBuscar->num_rows() > 0)
    {
      return $QueryBuscar->result(); 
    }     
  }

  public function ModificarNiveles($idniveles)
  {
    $QueryBuscarId = $this->db->query("
      SELECT 
        ECAT.DESCRIPCIONCATEGORIZACION, ECAT.NUMPREGUNTASCATEGORIZA, 
        ECAT.IDCATEGORIZACION, EEST.DESCRIPCIONESTADO, EEST.IDESTADO
      FROM EVA_CATEGORIZACIONES ECAT
      INNER JOIN EVA_ESTADOS EEST ON ECAT.IDESTADO = EEST.IDESTADO 
      WHERE ECAT.IDCATEGORIZACION = $idniveles"); 

    if ($QueryBuscarId->num_rows() > 0)
    {
      return $QueryBuscarId->result(); 
    }     
  }

  public function RegistrarNiveles($descripcion, $npreguntas, $idestado, $usuario)
  {
    $query = $this->db->query("SELECT * 
                                FROM EVA_CATEGORIZACIONES 
                                WHERE DESCRIPCIONCATEGORIZACION = TRIM('$descripcion') 
                                  AND IDESTADO = $idestado");

    if ($query->num_rows() > 0)
    {
      return $query->result();      
    }
    else        
    {
      $sql_crear_cargo = "INSERT INTO EVA_CATEGORIZACIONES (IDESTADO, DESCRIPCIONCATEGORIZACION, NUMPREGUNTASCATEGORIZA, USUARIOCREACION, FECHACREACION) 
                  VALUES ($idestado, ".$this->db->escape($descripcion).",".$this->db->escape($npreguntas).",".$this->db->escape($usuario).", SYSDATE)";
      $this->db->query($sql_crear_cargo);

      if($this->db->affected_rows() > 0){
        return true;
      }
      else{
        return false;
      }
    }
  } 

  public function CrudActualizarNivel($idniveles, $descripniveles, $npreguntas, $idestado, $usuario)
  {
    $this->db->query("UPDATE EVA_CATEGORIZACIONES 
                      SET IDESTADO = $idestado,
                          USUARIOMODIFICA = '$usuario',
                          FECHAMODIFICA = SYSDATE
                      WHERE IDCATEGORIZACION = $idniveles");

    if($this->db->affected_rows() > 0)
      return true;
    else
      return false;    
  }
}   