<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_index extends CI_Controller {

	public function index()
	{
		$this->load->view('Index');
	}

	public function inicio()
	{
    $idusuario= $this->input->post('idusuario'); 
    $idpassword= $this->input->post('idpassword');

    if($idusuario != '' && $idpassword != '')
    {
      $this->load->model('Mod_index');
      $result=$this->Mod_index->ValidarUsuario($idusuario, $idpassword);

      if($result)
      {  
        if($result[0]->IDUSUARIOS != $result[0]->CONTRASENAUSUARIO)
        {
            
          $datos_session = array();
          foreach($result as $row)
          {
            $datos_session = array(
              'idusuario' => $row->IDUSUARIOS,
              'nombre' => $row->NOMBREUSUARIO,
              'apellido' => $row->APELLIDOUSUARIO,
              'perfil' => $row->PERFILUSUARIO,
              'califica' => $row->CALIFICAUSUARIO,
              'esjefe' => $row->ESJEFE
            );
          }

          $this->session->set_userdata('nueva_session', $datos_session);
          $this->load->view('Header/header');
          $this->load->view('Inicio/PaginaInicio');
          $this->load->view('Footer/footer');
   
        }
        else
        {
          $data['UsuariosContra']=$this->Mod_index->ValidarUsuario($idusuario,$idpassword);
          $this->load->view('Inicio/ModalCambioContrasena', $data);
        }
      }
      else
      {
        echo "<script> alert('Usuario y/o Password Errados'); </script>";
        redirect('', 'refresh');
      }          
    }
    else
    {
      echo "<script> alert('Usuario y/o Password no pueden ser nulos'); </script>";
			redirect('', 'refresh');
	  }   
	}
	
  public function CambioContrasena()
  {
    $Modifusuario= $this->input->post('Modifusuario'); 
    $idcontrasena= $this->input->post('idcontrasena');

    $this->load->model('Mod_index');
    $result=$this->Mod_index->CambioContrasena($Modifusuario, $idcontrasena);

    if($result)
    {
      echo "<script> alert('La contraseña fue cambiada con exito.'); </script>";
      redirect('', 'refresh');
    }
    else
    {
      echo "<script> alert('No se realizo el cambio, por favor comuniquese con el Administrador.'); </script>";
    }
  }

	public function home()
	{
    $this->load->view('Header/header');
    $this->load->view('Inicio/PaginaInicio');
    $this->load->view('Footer/footer');	
	}

  public function Logout()
  {
    $this->session->sess_destroy('nueva_session');      
    redirect('', 'refresh');
  }

}
