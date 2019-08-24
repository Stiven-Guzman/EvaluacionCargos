<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_index extends CI_Model
{
  public function __construct()
  {
      parent::__construct();
      //Do your magic here
  }

  public function ValidarUsuario($idusuario, $idpassword)
  {
    $SqlValContrasena = "SELECT * FROM EVA_USUARIOS EUSU WHERE EUSU.IDUSUARIOS = $idusuario AND EUSU.CONTRASENAUSUARIO = $idusuario";

    $ResultValContr = $this->db->query($SqlValContrasena);    
    
    if($ResultValContr->num_rows() == 1)
    {
      return $ResultValContr->result();
    }
    else
    {
      $iInd = strlen($idpassword);
      $vClave = '';
      $i = 0;
      $iInd = $iInd - 1;
      while ($i <= $iInd) 
      {
        $vClave = $vClave.ord(substr($idpassword, $iInd, 1));
        $iInd--;
      }      

      $sql_bls_fac = "SELECT EUSU.NOMBREUSUARIO, EUSU.APELLIDOUSUARIO, EUSU.IDUSUARIOS, ECIU.DESCRIPCIONCIUDAD,
                        EUSU.PERFILUSUARIO, EUSU.CALIFICAUSUARIO, EUSU.ESJEFE, EUSU.CONTRASENAUSUARIO
                      FROM EVA_USUARIOS EUSU
                        INNER JOIN EVA_CIUDADES ECIU ON EUSU.IDCIUDAD = ECIU.IDCIUDAD 
                      WHERE ECIU.IDESTADO = 1
                        AND EUSU.IDUSUARIOS = $idusuario
                        AND EUSU.CONTRASENAUSUARIO = '$vClave'";

      $sql_cons_bl = $this->db->query($sql_bls_fac);    
      
      if($sql_cons_bl->num_rows() == 1)
      {
        return $sql_cons_bl->result();
      }
      else
      {
        return false;
      }
    }
  }

  public function CambioContrasena($Modifusuario, $idcontrasena)
  {
    $iInd = strlen($idcontrasena);
    $vClave = '';
    $i = 0;
    $iInd = $iInd - 1;
    while ($i <= $iInd) 
    {
      $vClave = $vClave.ord(substr($idcontrasena, $iInd, 1));
      $iInd--;
    }   

    $this->db->query("UPDATE EVA_USUARIOS 
                      SET 
                        USUARIOMODIFICA = $Modifusuario,
                        CONTRASENAUSUARIO = '$vClave',
                        FECHAMODIFICA = SYSDATE
                      WHERE IDUSUARIOS = $Modifusuario");

    if($this->db->affected_rows() > 0)
      return true;
    else
      return false;      
  }
}   