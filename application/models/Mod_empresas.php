<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_empresas extends CI_Model
{
  public function __construct()
  {
      parent::__construct();
      //Do your magic here
  }

  public function RegistrarEmpresas($nitempresa, $descripcionempresa, $idestado, $usuario)
  {
    $query = $this->db->query("SELECT * FROM EVA_EMPRESA WHERE NITEMPRESA = TRIM('$nitempresa') AND IDESTADO = $idestado");

    if ($query->num_rows() > 0)
    {
      return $query->result();      
    }
    else        
    {
      $sql_crear_cargo = "INSERT INTO EVA_EMPRESA (IDESTADO, NITEMPRESA, NOMBREEMPRESA, USUARIOCREACION, FECHACREACION) 
                  VALUES ($idestado,".$this->db->escape($nitempresa).", ".$this->db->escape($descripcionempresa).",".$this->db->escape($usuario).", SYSDATE)";
      $this->db->query($sql_crear_cargo);
      if($this->db->affected_rows() > 0){
        return true;
      }
      else{
        return false;
      }
    }
  } 

  public function BuscarEmpresas($nitempresa, $descripcionempresa, $idestado)
  {
    $QueryBuscar = $this->db->query("
      SELECT EEMP.IDESTADO, EEMP.NITEMPRESA, EEMP.NOMBREEMPRESA, EEMP.IDEMPRESA, EEST.DESCRIPCIONESTADO
      FROM EVA_EMPRESA EEMP
        INNER JOIN EVA_ESTADOS EEST ON EEMP.IDESTADO = EEST.IDESTADO 
      WHERE 
        EEMP.NITEMPRESA LIKE DECODE('%$nitempresa%', '', EEMP.NITEMPRESA, '%$nitempresa%')
        AND EEMP.NOMBREEMPRESA LIKE DECODE('%$descripcionempresa%', '', EEMP.NOMBREEMPRESA, '%$descripcionempresa%')
        AND EEMP.IDESTADO = $idestado");
    
    if ($QueryBuscar->num_rows() > 0)
    {
      return $QueryBuscar->result(); 
    }     
  }

  public function ModificarEmpresas($idempresa)
  {
    $QueryBuscarId = $this->db->query("
      SELECT EEMP.IDESTADO, EEMP.NITEMPRESA, EEMP.NOMBREEMPRESA, EEMP.IDEMPRESA, EEST.DESCRIPCIONESTADO
      FROM EVA_EMPRESA EEMP
        INNER JOIN EVA_ESTADOS EEST ON EEMP.IDESTADO = EEST.IDESTADO 
      WHERE EEMP.IDEMPRESA = $idempresa"); 
    
    if ($QueryBuscarId->num_rows() > 0)
    {
      return $QueryBuscarId->result(); 
    }     
  }

  public function CrudActualizarEmpresa($idempresa, $idestadoempresa, $usuario)
  {
    $this->db->query("UPDATE EVA_EMPRESA 
                      SET IDESTADO = $idestadoempresa,
                          USUARIOMODIFICA = '$usuario',
                          FECHAMODIFICA = SYSDATE
                      WHERE IDEMPRESA = $idempresa");

    if($this->db->affected_rows() > 0)
      return true;
    else
      return false;    
  }
}   