<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_select extends CI_Model
{
  public function __construct()
  {
      parent::__construct();
      //Do your magic here
  }

  public function ValidarEstado()
  {
    $query = $this->db->query("SELECT * FROM EVA_ESTADOS");
    if ($query->num_rows() > 0)
    {
      return $query->result();      
    }
    else        
    {
      return false;   
    }    
  }

  public function ValidarCargo()
  {
    $query = $this->db->query("SELECT * FROM EVA_CARGOS");
    if ($query->num_rows() > 0)
    {
      return $query->result();      
    }
    else        
    {
      return false;   
    }    
  }

  public function ValidarCiudades()
  {
    $query = $this->db->query("SELECT * FROM EVA_CIUDADES");
    if ($query->num_rows() > 0)
    {
      return $query->result();      
    }
    else        
    {
      return false;   
    }    
  }

  public function ValidarDependencias()
  {
    $query = $this->db->query("SELECT * FROM EVA_DEPENDENCIAS");
    if ($query->num_rows() > 0)
    {
      return $query->result();      
    }
    else        
    {
      return false;   
    }    
  }

  public function ValidarEmpresas()
  {
    $query = $this->db->query("SELECT * FROM EVA_EMPRESA");
    if ($query->num_rows() > 0)
    {
      return $query->result();      
    }
    else        
    {
      return false;   
    }    
  }

  public function ValidarNiveles()
  {
    $query = $this->db->query("SELECT * FROM EVA_CATEGORIZACIONES");
    if ($query->num_rows() > 0)
    {
      return $query->result();      
    }
    else        
    {
      return false;   
    }    
  }

  public function ValidarUsuarios()
  {
    $query = $this->db->query("SELECT * FROM EVA_USUARIOS");
    if ($query->num_rows() > 0)
    {
      return $query->result();      
    }
    else        
    {
      return false;   
    }    
  }

  public function PreguntasEncuesta($usuario, $idperfil, $califica)
  {
    $query = $this->db->query("SELECT * FROM EVA_PREGUNTAS WHERE LIDERPREGUNTA = '$lpregunta' AND IDESTADO = 1");
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