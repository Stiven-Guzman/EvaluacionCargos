<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_cargos extends CI_Model
{
  public function __construct()
  {
      parent::__construct();
      //Do your magic here
  }

  public function BuscarCargo($descripcion, $objetivo, $idestado)
  {
    $QueryBuscar = $this->db->query("SELECT ECAR.DESCRIPCIONCARGO, ECAR.IDCARGO, 
                                      EEST.DESCRIPCIONESTADO, ECAR.OBJETIVOCARGO
                                    FROM EVA_CARGOS ECAR
                                      INNER JOIN EVA_ESTADOS EEST ON ECAR.IDESTADO = EEST.IDESTADO 
                                    WHERE 
                                      ECAR.DESCRIPCIONCARGO LIKE DECODE('%$descripcion%', '', ECAR.DESCRIPCIONCARGO, '%$descripcion%')
                                        AND ECAR.OBJETIVOCARGO LIKE DECODE('%$objetivo%', '', ECAR.OBJETIVOCARGO, '%$objetivo%') 
                                        AND ECAR.IDESTADO = $idestado");
    
    if ($QueryBuscar->num_rows() > 0)
    {
      return $QueryBuscar->result(); 
    }     
  }

  public function ModificarCargo($idcargos)
  {
    $QueryBuscarId = $this->db->query("SELECT ECAR.DESCRIPCIONCARGO, ECAR.IDCARGO, 
                                        EEST.DESCRIPCIONESTADO, EEST.IDESTADO, ECAR.OBJETIVOCARGO
                                        FROM EVA_CARGOS ECAR
                                        INNER JOIN EVA_ESTADOS EEST ON ECAR.IDESTADO = EEST.IDESTADO 
                                        WHERE ECAR.IDCARGO = $idcargos"); 
    if ($QueryBuscarId->num_rows() > 0)
    {
      return $QueryBuscarId->result(); 
    }     
  }

  public function RegistrarCargo($descripcion, $idestado, $objetivo, $usuario)
  {
    $query = $this->db->query("SELECT * FROM EVA_CARGOS WHERE DESCRIPCIONCARGO = TRIM('$descripcion') AND IDESTADO = $idestado");

    if ($query->num_rows() > 0)
    {
      return $query->result();      
    }
    else        
    {
      $sql_crear_cargo = "INSERT INTO EVA_CARGOS (IDESTADO, DESCRIPCIONCARGO, OBJETIVOCARGO, USUARIOCREACION, FECHACREACION) 
                  VALUES ($idestado,".$this->db->escape($descripcion).",
                          ".$this->db->escape($objetivo).",".$this->db->escape($usuario).", SYSDATE)";
      $this->db->query($sql_crear_cargo);
      if($this->db->affected_rows() > 0){
        return true;
      }
      else{
        return false;
      }
    }
  } 

  public function CrudActualizarCargo($idcargo, $idestado, $usuario)
  {
    $this->db->query("UPDATE EVA_CARGOS 
                      SET IDESTADO = $idestado,
                          USUARIOMODIFICA = '$usuario',
                          FECHAMODIFICA = SYSDATE
                      WHERE IDCARGO = $idcargo");

    if($this->db->affected_rows() > 0)
      return true;
    else
      return false;    
  }
}   