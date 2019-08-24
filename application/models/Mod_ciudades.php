<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_ciudades extends CI_Model
{
  public function __construct()
  {
      parent::__construct();
      //Do your magic here
  }

  public function BuscarCiudades($descripcion, $abreviatura, $idestado)
  {
    $QueryBuscar = $this->db->query("SELECT ECIU.DESCRIPCIONCIUDAD, ECIU.ABREVIATURACIUDAD, ECIU.IDCIUDAD, EEST.DESCRIPCIONESTADO
                                      FROM EVA_CIUDADES ECIU
                                      INNER JOIN EVA_ESTADOS EEST ON ECIU.IDESTADO = EEST.IDESTADO 
                                      WHERE 
                                        ECIU.DESCRIPCIONCIUDAD LIKE DECODE('%$descripcion%', '', ECIU.DESCRIPCIONCIUDAD, '%$descripcion%')
                                          AND ECIU.ABREVIATURACIUDAD LIKE DECODE('%$abreviatura%', '', ECIU.ABREVIATURACIUDAD, '%$abreviatura%')
                                          AND ECIU.IDESTADO = $idestado");
    
    if ($QueryBuscar->num_rows() > 0)
    {
      return $QueryBuscar->result(); 
    }     
  }

  public function ModificarCiudad($idciudad)
  {
    $QueryBuscarId = $this->db->query("SELECT ECIU.DESCRIPCIONCIUDAD, ECIU.ABREVIATURACIUDAD, ECIU.IDCIUDAD, 
                                        EEST.DESCRIPCIONESTADO, EEST.IDESTADO
                                        FROM EVA_CIUDADES ECIU
                                        INNER JOIN EVA_ESTADOS EEST ON ECIU.IDESTADO = EEST.IDESTADO 
                                        WHERE ECIU.IDCIUDAD = $idciudad"); 
    if ($QueryBuscarId->num_rows() > 0)
    {
      return $QueryBuscarId->result(); 
    }     
  }

  public function RegistrarCiudades($descripcion, $abreviatura, $idestado, $usuario)
  {
    $query = $this->db->query("SELECT * FROM EVA_CIUDADES WHERE DESCRIPCIONCIUDAD = TRIM('$descripcion') AND IDESTADO = $idestado");

    if ($query->num_rows() > 0)
    {
      return $query->result();      
    }
    else        
    {
      $sql_crear_ciudad = "INSERT INTO EVA_CIUDADES (IDESTADO, DESCRIPCIONCIUDAD, ABREVIATURACIUDAD, USUARIOCREACION, FECHACREACION) 
                  VALUES (".$this->db->escape($idestado).",".$this->db->escape($descripcion).",
                          ".$this->db->escape($abreviatura).",".$this->db->escape($usuario).", SYSDATE)";
      $this->db->query($sql_crear_ciudad);
      if($this->db->affected_rows() > 0){
        return true;
      }
      else{
        return false;
      }
    }
  } 

  public function CrudActualizarCiudad($idciudad, $idestadociudad, $usuario)
  {
    $this->db->query("UPDATE EVA_CIUDADES 
                      SET IDESTADO = $idestadociudad,
                          USUARIOMODIFICA = '$usuario',
                          FECHAMODIFICA = SYSDATE
                      WHERE IDCIUDAD = $idciudad");

    if($this->db->affected_rows() > 0)
      return true;
    else
      return false;    
  }
}   