<?php 
  if (isset($ConsulUsuario)) 
  { 
    $base = base_url();
    $session_data = $this->session->userdata('nueva_session');
    $perfil = $session_data['perfil'];
  ?>
      <div class="color-heading">
        <strong>&nbsp;&nbsp;RESULTADOS</strong>
      </div>
      
      <table  class="table table-sm table-striped" id="crudcargos" style="font-size: small">
        <th><strong>Identificaciòn</strong></th>                
        <th><strong>Nombre</strong></th>               
        <th><strong>Jefe</strong></th>               
        <th><strong>Estado</strong></th>      
        <th> Editar </th>                            
    <?php 
      foreach ($ConsulUsuario as $key => $cargo)
      { ?> 
        <tr> 
          <td class="left"> <?php echo $cargo->IDUSUARIOS ?></td>
          <td class="left"> <?php echo $cargo->NOMBREUSUARIO ?></td>
          <td class="left"> <?php echo $cargo->JEFE ?></td>
          <td class="left"> <?php echo $cargo->DESCRIPCIONESTADO ?></td>
          <td>
            <button type="button" class="btn btn-primary btn-sm" 
              onclick="ModificarUsuarios(<?php echo $cargo->IDUSUARIOS?>);">
             <i class="fas fa-pencil-alt"></i>
            </button>            
          </td>        
        </tr>  
    <?php
      } 
    ?> 
      </table>

<?php } else { ?> 
    <table class="table">
      <tr>
        <td colspan="7">
          <span class="badge badge-important"> No se encontraron datos para mostrar. </span> 
        </td>
      </tr>
    </table> 
  <?php } ?> 

