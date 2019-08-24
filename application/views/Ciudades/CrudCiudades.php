<?php 
  if (isset($ConsulCiudades)) 
  { 
    $base = base_url();
    $session_data = $this->session->userdata('nueva_session');
    $perfil = $session_data['perfil'];
  ?>
    <div class="color-heading">
      <strong>&nbsp;&nbsp;RESULTADOS</strong>
    </div>
    
    <table  class="table table-sm table-striped" id="crudcargos" style="font-size: small">
      <th><strong>N°</strong></th>                
      <th><strong>Descripción</strong></th>               
      <th><strong>Codigo Ciudad</strong></th>
      <th><strong>Estado</strong></th>      
      <th><strong>Editar</strong></th>                            
  <?php $count = 1;
    foreach ($ConsulCiudades as $key => $cargo)
    { ?> 
      <tr> 
        <td><strong><?php echo $count; ?></td>
        <td class="left"> <?php echo $cargo->DESCRIPCIONCIUDAD ?></td>
        <td class="left"> <?php echo $cargo->ABREVIATURACIUDAD ?></td>
        <td class="left"> <?php echo $cargo->DESCRIPCIONESTADO ?></td>
        <td>
          <button type="button" class="btn btn-primary btn-sm" 
            onclick="ModificarCiudad(<?php echo $cargo->IDCIUDAD?>);">
           <i class="fas fa-pencil-alt"></i>
          </button>         
        </td>
      </tr>  
  <?php
      $count ++;
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

