<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_dependencias extends CI_Model
{
  public function __construct()
  {
      parent::__construct();
      //Do your magic here
  }

  public function BuscarDependencias($descripcion, $idestado)
  {
    $QueryBuscar = $this->db->query("
      SELECT EDEP.DESCRIPCIONDEPENDENCIA, EDEP.IDDEPENDENCIA, EEST.DESCRIPCIONESTADO, EEST.IDESTADO
      FROM EVA_DEPENDENCIAS EDEP
        INNER JOIN EVA_ESTADOS EEST ON EDEP.IDESTADO = EEST.IDESTADO 
      WHERE 
        EDEP.DESCRIPCIONDEPENDENCIA LIKE DECODE('%$descripcion%', '', EDEP.DESCRIPCIONDEPENDENCIA, '%$descripcion%')
        AND EDEP.IDESTADO = $idestado");
    
    if ($QueryBuscar->num_rows() > 0)
    {
      return $QueryBuscar->result(); 
    }     
  }

  public function ModificarDependencias($iddepen)
  {
    $QueryBuscarId = $this->db->query("SELECT EDEP.DESCRIPCIONDEPENDENCIA, EDEP.IDDEPENDENCIA, 
                                        EEST.DESCRIPCIONESTADO, EEST.IDESTADO
                                        FROM EVA_DEPENDENCIAS EDEP
                                        INNER JOIN EVA_ESTADOS EEST ON EDEP.IDESTADO = EEST.IDESTADO 
                                        WHERE EDEP.IDDEPENDENCIA = $iddepen"); 
    if ($QueryBuscarId->num_rows() > 0)
    {
      return $QueryBuscarId->result(); 
    }     
  }

  public function RegistrarDependencias($descripcion, $idestado, $usuario)
  {
    $query = $this->db->query("
      SELECT * 
      FROM EVA_DEPENDENCIAS 
      WHERE DESCRIPCIONDEPENDENCIA = TRIM('$descripcion') 
        AND IDESTADO = $idestado");

    if ($query->num_rows() > 0)
    {
      return $query->result();      
    }
    else        
    {
      $sql_crear_cargo = "INSERT INTO EVA_DEPENDENCIAS (IDESTADO, DESCRIPCIONDEPENDENCIA, USUARIOCREACION, FECHACREACION) 
                  VALUES ($idestado,".$this->db->escape($descripcion).", ".$this->db->escape($usuario).", SYSDATE)";
      $this->db->query($sql_crear_cargo);
      if($this->db->affected_rows() > 0){
        return true;
      }
      else{
        return false;
      }
    }
  } 

  public function CrudActualizarDependencias($iddepen, $idestadodepen, $usuario)
  {
    $this->db->query("UPDATE EVA_DEPENDENCIAS 
                      SET IDESTADO = $idestadodepen,
                          USUARIOMODIFICA = '$usuario',
                          FECHAMODIFICA = SYSDATE
                      WHERE IDDEPENDENCIA = $iddepen");

    if($this->db->affected_rows() > 0)
      return true;
    else
      return false;    
  }
}   