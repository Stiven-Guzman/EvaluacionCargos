<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_usuarios extends CI_Model
{
  public function __construct()
  {
      parent::__construct();
      //Do your magic here
  }

  public function RegistrarUsuarios($idusuario, $nombreusuario, $apellidosusuario, $idjefe, $idniveles,
                                   $idcargo, $iddependencia, $idciudad, $idempresa, $idestado, 
                                   $idperfil, $idcontrasena, $usuario)
  {
    $query = $this->db->query("SELECT * FROM EVA_USUARIOS WHERE IDUSUARIOS = '$idusuario' AND IDESTADO = $idestado");

    if ($query->num_rows() > 0)
    {
      return $query->result();      
    }
    else        
    {
      $sql_crear_cargo = "INSERT INTO EVA_USUARIOS 
      (IDUSUARIOS, IDCARGO, IDCATEGORIZACION, IDDEPENDENCIA, IDCIUDAD, IDEMPRESA, IDESTADO,
      CALIFICAUSUARIO, NOMBREUSUARIO, APELLIDOUSUARIO, CONTRASENAUSUARIO, PERFILUSUARIO, 
      USUARIOCREACION, FECHACREACION) 
                  VALUES (".$this->db->escape($idusuario).",".$this->db->escape($idcargo).",
                          ".$this->db->escape($idniveles).",".$this->db->escape($iddependencia).",
                          ".$this->db->escape($idciudad).",".$this->db->escape($idempresa).",
                          ".$this->db->escape($idestado).",".$this->db->escape($idusu).",
                          ".$this->db->escape($nombreusuario).",".$this->db->escape($apellidosusuario).",
                          ".$this->db->escape($idcontrasena).",".$this->db->escape($idperfil).",
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

  public function BuscarUsuarios($idusuario, $nombreusuario, $apellidosusuario, 
                                  $idjefe, $idniveles, $idcargo, $iddependencia, 
                                  $idciudad, $idempresa, $idestado, $idperfil, 
                                  $usuario)
  {
    $QueryBuscar = $this->db->query("
      SELECT EUSU.APELLIDOUSUARIO||' '||EUSU.NOMBREUSUARIO NOMBREUSUARIO, 
        CASE WHEN EUSU.PERFILUSUARIO = '1' THEN 'ADMINISTRADOR'
              WHEN  EUSU.PERFILUSUARIO = '2' THEN 'USUARIO' END PERFILUSUARIO,
        EUSU.IDUSUARIOS, ECAR.DESCRIPCIONCARGO, ECAT.DESCRIPCIONCATEGORIZACION,
        EDEP.DESCRIPCIONDEPENDENCIA,    ECIU.DESCRIPCIONCIUDAD, EEMP.NOMBREEMPRESA,
        EEST.DESCRIPCIONESTADO, EJEF.APELLIDOUSUARIO ||' '|| EJEF.NOMBREUSUARIO JEFE
      FROM EVA_USUARIOS EUSU
        INNER JOIN EVA_CARGOS ECAR ON EUSU.IDCARGO = ECAR.IDCARGO
        INNER JOIN EVA_CATEGORIZACIONES ECAT ON EUSU.IDCATEGORIZACION = ECAT.IDCATEGORIZACION
        INNER JOIN EVA_DEPENDENCIAS EDEP ON EUSU.IDDEPENDENCIA = EDEP.IDDEPENDENCIA
        INNER JOIN EVA_CIUDADES ECIU ON EUSU.IDCIUDAD = ECIU.IDCIUDAD
        INNER JOIN EVA_EMPRESA EEMP ON EUSU.IDEMPRESA = EEMP.IDEMPRESA
        INNER JOIN EVA_ESTADOS EEST ON EUSU.IDESTADO = EEST.IDESTADO
        INNER JOIN EVA_USUARIOS EJEF ON EUSU.CALIFICAUSUARIO = EJEF.IDUSUARIOS
      WHERE EUSU.IDUSUARIOS = NVL('$idusuario', EUSU.IDUSUARIOS)
        AND EUSU.NOMBREUSUARIO LIKE NVL('%$nombreusuario%', EUSU.NOMBREUSUARIO)
        AND EUSU.APELLIDOUSUARIO LIKE NVL('%$apellidosusuario%', EUSU.APELLIDOUSUARIO)     
        AND EUSU.CALIFICAUSUARIO = DECODE('$idjefe', '-1', EUSU.CALIFICAUSUARIO, '$idjefe')  
        AND ECAT.IDCATEGORIZACION = DECODE('$idniveles', '-1',ECAT.IDCATEGORIZACION, '$idniveles') 
        AND ECAR.IDCARGO = DECODE('$idcargo', '-1', ECAR.IDCARGO, '$idcargo') 
        AND EDEP.IDDEPENDENCIA = DECODE('$iddependencia', '-1', EDEP.IDDEPENDENCIA, '$iddependencia') 
        AND ECIU.IDCIUDAD = DECODE('$idciudad', '-1', ECIU.IDCIUDAD, '$idciudad') 
        AND EEMP.IDEMPRESA = DECODE('$idempresa', '-1', EEMP.IDEMPRESA, '$idempresa') 
        AND EEST.IDESTADO = DECODE('$idestado', '-1', EEST.IDESTADO, '$idestado') 
        AND EUSU.PERFILUSUARIO = DECODE('$idperfil', '-1', EUSU.PERFILUSUARIO, '$idperfil')");

    if ($QueryBuscar->num_rows() > 0)
    {
      return $QueryBuscar->result(); 
    }     
  }

  public function ModificarUsuarios($idusuarios)
  {
    $QueryBuscarId = $this->db->query("
      SELECT EUSU.IDUSUARIOS, EUSU.NOMBREUSUARIO, EUSU.APELLIDOUSUARIO,  EJEF.APELLIDOUSUARIO||' '||EJEF.NOMBREUSUARIO JEFE,  EJEF.IDUSUARIOS IDJEFE,
        ECAT.IDCATEGORIZACION, ECAT.DESCRIPCIONCATEGORIZACION, ECAR.IDCARGO, ECAR.DESCRIPCIONCARGO, EDEP.IDDEPENDENCIA, EDEP.DESCRIPCIONDEPENDENCIA,
        ECIU.IDCIUDAD, ECIU.DESCRIPCIONCIUDAD, EEMP.IDEMPRESA, EEMP.NOMBREEMPRESA, EEST.IDESTADO, EEST.DESCRIPCIONESTADO, EUSU.PERFILUSUARIO,
        CASE WHEN EUSU.PERFILUSUARIO = '1' THEN 'ADMINISTRADOR'
              WHEN  EUSU.PERFILUSUARIO = '2' THEN 'USUARIO' END DESCRIPCIONPERFILUSUARIO
      FROM EVA_USUARIOS EUSU
        INNER JOIN EVA_CARGOS ECAR ON EUSU.IDCARGO = ECAR.IDCARGO
        INNER JOIN EVA_CATEGORIZACIONES ECAT ON EUSU.IDCATEGORIZACION = ECAT.IDCATEGORIZACION
        INNER JOIN EVA_DEPENDENCIAS EDEP ON EUSU.IDDEPENDENCIA = EDEP.IDDEPENDENCIA
        INNER JOIN EVA_CIUDADES ECIU ON EUSU.IDCIUDAD = ECIU.IDCIUDAD
        INNER JOIN EVA_EMPRESA EEMP ON EUSU.IDEMPRESA = EEMP.IDEMPRESA
        INNER JOIN EVA_ESTADOS EEST ON EUSU.IDESTADO = EEST.IDESTADO
        INNER JOIN EVA_USUARIOS EJEF ON EUSU.CALIFICAUSUARIO = EJEF.IDUSUARIOS
      WHERE EUSU.IDUSUARIOS = $idusuarios"); 
    
    if ($QueryBuscarId->num_rows() > 0)
    {
      return $QueryBuscarId->result(); 
    }     
  }

  public function CrudActualizarUsuarios($nombreusuario, $apellidosusuario, $idjefe, $idniveles, $idcargo, $iddependencia, $idciudad, $idempresa, $idestado, $idperfil, $idusuarios, $idcontrasena, $usuario)
  {
    if($idcontrasena == '') { $idcontrasena = $idusuarios; }

    $this->db->query("UPDATE EVA_USUARIOS 
                      SET 
                        NOMBREUSUARIO = '$nombreusuario',
                        APELLIDOUSUARIO = '$apellidosusuario',
                        IDCATEGORIZACION = $idniveles,
                        IDCARGO = $idcargo,
                        IDDEPENDENCIA = $iddependencia,
                        IDCIUDAD = $idciudad,
                        IDEMPRESA = $idempresa,
                        IDESTADO = $idestado,
                        PERFILUSUARIO = $idperfil,
                        CALIFICAUSUARIO = $idjefe,
                        CONTRASENAUSUARIO = '$idcontrasena',
                        USUARIOMODIFICA = '$usuario',
                        FECHAMODIFICA = SYSDATE
                      WHERE IDUSUARIOS = $idusuarios");

    if($this->db->affected_rows() > 0)
      return true;
    else
      return false;    
  }
}   