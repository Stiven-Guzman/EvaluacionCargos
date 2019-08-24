<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_estados extends CI_Model
{
  public function __construct()
  {
      parent::__construct();
      //Do your magic here
  }

  public function RegistrarEstados($descripcion, $codigo, $usuario)
  {
    $query = $this->db->query("SELECT * FROM EVA_ESTADOS WHERE DESCRIPCIONESTADO = TRIM('$descripcion')");

    if ($query->num_rows() > 0)
    {
      return $query->result();      
    }
    else        
    {
      $sql_crear_cargo = "INSERT INTO EVA_ESTADOS (DESCRIPCIONESTADO, CODIGOESTADO, USUARIOCREACION, FECHACREACION) 
                  VALUES (".$this->db->escape($descripcion).",
                          ".$this->db->escape($codigo).",".$this->db->escape($usuario).", SYSDATE)";
      $this->db->query($sql_crear_cargo);
      if($this->db->affected_rows() > 0){
        return true;
      }
      else{
        return false;
      }
    }
  } 

  public function BuscarEstados($descripcion, $codigo)
  {
    $QueryBuscar = $this->db->query("SELECT EEST.DESCRIPCIONESTADO, EEST.CODIGOESTADO, EEST.IDESTADO 
                                      FROM EVA_ESTADOS EEST
                                      WHERE 
                                        EEST.DESCRIPCIONESTADO LIKE DECODE('%$descripcion%', '', EEST.DESCRIPCIONESTADO, '%$descripcion%')
                                          AND EEST.CODIGOESTADO LIKE DECODE('%$codigo%', '', EEST.CODIGOESTADO, '%$codigo%')");
    
    if ($QueryBuscar->num_rows() > 0)
    {
      return $QueryBuscar->result(); 
    }     
  }

  public function ModificarEstados($idestados)
  {
    $QueryBuscarId = $this->db->query("SELECT EEST.DESCRIPCIONESTADO, EEST.CODIGOESTADO, EEST.IDESTADO
                                        FROM EVA_ESTADOS EEST
                                        WHERE EEST.IDESTADO = $idestados"); 
    if ($QueryBuscarId->num_rows() > 0)
    {
      return $QueryBuscarId->result(); 
    }     
  }

  public function CrudActualizarEstados($idestados, $descripcionestado, $codigoestado, $usuario)
  {
    $this->db->query("UPDATE EVA_ESTADOS 
                      SET DESCRIPCIONESTADO = '$descripcionestado',
                          CODIGOESTADO = '$codigoestado',
                          USUARIOMODIFICA = '$usuario',
                          FECHAMODIFICA = SYSDATE
                      WHERE IDESTADO = $idestados");

    if($this->db->affected_rows() > 0)
      return true;
    else
      return false;    
  }
}   